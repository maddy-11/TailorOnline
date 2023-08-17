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
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);">company</a></li>
    <li class="breadcrumb-item">Supplier</li>
    <li class="breadcrumb-item active">Edit</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-edit'></i>Update Basic Information
        <small>
            Default input elements for forms
        </small>
    </h1>
</div>
<div class="row">

    <div class="col-xl-12">

        <div id="panel-4" class="panel">
            <div class="panel-hdr">
                <h2>Altering <span class="fw-300"><i>with utilities</i></span></h2>

            </div>
            <div class="panel-container show">
                <form action="{{route('company.suppliers.update',$supplier->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="panel-content">
                        <div class="panel-tag"></div>
                        <div class="row ">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="bran_name" class="form-label">Brand Name</label>
                                    <input type="text" id="bran_name" name="bran_name" class="form-control form-control-lg rounded-0" value="{{ old('bran_name',$supplier->bran_name) }}" placeholder="Brand Name">
                                    @error('bran_name')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="full_business_name" class="form-label">Full Business Name</label>
                                    <input type="text" id="full_business_name" name="full_business_name" class="form-control form-control-lg rounded-0" value="{{ old('full_business_name',$supplier->full_business_name) }}" placeholder="Full Business Name">
                                    @error('full_business_name')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg rounded-0  @error('email') is-invalid @enderror" value="{{ old('email',$supplier->email) }}" placeholder="email address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" id="bank_name" name="bank_name" class="form-control form-control-lg rounded-0  @error('bank_name') is-invalid @enderror" value="{{ old('bank_name',$supplier->bank_name) }}" placeholder="Bank Name">
                                    @error('bank_name')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="panel-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="bank_account_number" class="form-label">Bank Account Number</label>
                                    <input type="text" id="bank_account_number" name="bank_account_number" class="form-control form-control-lg rounded-0  @error('bank_account_number') is-invalid @enderror" value="{{ old('bank_account_number',$supplier->bank_account_number) }}" placeholder="Bank Account Number">
                                    @error('bank_account_number')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="contact_person" class="form-label">Contact Person</label>
                                    <input type="text" id="contact_person" name="contact_person" class="form-control form-control-lg rounded-0  @error('contact_person') is-invalid @enderror" value="{{ old('contact_person',$supplier->contact_person) }}" placeholder="Contact Person">
                                    @error('contact_person')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="contact_person_phone" class="form-label">Contact Person Phone</label>
                                    <input type="text" id="contact_person_phone" name="contact_person_phone" class="form-control form-control-lg rounded-0  @error('contact_person_phone') is-invalid @enderror" value="{{ old('contact_person_phone',$supplier->contact_person_phone) }}" placeholder="Contact Person Phone">
                                    @error('contact_person_phone')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="panel-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address">{{ old('address',$supplier->address) }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row float-right">
                        <button class="btn btn-warning mr-4 waves-effect waves-themed" type="button" onclick="location.href='{{route('company.suppliers.index')}}'">Cancel</button>
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