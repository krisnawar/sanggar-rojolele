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
                <form action="/admin/artikel/update/<?= $uriinfo[3] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="judul">Judul Artikel</label>
                                                <input required type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul artikel" value="<?= $article['title'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="konten">Konten/Isi</label>
                                                <textarea required name="konten" id="summernote"><?= $article['content'] ?></textarea>
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
                                            <a class="btn btn-danger" href="/admin/artikel" role="button">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <b>Kategori Artikel</b><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="selectcategory" id="sc1" value="choose" <?php echo $article['category'] ? 'checked' : '' ?> onchange="document.getElementById('choosecat').style.display = 'block'; document.getElementById('addcat').style.display = 'none'">
                                                <label class="form-check-label" for="sc1">Pilih</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="selectcategory" id="sc2" value="add" onchange="document.getElementById('addcat').style.display = 'block'; document.getElementById('choosecat').style.display = 'none'">
                                                <label class="form-check-label" for="sc2">Tambah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col">
                                            <!-- <input type="text" class="form-control" name="categorychosen" id="choosecat" placeholder="Pilih kategori yang tersedia" style="display: none;"> -->
                                            <select class="form-control" name="categorychosen" id="choosecat" <?php echo $article['category'] ? 'style="display: block;"' : 'style="display: none;"' ?>>
                                                <option value="" selected disabled hidden>Pilih Kategori</option>
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?= $category['id'] ?>" <?php echo ($article['category'] == $category['id']) ? 'selected' : '' ?>><?= $category['category'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="text" class="form-control" name="newcategory" id="addcat" placeholder="Masukkan kategori" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="foto_headline">Foto Headline</label>
                                            <input style="font-size: 0.875rem;" type="file" accept="image/*" name="foto_headline" id="foto_headline" class="form-control" onchange="document.getElementById('hasil_gambar').src = window.URL.createObjectURL(this.files[0])">
                                            <small>Size gambar maksimum : 1MB</small>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col">
                                            <img src="<?= $article['header_img'] ?>" id="hasil_gambar" width="100%" height="100%">
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