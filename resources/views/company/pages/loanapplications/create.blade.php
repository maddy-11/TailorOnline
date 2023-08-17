{{-- mainLayouts extends --}}
@extends('company.layouts.app')

{{-- Page title --}}
@section('title', 'Dashboard')
{{-- vendor styles --}}

{{-- page styles --}}
@section('page-styles')

<link rel="stylesheet" media="screen, print" href="{{asset('assets/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')}}">
<style>
    .invalid-feedback {
        display: block;
    }
</style>
@endsection
@section('content')

<!-- END Page Header -->
<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->

<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
    <li class="breadcrumb-item">Loan Application</li>
    <li class="breadcrumb-item active">Create New</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-edit'></i> Loan Application 
        <small>
           Form
        </small>
    </h1>
</div>
<div class="row">

    <div class="col-xl-12">

        <div id="panel-4" class="panel">
            <div class="panel-hdr">
                <h2>
                    Please <span class="fw-300"><i>fill Required data</i></span>
                </h2>

            </div>
            <div class="panel-container show">
                <form action="{{route('company.loanapplications.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-content">
                        <div class="panel-tag"></div>
                        <div class="row ">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="loan_amount" class="form-label">Loan Amount</label>
                                    <input type="text" id="loan_amount" name="loan_amount" class="form-control form-control-lg rounded-0" value="{{ old('loan_amount') }}" placeholder="">
                                    @error('loan_amount')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="invoice_number" class="form-label">Invoice Number</label>
                                    <input type="text" id="invoice_number" name="invoice_number" class="form-control form-control-lg rounded-0" value="{{ old('invoice_number') }}" placeholder="">
                                    @error('invoice_number')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="invoice_date" class="form-label">Invoice Date</label>
                                    <input type="date" id="invoice_date" name="invoice_date" class="form-control form-control-lg rounded-0  @error('invoice_date') is-invalid @enderror" value="{{ old('invoice_date') }}" placeholder="">
                                    @error('invoice_date')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group"><label for="invoice" class="form-label">Invoice Document</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control form-control-lg rounded-0  @error('invoice') is-invalid @enderror" id="invoice" name="invoice">
                                            <label class="custom-file-label" for="invoice" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                        @error('invoice')
                                        <span class="invalid-feedback" role="alert"> {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="panel-content">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="inputGroupSelect01">Select A Supplier</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="supplier_id">
                                            <option selected>Choose...</option>
                                            @if(!empty($suppliers))
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->full_business_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks/Description/Comments">{{ old('remarks') }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row float-right">
                        <button class="btn btn-warning mr-4 waves-effect waves-themed" type="button" onclick="location.href='{{route('company.loanapplications.index')}}'">Cancel</button>
                        <button class="btn btn-primary waves-effect waves-themed" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('page-scripts')
<script src="{{asset('assets/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script>
    $(document).ready(function() {

        // Class definition
        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }
        // enable clear button 
        $('#dob').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            templates: controls
        });
        // initialize datatable
        var example_gridsize = $("#example-gridsize");
        $("#gridrange").on("input change", function() { //do something
            example_gridsize.attr("placeholder", ".col-" + $(this).val());
            example_gridsize.parent().removeClass().addClass("col-" + $(this).val())
            console.log("col-" + $(this).val());
        });
    });
</script>

@endsection