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
    <?php if ($profilesekolah != null) : ?>
        <div class="row card-header p-2 m-0">
            <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6">
                <h4 class="mt-2">Profile Sekolah</h4>
            </div>

            <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6" align="right">
                <a href="" class="btn btn-outline-warning btn-sm btn-icon-split mt-2" data-bs-toggle="modal" data-bs-target="#updateModal">
                    <span class="icon "><i class="fas fa-edit"></i></span>
                    <span class="text p-1">Update</span>
                </a>

                <a href="../" class="btn btn-outline-secondary btn-sm btn-icon-split mt-2">
                    <span class="icon "><i class="fas fa-sign-out-alt"></i></span>
                    <span class="text p-1">Kembali</span>
                </a>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="<?= base_url('update_profilesekolah/' . $profilesekolah['id']); ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="npsnLama" value="<?= $profilesekolah['npsn']; ?>">
                <input type="hidden" name="namaLama" value="<?= $profilesekolah['nama_sekolah']; ?>">
                <input type="hidden" name="telpLama" value="<?= $profilesekolah['telp']; ?>">
                <input type="hidden" name="alamatLama" value="<?= $profilesekolah['alamat']; ?>">

                <div class="row">
                    <div class="col-lg-2 col-xl-2 col-md-2 col-xs-2 col-sm-2 col-2 d-flex flex-column">
                        <span>NPSN</span>
                        <span>Nama Sekolah</span>
                        <span>No. Telp</span>
                        <span>Alamat</span>
                    </div>
                    <div class="col-lg-10 col-xl-10 col-md-10 col-xs-10 col-sm-10 col-10 d-flex flex-column">
                        <span>: <?= $datauser["npsn"] ?? 'Belum Diisi' ?></span>
                        <span>: <?= $profilesekolah["nama_sekolah"] ?? 'Belum Diisi' ?></span>
                        <span>: <?= $profilesekolah["telp"] ?? 'Belum Diisi'  ?></span>
                        <span>: <?= $profilesekolah["alamat"] ?? 'Belum Diisi' ?></span>
                    </div>
                </div>

                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="false" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Profile Sekolah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row pb-4">
                                    <div class="mb-2">
                                        <label class="form-label" for="nama_sekolah"><b>Nama Sekolah</b></label>
                                        <input type="text" id="nama_sekolah" name="nama_sekolah" maxlength="100" class="form-control <?php if (session('validation.nama_sekolah')) : ?> is-invalid <?php endif ?>" autofocus placeholder="Masukan Nama Management Anda" value="<?= old('nama_sekolah'); ?>">
                                        <div class="invalid-feedback">
                                            <?= session('validation.nama_sekolah'); ?>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label" for="notelp"><b>No. Telp/Whatsapp</b></label>
                                        <input type="text" id="notelp" name="notelp" maxlength="20" class="form-control <?php if (session('validation.notelp')) : ?> is-invalid <?php endif ?>" placeholder="Masukan No. Telp/Whatsapp Anda" value="<?= old('notelp'); ?>">
                                        <div class="invalid-feedback">
                                            <?= session('validation.notelp'); ?>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label" for="alamat"><b>Alamat Sekolah</b></label>
                                        <textarea type="text" id="alamat" name="alamat" rows="3" maxlength="100" class="form-control <?php if (session('validation.alamat')) : ?> is-invalid <?php endif ?>" placeholder="Masukan Alamat Management Anda" value="<?= old('alamat'); ?>"><?= old('alamat'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= session('validation.alamat'); ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-split">
                                    <span class="icon "><i class="fas fa-save"></i></span>
                                    <span class="text p-1">Save</span>
                                </button>

                                <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary btn-sm btn-icon-split">
                                    <span class="icon "><i class="fas fa-times"></i></span>
                                    <span class="text p-1">Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php else : ?>
        <div class="row card-header p-2 m-0">
            <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6">
                <h4 class="mt-2">Profile Sekolah</h4>
            </div>

            <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6" align="right">
                <a href="../" class="btn btn-outline-secondary btn-sm btn-icon-split mt-2">
                    <span class="icon "><i class="fas fa-sign-out-alt"></i></span>
                    <span class="text p-1">Kembali</span>
                </a>
            </div>
        </div>

        <div class="card-body text-center">
            <h3>Halaman ini hanya untuk pihak sekolah</h3>
        </div>
    <?php endif ?>
</div>

<?= $this->endSection(); ?>