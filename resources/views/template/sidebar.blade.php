            {{-- new sidebar --}}
            <section>
                <!-- Left Sidebar -->
                <aside id="leftsidebar" class="sidebar">
                    <!-- User Info -->
                    <div class="user-info">
                        <div class="image">
                            <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                        </div>
                        <div class="info-container">
                            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                            <div class="email">{{ Auth::user()->email }}</div>
                            <div class="btn-group user-helper-dropdown">
                                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">keyboard_arrow_down</i>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i
                                                class="material-icons">shopping_cart</i>Sales</a></li>
                                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ url('logout') }}"><i class="material-icons">input</i>Sign Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Menu -->
                    <div class="menu">
                        <ul class="list">
                            <li class="header">MAIN NAVIGATION</li>
                            <li>
                                <a href="/dashboard">
                                    <i class="material-icons">home</i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/pasien">
                                    <i class="material-icons">perm_contact_calendar</i>
                                    <span>Pasien</span>
                                </a>
                            </li>
                            <li class="header">REKAM MEDIS</li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F1 Admisi</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#">F1.1 Pendaftaran Pasien</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/f1/generalconsent') }}">F1.2 General Consent</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/f1/persetujuanranap') }}">F1.3 Persetujuan Ranap</a>
                                    </li>
                                    <li>
                                        <a href="#">F1.4 Kondisi Pelayanan</a>
                                    </li>
                                    <li>
                                        <a href="#">F1.5 Peraturan Keuangan</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/f1/harapanpasien') }}">F1.6 Harapan Pasien</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F2 Rawat Jalan</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{ url('/f2/resumerajal') }}">F2.1 Resume Rajal</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/f2/triageigd') }}">F2.2 Triage & Pengkajian IGD</a>
                                    </li>
                                    <li>
                                        <a href="#">F2.3 Transfer Pasien</a>
                                    </li>
                                    <li>
                                        <a href="#">F2.4 Pengkajian Awal Pasien Rajal</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/f2/pparajal') }}">F2.5 Catatan PPA Rajal</a>
                                    </li>
                                    <li>
                                        <a href="#">F2.6 Pengkajian Fisioterapi</a>
                                    </li>
                                    <li>
                                        <a href="#">F2.7 Permintaan Pergantian DPJP</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F3 Kajian Awal Pasien</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#">F3.1 Pengkajian Awal Pasien Ranap</a>
                                    </li>
                                    <li>
                                        <a href="#">F3.2 Pengkajian Pasien Ranap Obgyn</a>
                                    </li>
                                    <li>
                                        <a href="#">F3.3 Pengkajian Pasien Baru Lahir</a>
                                    </li>
                                    <li>
                                        <a href="#">F3.4 Pengkajian Pasien Neonatus</a>
                                    </li>
                                    <li>
                                        <a href="#">F3.5 Pengkajian Pasien Anak</a>
                                    </li>
                                    <li>
                                        <a href="#">F3.6 Pengkajian Pasien Tahap Terminal</a>
                                    </li>
                                    <li>
                                        <a href="#">F3.7 Pengkajian Pasien ICU</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F4 Perkembangan Pasien</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{ url('/f4/cppt') }}">F4.1 CPPT</a>
                                    </li>
                                    <li>
                                        <a href="#">F4.2 Asuhan Keperawatan & Kebidanan</a>
                                    </li>
                                    <li>
                                        <a href="#">F4.3 Asuhan Keperawatan Perioperatif</a>
                                    </li>
                                    <li>
                                        <a href="#">F4.4 Asesmen Ulang Nyeri</a>
                                    </li>
                                    <li>
                                        <a href="#">F4.5 Grafik Observasi</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F5 Hasil Pemeriksaan</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{ url('/f5/radiologi') }}">Radiologi</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F6 Edukasi</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#">F6.1 Catatan Edukasi Terintegrasi Pasien /
                                            Keluarga</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F7 Tindakan Medis</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#">F7.1A Persetujuan Tindakan kedokteran</a>
                                    </li>
                                    <li>
                                        <a href="#">F7.1B Penolakan Tindakan kedokteran</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F8 Resume Pasien</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{ url('f8/resume') }}">F8.1 Resume Medis</a>
                                    </li>
                                    <li>
                                        <a href="#">F8.2 Serah Terima Dokumen</a>
                                    </li>
                                    <li>
                                        <a href="#">F8.3 Discharge Planning</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F9 Formulir Khusus</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#">F9.1 Formulir Pindah Rumah Sakit</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">book</i>
                                    <span>F10 Formulir Lainnya</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#">Surat Pengantar Rawat Inap</a>
                                    </li>
                                    <li>
                                        <a href="#">Surat Pernyataan Pasien Umum</a>
                                    </li>
                                    <li>
                                        <a href="#">Perkiraan Biaya Operasi</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="header">BPJS</li>
                            <li>
                                <a href="/dashboard">
                                    <i class="material-icons">local_hospital</i>
                                    <span>Klaim BPJS</span>
                                </a>
                            </li>
                            <li class="header">SETTINGS</li>
                            <li>
                                <a href="/profile">
                                    <i class="material-icons">domain</i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="/user">
                                    <i class="material-icons">verified_user</i>
                                    <span>User</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ppa">
                                    <i class="material-icons">people</i>
                                    <span>PPA</span>
                                </a>
                            </li>
                        </ul>
                    </div>
