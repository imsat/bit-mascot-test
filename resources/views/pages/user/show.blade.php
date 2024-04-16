@extends('layouts.app')
@push('title', 'User Profile')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>User Profile</h2>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="w-50">
            <dl class="row mb-0">
                <dt class="col-sm-3 col-6">First Name:</dt>
                <dd class="col-sm-9 col-6">{{$user->first_name}}</dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3 col-6">Last Name:</dt>
                <dd class="col-sm-9 col-6">{{$user->last_name}}</dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3 col-6">Address:</dt>
                <dd class="col-sm-9 col-6">{{$user?->userInfo?->address}}</dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3 col-6">Phone:</dt>
                <dd class="col-sm-9 col-6">{{$user?->userInfo?->phone}}</dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3 col-6">Email:</dt>
                <dd class="col-sm-9 col-6">{{$user->email}}</dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3 col-6">Birth Date:</dt>
                <dd class="col-sm-9 col-6">{{$user?->userInfo?->dob}}</dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3 col-6">Id Verification:</dt>
                <dd class="col-sm-9 col-6">
                    <a href="{{$user?->userInfo?->nid}}" target="_blank">
                        <i class="bi bi-file-pdf fs-2"></i>
                    </a>
                </dd>
            </dl>
        </div>
    </div>
@endsection

