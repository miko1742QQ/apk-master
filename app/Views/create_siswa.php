<?= $this->extend('./templates/index'); ?>

<?= $this->section('page-content'); ?>

<form method="POST" action="<?= base_url('save_siswa') ?>">
    <?= csrf_field(); ?>

    <input type="hidden" name="npsnSekolah" value="<?= $datauser['npsn']; ?>">

    <div class="card mb-3">
        <div class="row card-header p-2 m-0">
            <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
                <h5 class="mt-2">Data Siswa</h5>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="nik" class="form-label"><b>NIK</b></label>
                <input type="text" class="form-control <?php if (session('validation.nik')) : ?> is-invalid <?php endif ?>" id="nik" name="nik" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" placeholder="Silakan masukkan NIK siswa" maxlength="16" minlength="16" value="<?= old('nik'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nik'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nipd" class="form-label"><b>NIPD</b></label>
                <input type="text" class="form-control <?php if (session('validation.nipd')) : ?> is-invalid <?php endif ?>" id="nipd" name="nipd" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8)" placeholder="Silakan masukkan NIPD siswa" maxlength="8" minlength="8" value="<?= old('nipd'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nipd'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nisn" class="form-label"><b>NISN</b></label>
                <input type="text" class="form-control <?php if (session('validation.nisn')) : ?> is-invalid <?php endif ?>" id="nisn" name="nisn" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8)" placeholder="Silakan masukkan NISN siswa" maxlength="8" minlength="8" value="<?= old('nisn'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nisn'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama_siswa" class="form-label"><b>Nama Siswa</b></label>
                <input type="text" class="form-control <?php if (session('validation.nama_siswa')) : ?> is-invalid <?php endif ?>" id="nama_siswa" name="nama_siswa" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 100)" placeholder="Silakan masukkan nama siswa" maxlength="100" value="<?= old('nama_siswa'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nama_siswa'); ?>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
                        <input type="text" class="form-control <?php if (session('validation.tempat_lahir')) : ?> is-invalid <?php endif ?>" id="tempat_lahir" name="tempat_lahir" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 50)" placeholder="Silakan masukkan tempat lahir siswa" maxlength="50" value="<?= old('tempat_lahir'); ?>">
                        <div class="invalid-feedback">
                            <?= session('validation.tempat_lahir'); ?>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="tanggal_lahir" class="form-label"><b>Tanggal Lahir</b></label>
                        <input type="date" class="form-control <?php if (session('validation.tanggal_lahir')) : ?> is-invalid <?php endif ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Silakan masukkan tanggal lahir siswa" value="<?= old('tanggal_lahir'); ?>" max="<?= date('Y-m-d'); ?>" onfocus="this.blur()" onkeydown="return false">
                        <div class="invalid-feedback">
                            <?= session('validation.tanggal_lahir'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="agama" class="form-label"><b>Agama</b></label>
                <select class="form-control <?php if (session('validation.agama')) : ?> is-invalid <?php endif ?>" id="agama" name="agama">
                    <option value="" selected disabled></option>
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
                    <option value="" selected disabled></option>
                    <option value="Laki-laki" <?= (old('jekel') == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?= (old('jekel') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.jekel'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label"><b>Alamat</b></label>
                <textarea class="form-control <?php if (session('validation.alamat')) : ?> is-invalid <?php endif ?>" id="alamat" name="alamat" rows="3" placeholder="Silakan masukkan alamat siswa" maxlength="100"><?= old('alamat'); ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.alamat'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="tempat_tinggal" class="form-label"><b>Tempat Tinggal</b></label>
                <select class="form-control <?php if (session('validation.tempat_tinggal')) : ?> is-invalid <?php endif ?>" id="tempat_tinggal" name="tempat_tinggal">
                    <option value="" selected disabled></option>
                    <?php foreach ($tempattinggal as $value) { ?>
                        <option value="<?= $value['nama_tempat_tinggal']; ?>" <?= old('tempat_tinggal') == $value['nama_tempat_tinggal'] ? 'selected' : null ?>><?= $value['nama_tempat_tinggal']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.tempat_tinggal'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="model_transportasi" class="form-label"><b>Mode Transportasi</b></label>
                <select class="form-control <?php if (session('validation.model_transportasi')) : ?> is-invalid <?php endif ?>" id="model_transportasi" name="model_transportasi">
                    <option value="" selected disabled></option>
                    <?php foreach ($transportasi as $value) { ?>
                        <option value="<?= $value['nama_transportasi']; ?>" <?= old('model_transportasi') == $value['nama_transportasi'] ? 'selected' : null ?>><?= $value['nama_transportasi']; ?></option>"
                    <?php } ?>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.model_transportasi'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label"><b>Nomor Telepon</b></label>
                <input type="text" class="form-control <?php if (session('validation.telp')) : ?> is-invalid <?php endif ?>" id="telp" name="telp" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15)" placeholder="Silakan masukkan nomor telepon siswa" maxlength="15" minlength="8" value="<?= old('telp'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.telp'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="skhun" class="form-label"><b>SKHUN</b></label>
                <input type="text" class="form-control <?php if (session('validation.skhun')) : ?> is-invalid <?php endif ?>" id="skhun" name="skhun" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 100)" placeholder="Silakan masukkan nomor SKHU siswa" maxlength="100" value="<?= old('skhun'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.skhun'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="penerima_kps" class="form-label"><b>Penerima KPS</b></label>
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6">
                        <div class="form-check">
                            <input class="form-check-input penerima-kps <?php if (session('validation.penerima_kps')) : ?> is-invalid <?php endif ?>" type="radio" name="penerima_kps" id="penerima_kps_ya" value="Ya" <?= (old('penerima_kps') == 'Ya') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="penerima_kps_ya">Ya</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6">
                        <div class="form-check">
                            <input class="form-check-input penerima-kps <?php if (session('validation.penerima_kps')) : ?> is-invalid <?php endif ?>" type="radio" name="penerima_kps" id="penerima_kps_tidak" value="Tidak" <?= (old('penerima_kps') == 'Tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="penerima_kps_tidak">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= session('validation.penerima_kps'); ?>
                </div>
            </div>

            <div class="mb-3" id="nomorKPSDiv" style="display: none;">
                <label for="nomor_kps" class="form-label"><b>Nomor KPS</b></label>
                <input type="text" class="form-control <?php if (session('validation.nomor_kps')) : ?> is-invalid <?php endif ?>" id="nomor_kps" name="nomor_kps" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" placeholder="Silakan masukkan nomor KPS siswa" maxlength="16" minlength="16" value="<?= old('nomor_kps'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nomor_kps'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="row card-header p-2 m-0">
            <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
                <h5 class="mt-2">Data Ayah Kandung</h5>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="nik_ayah" class="form-label"><b>NIK Ayah</b></label>
                <input type="text" class="form-control <?php if (session('validation.nik_ayah')) : ?> is-invalid <?php endif ?>" id="nik_ayah" name="nik_ayah" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" placeholder="Silakan masukkan NIK ayah" maxlength="16" minlength="16" value="<?= old('nik_ayah'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nik_ayah'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama_ayah" class="form-label"><b>Nama Ayah</b></label>
                <input type="text" class="form-control <?php if (session('validation.nama_ayah')) : ?> is-invalid <?php endif ?>" id="nama_ayah" name="nama_ayah" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 100)" placeholder="Silakan masukkan nama ayah" maxlength="100" value="<?= old('nama_ayah'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nama_ayah'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="tahun_lahir_ayah" class="form-label"><b>Tahun Lahir</b></label>
                <input type="text" class="form-control <?php if (session('validation.tahun_lahir_ayah')) : ?> is-invalid <?php endif ?>" id="tahun_lahir_ayah" name="tahun_lahir_ayah" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" placeholder="Silakan masukkan tahun lahir ayah" maxlength="4" minlength="4" value="<?= old('tahun_lahir_ayah'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.tahun_lahir_ayah'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="pendidikan_ayah" class="form-label"><b>Pendidikan Terakhir</b></label>
                <select class="form-control <?php if (session('validation.pendidikan_ayah')) : ?> is-invalid <?php endif ?>" id="pendidikan_ayah" name="pendidikan_ayah">
                    <option value="" selected disabled></option>
                    <?php foreach ($pendidikan as $value) { ?>
                        <option value="<?= $value['nama_pendidikan']; ?>" <?= old('pendidikan_ayah') == $value['nama_pendidikan'] ? 'selected' : null ?>><?= $value['nama_pendidikan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.pendidikan_ayah'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ayah" class="form-label"><b>Pekerjaan</b></label>
                <select class="form-control <?php if (session('validation.pekerjaan_ayah')) : ?> is-invalid <?php endif ?>" id="pekerjaan_ayah" name="pekerjaan_ayah">
                    <option value="" selected disabled></option>
                    <?php foreach ($pekerjaan as $value) { ?>
                        <option value="<?= $value['nama_pekerjaan']; ?>" <?= old('pekerjaan_ayah') == $value['nama_pekerjaan'] ? 'selected' : null ?>><?= $value['nama_pekerjaan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.pekerjaan_ayah'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="penghasilan_ayah" class="form-label"><b>Penghasilan</b></label>
                <select class="form-control <?php if (session('validation.penghasilan_ayah')) : ?> is-invalid <?php endif ?>" id="penghasilan_ayah" name="penghasilan_ayah">
                    <option value="" selected disabled></option>
                    <?php foreach ($penghasilan as $value) { ?>
                        <option value="<?= $value['nama_penghasilan']; ?>" <?= old('penghasilan_ayah') == $value['nama_penghasilan'] ? 'selected' : null ?>><?= $value['nama_penghasilan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.penghasilan_ayah'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="row card-header p-2 m-0">
            <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
                <h5 class="mt-2">Data Ibu Kandung</h5>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="nik_ibu" class="form-label"><b>NIK Ibu</b></label>
                <input type="text" class="form-control <?php if (session('validation.nik_ibu')) : ?> is-invalid <?php endif ?>" id="nik_ibu" name="nik_ibu" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" placeholder="Silakan masukkan NIK ibu" maxlength="16" minlength="16" value="<?= old('nik_ibu'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nik_ibu'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama_ibu" class="form-label"><b>Nama Ibu</b></label>
                <input type="text" class="form-control <?php if (session('validation.nama_ibu')) : ?> is-invalid <?php endif ?>" id="nama_ibu" name="nama_ibu" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 100)" placeholder="Silakan masukkan nama ibu" maxlength="100" value="<?= old('nama_ibu'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nama_ibu'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="tahun_lahir_ibu" class="form-label"><b>Tahun Lahir</b></label>
                <input type="text" class="form-control <?php if (session('validation.tahun_lahir_ibu')) : ?> is-invalid <?php endif ?>" id="tahun_lahir_ibu" name="tahun_lahir_ibu" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" placeholder="Silakan masukkan tahun lahir ibu" maxlength="4" minlength="4" value="<?= old('tahun_lahir_ibu'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.tahun_lahir_ibu'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="pendidikan_ibu" class="form-label"><b>Pendidikan Terakhir</b></label>
                <select class="form-control <?php if (session('validation.pendidikan_ibu')) : ?> is-invalid <?php endif ?>" id="pendidikan_ibu" name="pendidikan_ibu">
                    <option value="" selected disabled></option>
                    <?php foreach ($pendidikan as $value) { ?>
                        <option value="<?= $value['nama_pendidikan']; ?>" <?= old('pendidikan_ibu') == $value['nama_pendidikan'] ? 'selected' : null ?>><?= $value['nama_pendidikan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.pendidikan_ibu'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ibu" class="form-label"><b>Pekerjaan</b></label>
                <select class="form-control <?php if (session('validation.pekerjaan_ibu')) : ?> is-invalid <?php endif ?>" id="pekerjaan_ibu" name="pekerjaan_ibu">
                    <option value="" selected disabled></option>
                    <?php foreach ($pekerjaan as $value) { ?>
                        <option value="<?= $value['nama_pekerjaan']; ?>" <?= old('pekerjaan_ibu') == $value['nama_pekerjaan'] ? 'selected' : null ?>><?= $value['nama_pekerjaan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.pekerjaan_ibu'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="penghasilan_ibu" class="form-label"><b>Penghasilan</b></label>
                <select class="form-control <?php if (session('validation.penghasilan_ibu')) : ?> is-invalid <?php endif ?>" id="penghasilan_ibu" name="penghasilan_ibu">
                    <option value="" selected disabled></option>
                    <?php foreach ($penghasilan as $value) { ?>
                        <option value="<?= $value['nama_penghasilan']; ?>" <?= old('penghasilan_ibu') == $value['nama_penghasilan'] ? 'selected' : null ?>><?= $value['nama_penghasilan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.penghasilan_ibu'); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="card mb-3">
        <div class="row card-header p-2 m-0">
            <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
                <h5 class="mt-2">Data Wali</h5>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="nik_wali" class="form-label"><b>NIK Wali</b></label>
                <input type="text" class="form-control <?php if (session('validation.nik_wali')) : ?> is-invalid <?php endif ?>" id="nik_wali" name="nik_wali" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" placeholder="Silakan masukkan NIK wali" maxlength="16" minlength="16" value="<?= old('nik_wali'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nik_wali'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama_wali" class="form-label"><b>Nama Wali</b></label>
                <input type="text" class="form-control <?php if (session('validation.nama_wali')) : ?> is-invalid <?php endif ?>" id="nama_wali" name="nama_wali" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').slice(0, 100)" placeholder="Silakan masukkan nama wali" maxlength="100" value="<?= old('nama_wali'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nama_wali'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="tahun_lahir_wali" class="form-label"><b>Tahun Lahir</b></label>
                <input type="text" class="form-control <?php if (session('validation.tahun_lahir_wali')) : ?> is-invalid <?php endif ?>" id="tahun_lahir_wali" name="tahun_lahir_wali" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" placeholder="Silakan masukkan tahun lahir wali" maxlength="4" minlength="4" value="<?= old('tahun_lahir_wali'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.tahun_lahir_wali'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="pendidikan_wali" class="form-label"><b>Pendidikan Terakhir</b></label>
                <select class="form-control <?php if (session('validation.pendidikan_wali')) : ?> is-invalid <?php endif ?>" id="pendidikan_wali" name="pendidikan_wali">
                    <option value="" selected disabled></option>
                    <?php foreach ($pendidikan as $value) { ?>
                        <option value="<?= $value['nama_pendidikan']; ?>" <?= old('pendidikan_wali') == $value['nama_pendidikan'] ? 'selected' : null ?>><?= $value['nama_pendidikan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.pendidikan_wali'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="pekerjaan_wali" class="form-label"><b>Pekerjaan</b></label>
                <select class="form-control <?php if (session('validation.pekerjaan_wali')) : ?> is-invalid <?php endif ?>" id="pekerjaan_wali" name="pekerjaan_wali">
                    <option value="" selected disabled></option>
                    <?php foreach ($pekerjaan as $value) { ?>
                        <option value="<?= $value['nama_pekerjaan']; ?>" <?= old('pekerjaan_wali') == $value['nama_pekerjaan'] ? 'selected' : null ?>><?= $value['nama_pekerjaan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.pekerjaan_wali'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="penghasilan_wali" class="form-label"><b>Penghasilan</b></label>
                <select class="form-control <?php if (session('validation.penghasilan_wali')) : ?> is-invalid <?php endif ?>" id="penghasilan_wali" name="penghasilan_wali">
                    <option value="" selected disabled></option>
                    <?php foreach ($penghasilan as $value) { ?>
                        <option value="<?= $value['nama_penghasilan']; ?>" <?= old('penghasilan_wali') == $value['nama_penghasilan'] ? 'selected' : null ?>><?= $value['nama_penghasilan']; ?></option>"
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= session('validation.penghasilan_wali'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-split">
                <span class="icon"><i class="fas fa-save"></i></span>
                <span class="text p-1">Save</span>
            </button>

            <a href="../daftar_siswa" class="btn btn-outline-secondary btn-sm btn-icon-split">
                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="text p-1">Kembali</span>
            </a>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#agama, #jekel, #model_transportasi, #tempat_tinggal, #pendidikan_ayah, #pekerjaan_ayah, #penghasilan_ayah, #pendidikan_ibu, #pekerjaan_ibu, #penghasilan_ibu, #pendidikan_wali, #pekerjaan_wali, #penghasilan_wali').select2({
                placeholder: "Pilih Opsi",
                allowClear: true
            });

            // Fungsi untuk menangani perubahan pada elemen radio button penerima_kps
            $('.penerima-kps').change(function() {
                if ($(this).val() == 'Tidak') {
                    $('#nomorKPSDiv').hide();
                } else {
                    $('#nomorKPSDiv').show();
                }
            });

            // Inisialisasi tampilan berdasarkan nilai awal penerima_kps
            if ($('.penerima-kps:checked').val() == 'Tidak') {
                $('#nomorKPSDiv').hide();
            }
        });
    });
</script>

<?= $this->endSection(); ?>