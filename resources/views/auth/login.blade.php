@extends('layouts.app')

@section('content')
@include('header')
<div class="container">
    <h2>Login</h2>
    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Login</button>

        <!-- Link to Register Page -->
        <div class="mt-3">
            <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>
        </div>
    </form>
</div>
@endsection