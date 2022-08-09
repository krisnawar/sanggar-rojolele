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

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog" style="background: #f3f1f0;">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h4>Foto-foto album <?= $album['title'] ?></h4>
                            <?= $album['description'] ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">

                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($photos as $photo) : ?>
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-web mb-4">

                                        <!-- <div class="portfolio-info"> -->
                                        <!-- <h4>Web 3</h4> -->
                                        <!-- <p>Web</p> -->
                                        <a href="<?= $photo['path'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $photo['alt'] ?>"><img src="<?= $photo['path'] ?>" class="img-fluid" alt="<?= $photo['alt'] ?>"></a>
                                        <!-- </div> -->
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->

</main>

<?= $this->endSection(); ?>