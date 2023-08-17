{{-- mainLayouts extends --}}
@extends('admin.layouts.app')

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
    <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
    <li class="breadcrumb-item">Form Stuff</li>
    <li class="breadcrumb-item active">Basic Inputs</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-edit'></i> Basic Inputs
        <small>
            Default input elements for forms
        </small>
    </h1>
</div>
<div class="row">

    <div class="col-xl-12">

        <div id="panel-4" class="panel">
            <div class="panel-hdr">
                <h2>
                    Altering <span class="fw-300"><i>with utilities</i></span>
                </h2>

            </div>
            <div class="panel-container show">


                <form action="{{route('admin.suppliers.store')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="panel-content">
                        <div class="panel-tag"></div>
                        <div class="row ">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control form-control-lg rounded-0" value="{{ old('first_name') }}" placeholder="First Name">

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control form-control-lg rounded-0" value="{{ old('last_name') }}" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg rounded-0  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control form-control-lg rounded-0  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Phone">
                                    @error('phone')
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
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg rounded-0 @error('password') is-invalid @enderror" value="{{ old('password') }}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="dob" class="form-label">Dob</label>
                                    <input type="text" id="dob" name="dob" class="form-control form-control-lg rounded-0" value="{{ old('dob') }}" readonly placeholder="{{date('m/d/Y')}}">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="custom-select" id="gender" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="panel-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address">{{ old('address') }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row float-right">
                        <button class="btn btn-warning mr-4 waves-effect waves-themed" type="button"  onclick="location.href='{{route('admin.suppliers.index')}}'">Cancel</button>
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