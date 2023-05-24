imgi
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- <title>Hasil Radiologi {{ $registrasi->pasien->NAMAPASIEN }}</title> --}}
    <title>Hasil Radiologi</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                Hasil Pemeriksaan Radiologi
                <a href="{{ url('f5/radiologi/' . $registrasi->radiologi->noreg) . '/pdf' }}"
                    class="btn btn-sm btn-primary float-end"><i class="fas fa-download"></i> Download PDF</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('logo.png') }}" alt="" style="max-height: 100px">
                    </div>
                    <div class="col-md-6">
                        <table class="table table-hover">
                            <tr>
                                <td>Nama Pasien</td>
                                <td>:</td>
                                <td>{{ $registrasi->pasien->NAMAPASIEN }} - {{ $registrasi->pasien->NOPASIEN }}</td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td>:</td>
                                <td>{{ $registrasi->UMURTH }} Tahun</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    @if ($registrasi->pasien->JNSKELAMIN)
                                        {{ $registrasi->pasien->JNSKELAMIN == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    @if ($registrasi->pasien->ALM1PASIEN)
                                        {{ $registrasi->pasien->ALM1PASIEN }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Diagnosa Awal</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pemeriksaan</td>
                                <td>:</td>
                                <td>
                                    @if ($registrasi->radiologi->pemeriksaan)
                                        {{ $registrasi->radiologi->pemeriksaan->NAMAPMR }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h5>TS. Yth. {{ $registrasi->radiologi->dokter_kirim->NAMADOKTER }}</h5>
                    <p>{{ $registrasi->radiologi->isi }}</p>
                    <br>
                    <p>{{ $registrasi->radiologi->kesimpulan }}</p>
                    <br>
                    <br>
                    <p>Mataram, {{ $registrasi->radiologi->created_at->format('d-M-Y') }}</p>
                    <p>Dokter Spesialis Radiologi</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    {!! DNS2D::getBarcodeHTML("$registrasi->radiologi->dokter_periksa->ppa->nama_ppa", 'QRCODE') !!}
                    <p class="fw-bold">{{ $registrasi->radiologi->dokter_periksa->ppa->nama_ppa }}</p>
                </div>
                @if ($registrasi->radiologi->gambar)
                    <hr>
                    <div class="row">
                        <h6>Lampiran</h6>
                        <img src="{{ asset($registrasi->radiologi->gambar) }}" class="w-100">
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
