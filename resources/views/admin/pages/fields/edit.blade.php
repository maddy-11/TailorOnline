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
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
    <li class="breadcrumb-item">Field</li>
    <li class="breadcrumb-item active">Edit</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-edit'></i>Update Field
        <small>

        </small>
    </h1>
</div>
<div class="row">

    <div class="col-xl-12">

        <div id="panel-4" class="panel">
            <div class="panel-hdr">
                <h2>Please <span class="fw-300"><i>fill all the required fields</i></span></h2>

            </div>
            <div class="panel-container show">
                <form action="{{route('admin.fields.update',$field->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    @method('PUT')
                    <div class="panel-content">
                        <div class="panel-tag"></div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="label" class="form-label">Label</label>
                                    <input type="text" id="label" name="label" class="form-control form-control-lg rounded-0" value="{{$field->label}}" placeholder="Label">
                                    @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="field_type" class="form-label">Field Type</label>
                                    <select class="custom-select" id="field_type" name="field_type">
                                        <option value="input" @if($field->field_type == 'input') selected @endif >Input</option>
                                        <option value="textarea" @if($field->field_type == 'textarea') selected @endif >Textarea</option>
                                        <option value="select" @if($field->field_type == 'select') selected @endif >Select</option>
                                        <option value="radio" @if($field->field_type == 'radio') selected @endif >Radio</option>
                                        <option value="checkbox" @if($field->field_type == 'checkbox') selected @endif >Checkbox</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="sort_order" class="form-label">Sort Order</label>
                                    <input type="text" id="sort_order" name="sort_order" class="form-control form-control-lg rounded-0  @error('sort_order') is-invalid @enderror" value="{{$field->sort_order}}" placeholder="Sort Order">
                                    @error('sort_order')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                            </div><div class="col-lg-2">
                                <div class="form-group">
                                    <label for="status" class="form-label">status</label>
                                    <select class="custom-select" id="status" name="status">
                                        <option value="Active" @if($field->status == 'Active') selected @endif >Active</option>
                                        <option value="Inactive" @if($field->status == 'InActive') selected @endif>InActive</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
 
                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row float-right">
                        <button class="btn btn-warning mr-4 waves-effect waves-themed" type="button" onclick="location.href='{{route('admin.fields.index')}}'">Cancel</button>
                        <button class="btn btn-primary waves-effect waves-themed" type="submit">Update</button>
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