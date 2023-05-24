@extends('template.home')
@section('judul', 'Dashboard')
@section('content')

    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">local_hotel</i>
                </div>
                <div class="content">
                    <div class="text">PASIEN RAWAT INAP </div>
                    <div class="number count-to" data-from="0" data-to="{{ $ranap->count() }}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">accessible</i>
                </div>
                <div class="content">
                    <div class="text">PASIEN RAWAT JALAN</div>
                    <div class="number count-to" data-from="0" data-to="{{ $rajal->count() }}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-red hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">emergency</i>
                </div>
                <div class="content">
                    <div class="text">PASIEN IGD</div>
                    <div class="number count-to" data-from="0" data-to="{{ $igd->count() }}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">PASIEN BARU</div>
                    <div class="number count-to" data-from="0" data-to="{{ $baru }}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-default hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="content">
                    <div class="text">PASIEN LAMA</div>
                    <div class="number count-to" data-from="0" data-to="{{ $lama }}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-indigo hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">PASIEN RADIOLOGI</div>
                    <div class="number count-to" data-from="0" data-to="{{ $rad->count() }}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">science</i>
                </div>
                <div class="content">
                    <div class="text">PASIEN LABORATORIUM</div>
                    <div class="number count-to" data-from="0" data-to="{{ $lab->count() }}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PASIEN RAWAT INAP ({{ $ranap->count() }} Pasien)
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th width="100%">Informasi Pasien</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranap as $pasien)
                                    <tr>
                                        <td>
                                            <div class="row clearfix">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="header bg-pink">
                                                            <h2>
                                                                {{ substr($pasien->NOPASIEN, 2) }} -
                                                                {{ $pasien->pasien->NAMAPASIEN }} - @if ($pasien->JNSKELAMIN == 'L')
                                                                    <span class="material-icons">male</span>
                                                                @else
                                                                    <span class="material-icons">female</span>
                                                                @endif
                                                            </h2>
                                                            <ul class="header-dropdown m-r--5">
                                                                <li class="dropdown">
                                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                                        data-toggle="dropdown" role="button"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </a>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li><a href="javascript:void(0);">CPPT</a></li>
                                                                        <li><a href="javascript:void(0);">Resume Medis</a>
                                                                        </li>
                                                                        <li><a href="javascript:void(0);">e-RM</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="body">
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="col-lg-12 mb-0">
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">local_hotel</i>
                                                                        <span class="icon-name">
                                                                            {{ date('d-M-Y', strtotime($pasien->ranap->TGLMASUK)) }}
                                                                            -
                                                                            {{ $pasien->ranap->unit->NAMABAGIAN }} -
                                                                            {{ $pasien->ranap->NOKMRMSK }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">business</i>
                                                                        <span
                                                                            class="icon-name">{{ $pasien->perusahaan->NAMAPT }}</span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">place</i><span
                                                                            class="icon-name">{{ $pasien->pasien->ALM1PASIEN }}</span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">person</i>
                                                                        <span
                                                                            class="icon-name">{{ $pasien->ranap->dokter->NAMADOKTER }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PASIEN RAWAT JALAN ({{ $rajal->count() }} Pasien)
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th width="100%">Informasi Pasien</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rajal as $pasien)
                                    <tr>
                                        <td>
                                            <div class="row clearfix">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="header bg-cyan">
                                                            <h2>
                                                                {{ substr($pasien->NORM, 2) }} -
                                                                {{ $pasien->PASIEN }} - @if ($pasien->JNSKELAMIN == 'L')
                                                                    <span class="material-icons">male</span>
                                                                @else
                                                                    <span class="material-icons">female</span>
                                                                @endif
                                                            </h2>
                                                            <ul class="header-dropdown m-r--5">
                                                                <li class="dropdown">
                                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                                        data-toggle="dropdown" role="button"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </a>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li><a href="javascript:void(0);">CPPT</a></li>
                                                                        <li><a href="javascript:void(0);">Resume Medis</a>
                                                                        </li>
                                                                        <li><a href="javascript:void(0);">e-RM</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="body">
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="col-lg-12 mb-0">
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">accessible</i>
                                                                        <span class="icon-name">
                                                                            {{ $pasien->NOREG }} -
                                                                            {{ $pasien->POLI }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">business</i>
                                                                        <span
                                                                            class="icon-name">{{ $pasien->PENJAMIN }}</span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">place</i><span
                                                                            class="icon-name">{{ $pasien->ALM1PASIEN }}</span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">person</i>
                                                                        <span
                                                                            class="icon-name">{{ $pasien->bagian->dokter->NAMADOKTER }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PASIEN IGD ({{ $igd->count() }} Pasien)
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th width="100%">Informasi Pasien</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($igd as $pasien)
                                    <tr>
                                        <td>
                                            <div class="card">
                                                <div class="header bg-red">
                                                    <h2>
                                                        {{ substr($pasien->NORM, 2) }} -
                                                        {{ $pasien->PASIEN }} - @if ($pasien->JNSKELAMIN == 'L')
                                                            <span class="material-icons">male</span>
                                                        @else
                                                            <span class="material-icons">female</span>
                                                        @endif
                                                    </h2>
                                                    <ul class="header-dropdown m-r--5">
                                                        <li class="dropdown">
                                                            <a href="javascript:void(0);" class="dropdown-toggle"
                                                                data-toggle="dropdown" role="button"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="javascript:void(0);">CPPT</a></li>
                                                                <li><a href="javascript:void(0);">Resume Medis</a>
                                                                </li>
                                                                <li><a href="javascript:void(0);">e-RM</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="body">
                                                    <div class="row clearfix demo-icon-container">
                                                        <div class="col-lg-12 py-0">
                                                            <div class="demo-google-material-icon">
                                                                <i class="material-icons">contacts</i>
                                                                <span class="icon-name">
                                                                    {{ $pasien->NOREG }}
                                                                </span>
                                                            </div>
                                                            <div class="demo-google-material-icon">
                                                                <i class="material-icons">business</i>
                                                                <span class="icon-name">{{ $pasien->PENJAMIN }}</span>
                                                            </div>
                                                            <div class="demo-google-material-icon">
                                                                <i class="material-icons">place</i><span
                                                                    class="icon-name">{{ $pasien->ALM1PASIEN }}</span>
                                                            </div>
                                                            <div class="demo-google-material-icon">
                                                                <i class="material-icons">person</i>
                                                                <span
                                                                    class="icon-name">{{ $pasien->bagian->dokter->NAMADOKTER }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PEMERIKSAAN RADIOLOGI ({{ $rad->count() }} Pasien)
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th width="100%">Informasi Pasien</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rad as $pasien)
                                    <tr>
                                        <td>
                                            <div class="row clearfix">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="header bg-indigo">
                                                            <h2>
                                                                {{ substr($pasien->NORM, 2) }} -
                                                                {{ $pasien->PASIEN }} - @if ($pasien->JNSKELAMIN == 'L')
                                                                    <span class="material-icons">male</span>
                                                                @else
                                                                    <span class="material-icons">female</span>
                                                                @endif
                                                            </h2>
                                                            <ul class="header-dropdown m-r--5">
                                                                <li class="dropdown">
                                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                                        data-toggle="dropdown" role="button"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </a>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li><a href="javascript:void(0);">Expertise</a>
                                                                        </li>
                                                                        <li><a href="javascript:void(0);">e-RM</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="body">
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="col-lg-12 mb-0">
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">contacts</i>
                                                                        <span class="icon-name">
                                                                            {{ $pasien->NOREG }} - {{ $pasien->UNIT }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">business</i>
                                                                        <span
                                                                            class="icon-name">{{ $pasien->PENJAMIN }}</span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">place</i><span
                                                                            class="icon-name">{{ $pasien->ALM1PASIEN }}</span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">person</i>
                                                                        <span class="icon-name">{{ $pasien->DPJP }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PEMERIKSAAN LABORATORIUM ({{ $lab->count() }} Pasien)
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th width="100%">Informasi Pasien</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lab as $pasien)
                                    <tr>
                                        <td>
                                            <div class="row clearfix">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="header bg-yellow">
                                                            <h2>
                                                                {{ substr($pasien->NORM, 2) }} -
                                                                {{ $pasien->PASIEN }} - @if ($pasien->JNSKELAMIN == 'L')
                                                                    <span class="material-icons">male</span>
                                                                @else
                                                                    <span class="material-icons">female</span>
                                                                @endif
                                                            </h2>
                                                            <ul class="header-dropdown m-r--5">
                                                                <li class="dropdown">
                                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                                        data-toggle="dropdown" role="button"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </a>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li><a href="javascript:void(0);">CPPT</a></li>
                                                                        <li><a href="javascript:void(0);">Resume Medis</a>
                                                                        </li>
                                                                        <li><a href="javascript:void(0);">e-RM</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="body">
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="col-lg-12 mb-0">
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">contacts</i>
                                                                        <span class="icon-name">
                                                                            {{ $pasien->NOREG }} - {{ $pasien->UNIT }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">business</i>
                                                                        <span
                                                                            class="icon-name">{{ $pasien->PENJAMIN }}</span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">place</i><span
                                                                            class="icon-name">{{ $pasien->ALM1PASIEN }}</span>
                                                                    </div>
                                                                    <div class="demo-google-material-icon">
                                                                        <i class="material-icons">person</i>
                                                                        <span class="icon-name">{{ $pasien->DPJP }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

    <script type="text/javascript">
        $('.number').countTo();
    </script>
@endpush
