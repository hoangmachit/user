@extends('layouts.app')

@section('content')
    <div id="page-domain">
        <div class="page-domain__header mb-3">
            <div class="container">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Tổng quan</div>
                        <h3 class="page-title">Hợp đồng</h3>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.contract.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                    </path>
                                </svg> Tạo Hợp đồng
                            </a>
                            <a href="{{ route('admin.contract.create') }}" class="btn btn-primary d-sm-none btn-icon">
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
                    <div class="card-header">Danh sách hợp đồng</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <td>Ngày kí</td>
                                        <td>Payment 1st</td>
                                        <td>Payment 2st</td>
                                        <td>Domain</td>
                                        <td>Hosting</td>
                                        <td>Customer</td>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts as $key => $item)
                                        <tr>
                                            <td><span class="text-muted">{{ $key + 1 }}</span></td>
                                            <td><span>{{ $item->code }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.contract.edit', $item) }}"
                                                    class="text-decoration-none domain_edit">
                                                    <h3 class="title-name">{{ $item->name }}</h3>
                                                </a>
                                            </td>
                                            <td><span>{{ $item->signing_date }}</span></td>
                                            <td><span>{{ $item->date_payment_1st }}</span></td>
                                            <td><span>{{ $item->date_payment_2st }}</span></td>
                                            <td>
                                                @if (!empty($item->domains))
                                                    @foreach ($item->domains as $dm)
                                                        <span class="domain_name">{{ $dm->domain_name }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($item->hostings))
                                                    @foreach ($item->hostings as $ht)
                                                        <span class="domain_name">{{ $ht->name }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($item->customers))
                                                    @foreach ($item->customers as $c)
                                                        <span
                                                            class="domain_name">{{ $c->last_name . $c->first_name }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
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
                        <div class="render-paginate">
                            {{ $contracts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
