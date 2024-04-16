@extends('layouts.guest')
@push('title', 'Login')
@section('content')
    <div>
        <div class="text-center">
            <i class="bi bi-person-circle fs-2"></i>
            <h4 class="fw-bold">Login</h4>
        </div>

        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
                        @error('email')
                        <span class="text-danger d-inline-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        @error('password')
                        <span class="text-danger d-inline-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center pt-3 pb-1">
                        <button type="submit" class="btn btn-dark">Login</button>
                    </div>
                    <p>Dont have an account? <a href="{{route('register')}}">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
