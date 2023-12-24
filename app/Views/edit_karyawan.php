<?= $this->extend('./templates/indexEdit'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow">
    <div class="row card-header p-2 m-0">
        <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
            <h4 class="mt-2">Edit Data Konsumen</h4>
        </div>
    </div>

    <div class="card-body">
        <!-- Basic Layout -->
        <form method="POST" action="<?= base_url('update_karyawan/' . $datakaryawan['id_karyawan']); ?>" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="nikLama" value="<?= $datakaryawan['nik']; ?>">
            <input type="hidden" name="namaLama" value="<?= $datakaryawan['nama_karyawan']; ?>">
            <input type="hidden" name="fotoLama" value="<?= $datakaryawan['foto']; ?>">

            <div class="row pb-4">
                <div class="col-lg-2 col-xl-2 col-md-2 col-xs-12 col-sm-12 col-12" align="center">
                    <img src="../img/<?= $datakaryawan["foto"]; ?>" alt="" style="width: 150px; height: 200px;">
                </div>

                <div class="col-lg-5 col-xl-5 col-md-5 col-xs-12 col-sm-12 col-12">
                    <h6><b>Data Lama</b></h6>
                    <div class="mb-2">
                        <label class="form-label" for="nikold"><b>NIK</b></label>
                        <input type="text" id="nikold" name="nikold" class="form-control" value="<?= $datakaryawan['nik']; ?>" disabled>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="namaold"><b>Nama Konsumen</b></label>
                        <input type="text" id="namaold" name="namaold" class="form-control" value="<?= $datakaryawan['nama_karyawan'] ?>" disabled>
                    </div>
                </div>

                <div class="col-lg-5 col-xl-5 col-md-5 col-xs-12 col-sm-12 col-12">
                    <h6><b>Data Baru</b></h6>
                    <div class="mb-2">
                        <label class="form-label" for="nik"><b>NIK Konsumen</b></label>
                        <input type="text" id="nik" name="nik" maxlength="16" class="form-control <?php if (session('validation.nik')) : ?> is-invalid <?php endif ?>" autofocus placeholder="Masukan NIK Konsumen" value="<?= old('nik'); ?>">
                        <div class="invalid-feedback">
                            <?= session('validation.nik'); ?>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="nama"><b>Nama Konsumen</b></label>
                        <input type="text" id="nama" name="nama" maxlength="100" class="form-control <?php if (session('validation.nama')) : ?> is-invalid <?php endif ?>" placeholder="Masukan Nama Konsumen" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= session('validation.nama'); ?>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="foto" class="form-label"><b>Foto Profile</b></label>
                        <input type="file" id="foto" name="foto" class="form-control <?php if (session('validation.foto')) : ?> is-invalid <?php endif ?>">
                        <div class="invalid-feedback">
                            <?= session('validation.foto'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-warning btn-sm btn-icon-split">
                <span class="icon "><i class="fas fa-save"></i></span>
                <span class="text p-1">Update</span>
            </button>

            <a href="../daftar_karyawan" class="btn btn-outline-secondary btn-sm btn-icon-split">
                <span class="icon "><i class="fas fa-sign-out-alt"></i></span>
                <span class="text p-1">Kembali</span>
            </a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>