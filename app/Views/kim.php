<?= $this->extend('./templates/indexKIM'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow bg">
    <div class="row card-header p-0 m-0" id="bg-kim">
        <div class="col-lg-4 col-xl-4 col-md-4 col-xs-4 col-sm-4 col-4" id="bg-header" align="center">
            <marquee><?= $management['pesan']; ?></marquee>
        </div>

        <div class="col-lg-8 col-xl-8 col-md-8 col-xs-8 col-sm-8 col-8" id="bg-number" align="center">
            <div class="resultColor" id="resultColor"></div>
        </div>

        <div class="col-lg-4 col-xl-4 col-md-4 col-xs-4 col-sm-4 col-4 d-flex flex-column justify-content-between pt-5 pb-5" id="bg-header" style="text-align: center;">
            <div style="height: 200px; background-color: red; margin-bottom: 20px;">
                <img src="../benner/<?= $management["foto"] ?? 'Belum Diisi' ?>" alt="" style="width: 100%; height: 100%">
            </div>

            <div>
                <p>PILIH WARNA KUPON TERLEBIH DAHULU</p>
                <div class="row justify-content-center d-flex">
                    <div class="color" onclick="setColor('red')" style="background-color: red;"></div>
                    <div class="color" onclick="setColor('blue')" style="background-color: blue;"></div>
                    <div class="color" onclick="setColor('green')" style="background-color: green;"></div>
                    <div class="color" onclick="setColor('yellow')" style="background-color: yellow;"></div>
                    <div class="color" onclick="setColor('white')" style="background-color: white;"></div>
                </div>
            </div>

            <div id="result-border">
                <div class="resultColor" id="resultColor1"></div>
                <div class="result" id="result"></div>
            </div>

            <div class="d-flex flex-row gap-2">
                <a href="#" onclick="openModal()" class="btn btn-success btn-sm btn-icon-split mt-2" style="width: 50%;">
                    <span class="icon text-green-50"><i class="fas fa-coffee"></i></span>
                    <span class="text p-1">Istirahat</span>
                </a>
                <!-- <a href="#" onclick="clearColors()" class="btn btn-outline-danger btn-sm btn-icon-split mt-2">
                        <span class="icon text-red-50"><i class="fas fa-trash-alt"></i></span>
                        <span class="text p-1">Clear</span>
                    </a> -->
                <a href="../" class="btn btn-warning btn-sm btn-icon-split mt-2" style="width: 50%;">
                    <span class="icon text-yellow-50"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="text p-1">Keluar</span>
                </a>
            </div>

            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content justify-content-between ">
                    <div style="height: 200px; background-color: red; margin-bottom: 20px;">
                        <img src="../benner/<?= $management["foto"] ?? 'Belum Diisi' ?>" alt="" style="width: 100%; height: 100%">
                    </div>

                    <div class="text-center d-flex flex-column" style="font-size: 24px;">
                        <span><?= $management["nama_management"] ?? 'Belum Diisi' ?></span>
                        <span><?= $management["telp"] ?? 'Belum Diisi'  ?></span>
                        <span><?= $management["alamat"] ?? 'Belum Diisi' ?></span>
                        <span><?= $management["pesan"] ?? 'Belum Diisi' ?></span>
                    </div>
                    <h1><?= $management['pesan']; ?></h1>
                    <button class="btn btn-warning" onclick="closeModal()" style="cursor: pointer; float: right;">Kembali</button>
                </div>
            </div>
            <div id="overlay" class="overlay"></div>
        </div>

        <div class="col-lg-8 col-xl-8 col-md-8 col-xs-8 col-sm-8 col-8" id="bg-number" align="center">
            <div class="col justify-content-center d-flex">
                <ul>
                    <?php
                    $count = 0;
                    foreach ($numbers as $number) :
                    ?>
                        <li class="number" onclick="showNumber(<?= $number; ?>); toggleColor(<?= $number; ?>);" id="number<?= $number; ?>"><?= $number; ?></li>
                        <?php
                        $count++;
                        if ($count % 10 == 0 && $count / 10 < 9) :
                        ?>
                </ul>
                <ul>
                <?php endif; ?>
            <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>