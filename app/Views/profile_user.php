<?= $this->extend('./templates/indexEdit'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow">
    <div class="row card-header p-2 m-0">
        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6">
            <h4 class="mt-2">Profile <?= $datauser['nama_karyawan']; ?></h4>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6" align="right">
            <a href="../" class="btn btn-success btn-sm btn-icon-split mt-2">
                <span class="icon text-white-50"><i class="fas fa-list"></i></span>
                <span class="text p-1">Kembali</span>
            </a>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="<?= base_url('update_profile/' . $user['nik']); ?>">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="fotoLama" value="<?= $datauser['foto']; ?>">
            <input type="hidden" name="emailLama" value="<?= $user['email']; ?>">
            <input type="hidden" name="passwordLama" value="<?= $user['password']; ?>">
            <input type="hidden" name="password_hashLama" value="<?= $user['password_hash']; ?>">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-xl-3 col-md-3 col-xs-12 col-sm-12 col-12" align="center">
                        <img src="../img/<?= $datauser['foto']; ?>" alt="" style="width: 250px; height: 350px;">
                    </div>

                    <div class="col-lg-9 col-xl-9 col-md-9 col-xs-12 col-sm-12 col-12">
                        <div class="mb-3">
                            <label class="form-label"><b>NIK</b></label>
                            <input type="text" class="form-control <?php if (session('validation.nik')) : ?> is-invalid <?php endif ?>" id="nik" name="nik" value="<?= $user['nik']; ?>" disabled>
                            <div class="invalid-feedback">
                                <?= session('validation.nik'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Nama Konsumen</b></label>
                            <input type="text" class="form-control <?php if (session('validation.nama_karyawan')) : ?> is-invalid <?php endif ?>" id="nama_karyawan" name="nama_karyawan" value="<?= $datauser['nama_karyawan']; ?>" disabled>
                            <div class="invalid-feedback">
                                <?= session('validation.nama_karyawan'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Email</b></label>
                            <input type="text" class="form-control <?php if (session('validation.email')) : ?> is-invalid <?php endif ?>" id="email" name="email" value="<?= $user['email']; ?>">
                            <div class="invalid-feedback">
                                <?= session('validation.email'); ?>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password"><b>Password</b></label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password_hash" class="form-control <?php if (session('validation.password_hash')) : ?> is-invalid <?php endif ?>" name="password_hash" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" value="<?= old('password_hash'); ?>">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                <div class="invalid-feedback">
                                    <?= session('validation.password_hash'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label"><b>Foto Profile</b></label>
                            <input type="file" class="form-control <?php if (session('validation.foto')) : ?> is-invalid <?php endif ?>" id="foto" name="foto">
                            <div class="invalid-feedback">
                                <?= session('validation.foto'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>