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
                    <li><a class="dropdown-item" href="./../Libraries/<?= base_url('template_siswa.xlsx') ?>" download=""><i class="fas fa-download"></i> Download Template</a></li>
                </ul>
            </div>

            <a href="./export_siswa" class="btn btn-outline-danger btn-sm btn-icon-split mt-2">
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
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NIPD</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NISN</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NAMA SISWA</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">JEKEL</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">AGAMA</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" colspan="6">DATA ORANG TUA AYAH</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" colspan="6">DATA ORANG TUA IBU</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" colspan="6">DATA ORANG TUA WALI</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">PENERIMA PIP</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">ALASAN LAYAK</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">UMUR</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">ROMBEL</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">NO. TELP</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" colspan="2">TANGGAL LAHIR</th>
                        <?php if (user()->username == 'administrator') : ?>
                            <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">STATUS</th>
                        <?php endif; ?>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" rowspan="2">AKSI</th>
                    </tr>
                    <tr class="first even" style="text-shadow: none; cursor: pointer;">
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">TEMPAT</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">TANGGAL</th>
                        <!-- Ayah -->
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NIK</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NAMA</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PEKERJAAN</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PENGHASILAN</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">TAHUN LAHIR</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PENDIDIKAN</th>
                        <!-- Ibu -->
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NIK</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NAMA</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PEKERJAAN</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PENGHASILAN</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">TAHUN LAHIR</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PENDIDIKAN</th>
                        <!-- Wali -->
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NIK</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">NAMA</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PEKERJAAN</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PENGHASILAN</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">TAHUN LAHIR</th>
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;">PENDIDIKAN</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($siswa as $value) : ?>
                        <?php
                        // Menghitung umur siswa
                        $tanggal_lahir = $value['tanggal_lahir'];
                        $masa_abdi_pns = '';
                        if ($tanggal_lahir !== null && $tanggal_lahir !== '0000-00-00') {
                            $awal_umur = new DateTime($tanggal_lahir);
                            $akhir_umur = new DateTime();
                            $umur_sekarang = $awal_umur->diff($akhir_umur)->format('%y tahun %m bulan %d hari');
                        }
                        ?>

                        <tr style="vertical-align: middle; text-align: center; text-shadow: none;">
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $nomor++; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nik"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nipd"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nisn"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["nama_siswa"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["tempat_lahir"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= date('d M Y', strtotime($value['tanggal_lahir'])); ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["jekel"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["agama"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nik_ayah"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nama_ayah"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["pekerjaan_ayah"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["penghasilan_ayah"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["tahunlahir_ayah"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["pendidikan_ayah"]; ?></td>

                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nik_ibu"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nama_ibu"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["pekerjaan_ibu"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["penghasilan_ibu"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["tahunlahir_ibu"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["pendidikan_ibu"]; ?></td>

                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nik_wali"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nama_wali"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["pekerjaan_wali"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["penghasilan_wali"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["tahunlahir_wali"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["pendidikan_wali"]; ?></td>

                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["layak_pip"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["alasan_pip"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $umur_sekarang != null ? $umur_sekarang : '-'; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["rombel"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["telp"]; ?></td>
                            <?php if (user()->username == 'administrator') : ?>
                                <td style="margin: 5px; padding: 3px; text-align: center;"><?= ucwords(strtolower($value["status"])); ?></td>
                            <?php endif; ?>
                            <td style="margin: 5px; padding: 3px; text-align: center;">
                                <?php if (user()->username == 'administrator') : ?>
                                    <a href="<?= base_url('edit_siswa/' . $value['id']) ?>" class="btn btn-outline-warning btn-sm btn-icon-split" style="width: 100px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                        <span class='icon'><i class='fas fa-edit'></i></span>
                                        <span class="p-1">Edit</span>
                                    </a>

                                    <a href="#" class="btn btn-outline-primary btn-sm btn-icon-split statusptk-button" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#mutasiModal" data-id="<?= $value['id']; ?>" data-name="<?= $value['nama_siswa']; ?>" data-nameSekolahAsal="<?= $value['nama_sekolah']; ?>">
                                        <span class='icon'><i class='fas fa-exchange-alt'></i></span>
                                        <span class="p-1">Mutasi</span>
                                    </a>

                                    <?php if ($value['status'] == 'aktif') : ?>
                                        <a href="#" class="btn btn-outline-danger btn-sm btn-icon-split statusptk-button" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#statusModal" data-id="<?= $value['id']; ?>" data-namesiswa="<?= $value['nama_siswa']; ?>" data-nameSekolahAsalSiswa="<?= $value['nama_sekolah']; ?>">
                                            <span class='icon'><i class='fas fa-ban'></i></span>
                                            <span class="p-1">Non-Aktif</span>
                                        </a>
                                    <?php else : ?>
                                        <a href="#" class="btn btn-outline-success btn-sm btn-icon-split statusptk-button" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#statusModal" data-id="<?= $value['id']; ?>" data-namesiswa="<?= $value['nama_siswa']; ?>" data-nameSekolahAsalSiswa="<?= $value['nama_sekolah']; ?>">
                                            <span class='icon'><i class='fas fa-ban'></i></span>
                                            <span class="p-1">Aktif</span>
                                        </a>
                                    <?php endif ?>
                                <?php else : ?>
                                    <a href="<?= base_url('edit_siswa/' . $value['id']) ?>" class="btn btn-outline-warning btn-sm btn-icon-split" style="width: 100px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
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
                                <h5 class="modal-title" id="mutasiModalLabel">Mutasi <span id="namaSiswa"></span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="sekolah_asal" class="form-label"><b>Sekolah Asal</b></label>
                                    <span id="namaSekolahAsal" name="namaSekolahAsal" class="form-control"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="sekolah_dituju" class="form-label">Sekolah Dituju</label>


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
                    <form id="mutasiForm" action="<?= base_url('status_process'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="statusModalLabel">Konfirmasi Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="sekolah_asal" class="form-label"><b>Sekolah Asal</b></label>
                                    <span id="namaSekolahAsalSiswa" name="namaSekolahAsalSiswa" class="form-control"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_ptk" class="form-label"><b>Nama Siswa</b></label>
                                    <span id="namaSiswa" name="namaSiswa" class="form-control"></span>
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
            var namaSiswa = $(this).data('namesiswa');
            var namaSekolahAsalSiswa = $(this).data('namesekolahasalsiswa');

            $('#namatendik').text(namatendik);
            $('#namaSekolahAsal').text(namaSekolahAsal);
            $('#namaSiswa').text(namaSiswa);
            $('#namaSekolahAsalSiswa').text(namaSekolahAsalSiswa);
        });
    });
</script>

<?= $this->endSection(); ?>