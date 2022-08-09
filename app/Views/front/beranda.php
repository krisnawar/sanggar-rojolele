<?= $this->extend('layout/template') ?>

<?= $this->section('content-wrapper'); ?>

<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner" role="listbox">

            <?php
            $firstActive = true;
            foreach ($banners as $banner) :
                if ($firstActive) {
                    echo '<div class="carousel-item active" style="background-image: url(' . $banner['path'] . ');">';
                    $firstActive = false;
                } else {
                    echo '<div class="carousel-item" style="background-image: url(' . $banner['path'] . ');">';
                }
            ?>

                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2><?= $banner['title'] ?></h2>
                        <p><?= $banner['description'] ?></p>
                        <!-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> -->
                    </div>
                </div>
        </div>
    <?php
            endforeach;
    ?>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
    </a>

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="row">
                <div class="col-lg text-center text-lg-left">
                    <h3>Artikel terbaru pilihan <strong><span><?= $orgdata['org_name'] ?></span></strong>!</h3>
                    <p>Berikut 5 artikel pilihan dengan kunjungan terbanyak pada laman artikel <strong><?= $orgdata['org_name'] ?></strong></p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg">
                    <div class="glider-contain multiple">
                        <button class="glider-prev"><i class="fa fa-chevron-left"></i></button>
                        <div class="glider">

                            <?php foreach ($articles as $article) : ?>
                                <div class="card mx-2">
                                    <img src="<?= $article['header_img'] ?>" class="glider-inner-img rounded" alt="<?= $article['title'] ?>">
                                    <div class="card-body">
                                        <p class="card-text inner-article"><?= $article['category'] ?></p>
                                        <a href="/artikel/read/<?= $article['article_slug'] ?>">
                                            <h5 class="card-title mt-2"><?= $article['title'] ?></h5>
                                        </a>
                                        <p class="card-text inner-article">Oleh : <?= $article['username'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <button class="glider-next"><i class="fa fa-chevron-right"></i></button>
                        <div id="dots" class="glider-dots mt-4"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3>Ingin membaca artikel <strong><span><?= $orgdata['org_name'] ?></span></strong> lainnya?</h3>
                    <p>Silahkan mengunjungi menu artikel kami, atau klik tombol <span>Lihat Artikel</span> disamping.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="/artikel">Lihat Artikel</a>
                </div>
            </div>
        </div>
    </section><!-- End Cta Section -->

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
                        <div class="container d-flex">
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

</main><!-- End #main -->

<?= $this->endSection(); ?>