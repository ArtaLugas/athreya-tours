@extends('user.layouts.template')
@section('title')
    Reset Password Athreya Tours
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
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <div class="login-title">
                        <h2>Reset Password</h2>
                    </div>
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="input">
                        <label for="emailname">Email Address</label>
                        <input type="email" id="emailname" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required="" autocomplete="username">
                        @error('email')
                            <span class="text-danger mt-3">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" class="block mt-1 w-full" name="password" required="" autocomplete="new-password">
                        @error('password')
                            <span class="text-danger mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input">
                        <label for="compass">Confirm Password</label>
                        <input type="password" id="compass" class="block mt-1 w-full" name="password_confirmation"
                            required="" autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="text-danger mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="button login">
                        <button type="submit">
                            <span>Reset Password</span>
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection