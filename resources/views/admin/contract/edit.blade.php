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
                                            <option {{ $item->id === $contract_customer->customer_id ? 'selected' : '' }}
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
                                            <option {{ $item->id === $contract_design->design_id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->full_name() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4" id="card-domain">
                        <div class="card-header">Thông tin tên miền</div>
                        <div class="card-body">
                            <div v-for="(domain, key) in contract_domains" class="row mb-2 p-2">
                                <div class="col-md-12 p-3 border rounded-2">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Choice domains</label>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <select class="form-select" @change="changeSelectDomain($event, key)">
                                                <option v-if="domain.old_domain_id == 0" value="0">Choice domain
                                                </option>
                                                <option v-for="(item, index) in list.domains"
                                                    v-bind:selected="domain.domain_id === item.id" v-bind:value="item.id">
                                                    @{{ item.domain_name }}</option>
                                            </select>
                                            <button type="button" @click="removeDomain(domain, key)"
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Price</label>
                                                <input type="text" class="form-control" placeholder="0"
                                                    :value="formatPrice(domain.price)">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Price Special</label>
                                                <input type="text" class="form-control" readonly
                                                    :value="formatPrice(domain.price_special)" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-primary btn-add-domain" @click="addDomain">Add
                                        domain</button>
                                    <button v-if="contract_domains.length" type="button"
                                        class="btn btn-success btn-save-domain me-2" @click="saveDomain">Save
                                        domains</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4" id="card-package">
                        <div class="card-header">Thông tin hosting</div>
                        <div class="card-body">
                            <div v-for="(package, key) in contract_packages" class="row mb-2 p-2">
                                <div class="col-md-12 p-3 border rounded-2">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Choice package</label>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <select class="form-select" @change="changeSelectPackage($event, key)">
                                                <option v-if="package.old_package_id == 0" value="0">Choice package
                                                </option>
                                                <option v-for="(item, index) in list.packages"
                                                    v-bind:selected="package.package_id === item.id"
                                                    v-bind:value="item.id">
                                                    @{{ item.name }}</option>
                                            </select>
                                            <button type="button" @click="removePackage(package, key)"
                                                class="btn btn-danger w-250 ms-2">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash me-1" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                    Xóa package
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Price</label>
                                                <input type="text" class="form-control" placeholder="0"
                                                    :value="formatPrice(package.price)">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Price Special</label>
                                                <input type="text" class="form-control" readonly
                                                    :value="formatPrice(package.price_special)" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div
                                    class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-primary btn-add-hosting"
                                        @click="addPackage">Add hosting</button>
                                    <button v-if="contract_packages.length" type="button"
                                        class="btn btn-success btn-save-domain me-2" @click="savePackage">Save
                                        Hosting</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-footer border-0">
                            <div class="d-flex justify-content-between align-items-between">
                                <button class="btn btn-danger text-decoration-none btn-delete" type="button">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash me-1" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                        Xóa hợp đồng
                                    </span>
                                </button>
                                <div class="d-flex justify-conten-end align-items-center">
                                    <select class="form-select form-select-md me-2" name="status_id" id="status_id">
                                        @foreach ($status as $item)
                                            <option
                                                {{ old('status_id') ? 'selected' : ($item->id === $contract->status_id ? 'selected' : '') }}
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
                <form action="{{ route('admin.contract.destroy', $contract) }}" id="form-delete" method="POST"
                    role="form">
                    @csrf
                    @method('DELETE')
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
        const PUBLIC_API = 'https://user.local/admin';
        const {
            createApp
        } = Vue
        createApp({
            data() {
                return {
                    list: [],
                    contract_domains: [],
                    contract_packages: [],
                    toast: false,
                    message: ""
                }
            },
            methods: {
                closeToast() {
                    this.toast = false;
                    this.message = "";
                },
                addDomain() {
                    const default_domain = {
                        id: 0,
                        domain_name: "",
                        price: 0,
                        price_special: 0,
                        old_domain_id: 0
                    };
                    this.contract_domains.push(default_domain);
                },
                addPackage() {
                    const default_package = {
                        id: 0,
                        name: "",
                        price: 0,
                        price_special: 0,
                        package_id: 0,
                        old_package_id: 0
                    };
                    this.contract_packages.push(default_package);
                },
                formatPrice(value) {
                    let val = (value / 1).toFixed(0).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                },
                async saveDomain() {
                    axios.post(`${PUBLIC_API}/contract/save-domain`, {
                            contract_domains: this.contract_domains,
                            contract_id: contract_id
                        })
                        .then((response) => {
                            this.getDataDomainsPackage();
                            this.toast = true;
                            this.message = "Add domain successfully!!!";
                        });
                },
                async savePackage() {
                    axios.post(`${PUBLIC_API}/contract/save-package`, {
                            contract_packages: this.contract_packages,
                            contract_id: contract_id
                        })
                        .then((response) => {
                            this.getDataDomainsPackage();
                        });
                    this.toast = true;
                    this.message = "Add package successfully!!!";
                },
                async removeDomain(domain, key) {
                    if (domain.id != 0 && domain.domain_id != 0) {
                        axios.delete(`${PUBLIC_API}/contract/delete-domain`, {
                                data: {
                                    domain,
                                    contract_id
                                }
                            })
                            .then((response) => {
                                const {
                                    result
                                } = response.data;
                            });
                    }
                    this.contract_domains.splice(key, 1);
                    return true;
                },
                async removePackage(package, key) {
                    if (package.id != 0 && package.package_id != 0) {
                        axios.delete(`${PUBLIC_API}/contract/delete-package`, {
                                data: {
                                    package,
                                    contract_id
                                }
                            })
                            .then((response) => {
                                const {
                                    result
                                } = response.data;
                            });
                    }
                    this.contract_packages.splice(key, 1);
                    return true;
                },
                async getList() {
                    axios.get(`${PUBLIC_API}/contract/list`)
                        .then((response) => {
                            const {
                                result
                            } = response.data;
                            this.list = result;
                        });
                },
                async getDataDomainsPackage() {
                    axios.get(`${PUBLIC_API}/contract/data-all`, {
                            params: {
                                contract_id
                            }
                        })
                        .then((response) => {
                            const {
                                result
                            } = response.data;
                            const {
                                contract_domains,
                                contract_packages
                            } = result;
                            this.contract_domains = contract_domains;
                            this.contract_packages = contract_packages;
                        });
                },
                async changeSelectDomain(event, key) {
                    let domain_id = parseInt(event.target.value);
                    if (domain_id == 0) {
                        return true;
                    }
                    axios.get(`${PUBLIC_API}/contract/detail-domain`, {
                            params: {
                                domain_id
                            }
                        })
                        .then((response) => {
                            const {
                                result
                            } = response.data;
                            const {
                                domain
                            } = result;
                            this.contract_domains[key].domain_name = domain.domain_name;
                            this.contract_domains[key].domain_id = domain_id;
                            this.contract_domains[key].price = domain.price;
                            this.contract_domains[key].price_special = domain.price_special;
                        });
                },
                async changeSelectPackage(event, key) {
                    let package_id = parseInt(event.target.value);
                    if (package_id == 0) {
                        return true;
                    }
                    axios.get(`${PUBLIC_API}/contract/detail-package`, {
                            params: {
                                package_id
                            }
                        })
                        .then((response) => {
                            const {
                                result
                            } = response.data;
                            const {
                                package
                            } = result;
                            this.contract_packages[key].name = package.name;
                            this.contract_packages[key].package_id = package_id;
                            this.contract_packages[key].price = package.price;
                            this.contract_packages[key].price_special = package.price_special;
                        });
                }

            },
            mounted() {
                this.getList();
                this.getDataDomainsPackage();
            },
        }).mount('#page-contract');
    </script>
@endsection
