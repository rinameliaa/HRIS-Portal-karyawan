<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Akui Bird Nest</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url(); ?>assets/img/icon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/demo.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

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
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					<a class="navbar-brand" style="left: 0">
						<h6 class="text-white"><?= date('d-F-Y'); ?></h6>
					</a>
					<a class="navbar-brand" style="left: 0">
						<h6 class="text-white"><?= $nama; ?></h6>
					</a>
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
									<i class="fas fa-file-alt"></i>
									<p>Approval</p>
								</a>
							</li>
						<?php endif; ?>
						<li class="nav-item" id="mnkehadiran">
							<a href="<?=base_url('Home/kehadiran'); ?>">
								<i class="fas fa-user-check"></i>
								<p>Kehadiran Karyawan</p>
							</a>
						</li>
						<?php if ($this->approval !== 0): ?>
							<li class="nav-item" id="mnrekap">
								<a href="<?=base_url('Home/rekap_kehadiran'); ?>">
									<i class="fas fa-user-friends"></i>
									<p>Rekap Kehadiran</p>
								</a>
							</li>
						<?php endif; ?>
						<li class="nav-item" id="mnpenggajian">
							<a href="<?=base_url('Home/penggajian'); ?>">
								<i class="fas fa-money-check-alt"></i>
								<p>Penggajian</p>
							</a>
						</li>
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
		</div>
  </div>
	<script src="<?= base_url(); ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/chart.js/chart.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>
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
                    url: "<?= base_url('Logout'); ?>",
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