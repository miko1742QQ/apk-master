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
                        <th style="text-align: center; vertical-align: middle; margin: 5px; padding: 7px;" colspan="2">TANGGAL LAHIR</th>
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
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nama_siswa"]; ?></td>
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
                            <td style="margin: 5px; padding: 3px; text-align: center;">
                                <a href="<?= base_url('edit_siswa/' . $value['id']) ?>" class="btn btn-outline-warning btn-sm btn-icon-split" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                    <span class='icon'><i class='fas fa-edit'></i></span>
                                    <span class="p-1">Edit</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <div id="confirm-dialog" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body d-flex flex-column">
                            <span><b>Apa kamu yakin ingin menghapus data ini?</b></span>
                            <span>Data akan hilang untuk selamanya dan tidak bisa dikembalikan</span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>