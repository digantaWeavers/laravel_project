@include('SuperAdmin/header')

<style>
    #teamLeadaddForm p{
        color: red;
    }
</style>

<main class="main-wrapper col-md-10 col-lg-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">Team Lead</h1>
    </div>

    <div class="row my-4">
        <div class="col-lg-12 col-12">
            <div class="custom-block custom-block-transation-detail bg-white">
                <div class="d-flex flex-wrap align-items-center border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <div>
                            <p>Total Lead</p>

                            {{-- @php
                                $dataArray = json_decode($managers, true);
                                $totalCount = count($dataArray);
                            @endphp --}}

                            <small class="text-muted"></small>
                        </div>
                    </div>

                    <div class="ms-auto">
                        <button type="button" class="btn btn-primary custom-btn" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Add Manager
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
                    <tbody id="teamLeadList">
                        @php
                            $key = 1;
                        @endphp
                        @foreach ($teamLeads as $teamLead)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $teamLead->empId }}</td>
                                <td>{{ $teamLead->fullname }}</td>
                                <td>{{ $teamLead->username }}</td>
                                <td>{{ $teamLead->emailaddress }}</td>
                                <td>{{ $teamLead->mobileno }}</td>
                                <td>
                                    <a href="{{ route('single.manager.view.superadmin', $teamLead->id) }}"><i class="bi bi-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('superamdin.manager.delete', $teamLead->id) }}"><i class="bi bi-trash"></i></a>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Team Lead</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="teamLeadaddForm">
                        @csrf
                        <input type="hidden" name="added_by" id="added_by" value="{{ Auth()->user()->id }}">
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name"
                            value="{{ old('fullname') }}" />
                        <p id="fname"></p>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                            value="{{ old('username') }}" />
                        <p id="uname"></p>
                        <input type="email" name="emailaddress" id="emailaddress" class="form-control" placeholder="Email Address"
                            value="{{ old('emailaddress') }}" />
                        <p id="emaddress"></p>
                        <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Mobile Number"
                            value="{{ old('phonenumber') }}" />
                        <p id="number"></p>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Create Password"
                            value="{{ old('password') }}" />
                        <p id="pass"></p>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Confirm Password" />
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
    jQuery(document).on('submit', '#teamLeadaddForm', function(e){
        e.preventDefault();
        var added_by = $('#added_by').val();
        var fullname = $('#fullname').val();
        var username = $('#username').val();
        var emailaddress = $('#emailaddress').val();
        var phonenumber = $('#phonenumber').val();
        var password = $('#password').val();
        var password_confirmation = $('#password_confirmation').val();

        $.ajax({
            type: "POST",
            url: "{{ route('teamLead.add.superadmin') }}",
            data: {
                added_by: added_by,
                fullname: fullname,
                username: username,
                emailaddress: emailaddress,
                phonenumber: phonenumber,
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
                    $('#teamLeadaddForm')[0].reset();
                    $('.teamLeadaddModal').modal('hide');
                    $('.message').html('<div class="alert alert-success" role="alert">'+ response.message +'</div>');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }else if(response.status == false){
                    $('.teamLeadaddModal').modal('hide');
                    $('.message').html('<div class="alert alert-error" role="alert">'+ response.message +'</div>');
                }
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
                if (xhr.responseJSON.errors.password) {
                    $('#pass').text(xhr.responseJSON.errors.password);
                }
                if (xhr.responseJSON.errors.password_confirmation) {
                    $('#cpass').text(xhr.responseJSON.errors.password_confirmation);
                }
            }
        });
    });
</script>
