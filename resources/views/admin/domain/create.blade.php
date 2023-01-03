@extends('layouts.app')

@section('content')
    <div id="page-domain">
        <div class="page-domain__header mb-3">
            <div class="container">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Tổng quan</div>
                        <h3 class="page-title">Tên miền</h3>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.domain.index') }}" class="btn btn-primary d-none d-sm-inline-block"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg> Quay lại
                            </a>
                            <a href="{{ route('admin.domain.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
        <div class="page-domain__talbe">
            <div class="container">
                <div class="card">
                    <div class="card-header">Thông tin tên miền</div>
                    <form action="{{ route('admin.domain.store') }}" method="POST" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Your name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-red">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="domain_name" class="form-label">Tên miền</label>
                                <input type="text" name="domain_name" id="domain_name" value="{{ old('domain_name') }}"
                                    class="form-control" placeholder="example.com">
                                @error('domain_name')
                                    <small class="text-red">{{ $errors->first('domain_name') }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label for="domain_init_id" class="form-label">Đơn vị sản xuất</label>
                                    <select class="form-select form-select-md" name="domain_init_id" id="domain_init_id">
                                        <option value="0">Chọn đơn vị</option>
                                        @foreach ($domain_inits as $item)
                                            <option {{ old('domain_init_id') == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('domain_init_id')
                                        <small class="text-red">{{ $errors->first('domain_init_id') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="" class="form-label">Thời hạn</label>
                                    <select class="form-select form-select-md" name="duration_id" id="duration_id">
                                        @foreach ($durations as $item)
                                            <option {{ old('duration_id') == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('duration_id')
                                        <small class="text-red">{{ $errors->first('duration_id') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-0">
                                        <label for="price" class="form-label">Giá cũ</label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            placeholder="0" value="{{ old('price') }}">
                                        @error('price')
                                            <small class="text-red">{{ $errors->first('price') }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-0">
                                        <label for="price_special" class="form-label">Giá khuyến mãi</label>
                                        <input type="number" name="price_special" id="price_special" class="form-control"
                                            placeholder="0" value="{{ old('price_special') }}">
                                        @error('price_special')
                                            <small class="text-red">{{ $errors->first('price_special') }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="status_id" class="form-label">Trạng thái</label>
                                    <select class="form-select form-select-md" name="status_id" id="status_id">
                                        @foreach ($status as $item)
                                            <option {{ old('status_id') == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="date_payment" class="form-label">Ngày thanh toán</label>
                                    <input type="date" name="date_payment" value="{{ old('date_payment') }}"
                                        id="date_payment" class="form-control" placeholder="">
                                    @error('date_payment')
                                        <small class="text-red">{{ $errors->first('date_payment') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    placeholder="Address" value="{{ old('address') }}">
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Thông tin thêm</label>
                                <textarea class="form-control" name="note" id="note" rows="7"
                                    placeholder="Password, infomation, etc...">{{ old('note') }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
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
                                <button type="submit" id="submit-domain-create" class="btn btn-primary ms-auto">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16"
                                            height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Tạo tên miền
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
