<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Supplier\Supplier;
use App\Http\Requests\Suppliers\StoreRequest;
use App\Http\Requests\Suppliers\UpdateRequest;
use App\Http\Requests\Suppliers\UpdatePasswordRequest;
use App\Traits\CommonMethods;

use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{

    use CommonMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.pages.suppliers.index');
    }

    public function list(Request $request)
    {
        return Datatables::of($this->getForDataTable())
            ->editColumn('created_at', function ($supplier) {
                return $supplier->created_at->toDateString();
            })->editColumn('status', function ($supplier) {
                if ($supplier->status == 'Pending')
                    $html = '<span class="dtr-data"><span class="badge badge-primary badge-pill">Pending!</span></span>';
                else
                    $html = '<span class="dtr-data"><span class="badge badge-success badge-pill">Approved</span></span>';
                return $html;
            })
            ->addColumn('actions', function ($supplier) {
                $html = " <div class='d-flex mt-2'>
                <a href='javascript:void(0);' class='btn btn-sm btn-outline-danger mr-2' title='Delete Supplier'>
                    <i class='fal fa-trash'></i> Delete</a>
                <a href='" . route('company.suppliers.edit', $supplier->id) . "' class='btn btn-sm btn-outline-primary mr-2' title='Edit Supplier'>
                    <i class='fal fa-edit'></i> Edit</a>
                    <!-- Button trigger modal --></div>";
                return $html;
            })->filter(function ($supplier) {
                if (request()->has('status')) {
                    $supplier->where('status', 'like', "%" . request('status') . "%");
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

        $query = Supplier::query()
            ->select([
                'id',
                'bran_name',
                'full_business_name',
                'email',
                'last_ip',
                'logo',
                'status',
                'contact_person',
                'contact_person_phone',
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
        return view('company.pages.suppliers.create');
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
            $inputs['company_id'] = 1;
            Supplier::create($inputs);
            session()->flash('success', 'New Supplier Added Successfully');
        } catch (\Exception $exception) {
            session()->flash('error', 'Something went Wrong, Try again later');
        }
        return redirect(route('company.suppliers.index'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('company.pages.suppliers.edit', compact('supplier'));
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
            $supplier = Supplier::find($id);
            $supplier->fill($request->except(['_token', '_method']))->save();
            session()->flash('success', 'Supplier Updated Successfully');
        } catch (\Exception $exception) {
            session()->flash('error', 'Something went Wrong, Try again later');
        }
        return redirect(route('company.suppliers.index'));
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
        $html = '<form method="POST" action="' . route('company.supplier.update-password') . '" id="update_password">
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
            $currentUser = Supplier::find($request->id);
            $currentUser->fill([
                'password'  =>  Hash::make($request->get('password'))
            ])->save();
            return $this->sendResponse($currentUser, 'Password Changed Successfully.');
        } catch (\Exception $exception) {
            return $this->sendError('Something went Wrong, Try again later');
        }
    }
}
