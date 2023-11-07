<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Akui Bird Nest</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url(); ?>assets/img/icon.ico" type="image/x-icon"/>
	<script src="<?= base_url(); ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/atlantis.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/demo.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header" data-background-color="blue">
				<a href="#" class="logo">
					<img src="<?= base_url(); ?>assets/img/logo1.png" alt="navbar brand" style="width: 3cm;" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">	
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" onclick="logout()" style="font-family: Arial; font-size: 14px;">
										<i class="fas fa-power-off" style="margin-right: 10px;"></i> Logout
										</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item" id="mnhome">
							<a href="<?=base_url('Home/index'); ?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item" id="mnpengajuan">
							<a data-toggle="collapse" href="#pengajuan">
								<i class="fas fa-file-signature"></i>
								<p>Pengajuan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="pengajuan">
								<ul class="nav nav-collapse">
									<li id="mnizin">
										<a href="<?=base_url('Home/izin'); ?>" id="izin">
											<span class="sub-item">Izin</span>
										</a>
									</li>
									<li id="mnsakit">
										<a href="<?=base_url('Home/sakit'); ?>">
											<span class="sub-item">Sakit</span>
										</a>
									</li>
									<li id="mncutit">
										<a href="<?=base_url('Home/cuti_tahunan'); ?>">
											<span class="sub-item">Cuti Tahunan</span>
										</a>
									</li>
									<li id="mncutik">
										<a href="<?=base_url('Home/cuti_khusus'); ?>">
											<span class="sub-item">Cuti Khusus</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<?php if ($this->approval !== 0): ?>
							<li class="nav-item" id="mnapprov">
								<a href="<?=base_url('Home/approval'); ?>">
									<i class="fas fa-home"></i>
									<p>Approval</p>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel" style="margin-top: px;">
				<div class="content">
					<?php
						include $konten.".php"; 
					?>
				</div>
 
			<div class="custom-template">
				<div class="title">Settings</div>
				<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
					<h4>Logo Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
						<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
						<br/>
						<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
					</div>
					</div>
					<div class="switch-block">
					<h4>Navbar Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeTopBarColor" data-color="dark"></button>
						<button type="button" class="changeTopBarColor" data-color="blue"></button>
						<button type="button" class="changeTopBarColor" data-color="purple"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
						<button type="button" class="changeTopBarColor" data-color="green"></button>
						<button type="button" class="changeTopBarColor" data-color="orange"></button>
						<button type="button" class="changeTopBarColor" data-color="red"></button>
						<button type="button" class="changeTopBarColor" data-color="white"></button>
						<br/>
						<button type="button" class="changeTopBarColor" data-color="dark2"></button>
						<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="purple2"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="green2"></button>
						<button type="button" class="changeTopBarColor" data-color="orange2"></button>
						<button type="button" class="changeTopBarColor" data-color="red2"></button>
					</div>
					</div>
					<div class="switch-block">
					<h4>Sidebar</h4>
					<div class="btnSwitch">
						<button type="button" class="selected changeSideBarColor" data-color="white"></button>
						<button type="button" class="changeSideBarColor" data-color="dark"></button>
						<button type="button" class="changeSideBarColor" data-color="dark2"></button>
					</div>
					</div>
					<div class="switch-block">
					<h4>Background</h4>
					<div class="btnSwitch">
						<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
						<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
						<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						<button type="button" class="changeBackgroundColor" data-color="dark"></button>
					</div>
					</div>
				</div>
				</div>
				<div class="custom-toggle">
				<i class="flaticon-settings"></i>
				</div>
			</div>
		</div>
  </div>
	<script src="<?= base_url(); ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/chart.js/chart.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- <script src="<?= base_url(); ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->
	<script src="<?= base_url(); ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/atlantis.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/setting-demo.js"></script>
	<script src="<?= base_url(); ?>assets/js/demo.js"></script>
</body>
<script>

  function logout(){
        swal({
            title: 'Konfirmasi',
            text: "Anda Yakin Ingin Logout?",
            icon: 'warning',
            buttons: {
                confirm: {text: 'Yakin', className: 'btn btn-primary'},
                cancel: {visible: true, text: 'Tidak', className: 'btn btn-danger'}
            }
        }).then((xx) => {
            if(xx){
                $.ajax({
                    url: "<?= base_url(); ?>" + "Logout",
                    method: "POST",
                    cache: "false",
                    success: function(y){
                          window.location = "<?= base_url(); ?>" + "Home/login";
                    },
                    error: function(){
                        swal({title: "Gagal", text: "Koneksi API Gagal", icon: "error"});
                    }
                })
            }
        })
    }
</script>
</html>