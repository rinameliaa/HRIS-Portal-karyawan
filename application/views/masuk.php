<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" />
    <script src="<?= base_url(); ?>assets/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url(); ?>assets/images/logo.svg" alt="logo">
                            </div>
                            <h4 class="font-weight-light">Sign in to continue.</h4>
                            <form class="pt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="txtus" placeholder="Isikan Username Anda">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="txtpassword" placeholder="Isikan Password Anda">
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary" onclick="login()">Login</button>&nbsp
                                    <button type="button" class="btn btn-danger" onclick="kosong()">Reset</button>&nbsp
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url(); ?>assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url(); ?>assets/js/template.js"></script>
    <script src="<?= base_url(); ?>assets/js/settings.js"></script>
    <script src="<?= base_url(); ?>assets/js/todolist.js"></script>
    <script>
        function login() {
            let username = $("#txtus").val();
            let pass = $("#txtpassword").val();
            if (username == "" || pass == "") {
                swal({ title: "Gagal", text: "Isian Anda Masih Kosong", icon: "error" });
                return;
            }
            $.ajax({
                url: "http://103.215.177.169/hris_dev/API/Employee/CheckEmployeeExist?id=" + username,
                method: "GET",
                cache: false,
                success: function (data) {
                    if (data && data.length > 0 && data[0].employee_id === username && pass === "admin123") {
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


        function kosong(){
            $("#txtid").val("");
            $("#txtpassword").val("");
            
        }
    </script>
</body>
</html>
