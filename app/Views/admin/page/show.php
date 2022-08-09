<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content'); ?>

<!-- Content Header (Page header) -->

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php
        if (session()->getFlashdata('type') && session()->getFlashdata('msg')) {
        ?>
            <div class="alert alert-<?= session()->getFlashdata('type') ?> alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('msg') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Foto pada album <strong><?= $album['title'] ?></strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($photos as $photo) : ?>
                                <div class="col-sm-2 my-auto">
                                    <a href="<?= $photo['path'] ?>" data-toggle="lightbox" data-title="Foto <?php ltrim($photo['path'], '/assets/img/album/' . $album['id'] . '/') ?>" data-gallery="gallery">
                                        <img src="<?= $photo['path'] ?>" class="img-fluid mb-2 rounded" alt="<?= $photo['alt'] ?>" />
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>