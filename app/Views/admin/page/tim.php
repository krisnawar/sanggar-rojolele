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
            <!-- Left col -->
            <section class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i>&nbspTambah Anggota Tim</button>
                        <!-- Modal Tambah Testimoni-->
                        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Tim</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/tim/save" method="post" enctype="multipart/form-data" role="form">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="name">Nama</label>
                                                        <input required class="form-control" type="text" name="name" id="name" placeholder="Masukkan nama">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="photo">Foto</label>
                                                        <input required style="font-size: 0.875rem;" type="file" accept="image/*" name="photo" id="photo" class="form-control" onchange="document.getElementById('gambaradd').src = window.URL.createObjectURL(this.files[0]); document.getElementById('gambaradd').style.display = 'block'">
                                                        <small>Size gambar maksimum : 1MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="title">Title/Jabatan</label>
                                                                <input required class="form-control" type="text" name="title" id="title" placeholder="Masukkan title/jabatan">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="" style="margin-top: 10px;">
                                                            <img id="gambaradd" style="display: none; margin: auto; max-height: 150px; max-width: 100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbspSimpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Title/Jabatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if (empty($teams)) : ?>
                                    <tr>
                                        <td style="text-align: center;" colspan="5">No Data</td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($teams as $team) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="text-center"><img class="rounded" style="max-height: 75px; max-width: 75px;" src="<?= $team['path'] ?>" alt="Foto <?= $team['name'] ?>"></td>
                                            <td><?= $team['name'] ?></td>
                                            <td><?= $team['title'] ?></td>
                                            <td style="text-align: center;">
                                                <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalEdit<?= substr(sha1($team['id']), 2, 13) ?>"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash" onclick="document.getElementById('namatim').innerHTML = '<?= $team['name'] ?>'; document.getElementById('idhapus').value = '<?= substr(sha1($team['id']), 2, 13) ?>'"></i></button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modalEdit<?= substr(sha1($team['id']), 2, 13) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel<?= substr(sha1($team['id']), 2, 13) ?>">Edit Anggota Tim</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/admin/tim/update/<?= substr(sha1($team['id']), 2, 13) ?>" method="post" enctype="multipart/form-data" role="form">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Nama</label>
                                                                        <input required class="form-control" type="text" name="name" id="name" placeholder="Masukkan nama" value="<?= $team['name'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="photo">Foto</label>
                                                                        <input style="font-size: 0.875rem;" type="file" accept="image/*" name="photo" id="photo" class="form-control" onchange="document.getElementById('gambaradd<?= substr(sha1($team['id']), 2, 13) ?>').src = window.URL.createObjectURL(this.files[0]); document.getElementById('gambaradd<?= substr(sha1($team['id']), 2, 13) ?>').style.display = 'block'">
                                                                        <small>Size gambar maksimum : 2MB</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="title">Title/Jabatan</label>
                                                                                <input required class="form-control" type="text" name="title" id="title" placeholder="Masukkan Title/Jabatan" value="<?= $team['title'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="" style="margin-top: 10px;">
                                                                            <img src="<?= $team['path'] ?>" id="gambaradd<?= substr(sha1($team['id']), 2, 13) ?>" style="display: block; margin: auto; max-height: 150px; max-width: 100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbspUpdate</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- right col -->
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus <strong id="namatim"></strong> dari tim?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="/admin/tim/hapus" method="post">
                    <input type="hidden" name="idhapus" id="idhapus" value="">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbspHapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>