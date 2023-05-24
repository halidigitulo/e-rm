@extends('template.home')
@section('judul', 'Data Pasien')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="card">
            <div class="body bg-default">
                <form action="" method="GET">
                    <div class="row my-3">
                        <div class="col-md-3">
                            <label for="">Filter by No. RM</label>
                            <input type="text" name="nopasien" value="{{ Request::get('nopasien') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Filter by Nama</label>
                            <input type="text" name="namapasien" value="{{ Request::get('namapasien') }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Filter by No. HP</label>
                            <input type="number" name="tlppasien" value="{{ Request::get('tlppasien') }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">&NonBreakingSpace;</label><br>
                            {{-- <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filter</button> --}} 
                            <button type="submit" class="btn bg-purple waves-effect">
                                <i class="material-icons">search</i>
                                <span>SEARCH</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Pasien
                </h2>
            </div>
            <div class="body">
                @if ($pasien)
                    @include('pasien.cari')
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush
@push('script')
    <script src="{{ asset('plugins/jquery-countto/jquery.countTo.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
@endpush
