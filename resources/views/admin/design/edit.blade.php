@extends('layouts.app')

@section('content')
    <div id="page-design">
        <div class="page-design__header mb-3">
            <div class="container">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Tổng quan</div>
                        <h3 class="page-title">Thiết kế</h3>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.design.index') }}" class="btn btn-primary d-none d-sm-inline-block btn-black"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg> Quay lại
                            </a>
                            <a href="{{ route('admin.design.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
        <div class="page-design__talbe">
            <div class="container">
                <div class="card">
                    <div class="card-header">Thông tin thiết kế</div>
                    <form action="{{ route('admin.design.update', $design) }}" method="POST" role="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="first_name" class="form-label">Firts Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        placeholder="Phil"
                                        value="{{ old('first_name') ? old('first_name') : $design->first_name }}">
                                    @error('first_name')
                                        <small class="text-red">{{ $errors->first('first_name') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" id="last_name"
                                        value="{{ old('last_name') ? old('last_name') : $design->last_name }}"
                                        class="form-control" placeholder="John">
                                    @error('last_name')
                                        <small class="text-red">{{ $errors->first('last_name') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <hr class="mt-2 mb-3" />
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="first_name" class="form-label">Uploads design</label>
                                    <div class="progress progress_file_img" style="display: none;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <div id="upload-zone_file_img" class="media py-5 border-ec-dashed mb-2 rounded">
                                        <div class="media-body">
                                            <i class="fa fa-cloud-upload fa-3x text-ec-lightGray mx-3 align-middle"
                                                aria-hidden="true"></i>
                                            <input type="file" id="file_img" name="image" multiple accept="image/*"
                                                style="display:none;" class="form-control-file">
                                            <a class="btn btn-ec-regular mr-2 click_button" data-type="file_img">
                                                {{ __('common.upload') }}
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="photo" id="photo_file_img"
                                        value="{{ old('photo') ? old('photo') : $design->photo }}">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="c-form__fileUploadThumbnails clearfix ui-sortable classThumb thumbFileImage thumbFileImage_file_img show"
                                        style="display: block">
                                        <div class="c-form__fileUploadThumbnail"
                                            style="background-image:url('{{ asset('/uploads/designs/' . $design->photo) }}');">
                                            <a class="delete-image" data-type="file_img">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
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
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2 mb-3" />
                            <div class="mb-3">
                                <label for="url" class="form-label">Google driver</label>
                                <input type="text" class="form-control" name="url" id="url"
                                    placeholder="https://driver.google.com"
                                    value="{{ old('url') ? old('url') : $design->url }}">
                                @error('url')
                                    <small class="text-red">{{ $errors->first('url') }}</small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="date_start" class="form-label">Ngày bắt đầu</label>
                                    <input type="date" name="date_start"
                                        value="{{ old('date_start') ? old('date_start') : $design->date_start }}"
                                        id="date_start" class="form-control" placeholder="">
                                    @error('date_start')
                                        <small class="text-red">{{ $errors->first('date_start') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="date_finish" class="form-label">Ngày hoàn thành</label>
                                    <input type="date" name="date_finish"
                                        value="{{ old('date_finish') ? old('date_finish') : $design->date_finish }}"
                                        id="date_finish" class="form-control" placeholder="">
                                    @error('date_finish')
                                        <small class="text-red">{{ $errors->first('date_finish') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="status_id" class="form-label">Trạng thái</label>
                                    <select class="form-select form-select-md" name="status_id" id="status_id">
                                        @foreach ($status as $item)
                                            <option
                                                {{ old('status_id') ? 'selected' : ($item->id === $design->status_id ? 'selected' : '') }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="font_family" class="form-label">Font family</label>
                                <textarea class="form-control" name="font_family" id="font_family" rows="5" placeholder="">{{ old('font_family') ? old('font_family') : $design->font_family }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="url_example" class="form-label">Đường dẫn mẫu</label>
                                <textarea class="form-control" name="url_example" id="url_example" rows="5" placeholder="">{{ old('url_example') ? old('url_example') : $design->url_example }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Thông tin thêm</label>
                                <textarea class="form-control" name="note" id="note" rows="7" placeholder="">{{ old('note') ? old('note') : $design->note }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-danger text-decoration-none btn-delete" type="button">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash me-1" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                        Xóa thiết kế
                                    </span>
                                </button>
                                <div>
                                    <button class="btn btn-warning text-decoration-none" type="reset">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-clockwise me-1"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z">
                                                </path>
                                                <path
                                                    d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z">
                                                </path>
                                            </svg> Reset
                                        </span>
                                    </button>
                                    <button type="submit" id="submit-design-create" class="btn btn-primary ms-auto btn-black">
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
                                            </svg> Chỉnh sửa thiết kế
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('admin.design.destroy', $design) }}" id="form-delete" method="POST"
                        role="form">
                        @csrf
                        @method('DELETE')
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
                        $('.c-form__fileUploadThumbnails').show();
                        $('.progress_' + type).hide();
                        var text = `
                        <div class="c-form__fileUploadThumbnail" style="background-image:url('${data.result.path}');">
                            <a class="delete-image">
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
                var thumbnail = $(this).parents('div.c-form__fileUploadThumbnail');
                $('input#infomation_admin_file_img_' + type).val("");
                $(thumbnail).remove();
            });
        });
    </script>
@endsection
