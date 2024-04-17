@extends('layouts.app')
@push('title', 'Change Password')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Change Password</h2>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="w-50">
            <div class="alert alert-danger d-none" id="errors"></div>
            <div class="mb-3 row">
                <label for="old_password" class="col-sm-4 col-form-label required">Old Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="old_password" placeholder="Old password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="new_password" class="col-sm-4 col-form-label required">New Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="new_password" placeholder="New password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="confirm_password" class="col-sm-4 col-form-label required">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password">
                </div>
            </div>
            <div class="float-end">
                <button type="button" class="btn btn-dark me-2" id="updateBtn">Update</button>
                <button type="button" class="btn btn-outline-dark" id="clearBtn">Clear</button>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {

            $('#clearBtn').click(function () {
                clearForm();
            });

            $('#updateBtn').click(function () {
                updatePassword();
            });

        });

        async function clearForm() {
            $('#old_password').val(null);
            $('#new_password').val(null);
            $('#confirm_password').val(null);

        }
        async function updatePassword() {
            await $.ajax({
                method: 'POST',
                url: `{{route('users.change-password')}}`,
                data: {
                    'old_password': $('#old_password').val(),
                    'new_password': $('#new_password').val(),
                    'confirm_password': $('#confirm_password').val(),
                }
            }).done(function (response) {
                if(response?.success === true){
                    Toast.fire({icon: 'success', title: response?.message});
                }
                clearForm();
                $('#errors').addClass('d-none');
            }).catch(function (err) {
                if(err?.responseJSON?.success === false){
                    return $('#errors').html(err?.responseJSON?.message).removeClass('d-none');
                }
                let errors = err.responseJSON.errors;
                let errorString = '';
                $.each(errors, function(key, value) {
                    errorString += value + '<br>';
                });
                $('#errors').html(errorString).removeClass('d-none');
            });
        }
    </script>
@endpush

