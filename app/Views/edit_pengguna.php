<?= $this->extend('./templates/indexEdit'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow">
    <div class="row card-header p-2 m-0">
        <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
            <h4 class="mt-2">Edit Data Pengguna</h4>
        </div>
    </div>

    <div class="card-body">
        <!-- Basic Layout -->
        <form method="POST" action="<?= base_url('update_pengguna/' . $user['id']); ?>">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="force_pass_reset" id="force_pass_reset" value="0">
            <input type="hidden" name="emailLama" value="<?= $user['email']; ?>">
            <input type="hidden" name="usernameLama" value="<?= $user['username']; ?>">
            <input type="hidden" name="id_roleLama" value="<?= $user['id_role']; ?>">
            <input type="hidden" name="passwordLama" value="<?= $user['password']; ?>">
            <input type="hidden" name="password_hashLama" value="<?= $user['password_hash']; ?>">
            <input type="hidden" name="activeLama" value="<?= $user['active']; ?>">

            <div class="row">
                <div class="col-lg-6 col-xl-6 col-md-6 col-xs-12 col-sm-12 col-12">
                    <h6><b>Data Lama</b></h6>
                    <div class="mb-3">
                        <label class="form-label"><b>Email</b></label>
                        <input type="text" class="form-control" id="emaildisable" name="emaildisable" value="<?= $user['email']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Username</b></label>
                        <input type="text" class="form-control" id="usernamedisable" name="usernamedisable" value="<?= $user['username']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Role</b></label>
                        <select name="id_roledisable" id="id_roledisable" class="form-select" disabled>
                            <option value="" disabled>-Option-</option>
                            <?php foreach ($level as $value) { ?>
                                <option value="<?= $value['id']; ?>" <?= $user['id_role'] == $value['id'] ? 'selected' : null ?>>
                                    <?= $value['name']; ?>
                                </option>"
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Password</b></label>
                        <input type="text" class="form-control" id="password_hashdisable" name="password_hashdisable" value="<?= $user['password']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Status</b></label>
                        <select name="activedisable" id="activedisable" class="form-select" disabled>
                            <option value="" disabled>-Option-</option>
                            <option value="<?= $user['active'] == 1 ?>"><?= ($user['active'] == 1) ? 'Aktif' : 'Tidak Aktif' ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6 col-md-6 col-xs-12 col-sm-12 col-12">
                    <h6><b>Data Baru</b></h6>
                    <div class="mb-3">
                        <label class="form-label" for="email"><b>Email</b></label>
                        <input type="email" id="email" name="email" class="form-control <?php if (session('validation.email')) : ?> is-invalid <?php endif ?>" maxlength="100" placeholder="Masukkan email pengguna">
                        <div class="invalid-feedback">
                            <?= session('validation.email'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="username"><b>Username</b></label>
                        <input type="text" id="username" name="username" class="form-control <?php if (session('validation.username')) : ?> is-invalid <?php endif ?>" maxlength="100" placeholder="Masukkan username pengguna">
                        <div class="invalid-feedback">
                            <?= session('validation.username'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="id_role"><b>Role</b></label>
                        <select name=" id_role" id="id_role" class="form-select <?php if (session('validation.id_role')) : ?> is-invalid <?php endif ?>">
                            <option value="" disabled selected>Pilih Jenis Role</option>
                            <?php foreach ($level as $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>"
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= session('validation.id_role'); ?>
                        </div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password_hash"><b>Password</b></label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password_hash" class="form-control <?php if (session('validation.password_hash')) : ?> is-invalid <?php endif ?>" name="password_hash" maxlength="100" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" value="<?= old('password_hash'); ?>">
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            <div class="invalid-feedback">
                                <?= session('validation.password_hash'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="active"><b>Status</b></label>
                        <select name="active" id="active" class="form-select <?php if (session('validation.active')) : ?> is-invalid <?php endif ?>">
                            <option value="" disabled selected>Pilih Status Pengguna</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= session('validation.active'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-warning btn-sm btn-icon-split">
                <span class="icon "><i class="fas fa-save"></i></span>
                <span class="text p-1">Update</span>
            </button>

            <a href="../daftar_pengguna" class="btn btn-outline-secondary btn-sm btn-icon-split">
                <span class="icon "><i class="fas fa-sign-out-alt"></i></span>
                <span class="text p-1">Kembali</span>
            </a>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#nik').select2();
        $('#id_role').select2();
        $('#active').select2();

        $('#nikdisable').select2();
        $('#id_roledisable').select2();
        $('#activedisable').select2();
    });
</script>
<?= $this->endSection(); ?>