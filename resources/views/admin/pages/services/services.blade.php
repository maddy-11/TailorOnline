{{-- mainLayouts extends --}}
@extends('admin.layouts.app')

{{-- Page title --}}
@section('title', 'companies')
{{-- vendor styles --}}
<style>
	td{
		width: 25%;
	}
</style>
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" media="screen, print" href="{{asset('assets/css/notifications/sweetalert2/sweetalert2.bundle.css')}}">
<link rel="stylesheet" media="screen, print" href="css/theme-demo.css">
@endsection
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item">
        <a href="javascript:void(0);">Admin</a>
    </li>
    <li class="breadcrumb-item">Services</li>
    <li class="breadcrumb-item active">List</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block">
        <span class="js-get-date"></span>
    </li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-table"></i> Services:
        <span class="fw-300">List</span>
        <sup class="badge badge-primary fw-500">ADDON</sup>
        <small>

        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Example <span class="fw-300"><i>Table</i></span>
                </h2>
                <div class="panel-toolbar">
                    <a href="{{route('admin.services.create')}}" class="btn btn-primary btn-sm waves-effect waves-themed">Create New</a>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Status</th> 
                                <th>Sort Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        	@foreach($data as $item)
                        	<tr>
                        		<td>{{$item->name}}</td>
                        		<td>{{$item->status}}</td>
                        		<td>{{$item->sort_order}}</td>
                        		<td>
                        			<select class="form-control col-lg-7" aria-label="Default select example">
									  <option selected disabled class="font-weight-bold">Action</option>
									  <option value="1">One</option>
									  <option value="2">Two</option>
									  <option value="3">Three</option>
									  </select>

                        		</td>
                        	</tr>

                        	@endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Service Name</th>
                                <th>Status</th> 
                                <th>Sort Order</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- datatable end -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal center -->
<div class="modal fade" id="default-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">

                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modal-button">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
