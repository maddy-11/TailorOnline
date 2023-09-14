<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FormFieldValue;
use App\Models\Admin\Field;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\CommonMethods;
use Carbon\Carbon;

class FieldValueController extends Controller
{
    use CommonMethods;
    protected $upload_path;

    public function __construct()
    {
        $this->upload_path    = 'fieldvalues';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.fieldvalues.index');
    }


    public function list(Request $request)
    {
        return Datatables::of($this->getForDataTable())
            ->editColumn('created_at', function ($field) {
                return $field->created_at->toDateString();
            })->editColumn('image', function ($field) { 
                $html = " <img width='100' src='" . asset('storage/' . $field->image) . "' title='Option Value'>";
                return $html;
            })->editColumn('field_id', function ($field) { 
                return $field->field->label; 
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
        $query = FormFieldValue::query()
            ->select([
                'id', 'field_id', 'option_value', 'sort_order', 'image', 'status', 'created_at'
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
        $fields = Field::where('status', 'Active')->get();
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
     * @param  \App\Models\Admin\FormFieldValue  $formFieldValue
     * @return \Illuminate\Http\Response
     */
    public function show(FormFieldValue $formFieldValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\FormFieldValue  $formFieldValue
     * @return \Illuminate\Http\Response
     */
    public function edit(FormFieldValue $formFieldValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\FormFieldValue  $formFieldValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormFieldValue $formFieldValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\FormFieldValue  $formFieldValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormFieldValue $formFieldValue)
    {
        //
    }
}
