@extends('template.home')
@section('judul', 'Tambah Data Harapan Pasien')
@section('content')
    <div class="col-lg-12">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="text-gray-800">Tambah Data Persetujuan Pasien Ranap</h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f1/persetujuanranap') }}" class="float-end btn btn-sm btn-warning"><i
                            class="fas fa-undo"></i>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('persetujuanranap.store') }}" method="post">
                    @csrf
                    <h6 class="text-muted">[ Identitas Pasien ]</h6>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Noreg</label>
                                <div class="input-group">
                                    <input type="text" name="noreg"
                                        class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                        value="{{ old('noreg') }}" readonly>
                                    <div class="input-group-append ">
                                        <button class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#noregRajalModal">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                    @if ($errors->has('noreg'))
                                        <div class="invalid-feedback">{{ $errors->first('noreg') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien"
                                    value="{{ old('nama') }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">No. RM</label>
                                <input type="text" name="norm"
                                    class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm"
                                    value="{{ old('norm') }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tempat / Tgl. Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat"
                                        class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} tempatlahir"
                                        value="{{ old('tempat') }}" readonly>
                                    <input type="text" name="tanggal"
                                        class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }} tanggallahir"
                                        value="{{ old('tanggal') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted">[ Data Penanggung Jawab] </h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No. Hp</label>
                                <input type="number" class="form-control" name="nohp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-gruop">
                                <label for="">No. KTP / ID</label>
                                <input type="number" class="form-control" name="ktp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Agama --</option>
                                    <option value="islam">Islam</option>
                                    <option value="protesten">Protesten</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Pendidikan</label>
                                <select name="pendidikan" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Pendidikan --</option>
                                    <option value="1">SD</option>
                                    <option value="2">SMP</option>
                                    <option value="3">SMA</option>
                                    <option value="4">Diploma</option>
                                    <option value="5">Sarjana</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p>Dengan ini menyatakan dengan sesungguhnya bahwa saya setuju untuk dilakukan rawat inap di RS. Harapan
                        Keluarga: </p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ruangan</label>
                                <select name="ruangan" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Ruangan --</option>
                                    <option value="angsana">Angsana</option>
                                    <option value="mahoni">Mahoni</option>
                                    <option value="palem">Palem</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Kelas Perawatan</label>
                                <select name="kelas_rawat" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Kelas Rawat --</option>
                                    <option value="std-c">Standar C</option>
                                    <option value="std-b">Standar B</option>
                                    <option value="std-a">Standar A</option>
                                    <option value="vip">VIP</option>
                                    <option value="suite">Suite Room</option>
                                    <option value="president">President Suite</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Pernah dirawat sebelumnya?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <input type="checkbox" name="pernah_rawat" id="pernah_rawat">
                                        </span>
                                    </div>

                                    <input type="text" class="form-control" name="tahun_rawat" placeholder="Tahun"
                                        id="tahun_rawat" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="">Penanggung Biaya</label>
                                <select name="penanggung_biaya" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Penanggung Biaya --</option>
                                    <option value="pribadi">Pribadi</option>
                                    <option value="perusahaan">Perusahaan</option>
                                    <option value="bpjs">BPJS</option>
                                    <option value="asuransi">Asuransi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted">[ Nama & Alamat Keluarga terdekat] </h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="namakeluarga">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamatkeluarga">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="catatan" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#pernyataan"><i class="fas fa-info-circle"></i> Pernyataan</a>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Tanda Tanda Penanggung Jawab <sup
                                    class="text-danger">*</sup></label><br>
                            <div id="sigpj" class="form-control mb-3"></div><br>
                            <button id="clear" class="btn btn-sm btn-danger"><i class="fas fa-eraser"></i>
                                Bersihkan</button>
                            <textarea name="signed_pj" id="signature_pj" style="display: none"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i class="fas fa-undo"></i> Reset</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal noreg Rajal-->
    <div class="modal fade" id="noregRajalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5">Cari Data Pasien</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-hover table-striped table-sm" id="pasien">
                        <thead>
                            <tr>
                                <th>Tgl Daftar</th>
                                <th>Noreg</th>
                                <th>Nama Pasien</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($noreg as $item)
                                <tr>
                                    <td>{{ date('d-M-Y', strtotime($item->TGLREG)) }}</td>
                                    <td><a class="pilihnoreg btn btn-link" data-noreg="{{ $item->NOREG }}"
                                            data-nopasien="{{ $item->NOPASIEN }}"
                                            data-namapasien="{{ $item->pasien->NAMAPASIEN }}"
                                            data-tmplahir="{{ $item->pasien->TMPLAHIR }}"
                                            data-tgllahir="{{ $item->pasien->TGLLAHIR }}"
                                            data-jk="{{ $item->pasien->JNSKELAMIN }}"
                                            data-alamat="{{ $item->pasien->ALM1PASIEN }}">{{ $item->NOREG }}</a>
                                    </td>
                                    <td>{{ $item->pasien->NAMAPASIEN }} - {{ $item->NOPASIEN }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pernyataan-->
    <div class="modal fade" id="pernyataan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5">Pernyataan</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <p>Demi kelancaran pelayanan perawatan, pengobatan dan administrasi, dengan ini juga menyatakan :</p>
                    <ol>
                        <li>Setuju dan memberi ijin kepada dokter yang bersangkutan untuk merawat saya / pasien tersebut
                            diatas</li>
                        <li>Dengan ini menyatakan dengan sesungguhnya bahwa seluruh pembiayaan pelayanan di RSHK Mataram
                            akan saya bayarkan secara UMUM / BPJS / ASURANSI * dan bersedia untuk melengkapi berkas
                            kelengkapnya. Apabila dalam waktu <span class="fw-bold">3x24 jam tidak dapat menunjukkan Kartu
                                / Kelengkapan</span> lainnya, maka Saya siap untuk membayarkan semua pelayanan dan tindakan
                            di Rumah Sakit Harapan Kelaurga Mataram sebagai <span class="fw-bold">Pasien Umum</span></li>
                        <li>Telah menyetujui dan bersedia mentaati segala peraturan yang berlaku di RSHK Mataram</li>
                        <li>Memberi kuasa kepada dokter Rumah Sakit untuk memberikan keterangan yang diperlukan oleh pihak
                            penanggung biaya perawatan saya / pasien tersebut diatas.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Setuju</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- ambil data dari modal noreg --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pilihnoreg', function() {
                var noreg = $(this).data('noreg');
                var nopasien = $(this).data('nopasien');
                var namapasien = $(this).data('namapasien');
                var tmplahir = $(this).data('tmplahir');
                var tgllahir = $(this).data('tgllahir');
                var jk = $(this).data('jk');
                var alamat = $(this).data('alamat');

                $('.noreg').val(noreg);
                $('.norm').val(nopasien);
                $('.namapasien').val(namapasien);
                $('.tempatlahir').val(tmplahir);
                $('.tanggallahir').val(tgllahir);
                $('.jk').val(jk == 'L' ? 'Laki-laki' : 'Perempuan');
                $('.alamat').val(alamat);
                $('#noregRajalModal').modal('hide');
            });
        });
    </script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $('#pasien').DataTable({
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

    <script>
        var sig = $('#sigpj').signature({
            syncField: '#signature_pj',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature_pj").val('');
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[name='pernah_rawat']").click(function() {
                if ($("#pernah_rawat").is(":checked")) {
                    $("#tahun_rawat").removeAttr("disabled");
                    $("#tahun_rawat").focus();
                } else {
                    $("#tahun_rawat").attr("disabled", "disabled");
                    $("#tahun_rawat").attr("visibility", "hidden");
                }
            });
        });
    </script>

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        })
    </script>
@endpush
