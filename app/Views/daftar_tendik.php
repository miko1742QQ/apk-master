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
            <h4 class="py-2 mt-2">Daftar Tendik</h4>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6" align="right">
            <a href="../create_tendik" class="btn btn-outline-primary btn-sm btn-icon-split mt-2">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="p-1">Add Tendik</span>
            </a>

            <div class="btn-group">
                <button type="button" class="btn btn-outline-warning btn-sm mt-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="icon"><i class="fas fa-file-import"></i></span>
                    <span class="p-1">Import</span>

                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fas fa-file-import"></i> Import File</a></li>
                    <li><a class="dropdown-item" href="./../Libraries/<?= base_url('template_tendik.xlsx') ?>" download=""><i class="fas fa-download"></i> Download Template</a></li>
                </ul>
            </div>

            <a href="./export_tendik" class="btn btn-outline-danger btn-sm btn-icon-split mt-2">
                <span class="icon text-white-50"><i class="fas fa-file-export"></i></span>
                <span class="text p-1">Export</span>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive margin-tb">
            <table class="table table-hover display nowrap w-100" id="datatabel" cellspacing="0">
                <thead>
                    <tr class="first even" style="text-shadow: none; cursor: pointer;">
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NO</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NIK</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NAMA TENDIK</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" colspan="2">TANGGAL LAHIR</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">JEKEL</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">STATUS GTK</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NIP</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" colspan="2">TMT</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" colspan="2">MASA ABDI</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">TAHUN PENSIUN</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NO. TELP</th>
                        <?php if (user()->username == 'administrator') : ?>
                            <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">STATUS</th>
                        <?php endif; ?>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">AKSI</th>
                    </tr>
                    <tr class="first even" style="text-shadow: none; cursor: pointer;">
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">TEMPAT</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">TANGGAL</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">TUGAS</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PNS</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">SEKOLAH INI</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PNS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($tendik as $value) : ?>
                        <?php
                        // Menghitung tahun pensiun
                        $tanggal_lahir = $value['tanggal_lahir'];
                        $tahun_pensiun = new DateTime($tanggal_lahir);
                        $res = $tahun_pensiun->format('Y') + 60;

                        // Menghitung masa abdi PNS
                        $tmt_pns = $value['tmt_pns'];
                        $masa_abdi_pns = '';
                        if ($tmt_pns !== null && $tmt_pns !== '0000-00-00') {
                            $awal_pns = new DateTime($tmt_pns);
                            $akhir_pns = new DateTime();
                            $masa_abdi_pns = $awal_pns->diff($akhir_pns)->format('%y tahun %m bulan %d hari');
                        }

                        // Menghitung masa abdi sekolah
                        $tmt_tugas = $value['tmt_tugas'];
                        $masa_abdi_sekolah = '';
                        if ($tmt_tugas !== null && $tmt_tugas !== '0000-00-00') {
                            $awal_sekolah = new DateTime($tmt_tugas);
                            $akhir_sekolah = new DateTime();
                            $masa_abdi_sekolah = $awal_sekolah->diff($akhir_sekolah)->format('%y tahun %m bulan %d hari');
                        }
                        ?>

                        <tr style="vertical-align: middle; text-align: center; text-shadow: none;">
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $nomor++; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nik"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= strtoupper($value["nama_tendik"]); ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["tempat_lahir"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= date('d M Y', strtotime($value['tanggal_lahir'])); ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["jekel"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["status_gtk"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nip"] != null ? $value["nip"] : '-'; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= date('d M Y', strtotime($value['tmt_tugas'])); ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $tmt_pns != null ? date('d M Y', strtotime($value['tmt_pns'])) : '-'; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $masa_abdi_sekolah; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $tmt_pns != null ? $masa_abdi_pns : '-'; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $tahun_pensiun !== false ? $res : ''; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["telp"]; ?></td>
                            <?php if (user()->username == 'administrator') : ?>
                                <td style="margin: 5px; padding: 3px; text-align: center;"><?= ucwords(strtolower($value["status"])); ?></td>
                            <?php endif; ?>
                            <td style="margin: 5px; padding: 3px; text-align: center;">
                                <?php if (user()->username == 'administrator') : ?>
                                    <a href="<?= base_url('edit_tendik/' . $value['id']) ?>" class="btn btn-outline-warning btn-sm btn-icon-split" style="width: 100px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                        <span class='icon'><i class='fas fa-edit'></i></span>
                                        <span class="p-1">Edit</span>
                                    </a>

                                    <a href="#" class="btn btn-outline-primary btn-sm btn-icon-split statusptk-button" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#mutasiModal" data-id="<?= $value['id']; ?>" data-name="<?= $value['nama_tendik']; ?>" data-nameSekolahAsal="<?= $value['nama_sekolah']; ?>">
                                        <span class='icon'><i class='fas fa-exchange-alt'></i></span>
                                        <span class="p-1">Mutasi</span>
                                    </a>

                                    <?php if ($value['status'] == 'aktif') : ?>
                                        <a href="#" class="btn btn-outline-danger btn-sm btn-icon-split statusptk-button" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#statusModal" data-id="<?= $value['id']; ?>" data-nameptk="<?= $value['nama_tendik']; ?>" data-nameSekolahAsalPTK="<?= $value['nama_sekolah']; ?>">
                                            <span class='icon'><i class='fas fa-ban'></i></span>
                                            <span class="p-1">Non-Aktif</span>
                                        </a>
                                    <?php else : ?>
                                        <a href="#" class="btn btn-outline-success btn-sm btn-icon-split statusptk-button" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#statusModal" data-id="<?= $value['id']; ?>" data-nameptk="<?= $value['nama_tendik']; ?>" data-nameSekolahAsalPTK="<?= $value['nama_sekolah']; ?>">
                                            <span class='icon'><i class='fas fa-ban'></i></span>
                                            <span class="p-1">Aktif</span>
                                        </a>
                                    <?php endif ?>
                                <?php else : ?>
                                    <a href="<?= base_url('edit_tendik/' . $value['id']) ?>" class="btn btn-outline-warning btn-sm btn-icon-split" style="width: 100px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                        <span class='icon'><i class='fas fa-edit'></i></span>
                                        <span class="p-1">Edit</span>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <div class="modal fade" id="mutasiModal" aria-labelledby="mutasiModalLabel" aria-hidden="false" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <form id="mutasiForm" action="<?= base_url('mutasi_process'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mutasiModalLabel">Mutasi <span id="namaTendik"></span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="sekolah_asal" class="form-label"><b>Sekolah Asal</b></label>
                                    <span id="namaSekolahAsal" name="namaSekolahAsal" class="form-control"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="sekolah_dituju" class="form-label">Sekolah Dituju</label>
                                    <select class="form-control <?php if (session('validation.sekolah_dituju')) : ?> is-invalid <?php endif ?>" id="sekolah_dituju" name="sekolah_dituju">
                                        <option value="" selected disabled>Pilih Jenis PTK</option>
                                        <?php foreach ($sekolah as $value) : ?>
                                            <option value="<?= $value['npsn']; ?>" <?= old('sekolah_dituju') == $value['npsn'] ? 'selected' : null ?>>
                                                <?= $value['nama_sekolah']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= session('validation.jenis_ptk'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="alasan_mutasi" class="form-label"><b>Alsan Mutasi</b></label>
                                    <input type="text" class="form-control <?php if (session('validation.alasan_mutasi')) : ?> is-invalid <?php endif ?>" id="alasan_mutasi" name="alasan_mutasi" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 100)" placeholder="Silakan masukkan alasan mutasi" maxlength="100" value="<?= old('alasan_mutasi'); ?>">
                                    <div class="invalid-feedback">
                                        <?= session('validation.alasan_mutasi'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="tmt_mutasi" class="form-label"><b>TMT Mutasi</b></label>
                                    <input type="date" class="form-control <?php if (session('validation.tmt_mutasi')) : ?> is-invalid <?php endif ?>" id="tmt_mutasi" name="tmt_mutasi" placeholder="Silakan masukkan tmt mutasi" value="<?= old('tmt_mutasi'); ?>" max="<?= date('Y-m-d'); ?>" onfocus="this.blur()" onkeydown="return false">
                                    <div class="invalid-feedback">
                                        <?= session('validation.tmt_mutasi'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="pdfFileMutasi" class="form-label"><b>Pilih File Mutasi</b></label>
                                    <input type="file" class="form-control" id="pdfFileMutasi" name="pdfFileMutasi" accept=".pdf" required>
                                    <div id="fileHelp" class="form-text">Hanya file dengan ekstensi .pdf yang diperbolehkan.</div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-split">
                                    <span class="icon "><i class="fas fa-exchange-alt"></i></span>
                                    <span class="text p-1">Mutasi</span>
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
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importModalLabel"><b>Import Data</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form id="importForm" action="<?= base_url('import_process'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="excelFile" class="form-label"><b>Pilih File Excel</b></label>
                                    <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx" required>
                                    <div id="fileHelp" class="form-text">Hanya file dengan ekstensi .xls atau .xlsx yang diperbolehkan.</div>
                                </div>
                            </form>
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
                </div>
            </div>

            <div class="modal fade" id="statusModal" aria-labelledby="statusModalLabel" aria-hidden="false" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <form id="statusForm" action="<?= base_url('status_process'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="statusModalLabel">Konfirmasi Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="sekolah_asal" class="form-label"><b>Sekolah Asal</b></label>
                                    <span id="namaSekolahAsalPTK" name="namaSekolahAsalPTK" class="form-control"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_ptk" class="form-label"><b>Nama PTK</b></label>
                                    <span id="namaPTK" name="namaPTK" class="form-control"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="alasan" class="form-label"><b>Keterangan</b></label>
                                    <input type="text" class="form-control <?php if (session('validation.alasan')) : ?> is-invalid <?php endif ?>" id="alasan" name="alasan" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 100)" placeholder="Silakan masukkan alasan" maxlength="100" value="<?= old('alasan'); ?>">
                                    <div class="invalid-feedback">
                                        <?= session('validation.alasan'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="tmt_status" class="form-label"><b>TMT</b></label>
                                    <input type="date" class="form-control <?php if (session('validation.tmt_status')) : ?> is-invalid <?php endif ?>" id="tmt_status" name="tmt_status" placeholder="Silakan masukkan tmt" value="<?= old('tmt_status'); ?>" max="<?= date('Y-m-d'); ?>" onfocus="this.blur()" onkeydown="return false">
                                    <div class="invalid-feedback">
                                        <?= session('validation.tmt_status'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="pdfFileKeterangan" class="form-label"><b>Pilih File Keterangan</b></label>
                                    <input type="file" class="form-control" id="pdfFileKeterangan" name="pdfFileKeterangan" accept=".pdf" required>
                                    <div id="fileHelp" class="form-text">Hanya file dengan ekstensi .pdf yang diperbolehkan.</div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-split">
                                    <span class="icon "><i class="fas fa-cog"></i></span>
                                    <span class="text p-1">Proses</span>
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
        $('#mutasiModal').on('shown.bs.modal', function() {
            $('#sekolah_dituju').select2({
                placeholder: "Pilih Opsi",
                allowClear: true,
                dropdownParent: $("#mutasiModal")
            });
        });

        $('.mutasi-button, .statusptk-button').on('click', function() {
            var namatendik = $(this).data('name');
            var namaSekolahAsal = $(this).data('namesekolahasal');
            var namaPTK = $(this).data('nameptk');
            var namaSekolahAsalPTK = $(this).data('namesekolahasalptk');

            $('#namatendik').text(namatendik);
            $('#namaSekolahAsal').text(namaSekolahAsal);
            $('#namaPTK').text(namaPTK);
            $('#namaSekolahAsalPTK').text(namaSekolahAsalPTK);
        });
    });
</script>

<?= $this->endSection(); ?>