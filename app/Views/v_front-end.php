
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
  
  
</head>

<body>
   
   
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">        
        <div class="navigation navigation-2 navigation-3">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-11 col-md-10 col-sm-9 col-9">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index-4.html">
                                <img src="<?= base_url() ?>/logo2.png" alt="Logo" width="90">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>" class="active">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('PresensiMasuk') ?>" class="">Presensi Masuk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('PresensiPulang') ?>" class="">Presensi Pulang</a>
                                    </li>
                                    <div class="button pt-4">
                                        <a href="<?= base_url('Dashboard') ?>" class="main-btn">Dashboard</a>
                                    </div>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
   
    <!--====== SLIDER PART START ======-->
    
    <section id="slider-part-3" class="bg_cover"  style="background-image: url(<?= base_url('baner') ?>/b1.jpeg); height: 100vh !important">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="slider-cont">
                        <h3 data-animation="fadeInUp" data-delay="1.3s" class="text-white">Selamat Datang di Sistem Presensi</h3>
                        <h1 data-animation="bounceInLeft" data-delay="1s"><?= $sekolah['nama_sekolah'] ?></h1>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
    
    
   
    <!--====== BACK TO TP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->
   
    
    
    
    
    
    
    
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
