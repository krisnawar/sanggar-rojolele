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

    <!-- ======= Contact Section ======= -->
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

</main>

<?= $this->endSection(); ?>