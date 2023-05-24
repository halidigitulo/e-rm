@extends('template.home')
@section('judul', 'Edit Data Triage & Pengkajian IGD')
@section('content')
    @include('flash-message')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="text-gray-800">Edit Data Triage & Pengkajian IGD </h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f2/triageigd') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('triageigd.update', $triage->noreg) }}" method="post">
                    @csrf
                    @method('patch')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="identitas-tab" data-toggle="tab"
                                data-target="#identitas-tab-pane" type="button" role="tab"
                                aria-controls="identitas-tab-pane" aria-selected="true"><i class="fas fa-book"></i>
                                Identitas
                                Pasien</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kedatangan-tab" data-toggle="tab"
                                data-target="#kedatangan-tab-pane" type="button" role="tab"
                                aria-controls="kedatangan-tab-pane" aria-selected="false"><i class="fas fa-wheelchair"></i>
                                Kedatangan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="triage-tab" data-toggle="tab" data-target="#triage-tab-pane"
                                type="button" role="tab" aria-controls="triage-tab-pane" aria-selected="false"><i
                                    class="fas fa-user-injured"></i> Triage</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="derajat-tab" data-toggle="tab" data-target="#derajat-tab-pane"
                                type="button" role="tab" aria-controls="derajat-tab-pane" aria-selected="false"><i
                                    class="fas fa-heartbeat"></i> Derajat Nyeri</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="anamnesa-tab" data-toggle="tab" data-target="#anamnesa-tab-pane"
                                type="button" role="tab" aria-controls="anamnesa-tab-pane" aria-selected="false"><i
                                    class="fas fa-notes-medical"></i> Anamnesa</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="periksa-tab" data-toggle="tab" data-target="#periksa-tab-pane"
                                type="button" role="tab" aria-controls="periksa-tab-pane" aria-selected="false"><i
                                    class="fas fa-user-check"></i> Pemeriksaan Fisik</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="penunjang-tab" data-toggle="tab" data-target="#penunjang-tab-pane"
                                type="button" role="tab" aria-controls="penunjang-tab-pane" aria-selected="false"><i
                                    class="fas fa-microscope"></i>
                                Pemeriksaan Penunjang</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="terapi-tab" data-toggle="tab" data-target="#terapi-tab-pane"
                                type="button" role="tab" aria-controls="terapi-tab-pane" aria-selected="false"><i
                                    class="fas fa-running"></i> Terapi / Tindakan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="observasi-tab" data-toggle="tab"
                                data-target="#observasi-tab-pane" type="button" role="tab"
                                aria-controls="observasi-tab-pane" aria-selected="false"><i
                                    class="fas fa-chart-line"></i>
                                Observasi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nutrisi-tab" data-toggle="tab" data-target="#nutrisi-tab-pane"
                                type="button" role="tab" aria-controls="nutrisi-tab-pane" aria-selected="false">
                                <i class="fas fa-diagnoses"></i> Risiko Nutrisi </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pulang-tab" data-toggle="tab" data-target="#pulang-tab-pane"
                                type="button" role="tab" aria-controls="pulang-tab-pane" aria-selected="false">
                                <i class="fas fa-undo"></i> Pasien Pulang </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kie-tab" data-toggle="tab" data-target="#kie-tab-pane"
                                type="button" role="tab" aria-controls="kie-tab-pane" aria-selected="false">
                                <i class="fas fa-chalkboard"></i> KIE </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="asuhan-tab" data-toggle="tab" data-target="#asuhan-tab-pane"
                                type="button" role="tab" aria-controls="asuhan-tab-pane" aria-selected="false">
                                <i class="fas fa-user-nurse"></i> Asuhan Keperawatan </button>
                        </li>
                    </ul>
                    <div class="tab-content border" id="myTabContent">
                        <div class="tab-pane fade show active px-3" id="identitas-tab-pane" role="tabpanel"
                            tabindex="0">
                            <div class="row mt-3">
                                <div class="col-sm-6 mb-3">
                                    <label for="">Noreg</label>
                                    <div class="input-group">
                                        <input type="text" name="noreg"
                                            class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                            value="{{ $triage->noreg }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama"
                                        class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien"
                                        value="{{ $triage->registrasi->pasien->NAMAPASIEN }}" readonly>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="">No. RM</label>
                                    <input type="text" name="norm"
                                        class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm"
                                        value="{{ substr($triage->registrasi->pasien->NOPASIEN, 2) }}" readonly>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="">Tempat / Tgl. Lahir</label>
                                    <div class="input-group">
                                        <input type="text" name="tempat"
                                            class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} tempatlahir"
                                            value="{{ $triage->registrasi->pasien->TMPLAHIR }}" readonly>
                                        <input type="text" name="tanggal"
                                            class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }} tanggallahir"
                                            value="{{ date('d M Y', strtotime($triage->registrasi->pasien->TGLLAHIR)) }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat"
                                        class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }} alamat"
                                        value="{{ $triage->registrasi->pasien->ALM1PASIEN }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Alergi</label>
                                    <input type="text" name="alergi" class="form-control"
                                        value="{{ $triage->alergi }}">
                                </div>
                            </div>
                            <p>Asesmen Sosial <span class="text-primary">(Terisi Oleh Petugas Admission / Rekam
                                    Medis)</span>
                            </p>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="">Pendidikan</label>
                                    <input type="text" class="form-control pendidikan" readonly
                                        value="{{ $triage->registrasi->pasien->pendidikan->NAMADIDIK }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Dirawat yang ke</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Dirawat Terakhir Tgl</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">RS</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Status Perkawinan</label>
                                    <input type="text" class="form-control statuskawin" readonly
                                        value="
                                        @if ($triage->registrasi->pasien->STKAWIN == 'M') Menikah
                                        @elseif($triage->registrasi->pasien->STKAWIN == 'S')
                                        Sendiri
                                        @elseif ($triage->registrasi->pasien->STKAWIN == 'J')
                                        Janda
                                        @elseif($triage->registrasi->pasien->STKAWIN == 'D')
                                        Duda @endif
                                       ">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Pasien Tinggal Bersama</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Pekerjaan</label>
                                    <input type="text" class="form-control pekerjaan" readonly
                                        value="{{ $triage->registrasi->pasien->PEKERJAAN }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Suku Bangsa</label>
                                    <input type="text" class="form-control suku" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Agama</label>
                                    <input type="text" class="form-control agama" readonly
                                        value="{{ $triage->registrasi->pasien->agama->NAMAAGAMA }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Status Pembayaran</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Status Psikologi</label>
                                    <select name="status_psikologi" id=""
                                        class="form-control {{ $errors->has('status_psikologi') ? 'is-invalid' : '' }} select2">
                                        <option value="" holder>-- Status Psikologi --</option>
                                        <option value="1">Marah</option>
                                        <option value="2">Takut</option>
                                        <option value="3">Cemas</option>
                                        <option value="4">Depresi</option>
                                        <option value="5">Gelisah</option>
                                        <option value="6">Tertekan</option>
                                        <option value="7">Kecendrungan Bunuh Diri</option>
                                        <option value="8">Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="kedatangan-tab-pane" role="tabpanel" tabindex="1">
                            <h6 class="fw-bold mt-3">Kedatangan</h6>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio-kedatangan"
                                            id="sendiri" checked>
                                        <label class="form-check-label" for="sendiri">
                                            Sendiri
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio-kedatangan"
                                            id="rujukan">
                                        <label class="form-check-label" for="rujukan">
                                            Rujukan, Asal :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="text" class="form-control" id="textrujukan" name="asal_rujukan"
                                        disabled="disabled">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Surat Pengantar</label>
                                    <input type="text" class="form-control" name="surat_pengantar">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Diagnosa</label>
                                    <input type="text" class="form-control" name="diagnosa">
                                </div>
                            </div>
                            <h6 class="text-muted">[ Pengantar ]</h6>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="pengantar_ambulans"
                                            id="pengantar_ambulans">
                                        <label class="form-check-label" for="pengantar_ambulans">Ambulans</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="pengantar_paramedis"
                                            id="pengantar_paramedis">
                                        <label class="form-check-label" for="pengantar_paramedis">Paramedis</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="triage-tab-pane" role="tabpanel" tabindex="2">
                            <div class="mt-3">
                                <p class="text-muted">[ Triage ]</p>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="">Oleh</label>
                                        <input type="text" class="form-control" name="triage_oleh">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Pukul</label>
                                        <input type="time" class="form-control" name="triage_pukul">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio-triage"
                                                id="trauma" checked>
                                            <label class="form-check-label" for="trauma">
                                                Trauma
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio-triage"
                                                id="non-trauma">
                                            <label class="form-check-label" for="non-trauma">
                                                Non-Trauma
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio-triage"
                                                id="obgyn">
                                            <label class="form-check-label" for="obgyn">
                                                Obgyn
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted">[ Pemeriksaan Umum ]</p>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">A. Jalan Nafas</label>
                                        <select name="jalan_nafas" id="" class="form-control">
                                            <option value="1">Paten</option>
                                            <option value="2">Sumbatan Parsial</option>
                                            <option value="3">Sumbatan Total</option>
                                            <option value="4">Suara Nafas Tambahan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">B. Pernafasan</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Gerakan Dada</label>
                                                <select name="gerakan_dada" id="" class="form-control">
                                                    <option value="1">Simetris</option>
                                                    <option value="2">Asimetris</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Tipe Pernafasan</label>
                                                <select name="tipe_pernafasan" id="" class="form-control">
                                                    <option value="1">Normal</option>
                                                    <option value="2">Abnormal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6>C. Sirkulasi</h6>
                                    <div class="col-md-6">
                                        <label for="">Denyut Nadi</label>
                                        <select name="denyut_nadi" id="" class="form-control">
                                            <option value="1">Ada</option>
                                            <option value="2">Tidak Ada</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Kulit / Mukosa</label>
                                        <select name="kulit" id="" class="form-control">
                                            <option value="1">Normal</option>
                                            <option value="2">Pucat</option>
                                            <option value="3">Ikterik</option>
                                            <option value="4">Sianosis</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Akral</label>
                                        <select name="akral" id="" class="form-control">
                                            <option value="1">Hangat</option>
                                            <option value="2">Dingin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">CRT</label>
                                        <select name="crt" id="" class="form-control">
                                            <option value="1">
                                                < 2 Detik</option>
                                            <option value="2"> > 2 Detik</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12 mb-3">
                                        <label for="">D. Kesadaran</label>
                                        <select name="kesadaran" id="" class="form-control">
                                            <option value="1">Alert</option>
                                            <option value="2">Voice</option>
                                            <option value="3">Pain</option>
                                            <option value="4">Unresponsive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">BB (Kg)</label>
                                        <input type="text" class="form-control" name="bb">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">SpO2 (%)</label>
                                        <input type="text" class="form-control" name="spo2">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">GDS (mg/dl)</label>
                                        <input type="text" class="form-control" name="gds">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6 class="fw-bold">Tanda Vital</h6>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" placeholder="TD" name="td">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" placeholder="Nadi"
                                                name="nadi">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" placeholder="Nafas"
                                                name="nafas">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" placeholder="Suhu"
                                                name="suhu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="derajat-tab-pane" role="tabpanel" tabindex="3">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">Nyeri</label>
                                        <select name="nyeri" id="" class="form-control">
                                            <option value="1">Tidak</option>
                                            <option value="2">Ada</option>
                                            <option value="3">Akut</option>
                                            <option value="4">Kronis</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6 class="fw-bold">Skala Nyeri FLACC (Usia <6 Tahun)</h6>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" class="text-center text-middle-center">
                                                                Kategori
                                                            </th>
                                                            <th colspan="3" class="text-center">Skor</th>
                                                            <th rowspan="2">Nilai Skor</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">0</th>
                                                            <th class="text-center">1</th>
                                                            <th class="text-center">2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-bold">Face (Wajah)</td>
                                                            <td>
                                                                <input class="check-input radio-face" type="radio"
                                                                    name="radio-face" id="face-0" value=0>
                                                                <label class="form-check-label" for="face-0">
                                                                    Tidak ada ekspresi khusus, senyum
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-face" type="radio"
                                                                    name="radio-face" id="face-1" value=1>
                                                                <label class="form-check-label" for="face-1">
                                                                    Menyeringai, mengerutkan dahi, tampak tidak tertatirk
                                                                    (kadang-kadang)
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-face" type="radio"
                                                                    name="radio-face" id="face-2" value=2>
                                                                <label class="form-check-label" for="face-2">
                                                                    Dagu gemetar, gerutu, berulang (sering)
                                                                </label>
                                                            </td>
                                                            <td><input type="text" id="face"
                                                                    class="form-control text-center" placeholder="Face"
                                                                    readonly=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bold">Leg (Kaki)</td>
                                                            <td>
                                                                <input class="check-input radio-leg" type="radio"
                                                                    name="radio-leg" id="leg-0" value="0">
                                                                <label class="form-check-label" for="leg-0">
                                                                    Posisi normal atau santai
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-leg" type="radio"
                                                                    name="radio-leg" id="leg-1" value="1">
                                                                <label class="form-check-label" for="leg-1">
                                                                    Gelisah, tegang
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-leg" type="radio"
                                                                    name="radio-leg" id="leg-2" value="2">
                                                                <label class="form-check-label" for="leg-2">
                                                                    Menendang, kaki tertekuk
                                                                </label>
                                                            </td>
                                                            <td><input type="text" id="leg"
                                                                    class="form-control text-center" placeholder="Leg"
                                                                    readonly=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bold">Activity (Aktifitas)</td>
                                                            <td>
                                                                <input class="check-input radio-activity" type="radio"
                                                                    name="radio-activity" id="activity-0" value="0">
                                                                <label class="form-check-label" for="activity-0">
                                                                    Berbaring tenang, posisi normal, gerakan mudah
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-activity" type="radio"
                                                                    name="radio-activity" id="activity-1" value="1">
                                                                <label class="form-check-label" for="activity-1">
                                                                    Menggeliat, tidak bisa diam, tegang
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-activity" type="radio"
                                                                    name="radio-activity" id="activity-2" value="2">
                                                                <label class="form-check-label" for="activity-2">
                                                                    Menggeliat, tidak bisa diam, tegang
                                                                </label>
                                                            </td>
                                                            <td><input type="text" id="activity"
                                                                    class="form-control text-center"
                                                                    placeholder="Activity" readonly=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bold">Cry (Menangis)</td>
                                                            <td>
                                                                <input class="check-input radio-cry" type="radio"
                                                                    name="radio-cry" id="cry-0" value="0">
                                                                <label class="form-check-label" for="cry-0">
                                                                    Tidak menangis
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-cry" type="radio"
                                                                    name="radio-cry" id="cry-1" value="1">
                                                                <label class="form-check-label" for="cry-1">
                                                                    Merintih, merengek, kadang-kadang mengeluh
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-cry" type="radio"
                                                                    name="radio-cry" id="cry-2" value="2">
                                                                <label class="form-check-label" for="cry-2">
                                                                    Terus menangis, berteriak
                                                                </label>
                                                            </td>
                                                            <td><input type="text" id="cry"
                                                                    class="form-control text-center" placeholder="Cry"
                                                                    readonly=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bold">Consolability (Kemampuan Konsol)</td>
                                                            <td>
                                                                <input class="check-input radio-consolability"
                                                                    type="radio" name="radio-consolability"
                                                                    id="consolability-0" value="0">
                                                                <label class="form-check-label" for="consolability-0">
                                                                    Rileks
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-consolability"
                                                                    type="radio" name="radio-consolability"
                                                                    id="consolability-1" value="1">
                                                                <label class="form-check-label" for="consolability-1">
                                                                    Dapat ditenangkan dengan sentuhan, pelukan, bujukan,
                                                                    dapat
                                                                    dialihkan
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="check-input radio-consolability"
                                                                    type="radio" name="radio-consolability"
                                                                    id="cconsolability-2" value="2">
                                                                <label class="form-check-label" for="cconsolability-2">
                                                                    Sering mengeluh, sulit dibujuk
                                                                </label>
                                                            </td>
                                                            <td><input type="text" id="consolability"
                                                                    class="form-control text-center"
                                                                    placeholder="Consolability" readonly=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="fw-bold">
                                                                1-3: Nyeri Ringan, 4-7: Nyeri Sedang, 8-10: Nyeri Berat
                                                            </td>
                                                            <td class="fw-bold">Total Skor</td>
                                                            <td><input type="text" id="total"
                                                                    class="form-control text-center fw-bold"
                                                                    placeholder="Total" readonly=""
                                                                    name="flacc_total_skor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                                <div class="row mb-3">
                                    <h6 class="fw-bold">Klasifikasi Triage</h6>
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="klasifikasi-triage"
                                                id="1" checked>
                                            <label for="1" class="bg-danger p-2 text-white rounded">Merah</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="klasifikasi-triage"
                                                id="2">
                                            <label for="2" class="bg-warning p-2 text-white rounded">Kuning</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="klasifikasi-triage"
                                                id="3">
                                            <label for="3" class="bg-success p-2 text-white rounded">Hijau</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="klasifikasi-triage"
                                                id="4">
                                            <label for="4" class="bg-dark p-2 text-white rounded">Hitam</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6 class="fw-bold">Skala Nyeri Wong Baker & Numeric Pain Scale (Usia >= 6Tahun)</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td class="text-center">
                                                    <label for="0-wbs">
                                                        <input class="check-input wbs" type="radio" name="radio-wbs"
                                                            id="0-wbs" value="0">
                                                        <img src="{{ asset('img/wbs-0.jpg') }}" style="height: 100px">
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <label for="2-wbs">
                                                        <input class="check-input wbs" type="radio" name="radio-wbs"
                                                            id="2-wbs" value="2">
                                                        <img src="{{ asset('img/wbs-2.jpg') }}" style="height: 100px">
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <label for="4-wbs">
                                                        <input class="check-input wbs" type="radio" name="radio-wbs"
                                                            id="4-wbs" value="4">
                                                        <img src="{{ asset('img/wbs-4.jpg') }}" style="height: 100px">
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <label for="6-wbs">
                                                        <input class="check-input wbs" type="radio" name="radio-wbs"
                                                            id="6-wbs" value="6">
                                                        <img src="{{ asset('img/wbs-6.jpg') }}" style="height: 100px">
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <label for="8-wbs">
                                                        <input class="check-input wbs" type="radio" name="radio-wbs"
                                                            id="8-wbs" value="8">
                                                        <img src="{{ asset('img/wbs-8.jpg') }}" style="height: 100px">
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <label for="10-wbs">
                                                        <input class="check-input wbs" type="radio" name="radio-wbs"
                                                            id="10-wbs" value="10">
                                                        <img src="{{ asset('img/wbs-10.jpg') }}" style="height: 100px">
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"><input type="text"
                                                        class="text-center form-control fw-bold" id="wbs"
                                                        name="nyeri_wong_baker" readonly></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-center">0 = Tidak ada nyeri, 1-3 = Nyeri
                                                    ringan, 4-6 = Nyeri sedang, 7-10 = Nyeri mengganggu</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6 class="fw-bold">Pengkajian Risiko Pasien Jatuh (Get Up & Go)</h6>
                                    <p>Perhatikan cara berjalan</p>
                                    <div class="col-md-6">
                                        <label>A. Apakah tampak tidak seimbang/sempoyongan saat duduk di
                                            kursi?</label>
                                        <div class="d-flex align-item-center">
                                            <input type="checkbox" name="pasien_jatuh_1" id="pasien_jatuh_1"
                                                class="me-2" style="width: 25px; height:25px;"><label
                                                for="pasien_jatuh_1" class="text-default"> (Checked :
                                                Ya, Un-checked : Tidak)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>B. Memegang pinggiran kursi/meja/benda lain sebagai penopang saat
                                            akan duduk?</label>
                                        <div class="d-flex align-item-center">
                                            <input type="checkbox" name="pasien_jatuh_2" id="pasien_jatuh_2"
                                                class="me-2" style="width: 25px; height:25px;"><label
                                                for="pasien_jatuh_2" class="text-default"> (Checked :
                                                Ya, Un-checked : Tidak)</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="tex-muted">Keterangan: Apabila jawaban A atau B adalah "Ya" berarti
                                            Pasien
                                            Risiko Jatuh. Lakukan intervensi: Edukasi pencegahan pasien jatuh dan pasang
                                            gelang
                                            warna kuning.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6 class="fw-bold">Kriteria Discharge Planning</h6>
                                    <div class="col-md-6">
                                        <label for="">1. Umur > 65 Tahun</label>
                                        <div class="d-flex align-item-center">
                                            <input type="checkbox" name="dp_1" id="dp_1" class="me-2"
                                                style="width: 25px; height:25px;"><label for="dp_1"
                                                class="text-default">
                                                (Checked :
                                                Ya, Un-checked : Tidak)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">2. Keterbatasan mobilitas</label>
                                        <div class="d-flex align-item-center">
                                            <input type="checkbox" name="dp_2" id="dp_2" class="me-2"
                                                style="width: 25px; height:25px;"><label for="dp_2"
                                                class="text-default">
                                                (Checked :
                                                Ya, Un-checked : Tidak)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">3. Perawatan atau pengobatan lanjutan</label>
                                        <div class="d-flex align-item-center">
                                            <input type="checkbox" name="dp_3" id="dp_3" class="me-2"
                                                style="width: 25px; height:25px;"><label for="dp_3"
                                                class="text-default">
                                                (Checked :
                                                Ya, Un-checked : Tidak)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">4. Bantuan untuk melakukan aktifitas sehari-hari</label>
                                        <div class="d-flex align-item-center">
                                            <input type="checkbox" name="dp_4" id="dp_4"
                                                style="width: 25px; height:25px;" class="me-2"><label for="dp_4"
                                                class="text-default"> (Checked :
                                                Ya, Un-checked : Tidak)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="anamnesa-tab-pane" role="tabpanel" tabindex="4">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <h6 class="fw-bold">Anamnesa</h5>
                                        <div class="col-md-12">
                                            <textarea name="anamnesa" id="anamnesa" class="form-control" rows="10">
                                        </textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Riawayat Penyakit Terdahulu</label>
                                            <input type="text" class="form-control" name="penyakit_terdahulu">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Riwayat Penyakit Keluarga</label>
                                            <input type="text" class="form-control" name="penyakit_keluarga">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Riwayat Pengobatan</label>
                                            <input type="text" class="form-control" name="pengobatan">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Riwayat Kandungan & Kebidanan</label>
                                            <input type="text" class="form-control" name="kebidanan_kandungan">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="periksa-tab-pane" role="tabpanel" tabindex="5">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <h6>Kesadaran - Glascow Coma Scale (GCS)</h6>
                                    <div class="col-md-3 mb-2">
                                        <input type="number" class="form-control" placeholder="Eye" name="gcs_e">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <input type="number" class="form-control" placeholder="Verbal" name="gcs_v">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <input type="number" class="form-control" placeholder="Motorik" name="gcs_m">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <input type="text" class="form-control" readonly placeholder="Total"
                                            name="gcs_total">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12 mb-2">
                                        <label for="">1. Kepala & Wajah</label>
                                        <input type="text" class="form-control" name="kepala_wajah">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="">2. Leher</label>
                                        <input type="text" class="form-control" name="leher">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="">3. Thorax</label>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Inspeksi"
                                                    name="thorax_inspeksi">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Palpasi"
                                                    name="thorax_palpasi">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Perkusi"
                                                    name="thorax_perkusi">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Auskultasi"
                                                    name="thorax_auskultasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="">4. Abdomen</label>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Inspeksi"
                                                    name="abdomen_inspeksi">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Palpasi"
                                                    name="abdomen_palpasi">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Perkusi"
                                                    name="abdomen_perkusi">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Auskultasi"
                                                    name="abdomen_auskultasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="">5. Anogenital</label>
                                        <input type="text" class="form-control" name="anogenital">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="">6. Ekstremitas</label>
                                        <input type="text" class="form-control" name="ekstremitas">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="">7. Neurologis</label>
                                        <input type="text" class="form-control" name="neurologis">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="penunjang-tab-pane" role="tabpanel" tabindex="6">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control" placeholder="EKG"
                                            name="penunjang_ekg">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control" placeholder="Laboratorium"
                                            name="penunjang_laboratorium">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control" placeholder="Radiologi"
                                            name="penunjang_radiologi">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control" placeholder="Lainnya"
                                            name="penunjang_lainnya">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">Diagnosa Kerja</label>
                                        <input type="text" class="form-control" name="diagnosa_kerja">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Diagnosa Banding</label>
                                        <input type="text" class="form-control" name="diagnosa_banding">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="terapi-tab-pane" role="tabpanel" tabindex="7">
                            <div class="mt-3">
                                @livewire('terapi')
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="observasi-tab-pane" role="tabpanel" tabindex="8">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Observasi Pasien Instalasi Gawat Darurat</h5>
                                        <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                            data-target="#modalObservasi">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </button>
                                        <div class="modal fade" id="modalObservasi" data-backdrop="static"
                                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah
                                                            Data
                                                            Observasi</h1>
                                                        <button type="button" class="btn-close" data-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" id="form-observasi">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="">Tgl / Jam</label>
                                                                    <input type="datetime-local" class="form-control"
                                                                        name="tgl_terapi" id="tgl_terapi">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="">TD</label>
                                                                    <input type="text" class="form-control"
                                                                        name="obs_td">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="">HR</label>
                                                                    <input type="text" class="form-control"
                                                                        name="obs_hr">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="">RR</label>
                                                                    <input type="text" class="form-control"
                                                                        name="obs_rr">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="">Suhu</label>
                                                                    <input type="text" class="form-control"
                                                                        name="obs_suhu">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">SpO2</label>
                                                                    <input type="text" class="form-control"
                                                                        name="obs_spo2">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">GCS</label>
                                                                    <input type="text" class="form-control"
                                                                        name="obs_gds">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">GCS</label>
                                                                    <input type="text" class="form-control"
                                                                        name="obs_gcs">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Output Urine</label>
                                                                    <input type="text" class="form-control"
                                                                        name="obs_urine">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Nama Obat & Cairan</label>
                                                                    <textarea name="obs_obat" id="" cols="30" rows="5" class="form-control"></textarea>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Keterangan</label>
                                                                    <textarea name="obs_keterangan" id="" cols="30" rows="3" class="form-control"></textarea>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="">Tanda Tangan</label><br>
                                                                    <div id="sig-observasi" class="form-control mb-3"
                                                                        style="overflow: hidden"></div>
                                                                    <textarea name="sign_observasi" id="sign-observasi" style="display: none"></textarea><br>
                                                                    <button id="clear-observasi"
                                                                        class="btn btn-sm btn-danger mb-3"><i
                                                                            class="fas fa-eraser"></i> Bersihkan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Tgl/Jam</th>
                                                        <th>TD</th>
                                                        <th>HR</th>
                                                        <th>RR</th>
                                                        <th>Suhu</th>
                                                        <th>SpO2</th>
                                                        <th>GDS</th>
                                                        <th>GCS</th>
                                                        <th>Urine Output</th>
                                                        <th>Nama Obat dan Cairan</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyObservasi">
                                                    <tr>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="nutrisi-tab-pane" role="tabpanel" tabindex="9">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <h6>Risiko Nutrisi (Diisi oleh Dietisen Gizi / Perawat)</h6>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" placeholder="Berat Badan"
                                            name="nutrisi_bb">Kg
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" placeholder="Tinggi Badan"
                                            name="nutrisi_tb">Cm
                                    </div>
                                    <h6>1. Pengukuran Metode MST (Malnutrition Screening Tool), apabila pasien mengalami
                                        penurunan BB yang tidak direncanakan (6 bulan terakhir)</h6>
                                    <div class="row">
                                        <div class="col-md-2 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radio-mst"
                                                    id="tidak" checked>
                                                <label class="form-check-label" for="tidak">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radio-mst"
                                                    id="tidak-yakin">
                                                <label class="form-check-label" for="tidak-yakin">
                                                    Tidak Yakin
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radio-mst"
                                                    id="ya">
                                                <label class="form-check-label" for="ya">
                                                    Ya. Jika <span class="fw-bold">Ya</span>, ada tanda penurunan BB
                                                    sebanyak
                                                    :
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="" id="select-mst" class="form-control" disabled>
                                                <option value="">1-5 Kg (1)</option>
                                                <option value="">6-10 Kg (2)</option>
                                                <option value="">11-15 Kg (3)</option>
                                                <option value="">>15 Kg (4)</option>
                                                <option value="">Tidak tahu berapa pengukurannya (2)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h6>2. Asupan makan pasien berkurang karena penuruanan nafsu makan / kesulitan menerima
                                        makan?</h6>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <select name="asupan_makan" id="" class="form-control">
                                                <option value="0">Ya (0)</option>
                                                <option value="1">Tidak (1)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h6>3. Pasien dengan diagnosa khusus</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-2 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="radio-diagnosa-khusus" id="tidak-3">
                                                <label class="form-check-label" for="tidak-3">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="radio-diagnosa-khusus" id="ya-3">
                                                <label class="form-check-label" for="ya-3">
                                                    Ya. Diagnosa-khusus:
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            {{-- <input type="text" class="form-control" placeholder="Disini terapkan Select2"> --}}
                                            <select class="select2" name="diagnosa[]" multiple="multiple"
                                                style="width: 250px" disabled id="select-khusus">
                                                <option value="1">Diabetes Melitus</option>
                                                <option value="2">Ginjal</option>
                                                <option value="3">Hati</option>
                                                <option value="4">Jantung</option>
                                                <option value="5">Paru</option>
                                                <option value="6">Stroke</option>
                                                <option value="7">Kanker</option>
                                                <option value="8">Penurunan Imunitas</option>
                                                <option value="9">Geriatri</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h6><span class="fw-bold">Apabila skor >=2, pasien berisiko malnutrisi, Ahli gizi
                                            melakukan
                                            anamnes lanjutan.</span></h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Tanda Tangan Perawat</label>
                                            <div id="sig-nutrisi" class="form-control mb-3" style="overflow: hidden">
                                            </div>
                                            <textarea name="sign_nutrisi" id="sign-nutrisi" style="display: none"></textarea><br>
                                            <button id="clear-nutrisi" class="btn btn-sm btn-danger mb-3"><i
                                                    class="fas fa-eraser"></i> Bersihkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="pulang-tab-pane" role="tabpanel" tabindex="10">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <h6>Informasi Pemindahan Ruangan / Pemulangan Pasien</h6>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Waktu</label>
                                        <input type="time" class="form-control" name="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" placeholder="Diagnosa">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" placeholder="ICD">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6>Kondisi Terakhir</h6>
                                    <div class="col-md-2 mb-2">
                                        <input type="text" class="form-control" placeholder="TD">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <input type="text" class="form-control" placeholder="Eye (E)">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <input type="text" class="form-control" placeholder="Verbal (V)">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <input type="text" class="form-control" placeholder="Motoric (M)">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <input type="text" class="form-control" placeholder="Heart Rate (HR)">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <input type="text" class="form-control"
                                            placeholder="Respiratory Rate (RR)">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <input type="text" class="form-control" placeholder="Suhu">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <input type="text" class="form-control" placeholder="GCS">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6>Status Keluar</h6>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio-keluar"
                                                id="mrs">
                                            <label class="form-check-label" for="mrs">
                                                MRS
                                            </label>
                                            <input type="text" class="form-control" placeholder="Ruangan..."
                                                disabled id="text-mrs">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio-keluar"
                                                id="pulang">
                                            <label class="form-check-label" for="pulang">
                                                Pulang
                                            </label>
                                            <input type="text" class="form-control" placeholder="Kontrol..."
                                                disabled id="text-pulang">
                                            <div class="row my-3">
                                                <select class="select2" name="pulang[]" multiple="multiple"
                                                    style="width: 250px" disabled id="select-pulang">
                                                    <option value="1">Obat Pulang</option>
                                                    <option value="2">Laboratorium</option>
                                                    <option value="3">Radiologi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio-keluar"
                                                id="pindah-rs">
                                            <label class="form-check-label" for="pindah-rs">
                                                Pindah Rumah Sakit
                                            </label>
                                            <input type="text" class="form-control"
                                                placeholder="RS tujuan / Alasan" id="text-pindah" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio-keluar"
                                                id="pulang-paksa">
                                            <label class="form-check-label" for="pulang-paksa">
                                                Pulang Paksa
                                            </label>
                                            <input type="text" class="form-control" placeholder="Alasan..."
                                                disabled id="text-paksa">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio-keluar"
                                                id="meninggal">
                                            <label class="form-check-label" for="meninggal">
                                                Meninggal Dunia
                                            </label>
                                            <input type="time" class="form-control" disabled id="text-meninggal">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="">Tanda Tangan Dokter</label>
                                        <div id="sig-pulang" class="form-control mb-3" style="overflow: hidden"></div>
                                        <textarea name="sign_pulang" id="sign-pulang" style="display: none"></textarea><br>
                                        <button id="clear-pulang" class="btn btn-sm btn-danger mb-3"><i
                                                class="fas fa-eraser"></i> Bersihkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="kie-tab-pane" role="tabpanel" tabindex="11">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <h6 class="mb-3">Pemberian Komunikasi, Informasi dan Edukasi (KIE)</h6>
                                    @foreach ($kie as $item)
                                        <div class="col-md-6">
                                            <div class="input-group mb-3 ms-3">
                                                <div>
                                                    <input class="form-check-input mt-0 me-3" type="checkbox"
                                                        value="{{ $item->id }}" name="kie[]"
                                                        id="kie[{{ $item->id }}]">
                                                </div>
                                                <label for="kie[{{ $item->id }}]">{{ $item->keterangan }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="KIE Lainnya..">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade px-3" id="asuhan-tab-pane" role="tabpanel" tabindex="12">
                            <div class="mt-3">
                                <div class="row mb-3">
                                    <h5 class="text-center">Asuhan Keperawatan Instalasi Gawat Darurat</h5>
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-toggle="collapse" data-target="#flush-collapseOne"
                                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Masalah Keperawatan
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingOne" data-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="1-1">
                                                                <label for="1-1">Ketidakefektifan bersihan jalan
                                                                    nafas</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="2-1">
                                                                <label for="2-1">Ketidakefektifan pola nafas</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="3-1">
                                                                <label for="3-1">Ketidakefektifan perfusi jaringan
                                                                    perifer</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="4-1">
                                                                <label for="4-1">Ketidakefektifan perfusi jaringan
                                                                    jantung</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="5-1">
                                                                <label for="5-1">Ketidakefektifan perfusi jaringan
                                                                    ginjal</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="6-1">
                                                                <label for="6-1">Ketidakefektifan perfusi jaringan
                                                                    otak</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="7-1">
                                                                <label for="7-1">Penurunan curah jantung</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="8-1">
                                                                <label for="8-1">Kekurangan volume cairan</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="9-1">
                                                                <label for="9-1">Kelebihan volume cairan</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="10-1">
                                                                <label for="10-1">Gangguan pengaturan suhu
                                                                    tubuh</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="11-1">
                                                                <label for="11-1">Gangguan rasa nyaman nyeri</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="12-1">
                                                                <label for="12-1">Gangguan pemenuhan nutrisi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="13-1">
                                                                <label for="13-1">Kerusakan integritas kulit</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="14-1">
                                                                <label for="14-1">Gangguan eliminasi urine</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="15-1">
                                                                <label for="15-1">Hambatan mobilitas fisik</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="16-1">
                                                                <label for="16-1">Gangguan kecemasan</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="17-1">
                                                                <label for="17-1">Risiko aspirasi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="18-1">
                                                                <label for="18-1">Risiko infeksi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="19-1">
                                                                <label for="19-1">Risiko dehidrasi</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-toggle="collapse" data-target="#flush-collapseTwo"
                                                    aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Rencana Keperawatan
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingTwo" data-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="1-2">
                                                                <label for="1-2">Buka jalan nafas, gunakan teknik
                                                                    head
                                                                    tilt chin lift atau jaw thrust bila perlu</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="2-2">
                                                                <label for="2-2">Posisikan pasien untuk memastikan
                                                                    ventilasi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="3-2">
                                                                <label for="3-2">Lakukan suction</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="4-2">
                                                                <label for="4-2">Berikan O2</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="5-2">
                                                                <label for="5-2">Pasang mayo</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="6-2">
                                                                <label for="6-2">Lakukan fisioterapi dada</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="7-2">
                                                                <label for="7-2">Berikan bronchodilator</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="8-2">
                                                                <label for="8-2">Auskultasi nafas</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="9-2">
                                                                <label for="9-2">Monitor respirasi dan O2</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="10-2">
                                                                <label for="10-2">Monitor TD, suhu, nadi dan
                                                                    RR</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="11-2">
                                                                <label for="11-2">Monitor suhu, warna dan kelembapan
                                                                    warna
                                                                    kulit</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="12-2">
                                                                <label for="12-2">Monitor status kardiovaskuler pasien
                                                                    (EKG)</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="13-2">
                                                                <label for="13-2">Monitor tingkat kesadaran
                                                                    pasien</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="14-2">
                                                                <label for="14-2">Monitor tanda-tanda infeksi</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="15-2">
                                                                <label for="15-2">Monitor kualitas dari nadi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="16-2">
                                                                <label for="16-2">Monitor sianosis perifer</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="17-2">
                                                                <label for="17-2">Monitor suhu minmal setiap 2
                                                                    jam</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="18-2">
                                                                <label for="18-2">Monitor lokasi, karakteristik,
                                                                    durasi,
                                                                    frekuensi, kualitas dan faktor presifitasi nyeri</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="19-2">
                                                                <label for="19-2">Kompres pasien pada lipatan paha dan
                                                                    axilia</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="20-2">
                                                                <label for="20-2">Selimuti pasien</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="21-2">
                                                                <label for="21-2">Ajarkan teknik distraksi dan
                                                                    relaksasi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="22-2">
                                                                <label for="22-2">Jelaskan semua prosedur</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="23-2">
                                                                <label for="23-2">Ciptakan hubungan saling
                                                                    percaya</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="24-2">
                                                                <label for="24-2">Pasang pengaman immobilisasi dengan
                                                                    spalk</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="25-2">
                                                                <label for="25-2">Kolaborasi dalam intubasi,
                                                                    ventilatorlabel>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="26-2">
                                                                <label for="26-2">Kolaborasi dalam pemasangan kateter,
                                                                    NGT, kumbah lambung</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="27-2">
                                                                <label for="27-2">Kolaborasi dalam pemberian
                                                                    antipiretik,
                                                                    analgetik, antimetetic, antibiotic</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="28-2">
                                                                <label for="28-2">Kolaborasi dalam pemberian cairan
                                                                    IV</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-toggle="collapse" data-target="#flush-collapseThree"
                                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Tindakan Keperawatan
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingThree"
                                                data-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="1-3">
                                                                <label for="1-3">Buka jalan nafas, gunakan teknik
                                                                    head
                                                                    tilt chin lift atau jaw thrust bila perlu</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="2-3">
                                                                <label for="2-3">Posisikan pasien untuk memastikan
                                                                    ventilasi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="3-3">
                                                                <label for="3-3">Lakukan suction</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="4-3">
                                                                <label for="4-3">Berikan O2</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="5-3">
                                                                <label for="5-3">Pasang mayo</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="6-3">
                                                                <label for="6-3">Lakukan fisioterapi dada</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="7-3">
                                                                <label for="7-3">Berikan bronchodilator</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="8-3">
                                                                <label for="8-3">Auskultasi nafas</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="9-3">
                                                                <label for="9-3">Monitor respirasi dan O2</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="10-3">
                                                                <label for="10-3">Monitor TD, suhu, nadi dan
                                                                    RR</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="11-3">
                                                                <label for="11-3">Monitor suhu, warna dan kelembapan
                                                                    warna
                                                                    kulit</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="12-3">
                                                                <label for="12-3">Monitor status kardiovaskuler pasien
                                                                    (EKG)</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="13-3">
                                                                <label for="13-3">Monitor tingkat kesadaran
                                                                    pasien</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="14-3">
                                                                <label for="14-3">Monitor tanda-tanda infeksi</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="15-3">
                                                                <label for="15-3">Monitor kualitas dari nadi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="16-3">
                                                                <label for="16-3">Monitor sianosis perifer</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="17-3">
                                                                <label for="17-3">Monitor suhu minmal setiap 2
                                                                    jam</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="18-3">
                                                                <label for="18-3">Monitor lokasi, karakteristik,
                                                                    durasi,
                                                                    frekuensi, kualitas dan faktor presifitasi nyeri</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="19-3">
                                                                <label for="19-3">Kompres pasien pada lipatan paha dan
                                                                    axilia</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="20-3">
                                                                <label for="20-3">Selimuti pasien</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="21-3">
                                                                <label for="21-3">Ajarkan teknik distraksi dan
                                                                    relaksasi</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="22-3">
                                                                <label for="22-3">Jelaskan semua prosedur</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="23-3">
                                                                <label for="23-3">Ciptakan hubungan saling
                                                                    percaya</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="24-3">
                                                                <label for="24-3">Pasang pengaman immobilisasi dengan
                                                                    spalk</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="25-3">
                                                                <label for="25-3">Kolaborasi dalam intubasi,
                                                                    ventilatorlabel>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="26-3">
                                                                <label for="26-3">Kolaborasi dalam pemasangan kateter,
                                                                    NGT, kumbah lambung</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="27-3">
                                                                <label for="27-3">Kolaborasi dalam pemberian
                                                                    antipiretik,
                                                                    analgetik, antimetetic, antibiotic</label>
                                                            </div>
                                                            <div class="input-group mb-3 ms-3">
                                                                <input class="form-check-input mt-0 me-3"
                                                                    type="checkbox" value="" id="28-3">
                                                                <label for="28-3">Kolaborasi dalam pemberian cairan
                                                                    IV</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-toggle="collapse" data-target="#flush-collapseFour"
                                                    aria-expanded="false" aria-controls="flush-collapseFour">
                                                    Evaluasi Keperawatan (SOAP)
                                                </button>
                                            </h2>
                                            <div id="flush-collapseFour" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingFour"
                                                data-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="col-md-12">
                                                        <textarea name="" id="evaluasi" class="form-control" rows="10">
                                                </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control mb-3" placeholder="Nama Perawat">
                                        <div id="sig-askep" class="form-control mb-3" style="overflow: hidden"></div>
                                        <textarea name="sign_askep" id="sign-askep" style="display: none"></textarea><br>
                                        <button id="clear-askep" class="btn btn-sm btn-danger mb-3"><i
                                                class="fas fa-eraser"></i> Bersihkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row my-2 mx-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm"><i
                                        class="fas fa-paper-plane"></i> Update
                                    Data</button>
                                <button type="reset" class="btn btn-warning btn-sm"><i
                                        class="fas fa-undo"></i>Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
