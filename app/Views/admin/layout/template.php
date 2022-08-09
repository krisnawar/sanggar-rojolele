<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?= $orgdata['web_icon'] ?>" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <title><?= $subtitle ?> | Admin <?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="/assets/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php if (isset($uriinfo[1]) && $uriinfo[1] == 'album') : ?>
        <!-- Dropzone.js -->
        <link rel="stylesheet" href="/assets/admin/plugins/dropzone/min/dropzone.min.css">
        <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="/assets/admin/plugins/ekko-lightbox/ekko-lightbox.css">
    <?php endif ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/admin/dist/css/adminlte.min.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="/assets/admin/plugins/summernote/summernote-bs4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/admin/plugins/summernote/summernote-bs4.min.css">
    <!-- <script src="https://cdn.tiny.cloud/1/91k4x4v7ooabbu8apkywsq2068ib0vrek0kudilz0itgxl88/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed text-sm">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= $orgdata['about_img'] ?>" alt="Logo Sanggar Rojolele" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="<?= $orgdata['about_img'] ?>" alt="Logo Sanggar Rojolele" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= $orgdata['org_name'] ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/assets/admin/dist/img/user-icon.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block"><?= user()->username ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link
                            <?php if ($uriinfo[1] == 'dashboard') {
                                echo "active";
                            } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/artikel" class="nav-link
                            <?php if ($uriinfo[1] == 'artikel') {
                                echo "active";
                            } ?>">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Artikel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/album" class="nav-link
                            <?php if ($uriinfo[1] == 'album') {
                                echo "active";
                            } ?>">
                                <i class="nav-icon fas fa-photo-video"></i>
                                <p>Album</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/mitra" class="nav-link
                            <?php if ($uriinfo[1] == 'mitra') {
                                echo "active";
                            } ?>">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>Mitra</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/testimoni" class="nav-link
                            <?php if ($uriinfo[1] == 'testimoni') {
                                echo "active";
                            } ?>">
                                <i class="nav-icon fas fa-quote-right"></i>
                                <p>Testimoni</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/banner" class="nav-link
                            <?php if ($uriinfo[1] == 'banner') {
                                echo "active";
                            } ?>">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/tim" class="nav-link
                            <?php if ($uriinfo[1] == 'tim') {
                                echo "active";
                            } ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Tim</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/orgdata" class="nav-link
                            <?php if ($uriinfo[1] == 'orgdata') {
                                echo "active";
                            } ?>">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Data Organisasi</p>
                            </a>
                        </li>
                        <?php if (in_groups('superadmin')) : ?>
                            <li class="nav-item">
                                <a href="/admin/register" class="nav-link
                                <?php if ($uriinfo[1] == 'register') {
                                    echo "active";
                                } ?>">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Add admin</p>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if (logged_in()) : ?>
                            <li class="nav-item">
                                <a href="/logout" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $subtitle ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
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
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <?= $this->renderSection('content') ?>
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Developed by <a href="https://instagram.com/krisna.war">Krisna.war</a> | </strong><strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Datatable -->
    <script src="/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- ChartJS -->
    <!-- <script src="/assets/admin/plugins/chart.js/Chart.min.js"></script> -->
    <!-- Sparkline -->
    <!-- <script src="/assets/admin/plugins/sparklines/sparkline.js"></script> -->
    <!-- JQVMap -->
    <!-- <script src="/assets/admin/plugins/jqvmap/jquery.vmap.min.js"></script> -->
    <!-- <script src="/assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <!-- <script src="/assets/admin/plugins/jquery-knob/jquery.knob.min.js"></script> -->
    <!-- InputMask -->
    <script src="/assets/admin/plugins/moment/moment.min.js"></script>
    <script src="/assets/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- daterangepicker -->
    <!-- <script src="/assets/admin/plugins/moment/moment.min.js"></script> -->
    <script src="/assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <!-- <script src="/assets/admin/plugins/summernote/summernote-bs4.min.js"></script> -->
    <!-- overlayScrollbars -->
    <!-- <script src="/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <?php if (isset($uriinfo[1]) && $uriinfo[1] == 'album') : ?>
        <!-- Dropzone -->
        <script src="/assets/admin/plugins/dropzone/min/dropzone.min.js"></script>
        <!-- Ekko Lightbox -->
        <script src="/assets/admin/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <?php endif; ?>
    <!-- AdminLTE App -->
    <script src="/assets/admin/dist/js/adminlte.js"></script>
    <!-- Summernote -->
    <script src="/assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/admin/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="/assets/admin/dist/js/pages/dashboard.js"></script> -->
    <script src="/assets/admin/dist/js/summernote.js"></script>


    <script src="/assets/admin/dist/js/datatable.js"></script>


    <script src="/assets/admin/custom.js"></script>

</body>

</html>