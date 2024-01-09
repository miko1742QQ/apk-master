<?= $this->extend('./templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow">
    <div class="row card-header p-2 m-0">
        <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
            <h4 class="mt-2">Tambah Data Tendik</h4>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" action="<?= base_url('save_tendik') ?>">
            <?= csrf_field(); ?>

            <input type="hidden" name="npsnSekolah" value="<?= $datauser['npsn']; ?>">

            <div class="mb-3">
                <label for="nik" class="form-label"><b>NIK</b></label>
                <input type="text" class="form-control <?php if (session('validation.nik')) : ?> is-invalid <?php endif ?>" id="nik" name="nik" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" placeholder="Silakan masukkan NIK tendik" maxlength="16" minlength="16" value="<?= old('nik'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nik'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama_tendik" class="form-label"><b>Nama Tendik</b></label>
                <input type="text" class="form-control <?php if (session('validation.nama_tendik')) : ?> is-invalid <?php endif ?>" id="nama_tendik" name="nama_tendik" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 100)" placeholder="Silakan masukkan nama tendik" maxlength="100" value="<?= old('nama_tendik'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nama_tendik'); ?>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
                        <input type="text" class="form-control <?php if (session('validation.tempat_lahir')) : ?> is-invalid <?php endif ?>" id="tempat_lahir" name="tempat_lahir" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 50)" placeholder="Silakan masukkan tempat lahir tendik" maxlength="50" value="<?= old('tempat_lahir'); ?>">
                        <div class="invalid-feedback">
                            <?= session('validation.tempat_lahir'); ?>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="tanggal_lahir" class="form-label"><b>Tanggal Lahir</b></label>
                        <input type="date" class="form-control <?php if (session('validation.tanggal_lahir')) : ?> is-invalid <?php endif ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Silakan masukkan tanggal lahir tendik" value="<?= old('tanggal_lahir'); ?>" max="<?= date('Y-m-d'); ?>" onfocus="this.blur()" onkeydown="return false">
                        <div class="invalid-feedback">
                            <?= session('validation.tanggal_lahir'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="agama" class="form-label"><b>Agama</b></label>
                <select class="form-control <?php if (session('validation.agama')) : ?> is-invalid <?php endif ?>" id="agama" name="agama">
                    <option value="" selected disabled>Pilih Agama</option>
                    <option value="Islam" <?= (old('agama') == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                    <option value="Kristen" <?= (old('agama') == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                    <option value="Katolik" <?= (old('agama') == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                    <option value="Hindu" <?= (old('agama') == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                    <option value="Buddha" <?= (old('agama') == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
                    <option value="Konghucu" <?= (old('agama') == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.agama'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="jekel" class="form-label"><b>Jenis Kelamin</b></label>
                <select class="form-control <?php if (session('validation.jekel')) : ?> is-invalid <?php endif ?>" id="jekel" name="jekel">
                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" <?= (old('jekel') == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?= (old('jekel') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.jekel'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label"><b>Alamat</b></label>
                <textarea class="form-control <?php if (session('validation.alamat')) : ?> is-invalid <?php endif ?>" id="alamat" name="alamat" rows="3" placeholder="Silakan masukkan alamat tendik" maxlength="100"><?= old('alamat'); ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.alamat'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label"><b>Nomor Telepon</b></label>
                <input type="text" class="form-control <?php if (session('validation.telp')) : ?> is-invalid <?php endif ?>" id="telp" name="telp" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15)" placeholder="Silakan masukkan nomor telepon tendik" maxlength="15" minlength="8" value="<?= old('telp'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.telp'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="status_gtk" class="form-label"><b>Status GTK</b></label>
                <select class="form-control <?php if (session('validation.status_gtk')) : ?> is-invalid <?php endif ?>" id="status_gtk" name="status_gtk">
                    <option value="" selected disabled>Pilih Status GTK</option>
                    <option value="PNS" <?= (old('status_gtk') == 'PNS') ? 'selected' : ''; ?>>PNS</option>
                    <option value="P3K" <?= (old('status_gtk') == 'P3K') ? 'selected' : ''; ?>>P3K</option>
                    <option value="BOSDA" <?= (old('status_gtk') == 'BOSDA') ? 'selected' : ''; ?>>BOSDA</option>
                    <option value="BOS" <?= (old('status_gtk') == 'BOS') ? 'selected' : ''; ?>>BOS</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.status_gtk'); ?>
                </div>
            </div>

            <div class="mb-3" id="nipDiv">
                <label for="nip" class="form-label"><b>NIP</b></label>
                <input type="text" class="form-control <?php if (session('validation.nip')) : ?> is-invalid <?php endif ?>" id="nip" name="nip" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" placeholder="Silakan masukkan NIP tendik" maxlength="16" minlength="16" value="<?= old('nip'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nip'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nuptk" class="form-label"><b>NUPTK</b></label>
                <input type="text" class="form-control <?php if (session('validation.nuptk')) : ?> is-invalid <?php endif ?>" id="nuptk" name="nuptk" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" placeholder="Silakan masukkan NUPTK tendik" maxlength="16" minlength="16" value="<?= old('nuptk'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nuptk'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="tmt_tugas" class="form-label"><b>TMT Tugas</b></label>
                <input type="date" class="form-control <?php if (session('validation.tmt_tugas')) : ?> is-invalid <?php endif ?>" id="tmt_tugas" name="tmt_tugas" value="<?= old('tmt_tugas'); ?>" max="<?= date('Y-m-d'); ?>" onfocus="this.blur()" onkeydown="return false">
                <div class="invalid-feedback">
                    <?= session('validation.tmt_tugas'); ?>
                </div>
            </div>

            <div class="mb-3" id="tmt_pnsDiv">
                <label for="tmt_pns" class="form-label"><b>TMT PNS</b></label>
                <input type="date" class="form-control <?php if (session('validation.tmt_pns')) : ?> is-invalid <?php endif ?>" id="tmt_pns" name="tmt_pns" value="<?= old('tmt_pns'); ?>" max="<?= date('Y-m-d'); ?>" onfocus="this.blur()" onkeydown="return false">
                <div class="invalid-feedback">
                    <?= session('validation.tmt_pns'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-split">
                <span class="icon"><i class="fas fa-save"></i></span>
                <span class="text p-1">Save</span>
            </button>

            <a href="../daftar_tendik" class="btn btn-outline-secondary btn-sm btn-icon-split">
                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="text p-1">Kembali</span>
            </a>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#agama').select2({
            placeholder: "Pilih Agama",
            allowClear: true
        });
        $('#jekel').select2({
            placeholder: "Pilih Jenis Kelamin",
            allowClear: true
        });
        $('#status_gtk').select2({
            placeholder: "Pilih Status GTK",
            allowClear: true
        });

        if ($('#status_gtk').val() == 'BOSDA' || $('#status_gtk').val() == 'BOS') {
            $('#nipDiv').hide();
            $('#tmt_pnsDiv').hide();
        }

        $('#status_gtk').change(function() {
            if ($(this).val() == 'BOSDA' || $(this).val() == 'BOS') {
                $('#nipDiv').hide();
                $('#tmt_pnsDiv').hide();
            } else {
                $('#nipDiv').show();
                $('#tmt_pnsDiv').show();
            }
        });
    });
</script>

<?= $this->endSection(); ?>