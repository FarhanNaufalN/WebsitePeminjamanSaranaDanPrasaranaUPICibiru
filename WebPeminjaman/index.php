<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Website Peminjaman</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/upi.png" type="image/x-icon"/>
    
    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Open+Sans:300,400,600,700"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="toastr.js"></script>
    <script> 
        $(document).ready(function() {
            $('#press').on("click",function(){
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                // Trigger toastr notification here
                toastr.success("Login successful", "Success");
            });
        });
    </script>
    
    <!-- CSS Files -->
    <link href="toastr.css" rel="toastr.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/azzara.min.css">
    <link rel="stylesheet" href="assets/css/bg.css">
</head>
<body class="login" style=" background-image: url('assets/img/bglogin.png');">
<?php echo isset($toastrScript) ? $toastrScript : ''; ?>
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn" style="max-width: 1000px; margin-bottom:40px;border-radius: 20px;">
            <div class="text-center">
                <img src="assets/img/logoupicibiru.png" class="img-fluid ms-2 mb-3" width="100" alt="">
                <b style="color:black; font-size: 30px;">|</b>
                <b style="color:black; font-size: 12px;">SARANA DAN PRASARANA</b><br>
            </div>
            <div class="login-form">
                <form method="POST" action="cek_login.php">
                    <div class="form-group form-floating-label">
                        <input id="username" maxlength="15" name="username" type="text" class="form-control input-border-bottom" required>
                        <label for="username" class="placeholder">Username</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" maxlength="15" name="password" type="password" class="form-control input-border-bottom" required>
                        <label for="password" class="placeholder">Password</label>
                    </div>
                    
                    <div class="form-action mb-3">
                        <button type="submit" id="press" class="btn btn-primary btn-rounded btn-login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/ready.js"></script>
</body>
</html>
