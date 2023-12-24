<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title; ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>../../logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/css/antrian.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="<?= base_url(); ?>../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= base_url(); ?>../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url(); ?>../../assets/js/config.js"></script>
</head>

<style>
    body,
    html {
        height: 100%;
        margin: 0;
        /* overflow: hidden; */
    }

    /* Konten Halaman Penuh */
    #page-content {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    li {
        width: 60px;
        height: 60px;
        overflow: visible;
        border: 1px solid gray;
        display: flex;
        color: black;
        background-color: white;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        cursor: pointer;
        margin-top: 10px;
        font-weight: bold;
    }

    .result {
        font-size: 100px;
    }

    .number-show {
        background-color: #f8f8f8;
        transform: scale(10.0);
        transition: background-color 1.5s ease, transform 1.5s ease;
        position: fixed;
        top: 50%;
        left: 50%;
        font-size: 40px;
        z-index: 1000;
    }

    .color {
        width: 50px;
        height: 50px;
        margin: 3px;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 8px;
        display: inline-block;
    }

    .resultColor {
        font-size: 40px;
        font-weight: bold;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        backdrop-filter: blur(5px);
    }

    #bg-header {
        background-color: #FFC5C5;
    }

    #bg-number {
        background-color: #1F1717;
    }

    #result-border {
        border: 5px solid #FFEBD8;
        border-radius: 20px;
        height: 50%;
        justify-content: center;
        align-items: center;
        text-align: center;
        display: flex;
        flex-direction: column;
    }

    #bg-kim {
        height: 100%;
    }

    marquee {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        box-sizing: border-box;
        margin: 0;
        padding: 10px;
        margin-top: 20px;
        color: #fff;
        background-color: #1F1717;
        font-size: 36px;
        border-radius: 20px;
    }
</style>

<body>
    <!-- Content -->
    <?= $this->renderSection('page-content'); ?>
    <!-- / Content -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?= base_url(); ?>../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url(); ?>../../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url(); ?>../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url(); ?>../../assets/js/pages-auth.js"></script>

    <script>
        function showNumber(number) {
            var resultDiv = document.getElementById('result');
            var colorDiv = document.getElementById('resultColor');
            colorDiv.innerHTML === '' ? resultDiv.innerHTML = '' :
                resultDiv.innerHTML = number
        }

        var selectedColor = '';
        var defaultStyles = {};

        function setColor(color) {
            selectedColor = color;
            var colorDiv = document.getElementById('resultColor');
            var colorDiv1 = document.getElementById('resultColor1');
            var resultDiv = document.getElementById('result');
            var numberDiv = document.getElementById('result');
            var numberDivs = document.querySelectorAll('.number');
            switch (selectedColor) {
                case 'red':
                    colorDiv.innerHTML = 'KUPON MERAH';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON MERAH';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = '';
                        div.style.color = '';
                        div.style.borderColor = '';
                        numberDiv.innerHTML = '';
                    });
                    break;
                case 'blue':
                    colorDiv.innerHTML = 'KUPON BIRU';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON BIRU';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = '';
                        div.style.color = '';
                        div.style.borderColor = '';
                        numberDiv.innerHTML = '';
                    });
                    break;
                case 'green':
                    colorDiv.innerHTML = 'KUPON HIJAU';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON HIJAU';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = '';
                        div.style.color = '';
                        div.style.borderColor = '';
                        numberDiv.innerHTML = '';
                    });
                    break;
                case 'yellow':
                    colorDiv.innerHTML = 'KUPON KUNING';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON KUNING';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = '';
                        div.style.color = '';
                        div.style.borderColor = '';
                        numberDiv.innerHTML = '';
                    });
                    break;
                case 'white':
                    colorDiv.innerHTML = 'KUPON PUTIH';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON PUTIH';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = '';
                        div.style.color = '';
                        div.style.borderColor = '';
                        numberDiv.innerHTML = '';
                    });
                    break;
                default:
                    break;
            }
        }

        function toggleColor(number) {
            var numberDiv = document.getElementById('number' + number);
            var overlay = document.getElementById('overlay');
            var resultDiv = document.getElementById('result');

            if (!defaultStyles[number]) {
                defaultStyles[number] = {
                    backgroundColor: numberDiv.style.backgroundColor,
                    transform: window.getComputedStyle(numberDiv).transform,
                };
            }

            var isColorChanged = numberDiv.style.backgroundColor !== defaultStyles[number].backgroundColor;
            console.log(numberDiv.style.backgroundColor);
            console.log(defaultStyles[number].backgroundColor);
            console.log(isColorChanged);

            if (selectedColor !== '') {
                if (isColorChanged) {
                    numberDiv.style.backgroundColor = defaultStyles[number].backgroundColor;
                    numberDiv.style.borderColor = defaultStyles[number].backgroundColor;
                    resultDiv.innerHTML = '';
                } else {
                    numberDiv.style.backgroundColor = selectedColor;
                    numberDiv.style.borderColor = selectedColor;
                    numberDiv.classList.add('number-show');

                    overlay.style.display = 'block';

                    setTimeout(function() {
                        numberDiv.classList.remove('number-show');
                        overlay.style.display = 'none';
                    }, 5000);
                }
            }
        }

        function clearColors() {
            var colorDiv = document.getElementById('resultColor');
            var numberDiv = document.getElementById('result');
            var numberDivs = document.querySelectorAll('.number');
            var resultDiv = document.getElementById('result');
            numberDivs.forEach(function(div) {
                div.style.backgroundColor = '';
                div.style.color = '';
                div.style.borderColor = '';
                numberDiv.innerHTML = '';
                colorDiv.innerHTML = '';
                colorDiv.innerHTML === '' ? resultDiv.innerHTML = '' : resultDiv.innerHTML = number
            });
        }

        function openModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'flex';
        }

        function closeModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none';
        }
    </script>
</body>

</html>