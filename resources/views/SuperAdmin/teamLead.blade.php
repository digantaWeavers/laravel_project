@include('SuperAdmin/header')

<main class="main-wrapper col-md-10 col-lg-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">Project Managers</h1>
    </div>

    <div class="row my-4">
        <div class="col-lg-12 col-12">
            <div class="custom-block custom-block-transation-detail bg-white">
                <div class="d-flex flex-wrap align-items-center border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <div>
                            <p>Total Managers</p>

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
                        @foreach ($managers as $manager)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $manager->empId }}</td>
                                <td>{{ $manager->fullname }}</td>
                                <td>{{ $manager->username }}</td>
                                <td>{{ $manager->emailaddress }}</td>
                                <td>{{ $manager->mobileno }}</td>
                                <td>
                                    <a href="{{ route('single.manager.view.superadmin', $manager->id) }}"><i class="bi bi-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('superamdin.manager.delete', $manager->id) }}"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            @php
                                $key++;
                            @endphp
                        @endforeach --}}
                    </tbody>
                </table>
                {{-- <div class="d-flex flex-wrap align-items-center">
                </div> --}}

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
{{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Manager</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('superadmin.others.user.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="added_by" id="added_by" value="{{ Auth()->user()->id }}">
                    <input type="hidden" name="user_role" id="user_role" value="Manager">
                    @error('user_role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="fullname" class="form-control" placeholder="Full Name"
                        value="{{ old('fullname') }}" />
                    @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="username" class="form-control" placeholder="Username"
                        value="{{ old('username') }}" />
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="email" name="emailaddress" class="form-control" placeholder="Email Address"
                        value="{{ old('emailaddress') }}" />
                    @error('emailaddress')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="phonenumber" class="form-control" placeholder="Mobile Number"
                        value="{{ old('phonenumber') }}" />
                    @error('phonenumber')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" class="form-control" placeholder="Create Password"
                        value="{{ old('password') }}" />
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Add">
            </div>
            </form>
        </div>
    </div>
</div> --}}
