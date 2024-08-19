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
                        <button type="button" class="btn btn-primary custom-btn" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Add Project
                        </button>
                    </div>
                </div>

                <div id="alert_status"></div>

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email Id</th>
                            <th>Phone Number</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            $key = 1;
                        @endphp
                        @foreach ($managers as $manager) --}}
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- @php
                                $key++;
                            @endphp
                        @endforeach --}}
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
                <form id="projectaddform" action="" method="POST">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Project</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).on('submit', '#projectaddform', function(e) {
        e.preventDefault();
        var projectname = $('#projectname').val();
        var client_name = $('#client_name').val();
        var techonology = $('#techonology').val();
        var paymenttype = $('#paymenttype').val();
        var enddate = $('#enddate').val();
        var manager_name = $('#manager_name').val();

        // console.log(projectname, client_name);

        // if(projectname == ""){
        //     $('#pnameerror').text("Project Name Should Be Field");
        // }if(client_name == ""){
        //     $('#cnameerror').text("Client Name Should Be Field");
        // }if(techonology == ""){
        //     $('#techonologyerror').text("Techonology Should Be Choosen");
        // }if(paymenttype == ""){
        //     $('#paymenterror').text("Payment Type Should Be Choosen");
        // }if(enddate == ""){
        //     $('#endateerror').text("End Date Should Be Field");
        // }if(manager_name == ""){
        //     $('#managererror').text("Manager Should Be Choosen");
        // }

        $.ajax({
            type: "post",
            url: "{{ route('projects.store') }}",
            data: {
                projectname: projectname,
                client_name: client_name,
                techonology: techonology,
                paymenttype: paymenttype,
                enddate: enddate,
                manager_name: manager_name
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                if(response == 1){
                    $('#staticBackdrop').modal('hide');
                    $('#alert_status').html('<div class="alert alert-success" role="alert">Project Add Successfull</div>');
                    $('#projectaddform')[0].reset();
                }else{
                    $('#staticBackdrop').modal('hide');
                    $('#alert_status').html('<div class="alert alert-danger" role="alert">Project Add Unsuccessfull</div>');
                }
            }
            // error: function(xhr, ) {
            //     console.log(xhr.responseJSON.errors.projectname);
            //     // if (xhr.responseJSON.errors.projectname) {
            //     //     $('#pnameerror').text(xhr.responseJSON.errors.projectname);
            //     // }
            //     // if (xhr.responseJSON.errors.client_name) {
            //     //     $('#cnameerror').text(xhr.responseJSON.errors.client_name);
            //     // }
            //     // if (xhr.responseJSON.errors.techonology) {
            //     //     $('#techonologyerror').text(xhr.responseJSON.errors.techonology);
            //     // }
            //     // if (xhr.responseJSON.errors.paymenttype) {
            //     //     $('#paymenterror').text(xhr.responseJSON.errors.paymenttype);
            //     // }
            //     // if (xhr.responseJSON.errors.enddate) {
            //     //     $('#endateerror').text(xhr.responseJSON.errors.enddate);
            //     // }
            //     // if (xhr.responseJSON.errors.manager_name) {
            //     //     $('#managererror').text(xhr.responseJSON.errors.manager_name);
            //     // }
            // }
        });
    });
</script>
