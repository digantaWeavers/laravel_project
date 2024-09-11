@include('SuperAdmin/header')

<style>
    #employeeaddForm p{
        color: red;
    }
</style>

<main class="main-wrapper col-md-10 col-lg-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">Employees</h1>
    </div>

    <div class="row my-4">
        <div class="col-lg-12 col-12">
            <div class="custom-block custom-block-transation-detail bg-white">
                <div class="d-flex flex-wrap align-items-center border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <div>
                            <p>Total Employees</p>

                            @php
                                $dataArray = json_decode($employess, true);
                                $totalCount = count($dataArray);
                            @endphp

                            <small class="text-muted">{{ $totalCount }}</small>
                        </div>
                    </div>

                    <div class="ms-auto">
                        <button type="button" class="btn btn-primary custom-btn" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Add Employees
                        </button>
                    </div>
                </div>

                <div class="message"></div>

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
                    <tbody class="employeeList">
                        @php
                            $key = 1;
                        @endphp
                        @foreach ($employess as $employee)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $employee->empId }}</td>
                                <td>{{ $employee->fullname }}</td>
                                <td>{{ $employee->username }}</td>
                                <td>{{ $employee->emailaddress }}</td>
                                <td>{{ $employee->mobileno }}</td>
                                <td>
                                    <a href="{{ route('superadmin.single.employee.view', $employee->id) }}"><i class="bi bi-eye"></i></a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deleteButton" data-leadId="{{ $employee->id }}">
                                        <i class="bi bi-trash"></i>
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
<div class="modal fade teamLeadaddModal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Employees</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="employeeaddForm">
                        @csrf
                        <input type="hidden" name="added_by" id="added_by" value="{{ Auth()->user()->id }}">
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name"/>
                        <p id="fname"></p>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"/>
                        <p id="uname"></p>
                        <input type="email" name="emailaddress" id="emailaddress" class="form-control" placeholder="Email Address"/>
                        <p id="emaddress"></p>
                        <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Mobile Number"/>
                        <p id="number"></p>
                        <select name="lead" id="lead" class="form-select">
                            <option value="">Choose Team Lead</option>
                            @foreach ($leads as $lead)
                                <option value="{{ $lead->id }}">{{ $lead->fullname }}</option>
                            @endforeach
                        </select>
                        <p id="lead"></p>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Create Password"/>
                        <p id="pass"></p>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>
                        <p id="cpass"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary addBtn">Add</button>
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

    // Team Lead add
    jQuery(document).on('submit', '#employeeaddForm', function(e){
        e.preventDefault();
        var added_by = $('#added_by').val();
        var fullname = $('#fullname').val();
        var username = $('#username').val();
        var emailaddress = $('#emailaddress').val();
        var phonenumber = $('#phonenumber').val();
        var lead = $('#lead').val();
        var password = $('#password').val();
        var password_confirmation = $('#password_confirmation').val();

        $.ajax({
            type: "POST",
            url: "{{ route('superamdin.employee.add') }}",
            data: {
                added_by: added_by,
                fullname: fullname,
                username: username,
                emailaddress: emailaddress,
                phonenumber: phonenumber,
                lead: lead,
                password: password,
                password_confirmation: password_confirmation
            },
            dataType: "json",
            beforeSend: function () {
                $('.close').hide();
                $('.addBtn').text('Please Wait....');
                $('.addBtn').attr('disabled', true);
            },
            success: function (response) {
                console.log(response);
                if(response.status == true){
                    $('#employeeaddForm')[0].reset();
                    $('.teamLeadaddModal').modal('hide');
                    $('.message').html('<div class="alert alert-success" role="alert">'+ response.message +'</div>'); 
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    // var key = $('.employeeList tr').length + 1;

                    // var newRow = `
                    //     <tr>
                    //         <td>${key}</td>
                    //         <td>${response.data.empId}</td>
                    //         <td>${response.data.fullname}</td>
                    //         <td>${response.data.username}</td>
                    //         <td>${response.data.emailaddress}</td>
                    //         <td>${response.data.mobileno}</td>
                    //         <td>
                    //             <a href="/path/to/employee/view/${response.data.id}">
                    //                 <i class="bi bi-eye"></i>
                    //             </a>
                    //         </td>
                    //         <td>
                    //             <button type="button" class="btn btn-danger deleteButton" data-leadId="${response.data.id}">
                    //                 <i class="bi bi-trash"></i>
                    //             </button>
                    //         </td>
                    //     </tr>`;

                    // // Append new row to the table body
                    // $('.employeeList').append(newRow);

                    // setTimeout(() => {
                    //     $('.message').html('');
                    // }, 2000);
                } else if(response.status == false) {
                    $('.teamLeadaddModal').modal('hide');
                    $('.message').html('<div class="alert alert-error" role="alert">' + response.message + '</div>');
                }

                // Re-enable the button
                // $('.close').show();
                // $('.addBtn').text('Add');
                // $('.addBtn').attr('disabled', false);
            },
            error: function(xhr) {
                if (xhr.responseJSON.errors.fullname) {
                    $('#fname').text(xhr.responseJSON.errors.fullname);
                }
                if (xhr.responseJSON.errors.username) {
                    $('#uname').text(xhr.responseJSON.errors.username);
                }
                if (xhr.responseJSON.errors.emailaddress) {
                    $('#emaddress').text(xhr.responseJSON.errors.emailaddress);
                }
                if (xhr.responseJSON.errors.phonenumber) {
                    $('#number').text(xhr.responseJSON.errors.phonenumber);
                }
                if (xhr.responseJSON.errors.manager) {
                    $('#lead').text(xhr.responseJSON.errors.manager);
                }
                if (xhr.responseJSON.errors.password) {
                    $('#pass').text(xhr.responseJSON.errors.password);
                }
                if (xhr.responseJSON.errors.password_confirmation) {
                    $('#cpass').text(xhr.responseJSON.errors.password_confirmation);
                }
            }
        });
    });

    // Team Lead delete
    // jQuery(document).on('click', '.deleteButton', function(e) {
    //     e.preventDefault();
    //     var leadId = jQuery(this).attr('data-leadId');
        
    //     if(confirm("Are You Sure To Delete?")){
    //         jQuery.ajax({
    //             type: "DELETE",
    //             url: "/superadmin/teamlead/delete/" + leadId,
    //             data: {
    //                 leadId: leadId,
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 if (response.status == true) {
    //                     // $('.view_modal').modal('hide');
    //                     $('.message').html(
    //                         '<div class="alert alert-success" role="alert">'+ response.message +'</div>'
    //                     );
    //                     setTimeout(() => {
    //                         location.reload();
    //                     }, 1000);
    //                 } else {
    //                     // $('.view_modal').modal('hide');
    //                     $('.message').html(
    //                         '<div class="alert alert-danger" role="alert">'+ response.message +'</div>'
    //                     );
    //                 }
    //             }
    //         });
    //     }
        
    // });
</script>
