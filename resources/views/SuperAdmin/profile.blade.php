@include('SuperAdmin/header')
@php
    $user = Auth::user();
@endphp
<main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">Profile</h1>
    </div>

    <div class="row my-4">
        <div class="col-lg-7 col-12">
            <div class="custom-block custom-block-profile">
                <div class="row">
                    <div class="col-lg-12 col-12 mb-3">
                        <h6>General</h6>
                    </div>

                    <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                        <div class="custom-block-profile-image-wrap">
                            @if (empty($user->profilepic))
                                <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_640.png"
                                    class="profile-image img-fluid" alt="Dummy Image">
                            @else
                                <img src="{{ asset('/storage/' . $user->profilepic) }}" class="profile-image img-fluid"
                                    alt="Profile Picture">
                            @endif

                            <a href="{{ route('superamdin.prodile.settings') }}" class="bi-pencil-square custom-block-edit-icon"></a>
                        </div>
                    </div>

                    <div class="col-lg-9 col-12">
                        <p class="d-flex flex-wrap mb-2">
                            <strong>Name:</strong>

                            <span>{{ $user->fullname }}</span>
                        </p>

                        <p class="d-flex flex-wrap mb-2">
                            <strong>Username:</strong>

                            <span>{{ $user->username }}</span>
                        </p>

                        <p class="d-flex flex-wrap mb-2">
                            <strong>Email:</strong>

                            <a href="mailto:{{ $user->emailaddress }}">
                                {{ $user->emailaddress }}
                            </a>
                        </p>

                        <p class="d-flex flex-wrap mb-0">
                            <strong>Phone:</strong>

                            <a href="tel:{{ $user->mobileno }}">
                                {{ $user->mobileno }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="custom-block custom-block-profile bg-white">
                <h6 class="mb-4">Card Information</h6>

                <p class="d-flex flex-wrap mb-2">
                    <strong>User ID:</strong>

                    <span>012 395 8647</span>
                </p>

                <p class="d-flex flex-wrap mb-2">
                    <strong>Type:</strong>

                    <span>Personal</span>
                </p>

                <p class="d-flex flex-wrap mb-2">
                    <strong>Created:</strong>

                    <span>July 19, 2020</span>
                </p>

                <p class="d-flex flex-wrap mb-2">
                    <strong>Valid Date:</strong>

                    <span>July 18, 2032</span>
                </p>
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
