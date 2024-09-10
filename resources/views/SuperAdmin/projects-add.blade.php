@include('SuperAdmin/header')

<main class="main-wrapper col-md-10 col-lg-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">Projects</h1>
    </div>

    <div class="row my-4">
        <div class="col-lg-12 col-12">
            <div class="custom-block custom-block-transation-detail bg-white">
                <div class="d-flex flex-wrap align-items-center border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <div>
                            <p>Total Projects</p>

                            <small class="text-muted">20</small>
                        </div>
                    </div>

                    <div class="ms-auto">
                        <button type="button" class="btn btn-primary custom-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Add Project
                        </button>
                    </div>
                </div>

                <div id="alert_status"></div>

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Project ID</th>
                            <th>Project Name</th>
                            <th>Client Name</th>
                            <th>Techonology</th>
                            <th>Paymenttype</th>
                            <th>EndDate</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $key = 1;
                        @endphp
                        @foreach ($projectLists as $project)
                            @php
                                $date = date_create($project->enddate);
                                $enddate = date_format($date, 'd-m-Y');
                            @endphp
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $project->projectId }}</td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->client_name }}</td>
                                    <td>{{ $project->techonology }}</td>
                                    <td>{{ $project->payment_type }}</td>
                                    <td>{{ $enddate }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary viewButton" data-projectId="{{ $project->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            View
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary editButton" data-projectId="{{ $project->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deleteButton" data-projectId="{{ $project->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @php
                                $key++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <p class="copyright-text">Copyright © Mini Finance 2048
                        - Design: <a rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                </div>

            </div>
        </div>
    </footer>
</main>

@include('SuperAdmin/footer')


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="projectaddform" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Project Name</label>
                        <input type="text" name="projectname" id="projectname" class="form-control">
                        <div class="text-danger" id="pnameerror"></div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-6">
                            <label class="form-label">Client Name</label>
                            <input type="text" name="client_name" id="client_name" class="form-control">
                            <div class="text-danger" id="cnameerror"></div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Techonology</label>
                            <select class="form-select" name="techonology" id="techonology"
                                aria-label="Default select example">
                                <option selected>Choose Techonology</option>
                                <option value="Wordpress">Wordpress</option>
                                <option value="Shopify">Shopify</option>
                                <option value="Laravel">Laravel</option>
                                <option value="Php">Core Php</option>
                                <option value="NodeJs">NodeJs</option>
                                <option value="MERN">MERN Stack</option>
                                <option value="Flutter">Flutter (Mobile App)</option>
                                <option value="ReactJs">ReactJs (Mobile App)</option>
                            </select>
                            <div class="text-danger" id="techonologyerror"></div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-6">
                            <label class="form-label">Payment Type</label>
                            <select class="form-select" name="paymenttype" id="paymenttype"
                                aria-label="Default select example">
                                <option selected>Choose Payment Type</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Hourly">Hourly</option>
                                <option value="Fixed">Fixed</option>
                            </select>
                            <div class="text-danger" id="paymenterror"></div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">End Date</label>
                            <input type="date" name="enddate" id="enddate" class="form-control">
                            <div class="text-danger" id="endateerror"></div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Assigned To:</label>
                            <select class="form-select" name="manager_name" id="manager_name"
                                aria-label="Default select example">
                                <option selected>Choose Manager</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->fullname }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger" id="managererror"></div>
                        </div>
                    </div>
                    <input type="hidden" id="assigned_by" name="assigned_by" value="{{ Auth::user()->id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="add">Add Project</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Project View Modal -->
<div class="modal fade view_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Project View</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Project ID: </strong> <span id="proid"></span>
                </div>
                <div class="mb-3">
                    <strong>Project Name: </strong> <span id="proname"></span>
                </div>
                <div class="mb-3">
                    <strong>Client Name: </strong> <span id="cname"></span>
                </div>
                <div class="mb-3">
                    <strong>Techonology: </strong> <span id="tech"></span>
                </div>
                <div class="mb-3">
                    <strong>Payment Type: </strong> <span id="ptype"></span>
                </div>
                <div class="mb-3">
                    <strong>EndDate: </strong> <span id="edate"></span>
                </div>
                <div class="mb-3">
                    <strong>Project Assigned: </strong> <span id="assign"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Project View Modal -->
<div class="modal fade view_modal" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Project Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="projectUpdateForm" method="POST">
                    @csrf
                    <input type="hidden" name="pid" id="pid" value="">
                    <div class="mb-3">
                        <label class="form-label">Project Name</label>
                        <input type="text" name="pname" id="pname" class="form-control" value="">
                        <div class="text-danger" id="pnameerror"></div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-6">
                            <label class="form-label">Client Name</label>
                            <input type="text" name="cupdatename" id="cupdatename" class="form-control" value="">
                            <div class="text-danger" id="cnameerror"></div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Techonology</label>
                            <select class="form-select" name="techupdate" id="techupdate"
                                aria-label="Default select example">
                                <option selected>Choose Techonology</option>
                                <option value="Wordpress">Wordpress</option>
                                <option value="Shopify">Shopify</option>
                                <option value="Laravel">Laravel</option>
                                <option value="Php">Core Php</option>
                                <option value="NodeJs">NodeJs</option>
                                <option value="MERN">MERN Stack</option>
                                <option value="Flutter">Flutter (Mobile App)</option>
                                <option value="ReactJs">ReactJs (Mobile App)</option>
                            </select>
                            <div class="text-danger" id="techonologyerror"></div>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-6">
                            <label class="form-label">Payment Type</label>
                            <select class="form-select" name="paytype" id="paytype"
                                aria-label="Default select example">
                                <option selected>Choose Payment Type</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Hourly">Hourly</option>
                                <option value="Fixed">Fixed</option>
                            </select>
                            <div class="text-danger" id="paymenterror"></div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">End Date</label>
                            <input type="date" name="finishdate" id="finishdate" class="form-control">
                            <div class="text-danger" id="endateerror"></div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Assigned To:</label>
                            <select class="form-select" name="manager" id="manager"
                                aria-label="Default select example">
                                <option selected>Choose Manager</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->fullname }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger" id="managererror"></div>
                        </div>
                    </div>
                    <input type="hidden" id="assigned_by" name="assigned_by" value="{{ Auth::user()->id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close1" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="add1">Update Project</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    // ajax token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // project add ajax
    jQuery(document).on('submit', '#projectaddform', function(e) {
        e.preventDefault();
        var projectname = $('#projectname').val();
        var client_name = $('#client_name').val();
        var techonology = $('#techonology').val();
        var paymenttype = $('#paymenttype').val();
        var enddate = $('#enddate').val();
        var manager_name = $('#manager_name').val();
        var assigned_by = $('#assigned_by').val();

        jQuery.ajax({
            type: "post",
            url: "{{ route('projects.store') }}",
            data: {
                projectname: projectname,
                client_name: client_name,
                techonology: techonology,
                paymenttype: paymenttype,
                enddate: enddate,
                manager_name: manager_name,
                assigned_by: assigned_by
            },
            dataType: "json",
            beforeSend: function() {
                jQuery('#add').text('Loading...');
                jQuery('#add').attr('disabled', 'true');
                jQuery('#close').attr('disabled', 'true');
            },
            success: function(response) {
                // console.log(response);
                if (response == 1) {
                    $('#staticBackdrop').modal('hide');
                    $('#alert_status').html(
                        '<div class="alert alert-success" role="alert">Project Add Successfull</div>'
                    );
                    $('#projectaddform')[0].reset();
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    $('#staticBackdrop').modal('hide');
                    $('#alert_status').html(
                        '<div class="alert alert-danger" role="alert">Project Add Unsuccessfull</div>'
                    );
                }
            },
            error: function(xhr) {
                if (xhr.responseJSON.errors.projectname) {
                    $('#pnameerror').text(xhr.responseJSON.errors.projectname);
                }
                if (xhr.responseJSON.errors.client_name) {
                    $('#cnameerror').text(xhr.responseJSON.errors.client_name);
                }
                if (xhr.responseJSON.errors.techonology) {
                    $('#techonologyerror').text(xhr.responseJSON.errors.techonology);
                }
                if (xhr.responseJSON.errors.paymenttype) {
                    $('#paymenterror').text(xhr.responseJSON.errors.paymenttype);
                }
                if (xhr.responseJSON.errors.enddate) {
                    $('#endateerror').text(xhr.responseJSON.errors.enddate);
                }
                if (xhr.responseJSON.errors.manager_name) {
                    $('#managererror').text(xhr.responseJSON.errors.manager_name);
                }
            }
        });
    });

    // single project view
    jQuery(document).on('click', '.viewButton', function(e) {
        e.preventDefault();
        var projectId = jQuery(this).attr('data-projectId');
        $.ajax({
            type: "GET",
            url: "/projects/" + projectId,
            data: {
                projectId: projectId
            },
            dataType: "json",
            success: function(response) {
                jQuery('#proid').text(response.projectId);
                jQuery('#proname').text(response.project_name);
                jQuery('#cname').text(response.client_name);
                jQuery('#tech').text(response.techonology);
                jQuery('#ptype').text(response.payment_type);
                jQuery('#edate').text(response.enddate);
                jQuery('#assign').text(response.manager_details.fullname);
            }
        });
    });

    // when i want to update after the form open
    jQuery(document).on('click', '.editButton', function(e) {
        e.preventDefault();
        var projectId = jQuery(this).attr('data-projectId');
        $.ajax({
            type: "GET",
            url: `/projects/${projectId}/edit`,
            data: {
                projectId: projectId
            },
            dataType: "json",
            success: function(response) {
                // console.log(response, response.manager_details.id);
                jQuery('#pid').val(response.id);
                jQuery('#pname').val(response.project_name);
                jQuery('#cupdatename').val(response.client_name);

                jQuery('#techupdate option').each(function(){
                    if(jQuery(this).val() === response.techonology){
                        jQuery(this).attr('selected', true);
                    }
                });

                jQuery('#paytype option').each(function(){
                    if(jQuery(this).val() === response.payment_type){
                        jQuery(this).attr('selected', true);
                    }
                });

                jQuery('#manager option').each(function(){
                    if(jQuery(this).val() == response.manager_details.id){
                        jQuery(this).attr('selected', true);
                    }
                });

                jQuery('#finishdate').val(response.enddate);
            }
        });
    });

    // project form update
    jQuery(document).on('submit', '#projectUpdateForm', function(e) {
        e.preventDefault();
        var projectid = jQuery('#pid').val();
        var pname = jQuery('#pname').val();
        var cupdatename = jQuery('#cupdatename').val();
        var techupdate = jQuery('#techupdate').val();
        var paytype = jQuery('#paytype').val();
        var finishdate = jQuery('#finishdate').val();
        var manager = jQuery('#manager').val();
        
        jQuery.ajax({
            type: "PUT",
            url: "/projects/" + projectid,
            data: {
                projectid: projectid,
                pname: pname,
                cupdatename: cupdatename,
                techupdate: techupdate,
                paytype: paytype,
                finishdate: finishdate,
                manager: manager
            },
            dataType: "json",
            beforeSend: function() {
                jQuery('#add1').text('Loading...');
                jQuery('#add1').attr('disabled', 'true');
                jQuery('#close1').attr('disabled', 'true');
            },
            success: function (response) {
                // console.log(response);
                if (response == 1) {
                    $('.view_modal').modal('hide');
                    $('#alert_status').html(
                        '<div class="alert alert-success" role="alert">Project Update Successfull</div>'
                    );
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    $('.view_modal').modal('hide');
                    $('#alert_status').html(
                        '<div class="alert alert-danger" role="alert">Project Update Unsuccessfull</div>'
                    );
                }
            },error: function(xhr) {
                console.log(xhr);
                
                // if (xhr.responseJSON.errors.projectname) {
                //     $('#pnameerror').text(xhr.responseJSON.errors.projectname);
                // }
                // if (xhr.responseJSON.errors.client_name) {
                //     $('#cnameerror').text(xhr.responseJSON.errors.client_name);
                // }
                // if (xhr.responseJSON.errors.techonology) {
                //     $('#techonologyerror').text(xhr.responseJSON.errors.techonology);
                // }
                // if (xhr.responseJSON.errors.paymenttype) {
                //     $('#paymenterror').text(xhr.responseJSON.errors.paymenttype);
                // }
                // if (xhr.responseJSON.errors.enddate) {
                //     $('#endateerror').text(xhr.responseJSON.errors.enddate);
                // }
                // if (xhr.responseJSON.errors.manager_name) {
                //     $('#managererror').text(xhr.responseJSON.errors.manager_name);
                // }
            }
        });
        
    });

    // project form update
    jQuery(document).on('click', '.deleteButton', function(e) {
        e.preventDefault();
        var projectid = jQuery(this).attr('data-projectId');
        
        if(confirm("Are You Sure To Delete?")){
            jQuery.ajax({
                type: "DELETE",
                url: "/projects/" + projectid,
                data: {
                    projectid: projectid,
                },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response == 1) {
                        // $('.view_modal').modal('hide');
                        $('#alert_status').html(
                            '<div class="alert alert-success" role="alert">Project Delete Successfull</div>'
                        );
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        // $('.view_modal').modal('hide');
                        $('#alert_status').html(
                            '<div class="alert alert-danger" role="alert">Project Delete Unsuccessfull</div>'
                        );
                    }
                }
            });
        }
        
    });
</script>
