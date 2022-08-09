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
                <form action="/admin/mitra/save" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="namamitra">Nama Mitra</label>
                                                <input required type="text" name="namamitra" id="namamitra" class="form-control" placeholder="Masukkan nama mitra">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="logomitra">Logo Mitra</label>
                                                <input required style="font-size: 0.875rem;" type="file" accept="image/*" name="logomitra" id="logomitra" class="form-control" onchange="document.getElementById('hasil_gambar').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil_gambar').style.display = 'block'">
                                                <small>Size gambar maksimum : 1MB. Diutamakan berformat .png dengan latar belakang transparan</small>
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
                                        <div class="col">
                                            <span>Hasil gambar akan muncul pada kolom ini.</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col">
                                            <img id="hasil_gambar" width="100%" height="100%" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>