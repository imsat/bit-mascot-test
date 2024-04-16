@extends('layouts.app')
@push('title', 'User Profile')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2 class="d-inline-block">User List</h2>
        <input type="search" name="search" id="search" class="form-control d-inline-block w-25 float-end"
               placeholder="Search..."
               aria-label="Search">
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive small">
                <table class="table table-sm table-bordered text-center" id="userTable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Id Verification</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user?->userInfo?->address}}</td>
                            <td>{{$user?->userInfo?->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user?->userInfo?->dob}}</td>
                            <td>
                                <a href="{{$user?->userInfo?->nid}}" target="_blank">
                                    <i class="bi bi-file-pdf fs-6"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            const searchSelector = $('#search')
            let timeout;
            let searchParams = new URLSearchParams(window.location.search);
            let queryParam = searchParams.get('search');
            if (queryParam) {
                searchSelector.val(queryParam);
            }

            searchSelector.on('input', function (e) {
                clearTimeout(timeout);
                timeout = setTimeout(function () {
                    let query = e.target.value.trim();
                    updateUrl(query);
                    if (query.length >= 3) {
                        window.location.reload();
                    } else if (query.length === 0) {
                        window.location.reload();
                    }
                }, 1000);
            });
        });

        function updateUrl(query) {
            var url = new URL(window.location);
            url.searchParams.delete('page');
            url.searchParams.set('search', query);
            window.history.replaceState({}, '', url);
        }
    </script>
@endpush

