@extends('layouts.guest')
@push('title', 'Sign Up')
@section('content')
    <div>
        <div class="text-center">
            <i class="bi bi-person-circle fs-2"></i>
            <h4 class="fw-bold">Register Your Account</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="first_name" class="form-label required">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name">
                            @error('first_name')
                            <span class="text-danger d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name">
                            @error('last_name')
                            <span class="text-danger d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="address" class="form-label required">Address</label>
                            <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                            @error('address')
                            <span class="text-danger d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="phone" class="form-label required">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                            @error('phone')
                            <span class="text-danger d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email" class="form-label required">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            @error('email')
                            <span class="text-danger d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dob" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nid" class="form-label required">ID Verification</label>
                            <input type="file" class="form-control" name="nid" id="nid">
                            @error('nid')
                            <span class="text-danger d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password" class="form-label required">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            @error('password')
                            <span class="text-danger d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password_confirmation" class="form-label required">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm password">
                            @error('password_confirmation')
                            <span class="text-danger d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center pt-3 pb-1">
                        <button type="submit" class="btn btn-dark">Sign Up</button>
                    </div>
                    <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
