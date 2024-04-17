@extends('layouts.guest')
@push('title', 'Email Verification')
@section('content')
    <div>
        <div class="text-center">
            <i class="bi bi-person-circle fs-2"></i>
            <h4 class="fw-bold">Verification Code</h4>
            <p>An unique code has been sent to your email</p>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{route('email-verification')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="verification_code" class="form-label required">Verification Code</label>
                        <input type="number" class="form-control" name="verification_code" id="verification_code" placeholder="Verification code">
                        @auth
                        <input type="hidden"  name="email" value="{{auth()->user()->email}}">
                        @endauth
                        @error('verification_code')
                        <span class="text-danger d-inline-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center pt-3 pb-1">
                        <button type="submit" class="btn btn-dark">Verify</button>
                    </div>
                    <p>Dont have an account? <a href="{{route('register')}}">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
