@include('SuperAdmin/header')
@php
    $user = Auth::user();
@endphp
<main class="main-wrapper col-md-10 col-lg-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">Settings</h1>
    </div>

    <div class="row my-4">
        <div class="col-lg-7 col-12">
            <div class="custom-block bg-white">
                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endsession
                @session('error')
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endsession
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="password-tab" data-bs-toggle="tab"
                            data-bs-target="#password-tab-pane" type="button" role="tab"
                            aria-controls="password-tab-pane" aria-selected="false" tabindex="-1">Password</button>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="profile-tab-pane" role="tabpanel"
                        aria-labelledby="profile-tab" tabindex="0">
                        <h6 class="mb-4">User Profile</h6>

                        <form class="custom-form profile-form" action="{{ route('superadmin.profile.update', $user->id) }}" method="post" role="form" enctype="multipart/form-data">
                            @csrf
                            <input type="text" class="form-control" name="fullname" placeholder="Full Name"
                                value="{{ $user->fullname }}" />
                            @error('fullname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <input type="text" class="form-control" name="username" placeholder="Username"
                                value="{{ $user->username }}" />
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <input type="email" class="form-control" name="emailaddress" placeholder="Email Address"
                                value="{{ $user->emailaddress }}" />
                            @error('emailaddress')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <input type="text" class="form-control" name="phonenumber" placeholder="Mobile Number"
                                value="{{ $user->mobileno }}" />
                            @error('phonenumber')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-1">
                                @if (empty($user->profilepic))
                                    <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_640.png"
                                        class="profile-image img-fluid imagePreview" alt="Dummy Image">
                                @else
                                    <img src="{{ asset('/storage/' . $user->profilepic) }}"
                                        class="profile-image img-fluid imagePreview" alt="Profile Picture">
                                @endif

                                <input type="file" class="form-control" name="profilepicture" id="inputGroupFile02">
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="form-control ms-2">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab"
                        tabindex="0">
                        <h6 class="mb-4">Password</h6>

                        <form class="custom-form password-form" action="{{ route('superadmin.password.update', $user->id) }}" method="post" role="form" id="passwordreset">
                            @csrf
                            <input type="password" name="oldpassword" id="password" class="form-control" placeholder="Current Password">
                            @error('oldpassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="Confirm Password">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="d-flex">
                                {{-- <button type="button" id="reset" class="form-control me-3">
                                    Reset
                                </button> --}}

                                <button type="submit" class="form-control ms-2">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-12">
            <div class="custom-block custom-block-contact">
                <h6 class="mb-4">Still can’t find what you looking for?</h6>

                <p>
                    <strong>Call us:</strong>
                    <a href="tel: 305-240-9671" class="ms-2">
                        (60)
                        305-240-9671
                    </a>
                </p>

                <a href="#" class="btn custom-btn custom-btn-bg-white mt-3">
                    Chat with us
                </a>
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

<script>
    jQuery(document).ready(function($) {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.imagePreview').attr('src', e.target.result);
                    $('.imagePreview').hide();
                    $('.imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputGroupFile02").change(function() {
            readURL(this);
        });
    });
</script>
