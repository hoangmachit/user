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
                                            <option data-href="{{ route('admin.contract.customer', $item) }}"
                                                value="{{ $item->id }}">{{ $item->full_name() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="first_name" class="form-label">Firts Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        placeholder="Phil" value="{{ old('first_name') ? old('first_name') : '' }}">
                                    @error('first_name')
                                        <small class="text-red">{{ $errors->first('first_name') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" id="last_name"
                                        value="{{ old('last_name') ? old('last_name') : '' }}" class="form-control"
                                        placeholder="John">
                                    @error('last_name')
                                        <small class="text-red">{{ $errors->first('last_name') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder=""
                                    value="{{ old('address') ? old('address') : '' }}">
                                @error('address')
                                    <small class="text-red">{{ $errors->first('address') }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="birth_day" class="form-label">Birth day</label>
                                    <input type="datetime" name="birth_day" id="birth_day" class="form-control"
                                        placeholder="" value="{{ old('birth_day') ? old('birth_day') : '' }}">
                                    @error('birth_day')
                                        <small class="text-red">{{ $errors->first('birth_day') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="identity_card" class="form-label">CCCD/CMND</label>
                                    <input type="number" name="identity_card" id="identity_card"
                                        value="{{ old('identity_card') ? old('identity_card') : '' }}"
                                        class="form-control" placeholder="">
                                    @error('identity_card')
                                        <small class="text-red">{{ $errors->first('identity_card') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="example@gmail.com" value="{{ old('email') ? old('email') : '' }}">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone"
                                        value="{{ old('phone') ? old('phone') : '' }}" class="form-control"
                                        placeholder="0909 090 090">
                                    @error('phone')
                                        <small class="text-red">{{ $errors->first('phone') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="zalo" class="form-label">Zalo</label>
                                    <input type="text" name="zalo" id="zalo" class="form-control"
                                        placeholder="" value="{{ old('zalo') ? old('zalo') : '' }}">
                                    @error('zalo')
                                        <small class="text-red">{{ $errors->first('zalo') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" name="fax" id="fax"
                                        value="{{ old('fax') ? old('fax') : '' }}" class="form-control"
                                        placeholder="0909 090 090">
                                </div>
                            </div>
                            <hr class="mt-2 mb-3" />
                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <label for="first_name" class="form-label">Identity Image Before</label>
                                    <div class="progress progress_identity_before" style="display: none;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <div id="upload-zone_identity_before"
                                        class="media py-5 border-ec-dashed mb-2 rounded">
                                        <div class="media-body">
                                            <i class="fa fa-cloud-upload fa-3x text-ec-lightGray mx-3 align-middle"
                                                aria-hidden="true"></i>
                                            <input type="file" id="identity_before" name="image" multiple
                                                accept="image/*" style="display:none;" class="form-control-file">
                                            <a class="btn btn-ec-regular mr-2 click_button" data-type="identity_before">
                                                {{ __('common.upload') }}
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="identity_before" id="photo_identity_before"
                                        value="">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="c-form__fileUploadThumbnails c-form__fileUploadThumbnails_identity_before clearfix ui-sortable classThumb thumbFileImage thumbFileImage_identity_before"
                                        style="display: block">
                                        <div class="c-form__fileUploadThumbnail"
                                            style="background-image:url('{{ asset('/uploads/designs/') }}');">
                                            <a class="delete-image" data-type="identity_before"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7">
                                                    </line>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <label for="first_name" class="form-label">Identity Image After</label>
                                    <div class="progress progress_identity_after" style="display: none;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <div id="upload-zone_identity_after" class="media py-5 border-ec-dashed mb-2 rounded">
                                        <div class="media-body">
                                            <i class="fa fa-cloud-upload fa-3x text-ec-lightGray mx-3 align-middle"
                                                aria-hidden="true"></i>
                                            <input type="file" id="identity_after" name="image" multiple
                                                accept="image/*" style="display:none;" class="form-control-file">
                                            <a class="btn btn-ec-regular mr-2 click_button" data-type="identity_after">
                                                {{ __('common.upload') }}
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="identity_after" id="photo_identity_after"
                                        value="">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="c-form__fileUploadThumbnails c-form__fileUploadThumbnails_identity_after clearfix ui-sortable classThumb thumbFileImage thumbFileImage_identity_after"
                                        style="display: block">
                                        <div class="c-form__fileUploadThumbnail"
                                            style="background-image:url('{{ asset('/uploads/designs/') }}');">
                                            <a class="delete-image" data-type="identity_after"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7">
                                                    </line>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2 mb-3" />
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company_name" id="company_name"
                                    placeholder="" value="{{ old('company_name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="company_address" class="form-label">Company Address</label>
                                <input type="text" class="form-control" name="company_address" id="company_address"
                                    placeholder="" value="{{ old('company_address') }}">
                            </div>
                            <div class="mb-3">
                                <label for="company_tax_code" class="form-label">Company Tax Code</label>
                                <input type="text" class="form-control" name="company_tax_code" id="company_tax_code"
                                    placeholder="" value="{{ old('company_tax_code') }}">
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Thông tin thêm khách hàng</label>
                                <textarea class="form-control" name="note" id="note" rows="7" placeholder="">{{ old('note') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">Thông tin tên miền, thiết kế</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12" id="cardDomain">
                                    <label for="status_id" class="form-label">Tên miền</label>
                                    <select class="form-select form-select-md" name="domain_id" id="domain_id">
                                        <option value="0">Choice domain</option>
                                        @foreach ($domains as $item)
                                            <option data-href="{{ route('admin.contract.domain', $item) }}"
                                                value="{{ $item->id }}">{{ $item->domain_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="row mt-2">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="price_domain_min" class="form-label">Price Min</label>
                                            <input type="text" class="form-control" id="price_domain_min"
                                                name="price_domain_min" value="{{ old('price_domain_min') }}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="price_domain_max" class="form-label">Price Max</label>
                                            <input type="text" class="form-control" id="price_domain_max"
                                                name="price_domain_max" value="{{ old('price_domain_max') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12" id="cardPackage">
                                    <label for="status_id" class="form-label">Hosting packages</label>
                                    <select class="form-select form-select-md" name="package_id" id="package_id">
                                        <option value="0">Choice package</option>
                                        @foreach ($packages as $item)
                                            <option data-href="{{ route('admin.contract.package', $item) }}"
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="row mt-2">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="price_package_min" class="form-label">Price Min</label>
                                            <input type="text" class="form-control" id="price_package_min"
                                                name="price_package_min" value="{{ old('price_package_min') }}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="price_package_max" class="form-label">Price Max</label>
                                            <input type="text" class="form-control" id="price_package_max"
                                                name="price_package_max" value="{{ old('price_package_max') }}">
                                        </div>
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
@section('js')
    <script src="{{ asset('/fileupload/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('/fileupload/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('/fileupload/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('/fileupload/jquery.fileupload-process.js') }}"></script>
    <script src="{{ asset('/fileupload/jquery.fileupload-validate.js') }}"></script>
    <script>
        function resetDomain(cardDomain) {
            cardDomain.find('input[name="price_domain_min"]').val(0);
            cardDomain.find('input[name="price_domain_max"]').val(0);
        }

        function resetPackage(cardPackage) {
            cardPackage.find('input[name="price_package_min"]').val(0);
            cardPackage.find('input[name="price_package_max"]').val(0);
        }
        jQuery(document).ready(function($) {
            $('.click_button').click(function(event) {
                var type = $(this).data('type');
                $('#' + type).trigger('click');
                $('#' + type).fileupload({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('upload.index') }}",
                    type: "post",
                    sequentialUploads: true,
                    dataType: 'json',
                    dropZone: $('#upload-zone_' + type),
                    done: function(e, data) {
                        $('.c-form__fileUploadThumbnails_' + type).show();
                        $('.progress_' + type).hide();
                        var text = `
                        <div class="c-form__fileUploadThumbnail" style="background-image:url('${data.result.path}');">
                            <a class="delete-image" data-type="${type}">
                              <span class="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>  
                              </span>
                            </a>
                        </div>`;
                        $('.thumbFileImage_' + type).html(text);
                        $('input#photo_' + type).val(data.result
                            .file_name);
                    },
                    fail: function(e, data) {
                        alert("Can't upload");
                    },
                    always: function(e, data) {
                        $('.progress_' + type).hide();
                        $('.progress_' + type).width('0%');
                    },
                    start: function(e, data) {
                        $('.progress_' + type).show();
                    },
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    maxFileSize: 10000000,
                    maxNumberOfFiles: 10,
                    progressall: function(e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('.progress_' + type).css(
                            'width',
                            progress + '%'
                        );
                    },
                    processalways: function(e, data) {}
                });
            });
            $(".classThumb").on("click", '.delete-image', function() {
                var type = $(this).data('type');
                console.log(type);
                var thumbnail = $(this).parents('div.c-form__fileUploadThumbnail');
                $('input#photo_' + type).val("");
                $(thumbnail).remove();
            });
            //  Call API Customer
            $('select#customer_id').on('change', function(e) {
                e.preventDefault();
                let options = $(this).find('option:selected');
                let href = options.data("href");
                let cardCustomer = $('#card-customer');
                $.ajax({
                    url: href,
                    type: "GET",
                    data: "json",
                    beforeSend: function() {

                    },
                    success: function({
                        customer
                    }) {
                        console.log('customer', customer);
                        cardCustomer.find('input[name="first_name"]').val(customer.first_name);
                        cardCustomer.find('input[name="last_name"]').val(customer.last_name);
                        cardCustomer.find('input[name="address"]').val(customer.address);
                        cardCustomer.find('input[name="birth_day"]').val(customer.birth_day);
                        cardCustomer.find('input[name="identity_card"]').val(customer
                            .identity_card);
                        cardCustomer.find('input[name="email"]').val(customer.email);
                        cardCustomer.find('input[name="phone"]').val(customer.phone);
                        cardCustomer.find('input[name="zalo"]').val(customer.zalo);
                        cardCustomer.find('input[name="fax"]').val(customer.fax);
                        /* Company */
                        cardCustomer.find('input[name="company_name"]').val(customer
                            .company_name);
                        cardCustomer.find('input[name="company_address"]').val(customer
                            .company_address);
                        cardCustomer.find('input[name="company_tax_code"]').val(customer
                            .company_tax_code);
                        cardCustomer.find('textarea[name="note"]').val(customer.note);
                        /* Identity Card */
                        const array_photo = [
                            'identity_before',
                            'identity_after'
                        ];
                        array_photo.forEach(element => {
                            let type = element;
                            console.log('type', type, customer);
                            let pathImage = "";
                            let valuePhoto = "";
                            if (type == 'identity_before') {
                                pathImage = customer.image_identity_before;
                                valuePhoto = customer.identity_before;
                            } else {
                                pathImage = customer.image_identity_after;
                                valuePhoto = customer.identity_after;
                            }
                            $('.c-form__fileUploadThumbnails_' + type).show();
                            $('.progress_' + type).hide();
                            let text = `
                            <div class="c-form__fileUploadThumbnail" style="background-image:url('${pathImage}');">
                                <a class="delete-image" data-type="${type}">
                                <span class="svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>  
                                </span>
                                </a>
                            </div>`;
                            $('.thumbFileImage_' + type).html(text);
                            $('input#photo_' + type).val(valuePhoto);
                        });

                    },
                    complete: function() {

                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
            //  Call API Domain
            $('select#domain_id').on('change', function(e) {
                e.preventDefault();
                let cardDomain = $('#cardDomain');
                if ($(this).val() == 0) {
                    resetDomain(cardDomain);
                    return false;
                }
                let options = $(this).find('option:selected');
                let href = options.data("href");
                $.ajax({
                    url: href,
                    type: "GET",
                    data: "json",
                    beforeSend: function() {

                    },
                    success: function({
                        domain
                    }) {
                        /* Price Min Max */
                        cardDomain.find('input[name="price_domain_min"]').val(domain
                            .price_special);
                        cardDomain.find('input[name="price_domain_max"]').val(domain
                            .price);
                    },
                    complete: function() {

                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
            //  Call API Package
            $('select#package_id').on('change', function(e) {
                e.preventDefault();
                let cardPackage = $('#cardPackage');
                if ($(this).val() == 0) {
                    resetPackage(cardPackage);
                    return false;
                }
                let options = $(this).find('option:selected');
                let href = options.data("href");
                $.ajax({
                    url: href,
                    type: "GET",
                    data: "json",
                    beforeSend: function() {

                    },
                    success: function({
                        package
                    }) {
                        /* Price Min Max */
                        cardPackage.find('input[name="price_package_min"]').val(package
                            .price_special);
                        cardPackage.find('input[name="price_package_max"]').val(package
                            .price);
                    },
                    complete: function() {

                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
