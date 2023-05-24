<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hasil Pemeriksaan Radiologi - {{ $registrasi->pasien->NAMAPASIEN }} - {{ $registrasi->pasien->NOPASIEN }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
<head>
</head>

<body>
    <img src="logo.png" style="max-height: 100px;" >
    <h3 class="text-center">Hasil Pemeriksaan Radiologi</h3>
    <table class="table">
        <tr>
            <td>Nama Pasien - No. RM</td>
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
            <img src="{{ ($registrasi->radiologi->gambar) }}" style="width: 100%">
        </div>
    @endif
</body>

</html>
