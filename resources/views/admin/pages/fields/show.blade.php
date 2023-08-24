{{-- mainLayouts extends --}}
@extends('admin.layouts.app')

{{-- Page title --}}
@section('title', 'companies')
{{-- vendor styles --}}

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" media="screen, print" href="{{asset('assets/css/notifications/sweetalert2/sweetalert2.bundle.css')}}">
<link rel="stylesheet" media="screen, print" href="css/theme-demo.css">
@endsection
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
    <li class="breadcrumb-item">Core Plugins</li>
    <li class="breadcrumb-item active">SmartPanels</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-shield-alt'></i> SmartPanels <sup class='badge badge-success fw-500'>{{$currentUser->status}}</sup>
        <small>
            Panels can be used in almost any situation, helping wrap everything in a slick & lightweight container
        </small>
    </h1>
</div>
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            <i class="fal fa-times"></i>
        </span>
    </button>
    <div class="d-flex flex-start w-100">
        <div class="mr-2">
            <span class="icon-stack icon-stack-lg">
                <i class="base-2 icon-stack-3x color-primary-400"></i>
                <i class="base-3 icon-stack-2x color-primary-600 opacity-70"></i>
                <i class="fal fa-lightbulb icon-stack-1x text-white opacity-90"></i>
            </span>
        </div>
        <div class="d-flex flex-fill">
            <div class="flex-fill">
                <span class="h5">{{$currentUser->company->first_name.' '.$currentUser->company->last_name;}}</span>
                <p class="mb-0">
                    {{$currentUser->remarks}}
                </p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white d-flex align-items-center">
        <h4 class="m-0">
            Documentation
            <small>SmartPanel information and how to use them</small>
        </h4>
    </div>
    <div class="card-body">
        <h5 class="frame-heading">Usage Data Atributes</h5>
        <div class="frame-wrap">
            <div class="table-responsive">
                <table class="table table-bordered mb-g">
                    <thead>
                        <tr>
                            <td>
                                Theme Name
                            </td>
                            <td>
                                Theme URL
                            </td>
                            <td>
                                Theme Colors
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>
                                Supplier
                            </td>
                            <td>
                                <code>{{$currentUser->supplier->full_business_name}}</code>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                Loan Amount
                            </td>
                            <td>
                                <code>{{$currentUser->supplier->full_business_name}}</code>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>
                                Invoice Number
                            </td>
                            <td>
                                <code>{{$currentUser->invoice_number}}</code>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>
                                Invoice Date
                            </td>
                            <td>
                                <code>{{$currentUser->invoice_date}}</code>
                            </td>
                            
                        </tr>


                        <tr>
                            <td>
                                Invoice
                            </td>
                            <td>
                                <code>{{$currentUser->invoice}}</code>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>
                                Deliver Order Invoice
                            </td>
                            <td>
                                <code>{{$currentUser->delivery_order_invoice}}</code>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>
                                Deliver Order Date
                            </td>
                            <td>
                                <code>{{$currentUser->delivery_order_date}}</code>
                            </td>
                            
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
@section('page-scripts')
<script src="{{asset('assets/js/datagrid/datatables/datatables.bundle.js')}}"></script>


<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="{{asset('assets/js/notifications/sweetalert2/sweetalert2.bundle.js')}}"></script>

<script>
    $(document).ready(function() {

    });
</script>

@endsection