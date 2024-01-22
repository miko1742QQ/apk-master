<?= $this->extend('./templates/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('error') || session()->getFlashdata('success')) : ?>
    <div class="alert <?= session()->getFlashdata('error') ? 'alert-warning' : 'alert-success' ?> alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashdata('error') ? 'Maaf' : 'Berhasil' ?>,</strong> <?= session()->getFlashdata('error') ?: session()->getFlashdata('success'); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        sembunyikanAlert(); // Panggil fungsi untuk alert
    </script>
<?php endif; ?>

<div class="row">
    <!-- Overview -->
    <div class="col-lg-4 col-sm-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 mb-4">
                        <h5>Total Pendik</h5>
                        <span><?= count($total_pendik) ?> Orang</span>
                    </div>
                    <div class="col-lg-6 col-sm-6 mb-4" align="right">
                        <i class="menu-icon tf-icons ti ti-user" style="font-size: 60px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Overview -->

    <!-- Overview -->
    <div class="col-lg-4 col-sm-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 mb-4">
                        <h5>Total Tendik</h5>
                        <span><?= count($total_tendik) ?> Orang</span>
                    </div>
                    <div class="col-lg-6 col-sm-6 mb-4" align="right">
                        <i class="menu-icon tf-icons ti ti-user" style="font-size: 60px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Overview -->

    <!-- Overview -->
    <div class="col-lg-4 col-sm-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 mb-4">
                        <h5>Total Siswa</h5>
                        <span><?= count($total_siswa) ?> Orang</span>
                    </div>
                    <div class="col-lg-6 col-sm-6 mb-4" align="right">
                        <i class="menu-icon tf-icons ti ti-user" style="font-size: 60px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Overview -->
</div>

<div class="row">
    <!-- Overview -->
    <div class="col-lg-8 col-sm-8 mb-4">
        <div class="card">
            <div class="card-body">
                <h5>Profile Sekolah</h5>
                <div class="row">
                    <div class="col-lg-2 col-xl-2 col-md-2 col-xs-2 col-sm-2 col-2 d-flex flex-column">
                        <span>NPSN</span>
                        <span>Nama Sekolah</span>
                        <span>No. Telp</span>
                        <span>Alamat</span>
                    </div>
                    <div class="col-lg-10 col-xl-10 col-md-10 col-xs-10 col-sm-10 col-10 d-flex flex-column">
                        <span>: <?= $datauser["npsn"] ?? 'Belum Diisi' ?></span>
                        <span>: <?= $profilesekolah["nama_sekolah"] ?? 'Belum Diisi' ?></span>
                        <span>: <?= $profilesekolah["telp"] ?? 'Belum Diisi'  ?></span>
                        <span>: <?= $profilesekolah["alamat"] ?? 'Belum Diisi' ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5>Detail Aplikasi</h5>
                <div class="row">
                    <div class="col-lg-4 col-xl-4 col-md-4 col-xs-4 col-sm-4 col-4 d-flex flex-column">
                        <span>Version</span>
                        <span>Framework</span>
                        <span>Database</span>
                    </div>
                    <div class="col-lg-8 col-xl-8 col-md-8 col-xs-8 col-sm-8 col-8 d-flex flex-column">
                        <span>: 2024</span>
                        <span>: Codeigneter4</span>
                        <span>: PostgreSQL</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>