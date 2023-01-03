@extends('layouts.app')

@section('content')
    <div id="page-contract">
        <div v-if="toast" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Notifications</strong>
                    <small>Just now</small>
                    <button type="button" class="btn-close" @click="closeToast"></button>
                </div>
                <div class="toast-body">
                    @{{ message }}
                </div>
            </div>
        </div>
        <div class="page-contract__header mb-3">
            <div class="container">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Tổng quan</div>
                        <h3 class="page-title">Chỉnh sửa hợp đồng</h3>
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
                <form action="{{ route('admin.contract.update', $contract) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">Thông tin hợp đồng</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="HD" value="{{ old('name') ? old('name') : $contract->name }}">
                                    @error('name')
                                        <small class="text-red">{{ $errors->first('name') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="code" class="form-label">Code</label>
                                    <input type="text" name="code" id="code"
                                        value="{{ old('code') ? old('code') : $contract->code }}" class="form-control"
                                        placeholder="TKW">
                                    @error('code')
                                        <small class="text-red">{{ $errors->first('code') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="signing_date" class="form-label">Ngày kí</label>
                                    <input type="date" name="signing_date" id="signing_date" class="form-control"
                                        placeholder=""
                                        value="{{ old('signing_date') ? old('signing_date') : $contract->signing_date }}">
                                    @error('signing_date')
                                        <small class="text-red">{{ $errors->first('signing_date') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="date_of_delivery" class="form-label">Ngày hoàn thành</label>
                                    <input type="date" name="date_of_delivery" id="date_of_delivery"
                                        value="{{ old('date_of_delivery') ? old('date_of_delivery') : $contract->date_of_delivery }}"
                                        class="form-control" placeholder="">
                                    @error('date_of_delivery')
                                        <small class="text-red">{{ $errors->first('date_of_delivery') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú về hợp đồng</label>
                                <textarea class="form-control" name="note" id="note" rows="7" placeholder="">{{ old('note') ? old('note') : $contract->note }}</textarea>
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
                                        placeholder="1.000.000"
                                        value="{{ old('payment_1st') ? old('payment_1st') : $contract->payment_1st }}">
                                    @error('payment_1st')
                                        <small class="text-red">{{ $errors->first('payment_1st') }}</small>
                                    @enderror
                                    <input type="date" name="date_payment_1st" id="date_payment_1st"
                                        class="form-control mt-2" placeholder=""
                                        value="{{ old('date_payment_1st') ? old('date_payment_1st') : $contract->date_payment_1st }}">
                                    @error('date_payment_1st')
                                        <small class="text-red">{{ $errors->first('date_payment_1st') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="payment_2st" class="form-label">Thanh toán đợt 2</label>
                                    <input type="text" name="payment_2st" id="payment_2st" class="form-control"
                                        placeholder="1.000.000"
                                        value="{{ old('payment_2st') ? old('payment_2st') : $contract->payment_2st }}">
                                    @error('payment_2st')
                                        <small class="text-red">{{ $errors->first('payment_1st') }}</small>
                                    @enderror
                                    <input type="date" name="date_payment_2st" id="date_payment_2st"
                                        class="form-control mt-2" placeholder="Phil"
                                        value="{{ old('date_payment_2st') ? old('date_payment_2st') : $contract->date_payment_2st }}">
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
                                            <option
                                                {{ old('customer_id') ? 'selected' : (!empty($contract->customer) && $item->id === $contract->customer->id ? 'selected' : '') }}
                                                data-href="{{ route('admin.contract.customer', $item) }}"
                                                value="{{ $item->id }}">{{ $item->full_name() }}</option>
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
                            <div v-for="(domain, key) in domains" class="row mb-2 p-2">
                                <div class="col-md-12 p-3 border rounded-2">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Choice domains</label>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <select class="form-select"
                                                @change="changeDomain($event, key, domain.old_id)">
                                                <option value="0">Choice domain</option>
                                                <option v-for="(item, index) in all_domains"
                                                    v-bind:selected="domain.domain_id === item.id" v-bind:value="item.id">
                                                    @{{ item.domain_name }}</option>
                                            </select>
                                            <button @click="deleteDomain(domain)" type="button"
                                                class="btn btn-danger w-250 ms-2">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash me-1" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                    Xóa tên miền
                                                </span>
                                            </button>
                                        </div>
                                        <div v-if="errors && errors[key]">
                                            <small class="text-danger">Please select domain information</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Price</label>
                                                <input type="text" class="form-control" placeholder="0"
                                                    :value="domain.price">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Price Special</label>
                                                <input type="text" class="form-control" readonly
                                                    :value="domain.price_special" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-primary btn-add-domain"
                                        @click="minusDomain">Add domains</button>
                                    <button v-if="domains.length" type="button"
                                        class="btn btn-success btn-save-domain me-2" @click="saveDomain()">Save
                                        domains</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4" id="card-package">
                        <div class="card-header">Thông tin hosting</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-primary btn-add-hosting">Add Hosting</button>
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
                                        class="btn btn-primary ms-auto w-400">
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
                                            </svg> Chỉnh sửa hợp đồng
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
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const contract_id = '{{ $contract->id }}';
        const {
            createApp
        } = Vue
        createApp({
            data() {
                return {
                    all_domains: [],
                    domains: [],
                    hostings: [],
                    toast: false,
                    message: "",
                    errors: []
                }
            },
            methods: {
                minusDomain() {
                    this.domains.push({
                        domain_id: 0,
                        old_id: 0,
                        price: 0,
                        price_special: 0
                    });
                },
                async changeDomain(event, key, old_id) {
                    const domain_id = event.target.value;
                    if (domain_id == 0) {
                        this.domains[key] = {
                            domain_id: 0,
                            old_id: 0,
                            price: 0,
                            price_special: 0
                        }
                        return false;
                    }
                    if (domain_id != 0) {
                        this.errors[key] = false;
                    }
                    await axios.get(`http://localhost/user/public/admin/contract/${domain_id}/domain`)
                        .then((response) => {
                            const {
                                domain
                            } = response.data;
                            this.domains[key] = {
                                domain_id: domain.id,
                                old_id: old_id,
                                price: domain.price,
                                price_special: domain.price_special
                            };
                        });
                },
                async saveDomain() {
                    let check = false;
                    this.domains.forEach((item, key) => {
                        if (item.domain_id == 0) {
                            this.errors[key] = true;
                            if (!check) {
                                check = true;
                            }
                        }
                    });
                    if (check) {
                        return false;
                    }
                    await axios.post(`http://localhost/user/public/admin/contract/save/domain`, {
                        contract_id: contract_id,
                        domains: this.domains
                    }).
                    then((response) => {
                        this.toast = true;
                        this.message = "Successfully saved the domain !!!";
                    });
                },
                async deleteDomain(domain) {
                    await axios.delete(`http://localhost/user/public/admin/contract/delete/domain`, {
                        params: {
                            contract_id: contract_id,
                            domain_id: domain.domain_id
                        }
                    }).
                    then((response) => {
                        this.toast = true;
                        this.message = "You have delete to domain name !!!";
                        this.getDomains();
                    });
                },
                async allDomain() {
                    await axios.get(`http://localhost/user/public/admin/domain/all`).
                    then((response) => {
                        const {
                            all_domains
                        } = response.data;
                        this.all_domains = all_domains;
                    });
                },
                async getDomains() {
                    await axios.get(`http://localhost/user/public/admin/contract/list/domain`, {
                        params: {
                            contract_id: contract_id
                        }
                    }).
                    then((response) => {
                        const {
                            domains
                        } = response.data;
                        this.domains = domains;
                    });
                },
                async getPackages(){
                    await axios.get(`http://localhost/user/public/admin/contract/list/package`, {
                        params: {
                            contract_id: contract_id
                        }
                    }).
                    then((response) => {
                        const {
                            hostings
                        } = response.data;
                        this.hostings = hostings;
                    });
                },
                closeToast() {
                    this.toast = false;
                    this.message = "";
                }
            },
            mounted() {
                this.allDomain();
                this.getDomains();
                this.getPackages();
            },
        }).mount('#page-contract');
    </script>
@endsection
