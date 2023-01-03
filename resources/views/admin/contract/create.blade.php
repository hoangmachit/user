@extends('layouts.app')

@section('content')
    <div id="page-contract">
        <div class="page-contract__header mb-3">
            <div class="container">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Tổng quan</div>
                        <h3 class="page-title">Tạo mới hợp đồng</h3>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.contract.index') }}"
                                class="btn btn-primary d-none d-sm-inline-block"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg> Quay lại
                            </a>
                            <a href="{{ route('admin.contract.index') }}" class="btn btn-primary d-sm-none btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-contract__table">
            <div class="container">
                <form action="{{ route('admin.contract.store') }}" method="POST" role="form">
                    @csrf
                    <div class="card">
                        <div class="card-header">Thông tin hợp đồng</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="HD" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-red">{{ $errors->first('name') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="code" class="form-label">Code</label>
                                    <input type="text" name="code" id="code" value="{{ old('code') }}"
                                        class="form-control" placeholder="TKW">
                                    @error('code')
                                        <small class="text-red">{{ $errors->first('code') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="signing_date" class="form-label">Ngày kí</label>
                                    <input type="date" name="signing_date" id="signing_date" class="form-control"
                                        placeholder="" value="{{ old('signing_date') }}">
                                    @error('signing_date')
                                        <small class="text-red">{{ $errors->first('signing_date') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="date_of_delivery" class="form-label">Ngày hoàn thành</label>
                                    <input type="date" name="date_of_delivery" id="date_of_delivery"
                                        value="{{ old('date_of_delivery') }}" class="form-control" placeholder="">
                                    @error('date_of_delivery')
                                        <small class="text-red">{{ $errors->first('date_of_delivery') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú về hợp đồng</label>
                                <textarea class="form-control" name="note" id="note" rows="7" placeholder="">{{ old('note') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">Thông tin thanh toán</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="payment_1st" class="form-label">Thanh toán đợt 1</label>
                                    <input type="text" name="payment_1st" id="payment_1st" class="form-control"
                                        placeholder="1.000.000" value="{{ old('payment_1st') }}">
                                    @error('payment_1st')
                                        <small class="text-red">{{ $errors->first('payment_1st') }}</small>
                                    @enderror
                                    <input type="date" name="date_payment_1st" id="date_payment_1st"
                                        class="form-control mt-2" placeholder="" value="{{ old('date_payment_1st') }}">
                                    @error('date_payment_1st')
                                        <small class="text-red">{{ $errors->first('date_payment_1st') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="payment_2st" class="form-label">Thanh toán đợt 2</label>
                                    <input type="text" name="payment_2st" id="payment_2st" class="form-control"
                                        placeholder="1.000.000" value="{{ old('payment_2st') }}">
                                    @error('payment_2st')
                                        <small class="text-red">{{ $errors->first('payment_1st') }}</small>
                                    @enderror
                                    <input type="date" name="date_payment_2st" id="date_payment_2st"
                                        class="form-control mt-2" placeholder="Phil"
                                        value="{{ old('date_payment_2st') }}">
                                    @error('date_payment_2st')
                                        <small class="text-red">{{ $errors->first('date_payment_2st') }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4" id="card-customer">
                        <div class="card-header">Thông tin khách hàng</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Choice Customer</label>
                                    <select class="form-select form-select-md" name="customer_id" id="customer_id">
                                        <option value="0">No Customer</option>
                                        @foreach ($customers as $item)
                                            <option value="{{ $item->id }}">{{ $item->full_name() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4" id="card-design">
                        <div class="card-header">Thông tin thiết kế</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Choice Designs</label>
                                    <select class="form-select form-select-md" name="design_id" id="design_id">
                                        <option value="0">No Design</option>
                                        @foreach ($designs as $item)
                                            <option value="{{ $item->id }}">{{ $item->full_name() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4" id="card-domain">
                        <div class="card-header">Thông tin tên miền</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="alert alert-warning mb-0">
                                        <p class="m-0">Bạn chỉ có thể thêm tên miền ngay sau khi lưu thành công <b>Hợp
                                                Đồng</b>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4" id="card-package">
                        <div class="card-header">Thông tin hosting</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="alert alert-warning mb-0">
                                        <p class="m-0">Bạn chỉ có thể thêm hosting ngay sau khi lưu thành công <b>Hợp
                                                Đồng</b>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-footer border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-warning text-decoration-none" type="reset">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-clockwise me-1" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"></path>
                                            <path
                                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z">
                                            </path>
                                        </svg> Reset
                                    </span>
                                </button>
                                <div class="d-flex justify-conten-end align-items-center">
                                    <select class="form-select form-select-md me-2" name="status_id" id="status_id">
                                        @foreach ($status as $item)
                                            <option {{ old('status_id') == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" id="submit-contract-create"
                                        class="btn btn-primary ms-auto w-250">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="12" y1="5" x2="12" y2="19">
                                                </line>
                                                <line x1="5" y1="12" x2="19" y2="12">
                                                </line>
                                            </svg> Tạo hợp đồng
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
