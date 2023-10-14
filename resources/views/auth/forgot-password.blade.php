@extends('user.layouts.template')
@section('title')
    Forgot Password Athreya Tours
@endsection
@section('content')
    <style>
        [type="text"]:focus,
        [type="email"]:focus,
        [type="url"]:focus,
        [type="password"]:focus,
        [type="number"]:focus,
        [type="date"]:focus,
        [type="datetime-local"]:focus,
        [type="month"]:focus,
        [type="search"]:focus,
        [type="tel"]:focus,
        [type="time"]:focus,
        [type="week"]:focus,
        [multiple]:focus,
        textarea:focus,
        select:focus {

            box-shadow: none !important;
            border-color: transparent !important;
        }
    </style>
    <div class="login-section">
        <div class="materialContainer">
            <div class="box">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="login-title">
                        <h2>Forgot Password</h2>
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    </div>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <div class="input">
                        <label for="emailname">Email Address</label>
                        <input type="email" id="emailname" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required="" autocomplete="username">
                        @error('email')
                            <span class="text-danger mt-3">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="button login">
                        <button type="submit">
                            <span>Sign Up</span>
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection