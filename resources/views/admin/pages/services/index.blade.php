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
@section('page-scripts')
<script src="{{asset('assets/js/datagrid/datatables/datatables.bundle.js')}}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="{{asset('assets/js/notifications/sweetalert2/sweetalert2.bundle.js')}}"></script>

<script>
    $(document).ready(function() { 
        $('#dt-basic-example').DataTable({
            lengthMenu: [
                [10, 25, 50, 75, 100],
                ['10', '25', '50', '75', '100']
            ],
            pageLength: 25,
            ajax: {
                url: "{!! route('admin.formfields.list') !!}",
                type: 'get'
            },
            columns: [{
                    data: 'name'
                },
                {
                    data: 'status'
                },
                {
                    data: 'sort_order'

                },
                {
                    data: 'actions'
                }
            ],
            responsive: true,
            processing: true,
            serverSide: true,
            searching: true,
            sorting: true,
        });



        $(document).on('click', '.default-example-modal-center', function(e) {
            e.preventDefault();
            var case_id = $(this).data('id');
            var status = $(this).data('status');
            $.ajax({
                url: case_id + '?current_status=' + status,
                type: "GET",
                dataType: 'html',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#overlay').fadeIn();
                    var modal_title = 'Update <small class="m-0 text-muted">Status</small>';
                    $('.modal-title').html(modal_title);
                    $(".modal-body").html('Please wait data is loading...');
                    $('#default-example-modal-center').modal('show');
                }
            }).done(function(response) {
                $("#overlay").hide();
                if (response) {
                    $('#default-example-modal-center').modal('show');
                    $(".modal-body").html(response);
                } else {
                    //Swal.fire('There was an error', '', 'info');
                }
            }); // DONE ENDS HERE
        });



        $(document.body).on('click', '#modal-button', function() {
            var form = $('#update_status')[0];
            let formData = new FormData(form);
            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    //Swal.fire('Please Wait you data is beign processed...', '', 'question');
                    $('.modal-title').html('Processing Your Request.');
                }
            }).done(function(response) {
                if (response.success) {
                    $('#default-example-modal-center').modal('hide');
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'info'
                    }).then((result) => {
                        location.reload();
                    });
                    $('#submit').html('Submit');
                    $("#submit").attr("disabled", false);
                } else {
                    $('#submit').html('Submit');
                    $("#submit").attr("disabled", false);
                    Swal.fire('There was an error', '', 'info');
                }
            }).fail(function(jqXhr, textStatus, errorMessage) {
                Swal.fire('Error ' + errorMessage, '', 'info');
                $('#submit').html('Submit');
                $("#submit").attr("disabled", false);
            }).always(function() {
                //alert("complete");
            }); // DONE ENDS HERE
        });
    });
</script>

@endsection