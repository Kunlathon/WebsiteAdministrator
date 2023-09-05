<?php
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//โทร 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//โทร 0932670639
//Email: mpamese.pc2001@gmail.com	

include("structure/link.php");
$RunLink = new link_system();
//$RunLink->CallLink_System();

$Black_Login = filter_input(INPUT_POST, 'Black_Login');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $RunLink->Call_Link_System(); ?>/template/layout_1/LTR/default/full/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- Core JS files -->
    <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/main/jquery.min.js"></script>
    <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->
    <!--++++++++++++++++++++++++++++++++++++++++++++-->
    <script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw', screen.width);
            //$.cookie('sh',screen.height);
            return true;
        }
        setScreenHWCookie();
    </script>
    <!--++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
    $width_system = filter_input(INPUT_COOKIE, 'sw');
    if (($width_system >= 1200)) {
        $grid = "xl";
    } elseif (($width_system >= 992)) {
        $grid = "lg";
    } elseif (($width_system <= 768)) {
        $grid = "md";
    } elseif (($width_system <= 576)) {
        $grid = "sm";
    } else {
        $grid = "xs";
    }
    ?>
    <!--++++++++++++++++++++++++++++++++++++++++++++-->
    <script type="text/javascript">
        function ShowPassword() {
            var sp = document.getElementById("password");
            if (sp.type == "password") {
                sp.type = "text";
            } else {
                sp.type = "password";
            }
        }
    </script>
    <!--+++++++++++++++++++++++++++++++++++++++++++-->
    <!-- Theme JS files -->
    <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <!-- Theme JS files -->
    <!--<script src="../../../../global_assets/js/demo_pages/extra_sweetalert.js"></script>-->

    <script>
        var SA_Login = function() {
            var _componentSA_Login = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
                // Defaults
                var swalInit1 = swal.mixin({
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
                });
                // Defaults End
                // Defaults
                var swalInit2 = swal.mixin({
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
                });
                // Defaults End
                //--------------------------------------------------------------------------------------
                //--------------------------------------------------------------------------------------
                //$(document).ready(function(){
                $('#sign').on('click', function() {
                    var username = $("#username").val();
                    var password = $("#password").val();
                    if (username == "" && password == "") {
                        swalInit1.fire({
                            title: 'กรุณาล็อกอินเข้าสู่ระบบ',
                            //text: 'Something went wrong!',
                            icon: 'error',
                            allowOutsideClick: false
                        });
                    } else if (username == "" || password == "") {
                        swalInit1.fire({
                            title: 'ข้อมูล Username และ Password ไม่ถูกต้อง',
                            //text: 'Something went wrong!',
                            icon: 'error',
                            allowOutsideClick: false
                        });
                    } else {
                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/process/check_login.php", {
                            username: username,
                            password: password
                        }, function(login_data) {
                            var copy_login_data = login_data;

                            if (copy_login_data.trim() === "yes") {
                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/index.php";
                            } else if (copy_login_data.trim() === "no") {
                                swalInit2.fire({
                                    title: 'ไม่พบข้อมูล',
                                    icon: 'error',
                                    allowOutsideClick: false
                                });
                            } else {
                                swalInit2.fire({
                                    title: 'พบข้อพลาด',
                                    //text: 'Test->'+copy_login_data.trim(),
                                    icon: 'error',
                                    allowOutsideClick: false
                                });
                            }
                        })
                    }
                });
                //});
                //--------------------------------------------------------------------------------------
            };
            //--------------------------------------------------------------------------------------
            return {
                initComponentsLogin: function() {
                    _componentSA_Login();
                }
            }
        }();
        // Initialize module
        // ------------------------------
        document.addEventListener('DOMContentLoaded', function() {
            SA_Login.initComponentsLogin();
        });
    </script>
    <!-- /theme JS files -->
</head>


<body style="background-image: url(<?php echo $RunLink->Call_Link_System(); ?>/images/aba-view.jpg); background-repeat: no-repeat; background-attachment: fixed;  background-size: 100% 100%;" >

    <!-- Page content -->
    <div class="page-content">
        <div class="row">
            <div class="col-<?php echo $grid; ?>-12"></div>
        </div>
        <!-- Main content -->
        <div class="content-wrapper">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-6">
                    <!-- Content area -->
                    <div class="content d-flex justify-content-center align-items-center">
                        <!-- Login form -->
                        <form class="login-form" mane="login">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <a href="../index.php"><img src="<?php echo $RunLink->Call_Link_System(); ?>/images/logo.png" style="width:60%; height:250px;" class="img-circle" alt="Admin"></a>
                                        <h5 class="mb-0">เจ้าหน้าที่เข้าสู่ระบบ</h5>
                                        <span class="d-block text-muted">ป้อนข้อมูลของคุณด้านล่าง</span>
                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                                        <div class="form-control-feedback">
                                            <i class="icon-lock2 text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <label class="custom-control custom-control-secondary custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" onclick="ShowPassword()">
                                            <span class="custom-control-label">แสดงรหัสผ่าน</span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" name="sign" id="sign" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                                    </div>

                                    <!--<div class="text-center">
                                        <a href="login_password_recover.html">Forgot password?</a>
                                    </div>-->
                                </div>
                            </div>
                        </form>
                        <!-- /login form -->
                    </div>
                    <!-- /content area -->
                </div>
                <div class="col-<?php echo $grid; ?>-6">

                </div>
            </div>



        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>