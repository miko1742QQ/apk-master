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
            <h4 class="py-2 mt-2">Daftar Tendik</h4>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6" align="right">
            <a href="../create_tendik" class="btn btn-outline-primary btn-sm btn-icon-split mt-2">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="p-1">Add Tendik</span>
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
                        $awal = new DateTime($value['tmt_pns']);
                        $akhir = new DateTime();
                        $abdi_pns = $awal->diff($akhir);

                        $awal1 = new DateTime($value['tmt_tugas']);
                        $akhir1 = new DateTime();
                        $abdi_sekolah = $awal1->diff($akhir1);

                        $tanggal_lahir = $value['tanggal_lahir'];
                        $batasusia = "+ 60 years";
                        $tahun_pensiun = DateTime::createFromFormat("Y-m-d", $tanggal_lahir);
                        $tahun_pensiun->modify($batasusia); ?>

                        <tr style="vertical-align: middle; text-align: center; text-shadow: none;">
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $nomor++; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nik"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;"><?= $value["nama_tendik"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["tempat_lahir"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= date('d M Y', strtotime($value['tanggal_lahir'])); ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["jekel"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["status_gtk"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["nip"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= date('d M Y', strtotime($value['tmt_tugas'])); ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= date('d M Y', strtotime($value['tmt_pns'])); ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["tmt_pns"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["tmt_pns"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["tmt_pns"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: justify;"><?= $value["telp"]; ?></td>
                            <td style="margin: 5px; padding: 3px; text-align: center;">
                                <a href="<?= base_url('edit_tendik/' . $value['id']) ?>" class="btn btn-outline-warning btn-sm btn-icon-split" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
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