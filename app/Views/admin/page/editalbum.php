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
            <div class="col">
                <form action="/admin/album/update/<?= $uriinfo[3] ?>" method="post">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="judul">Judul Album</label>
                                                <input required type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul album" value="<?= $album['title'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi album</label>
                                                <br>
                                                <small>Jelaskan deskripsi abum sesingkat mungkin.</small>
                                                <textarea required name="deskripsi" id="summernote"><?= $album['description'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col text-center">
                                            <input style="margin-right: 20px;" type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                            <a class="btn btn-danger" href="/admin/album" role="button">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>