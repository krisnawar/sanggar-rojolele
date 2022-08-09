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
    <section id="blog" class="blog" style="background: #f3f1f0;">
        <div class="container">

            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <?php if (!isset($listVid->items)) : ?>
                                <h6>Maaf, layanan API Youtube sedang tidak dapat diakses</h6>
                                <small class="my-auto">Silahkan menuju kanal youtube <a target="_blank" href="https://www.youtube.com/channel/UC2-9Y4ahfd_Ef3_0OQ8o1CQ"><?= $orgdata['org_name'] ?></a></small>
                            <?php else : ?>
                                <h6 class="card-title my-auto">Koleksi video di <a target="_blank" href="https://www.youtube.com/channel/UC2-9Y4ahfd_Ef3_0OQ8o1CQ">kanal Youtube <?= $orgdata['org_name'] ?></a></h6>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg entries">
                    <?php if (isset($listVid->items)) : ?>
                        <div class="row mt-2">
                            <?php foreach ($listVid->items as $vid) : ?>
                                <?php if ($vid->id->kind == "youtube#video") : ?>
                                    <div class="col-lg-4 my-3 d-flex align-items-stretch">
                                        <div class="card mx-2">
                                            <img src="<?= $vid->snippet->thumbnails->high->url ?>" class="rounded" alt="<?= $vid->snippet->title ?>">
                                            <div class="card-body">
                                                <a href="/video/view/<?= $vid->id->videoId ?>">
                                                    <h5 class="card-title mt-2"><?= $vid->snippet->title ?></h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                            <div class="blog-pagination">
                                <ul class="justify-content-center">
                                    <?php if (isset($prevPageToken)) : ?>
                                        <li class="page-item"><a href="/video?page=<?= $prevPageToken ?>">Previous</a></li>
                                    <?php endif ?>
                                    <?php if (isset($nextPageToken)) : ?>
                                        <li class="page-item"><a href="/video?page=<?= $nextPageToken ?>">Next</a></li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif ?>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main>

<?= $this->endSection(); ?>