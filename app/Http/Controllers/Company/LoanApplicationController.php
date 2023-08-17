<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Suppliers\StoreRequest;
use App\Http\Requests\Suppliers\UpdateRequest;
use App\Http\Requests\Suppliers\UpdatePasswordRequest;
use App\Models\LoanApplication;
use App\Models\Supplier\Supplier;
use App\Models\LoanRepayment;
use App\Traits\CommonMethods;

use Carbon\Carbon;

class LoanApplicationController extends Controller
{
    use CommonMethods;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;
    protected $upload_path;

    public function __construct()
    {
        $this->upload_path    = 'invoices';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.pages.loanapplications.index');
    }

    public function list()
    { 
        return Datatables::of($this->getForDataTable())
            ->editColumn('created_at', function ($LoanApplication) {
                return $LoanApplication->created_at->toDateString();
            })->editColumn('status', function ($LoanApplication) {

                if ($LoanApplication->status == 'Pending') {
                    $html = '<span class="dtr-data"><span class="badge badge-primary badge-pill">' . $LoanApplication->status . '</span></span>';
                } elseif ($LoanApplication->status == 'Cancelled') {

                    $html = '<span class="dtr-data"><span class="badge badge-danger badge-pill">' . $LoanApplication->status . '</span></span>';
                } elseif ($LoanApplication->status == 'Approved') {

                    $html = '<span class="dtr-data"><span class="badge badge-warning badge-pill">' . $LoanApplication->status . '</span></span>';
                } else {
                    $html = '<span class="dtr-data"><span class="badge badge-success badge-pill">' . $LoanApplication->status . '</span></span>';
                }
                return $html;
            })->editColumn('supplier_id', function ($LoanApplication) {
                return $LoanApplication->supplier->full_business_name;
            })->editColumn('invoice_date', function ($LoanApplication) {
                return Carbon::parse($LoanApplication->invoice_date)->format('d/m/Y');
            })->editColumn('delivery_order_date', function ($LoanApplication) {
                if (empty($LoanApplication->delivery_order_date)) {
                    return null;
                }
                return Carbon::parse($LoanApplication->delivery_order_date)->format('d/m/Y');
            })->editColumn('invoice', function ($LoanApplication) {
                $html = " <a href='" . asset('storage/' . $LoanApplication->invoice) . "' class='btn btn-sm btn-outline-primary mr-2' target='_blank' title='View Invoice'>  <i class='fal fa-eye'></i></a>  </a>";
                return $html;
            })->editColumn('delivery_order_invoice', function ($LoanApplication) {
                $html = " <a href='" . asset('storage/' . $LoanApplication->delivery_order_invoice) . "' class='btn btn-sm btn-outline-primary mr-2' target='_blank' title='View DOI'>  <i class='fal fa-eye'></i></a> </a>";
                if (empty($LoanApplication->delivery_order_invoice)) {
                    $html = '';
                }
                return $html;
            })
            ->addColumn('actions', function ($LoanApplication) {
                $html = " <div class='d-flex mt-2'>
            <a href='javascript:void(0);' class='btn btn-sm btn-outline-danger mr-2' title='Delete'>
                <i class='fal fa-trash'></i></a>
            <a href='" . route('company.suppliers.edit', $LoanApplication->id) . "' class='btn btn-sm btn-outline-primary mr-2' title='Edit'>
                <i class='fal fa-edit'></i></a>
                <!-- Button trigger modal -->
                <button type='button' class='btn btn-sm btn-outline-primary mr-2 default-example-modal-center' data-id ='" . route('company.loanapplication.deliverorderinvoice.form',  ['id' => $LoanApplication->id]) . "'> Update Order </button>
                <!-- Button trigger modal -->";
                if (!empty($LoanApplication->delivery_order_invoice)) {
                    $html .= "<button type='button' class='btn btn-sm btn-outline-success mr-2 default-example-modal-center' data-id ='" . route('company.loanapplication.repayloan.form',  ['id' => $LoanApplication->id]) . "'> Repay Loan </button>";
                }
                $html .= "<div class='dropdown d-inline-block'><a href='#'' class='btn btn-sm btn-outline-primary mr-2' data-toggle='dropdown' aria-expanded='true' title='More options'>
                    <i class='fal fa-plus'></i></a>
                <div class='dropdown-menu'>
                    <a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
                    <a class='dropdown-item' href='javascript:void(0);' data-toggle='modal/ data-target='#default-example-modal-center'>Change Password</a>
                </div>
            </div>
        </div>";
                return $html;
            })->filter(function ($LoanApplication) {
                if (request()->has('status')) {
                    $LoanApplication->where('status', 'like', "%" . request('status') . "%");
                }
                if (!empty(request('search'))) {
                    $search = request('search');
                    $value = $search['value'];
                    $LoanApplication->where('invoice_number', 'LIKE', "%$value%");
                    $LoanApplication->orWhere('loan_amount', 'LIKE', "%$value%");
                }

            })
            ->escapeColumns(['title'])
            ->make(true);
    }

    /**
     * @return mixed
     */
    protected function getForDataTable()
    {
        $query = LoanApplication::query()
            ->select("*");
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId    = $this->guard()->user()->id;
        $suppliers = Supplier::where('company_id', $userId)->where('status', 'Approved')->get();
        return view('company.pages.loanapplications.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $userId = $this->guard()->user()->id;
        try {
            $inputs['invoice'] = '';
            if ($request->hasFile('invoice')) {
                $inputs['invoice'] = $this->uploadOne($request->invoice, $this->upload_path);
            }
            $inputs['company_id'] = $userId;
            LoanApplication::create($inputs);
            session()->flash('success', 'Application has been posted for new loan successfully');
        } catch (\Exception $exception) {
            session()->flash('error', 'Something went Wrong, Try again later');
        }
        return redirect(route('company.loanapplications.index'));
    }

    public function changeLoanApplication($id)
    {
        $html = '<div class="row">
                    <div class="col-xl-12">
                        <div id="panel-1" class="panel">
                            <div class="panel-hdr"><h2>General <span class="fw-300"><i>inputs</i></span></h2></div>
                            <div class="panel-container show">
                                <div class="panel-content">
                                    <div class="panel-tag">Be sure to use an appropriate type attribute on all inputs (e.g., code <code>email</code> for email address or <code>number</code> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.</div>
                                    <form method="POST" action="' . route('company.loanapplication.deliverorderinvoice') . '" id="update_status" enctype="multipart/form-data" data-name="update_status">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <div class="form-group"><label class="form-label" for="simpleinput">Delivery Order Date</label><input type="date" name="delivery_order_date"  id="delivery_order_date" class="form-control form-control-md rounded-0l"> </div>
                                        <div class="form-group">
                                            <label class="form-label" for="example-email-2">Delivery Order Invoice</label>
                                            <div class="input-group">
                                                <div class="custom-file"><input type="file" class="custom-file-input form-control form-control-lg rounded-0" id="delivery_order_invoice" name="delivery_order_invoice">
                                                <label class="custom-file-label" for="delivery_order_invoice" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        return $html;
    }

    public function updateLoanApplication(Request $request)
    {
        try {
            $currentUser = LoanApplication::find($request->id);
            $inputs['delivery_order_invoice'] = '';
            if ($request->hasFile('delivery_order_invoice')) {

                $inputs['delivery_order_invoice'] = $request->delivery_order_invoice;
                $inputs['delivery_order_invoice'] = $this->uploadOne($inputs['delivery_order_invoice'], $this->upload_path);
            }
            $currentUser->fill([
                'delivery_order_date'  =>  $request->get('delivery_order_date'),
                'delivery_order_invoice' => $inputs['delivery_order_invoice']
            ])->save();
            return $this->sendResponse($currentUser, 'Delivery Order Invoice Uploaded Successfully ');
        } catch (\Exception $exception) {
            return $this->sendError('Something went Wrong, Try again later');
        }
    }


    public function LoanRepayment($id)
    {
        $html = '<div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr"><h2>General <span class="fw-300"><i>inputs</i></span></h2></div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="panel-tag">Be sure to use an appropriate type attribute on all inputs (e.g., code <code>email</code> for email address or <code>number</code> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.</div>
                        <form method="POST" action="' . route('company.loanapplication.repayloan') . '" id="repayloan"  data-name="repayloan" enctype="multipart/form-data" >
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="form-group"><label class="form-label" for="simpleinput">Repayment Amount</label><input type="number" name="loan_amount_paid"  id="loan_amount_paid" class="form-control form-control-md rounded-0l"> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
        return $html;
    }

    public function LoanRepaymentUpdate(Request $request)
    {
        try {
            $currentUser = LoanApplication::find($request->id);
            LoanRepayment::create(
                [
                    'loan_amount_paid'    => $request->loan_amount_paid,
                    'loan_application_id' => $request->id,
                    'company_id'          => 1
                ]
            );
            return $this->sendResponse($currentUser, 'Loan Paid Successfully');
        } catch (\Exception $exception) {
            return $this->sendError('Something went Wrong, Try again later');
        }
    }
}
