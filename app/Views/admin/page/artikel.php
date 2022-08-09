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
                        <a class="btn btn-success" href="/admin/artikel/add" role="button"><i class="fas fa-plus"></i>&nbspTambah Artikel</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Foto Headline</th>
                                    <th>Konten/Isi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if (empty($articles)) : ?>
                                    <tr>
                                        <td style="text-align: center;" colspan="5">No Data</td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($articles as $article) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $article['title'] ?></td>
                                            <td class="text-center"><img class="rounded" style="max-height: 100px; max-width: 200px;" src="<?= $article['header_img'] ?>" alt="Foto headline <?= $article['title'] ?>"></td>
                                            <td><?= substr(strip_tags($article['content']), 0, 130) ?> [...]</td>
                                            <td style="text-align: center;">
                                                <a href="/admin/artikel/edit/<?= substr(sha1($article['id']), 2, 13) ?>">
                                                    <button class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash" onclick="document.getElementById('judulartikel').innerHTML = '<?= $article['title'] ?>'; document.getElementById('idhapus').value = '<?= substr(sha1($article['id']), 2, 13) ?>'"></i></button>
                                            </td>
                                        </tr>
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
                Apakah anda yakin akan menghapus artikel <strong id="judulartikel"></strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="/admin/artikel/hapus" method="post">
                    <input type="hidden" name="idhapus" id="idhapus" value="">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbspHapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>