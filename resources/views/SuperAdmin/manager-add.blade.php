@include('SuperAdmin/header')

<main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3" bis_skin_checked="1">
        <h1 class="h2 mb-0">Project Managers</h1>
    </div>

    <div class="row my-4" bis_skin_checked="1">
        <div class="col-lg-12 col-12" bis_skin_checked="1">
            <div class="custom-block custom-block-transation-detail bg-white" bis_skin_checked="1">
                <div class="d-flex flex-wrap align-items-center border-bottom pb-3 mb-3" bis_skin_checked="1">
                    <div class="d-flex align-items-center" bis_skin_checked="1">
                        <div bis_skin_checked="1">
                            <p>Add Managers</p>
                        </div>
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

                <div class="d-flex flex-wrap align-items-center" bis_skin_checked="1">
                    <form action="{{ route('superadmin.manager.add.success') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_role" id="user_role" value="Manager">
                        <div class="form-info table-sec">
                            <div class="form-title">
                                <h4>Personal Details</h4>
                            </div>
                            <div class="row form-info">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fullname"
                                            placeholder="Manager Name* " value="{{ old('fullname') }}" />
                                        @error('fullname')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Username* " value="{{ old('username') }}" />
                                        @error('username')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="emailaddress"
                                            placeholder="Email Address* " value="{{ old('emailaddress') }}" />
                                        @error('emailaddress')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="altemailaddress"
                                            placeholder="Alternative Email Address "
                                            value="{{ old('altemailaddress') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="phonenumber" class="form-control"
                                            placeholder="Mobile Number* " value="{{ old('phonenumber') }}" />
                                        @error('phonenumber')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="altphonenumber" class="form-control"
                                            placeholder="Alternative Mobile Number "
                                            value="{{ old('altphonenumber') }}" />
                                        @error('altphonenumber')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control donation-textarea" name="address" placeholder="Address&nbsp;*">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="date" name="dob" class="form-control"
                                            placeholder="Date Of Birth" value="{{ old('dob') }}">
                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="select-box" name="marriedstatus" id="marriedstatus">
                                            <option>Marital Status* </option>
                                            <option value="0">Single</option>
                                            <option value="1">Married</option>
                                        </select>
                                        @error('marriedstatus')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="addharno" class="form-control"
                                            placeholder="Addharcard No* " value="{{ old('addharno') }}" />
                                        @error('addharno')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="pancard" class="form-control"
                                            placeholder="Pancard No* " value="{{ old('pancard') }}" />
                                        @error('pancard')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="passport" class="form-control"
                                            placeholder="Passport No (If Exists) " value="{{ old('passport') }}" />
                                        @error('passport')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-info assistance-form">
                            <div class="col-lg-12">
                                <div class="form-title">
                                    <h4>Work Experience</h4>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select class="select-box" name="depertmeny" id="depertmeny">
                                        <option>Depertment* </option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Project Management">Project Management</option>
                                        <option value="Sales">Sales</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    @error('depertmeny')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" placeholder="Location " value="{{ old('location') }}" />
                                    @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select class="select-box" name="designation" id="designation">
                                        <option>Designation* </option>
                                        <option value="VP Product Delivery">VP Product Delivery</option>
                                        <option value="Project Manager">Project Manager</option>
                                        <option value="Director of Sales">Director of Sales</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    @error('designation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select class="select-box" name="emptype" id="emptype">
                                        <option>Employee Type* </option>
                                        <option value="1">Permanent</option>
                                        <option value="0">Casual</option>
                                    </select>
                                    @error('emptype')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select class="select-box" name="empstatus" id="empstatus">
                                        <option>Employee Status* </option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('empstatus')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select class="select-box" name="hire" id="hire">
                                        <option>Source of Hire </option>
                                        <option value="1">Direct</option>
                                        <option value="0">Indirect</option>
                                        <option value="2">Reference</option>
                                    </select>
                                    @error('hire')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="date" name="doj" class="form-control"
                                        placeholder="Date of Joining" value="{{ old('doj') }}">
                                    @error('doj')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Create Password" value="{{ old('password') }}" />
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" />
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center p-0 m-0">
                            <input type="submit" value="Add Manager" class="btn">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">

                <div class="col-lg-12 col-12" bis_skin_checked="1">
                    <p class="copyright-text">Copyright © Mini Finance 2048
                        - Design: <a rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                </div>

            </div>
        </div>
    </footer>
</main>

@include('SuperAdmin/footer')
