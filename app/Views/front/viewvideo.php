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
                    <?php if (!isset($infoVid->id)) : ?>
                        <div class="card">
                            <div class="card-body">
                                <h6>Maaf, layanan API Youtube sedang tidak dapat diakses</h6>
                                <small class="my-auto">Silahkan menuju kanal youtube <a target="_blank" href="https://www.youtube.com/channel/UC2-9Y4ahfd_Ef3_0OQ8o1CQ"><?= $orgdata['org_name'] ?></a></small>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg entries">
                    <?php if (isset($infoVid->id)) : ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="my-auto"><?= $infoVid->snippet->title ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 my-3">
                                <div class="iframe-container text-center">
                                    <iframe class="responsive-iframe" width="933" height="525" src="https://www.youtube.com/embed/<?= $infoVid->id ?>" title="<?= $infoVid->snippet->title ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="row my-3">
                                    <div class="col-lg">

                                        <div class="card">
                                            <div class="card-body">
                                                <p><?= $infoVid->snippet->description ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                    <?php endif ?>
                </div>

                <!-- <div class="col-lg entries">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="my-auto">Ini Judul</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10 my-3">
                            <div class="iframe-container text-center">
                                <iframe class="responsive-iframe" width="933" height="525" src="https://www.youtube.com/embed/kmApL-_StuY" title="EDUKASI PERTANIAN DELANGGU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="row my-3">
                                <div class="col-lg">

                                    <div class="card">
                                        <div class="card-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget lectus augue. Cras vitae sodales ex, eu volutpat ex. Aliquam rhoncus id nulla vel vulputate. Phasellus pulvinar tincidunt sapien, nec pellentesque augue ullamcorper non. Integer orci nunc, ullamcorper vel nunc in, bibendum commodo est. Donec hendrerit imperdiet finibus. Pellentesque pharetra tristique nisl quis iaculis. Nullam molestie velit vitae nulla euismod, et blandit sapien laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer vitae volutpat nibh. Nulla vehicula tortor non velit tincidunt, a efficitur nisi malesuada. Nullam placerat pulvinar nisi non pellentesque. Sed pellentesque nulla ac felis molestie molestie. Donec euismod sem vitae ipsum luctus blandit. Phasellus iaculis sem sit amet porta consequat. In a arcu ut dui maximus porta eu quis quam.

                                                Sed sed risus scelerisque, maximus metus quis, pulvinar elit. Aenean ut nisi facilisis, dictum purus quis, mollis mi. Nullam sit amet eros a mauris sagittis luctus. Proin elementum nunc arcu, nec dictum leo consequat euismod. Vivamus tempor eleifend nulla et tempor. Maecenas in tellus varius, semper massa vitae, rutrum mi. Curabitur tincidunt laoreet nisl non facilisis. Duis id bibendum nulla. Maecenas ullamcorper erat ante, ac congue lectus fringilla eu. Maecenas eu commodo velit. Etiam ullamcorper aliquet auctor. In et augue ultrices, dictum nunc quis, aliquam augue. Vivamus interdum tortor odio, a laoreet eros scelerisque in. Nam egestas commodo turpis sit amet viverra. Duis hendrerit libero augue, eget varius leo egestas at.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div> -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main>

<?= $this->endSection(); ?>