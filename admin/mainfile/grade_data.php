<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/grade_data.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) { ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=grade_data" class="breadcrumb-item"> จัดการระดับชั้น</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลระดับชั้น</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>ข้อมูลระดับชั้น</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid; ?>-6">
                    <div class="btn-group">
                        <button type="button" name="term_data" id="term_data" class="btn btn-outline-success btn-sm" value="">ภาคเรียน</button>&nbsp;&nbsp;
                        <button type="button" name="grade_data" id="grade_data" class="btn btn-success btn-sm" value="">ระดับชั้น</button>&nbsp;&nbsp;
                        <button type="button" name="course_data" id="course_data" class="btn btn-outline-success btn-sm" value="">หลักสูตรหลัก</button>&nbsp;&nbsp;
                        <button type="button" name="classroom_data" id="classroom_data" class="btn btn-outline-success btn-sm" value="">จัดหลักสูตร</button>
                    </div>
                </div>
                <div class="col-<?php echo $grid; ?>-6"></div>
            </div><br>

            <?php
            $manage = filter_input(INPUT_POST, 'manage');
            if (($manage == "form_add")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">

                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มข้อมูลระดับชั้นเรียน</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data">
                                                        <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มระดับชั้น</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <form name="grade_data_add" id="grade_data_add" accept-charset="utf-8" method="post">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <div id="grade_name-null">
                                                                    <input type="text" name="grade_name" id="grade_name" class="form-control" value="" placeholder="กรอกข้อมูลระดับชั้น" required="required">
                                                                    <span>กรอกข้อมูลระดับชั้น</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น(Eng) <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <div id="grade_name_eng-null">
                                                                    <input type="text" name="grade_name_eng" id="grade_name_eng" class="form-control" value="" placeholder="กรอกข้อมูลระดับชั้นภาษาอังกฤษ" required="required">
                                                                    <span>กรอกข้อมูลระดับชั้นภาษาอังกฤษ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">รายละเอียด <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <div id="grade_detail-null">
                                                                    <input type="text" name="grade_detail" id="grade_detail" class="form-control" value="" placeholder="กรอกข้อมูลรายละเอียด" required="required">
                                                                    <span>กรอกข้อมูลรายละเอียด</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <button type="button" name="Add_Grade_data" id="Add_Grade_data" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            </from>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    } elseif (($manage == "form_up")) { ?>

                <?php
                $grade_key = filter_input(INPUT_POST, 'grade_key');
                if ((!is_null($grade_key))) {
                    $sql = "SELECT * FROM `tb_grade` WHERE `grade_id` = '{$grade_key}'";
                    $row = row_array($sql); ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">

                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลระดับชั้นเรียน</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <table align="right">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data">
                                                            <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มระดับชั้น</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="grade_data_add" id="grade_data_add" accept-charset="utf-8" method="post">
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <div id="grade_name-null">
                                                                        <input type="text" name="grade_name" id="grade_name" class="form-control" value="<?php echo @$row["grade_name"]; ?>" placeholder="กรอกข้อมูลระดับชั้น" required="required">
                                                                        <span>กรอกข้อมูลระดับชั้น</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น(Eng) <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <div id="grade_name_eng-null">
                                                                        <input type="text" name="grade_name_eng" id="grade_name_eng" class="form-control" value="<?php echo @$row["grade_name_eng"]; ?>" placeholder="กรอกข้อมูลระดับชั้นภาษาอังกฤษ" required="required">
                                                                        <span>กรอกข้อมูลระดับชั้นภาษาอังกฤษ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">รายละเอียด <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <div id="grade_detail-null">
                                                                        <input type="text" name="grade_detail" id="grade_detail" class="form-control" value="<?php echo @$row['grade_detail']; ?>" placeholder="กรอกข้อมูลรายละเอียด" required="required">
                                                                        <span>กรอกข้อมูลรายละเอียด</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <button type="button" name="Up_Grade_data" id="Up_Grade_data" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="grade_key" id="grade_key" value="<?php echo @$row['grade_id']; ?>">
                                                </from>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                    $link_gd = $RunLink->Call_Link_System();
                    exit("<script>window.location='$link_gd/?modules=grade_data';</script>");
                } ?>

            <?php    } else {  ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">

                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลระดับชั้น</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data">
                                                        <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มระดับชั้น</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <div id="run_data_sd"><i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span></div>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>



                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <?php   } ?>




        </div>




<?php   } else {
    }
} ?>