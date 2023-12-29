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
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/css/kim.css" />

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

<body>
    <!-- Content -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <?= $this->renderSection('page-content'); ?>
                </div>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
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
        $(document).ready(function() {
            $('#bennerkonsumen').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000, // Adjust the speed as needed
                dots: true // Show navigation dots
            });
        });

        var selectedAturan = '';

        function aturanmain(aturan) {
            selectedAturan = aturan;
            var resultAturan = document.getElementById('resultAturan');
            var colorDiv = document.getElementById('resultColor');

            switch (selectedAturan) {
                case 'aturan1':
                    resultAturan.innerHTML = '1 BARIS (5 ANGKA)';
                    break;

                case 'aturan2':
                    resultAturan.innerHTML = '2 BARIS (10 ANGKA) BEBAS';
                    break;

                case 'aturan3':
                    resultAturan.innerHTML = '2 BARIS (10 ANGKA) 1 KOLOM';
                    break;

                case 'aturan4':
                    resultAturan.innerHTML = '3 BARIS (15 ANGKA) BEBAS';
                    break;

                case 'aturan5':
                    resultAturan.innerHTML = '1 KOLOM + 1 BARIS (15 ANGKA)';
                    break;

                case 'aturan6':
                    resultAturan.innerHTML = '4 BARIS (20 ANGKA) BEBAS';
                    break;

                case 'aturan7':
                    resultAturan.innerHTML = '2 KOLOM (20 ANGKA)';
                    break;

                case 'aturan8':
                    resultAturan.innerHTML = '3 KOLOM FULL (30 ANGKA)';
                    break;

                default:
                    break;
            }

        }

        function updateDateTime() {
            // Get current date and time
            var currentDate = new Date();
            var day1 = currentDate.toLocaleString('default', {
                weekday: 'long'
            }); // Full day of the week
            var day = currentDate.getDate();
            var month = currentDate.toLocaleString('default', {
                month: 'long'
            }); // Months are zero-based
            var year = currentDate.getFullYear();
            var hours = currentDate.getHours();
            var minutes = currentDate.getMinutes();
            var seconds = currentDate.getSeconds();

            // Format the date and time
            var formattedDate = day1 + ', ' + (day < 10 ? '0' + day : day) + ' ' + (month < 10 ? '0' + month : month) + ' ' + year;
            var formattedTime = (hours < 10 ? '0' + hours : hours) + ':' + (minutes < 10 ? '0' + minutes : minutes) + ':' + (seconds < 10 ? '0' + seconds : seconds);

            // Update the HTML elements with the formatted date and time
            document.getElementById('datetime-container1').innerHTML = '<i class="far fa-clock"></i> ' + formattedTime + ' WIB' + ' <i class="far fa-calendar"></i> ' + formattedDate;
        }

        // Update date and time initially and set an interval to update every second
        updateDateTime();
        setInterval(updateDateTime, 1000);

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
            var numberDivs = document.querySelectorAll('.number');

            switch (selectedColor) {
                case 'red':
                    colorDiv.innerHTML = 'KUPON MERAH';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON MERAH';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = selectedColor;
                        div.style.color = '';
                        div.style.borderColor = 'gray';
                        resultDiv.innerHTML = '';
                    });
                    break;
                case 'blue':
                    colorDiv.innerHTML = 'KUPON BIRU';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON BIRU';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = selectedColor;
                        div.style.color = 'white';
                        div.style.borderColor = 'gray';
                        resultDiv.innerHTML = '';
                    });
                    break;
                case 'green':
                    colorDiv.innerHTML = 'KUPON HIJAU';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON HIJAU';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = selectedColor;
                        div.style.color = 'white';
                        div.style.borderColor = 'gray';
                        resultDiv.innerHTML = '';
                    });
                    break;
                case 'yellow':
                    colorDiv.innerHTML = 'KUPON KUNING';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON KUNING';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = selectedColor;
                        div.style.color = '';
                        div.style.borderColor = 'gray';
                        resultDiv.innerHTML = '';
                    });
                    break;
                case 'white':
                    colorDiv.innerHTML = 'KUPON PUTIH';
                    colorDiv.style.color = selectedColor;
                    colorDiv1.innerHTML = 'KUPON PUTIH';
                    colorDiv1.style.color = selectedColor;
                    resultDiv.style.color = selectedColor;
                    numberDivs.forEach(function(div) {
                        div.style.backgroundColor = selectedColor;
                        div.style.color = '';
                        div.style.borderColor = 'gray';
                        resultDiv.innerHTML = '';
                    });
                    break;
                default:
                    break;
            }
        }

        function toggleColor(number) {
            var numberDiv = document.getElementById('number' + number);

            if (selectedColor !== '') {
                switch (selectedColor) {
                    case 'red':
                        numberDiv.style.backgroundColor = 'white';
                        numberDiv.style.borderColor = selectedColor;
                        numberDiv.style.color = '';
                        break;
                    case 'blue':
                        numberDiv.style.backgroundColor = 'white';
                        numberDiv.style.borderColor = selectedColor;
                        numberDiv.style.color = '';
                        break;
                    case 'green':
                        numberDiv.style.backgroundColor = 'white';
                        numberDiv.style.borderColor = selectedColor;
                        numberDiv.style.color = '';
                        break;
                    case 'yellow':
                        numberDiv.style.backgroundColor = 'red';
                        numberDiv.style.borderColor = selectedColor;
                        numberDiv.style.color = '';
                        break;
                    case 'white':
                        numberDiv.style.backgroundColor = 'red';
                        numberDiv.style.borderColor = selectedColor;
                        numberDiv.style.color = '';
                        break;
                    default:
                        break;
                }
                numberDiv.classList.add('number-show');

                var overlay = document.getElementById('overlay');
                overlay.style.display = 'block';

                setTimeout(function() {
                    numberDiv.classList.remove('number-show');
                    overlay.style.display = 'none';
                }, 2000);
            }
        }

        function resetColor(number) {
            var numberDiv = document.getElementById('number' + number);
            numberDiv.style.backgroundColor = '';
            numberDiv.style.borderColor = '';
            var resultDiv = document.getElementById('result');
            resultDiv.innerHTML = '';
            event.preventDefault(); // Menghentikan default action dari event (mematikan konteks menu)
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