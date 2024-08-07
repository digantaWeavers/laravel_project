<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <script src="{{ asset('script.js') }}"></script> --}}
    <title>Document</title>
</head>

<body>
    <div class="container">
        {{-- Registeration Form  --}}
        <div class="card register">
            @session('regietrsuccess')
                <div class="alert alert-success" role="alert">
                    {{ session('regietrsuccess') }}
                </div>
            @endsession
            @session('regietrerror')
                <div class="alert alert-danger" role="alert">
                    {{ session('regietrerror') }}
                </div>
            @endsession
            <h2>Register</h2>
            <form action="{{ route('superadmin.register') }}" method="POST">
                @csrf
                <select hidden name="user_role" id="user_role" class="form-control">
                    <option value="Super Admin" selected>Super Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Team Lead">Team Lead</option>
                    <option value="Employee">Employee</option>
                </select>
                @error('user_role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}" />
                @error('fullname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" />
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="email" name="emailaddress" placeholder="Email Address" value="{{ old('emailaddress') }}" />
                @error('emailaddress')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="phonenumber" placeholder="Mobile Number" value="{{ old('phonenumber') }}" />
                @error('phonenumber')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="password" name="password" placeholder="Create Password" value="{{ old('password') }}" />
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit">Register</button>
            </form>
        </div>
        <div class="separator"></div>
        {{-- Login Form  --}}
        <div class="card login">
            @session('loginsuccess')
                <div class="alert alert-success" role="alert">
                    {{ session('loginsuccess') }}
                </div>
            @endsession
            @session('loginerror')
                <div class="alert alert-danger" role="alert">
                    {{ session('loginerror') }}
                </div>
            @endsession
            <h2>Login</h2>
            <form action="{{ route('superadmin.login') }}" method="POST">
                @csrf
                <input type="text" name="useremail" placeholder="Username Or Email Address" value="{{ old('useremail') }}">
                @error('useremail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
