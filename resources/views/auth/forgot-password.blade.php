@extends('layouts.app')

@section('content')
@include('header')

<div class="container mt-4">
    <h2 class="text-center">Forgot Password</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Enter your registered email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
    </form>
</div>
@endsection
