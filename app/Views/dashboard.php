<?= $this->extend('./templates/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('error')) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Maaf,</strong> <?= session()->getFlashdata('error'); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<?php if (session()->getFlashdata('success')) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil,</strong> <?= session()->getFlashdata('success'); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<div class="row">
    <!-- Overview -->
    <div class="col-lg-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10 col-sm-10 mb-4">
                        <h5>Username : <?= user()->email ?></h5>
                        <span>
                            <?php if (in_groups('Administrator')) : ?>Administrator<?php endif ?>
                            <?php if (in_groups('Pimpinan')) : ?>Pimpinan<?php endif ?>
                            <?php if (in_groups('Konsumen')) : ?>Konsumen<?php endif ?>
                        </span>
                    </div>
                    <div class="col-lg-2 col-sm-2 mb-4" align="right">
                        <i class="menu-icon tf-icons ti ti-user" style="font-size: 60px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Overview -->

    <!-- Overview -->
    <div class="col-lg-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 mb-4">
                        <h5>Total Konsumen</h5>
                        <span><?= count($management1) ?> Orang</span>
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