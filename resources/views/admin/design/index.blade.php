@extends('layouts.app')

@section('content')
    <div id="page-domain">
        <div class="page-domain__header mb-3">
            <div class="container">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Tổng quan</div>
                        <h3 class="page-title">Thiết kế</h3>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.design.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                    </path>
                                </svg> Tạo thiết kế
                            </a>
                            <a href="{{ route('admin.design.create') }}" class="btn btn-primary d-sm-none btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                    </path>
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
                    <div class="card-header">Danh sách thiết kế</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Tên</th>
                                        <th>Full name</th>
                                        <th width="100">Google driver</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($designs as $key => $item)
                                        <tr>
                                            <td><span class="text-muted">{{ $key + 1 }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.design.edit', $item) }}"
                                                    class="text-decoration-none domain_edit">
                                                    <h3 class="title-name">{{ $item->full_name() }}</h3>
                                                </a>
                                            </td>
                                            <td><span class="domain_name">{{ $item->full_name() }}</span>
                                            </td>
                                            <td aligns="center">
                                                <a class="line-height-1 btn btn-warning" target="blank" href="{{ $item->url }}"
                                                    title="Google driver">
                                                    Xem chi tiết
                                                </a>
                                            </td>
                                            <td>{{ $item->date_start }}</td>
                                            <td>{{ $item->date_finish }}</td>
                                            <td>
                                                <span
                                                    class="label_year {{ !empty($item->status) ? $item->status->class : '' }}">{{ !empty($item->status) ? $item->status->name : '' }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
