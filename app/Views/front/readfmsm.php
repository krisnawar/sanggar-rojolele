<?= $this->extend('layout/template') ?>

<?= $this->section('content-wrapper'); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $judul_navbar ?></h2>
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

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="<?= $article['header_img'] ?>" alt="<?= $article['title'] ?>" class="img-fluid">
                        </div>

                        <h1 class="entry-title">
                            <?= $article['title'] ?>
                        </h1>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i><?= $article['username'] ?></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time><?php
                                                                                                        $date = new DateTime($article['timestamp']);
                                                                                                        echo $date->format('j F Y');
                                                                                                        ?></time></li>
                                <li class="d-flex align-items-center"><i class="bi bi-eye"></i></i><?= $article['clicked_count'] . ' kali' ?></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <?= $article['content'] ?>
                        </div>

                        <div class="entry-footer">
                            <i class="bi bi-tag"></i>
                            <ul class="cats">
                                <li><a href="/artikel/viewcategory/<?= $article['slug'] ?>"><?= $article['category'] ?></a></li>
                                <br>
                                <li>Terakhir disunting: <time><?php
                                                                $date = new DateTime($article['last_edit']);
                                                                echo $date->format('j F Y H:i');
                                                                ?></time></li>
                            </ul>
                            <hr>
                            <span style="font-size: 0.875rem;">Share artikel ini:&nbsp</span>
                            <?php
                            $url = current_url();
                            $str_whatsapp = "Baca artikel berikut.\n" . $article['title'] . "\n" . $url;
                            ?>
                            <a href="https://wa.me/?text=<?= rawurlencode($str_whatsapp) ?>" target="_blank"><span class="badge bg-dark rounded-pill"><i class="bi bi-whatsapp text-white"></i></span></a>
                            <a href="http://www.facebook.com/sharer.php?u=<?= $url ?>" target="_blank"><span class="badge bg-primary rounded-pill"><i class="bi bi-facebook text-white"></i></span></a>
                            <a href="https://twitter.com/share?url=<?= $url ?>&amp;text=<?= rawurlencode($article['title'] . "\n") ?>&amp;hashtags=sanggarrojolele" target="_blank"><span class="badge bg-primary rounded-pill"><i class="bi bi-twitter text-white"></i></span></a>
                        </div>

                    </article>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Artikel Festival Mbok Sri Mulih lainnya</h3>
                        <div class="sidebar-item recent-posts">
                            <?php foreach ($articles_recent as $ar) : ?>
                                <div class="post-item clearfix">
                                    <img src="<?= $ar['header_img'] ?>" alt="<?= $ar['title'] ?>">
                                    <h4><a href="/artikel/read/<?= $ar['article_slug'] ?>"><?= $ar['title'] ?></a></h4>
                                    <time><?php
                                            $date = new DateTime($ar['timestamp']);
                                            echo $date->format('j M Y');
                                            ?></time>
                                </div>
                            <?php endforeach ?>

                        </div><!-- End sidebar recent posts-->

                    </div>

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

</main>

<?= $this->endSection(); ?>