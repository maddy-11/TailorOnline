<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Field;
use App\Models\Admin\FormField;
use Illuminate\Http\Request;

use App\Http\Requests\Fields\StoreRequest;
use App\Http\Requests\Fields\UpdateRequest;

use Yajra\DataTables\Facades\DataTables;
use App\Traits\CommonMethods;
use Carbon\Carbon;

class FormFieldController extends Controller
{
    use CommonMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.services.index');
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
        $query = FormField::query()
            ->select([
                'id', 'service_id', 'field_id', 'sort_order', 'required', 'created_at'
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
        $fields = Field::where('status', 'Active',)->get();
        return view('admin.pages.fieldvalues.create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $inputs = $request->all();
            $inputs['image'] = '';
            if ($request->hasFile('image')) {
                $inputs['image'] = $this->uploadOne($request->image, $this->upload_path);
            }
            FormFieldValue::create($inputs);
            session()->flash('success', 'Record saved successfully');
        } catch (\Exception $exception) {
            session()->flash('error', 'Something went Wrong, Try again later');
        }
        return redirect(route('admin.fieldvalues.index'));
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
        //
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
        //
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
}
