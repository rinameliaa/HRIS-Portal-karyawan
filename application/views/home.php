<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash</title>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" />
  <script src="<?= base_url(); ?>assets/jquery.3.2.1.min.js"></script>
   <script src="<?= base_url(); ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="<?= base_url(); ?>assets/images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url(); ?>assets/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?= base_url(); ?>assets/images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="javascript:void(0)" class="dropdown-item" onclick="logout()"><i class="ti-power-off text-primary"></i>Logout</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
    </div>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Home/index'); ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pengajuan" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pengajuan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=base_url('Home/sakit'); ?>">Sakit</a></li>
              </ul>
            </div>
            <div class="collapse" id="pengajuan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=base_url('Home/izin'); ?>">Izin</a></li>
              </ul>
            </div>
            <div class="collapse" id="pengajuan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?=base_url('Home/cuti_umum'); ?>">Cuti</a></li>
              </ul>
            </div>
            <div class="collapse" id="pengajuan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?=base_url('Home/cuti_khusus'); ?>">Cuti Khusus</a></li>
              </ul>
            </div>
          </li>
        </ul>
    </nav>
    <div class="main-panel">
        <div class="content-wrapper">
            <?php
                include $konten.".php"; 
            ?>
        </div>
    </div>   
</div>
  <script src="<?= base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url(); ?>assets/js/dataTables.select.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>assets/js/template.js"></script>
  <script src="<?= base_url(); ?>assets/js/settings.js"></script>
  <script src="<?= base_url(); ?>assets/js/todolist.js"></script>
  <script src="<?= base_url(); ?>assets/js/dashboard.js"></script>
  <script src="<?= base_url(); ?>assets/js/Chart.roundedBarCharts.js"></script>
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
                          window.location = "<?= base_url(); ?>" + "Login/";
                    },
                    error: function(){
                        swal({title: "Gagal", text: "Koneksi API Gagal", icon: "error"});
                    }
                })
            }
        })
    }
    </script>
</body>
</html>