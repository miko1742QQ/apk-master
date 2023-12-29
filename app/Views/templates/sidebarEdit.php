<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="../" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../../Logo_Padang.png" style="width: 70%; height: 100%;">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">SEKOLAH</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <?php if (in_groups('Administrator') || in_groups('Pimpinan')) : ?>
            <li class="menu-item ">
                <a href="../dashboard" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-dashboard"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="../profile_sekolah" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-id-badge"></i>
                    <div data-i18n="Profile Sekolah">Profile Sekolah</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="GTK">GTK</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="../daftar_pendik" class="menu-link">
                            <div data-i18n="Pendik">Pendik</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../daftar_tendik" class="menu-link">
                            <div data-i18n="Tendik">Tendik</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item ">
                <a href="../daftar_siswa" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Siswa">Siswa</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="../bukuinduksiswa" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Buku Induk Siswa">Buku Induk Siswa</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-printer"></i>
                    <div data-i18n="Laporan">Laporan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="../laporan_tendik" class="menu-link">
                            <div data-i18n="Tendik">Tendik</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../laporan_pendik" class="menu-link">
                            <div data-i18n="Pendik">Pendik</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../laporan_siswa" class="menu-link">
                            <div data-i18n="Siswa">Siswa</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../laporan_absensi" class="menu-link">
                            <div data-i18n="Absensi">Absensi</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../laporan_bukuinduk" class="menu-link">
                            <div data-i18n="Buku Induk">Buku Induk</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Setting">Setting</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="../daftar_karyawan" class="menu-link">
                            <div data-i18n="Konsumen">Konsumen</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../daftar_pengguna" class="menu-link">
                            <div data-i18n="Akses Login">Akses Login</div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>

        <?php if (in_groups('Konsumen')) : ?>
            <li class="menu-item">
                <a href="../dashboard" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-dashboard"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="../profile_sekolah" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-id-badge"></i>
                    <div data-i18n="Profile Sekolah">Profile Sekolah</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="GTK">GTK</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="../daftar_pendik" class="menu-link">
                            <div data-i18n="Pendik">Pendik</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../daftar_tendik" class="menu-link">
                            <div data-i18n="Tendik">Tendik</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item ">
                <a href="../daftar_siswa" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Siswa">Siswa</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="../bukuinduksiswa" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Buku Induk Siswa">Buku Induk Siswa</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-printer"></i>
                    <div data-i18n="Laporan">Laporan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="../laporan_tendik" class="menu-link">
                            <div data-i18n="Tendik">Tendik</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../laporan_pendik" class="menu-link">
                            <div data-i18n="Pendik">Pendik</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../laporan_siswa" class="menu-link">
                            <div data-i18n="Siswa">Siswa</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../laporan_absensi" class="menu-link">
                            <div data-i18n="Absensi">Absensi</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../laporan_bukuinduk" class="menu-link">
                            <div data-i18n="Buku Induk">Buku Induk</div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>
    </ul>
</aside>