@include('SuperAdmin/header')

<main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
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

                            <small class="text-muted">20</small>
                        </div>
                    </div>

                    <div class="ms-auto">
                        <a class="btn custom-btn" href="{{ route('superamdin.manager.list') }}">Add Manager</a>
                    </div>
                </div>

                {{ $managers }}

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

                <div class="d-flex flex-wrap align-items-center">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011-04-25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011-07-25</td>
                                <td>$170,750</td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>2009-01-12</td>
                                <td>$86,000</td>
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                                <td>2012-03-29</td>
                                <td>$433,060</td>
                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                                <td>2008-11-28</td>
                                <td>$162,700</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Manager</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="user_role" id="user_role" value="Manager">
                    @error('user_role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="{{ old('fullname') }}" />
                    @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" />
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="email" name="emailaddress" placeholder="Email Address"
                        value="{{ old('emailaddress') }}" />
                    @error('emailaddress')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="phonenumber" placeholder="Mobile Number"
                        value="{{ old('phonenumber') }}" />
                    @error('phonenumber')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" placeholder="Create Password"
                        value="{{ old('password') }}" />
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
