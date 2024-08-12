@include('SuperAdmin/header')
@php
    $user = Auth::user();
@endphp
<main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">Overview</h1>

        <small class="text-muted">Hello {{ $user->fullname }}, welcome back!</small>
    </div>

    <div class="row my-4">
        <div class="col-lg-7 col-12">
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="card custom-block bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Projects</h5>
                            <p class="card-text">10</p>
                            {{-- <a href="" class="btn btn-info"><i class="bi-plus"></i> Add Project</a> --}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card custom-block bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Managers</h5>
                            <p class="card-text">20</p>
                            {{-- <a href="" class="btn btn-info"><i class="bi-plus"></i> Add Manager</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="card custom-block bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Total TeamLeads</h5>
                            <p class="card-text">10</p>
                            {{-- <a href="" class="btn btn-info"><i class="bi-plus"></i> Add Lead</a> --}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card custom-block bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Employees</h5>
                            <p class="card-text">20</p>
                            {{-- <a href="" class="btn btn-info"><i class="bi-plus"></i> Add Employee</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-12">
            <div class="custom-block custom-block-profile-front custom-block-profile text-center bg-white">
                <div class="custom-block-profile-image-wrap mb-4">
                    @if (empty($user->profilepic))
                        <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_640.png"
                            class="profile-image img-fluid" alt="Dummy Image">
                    @else
                        <img src="{{ asset('/storage/' . $user->profilepic) }}" class="profile-image img-fluid"
                            alt="Profile Picture">
                    @endif
                    <a href="{{ route('superamdin.prodile.settings') }}" class="bi-pencil-square custom-block-edit-icon"></a>
                </div>

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

</div>
</div>
@include('SuperAdmin/footer')
