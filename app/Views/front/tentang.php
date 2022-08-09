<?= $this->extend('layout/template') ?>

<?= $this->section('content-wrapper'); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $subtitle ?></h2>
                <ol>
                    <?php
                    $countEl = array_keys($breadcrumbs);
                    $last = end($countEl);
                    foreach ($breadcrumbs as $key => $bc) :
                        if ($key == $last) {
                            echo '<li class="breadcrumb-item active">' . $bc . '</li>';
                        } else {
                            echo '<li class="breadcrumb-item">' . $bc . '</li>';
                        }
                    ?>

                    <?php endforeach ?>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container">

            <div class="row no-gutters">
                <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" style="background: url('<?= $orgdata['about_img'] ?>') center center no-repeat;" data-aos="fade-right"></div>
                <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
                    <div class="content d-flex flex-column justify-content-center">
                        <div class="container">
                            <h3 data-aos="fade-up"><?= $orgdata['org_name'] ?></h3>
                        </div>
                        <div class="container">
                            <p data-aos="fade-up">
                                <?= $orgdata['about'] ?>
                            </p>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2><strong>Tim</strong> Kami</h2>
                <p>Untuk mencapai predikat sebagai organisasi yang hebat, maka dibutuhkan pula tim dengan orang-orang hebat di dalamnya.</p>
            </div>

            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="row">

                        <?php foreach ($teams as $team) : ?>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mx-auto">
                                <div class="member" data-aos="fade-up">
                                    <div class="member-img">
                                        <img src="<?= $team['path'] ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4><?= $team['name'] ?></h4>
                                        <span><?= $team['title'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
                <div class="col-lg-1"></div>

            </div>

        </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2><strong>Mitra</strong> Kami</h2>
                <p><strong><?= $orgdata['org_name'] ?></strong> senantiasa menjalin hubungan kerjasama dengan mitra-mitra terbaik. Harapan kedepannya adalah terwujudnya sebuah sistem kerjasama yang amanah dan saling menguntungkan serta menguatkan.</p>
            </div>

            <div class="row">
                <div class="col-lg text-center">
                    <div class="row no-gutters clearfix" data-aos="fade-up">

                        <?php foreach ($mitras as $mitra) : ?>
                            <div class="col-lg-3 col-md-4 col-xs-6 mx-auto">
                                <div class="client-logo">
                                    <img src="<?= $mitra['mitra_logo'] ?>" class="img-fluid" alt="<?= $mitra['name'] ?>" title="<?= $mitra['name'] ?>">
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Our Clients Section -->

    <section class="map">
        <div class="map-section">
            <style type="text/css" media="screen">
                iframe {
                    width: 100%;
                    height: 70vh;
                    border: 0;
                }
            </style>
            <?= html_entity_decode($orgdata['maps']) ?>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-10">

                    <div class="info-wrap">
                        <div class="row">
                            <div class="col-lg-4 info">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat:</h4>
                                <p><?= $orgdata['address'] ?></p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p><?= $orgdata['email'] ?><br><?= $orgdata['alt_email'] ?></p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p><?= substr_replace(substr_replace(substr_replace($orgdata['phone_number'], "+62 ", 0, 1), "-", 7, 0), "-", "12", 0); ?><br><a target="_blank" href="https://wa.me/<?= $orgdata['whatsapp'] ?>">Whatsapp kami</a></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>