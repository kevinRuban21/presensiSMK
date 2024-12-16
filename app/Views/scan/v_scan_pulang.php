
<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Presensi <?= $sekolah['nama_sekolah'] ?> | <?= $judul ?></title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?= base_url() ?>/logo2.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/responsive.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--====== jquery js ======-->
    <script src="<?= base_url('edubin') ?>/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url('edubin') ?>/js/vendor/jquery-1.12.4.min.js"></script>
  
  
</head>

<body>
    
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-10 pb-10 bg_cover" data-overlay="8" style="background-image: url(<?= base_url('edubin') ?>/images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2 class="text-center">SMK KASIH THERESIA</h2>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->
    
    <section id="contact-page" class="pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <div class="row">
                                <div class="col"><h5>Presensi Pulang</h5></div>
                            </div>
                        </div> <!-- section title -->
                        
                        <div class="main-form">
                        <?php
                            session();
                            $validasi = \Config\Services::validation(); 
                        ?>
                            <form id="presensi_form" action="#" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <input type="password" name="id_siswa" id="scan_pulang" placeholder="Scan disini">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" id="tmbl" class="main-btn">Kirim</button>
                                        </div> <!-- singel form -->
                                        <div id="berhasil"></div>
                                    </div> 
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                        
                    </div> <!--  contact from -->
                </div>
                <div class="col-lg-5">
                    <div class="contact-address mt-30">
                    <div class="section-title">
                        <h5>Presensi Terbaru</h5>
                        <ul id="presensibaru">
                        </ul>
                    </div> <!-- section title -->   
                    </div> <!-- contact address -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->
   
        
        <div class="footer-copyright pt-10 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15 text-light">
                        <strong>Copyright &copy; 2024 <a href="#" class="text-reset" style="color: #ffc600 !important;">SMK Kasih Theresia</a>.</strong> All rights reserved.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">
                        <p>versi 1.0.0</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->

    
    <script>
        $(document).ready(function() {
            setInterval(function(){
                presensi()
            }, 2000)
            $('#presensi_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('PresensiPulang/UpdateData') ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan:',
                                timer: 1000,
                                html: '<ul>' +
                                    $.map(response.errors, function(value, index) {
                                        return '<li>' + value + '</li>';
                                    }).join('') +
                                    '</ul>'
                            });
                            $('#presensi_form')[0].reset();
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil disimpan!',
                                timer: 1000,
                            });
                            $('#presensi_form')[0].reset();
                        }
                    }
                });
            });
            function checkForm() {
                let button = $('#tmbl');
                var isFormValid = true;
                $('#scan_pulang').each(function() {
                    if ($(this).val() === '') {
                        isFormValid = false;
                        return false;
                    }
                });

                if (isFormValid) {
                    button.click();
                }
            }
            $('#scan_pulang').on('input', checkForm);
        });

        function presensi(){
            $.ajax({
                url: '<?= base_url('PresensiPulang/PresensiBaru') ?>',
                type: 'GET',
                success: function(response) {
                    $("#presensibaru").html(response);
                }
            });
        }
    </script>
    
    
    <!--====== jquery js ======-->
    <script src="<?= base_url('edubin') ?>/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url('edubin') ?>/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?= base_url('edubin') ?>/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="<?= base_url('edubin') ?>/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="<?= base_url('edubin') ?>/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="<?= base_url('edubin') ?>/js/waypoints.min.js"></script>
    <script src="<?= base_url('edubin') ?>/js/jquery.counterup.min.js"></script>
    
    <!--====== Nice Select js ======-->
    <script src="<?= base_url('edubin') ?>/js/jquery.nice-select.min.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="<?= base_url('edubin') ?>/js/jquery.nice-number.min.js"></script>
    
    <!--====== Count Down js ======-->
    <script src="<?= base_url('edubin') ?>/js/jquery.countdown.min.js"></script>
    
    <!--====== Validator js ======-->
    <script src="<?= base_url('edubin') ?>/js/validator.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="<?= base_url('edubin') ?>/js/ajax-contact.js"></script>
    
    <!--====== Main js ======-->
    <script src="<?= base_url('edubin') ?>/js/main.js"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="<?= base_url('edubin') ?>/js/map-script.js"></script>

</body>
</html>
