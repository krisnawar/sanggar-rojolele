<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        <?php
        if (isset($subtitle)) {
            echo $subtitle . " - ";
        }
        ?>
        <?= $title ?>
    </title>
    <meta content="<?= isset($description) ? $description : '' ?>" name="description">
    <meta content="<?= isset($keywords) ? $keywords : '' ?>" name="keywords">
    <meta content="<?= isset($image) ? $image : '' ?>" name="image">

    <!-- Favicons -->
    <link href="<?= $orgdata['web_icon'] ?>" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/vendor/glider/css/glider.min.css" rel="stylesheet">
    <?php if (isset($uriinfo[1]) && $uriinfo[1] == 'viewalbum') : ?>
        <!-- Dropzone.js -->
        <link rel="stylesheet" href="/assets/admin/plugins/dropzone/min/dropzone.min.css">
        <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="/assets/admin/plugins/ekko-lightbox/ekko-lightbox.css">
    <?php endif ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/admin/plugins/fontawesome-free/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Flattern - v4.7.0
  * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?= $orgdata['email'] ?>"><?= $orgdata['email'] ?></a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span><?= substr_replace(substr_replace(substr_replace($orgdata['phone_number'], "+62 ", 0, 1), "-", 7, 0), "-", "12", 0); ?></span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="<?= $orgdata['facebook'] ?>" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?= $orgdata['instagram'] ?>" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/beranda"><img src="<?= $orgdata['org_logo'] ?>" alt="Logo Sanggar Rojolele" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a <?= (!isset($uriinfo[0]) || (isset($uriinfo[0]) && $uriinfo[0] == 'beranda')) ? 'class="active"' : ''  ?>href="/beranda">Beranda</a></li>
                    <li><a <?= (isset($uriinfo[0]) && $uriinfo[0] == 'fmsm') ? 'class="active"' : ''  ?>href="/fmsm">Festival Mbok Sri Mulih</a></li>
                    <li><a <?= (isset($uriinfo[0]) && $uriinfo[0] == 'tentang') ? 'class="active"' : ''  ?>href="/tentang">Tentang Kami</a></li>
                    <li><a <?= (isset($uriinfo[0]) && $uriinfo[0] == 'testimoni') ? 'class="active"' : ''  ?>href="/testimoni">Testimonial</a></li>
                    <li><a <?= (isset($uriinfo[0]) && $uriinfo[0] == 'artikel') ? 'class="active"' : ''  ?>href="/artikel">Artikel</a></li>
                    <li class="dropdown"><a <?= (isset($uriinfo[0]) && ($uriinfo[0] == 'video' || $uriinfo[0] == 'foto')) ? 'class="active"' : ''  ?> href="/#"><span>Media/Gallery</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/foto">Album Foto</a></li>
                            <li><a href="/video">Video</a></li>
                        </ul>
                    </li>
                    <!-- <li><a <?= (isset($uriinfo[0]) && $uriinfo[0] == 'kontak') ? 'class="active"' : ''  ?>href="/kontak">Kontak</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Focus Section ======= -->
    <!-- ======= Content Wrapper ======= -->
    <div class="content-wrapper">
        <?= $this->renderSection('content-wrapper') ?>
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-6 footer-contact">
                        <h3><?= $orgdata['org_name'] ?></h3>
                        <p>
                            <?= $orgdata['address'] ?>
                            <br><br>
                            <strong>Phone:</strong>&nbsp<?= substr_replace(substr_replace(substr_replace($orgdata['phone_number'], "+62 ", 0, 1), "-", 7, 0), "-", "12", 0); ?><br>
                            <strong>Email:</strong>&nbsp<?= $orgdata['email'] ?><br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Menu Utama</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/beranda">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/fmsm">Festival Mbok Sri Mulih</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/tentang">Tentang kami</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/testimoni">Testimonial</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/artikel">Artikel kami</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Kategori artikel</h4>
                        <ul>
                            <?php foreach ($categories as $category) : ?>
                                <li><i class="bx bx-chevron-right"></i> <a href="/artikel/viewcategory/<?= $category['slug'] ?>"><?= $category['category'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span><?= $orgdata['org_name'] ?></span></strong>. Developed with &#10084; by <strong><span>Krisna WAR</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <!-- <a href="#" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a> -->
                <a href="<?= $orgdata['facebook'] ?>" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?= $orgdata['instagram'] ?>" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="<?= 'https://wa.me/' . $orgdata['whatsapp'] ?>" target="_blank" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                <!-- <a href="#" target="_blank" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/glider/js/glider.min.js"></script>
    <?php if (isset($uriinfo[1]) && $uriinfo[1] == 'viewalbum') : ?>
        <!-- Dropzone -->
        <script src="/assets/admin/plugins/dropzone/min/dropzone.min.js"></script>
        <!-- Ekko Lightbox -->
        <script src="/assets/admin/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <?php endif; ?>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>