<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Company\Company;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Http\Requests\Company\UpdatePasswordRequest;
use App\Traits\CommonMethods;
use Carbon\Carbon;
use App\Models\LoanApplication;
use App\Models\CreditLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    use CommonMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.company.index');
    }

    public function list(Request $request)
    {
        return Datatables::of($this->getForDataTable())
            ->editColumn('created_at', function ($company) {
                return $company->created_at->toDateString();
            })
            ->addColumn('actions', function ($company) {
                $html = " <div class='d-flex mt-2'>
                <a href='javascript:void(0);' class='btn btn-sm btn-outline-danger mr-2' title='Delete'>
                    <i class='fal fa-times'></i> Delete</a>
                <a href='" . route('admin.companies.edit', $company->id) . "' class='btn btn-sm btn-outline-primary mr-2' title='Edit'>
                    <i class='fal fa-edit'></i> Edit</a>


                    <!-- Button trigger modal -->
                    <button type='button' class='btn btn-sm btn-outline-primary mr-2 default-example-modal-center' data-title ='Password' data-id ='" . route('admin.companies.change-password', $company->id) . "'>Change Password</button>

                     <button type='button' class='btn btn-sm btn-outline-primary mr-2 default-example-modal-center' data-title ='Credit' data-id ='" . route('admin.companies.add-credit', $company->id) . "'>Add Credit</button>

                <div class='dropdown d-inline-block'>
                    <a href='#'' class='btn btn-sm btn-outline-primary mr-2' data-toggle='dropdown' aria-expanded='true' title='More options'>
                        <i class='fal fa-plus'></i>
                    </a>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
                        <a class='dropdown-item' href='javascript:void(0);' data-toggle='modal/ data-target='#default-example-modal-center'>Change Password</a>
 

                    </div>
                </div>
            </div>";
                return $html;
            })
            ->escapeColumns(['title'])
            ->make(true);
    }



    /**
     * @return mixed
     */
    protected function getForDataTable()
    {
        $query = Company::query()
            ->select([
                'id',
                'first_name',
                'last_name',
                'email',
                'remember_token',
                'address',
                'phone',
                'last_ip',
                'dob',
                'avatar',
                'credit_limit',
                'gender',
                'created_at'
            ]);
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $inputs = $request->all();
        try {
            $inputs['username'] = $request->email;
            $inputs['password'] =  Hash::make($request->password);
            Company::create($inputs);
            session()->flash('success', 'New Company Added Successfully');
        } catch (\Exception $exception) {
            session()->flash('error', 'Something went Wrong, Try again later');
        }
        return redirect(route('admin.companies.index'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentUser = LoanApplication::find($id);
        return view('admin.pages.company.show',compact('currentUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.pages.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $inputs   = $request->all();
            $company = Company::find($id);
            $company->fill($request->except(['_token', '_method']))->save();
            session()->flash('success', 'Company Updated Successfully');
        } catch (\Exception $exception) {
            session()->flash('error', 'Something went Wrong, Try again later');
        }
        return redirect(route('admin.companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::guard('api')->user();
        if (Hash::check($request->get('old_password'), $user->password)) {
            $currentUser = User::find($user->id);
            $currentUser->fill([
                'password'  =>  Hash::make($request->get('password'))
            ])->save();

            return [
                'error'     =>  false,
                'message'   =>  'Password Updated Successfully',
                'data'      =>  $currentUser
            ];
        } else {
            return [
                'error'     =>  true,
                'message'   =>  'Invalid Credentials',
                'data'      =>  null
            ];
        }
    }


    public function changePassword($id)
    {
        $html = '<form method="POST" action="' . route('admin.companies.update-password') . '" id="update_password">
        <div class="form-group">
            <label class="form-label" for="example-password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
            <input type="hidden" name="id" value="' . $id . '">
        </div>
    </form>';
        return $html;
    }

    public function update_password(Request $request)
    {
        try {
            $currentUser = Company::find($request->id);
            $currentUser->fill([
                'password'  =>  Hash::make($request->get('password'))
            ])->save();
            return $this->sendResponse($currentUser, 'Password Changed Successfully.');
        } catch (\Exception $exception) {
            return $this->sendError('Something went Wrong, Try again later');
        }
    }

    public function addCredit($id)
    {
        $currentUser = Company::find($id);

        $html = '<form method="POST" action="' . route('admin.companies.update-credit') . '" id="update_password">
        <div class="form-group">
            <label class="form-label" for="example-password">Credit</label>
            <input type="text" id="credit_limit" name="credit_limit" class="form-control" value="' . $currentUser->credit_limit . '">
            <input type="hidden" name="id" value="' . $id . '">
        </div>
    </form>';
        return $html;
    }

    public function update_credit(Request $request)
    {
        try {
            $currentUser = Company::find($request->id);

            $user = Auth::guard()->user();

            $inputs['company_id'] = $currentUser->id;
            $inputs['credit_limit'] =  $currentUser->credit_limit;
            $inputs['new_credit_limit'] = $request->get('credit_limit');
            $inputs['created_by'] = $user->id;
            CreditLog::create($inputs);

            $currentUser->fill([
                'credit_limit'  =>  $request->get('credit_limit')
            ])->save();
            return $this->sendResponse($currentUser, 'Credit Add Successfully.');
        } catch (\Exception $exception) {
            return $this->sendError('Something went Wrong, Try again later');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loanApplications()
    {
        return view('admin.pages.company.loanApplications');
    }
    /**
     * @return mixed
     */
    protected function getLoanDataForDataTable()
    {
        $query = LoanApplication::query();
        return $query->orderBy('created_at', 'desc');
    }

    public function listLoanApplications()
    {
        return Datatables::of($this->getLoanDataForDataTable())
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
            })->editColumn('company_id', function ($LoanApplication) {
                return $LoanApplication->company->first_name.' '.$LoanApplication->company->last_name;
            })
            ->editColumn('invoice_date', function ($LoanApplication) {
                return Carbon::parse($LoanApplication->invoice_date)->format('d/m/Y');
            })->editColumn('delivery_order_date', function ($LoanApplication) {
                $html = '';
                if (!empty($LoanApplication->delivery_order_date)) {
                    $html .= Carbon::parse($LoanApplication->delivery_order_date)->format('d/m/Y');
                }
                return $html;
            })->editColumn('invoice', function ($LoanApplication) {
                $html = " <a href='" . asset('storage/' . $LoanApplication->invoice) . "' class='btn btn-sm btn-outline-primary mr-2' target='_blank' title='View Invoice'>
                <i class='fal fa-eye'></i></a>";
                return $html;
            })->editColumn('delivery_order_invoice', function ($LoanApplication) {
                $html = '';
                if (!empty($LoanApplication->delivery_order_invoice)) {
                    $html .= " <a href='" . asset('storage/' . $LoanApplication->delivery_order_invoice) . "' class='btn btn-sm btn-outline-primary mr-2' target='_blank' title='View DOI'>
                <i class='fal fa-eye'></i></a>";
                }

                return $html;
            })->filter(function ($LoanApplication) {
                if (request()->has('status') && !empty(request('status'))) {
                    $LoanApplication->where('status', '=', request('status'));
                }
            })
            ->addColumn('actions', function ($LoanApplication) {
                $html = " <div class='d-flex mt-2'> <div class='dropdown d-inline-block'>
            <a href='javascript:void(0);' class='btn btn-sm btn-outline-danger mr-2' title='Delete'>
                <i class='fal fa-trash'></i></a></div> <div class='dropdown d-inline-block'>
            <a href='" . route('company.suppliers.edit', $LoanApplication->id) . "' class='btn btn-sm btn-outline-primary mr-2' title='Edit'>
                <i class='fal fa-edit'></i> </a></div>
                <!-- Button trigger modal -->
                <button type='button'  data-status ='" . $LoanApplication->status . "' data-id ='" . route('admin.company.loanapplication.change-status', ['id' => $LoanApplication->id]) . "' class='btn btn-sm btn-outline-primary mr-2 default-example-modal-center' title='change Status'>Status</button>
            <div class='dropdown d-inline-block'>
                <a href='".route('admin.companies.show',$LoanApplication->id)."' class='btn btn-sm btn-outline-primary mr-2' title='View Full Details'>
                    <i class='fal fa-eye'></i>
                </a>
             
            </div>
        </div>";
                return $html;
            })
            ->escapeColumns(['title'])
            ->make(true);
    }


    public function changeLoanApplicationStatus(Request $request, $id)
    {
        $current_status = $request->get('current_status');

        $html = '
        <form method="POST" action="' . route('admin.companies.loanapplication.update-status') . '" id="update_status">
            <div class="form-group">
                <label class="form-label" for="example-password">Change Status</label>
                <select name="status" id="status" class="form-control">
                <option value="">--Select Status--</option>';
        $html .= '<option ';
        if ($current_status == 'Pending') $html .= ' selected ';
        $html .= 'value="Pending">Pending</option>
                <option ';
        if ($current_status == 'Approved') $html .= ' selected ';
        $html .= 'value="Approved">Approved</option>
                <option';
        if ($current_status == 'Cancelled') $html .= ' selected ';
        $html .= ' value="Cancelled">Cancelled</option>
                <option ';
        if ($current_status == 'Paid') {
            $html .= ' selected  ';
        }
        $html .= ' value="Paid">Paid</option>
                </select>
                <input type="hidden" name="id" value="' . $id . '">
            </div>
        </form>';
        return $html;
    }


    public function updateLoanApplicationStatus(Request $request)
    {
        try {
            $currentUser = LoanApplication::find($request->id);
            $currentUser->fill([
                'status'  =>  $request->get('status')
            ])->save();
            return $this->sendResponse($currentUser, 'Status Changed to ' . $request->get('status'));
        } catch (\Exception $exception) {
            return $this->sendError('Something went Wrong, Try again later');
        }
    }
}
