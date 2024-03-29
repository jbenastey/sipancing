<!DOCTYPE html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Toko Aj. Pancing</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/dropify/dist/css/dropify.min.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/css/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
	<!-- partial:partials/_navbar.html -->
	<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row  d-print-none">
		<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
			<a class="navbar-brand brand-logo" href="<?=base_url('admin')?>"><img src="<?=base_url()?>assets/frontend/img/sipesan/fishing-icon.png" alt="logo" style="width: 10%"/><span style="color: black; font-size: medium"> Toko Aj. Pancing</span></a>
			<a class="navbar-brand brand-logo-mini" href="<?=base_url('admin')?>"><img src="<?=base_url()?>assets/frontend/img/sipesan/fishing-icon.png" alt="logo"/></a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-center">
			<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
				<span class="icon-menu"></span>
			</button>
			<ul class="navbar-nav navbar-nav-right">
				<li class="nav-item nav-settings d-none d-lg-block">
					<a class="nav-link" href="<?php echo base_url() ?>admin" title="Profil">
						<i class="icon-user"></i>
					</a>
				</li>
				<li class="nav-item nav-settings d-none d-lg-block">
					<a class="nav-link" href="<?php echo base_url() ?>admin/logout"
					   onclick="return confirm('Apakah anda yakin ingin keluar?')" title="Keluar">
						<i class="icon-logout"></i>
					</a>
				</li>
			</ul>
			<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
				<span class="icon-menu"></span>
			</button>
		</div>
	</nav>
	<!-- partial -->
	<div class="container-fluid page-body-wrapper">
		<div class="row row-offcanvas row-offcanvas-right">
			<!-- partial:partials/_settings-panel.html -->
			<div class="theme-setting-wrapper d-print-none">
				<div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
				<div id="theme-settings" class="settings-panel">
					<i class="settings-close mdi mdi-close"></i>
					<p class="settings-heading">SIDEBAR SKINS</p>
					<div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
					<div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
					<p class="settings-heading mt-2">HEADER SKINS</p>
					<div class="color-tiles mx-0 px-4">
						<div class="tiles primary"></div>
						<div class="tiles success"></div>
						<div class="tiles warning"></div>
						<div class="tiles danger"></div>
						<div class="tiles pink"></div>
						<div class="tiles info"></div>
						<div class="tiles dark"></div>
						<div class="tiles default"></div>
					</div>
				</div>
			</div>
			<!-- partial -->
			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar sidebar-offcanvas d-print-none" id="sidebar">
				<ul class="nav">
					<li class="nav-item nav-profile">
						<div class="nav-link">
							<div class="profile-image">
								<img src="<?=base_url()?>assets/backend/images/user.png" alt="image"/>
								 <!--change class online to offline or busy as needed-->
							</div>
							<div class="profile-name">
								<p class="name">
									Administrator
								</p>
							</div>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('admin')?>">
							<i class="icon-rocket menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
							<i class="icon-layers menu-icon"></i>
							<span class="menu-title">Data Master</span>
						</a>
						<div class="collapse" id="ui-basic">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"> <a class="nav-link" href="<?=base_url('admin/kategori')?>">Data Kategori</a></li>
								<li class="nav-item"> <a class="nav-link" href="<?=base_url('admin/produk')?>">Data Produk</a></li>
								</ul>
						</div>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('admin/pelanggan')?>">
							<i class="icon-people menu-icon"></i>
							<span class="menu-title">Data Pelanggan</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('admin/transaksi')?>">
							<i class="icon-basket-loaded menu-icon"></i>
							<span class="menu-title">Data Transaksi</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
							<i class="icon-layers menu-icon"></i>
							<span class="menu-title">Laporan</span>
						</a>
						<div class="collapse" id="ui-basic2">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"> <a class="nav-link" href="<?=base_url('admin/laporan')?>">Laporan Perbulan</a></li>
								<li class="nav-item"> <a class="nav-link" href="<?=base_url('admin/laporan/hari')?>">Laporan Perhari</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</nav>
			<!-- partial -->
			<div class="content-wrapper">
				<div class="row">
