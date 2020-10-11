<?php
if(!isset($page_title)) { $page_title = 'Admin Area'; }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Local Foot - <?php echo htmlspecialchars($page_title); ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo url_for('/admin/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo url_for('/stylesheets/style_admin.css')?>" rel="stylesheet">
    <link href="<?php echo url_for('/stylesheets/sb-admin-2.min.css')?>" rel="stylesheet">
    <link href="<?php echo url_for('/admin/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo url_for('/admin/index.php'); ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-volleyball-ball"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Local Foot</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Admin Area</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Gestion client
        </div>


        <!-- Nav Items -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('/admin/terrains.php')?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Terrains</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('/admin/reservations.php')?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Reservations</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            Gestion d'utilisateurs
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('/admin/admins/index.php')?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Admins</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (!is_admin_logged_in()){
                        redirect_to(url_for('/admin/login.php'));
                    }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo url_for('/admin/logout.php');?>">Se deconnecter</a>
                        </li>
                    <?php }?>
                </ul>

            </nav>
            <div class="container-fluid">