<!DOCTYPE html>
<html lang="en">
<head>
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <title>Login</title>
     <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
     <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
     <script src="assets/js/plugin/webfont/webfont.min.js"></script>
     <script>
          WebFont.load({
               google: {"families":["Lato:300,400,700,900"]},
               custom: {"families":[
                    "Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"],
                    urls: ['assets/css/fonts.min.css']
               },
               active: function() {sessionStorage.fonts = true;}
          });
     </script>
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/atlantis.min.css">
     <script src="assets/js/core/jquery.3.2.1.min.js"></script>
     <script src="assets/js/core/popper.min.js"></script>
     <script src="assets/js/core/bootstrap.min.js"></script>
     <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
     <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
     <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
     <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
     <script src="assets/js/atlantis.min.js"></script>
     <script src="assets/js/plugin/datatables/datatables.min.js"></script>
     <script src="assets/js/highcharts.js"></script>
     <script src="assets/js/html2pdf.bundle.min.js"></script>
     <script src="assets/js/xlsx.full.min.js"></script>
     <style>
            .fullscreen {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                z-index: 1;
            }
            .blok-info {
                z-index: 2;
                top: 50%;
                left: 50%; 
                transform: translate(-50%, -50%);
                position : fixed;
                border-radius : 15px;
            }
        </style>
</head>
<body>
    <div class="backround">
        <img src="<?= base_url(); ?>assets/img/logo2.jpg" class="fullscreen">
    </div>
    <div class="card blok-info" style="width: 7cm; right: 0;">
        <div class="card-body">
            <form>
                <img src="<?= base_url(); ?>assets/img/logo1.png" style="width: 5cm; display: block;margin: 0 auto; text-align: center;">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="txtus" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="txtpassword" placeholder="Masukkan Password">
                </div>
                <button type="button" class="btn btn-primary btn-lg btn-block" style="margin-top: 3px;" onclick="login()">Login</button>
            </form>
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
    <script>
        function login() {
            let username = $("#txtus").val();
            let pass = $("#txtpassword").val();
            if (username == "" || pass == "") {
                swal({ title: "Gagal", text: "Isian Anda Masih Kosong", icon: "error" });
                return;
            }
            $.ajax({
                url: "http://103.215.177.169/hris/API/Employee/CheckEmployeeExist?id=" + username + '&password='+pass,
                method: "GET",
                cache: false,
                success: function (data) {
                    // if (data && data.length > 0 && data[0].employee_id === username && pass === "admin123") {
                    if (data && data.length > 0 && data[0].employee_id === username) {
                        let userData = JSON.stringify(data[0]);
                        $.ajax({
                            url: "<?= base_url(); ?>" + "Login/saveUserData",
                            method: "POST",
                            data: { username: username, userData: userData },
                            success: function (response) {
                                window.location = "<?= base_url(); ?>" + "Home/index";
                            },
                            error: function () {
                                swal({ title: "Gagal", text: "Tidak dapat menyimpan data", icon: "error" });
                            }
                        });
                    } else {
                        swal({ title: "Gagal", text: "Login Gagal", icon: "error" });
                    }
                },
                error: function () {
                    swal({ title: "Gagal", text: "Tidak Terhubung dengan Server", icon: "error" });
                }
            });
        }
    </script>
</body>
</html>