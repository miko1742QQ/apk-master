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

<div class="card shadow">
    <div class="row card-header p-2 m-0">
        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6">
            <h4 class="py-2 mt-2">Daftar Akses Login</h4>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6" align="right">
            <a href="../create_pengguna" class="btn btn-outline-primary btn-sm btn-icon-split mt-2">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="p-1">Add Akses Login</span>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive margin-tb">
            <table class="table table-hover display nowrap w-100" id="datatabel" cellspacing="0">
                <thead>
                    <tr class="first even" style="text-shadow: none; cursor: pointer;">
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NO</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NAMA PENGGUNA</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">USERNAME</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">ROLE</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">STATUS</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($users as $value) : ?>
                        <tr style="vertical-align: middle; text-align: center; text-shadow: none;">
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $nomor++; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["nama_karyawan"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["username"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["nama_role"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;">
                                <?= ($value['active'] == 1) ? 'AKTIF' : 'TIDAK AKTIF' ?>
                            </td>
                            <td style="margin: 5px; padding: 3px; text-align: center;">
                                <a href="<?= base_url('edit_pengguna/' . $value['id']) ?>" class="btn btn-outline-warning btn-sm btn-icon-split" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                    <span class='icon'><i class='fas fa-edit'></i></span>
                                    <span class="p-1">Edit</span>
                                </a>
                                <a data-href="<?= base_url('delete_pengguna/' . $value['id']) ?>" class="btn btn-outline-danger btn-sm btn-icon-split" onclick="confirmToDelete(this)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                    <span class='icon'><i class='fas fa-trash'></i></span>
                                    <span class="p-1">Delete</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="modal fade" id="confirm-dialog" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="false" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel">Konfirmasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column">
                            <span><b>Apa kamu yakin ingin menghapus data ini?</b></span>
                            <span>Data akan hilang untuk selamanya dan tidak bisa dikembalikan</span>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-danger btn-sm btn-icon-split">
                                <span class="icon "><i class="fas fa-trash"></i></span>
                                <span class="text p-1">Yes, Delete</span>
                            </button>

                            <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary btn-sm btn-icon-split">
                                <span class="icon "><i class="fas fa-times"></i></span>
                                <span class="text p-1">Close</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>