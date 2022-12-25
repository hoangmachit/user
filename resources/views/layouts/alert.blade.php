<div class="container">
    @if (session('_success'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('_success') }}
                </div>
            </div>
        </div>
    @endif
    @if (session('_errors'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{ session('_errors') }}
                </div>
            </div>
        </div>
    @endif
</div>
