@extends('layouts.app')

@section('content')
    <div id="page-setting">
        <div class="page-setting__talbe">
            <div class="container">
                <div class="col-md-10 mt-3">
                    <div class="card">
                        <div class="card-header">1. Account infomations</div>
                        <div class="card-body">
                            <form action="{{ route('admin.setting.change_password') }}" role="form" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="name" class="form-label">Fullname</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="name"
                                                value="{{ old('name') ? old('name') : Auth::user()->name }}"
                                                class="form-control" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="email" class="form-label">Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                                class="form-control" id="email" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" name="password"
                                                class="form-control @if (session('_password')) is-invalid @endif"
                                                id="password" value="{{ old('password') }}" required>
                                            @if (session('_password'))
                                                <small class="text-danger">{{ session('_password') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="new_password" class="form-label">New password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" name="new_password" class="form-control"
                                                id="new_password">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="confirm_password" class="form-label">Confirm new password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" name="confirm_password"
                                                class="form-control @if (session('_confirm_password')) is-invalid @endif"
                                                id="confirm_password">
                                            @if (session('_confirm_password'))
                                                <small class="text-danger">Re-entered password does not match.</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="d-flex justify-conten-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                                                    </path>
                                                </svg> &nbsp; Update Data
                                            </span>
                                        </button>
                                        <button type="reset" class="btn btn-warning ms-2">
                                            <span class="d-flex justify-conten-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                                                    </path>
                                                </svg> &nbsp; Reset
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
