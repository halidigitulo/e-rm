@extends('template.home')
@section('judul', 'Tambah Data General Consent')
@section('content')

    <div class="col-md-12">
        <div class="card ">
            <div class="header">
                <h6><a href="{{ url('f1/generalconsent') }}" class="btn btn-link bg-amber btn-sm">
                        <span class="material-icons">keyboard_arrow_left </span></a>
                    @yield('judul')
                </h6>
            </div>
            <div class="body">
                <form action="{{ route('generalconsent.store') }}" method="post">
                    @csrf
                    <h6>[ Identitas Pasien ]</h6>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" class="form-control noreg" placeholder="Noreg" readonly>
                                </div>
                                <span class="input-group-addon">
                                    <button type="button" class="btn btn-link bg-blue waves-effect" data-toggle="modal"
                                        data-target="#noregRajalModal"><i class="material-icons">search</i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control namapasien" placeholder="Nama" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control norm" placeholder="No. RM" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control tempatlahir" placeholder="Tempat Lahir"
                                        readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control tanggallahir" placeholder="Tgl Lahir"
                                        readonly />
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6>[ Identitas Wali Pasien ]</h6>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="nama">Nama Wali Pasien</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Nama"
                                        {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" />
                                    </div>
                                    @if ($errors->has('nama'))
                                        <div class="col-red">{{ $errors->first('nama') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="nama">Tanggal Lahir</label>
                                <div class="form-line">
                                    <input type="date" class="form-control" name="tgllahir" placeholder="Tgl Lahir">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="nama">Alamat</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="nama">No. HP</label>
                                <div class="form-line">
                                    <input type="number" class="form-control" name="nohp" placeholder="No. HP">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6>[ Informasi Tambahan ]</h6>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="checkbox" name="pelepasan_informasi" id="pelepasan_informasi" />
                                    <label for="pelepasan_informasi">Memberikan Informasi kepada Keluarga Terdekat</label>
                                    <input type="text" class="form-control" name="keluarga_1" placeholder="Nama Keluarga"
                                        id="keluarga_1" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="checkbox" name="izin_jenguk" id="izin_jenguk" />
                                    <label for="izin_jenguk">Mengizinkan untuk dijenguk</label>
                                    <input type="text" class="form-control" name="keluarga_2" placeholder="Nama Keluarga"
                                        id="keluarga_2" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-line">
                                <label for="privasi">Permintaan Privasi (Jika ada)</label>
                                <textarea rows="4" class="form-control" name="privasi" placeholder="Tambahkan permintaan privasi jika ada..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#pernyataan"><i
                                    class="material-icons">info</i> Pernyataan</button>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="">Tanda Tangan Wali</label><br>
                            <div id="signed" class="form-control kbw-signature"></div><br>
                            <button tyope="button" id="clear" class="btn btn-sm btn-danger"><i class="material-icons">delete</i>
                                Bersihkan</button>
                            <textarea name="signed" id="signature64" style="display: none"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="material-icons">save</i> Simpan</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i class="material-icons">undo</i> Reset</button>
                </form>
            </div>
        </div>

        <!-- Modal noreg Rajal-->
        <div class="modal fade" id="noregRajalModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Cari Data Pasien</h5>
                    </div>
                    <div class="modal-body table-responsive">
                        <table class="table table-bordered table-striped table-hover table-sm js-basic-example dataTable">
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
            <div class="modal-dialog modal-lg scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Pernyataan</h5>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#hak" data-toggle="tab">HAK PASIEN</a></li>
                            <li role="presentation"><a href="#kewajiban" data-toggle="tab">KEWAJIBAN PASIEN</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="hak">
                                <h6>UNDANG-UNDANG REPUBLIK INDONESIA NO 44 TAHUN 2009</h6>
                                <ol>
                                    <li>Memperoleh informasi mengenai tata tertib dan peraturan yang berlaku di
                                        Rumah
                                        Sakit;
                                    </li>
                                    <li>Memperoleh informasi tentang hak dan kewajiban pasien;</li>
                                    <li>Memperoleh layanan yang manusiawi, adil, jujur dan tanpa diskriminasi;</li>
                                    <li>Memperoleh layanan kesehatan yang bermutu sesuai dengan standar profesi dan
                                        standar prosedur operasional;</li>
                                    <li>Memperoleh layanan yang efektif dan efisien sehingga pasien terhindar dari
                                        kerugian fisik dan materi;</li>
                                    <li>Mengajukan pengaduan atas kualitas pelayanan yang didapatkan;</li>
                                    <li>Memilih dokter dan kelas perawatan sesuai dengan keingingannya dan peraturan
                                        yang berlaku di Rumah Sakit;</li>
                                    <li>Meminta konsultasi tentang penyakit yang dideritanya kepada dokter lain
                                        (second
                                        opinion) yang mempunyai Surat Ijin Praktik (SIP) baik di dalam maupun di
                                        luar
                                        Rumah Sakit;</li>
                                    <li>Mendapatkan privasi dan kerahasiaan penyakit yang diderita termasuk
                                        data-data
                                        medisnya;</li>
                                    <li>Memberikan persetujuan atau menolak atas tindakan yang akan dilakukan oleh
                                        tenaga kesehatan terhadap penyakit yang di deritanya;</li>
                                    <li>Mendapat informasi yang meliputi diagnosis dan tata cara tindakan medis,
                                        alternatif tindakan, risiko dan komplikasi yang mungkin terjadi dan
                                        prognosis
                                        terhadap tindakan yang dilakukan serta perkiraan biaya pengobatan;</li>
                                    <li>Didampingi keluarganya dalan keadaan kritis;</li>
                                    <li>Menjalankan ibadah sesuai agama atau kepercayaan yang dianutnya selama hal
                                        itu
                                        tidak mengganggu pasien lainnya;</li>
                                    <li>Memperoleh keamanan dan keselamatan dirinya selama dalam perawatan di Rumah
                                        Sakit;</li>
                                    <li>Mengajukan usul, saran, perbaikan atas perlakuan Rumah Sakit terhadap
                                        dirinya;
                                    </li>
                                    <li>Menolak pelayanan bimbingan rohani yang tidak sesuai dengan agama dan
                                        kepercayaan yang dianutnya;</li>
                                    <li>Menggugat dan atau menuntut Rumah Sakit apabila Rumah Sakit diduga
                                        memberikan
                                        pelayanan yang tidak sesuai dengan standar baik secara perdata atau pidana;
                                        dan
                                    </li>
                                    <li>Mengeluhkan pelayanan Rumah Sakit yang tidak sesuai dengan standar pelayanan
                                        melalui media cetak dan elektronik sesuai dengan ketentuan peraturan
                                        perundang-undangan.</li>
                                </ol>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="kewajiban">
                                <div class="row clearfix">
                                    <div class="col">
                                        <h6>PERATURAN MENTERI KESEHATAN REPUBLIK INDONESIA NO. 69 TAHUN 2014 PASAL 28</h6>
                                        <p>Dalam menerima pelayanan dari Rumah Sakit, pasien mempunyai kewajiban :</p>
                                        <ol>
                                            <li>Mematuhi peraturan yang berlaku di Rumah Sakit</li>
                                            <li>Menggunakan fasilitas Rumah Sakit secara bertanggung jawab;</li>
                                            <li>Menghormati hak-hak pasien lain, pengunjung dan hak tenaga kesehatan serta
                                                petugas lainnya yang bekerja di Rumah Sakit;</li>
                                            <li>Memberikan informasi yang jujur, lengkap dan akurat sesuai kemampuan dan
                                                pengetahuannya tentang masalah kesehatannya;</li>
                                            <li>Memberikan informasi mengenai kemampuan finansial dan jaminan kesehatan yang
                                                dimilikinya;</li>
                                            <li>Memenuhi rencana terapi yang direkomendasikan oleh tenaga kesehatan di Rumah
                                                Sakit dan disetujui oleh pasien yang bersangkutan setelah mendapat
                                                penjelasan
                                                sesuai ketentuan peraturan perundang-undangan;</li>
                                            <li>Menerima segala konsekuensi atas keputusan pribadinya untuk menolak rencana
                                                terapi yang direkomendasikan oleh tenaga kesehatan dan atau tidak memenuhi
                                                petunjuk yang diberikan oleh tenaga kesehatan dalam rangka penyembuhan
                                                penyakit
                                                atau masalah kesehatannya;</li>
                                            <li>Memberikan imbalan jasa atas pelayanan yang diterima.</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col">
                                        <h6>I. HAK DAN KEWAJIBAN SEBAGAI PASIEN</h6>
                                        <ol>
                                            <li>Saya mengakui bahwa pada proses pendaftaran untuk mendapatkan perawatan di
                                                Rumah
                                                Sakit Harapan Keluarga dan penandatanganan dokumen ini, saya telah mendapat
                                                informasi tentang hak-hak dan kewajiban saya sebagai pasien.</li>
                                            <li>Saya memiliki hak untuk ambil bagian dalam keputusan mengenai penyakit saya
                                                dan
                                                dalam hal perawatan medis dan rencana pengobatan.</li>
                                            <li>Saya telah mendapat informasi tentang “Hak dan tanggung jawab Pasien” di
                                                Rumah
                                                Sakit Harapan Keluarga melalui leaflet dan banner yang disediakan oleh
                                                petugas.
                                            </li>
                                            <li>Dan Saya memahami bahwa Rumah Sakit Harapan Keluarga tidak bertanggung jawab
                                                atas kehilangan barang-barang pribadi dan barang berharga yang dibawa ke
                                                Rumah
                                                Sakit.</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col">
                                        <h6>II. PERSETUJUAN UNTUK PERAWATAN DAN PENGOBATAN</h6>
                                        <ol>
                                            <li>Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan
                                                medis,
                                                saya mengizinkan dokter dan profesional kesehatan lainya untuk melakukan
                                                prosedur diagnostik dan untuk memberikan pengobatan medis seperti yang
                                                diperlukan dalam penilaian professional mereka. Prosedur diagnostik dan
                                                perawatan medis termasuk tetapi tidak terbatas pada electrocardiograms,
                                                x-ray,
                                                tes darah, terapi fisik dan pemberian obat.</li>
                                            <li>Saya sadar bahwa praktik kedokteran dan bedah bukan ilmu pasti dan saya
                                                mengakui
                                                bahwa tidak ada jaminan atas hasil apapun, terhadap perawatan prosedur atau
                                                pemeriksaan apapun yang dilakukan kepada saya.</li>
                                            <li>Saya mengerti dan memahami bahwa :
                                                <ol>
                                                    <li>Saya memiliki hak untuk mengajukan pertanyaan tentang pengobatan
                                                        yang
                                                        diusulkan (termasuk identitas setiap orang yang memberikan atau
                                                        mengamati pengobatan) setiap saat.</li>
                                                    <li>Saya mengerti dan memahami bahwa saya memiliki hak untuk persetujuan
                                                        atau menolak persetujuan, untuk setiap prosedur/terapi.</li>
                                                    <li>Saya mengerti bahwa banyak dokter pada staf medis rumah sakit yang
                                                        bukan
                                                        karyawan tetapi staf tamu yang telah diberikan hak untuk mengunakan
                                                        fasilitas untuk perawatan dan pengobatan pasien mereka.</li>
                                                    <li>Jika diperlukan rumah sakit, saya akan berpartisipasi dalam
                                                        pemilihan
                                                        dokter yang akan bertangungjawab untuk perawatan saya selama saya
                                                        dalam
                                                        perawatan di rumah sakit.</li>
                                                </ol>
                                            <li>Jika saya memutuskan untuk menghentikan perawatan medis untuk diri saya
                                                sendiri,
                                                saya memahami dan menyadari bahwa Rumah Sakit Harapan Keluarga atau dokter
                                                tidak
                                                bertanggung jawab atas hasil yang merugikan saya.</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col">
                                        <h6>III. PERSETUJUAN UNTUK PELEPASAN INFORMASI</h6>
                                        <ol>
                                            <li>Saya memahami informasi yang ada di dalam diri saya, termasuk diagnosis,
                                                hasil
                                                laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan
                                                medis,
                                                Rumah Sakit Harapan Keluarga akan menjamin kerahasiaannya.</li>
                                            <li>Saya memberi wewenang kepada Rumah Sakit Harapan Keluarga untuk memberikan
                                                informasi tentang rahasia kedokteran saya bila diperlukan untuk memproses
                                                klaim
                                                asuransi termasuk namun tidak terbatas pada BPJS, asuransi kesehatan
                                                lainnya,
                                                perusahaan dan atau lembaga pemerintah lainnya.</li>
                                            <li>Saya tidak memberikan/memberikan (coret salah satu) wewenang kepada Rumah
                                                Sakit
                                                Harapan Keluarga untuk memberikan tentang data dan informasi kesehatan saya
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="col">
                                        <h6>IV. KEINGINAN PRIVASI </h6>
                                        <ol>
                                            <li>Saya mengijinkan/tidak mengijinkan (coret salah satu) Rumah Sakit memberi
                                                akses
                                                bagi keluarga dan handaitaulan serta orang-orang yang akan menengok/menemui
                                                saya
                                                (sebutkan nama/profesi bila ada permintaan khusus):</li>
                                            <li>Saya menginginkan / tidak menginginkan privasi khusus (coret salah satu)
                                                sebutkan bila ada permintaan privasi khusus</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col">
                                        <h6>V. BARANG BERHARGA MILIK PRIBADI</h6>
                                        <ol>
                                            <li>Saya setuju untuk tidak membawa barang-barang berharga yang tidak diperlukan
                                                (seperti: perhiasan, elektronik dll) selama dalam perawatan di Rumah Sakit
                                                Harapan Keluarga. Saya memahami dan menyetujui bahwa apabila saya
                                                membawanya,
                                                maka Rumah Sakit Harapan Keluarga tidak bertanggung jawab terhadap
                                                kehilangan,
                                                kerusakan atau pencurian.</li>
                                            <li>Saya telah memahami bahwa rumah sakit tidak bertanggungjawab atas semua
                                                kehilangan barang-barang milik saya dan saya secara pribadi bertanggungjawab
                                                atas barang-barang berharga yang saya miliki termasuk namun tidak terbatas
                                                pada
                                                uang, perhiasan, buku cek, kartu kredit, handphone atau barang lainya. Dan
                                                apabila saya membutuhkan maka saya dapat menitipkan barang-barang saya
                                                kepada
                                                rumah sakit.</li>
                                            <li>Saya juga mengerti bahwa saya harus memberitahu/menitipkan pada Rumah Sakit
                                                Harapan Keluarga jika saya memiliki gigi palsu, kacamata, lensa kontak,
                                                prosthesis atau barang lainnya yang saya butuhkan untuk diamankan. </li>
                                        </ol>
                                    </div>
                                    <div class="col">
                                        <h6>VI. INFORMASI RAWAT INAP</h6>
                                        <ol>
                                            <li>Saya tidak diperkenankan membawa barang-barang berharga ke ruang rawat inap,
                                                jika ada anggota keluarga atau teman harus diminta untuk membawa pulang uang
                                                atau perhiasan, Bila tidak ada anggota keluarga, Rumah Sakit menyediakan
                                                tempat
                                                penitipan barang milik pasien di tempat resmi yang telah disediakan rumah
                                                sakit.
                                            </li>
                                            <li>Saya telah menerima informasi tentang peraturan yang diberlakukan oleh Rumah
                                                Sakit dan saya beserta keluarga bersedia untuk mematuhinya, termasuk akan
                                                mematuhi jam berkunjung pasien sesuai dengan aturan di rumah sakit.</li>
                                            <li>Anggota keluarga saya yang menunggu saya, bersedia untuk selalu memakai
                                                tanda
                                                pengenal khusus yang diberikan oleh Rumah Sakit, dan demi keamanan seluruh
                                                pasien setiap keluarga dan siapapun yang akan mengunjungi saya diluar jam
                                                berkunjung, bersedia untuk diminta/diperiksa identitasnya dan memakai
                                                identitas
                                                yang diberikan oleh Rumah Sakit.</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col">
                                        <h6>VII. KEWAJIBAN PEMBAYARAN</h6>
                                        <ol>
                                            <li>Saya memahami tentang informasi biaya pengobatan atau biaya tindakan yang
                                                dijelaskan oleh petugas Rumah Sakit.</li>
                                            <li>Saya menyatakan setuju, baik sebagai wali atau sebagai pasien, bahwa sesuai
                                                pertimbangan pelayanan yang diberikan kepada pasien, maka saya wajib untuk
                                                membayar total biaya pembayaran. Biaya pelayanan berdasarkan acuan biaya dan
                                                ketentuan Rumah Sakit Harapan Keluarga.</li>
                                            <li>Saya juga menyadari dan memahami bahwa:
                                                <ol>
                                                    <li>Apabila saya tidak memberikan persetujuan, atau dikemudian hari
                                                        mencabut
                                                        persetujuan saya untuk melepaskan rahasia kedokteran saya kepada
                                                        perusahaan asuransi yang saya tentukan, maka saya pribadi
                                                        bertanggung
                                                        jawab untuk membayar semua pelayanan dan tindakan medis dari Rumah
                                                        Sakit
                                                        Harapan Keluarga.</li>
                                                    <li>Apabila Rumah Sakit membutuhkan proses hukum untuk menagih biaya
                                                        pelayanan Rumah sakit dari saya, saya memahami bahwa saya
                                                        bertanggungjawab untuk membayar semua biaya yang disebabkan dari
                                                        proses
                                                        hukum tersebut.</li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-default">
                        <p>Dengan tanda tangan saya di bawah, saya menyatakan bahwa <span class="fw-bold"></span>dengan
                            setiap
                            pernyataan yang terdapat pada item persetujuan umum/general consent dan menandatangani tanpa
                            paksaan
                            dan dengan kesadaran penuh.</p>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Setuju</button>
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

    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("input[name='pelepasan_informasi']").click(function() {
                if ($("#pelepasan_informasi").is(":checked")) {
                    $("#keluarga_1").removeAttr("disabled");
                    $("#keluarga_1").focus();
                } else {
                    $("#keluarga_1").attr("disabled", "disabled");
                    $("#keluarga_1").attr("visibility", "hidden");
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[name='izin_jenguk']").click(function() {
                if ($("#izin_jenguk").is(":checked")) {
                    $("#keluarga_2").removeAttr("disabled");
                    $("#keluarga_2").focus();
                } else {
                    $("#keluarga_2").attr("disabled", "disabled");
                    $("#keluarga_2").attr("visibility", "hidden");
                }
            });
        });
    </script>

    <script src="http://keith-wood.name/js/jquery.signature.js"></script>
    <script>
        var sign = $("#signed").signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sign.signature('clear');
            $("#signature64").val('');
        });
    </script>
@endpush
