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
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg entries">

                    <?php foreach ($album as $ab) : ?>
                        <article class="entry">

                            <h2 class="entry-title">
                                <a href="/foto/viewalbum/<?= $ab['title_slug'] ?>"><?= $ab['title'] ?></a>
                            </h2>

                            <div class="entry-content">
                                <p>
                                    <?= substr(strip_tags($ab['description']), 0, 300) ?> [...]
                                </p>
                                <div class="read-more">
                                    <a href="/foto/viewalbum/<?= $ab['title_slug'] ?>">Buka Album</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    <?php endforeach ?>

                    <div class="blog-pagination mb-3">
                        <ul class="justify-content-center">
                            <?= $pager->links() ?>
                        </ul>
                    </div>

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main>

<?= $this->endSection(); ?>