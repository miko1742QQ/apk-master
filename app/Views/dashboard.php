<?= $this->extend('./templates/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('error')) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Maaf,</strong> <?= session()->getFlashdata('error'); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        sembunyikanAlert(); // Panggil fungsi untuk alert kesalahan
    </script>
<?php } ?>

<?php if (session()->getFlashdata('success')) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil,</strong> <?= session()->getFlashdata('success'); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        sembunyikanAlert(); // Panggil fungsi untuk alert keberhasilan
    </script>
<?php } ?>

<div class="row">
    <div class="col-lg-12 col-sm-12 mb-4">
        <div style="height: 300px; background-color: red; margin-bottom: 20px;">
            <img src="../benner/<?= $management["foto"] ?? 'Belum Diisi' ?>" alt="" style="width: 100%; height: 100%">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>