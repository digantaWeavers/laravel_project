<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Tooplate">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weavers Web Project Management</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('css/apexcharts.css') }}" rel="stylesheet">

    <link href="{{ asset('css/tooplate-mini-finance.css') }}" rel="stylesheet">
</head>

{{-- @include('sweetalert::alert') --}}

@php
    $user = Auth::user();
@endphp

<body>
    <header class="navbar sticky-top flex-md-nowrap">
        <div class="col-md-3 col-lg-3 me-0 px-3 fs-6">
            <a class="navbar-brand" href="index.html">
                <i class="bi-box"></i>
                SuperAdmin
            </a>
        </div>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav me-lg-2">
            <div class="nav-item text-nowrap d-flex align-items-center">

                <div class="dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if (empty($user->profilepic))
                            <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_640.png" class="profile-image img-fluid" alt="Dummy Image">
                        @else
                            <img src="{{ asset('/storage/' . $user->profilepic) }}" class="profile-image img-fluid" alt="Profile Picture">
                        @endif
                    </a>
                    <ul class="dropdown-menu bg-white shadow">
                        <li>
                            <div class="dropdown-menu-profile-thumb d-flex">
                                @if (empty($user->profilepic))
                                    <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_640.png" class="profile-image img-fluid" alt="Dummy Image">
                                @else
                                    <img src="{{ asset('/storage/' . $user->profilepic) }}" class="profile-image img-fluid" alt="Profile Picture">
                                @endif

                                <div class="d-flex flex-column">
                                    <small>{{ $user->fullname }}</small>
                                    <a href="#">{{ $user->emailaddress }}</a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('superamdin.prodile') }}">
                                <i class="bi-person me-2"></i>
                                Profile
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('superamdin.prodile.settings') }}">
                                <i class="bi-gear me-2"></i>
                                Settings
                            </a>
                        </li>

                        <li class="border-top mt-3 pt-2 mx-4">
                            <a class="dropdown-item ms-0 me-0" href="{{ route('superadmin.logout') }}">
                                <i class="bi-box-arrow-left me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == 'logincheck') active @endif" aria-current="page" href="{{ route('logincheck') }}">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if((Route::currentRouteName() == 'superadmin.manager.list.view') || (Route::currentRouteName() == 'single.manager.view.superadmin')) active @endif" aria-current="page" href="{{ route('superadmin.manager.list.view') }}">
                                <i class="bi bi-person-circle"></i>
                                Manager
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if((Route::currentRouteName() == 'superamdin.teamleads') || (Route::currentRouteName() == 'single.teamLead.view')) active @endif"  aria-current="page" href="{{ route('superamdin.teamleads') }}">
                                <i class="bi bi-person-bounding-box"></i>
                                Team Lead
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == 'projects.index') active @endif" href="{{ route('projects.index') }}">
                                <i class="bi bi-bookmark-check-fill"></i>
                                Projects
                            </a>
                        </li>

                        <li class="nav-item border-top mt-auto pt-2">
                            <a class="nav-link @if(Route::currentRouteName() == 'superamdin.prodile') active @endif" href="{{ route('superamdin.prodile') }}">
                                <i class="bi-person me-2"></i>
                                Profile
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == 'superamdin.prodile.settings') active @endif" href="{{ route('superamdin.prodile.settings') }}">
                                <i class="bi-gear me-2"></i>
                                Settings
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('superadmin.logout') }}">
                                <i class="bi-box-arrow-left me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
