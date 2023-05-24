@extends('template.home')
@section('judul', 'Data Pasien')
@section('content')
    <div class="col">
        <div class="card">
            <div class="header align-items-center">
                <a href="{{ url('pasien') }}" class="btn btn-link"><i class="material-icons">keyboard_backspace</i></a> Detail
                Pasien
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Download Riawayat Medis</a></li>
                            <li><a href="javascript:void(0);">Lihat Riawayat Medis</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-3">
                            <div class="card profile-card">
                                <div class="profile-header">&nbsp;</div>
                                <div class="profile-body">
                                    <div class="image-area">
                                        {{-- <img src="../../images/user-lg.jpg" alt="AdminBSB - Profile Image" /> --}}
                                        @if ($pasien->JNSKELAMIN == 'L')
                                            <img class="profile-user-img img-fluid img-circle" style="max-height: 100px"
                                                src="{{ asset('images/man.png') }}" alt={{ $pasien->NAMAPASIEN }}>
                                        @else
                                            <img class="profile-user-img img-fluid img-circle" style="max-height: 100px"
                                                src="{{ asset('images/woman.png') }}" alt={{ $pasien->NAMAPASIEN }}>
                                        @endif
                                    </div>
                                    <div class="content-area">
                                        <h3>{{ $pasien->NAMAPASIEN }}</h3>
                                        <p>{{ substr($pasien->NOPASIEN, 2) }}</p>
                                    </div>
                                </div>
                                <div class="profile-footer">
                                    <ul>
                                        <li>
                                            <span>No. ID</span>
                                            <span>{{ $pasien->NOKTP }}</span>
                                        </li>
                                        <li>
                                            <span>Tgl. Lahir</span>
                                            <span>{{ date('d-M-Y', strtotime($pasien->TGLLAHIR)) }}</span>
                                        </li>
                                        <li>
                                            <span>Alamat</span>
                                            <span>{{ $pasien->ALM1PASIEN }}</span>
                                        </li>
                                        <li>
                                            <span>Agama</span>
                                            <span>
                                                @if ($pasien->agama)
                                                    {{ $pasien->agama->NAMAAGAMA }}
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                    @if ($pasien->STSPASIEN == 'A')
                                        <button class="btn btn-primary btn-lg waves-effect btn-block">Aktif</button>
                                    @elseif($pasien->STSPASIEN == 'N')
                                        <button class="btn btn-warning btn-lg waves-effect btn-block">Tidak Aktif</button>
                                    @elseif($pasien->STSPASIEN == 'M')
                                        <button class="btn btn-danger btn-lg waves-effect btn-block">Meninggal</button>
                                    @elseif($pasien->STSPASIEN == 'S')
                                        <button class="btn btn-secondary btn-lg waves-effect btn-block">Dimusnahkan</button>
                                    @elseif($pasien->STSPASIEN == 'R')
                                        <button class="btn btn-amber btn-lg waves-effect btn-block">Dimusnahkan</button>
                                    @endif
                                </div>
                            </div>

                            <div class="card card-about-me">
                                <div class="header">
                                    <h2>Informasi Tambahan</h2>
                                </div>
                                <div class="body">
                                    <ul>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">phone</i>
                                                {{ $pasien->TLPPASIEN }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">bloodtype</i>
                                                @if ($pasien->KODEDARAH)
                                                    {{ $pasien->KODEDARAH }}
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">people</i>
                                                @if ($pasien->JNSKELAMIN)
                                                    {{ $pasien->JNSKELAMIN == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">school</i>
                                                @if ($pasien->pendidikan)
                                                    {{ $pasien->pendidikan->NAMADIDIK }}
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">home</i>
                                                @if ($pasien->STKAWIN = 'S')
                                                    Sendiri
                                                @elseif($pasien->STKAWIN = 'M')
                                                    Menikah
                                                @elseif($pasien->STKAWIN = 'J')
                                                    Janda
                                                @elseif($pasien->STKAWIN = 'D')
                                                    Duda
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                <i class="material-icons">notes</i>
                                                Description
                                            </div>
                                            <div class="content">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                                                enim
                                                neque.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="card">
                                <div class="body">
                                    <div>
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                    role="tab" data-toggle="tab"><span
                                                        class="material-icons">info</span> Riwayat Kunjungan</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <div class="panel panel-default panel-post">
                                                    <div class="panel-heading">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <div class="col-md-6">
                                                                    Kunjungan Terakhir ke: <span class="font-bold col-red">
                                                                        @if ($pasien->UNITAKHRS)
                                                                            {{ $pasien->unit->NAMABAGIAN }}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    Tgl Kunjungan Terakhir : <span
                                                                        class="text-bold bg-danger">
                                                                        @if ($pasien->TGLAKHRRS)
                                                                            {{ date('d-M-Y', strtotime($pasien->TGLAKHRS)) }}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="card">
                                                            <div class="body">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No. Registrasi</th>
                                                                                <th>Tgl. Registrasi</th>
                                                                                <th>Unit</th>
                                                                                <th>Nama Dokter</th>
                                                                                <th>Nomor Invoice</th>
                                                                                <th>Penanggung</th>
                                                                                <th>No. SEP</th>
                                                                                <th>No. SEP Ranap</th>
                                                                                <th>Riwayat Medis</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($pasien->registrasi as $result)
                                                                                <tr>
                                                                                    <td>
                                                                                        {{ $result->NOREG }}
                                                                                    </td>
                                                                                    <td>{{ date('d-M-Y', strtotime($result->TGLREG)) }}
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($result->bagian)
                                                                                            {{ $result->bagian->unit->NAMABAGIAN }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($result->bagian)
                                                                                            {{ $result->bagian->dokter->NAMADOKTER }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($result->bagian)
                                                                                            {{ $result->bagian->NOINVOICE }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>{{ $result->perusahaan->NAMAPT }}
                                                                                    </td>
                                                                                    <td>{{ $result->SEP }}</td>
                                                                                    <td>{{ $result->SEP_INAP }}</td>
                                                                                    <td>
                                                                                        <a href="{{ url('pasien/' . $pasien->NOPASIEN . '/' . $result->NOREG) }}"
                                                                                            type="button"
                                                                                            class="btn btn-sm btn-info waves-effect">
                                                                                            <i
                                                                                                class="material-icons">info</i>
                                                                                        </a>
                                                                                        <button type="button"
                                                                                            data-toggle="modal"
                                                                                            data-target="#riwayatModal-{{ $result->NOREG }}"
                                                                                            class="btn btn-sm btn-danger waves-effect">
                                                                                            <i
                                                                                                class="material-icons">visibility</i>
                                                                                        </button>
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
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="NameSurname" class="col-sm-2 control-label">Name
                                                            Surname</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control"
                                                                    id="NameSurname" name="NameSurname"
                                                                    placeholder="Name Surname" value="Marc K. Hammond"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="email" class="form-control" id="Email"
                                                                    name="Email" placeholder="Email"
                                                                    value="example@example.com" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="InputExperience"
                                                            class="col-sm-2 control-label">Experience</label>

                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <textarea class="form-control" id="InputExperience" name="InputExperience" rows="3" placeholder="Experience"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="InputSkills"
                                                            class="col-sm-2 control-label">Skills</label>

                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control"
                                                                    id="InputSkills" name="InputSkills"
                                                                    placeholder="Skills">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <input type="checkbox" id="terms_condition_check"
                                                                class="chk-col-red filled-in" />
                                                            <label for="terms_condition_check">I agree to the <a
                                                                    href="#">terms and conditions</a></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="OldPassword" class="col-sm-3 control-label">Old
                                                            Password</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-line">
                                                                <input type="password" class="form-control"
                                                                    id="OldPassword" name="OldPassword"
                                                                    placeholder="Old Password" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NewPassword" class="col-sm-3 control-label">New
                                                            Password</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-line">
                                                                <input type="password" class="form-control"
                                                                    id="NewPassword" name="NewPassword"
                                                                    placeholder="New Password" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NewPasswordConfirm" class="col-sm-3 control-label">New
                                                            Password (Confirm)</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-line">
                                                                <input type="password" class="form-control"
                                                                    id="NewPasswordConfirm" name="NewPasswordConfirm"
                                                                    placeholder="New Password (Confirm)" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($pasien->registrasi as $result)
        <div class="modal fade" id="riwayatModal-{{ $result->NOREG }}"" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="largeModalLabel">Riwayat Medis Pasien
                            <span class="col-green">({{ substr($result->pasien->NOPASIEN, 2) }}
                                - {{ $result->pasien->NAMAPASIEN }} -
                                {{ $result->pasien->JNSKELAMIN == 'L' ? 'Laki-laki' : 'Perempuan' }} -
                                {{ 'Umur : ' . $result->UMURTH . ' Thn, ' . $result->UMURBL . ' Bln, ' . $result->UMUHR . ' Hr' }})</span>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td>No. Registrasi : <span class="font-bold">{{ $result->NOREG }}</span></td>
                                            <td>Tgl. Kunjungan : <span
                                                    class="font-bold">{{ date('d-M-Y', strtotime($result->TGLREG)) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. Billing : </td>
                                        </tr>
                                        <tr>
                                            <td>Unit : <span class="font-bold">
                                                    @if ($result->bagian)
                                                        {{ $result->bagian->unit->NAMABAGIAN }}
                                                    @endif
                                                </span></td>
                                            <td>Dokter : <span class="font-bold">
                                                    @if ($result->bagian)
                                                        {{ $result->bagian->dokter->NAMADOKTER }}
                                                    @endif
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td>Cara Berkunjung : <span class="font-bold">
                                                    @if ($result->anamnesarajal)
                                                        {{ $result->anamnesarajal->CRKUNJUNG }}
                                                    @endif
                                                </span></td>
                                            <td>Tindak Lanjut : <span class="font-bold">
                                                    @if ($result->anamnesarajal)
                                                        {{ $result->anamnesarajal->TINDAKAN }}
                                                    @endif
                                                </span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- riwayat modal --}}
    @foreach ($pasien->registrasi as $result)
        <div class="modal fade" id="#" tabindex="-1" aria-labelledby="riwayatModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="riwayatModalLabel">Riwayat Medis Pasien
                            {{ substr($result->pasien->NOPASIEN, 2) }}
                            - {{ $result->pasien->NAMAPASIEN }} -
                            {{ $result->pasien->JNSKELAMIN == 'L' ? 'Laki-laki' : 'Perempuan' }} -
                            {{ 'Umur : ' . $result->UMURTH . ' Thn, ' . $result->UMURBL . ' Bln, ' . $result->UMUHR . ' Hr' }}
                        </h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">No. Registrasi : {{ $result->NOREG }}</div>
                            <div class="col-md-4">Tgl. Kunjungan : {{ date('d-M-Y', strtotime($result->TGLREG)) }}</div>
                            <div class="col-md-4">No. Billing : </div>

                            <div class="col-md-6">Unit : @if ($result->bagian)
                                    {{ $result->bagian->unit->NAMABAGIAN }}
                                @endif
                            </div>
                            <div class="col-md-6">Dokter : @if ($result->bagian)
                                    {{ $result->bagian->dokter->NAMADOKTER }}
                                @endif
                            </div>
                            <div class="col-md-6">Cara Kunjungan :
                                @if ($result->anamnesarajal)
                                    {{ $result->anamnesarajal->CRKUNJUNG }}
                                @endif
                            </div>
                            <div class="col-md-6">Tindak Lanjut :
                                @if ($result->anamnesarajal)
                                    {{ $result->anamnesarajal->TINDAKAN }}
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Anamnesa / Keluhan :</label>
                                <textarea type="text" readonly class="form-control" rows="3">
                                    @if ($result->anamnesarajal)
{{ strip_tags($result->anamnesarajal->ANAMNESA) }}
@endif
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Pemeriksaan Fisik :</label>
                                <textarea type="text" readonly class="form-control" rows="3">
                                    @if ($result->anamnesarajal)
{{ $result->anamnesarajal->TERAPI }}
@endif
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Diagnosa :</label>
                                <textarea type="text" readonly class="form-control"></textarea>
                            </div>
                        </div>
                        {{-- hasil laboratorium --}}
                        @if ($result->hasillab)
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Hasil Laboratorium</h5>
                                </div>

                                @foreach ($hasillab as $item)
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header bg-secondary" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#flush-collapse-{{ $item->NOLAB }}"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapse-{{ $item->NOLAB }}">
                                                    <div class="row w-100">
                                                        <div class="col-md-3">
                                                            No. Lab :
                                                            {{ $item->NOLAB }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            Tgl. Periksa :
                                                            @if ($item->TGLPMR)
                                                                {{ date('d-M-Y', strtotime($item->TGLPMR)) }}
                                                            @endif
                                                        </div>
                                                        <div class="col-md-3">
                                                            Dokter : {{ $item->dokter }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            Asal Pasien : {{ $item->unit }}
                                                        </div>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="flush-collapse-{{ $item->NOLAB }}"
                                                class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                                data-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="table-responsive table-responsive-sm">
                                                        <table
                                                            class="table table-sm table-striped table-hover table-bordered"
                                                            id="hasillab">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Pemeriksaan</th>
                                                                    <th>Hasil</th>
                                                                    <th>Satuan</th>
                                                                    <th>Normal</th>
                                                                    <th>Keterangan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($item->child as $result)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $result->NAMAHASIL }}</td>
                                                                        <td>{{ $result->KETHASIL }}</td>
                                                                        <td>{{ $result->KETSATUAN }}</td>
                                                                        <td>{{ $result->KETNORMAL }}</td>
                                                                        <td>{{ $result->CATATAN }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- obat farmasi --}}
                        @if ($result->resep)
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Obat Farmasi</h5>
                                </div>
                                @foreach ($resep as $item)
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header bg-secondary" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#flush-collapse-{{ $item->NORESEP }}"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapse-{{ $item->NORESEP }}">
                                                    <div class="row w-100">
                                                        <div class="col-md-4">
                                                            No. Resep :
                                                            {{ $item->NORESEP }}
                                                        </div>
                                                        <div class="col-md-4">Tanggal :
                                                            {{ date('d-M-Y', strtotime($item->TGLRESEP)) }}
                                                        </div>
                                                        <div class="col-md-4">Dokter :
                                                            {{ $item->dokter->NAMADOKTER }}
                                                        </div>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="flush-collapse-{{ $item->NORESEP }}"
                                                class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                                data-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="table-responsive table-responsive-sm">
                                                        <table
                                                            class="table table-sm table-striped table-hover table-bordered"
                                                            id="dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th width="5%">No</th>
                                                                    <th>Nama Obat</th>
                                                                    <th width="10%">Jumlah</th>
                                                                    <th width="10%">Satuan</th>
                                                                    <th width="25%">Aturan Pakai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($item->detailresep as $item)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $item->barang->NAMABARANG }}</td>
                                                                        <td>{{ $item->QTYBAR }}</td>
                                                                        <td>
                                                                            @if ($item->SATRSP)
                                                                                {{ $item->satuan->NAMASM }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($item->aturanpakai)
                                                                                {{ $item->aturanpakai->KET }}
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="5" class="text-center">Tidak ada
                                                                            obat </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Download ke PDF</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('style')
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush
@push('script')
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
@endpush
