<?= $this->extend('./templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow">
    <div class="row card-header p-2 m-0">
        <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
            <h4 class="mt-2">Tambah Data Pendik</h4>
        </div>
    </div>

    <div class="card-body">
        <!-- Basic Layout -->
        <form method="POST" enctype="multipart/form-data" action="<?= base_url('save_pendik') ?>">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="nik" class="form-label"><b>NIK</b></label>
                <input type="text" class="form-control" id="nik" name="nik" required>
                <div class="invalid-feedback">
                    <?= session('validation.nik'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama_pendik" class="form-label"><b>Nama Pendik</b></label>
                <input type="text" class="form-control" id="nama_pendik" name="nama_pendik" required>
                <div class="invalid-feedback">
                    <?= session('validation.nama_pendik'); ?>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                        <div class="invalid-feedback">
                            <?= session('validation.tempat_lahir'); ?>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="tanggal_lahir" class="form-label"><b>Tanggal Lahir</b></label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        <div class="invalid-feedback">
                            <?= session('validation.tanggal_lahir'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="agama" class="form-label"><b>Agama</b></label>
                <select class="form-control" id="agama" name="agama" required>
                    <option value="" selected disabled>Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.agama'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="jekel" class="form-label"><b>Jenis Kelamin</b></label>
                <select class="form-control" id="jekel" name="jekel" required>
                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.jekel'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label"><b>Alamat</b></label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.alamat'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label"><b>Nomor Telepon</b></label>
                <input type="text" class="form-control" id="telp" name="telp" required>
                <div class="invalid-feedback">
                    <?= session('validation.telp'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="status_gtk" class="form-label"><b>Status GTK</b></label>
                <select class="form-control" id="status_gtk" name="status_gtk" required>
                    <option value="" selected disabled>Pilih Status GTK</option>
                    <option value="PNS">PNS</option>
                    <option value="P3K">P3K</option>
                    <option value="BOSDA">BOSDA</option>
                    <option value="BOS">BOS</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.status_gtk'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nip" class="form-label"><b>NIP</b></label>
                <input type="text" class="form-control" id="nip" name="nip" required>
                <div class="invalid-feedback">
                    <?= session('validation.nip'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nuptk" class="form-label"><b>NUPTK</b></label>
                <input type="text" class="form-control" id="nuptk" name="nuptk" required>
                <div class="invalid-feedback">
                    <?= session('validation.nuptk'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="tmt_tugas" class="form-label"><b>TMT Tugas</b></label>
                <input type="date" class="form-control" id="tmt_tugas" name="tmt_tugas" required>
                <div class="invalid-feedback">
                    <?= session('validation.tmt_tugas'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="tmt_pns" class="form-label"><b>TMT PNS</b></label>
                <input type="date" class="form-control" id="tmt_pns" name="tmt_pns" required>
                <div class="invalid-feedback">
                    <?= session('validation.tmt_pns'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-split">
                <span class="icon"><i class="fas fa-save"></i></span>
                <span class="text p-1">Save</span>
            </button>

            <a href="../daftar_pengguna" class="btn btn-outline-secondary btn-sm btn-icon-split">
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
    });
</script>

<?= $this->endSection(); ?>