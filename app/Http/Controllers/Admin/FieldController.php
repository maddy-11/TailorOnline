<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Field;
use App\Models\Admin\Service;
use App\Models\Fields_service;
use Illuminate\Http\Request;
use App\Http\Requests\Fields\StoreRequest;
use App\Http\Requests\Fields\UpdateRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\CommonMethods;
use Carbon\Carbon;

class FieldController extends Controller
{
    use CommonMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.fields.index');
    }

    public function list(Request $request)
    {
        return Datatables::of($this->getForDataTable())
            ->editColumn('created_at', function ($field) {
                return $field->created_at->toDateString();
            })
            ->addColumn('actions', function ($field) {
                $html = " <div class='d-flex mt-2'>
                <a href='javascript:void(0);' class='btn btn-sm btn-outline-danger mr-2' title='Delete'>
                    <i class='fal fa-times'></i> Delete</a>
                <a href='" . route('admin.fields.edit', $field->id) . "' class='btn btn-sm btn-outline-primary mr-2' title='Edit'>
                    <i class='fal fa-edit'></i> Edit</a>
                    <button type='button'  data-status ='" . $field->status . "' data-id ='" . route('admin.fields.change-status', ['id' => $field->id]) . "' class='btn btn-sm btn-outline-primary mr-2 default-example-modal-center' title='Change Status'>Status</button>
                <div class='dropdown d-inline-block'>
                    <a href='#'' class='btn btn-sm btn-outline-primary mr-2' data-toggle='dropdown' aria-expanded='true' title='More options'>
                        <i class='fal fa-plus'></i>
                    </a>
                    <div class='dropdown-menu'></div>
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
        $query = Field::query()
            ->select([
                'id', 'label', 'field_type', 'sort_order', 'status', 'created_at'
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
        $services = Service::get();
        // dd($services);
        return view('admin.pages.fields.create',['services'=>$services]);
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

                if (isset($inputs['option']) && !empty($inputs['option'])) {
                    $options = $inputs['option'];

                    $options = array_filter($options, function ($value) {return $value !== null;});
                    // return $options;

                } 
                else {
                    $options = []; 
                }
        $fieldInsertion = Field::create($inputs);

        $field_id = $fieldInsertion->id;
        $services = $inputs['ms_item'];

        // $options = $inputs['option'];

        foreach ($services as $service) {
            Fields_service::create([
                'field_id' => $field_id,
                'services_id' => $service
            ]);
        }
        
        return redirect('admin/fields');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        return view('admin.pages.fields.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Field $field)
    {
        try {
            $field->fill($request->except(['_token', '_method']))->save();
            session()->flash('success', 'Field Updated Successfully');
        } catch (\Exception $exception) {
            session()->flash('error', 'Something went Wrong, Try again later');
        }
        return redirect(route('admin.fields.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        $field->delete();
        session()->flash('success', 'Field Deleted Successfully');
        return redirect(route('admin.fields.index'));
    }



    public function changeStatus(Request $request, $id)
    {
        $current_status = $request->get('current_status');

        $html = '
        <form method="POST" action="' . route('admin.fields.update-status') . '" id="update_status">
            <div class="form-group">
                <label class="form-label" for="example-password">Change Status</label>
                <select name="status" id="status" class="form-control">
                <option value="">--Select Status--</option>';
        $html .= '<option ';
        if ($current_status == 'Active') $html .= ' selected ';
        $html .= 'value="Active">Active</option>
                <option ';
        if ($current_status == 'Inactive') $html .= ' selected ';
        $html .= 'value="Inactive">Inactive</option>
                <option 
                </select>
                <input type="hidden" name="id" value="' . $id . '">
            </div>
        </form>';
        return $html;
    }


    public function updateStatus(Request $request)
    { 
        try {
            $field = Field::find($request->id);
            $field->fill([
                'status'  =>  $request->get('status')
            ])->save();
            return $this->sendResponse($field, 'Status Changed to ' . $request->get('status'));
        } catch (\Exception $exception) {
            return $this->sendError('Something went Wrong, Try again later');
        }
    }
}
