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
            <h4 class="py-2 mt-2">Daftar Siswa</h4>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6" align="right">
            <a href="../create_siswa" class="btn btn-outline-primary btn-sm btn-icon-split mt-2">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="p-1">Add Siswa</span>
            </a>

            <div class="btn-group">
                <button type="button" class="btn btn-outline-warning btn-sm mt-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="icon"><i class="fas fa-file-import"></i></span>
                    <span class="p-1">Import</span>

                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fas fa-file-import"></i> Import File</a></li>
                    <li><a class="dropdown-item" href="<?= site_url('download_excel') ?>" download="template_siswa.xlsx"><i class=" fas fa-download"></i> Unduh Template</a></li>
                </ul>
            </div>

            <a href="./export_siswa" class="btn btn-outline-danger btn-sm btn-icon-split mt-2">
                <span class="icon"><i class="fas fa-file-export"></i></span>
                <span class="text p-1">Export</span>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive margin-tb">
            <table class="table table-hover display nowrap w-100" id="datatabel" cellspacing="0">
                <thead>
                    <tr class="first even" style="text-shadow: none; cursor: pointer;">
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NO</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">LEMBAGA</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NIS</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NAMA SISWA</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">EMAIL</th>
                        <?php if (user()->username == 'administrator') : ?>
                            <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">STATUS</th>
                        <?php endif; ?>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($siswa as $value) : ?>
                        <tr style="vertical-align: middle; text-align: center; text-shadow: none;">
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $nomor++; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["lembaga"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nipd"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["nama_siswa"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["email"]; ?></td>
                            <?php if (user()->username == 'administrator') : ?>
                                <td style="margin: 5px; padding: 3px; text-align: center;"><?= ucwords(strtolower($value["status"])); ?></td>
                            <?php endif; ?>
                            <td style="margin: 5px; padding: 3px; text-align: center;">
                                <a href="<?= base_url('edit_siswa/' . $value['id']) ?>" class="btn btn-outline-warning btn-sm btn-icon-split" style="width: 100px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                    <span class='icon'><i class='fas fa-edit'></i></span>
                                    <span class="p-1">Edit</span>
                                </a>

                                <a href="#" class="btn btn-outline-danger btn-sm btn-icon-split statusdelete-button" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $value['id']; ?>" data-name="<?= $value['nama_siswa']; ?>">
                                    <span class='icon'><i class='fas fa-trash'></i></span>
                                    <span class="p-1">Delete</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <div class="modal fade" id="deleteModal" aria-labelledby="mutasiModalLabel" aria-hidden="false" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <form id="deleteForm" action="<?= base_url('delete_siswa/' . $value['id']) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mutasiModalLabel">Konfirmasi Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="sekolah_asal" class="form-label"><b>Apakah anda yakin ingin menghapus siswa ini?</b></label>
                                    <span id="namaSiswa" class="form-control"></span>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-danger btn-sm btn-icon-split">
                                    <span class="icon "><i class="fas fa-trash"></i></span>
                                    <span class="text p-1">Delete</span>
                                </button>

                                <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary btn-sm btn-icon-split">
                                    <span class="icon "><i class="fas fa-times"></i></span>
                                    <span class="text p-1">Close</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="false" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <form action="<?= base_url('import_siswa') ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="importModalLabel"><b>Import Data</b></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <?= csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="excelFile" class="form-label"><b>Pilih File Excel</b></label>
                                    <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx" required>
                                    <div id="fileHelp" class="form-text">Hanya file dengan ekstensi .xls atau .xlsx yang diperbolehkan.</div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-split">
                                    <span class="icon "><i class="fas fa-file-import"></i></span>
                                    <span class="text p-1">Import</span>
                                </button>

                                <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary btn-sm btn-icon-split">
                                    <span class="icon "><i class="fas fa-times"></i></span>
                                    <span class="text p-1">Close</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.delete-button, .statusdelete-button').on('click', function() {
            var namaSiswa = $(this).data('name');

            $('#namaSiswa').text(namaSiswa);
        });
    });
</script>

<?= $this->endSection(); ?>