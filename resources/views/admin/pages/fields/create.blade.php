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
    .fs{
        font-size: 1.5rem;
        padding: 0;

    }
    .fs-s{
        font-size: 1rem;
/*        padding: 0;*/
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
                <form action="{{route('admin.fields.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-content">
                        <div class="panel-tag"></div>
                        <div class="row ">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="label" class="form-label">Label</label>
                                    <input type="text" id="label" name="label" class="rounded form-control form-control-lg " value="{{ old('label') }}" placeholder="Label">
                                    @error('label')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div> 




                            <div class="col-lg-4 ">
                                <div class="form-group">
                                    <label for="sort_order" class="form-label">Order</label>
                                    <input type="number" id="sort_order" name="sort_order" class="rounded form-control form-control-lg   @error('sort_order') is-invalid @enderror" value="{{ old('sort_order') }} " placeholder="sort_order">
                                    @error('sort_order')
                                    <span class="invalid-feedback" role="alert"> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>


                                <div class="col-lg-9 my-5">
                                <div class="form-group">
                                    <label for="field_type" class="form-label">Field Type</label>
                                    <select onchange="addInitialInputs()" class="form-control form-control-lg rounded" id="field_type" name="field_type">
                                        <option disabled selected value="">Choose Field</option>
                                        <option value="input">Input</option>
                                        <option value="textarea">Textarea</option>
                                        <option value="select">Select</option>
                                        <option value="radio">Radio</option>
                                        <option value="checkbox">Checkbox</option>
                                    </select>
                                </div>
                            </div>

                            <!-- ---------------- -->
                            <div class="col-lg-12">
                            <div class="col-lg-10 m-0 mb-5 row p-0 " id="containerDiv" >

                               
                                
                            </div>

                            <div class="row d-none" id="btn_hide" style="justify-content: center;align-items: center;">
                                <div onclick="addInput(this)" class="btn btn-dark text-center m-1 fs px-3">+</div>
                                <div onclick="removeInput()" class="btn btn-dark text-center m-1 fs px-3">--</div>
                            </div>
                        </div>
                            <!-- ---------------- -->

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control custom-select" id="status" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">In Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="status" class="form-label">Services</label>

                                     <select class="select2 form-control form-control custom-select" placeholder="Services"  multiple="multiple" name="ms_item[]" >
                                        
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                                    
                                    </select>
                                    </div>
                            </div>

                        </div>
                    </div> 

                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row float-right">
                        <button class="btn btn-warning mr-4 waves-effect waves-themed" type="button" onclick="location.href='{{route('admin.fields.index')}}'">Cancel</button>
                        <button class="btn btn-primary waves-effect waves-themed" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- --------------------------- -->

<script>

function addInitialInputs() {
    var selectedOption = document.getElementById("field_type").value;
    var containerDiv = document.getElementById("containerDiv");
    var btn = document.getElementById('btn_hide');

    if (selectedOption === "select" || selectedOption === "radio" || selectedOption === "checkbox") {
        btn.classList.remove('d-none');
        containerDiv.innerHTML = "";

        for (let i = 1; i <= 2; i++) {
            containerDiv.innerHTML += `
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="text" placeholder="Option ${i}" class="fs-s rounded form-control" name="option[]">
                    </div>
                </div>
            `;
        }
    }
    else{
        containerDiv.innerHTML = "";
        btn.classList.add('d-none');
    }
}

function addInput() {
    var containerDiv = document.getElementById("containerDiv");
    var inputCount = containerDiv.querySelectorAll("input").length + 1;

    if (inputCount <= 10) { 
        var newContainer = document.createElement("div");
        newContainer.className = "col-lg-5";

        newContainer.innerHTML = `
            <div class="form-group">
                <input type="text" placeholder="Option ${inputCount}" class="fs-s mt-1 rounded form-control" name="option[]">
            </div>
        `;

        containerDiv.appendChild(newContainer);
    }

}



function removeInput() {
    
    var containerDiv = document.getElementById("containerDiv");
    var inputContainers = containerDiv.querySelectorAll(".col-lg-5");

    if (inputContainers.length >= 2) {
        
        var lastContainer = inputContainers[inputContainers.length - 1];
        containerDiv.removeChild(lastContainer);
    }
}



</script>

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
<script>
            $(document).ready(function()
            {
                $(function()
                {
                    $('.select2').select2();

                    $(".select2-placeholder-multiple").select2(
                    {
                        placeholder: "Select State"
                    });
                    $(".js-hide-search").select2(
                    {
                        minimumResultsForSearch: 1 / 0
                    });
                    $(".js-max-length").select2(
                    {
                        maximumSelectionLength: 2,
                        placeholder: "Select maximum 2 items"
                    });
                    $(".select2-placeholder").select2(
                    {
                        placeholder: "Select a state",
                        allowClear: true
                    });

                    $(".js-select2-icons").select2(
                    {
                        minimumResultsForSearch: 1 / 0,
                        templateResult: icon,
                        templateSelection: icon,
                        escapeMarkup: function(elm)
                        {
                            return elm
                        }
                    });

                    function icon(elm)
                    {
                        elm.element;
                        return elm.id ? "<i class='" + $(elm.element).data("icon") + " mr-2'></i>" + elm.text : elm.text
                    }

                    $(".js-data-example-ajax").select2(
                    {
                        ajax:
                        {
                            url: "https://api.github.com/search/repositories",
                            dataType: 'json',
                            delay: 250,
                            data: function(params)
                            {
                                return {
                                    q: params.term, // search term
                                    page: params.page
                                };
                            },
                            processResults: function(data, params)
                            {
                                // parse the results into the format expected by Select2
                                // since we are using custom formatting functions we do not need to
                                // alter the remote JSON data, except to indicate that infinite
                                // scrolling can be used
                                params.page = params.page || 1;

                                return {
                                    results: data.items,
                                    pagination:
                                    {
                                        more: (params.page * 30) < data.total_count
                                    }
                                };
                            },
                            cache: true
                        },
                        placeholder: 'Search for a repository',
                        escapeMarkup: function(markup)
                        {
                            return markup;
                        }, // let our custom formatter work
                        minimumInputLength: 1,
                        templateResult: formatRepo,
                        templateSelection: formatRepoSelection
                    });

                    function formatRepo(repo)
                    {
                        if (repo.loading)
                        {
                            return repo.text;
                        }

                        var markup = "<div class='select2-result-repository clearfix d-flex'>" +
                            "<div class='select2-result-repository__avatar mr-2'><img src='" + repo.owner.avatar_url + "' class='width-2 height-2 mt-1 rounded' /></div>" +
                            "<div class='select2-result-repository__meta'>" +
                            "<div class='select2-result-repository__title fs-lg fw-500'>" + repo.full_name + "</div>";

                        if (repo.description)
                        {
                            markup += "<div class='select2-result-repository__description fs-xs opacity-80 mb-1'>" + repo.description + "</div>";
                        }

                        markup += "<div class='select2-result-repository__statistics d-flex fs-sm'>" +
                            "<div class='select2-result-repository__forks mr-2'><i class='fal fa-lightbulb'></i> " + repo.forks_count + " Forks</div>" +
                            "<div class='select2-result-repository__stargazers mr-2'><i class='fal fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
                            "<div class='select2-result-repository__watchers mr-2'><i class='fal fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
                            "</div>" +
                            "</div></div>";

                        return markup;
                    }

                    function formatRepoSelection(repo)
                    {
                        return repo.full_name || repo.text;
                    }
                });
            });

        </script>
@endsection