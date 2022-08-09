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

                <div class="col-lg-8 entries">

                    <?php foreach ($articles as $article) : ?>
                        <article class="entry">

                            <div class="entry-img">
                                <img src="<?= $article['header_img'] ?>" alt="<?= $article['title'] ?>" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="/artikel/read/<?= $article['article_slug'] ?>"><?= $article['title'] ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <!-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li> -->
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <?php
                                        $date = new DateTime($article['timestamp']);
                                        echo $date->format('j F Y');
                                        ?>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i><?= $article['clicked_count'] ?> kali</li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    <?= substr(strip_tags($article['content']), 0, 300) ?> [...]
                                </p>
                                <div class="read-more">
                                    <a href="/artikel/read/<?= $article['article_slug'] ?>">Selengkapnya</a>
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

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Kategori</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <?php foreach ($categories as $cat) : ?>
                                    <li><i class="bx bx-chevron-right"></i> <a href="/artikel/viewcategory/<?= $cat['slug'] ?>"><?= $cat['category'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Artikel terbaru</h3>
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

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main>

<?= $this->endSection(); ?>