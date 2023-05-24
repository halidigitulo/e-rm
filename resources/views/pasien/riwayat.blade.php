<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Riwayat Medis Pasien {{ $riwayat->pasien->NAMAPASIEN }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">


<body>
    <div class="container p-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Riwayat Medis Pasien</h4>
                <a href="" class="btn float-end btn-success"><i class="fas fa-download"></i> Download ke PDF</a>
            </div>
            <div class="card-body">
                <h5 class="text-center bg-success p-1 rounded text-white">IDENTITAS PASIEN</h5>
                <hr>
                <div class="table-responsive-sm">
                    <table class="table table-striped hover table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama Pasien: {{ $riwayat->pasien->NAMAPASIEN }}
                                    [{{ $riwayat->pasien->JNSKELAMIN == 'L' ? 'Laki-laki' : 'Perempuan' }}] </td>
                                <td>Nomor RM : {{ substr($riwayat->pasien->NOPASIEN,2) }}</td>
                                <td>Umur :
                                    {{ $riwayat->UMURTH . ' Thn, ' . $riwayat->UMURBL . ' Bln, ' . $riwayat->UMUHR . ' Hr' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Noreg : {{ $riwayat->NOREG }}</td>
                                <td>Unit : @if ($riwayat->bagian)
                                        {{ $riwayat->bagian->unit->NAMABAGIAN }}
                                    @endif
                                </td>
                                <td>Dokter : @if ($riwayat->bagian)
                                        {{ $riwayat->bagian->dokter->NAMADOKTER }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tgl. Kunjungan : {{ date('d-M-Y', strtotime($riwayat->TGLREG)) }}</td>
                                <td>Cara Kunjungan :
                                    @if ($riwayat->anamnesarajal)
                                        @if ($riwayat->anamnesarajal->CRKUNJUNG == 1)
                                            Datang Sendiri
                                        @elseif($riwayat->anamnesarajal->CRKUNJUNG == 2)
                                            Puskesmas
                                        @elseif($riwayat->anamnesarajal->CRKUNJUNG == 3)
                                            Faskes Lain
                                        @elseif($riwayat->anamnesarajal->CRKUNJUNG == 4)
                                            RS. Lain
                                        @endif
                                    @endif
                                </td>
                                <td>Tindak Lanjut :
                                    @if ($riwayat->anamnesarajal)
                                        {{ $riwayat->anamnesarajal->TINDAKAN }}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Anamnesa / Keluhan :</label>

                        <textarea rows="3" class="form-control text-left" readonly>
                                @if ($riwayat->anamnesarajal)
{{ $riwayat->anamnesarajal->ANAMNESA }}
@endif
                            </textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="">Pemeriksaan Fisik :</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-control" readonly>
                            @if ($riwayat->anamnesarajal)
{{ $riwayat->anamnesarajal->PMRFISIK }}
@endif
                        </textarea>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Diagnosa :</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-control" readonly>
                            @if ($riwayat->anamnesarajal)
{{ $riwayat->anamnesarajal->DIAGNOSA }}
@endif
                        </textarea>
                    </div>
                    @if ($riwayat->icd)
                        <div class="col-md-12 mb-2">
                            <label for="">ICD</label>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th width="15%">Kode ICD</th>
                                            <th>Diagnosa</th>
                                            <th width="20%">Kasus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($icd as $result)
                                            <tr>
                                                <td>
                                                    @if ($result)
                                                        {{ $result->CATEGORI }}
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td>
                                                    @if ($result)
                                                        @if ($result->KASUSICD == 'B')
                                                            Baru
                                                        @else
                                                            Lama
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12 mb-2">
                        <label for="">TERAPI & DOSIS</label>
                        <textarea rows="2" readonly class="form-control"> @if ($riwayat->anamnesarajal)
{{ $riwayat->anamnesarajal->TERAPI }}
@endif
</textarea>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">CATATAN MEDIS</label>
                        <div class="table-responsive-sm">
                            <table class="table table-hover table-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="15%">Tanggal</th>
                                        <th width="10%">Jam</th>
                                        <th width="15%">PPA</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- hasil pemeriksaan laboratorium --}}
                @if ($riwayat->hasillab)
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center text-white bg-warning rounded p-1">HASIL PEMERIKSAAN LABORATORIUM
                            </h5>
                            <hr>
                        </div>
                        @foreach ($hasillab as $item)
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-secondary" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-toggle="collapse"
                                            data-target="#flush-collapse-{{ $item->NOLAB }}" aria-expanded="false"
                                            aria-controls="flush-collapse-{{ $item->NOLAB }}">
                                            <div class="row w-100">
                                                <div class="col-md-4">
                                                    No. Lab :
                                                    {{ $item->NOLAB }} 
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse-{{ $item->NOLAB }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-sm table-striped table-hover table-bordered"
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
                                                        {{-- @if ($item->NOLAB) --}}
                                                            @foreach ($item->child as $result)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{ $result->NAMAHASIL }}</td>
                                                                    <td>{{ $result->KETHASIL }}</td>
                                                                    <td>{{ $result->KETSATUAN }}</td>
                                                                    <td>{{ $result->KETNORMAL }}</td>
                                                                    <td>{{ $result->CATATAN }}</td>
                                                                </tr>
                                                            {{-- @empty
                                                                <tr>
                                                                    <td colspan="6" class="text-center">Tidak ada
                                                                        hasil laoratorium</td>
                                                                </tr> --}}
                                                            @endforeach
                                                        {{-- @endif --}}
                                                       
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

                {{-- resep farmasi --}}
                @if ($riwayat->resep)
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center bg-primary p-1 text-white rounded">OBAT FARMASI</h5>
                            <hr>
                        </div>
                        @foreach ($resep as $item)
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-secondary" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-toggle="collapse"
                                            data-target="#flush-collapse-{{ $item->NORESEP }}" aria-expanded="false"
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
                                    <div id="flush-collapse-{{ $item->NORESEP }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-sm table-striped table-hover table-bordered"
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

        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
@push('script')
    <script>
        $(function() {
            $('#hasillab').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "rowGroup": true,
            });
        });
    </script>
@endpush
</html>
