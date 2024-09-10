@include('SuperAdmin/header')

<link href="{{ asset('css/single-manager.css') }}" rel="stylesheet">

<main class="main-wrapper col-md-10 col-lg-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start manager-view">
    <div class="header">
        <div class="profile">
            @if (!empty($teamLead->profilepic))
                <img src="{{ asset('/storage/' . $teamLead->profilepic) }}" alt="Profile Picture" class="profile-pic">
            @else
                <img src="https://avatar.iran.liara.run/public/boy?username=Ash" alt="Profile Picture"
                    class="profile-pic">
            @endif
            <div class="profile-info">
                <h2>{{ $teamLead->empId }} - {{ $teamLead->fullname }}</h2>
                @if (!empty($teamLead->designation))
                    <h3>{{ $teamLead->designation }}</h3>
                @endif
                @if (!empty($teamLead->depertment))
                    <h4>{{ $teamLead->depertment }}</h4>
                @endif
                <a href="mailto:{{ $teamLead->emailaddress }}">{{ $teamLead->emailaddress }}</a>
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
                        @if (!empty($teamLead->empId))
                            {{ $teamLead->empId }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Full Name:</span>
                        @if (!empty($teamLead->fullname))
                            {{ $teamLead->fullname }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Username:</span>
                        @if (!empty($teamLead->username))
                            {{ $teamLead->username }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Email ID:</span>
                        @if (!empty($teamLead->emailaddress))
                            {{ $teamLead->emailaddress }}
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
                        @if (!empty($teamLead->dob))
                            {{ $teamLead->dob }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Marital Status:</span>
                        @if (!empty($teamLead->marriedstatus))
                            {{ $teamLead->marriedstatus }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Address:</span>
                        @if (!empty($teamLead->address))
                            {{ $teamLead->address }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Addhar Card:</span>
                        @if (!empty($teamLead->addharno))
                            {{ $teamLead->addharno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Pan Card:</span>
                        @if (!empty($teamLead->pancardno))
                            {{ $teamLead->pancardno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Passport Number:</span>
                        @if (!empty($teamLead->passportno))
                            {{ $teamLead->passportno }}
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
                        @if (!empty($teamLead->depertment))
                            {{ $teamLead->depertment }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Location:</span>
                        @if (!empty($teamLead->location))
                            {{ $teamLead->location }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Designation:</span>
                        @if (!empty($teamLead->designation))
                            {{ $teamLead->designation }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Experience:</span>
                        @if (!empty($teamLead->experience))
                            {{ $teamLead->experience }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Employment Type:</span>
                        @if (!empty($teamLead->emptype))
                            {{ $teamLead->emptype }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Employee Status:</span>
                        @if (!empty($teamLead->empstatus))
                            {{ $teamLead->empstatus }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Source of Hire:</span>
                        @if (!empty($teamLead->source_hire))
                            {{ $teamLead->source_hire }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Date of Joining:</span>
                        @if (!empty($teamLead->joinning_date))
                            {{ $teamLead->joinning_date }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Manager Assigned:</span>
                        @if (!empty($teamLead->manager_assign))
                            {{ $teamLead->managerassigned->fullname }}
                        @else
                            -
                        @endif
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
                        @if (!empty($teamLead->mobileno))
                            {{ $teamLead->mobileno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Alternative Phone Number:</span>
                        @if (!empty($teamLead->alternativephone))
                            {{ $teamLead->alternativephone }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Alternative Email Address:</span>
                        @if (!empty($teamLead->alternativeemail))
                            {{ $teamLead->alternativeemail }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Added By:</span> {{ $teamLead->managername->fullname }}
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
