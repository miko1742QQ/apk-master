<?= $this->extend('./templates/index'); ?>

<?= $this->section('page-content'); ?>

<form method="POST" action="<?= base_url('save_siswa') ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <input type="hidden" name="npsnSekolah" value="<?= $datauser['npsn']; ?>">

    <div class="card shadow mb-3">
        <div class="row card-header p-2 m-0">
            <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12">
                <h5 class="mt-2">Data Siswa</h5>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="lembaga" class="form-label"><b>Lembaga</b></label>
                <select class="form-control <?php if (session('validation.lembaga')) : ?> is-invalid <?php endif ?>" id="lembaga" name="lembaga">
                    <option value="" selected disabled></option>
                    <?php foreach ($lembaga as $value) { ?>
                        <option value="<?= $value['nama_lembaga']; ?>" <?= old('lembaga') == $value['nama_lembaga'] ? 'selected' : null ?>><?= $value['nama_lembaga']; ?></option>"
                    <?php } ?>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.lembaga'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nipd" class="form-label"><b>NIS</b></label>
                <input type="text" class="form-control <?php if (session('validation.nipd')) : ?> is-invalid <?php endif ?>" id="nipd" name="nipd" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8)" placeholder="Silakan masukkan NIPD siswa" maxlength="8" minlength="8" value="<?= old('nipd'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nipd'); ?>
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
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" class="form-control <?php if (session('validation.email')) : ?> is-invalid <?php endif ?>" id="email" name="email" placeholder="Silakan masukkan email siswa" maxlength="100" value="<?= old('email'); ?>">
                <div class="invalid-feedback">
                    <?= session('validation.email'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label"><b>Foto</b></label>
                <input type="file" class="form-control <?php if (session('validation.foto')) : ?> is-invalid <?php endif ?>" id="foto" name="foto" accept=".png, .jpeg" value="<?= old('foto'); ?>" required>
                <div class="invalid-feedback">
                    <?= session('validation.foto'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
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
            $('#lembaga').select2({
                placeholder: "Pilih Opsi",
                allowClear: true
            });
        });

        $('#nama_siswa').on('input', function() {
            var inputValue = $(this).val();
            var capitalizedValue = inputValue.replace(/(?:^|\s)\S/g, function(a) {
                return a.toUpperCase();
            });

            $(this).val(capitalizedValue).addClass('capitalize-first');
        });
    });
</script>

<?= $this->endSection(); ?>