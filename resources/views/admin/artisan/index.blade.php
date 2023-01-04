@extends('layouts.app')

@section('content')
    <div id="page-artisan">
        <div class="page-artisan__header mb-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Ternimal') }}</h4>
                                <p>Summary of some website optimization commands.</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                1. Tối ưu website
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('admin.artisan.command', ['action' => 'website']) }}"
                                                    method="POST" role="form">
                                                    @csrf
                                                    <button class="btn btn-primary btn-black">
                                                        <span class="d-flex justify-content-center align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-repeat me-2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                                            </svg>
                                                            Thực hiện
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                2. Xóa cache
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('admin.artisan.command', ['action' => 'cache']) }}"
                                                    method="POST" role="form">
                                                    @csrf
                                                    <button class="btn btn-primary btn-black">
                                                        <span class="d-flex justify-content-center align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-repeat me-2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                                            </svg>
                                                            Thực hiện
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                1. Tối ưu database
                                            </div>
                                            <div class="card-body">
                                                <form
                                                    action="{{ route('admin.artisan.command', ['action' => 'database']) }}"
                                                    method="POST" role="form">
                                                    @csrf
                                                    <button class="btn btn-primary btn-black">
                                                        <span class="d-flex justify-content-center align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-repeat me-2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                                            </svg>
                                                            Thực hiện
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
