@include('SuperAdmin/header')

<link href="{{ asset('css/single-manager.css') }}" rel="stylesheet">

<main class="main-wrapper col-md-10 col-lg-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start manager-view">
    <div class="header">
        <div class="profile">
            @if (!empty($employee->profilepic))
                <img src="{{ asset('/storage/' . $employee->profilepic) }}" alt="Profile Picture" class="profile-pic">
            @else
                <img src="https://avatar.iran.liara.run/public/boy?username=Ash" alt="Profile Picture"
                    class="profile-pic">
            @endif
            <div class="profile-info">
                <h2>{{ $employee->empId }} - {{ $employee->fullname }}</h2>
                @if (!empty($employee->designation))
                    <h3>{{ $employee->designation }}</h3>
                @endif
                @if (!empty($employee->depertment))
                    <h4>{{ $employee->depertment }}</h4>
                @endif
                <a href="mailto:{{ $employee->emailaddress }}">{{ $employee->emailaddress }}</a>
            </div>
        </div>
    </div>

    <div class="row other_details">
        <!-- Basic information Section -->
        <div class="col-md-6">
            <div class="card about-me mt-2">
                <h2>Basic information</h2>
                <div class="content">
                    <div class="item">
                        <span>Employee ID:</span>
                        @if (!empty($employee->empId))
                            {{ $employee->empId }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Full Name:</span>
                        @if (!empty($employee->fullname))
                            {{ $employee->fullname }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Username:</span>
                        @if (!empty($employee->username))
                            {{ $employee->username }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Email ID:</span>
                        @if (!empty($employee->emailaddress))
                            {{ $employee->emailaddress }}
                        @else
                            -
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Details Section -->
        <div class="col-md-6">
            <div class="card about-me mt-2">
                <h2>Personal Details</h2>
                <div class="content">
                    <div class="item">
                        <span>Date Of Birth:</span>
                        @if (!empty($employee->dob))
                            {{ $employee->dob }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Marital Status:</span>
                        @if (!empty($employee->marriedstatus))
                            {{ $employee->marriedstatus }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Address:</span>
                        @if (!empty($employee->address))
                            {{ $employee->address }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Addhar Card:</span>
                        @if (!empty($employee->addharno))
                            {{ $employee->addharno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Pan Card:</span>
                        @if (!empty($employee->pancardno))
                            {{ $employee->pancardno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Passport Number:</span>
                        @if (!empty($employee->passportno))
                            {{ $employee->passportno }}
                        @else
                            -
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!--  Work information section  -->
        <div class="col-md-6" style="margin-top: -88px;">
            <div class="card about-me mt-2">
                <h2>Work Information</h2>
                <div class="content">
                    <div class="item">
                        <span>Department:</span>
                        @if (!empty($employee->depertment))
                            {{ $employee->depertment }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Location:</span>
                        @if (!empty($employee->location))
                            {{ $employee->location }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Designation:</span>
                        @if (!empty($employee->designation))
                            {{ $employee->designation }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Experience:</span>
                        @if (!empty($employee->experience))
                            {{ $employee->experience }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Employment Type:</span>
                        @if (!empty($employee->emptype))
                            {{ $employee->emptype }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Employee Status:</span>
                        @if (!empty($employee->empstatus))
                            {{ $employee->empstatus }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Source of Hire:</span>
                        @if (!empty($employee->source_hire))
                            {{ $employee->source_hire }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Date of Joining:</span>
                        @if (!empty($employee->joinning_date))
                            {{ $employee->joinning_date }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Team Lead Assigned:</span>
                        <div class="manager-ass">
                            @if (!empty($employee->lead_assign))
                                {{ $employee->leadname->fullname }}
                            @else
                                -
                            @endif
                            <a href="javascript:void(0)" type="button" class="btn btn-primary custom-btn"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">Change Manager</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- contact details section -->
        <div class="col-md-6">
            <div class="card about-me mt-2">
                <h2>Contact Details</h2>
                <div class="content">
                    <div class="item">
                        <span>Personal Phone Number:</span>
                        @if (!empty($employee->mobileno))
                            {{ $employee->mobileno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Alternative Phone Number:</span>
                        @if (!empty($employee->alternativephone))
                            {{ $employee->alternativephone }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Alternative Email Address:</span>
                        @if (!empty($employee->alternativeemail))
                            {{ $employee->alternativeemail }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Added By:</span> {{ $employee->managername->fullname }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Education Details section -->
        <div class="col-md-12">
            <div class="card about-me mt-2">
                <h2>Education Details</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Institute Name</th>
                            <th scope="col">Degree/Diploma</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Date of Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CCLMS</td>
                            <td>BCA</td>
                            <td>Computer Application</td>
                            <td>2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Education Details section -->
        <div class="col-md-12">
            <div class="card about-me mt-2">
                <h2>Work Experience</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Company name</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">From Date</th>
                            <th scope="col">To Date</th>
                            <th scope="col">Job Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CCLMS</td>
                            <td>BCA</td>
                            <td>Computer Application</td>
                            <td>2023</td>
                            <td>2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>

@include('SuperAdmin/footer')

<!-- Modal -->
<div class="modal fade teamLeadaddModal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Team Lead</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('superadmin.single.employee.change', $employee->id) }}" method="POST" id="teamLeadaddForm">
                    @csrf
                    <select name="lead" id="lead" class="form-select" required>
                        <option value="">Choose Team Lead</option>
                        @foreach ($teamleads as $teamlead)
                            <option value="{{ $teamlead->id }}" @if($employee->lead_assign == $teamlead->id) selected @endif>{{ $teamlead->fullname }}</option>
                        @endforeach
                    </select>
                    <p id="lead"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary addBtn">Change</button>
            </div>
            </form>
        </div>
    </div>
</div>
