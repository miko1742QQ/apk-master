<?= $this->extend('./templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow">
    <div class="row card-header p-2 m-0">
        <div class="col-lg-12 col-xl-12 col-md-621 col-xs-12 col-sm-12 col-12">
            <h4 class="mt-2">Tambah Data Konsumen</h4>
        </div>
    </div>

    <div class="card-body">
        <!-- Basic Layout -->
        <form method="POST" action="save_karyawan" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row pb-4">
                <div class="mb-2">
                    <label class="form-label" for="nik"><b>NIK</b></label>
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
                    <input type="file" id="foto" name="foto" class="form-control <?php if (session('validation.foto')) : ?> is-invalid <?php endif ?>" value="<?= old('foto'); ?>">
                    <div class="invalid-feedback">
                        <?= session('validation.foto'); ?>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-split">
                <span class="icon "><i class="fas fa-save"></i></span>
                <span class="text p-1">Save</span>
            </button>

            <a href="../daftar_karyawan" class="btn btn-outline-secondary btn-sm btn-icon-split">
                <span class="icon "><i class="fas fa-sign-out-alt"></i></span>
                <span class="text p-1">Kembali</span>
            </a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>