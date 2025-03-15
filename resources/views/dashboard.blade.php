@extends('layouts.app')

@section('content')
@include('header')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%;">
        <h2 class="text-center mb-3">Welcome, {{ Auth::user()->name }}!</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(Auth::user()->role == 'user')
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Name</strong></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label"><strong>Profile Photo</strong></label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Profile</button>
            </form>
        @endif
    </div>
</div>
@endsection
