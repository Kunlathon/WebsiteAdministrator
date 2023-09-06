<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/changepass.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) { ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=changepass" class="breadcrumb-item"> จัดการเปลี่ยนรหัสผ่าน</a>

                        <a href="#" class="breadcrumb-item"> เปลี่ยนรหัสผ่าน</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>เปลี่ยนรหัสผ่าน</h4>
                </div>
            </div>

            <?php
            $manage = filter_input(INPUT_GET, 'manage');
            if (($manage == "add")) { ?>

                <?php   } else {
                @$admin_key = check_session("admin_id_aba");
                if (($admin_key != "")) {
                    $sql = "SELECT * FROM `tb_admin` WHERE `admin_id` = '{$admin_key}'";
                    $row = row_array($sql);

                ?>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-2"></div>
                        <div class="col-<?php echo $grid; ?>-8">

                            <div class="toast" style="opacity: 1; max-width: none;">
                                <div class="toast-header bg-success border-success">
                                    <span class="font-weight-semibold mr-auto">ฟอร์มเปลี่ยนรหัสผ่าน</span>
                                </div>
                                <div class="toast-body">
                                    <form name="changepass" id="changepass" method="post" accept-charset="utf-8">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-<?php echo $grid; ?>-4">รหัสผ่านใหม่</label>
                                                        <div class="col-<?php echo $grid; ?>-8">
                                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                                <div id="password-null">
                                                                    <input type="password" name="password" id="password" class="form-control form-control-lg" value="" required="required">
                                                                    <div class="form-control-feedback form-control-feedback-lg">
                                                                        <i class="icon-key"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <!--<div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-<?php echo $grid; ?>-4">ยืนยันรหัสผ่าน</label>
                                                        <div class="col-<?php echo $grid; ?>-8">
                                                            <div id="password2-null">
                                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                                    <input type="password" name="password2" id="password2" class="form-control form-control-lg" value="" required="required">
                                                                    <div class="form-control-feedback form-control-feedback-lg">
                                                                        <i class="icon-key"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </fieldset>
                                            </div>
                                        </div>-->
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3" style="float: right">
                                                    <button type="button" name="password_user_data" id="password_user_data" class="btn btn-info">บันทึก</button>&nbsp;
                                                    <button type="button" name="changepass_cancel" id="changepass_cancel" class="btn btn-danger">ยกเลิก</button>
                                                    <input type="hidden" name="admin_key" id="admin_key" value="<?php echo @$row['admin_id']; ?>">
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                        <div class="col-<?php echo $grid; ?>-2"></div>
                    </div>

            <?php
                } else {
                }
            }
            ?>

        </div>

<?php   } else {
    }
} ?>