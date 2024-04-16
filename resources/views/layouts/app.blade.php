<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@stack('title', 'Bit Mascot Test')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css"
          integrity="sha256-h2Gkn+H33lnKlQTNntQyLXMWq7/9XI2rlPCsLsVcUBs=" crossorigin="anonymous">
    @stack('style')
</head>

<body>
@include('layouts.includes.navbar')

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.includes.sidebar')

        <!-- Page Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"
        integrity="sha256-O11zcGEd6w4SQFlm8i/Uk5VAB+EhNNmynVLznwS6TJ4=" crossorigin="anonymous"></script>
<script type="module">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document)
        /* Sweetalert 2 toast  */
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        window.Toast = Toast;
        @if(Session::has('success'))
        Toast.fire({icon: 'success', title: `{{Session::get('success')}}`});
        @elseif(Session::has('warning'))
        Toast.fire({icon: 'warning', title: `{{Session::get('warning')}}`});
        @elseif(Session::has('error'))
        Toast.fire({icon: 'error', title: `{{Session::get('error')}}`});
        @elseif(Session::has('info'))
        Toast.fire({icon: 'info', title: `{{Session::get('info')}}`});
        @elseif(Session::has('failed'))
        Toast.fire({icon: 'error', title: `{{Session::get('failed')}}`});
        @endif
    });
</script>
@stack('script')
</body>
</html>
