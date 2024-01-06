<?= $this->extend('./templates/indexKIM'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow">
    <?php if ($management != null) : ?>
        <div class="row card-header p-2 m-0" id="bagianatas">
            <div class="col-lg-4 col-xl-4 col-md-4 col-xs-12 col-sm-12 col-12" align="center">
                <marquee><?= $management['pesan']; ?></marquee>
            </div>

            <div class="col-lg-8 col-xl-8 col-md-8 col-xs-12 col-sm-12 col-12" align="center">
                <div class="resultColor" id="resultColor"></div>
                <div class="resultAturan" id="resultAturan" style="color: white; font-size: 26px; font-weight: bold;"></div>
            </div>
        </div>

        <div class="row card-body p-0 m-0" id="bagianbawah">
            <div class="col-lg-4 col-xl-4 col-md-4 col-xs-12 col-sm-12 col-12" id="bagianbawahkiri">
                <div style="text-align: center; font-weight: bold; padding-top: 10px; color: black;" id="datetime-container1">
                    <span id="tanggal"></span>
                    <span id="waktu"></span>
                </div>

                <div id="bennerkonsumen" class="slick-slider position-relative">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <marquee class="position-absolute top-0 right-0 zindex-4" style="font-size: 24px;"><?= $management['nama_partner']; ?></marquee>
                            <div class="carousel-item active">
                                <img src="../benner/<?= $management["foto"] ?? 'Belum Diisi' ?>" class="d-block w-100" style="height: 150px; border-radius: 10px">
                                <div class="carousel-caption d-none d-md-block">
                                    <span><?= $management["nama_management"] ?? 'Belum Diisi' ?></span>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../benner/<?= $management["foto"] ?? 'Belum Diisi' ?>" class="d-block w-100" style="height: 150px; border-radius: 10px">
                                <div class="carousel-caption d-none d-md-block">
                                    <span><?= $management["nama_management"] ?? 'Belum Diisi' ?></span>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../benner/<?= $management["foto"] ?? 'Belum Diisi' ?>" class="d-block w-100" style="height: 150px; border-radius: 10px">
                                <div class="carousel-caption d-none d-md-block">
                                    <span><?= $management["nama_management"] ?? 'Belum Diisi' ?></span>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div id="result-border">
                    <div class="resultColor" id="resultColor1"></div>
                    <div class="result" id="result"></div>
                </div>

                <div id="pilihanwarnakupon">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-12 col-sm-12 col-12">
                            <p><b>PILIH WARNA KUPON TERLEBIH DAHULU</b></p>
                            <div class="color" onclick="setColor('red')" style="background-color: #FF6AC2;"></div>
                            <div class="color" onclick="setColor('blue')" style="background-color: blue;"></div>
                            <div class="color" onclick="setColor('green')" style="background-color: green;"></div>
                            <div class="color" onclick="setColor('yellow')" style="background-color: yellow;"></div>
                            <div class="color" onclick="setColor('white')" style="background-color: white;"></div>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-12 col-sm-12 col-12">
                            <p><b>ATURAN MAIN</b></p>
                            <div class="resultAturan1" onclick="aturanmain('aturan1')">A</div>
                            <div class="resultAturan1" onclick="aturanmain('aturan2')">B</div>
                            <div class="resultAturan1" onclick="aturanmain('aturan3')">C</div>
                            <div class="resultAturan1" onclick="aturanmain('aturan4')">D</div>
                            <div class="resultAturan1" onclick="aturanmain('aturan5')">E</div>
                            <div class="resultAturan1" onclick="aturanmain('aturan6')">F</div>
                            <div class="resultAturan1" onclick="aturanmain('aturan7')">G</div>
                            <div class="resultAturan1" onclick="aturanmain('aturan8')">H</div>
                            <div class="resultAturan1" onclick="aturanmain('aturan9')">I</div>
                        </div>
                    </div>
                </div>

                <div id="tombolaksi">
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
                    <div class="modal-content justify-content-between" style="background-color: #FFF6DC;">
                        <div style="height: 200px; background-color: red; margin-bottom: 20px;">
                            <img src="../benner/<?= $management["foto"] ?? 'Belum Diisi' ?>" alt="" style="width: 100%; height: 100%">
                        </div>

                        <div class="text-center d-flex flex-column" style="font-size: 24px;">
                            <h1><?= $management["nama_management"] ?? 'Belum Diisi' ?></h1>
                            <h2><?= $management["nama_partner"] ?? '' ?></h2>
                            <span><?= $management["telp"] ?? 'Belum Diisi'  ?></span>
                            <span><?= $management["alamat"] ?? 'Belum Diisi' ?></span>
                            <span>Dendang Pantun & Lagu Berhadiah</span>
                            <span>Lengkapi Acara Anda Bersama Kami...!!!</span>
                        </div>
                        <div class="text-center">
                            <h1><?= $management['pesan']; ?></h1>
                            <h4>© Aplikasi KIM Created By JAF V1 2023 (082287483950)</h4>
                        </div>
                        <button class="btn btn-warning" onclick="closeModal()" style="cursor: pointer; float: right;">Kembali</button>
                    </div>
                </div>
                <div id="overlay" class="overlay"></div>
            </div>

            <div class="col-lg-8 col-xl-8 col-md-8 col-xs-12 col-sm-12 col-12" id="bagianbawahkanan">
                <div id="isibagianbawahkanan">
                    <ul class="number-list">
                        <?php foreach ($numbers as $count => $number) : ?>
                            <li class="number" oncontextmenu="resetColor(<?= $number; ?>);" onclick="showNumber(<?= $number; ?>); toggleColor(<?= $number; ?>);" id="number<?= $number; ?>">
                                <?= $number; ?>
                            </li>
                            <?php if (($count + 1) % 10 == 0 && ($count + 1) / 10 < 9) : ?>
                    </ul>
                    <ul class="number-list"><?php endif; ?><?php endforeach; ?></ul>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="row card-header p-2 m-0">
            <div class="col-lg-12 col-xl-12 col-md-12 col-xs-12 col-sm-12 col-12" align="right">
                <a href="../" class="btn btn-outline-secondary btn-sm btn-icon-split mt-2">
                    <span class="icon "><i class="fas fa-sign-out-alt"></i></span>
                    <span class="text p-1">Kembali</span>
                </a>
            </div>
        </div>

        <div class="card-body text-center">
            <h3>Halaman ini hanya untuk kosumen</h3>
        </div>
    <?php endif ?>
</div>
<?= $this->endSection(); ?>