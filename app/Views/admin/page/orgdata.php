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
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-data-tab" data-toggle="pill" href="#custom-tabs-three-data" role="tab" aria-controls="custom-tabs-three-data" aria-selected="true">Data Organisasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-about-tab" data-toggle="pill" href="#custom-tabs-three-about" role="tab" aria-controls="custom-tabs-three-about" aria-selected="false">Tentang Organisasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-logo-tab" data-toggle="pill" href="#custom-tabs-three-logo" role="tab" aria-controls="custom-tabs-three-logo" aria-selected="false">Logo Organisasi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-data" role="tabpanel" aria-labelledby="custom-tabs-three-data-tab">
                                <form action="/admin/orgdata/savedata" method="post" role="form">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="org_name">Nama Organisasi</label>
                                                <input required type="text" class="form-control form-control-sm" name="org_name" id="org_name" placeholder="Masukkan nama organisasi" value="<?= $orgdata['org_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="web_url">Website Organisasi</label>
                                                <input required type="text" class="form-control form-control-sm" name="web_url" id="web_url" placeholder="Masukkan web organisasi" value="<?= $orgdata['web_url'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <textarea required class="form-control form-control-sm" name="address" id="address" rows="5" placeholder="Masukkan alamat organisasi" style="resize: none;"><?= str_replace("<br>", "\n", $orgdata['address']) ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="maps">Maps</label>&nbsp<small>(Dimulai dengan &ltiframe&gt dan diakhiri dengan &lt/iframe&gt)</small>
                                                <textarea required class="form-control form-control-sm" name="maps" id="maps" rows="5" placeholder="Code untuk maps organisasi" style="resize: none;"><?= $orgdata['maps'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="email">Email Utama</label>
                                                <input required type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Masukkan email utama" value="<?= $orgdata['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="alt_email">Email Alternatif</label>
                                                <input required type="email" class="form-control form-control-sm" name="alt_email" id="alt_email" placeholder="Masukkan email alternatif" value="<?= $orgdata['alt_email'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="phone_number">Nomor telepon</label>
                                                <input required type="text" class="form-control form-control-sm" name="phone_number" id="phone_number" placeholder="Masukkan nomor telepon" value="<?= $orgdata['phone_number'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="whatsapp">Nomor Whatsapp</label>&nbsp<small>(Misalnya: 6281234567890)</small>
                                                <input required type="text" class="form-control form-control-sm" name="whatsapp" id="whatsapp" placeholder="Masukkan nomor whatsapp (mis: 6281234567890)" value="<?= $orgdata['whatsapp'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="facebook">Facebook Organisasi</label>&nbsp<small>(Misalnya: https://facebook.com/organisasi)</small>
                                                <input required type="text" class="form-control form-control-sm" name="facebook" id="facebook" placeholder="Masukkan link facebook" value="<?= $orgdata['facebook'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="instagram">Instagram Organisasi</label>&nbsp<small>(Misalnya: https://instagram.com/organisasi)</small>
                                                <input required type="text" class="form-control form-control-sm" name="instagram" id="instagram" placeholder="Masukkan link instagram" value="<?= $orgdata['instagram'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbspSimpan</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-about" role="tabpanel" aria-labelledby="custom-tabs-three-about-tab">
                                <form action="/admin/orgdata/saveabout" method="post" role="form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="about">Tentang Organisasi</label>
                                                <textarea required name="about" id="summernote" rows="10" style="resize: none;"><?= $orgdata['about'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="form-group">
                                                        <label for="about_img">Foto Tentang Organisasi</label>
                                                        <input style="font-size: 0.875rem;" type="file" accept="image/*" name="about_img" id="about_img" class="form-control" onchange="document.getElementById('hasil_gambar').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil_gambar').style.display = 'block'">
                                                        <small>Size gambar maksimum : 1MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-lg">
                                                    <img src="<?= $orgdata['about_img'] ?>" id="hasil_gambar" style="display: block; margin: auto; max-height: 200px; max-width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbspSimpan</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-logo" role="tabpanel" aria-labelledby="custom-tabs-three-logo-tab">
                                <form action="/admin/orgdata/saveimg" method="post" enctype="multipart/form-data" role="form">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="form-group">
                                                        <label for="org_logo">Logo Organisasi</label>
                                                        <input style="font-size: 0.875rem;" type="file" accept="image/*" name="org_logo" id="org_logo" class="form-control" onchange="document.getElementById('hasil_org_logo').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil_org_logo').style.display = 'block'">
                                                        <small>Gambar berformat PNG dengan size maksimum 1MB</small>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-lg">
                                                    <img src="<?= $orgdata['org_logo'] ?>" id="hasil_org_logo" style="display: block; margin: auto; max-height: 150px; max-width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="form-group">
                                                        <label for="web_icon">Favicon</label>&nbsp<small>(Logo kecil yang akan ditampilkan di tab browser)</small>
                                                        <input style="font-size: 0.875rem;" type="file" accept="image/*" name="web_icon" id="web_icon" class="form-control" onchange="document.getElementById('hasil_web_icon').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil_web_icon').style.display = 'block'">
                                                        <small>Gambar berformat PNG harus "square" dengan size kurang dari 10kB</small>
                                                        <br>
                                                        <small>(Rekomendasi ukuran 100x100 piksel)</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-lg">
                                                    <img src="<?= $orgdata['web_icon'] ?>" id="hasil_web_icon" style="display: block; margin: auto; max-height: 150px; max-width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbspSimpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>