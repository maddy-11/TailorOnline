<?php

namespace App\Http\Controllers\Admin\Auth\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Permission\CreatePermissionRequest;
use App\Http\Requests\Auth\Permission\DeletePermissionRequest;
use App\Http\Requests\Auth\Permission\EditPermissionRequest;
use App\Http\Requests\Auth\Permission\ManagePermissionRequest;
use App\Http\Requests\Auth\Permission\StorePermissionRequest;
use App\Http\Requests\Auth\Permission\UpdatePermissionRequest;
use App\Http\Responses\RedirectResponse;
use App\Models\Auth\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\CommonMethods;

class PermissionsController extends Controller
{
    /**
     * @param \App\Repositories\Backend\Auth\PermissionRepository $repository
     */
    public function __construct()
    {
    }

    /**
     * @param ManagePermissionRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(Request $request)
    {
        return view('auth.permissions.index');
    }
    public function list(Request $request)
    {
        return Datatables::of($this->getForDataTable())
            ->editColumn('created_at', function ($permission) {
                return $permission->created_at->toDateString();
            })
            ->addColumn('actions', function ($permission) {
                $html = " <div class='d-flex mt-2'>
                <a href='javascript:void(0);' class='btn btn-sm btn-outline-danger mr-2' title='Delete'>
                    <i class='fal fa-times'></i> Delete</a>
                <a href='" . route('admin.permissions.edit', $permission->id) . "' class='btn btn-sm btn-outline-primary mr-2' title='Edit'>
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
        $query = Permission::query()
            ->select([
                'id', 'name', 'guard_name', 'created_at'
            ]);
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\Permission\CreatePermissionRequest $request
     *
     * @return \App\Http\Responses\Backend\Auth\Permission\CreateResponse
     */
    public function create()
    {
        echo 'create';
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\Permission\StorePermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePermissionRequest $request)
    {
        //$this->repository->create($request->except(['_token', '_method'])); 
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $field)
    {
        //
    }

    /**
     * @param \App\Models\Auth\Permission $permission
     * @param \App\Http\Requests\Backend\Auth\Permission\EditPermissionRequest $request
     *
     * @return \App\Http\Responses\Backend\Auth\Permission\EditResponse
     */
    public function edit(Permission $permission, EditPermissionRequest $request)
    {
        echo 'edit;';
    }

    /**
     * @param App\Models\Auth\Permission $permission
     * @param \App\Http\Requests\Backend\Auth\Permission\UpdatePermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Permission $permission, UpdatePermissionRequest $request)
    {
       /*  $this->repository->update($permission, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.auth.permission.index'), ['flash_success' => __('alerts.backend.access.permissions.updated')]); */
    }

    /**
     * @param App\Models\Auth\Permission $permission
     * @param \App\Http\Requests\Backend\Auth\Permission\DeletePermissionRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Permission $permission, DeletePermissionRequest $request)
    {
        /* $this->repository->delete($permission);

        return new RedirectResponse(route('admin.auth.permission.index'), ['flash_success' => __('alerts.backend.access.permissions.deleted')]); */
    }
}
