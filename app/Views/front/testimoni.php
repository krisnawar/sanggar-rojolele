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

    <section id="testimonials" class="testimonials">
        <div class="container">

            <div class="row">

                <?php foreach ($testimonis as $testimoni) : ?>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="testimonial-item">
                            <img src="<?= $testimoni['photo'] ?>" class="testimonial-img" alt="Foto <?= $testimoni['name'] ?>">
                            <h3><?= $testimoni['name'] ?></h3>
                            <h4><?= $testimoni['title'] ?></h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                <?= $testimoni['testimonial'] ?>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <div style="display: inline-block; text-align: right; width: 100%">
                                <p class="float-right">
                                    <?php
                                    $date = new DateTime($testimoni['timestamp']);
                                    echo $date->format('j F Y');
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <!-- 
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-item mt-4 mt-lg-0">
                        <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-item mt-4">
                        <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-item mt-4">
                        <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="testimonial-item mt-4">
                        <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="testimonial-item mt-4">
                        <img src="assets/img/testimonials/testimonials-6.jpg" class="testimonial-img" alt="">
                        <h3>Emily Harison</h3>
                        <h4>Store Owner</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Eius ipsam praesentium dolor quaerat inventore rerum odio. Quos laudantium adipisci eius. Accusamus qui iste cupiditate sed temporibus est aspernatur. Sequi officiis ea et quia quidem.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div> -->

            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main>

<?= $this->endSection(); ?>