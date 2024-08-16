@include('SuperAdmin/header')

<link href="{{ asset('css/single-manager.css') }}" rel="stylesheet">

<main class="main-wrapper col-md-10 col-lg-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start manager-view">
    <div class="header">
        <div class="profile">
            @if (!empty($manager->profilepic))
                <img src="{{ asset('/storage/' . $user->profilepic) }}" alt="Profile Picture" class="profile-pic">
            @else
                <img src="https://avatar.iran.liara.run/public/boy?username=Ash" alt="Profile Picture"
                    class="profile-pic">
            @endif
            <div class="profile-info">
                <h2>{{ $manager->empId }} - {{ $manager->fullname }}</h2>
                @if (!empty($manager->designation))
                    <h3>{{ $manager->designation }}</h3>
                @endif
                @if (!empty($manager->depertment))
                    <h4>{{ $manager->depertment }}</h4>
                @endif
                <a href="mailto:{{ $manager->emailaddress }}">{{ $manager->emailaddress }}</a>
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
                        @if (!empty($manager->empId))
                            {{ $manager->empId }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Full Name:</span>
                        @if (!empty($manager->fullname))
                            {{ $manager->fullname }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Username:</span>
                        @if (!empty($manager->username))
                            {{ $manager->username }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Email ID:</span>
                        @if (!empty($manager->emailaddress))
                            {{ $manager->emailaddress }}
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
                        @if (!empty($manager->dob))
                            {{ $manager->dob }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Marital Status:</span>
                        @if (!empty($manager->marriedstatus))
                            {{ $manager->marriedstatus }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Address:</span>
                        @if (!empty($manager->address))
                            {{ $manager->address }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Addhar Card:</span>
                        @if (!empty($manager->addharno))
                            {{ $manager->addharno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Pan Card:</span>
                        @if (!empty($manager->pancardno))
                            {{ $manager->pancardno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Passport Number:</span>
                        @if (!empty($manager->passportno))
                            {{ $manager->passportno }}
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
                        @if (!empty($manager->depertment))
                            {{ $manager->depertment }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Location:</span>
                        @if (!empty($manager->location))
                            {{ $manager->location }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Designation:</span>
                        @if (!empty($manager->designation))
                            {{ $manager->designation }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Experience:</span>
                        @if (!empty($manager->experience))
                            {{ $manager->experience }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Employment Type:</span>
                        @if (!empty($manager->emptype))
                            {{ $manager->emptype }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Employee Status:</span>
                        @if (!empty($manager->empstatus))
                            {{ $manager->empstatus }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Source of Hire:</span>
                        @if (!empty($manager->source_hire))
                            {{ $manager->source_hire }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Date of Joining:</span>
                        @if (!empty($manager->joinning_date))
                            {{ $manager->joinning_date }}
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
                        @if (!empty($manager->mobileno))
                            {{ $manager->mobileno }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Alternative Phone Number:</span>
                        @if (!empty($manager->alternativephone))
                            {{ $manager->alternativephone }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Alternative Email Address:</span>
                        @if (!empty($manager->alternativeemail))
                            {{ $manager->alternativeemail }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="item">
                        <span>Added By:</span> {{ $manager->managername->fullname }}
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
