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

<?= $this->endSection(); ?>