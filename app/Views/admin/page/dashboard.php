<!-- Content Wrapper. Contains page content -->
<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content'); ?>

<!-- Content Header (Page header) -->

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $article_count ?></h3>

                        <p>Article</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <a href="/admin/artikel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $photo_count ?></h3>

                        <p>Foto</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <a href="/admin/album" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $mitra_count ?></h3>

                        <p>Mitra kerjasama</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <a href="/admin/mitra" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $testimoni_count ?></h3>

                        <p>Testimoni</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <a href="/admin/testimoni" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <!-- Left col -->
            <section class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">WELCOME</h1>
                    </div>
                    <div class="card-body">
                        <p>Selamat datang di halaman admin untuk pengelolaan website <strong>Sanggar Rojolele</strong> :)</p>
                    </div>
                </div>
            </section>
            <!-- right col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>