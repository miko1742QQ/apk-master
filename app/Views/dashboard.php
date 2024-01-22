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
    <!-- <div class="col-lg-4 col-sm-4 mb-4">
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
    </div> -->
    <!--/ Overview -->

    <!-- Overview -->
    <!-- <div class="col-lg-4 col-sm-4 mb-4">
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
    </div> -->
    <!--/ Overview -->

    <!-- Overview -->
    <div class="col-lg-12 col-sm-12 mb-4">
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
<?= $this->endSection(); ?>