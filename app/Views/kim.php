<?= $this->extend('./templates/indexKIM'); ?>

<?= $this->section('page-content'); ?>

<div class="card shadow bg">
    <div class="row card-header p-2 m-0">
        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6">
            <h4 class="mt-2"> <?= $title ?> </h4>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6 col-6" align="right">
            <a href="../" class="btn btn-success btn-sm btn-icon-split mt-2">
                <span class="icon text-white-50"><i class="fas fa-list"></i></span>
                <span class="text p-1">Kembali</span>
            </a>
        </div>
    </div>

    <div class="card-body mt-5 mb-2">
        <div class="row text-center align-center">
            <div class="col-md-4 m-0 d-flex flex-column justify-content-evenly">
                <div>
                    <p>PILIH KUPON TERLEBIH DAHULU</p>
                    <div class="row justify-content-center d-flex">
                        <div class="color" onclick="setColor('red')" style="background-color: red;"></div>
                        <div class="color" onclick="setColor('blue')" style="background-color: blue;"></div>
                        <div class="color" onclick="setColor('green')" style="background-color: green;"></div>
                        <div class="color" onclick="setColor('yellow')" style="background-color: yellow;"></div>
                        <div class="color" onclick="setColor('white')" style="background-color: white; border: 1px solid gray"></div>
                    </div>
                </div>
                <div>
                    <div class="resultColor" id="resultColor"></div>
                    <div class="result" id="result"></div>
                </div>
                <div>
                    <a href="#" onclick="openModal()" class="btn btn-outline-success btn-sm btn-icon-split mt-2">
                        <span class="icon text-green-50"><i class="fas fa-coffee"></i></span>
                        <span class="text p-1">Istirahat</span>
                    </a>
                    <a href="#" onclick="clearColors()" class="btn btn-outline-danger btn-sm btn-icon-split mt-2">
                        <span class="icon text-red-50"><i class="fas fa-trash-alt"></i></span>
                        <span class="text p-1">Clear</span>
                    </a>
                    <a href="../" class="btn btn-outline-warning btn-sm btn-icon-split mt-2">
                        <span class="icon text-yellow-50"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="text p-1">Keluar</span>
                    </a>
                </div>

                <!-- Modal -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span onclick="closeModal()" style="cursor: pointer; float: right;">&times;</span>
                        <p>Waktunya Istirahat!</p>
                    </div>
                </div>
                <div id="overlay" class="overlay"></div>
            </div>
            <div class="col-md-8 m-0">
                <div class="col justify-content-center d-flex">
                    <ul>
                        <?php
                        $count = 0;
                        foreach ($numbers as $number) :
                        ?>
                            <li class="number" onclick="showNumber(<?= $number; ?>); changeColor(<?= $number; ?>);" id="number<?= $number; ?>"><?= $number; ?></li>
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
</div>
<?= $this->endSection(); ?>