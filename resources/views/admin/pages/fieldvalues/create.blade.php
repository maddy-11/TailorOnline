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
    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
    <li class="breadcrumb-item">Fields</li>
    <li class="breadcrumb-item active">New Field</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-edit'></i> Create Field
        <small>
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-4" class="panel">
            <div class="panel-hdr">
                <h2>
                    Please Fill <span class="fw-300"><i>required information</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <form action="{{route('admin.fieldvalues.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-content">
                        <div class="panel-tag"></div>
                        <div class="row ">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="field_id" class="form-label">Select Field</label>
                                    <select class="custom-select form-control  rounded-0" id="field_id" name="field_id">
                                        <option value="-- Select Field --">-- Select Field --</option>
                                        @if(!empty($fields))
                                        @foreach($fields as $field)
                                        <option value="{{$field->id}}">{{$field->label}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="option_value" class="form-label">Option Value</label>
                                    <input type="text" id="option_value" name="option_value" class="form-control rounded-0" value="{{ old('option_value') }}" placeholder="Option Value">
                                    @error('option_value')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group mb-0">
                                    <label class="form-label">Option Image (Browser)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose Image</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="sort_order" class="form-label">sort_order</label>
                                    <input type="number" id="sort_order" name="sort_order" class="form-control  rounded-0  @error('sort_order') is-invalid @enderror" value="{{ old('sort_order') }}" placeholder="sort_order">
                                    @error('sort_order')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="custom-select form-control  rounded-0" id="status" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row float-right">
                        <button class="btn btn-warning mr-4 waves-effect waves-themed" type="button" onclick="location.href='{{route('admin.fieldvalues.index')}}'">Cancel</button>
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