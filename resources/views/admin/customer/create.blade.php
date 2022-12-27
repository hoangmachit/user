@extends('layouts.app')

@section('content')
    <div id="page-customer">
        <div class="page-customer__header mb-3">
            <div class="container">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Tổng quan</div>
                        <h3 class="page-title">Khách hàng</h3>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.customer.index') }}"
                                class="btn btn-primary d-none d-sm-inline-block"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg> Quay lại
                            </a>
                            <a href="{{ route('admin.customer.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
        <div class="page-customer__talbe">
            <div class="container">
                <div class="card">
                    <div class="card-header">Thông tin khách hàng</div>
                    <form action="{{ route('admin.customer.store') }}" method="POST" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="first_name" class="form-label">Firts Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        placeholder="Phil" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <small class="text-red">{{ $errors->first('first_name') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                                        class="form-control" placeholder="John">
                                    @error('last_name')
                                        <small class="text-red">{{ $errors->first('last_name') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder=""
                                    value="{{ old('address') }}">
                                @error('address')
                                    <small class="text-red">{{ $errors->first('address') }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="birth_day" class="form-label">Birth day</label>
                                    <input type="date" name="birth_day" id="birth_day" class="form-control"
                                        placeholder="" value="{{ old('birth_day') }}">
                                    @error('birth_day')
                                        <small class="text-red">{{ $errors->first('birth_day') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="identity_card" class="form-label">CCCD/CMND</label>
                                    <input type="number" name="identity_card" id="identity_card"
                                        value="{{ old('identity_card') }}" class="form-control" placeholder="">
                                    @error('identity_card')
                                        <small class="text-red">{{ $errors->first('identity_card') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="example@gmail.com" value="{{ old('email') }}">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                        class="form-control" placeholder="0909 090 090">
                                    @error('phone')
                                        <small class="text-red">{{ $errors->first('phone') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="zalo" class="form-label">Zalo</label>
                                    <input type="text" name="zalo" id="zalo" class="form-control"
                                        placeholder="" value="{{ old('zalo') }}">
                                    @error('zalo')
                                        <small class="text-red">{{ $errors->first('zalo') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" name="fax" id="fax" value="{{ old('fax') }}"
                                        class="form-control" placeholder="0909 090 090">
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
                                    <div id="upload-zone_identity_before" class="media py-5 border-ec-dashed mb-2 rounded">
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
                                    <input type="hidden" name="identity_before" id="photo_identity_before" value="">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div
                                        class="c-form__fileUploadThumbnails c-form__fileUploadThumbnails_identity_before clearfix ui-sortable classThumb thumbFileImage thumbFileImage_identity_before">
                                        <div class="c-form__fileUploadThumbnail" style="background-image:url('');"><a
                                                class="delete-image" data-type="identity_before"><i class="fa fa-times"
                                                    aria-hidden="true"></i></a>
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
                                    <input type="hidden" name="identity_after" id="photo_identity_after" value="">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div
                                        class="c-form__fileUploadThumbnails c-form__fileUploadThumbnails_identity_after clearfix ui-sortable classThumb thumbFileImage thumbFileImage_identity_after">
                                        <div class="c-form__fileUploadThumbnail" style="background-image:url('');"><a
                                                class="delete-image" data-type="identity_after"><i class="fa fa-times"
                                                    aria-hidden="true"></i></a>
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
                                <label for="status_id" class="form-label">Trạng thái</label>
                                <select class="form-select form-select-md" name="status_id" id="status_id">
                                    @foreach ($status as $item)
                                        <option {{ old('status_id') == $item->id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Thông tin thêm</label>
                                <textarea class="form-control" name="note" id="note" rows="7" placeholder="">{{ old('note') }}</textarea>
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
                                <button type="submit" id="submit-customer-create" class="btn btn-primary ms-auto">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16"
                                            height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Tạo khách hàng
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
@section('js')
    <script src="{{ asset('/fileupload/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('/fileupload/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('/fileupload/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('/fileupload/jquery.fileupload-process.js') }}"></script>
    <script src="{{ asset('/fileupload/jquery.fileupload-validate.js') }}"></script>
    <script>
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
                        $('.c-form__fileUploadThumbnails_'+type).show();
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
        });
    </script>
@endsection