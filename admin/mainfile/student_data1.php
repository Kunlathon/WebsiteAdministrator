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
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/student_data1.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) {
        $check_grade = 1;
        @$classroom = base64_decode(filter_input(INPUT_GET, 'classroom'));
?>
        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=student_data" class="breadcrumb-item"> นิสิตทั้งหมด</a>

                        <a href="?modules=student_data1" class="breadcrumb-item"> นิสิตระดับประถมศึกษา</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลนิสิตระดับประถมศึกษา</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">

                <div class="col-<?php echo $grid; ?>-4">
                    <h4>ข้อมูลนิสิตระดับประถมศึกษา</h4>
                </div>
                <div class="col-<?php echo $grid; ?>-4"></div>
                <div class="col-<?php echo $grid; ?>-4">
                    <fieldset class="mb-3">
                        <div class="form-group row">
                            <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน</label>
                            <div class="col-<?php echo $grid; ?>-9">
                                <select class="form-control select" name="classroom_Reset" id="classroom_Reset" data-placeholder="เลือกห้องเรียน..." required="required">
                                    <option></option>
                                    <optgroup label="ห้องเรียน">
                                        <?php
                                        $sql = "SELECT * FROM `tb_classroom` WHERE `grade_id` = '{$check_grade}' ORDER BY `classroom_name` ASC";
                                        $cc = result_array($sql);
                                        ?>
                                        <?php foreach ($cc as $_cc) { ?>
                                            <option <?php echo $classroom == $_cc['classroom_id'] ? "selected" : ""; ?> value="<?php echo $_cc['classroom_id']; ?>"><?php echo $_cc['classroom_name']; ?></option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>

            </div>

            <?php
            $manage = filter_input(INPUT_GET, 'manage');
            if (($manage == "profile")) { ?>

            <?php   } else { ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="btn-group">
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1';" class="btn btn-outline-secondary" value="">นิสิตทั้งหมด</button>&nbsp;&nbsp;
                            <button type="button" name="" id="" class="btn btn-outline-success" value="">ระดับชั้น</button>
                        </div>
                    </div>
                </div><br>

            <?php   } ?>



            <?php


            if (($manage == "profile")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                <?php
                $student_key = base64_decode(filter_input(INPUT_GET, 'student_key'));
                $classroom_id = base64_decode(filter_input(INPUT_GET, 'classroom'));
                $sql = "SELECT * FROM `tb_student` WHERE `student_id` = '{$student_key}'";
                $row = row_array($sql);
                ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <table>
                            <tr>
                                <td>
                                    <div>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&classroom=<?php echo base64_encode($classroom_id); ?>';" class="btn btn-outline-success" value="">รายการ</button>
                                    </div>
                                </td>
                                <td>

                                    <div>
                                        <form name="form_show" id="form_show" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=profile&student_key=<?php echo base64_encode($row['student_id']); ?>&classroom=<?php echo base64_encode($classroom_id); ?>">
                                            <button type="submit" name="button_show" id="button_show" class="btn btn-outline-success" value="">ประวัติส่วนตัว</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <form name="update_ta" id="update_ta" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=form_edit&student_key=<?php echo base64_encode($row['student_id']); ?>&classroom=<?php echo base64_encode($classroom_id); ?>">
                                            <button type="submit" name="submit_update" id="submit_update" class="btn btn-outline-success" value="">แก้ไขประวัติส่วนตัว</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button type="button" name="profile_student_img" id="profile_student_img" class="btn btn-outline-success" value="img">เปลี่ยนรูป</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>ชื่อ-สกุล : <?php echo @$row["student_name"] . "&nbsp;" . @$row["student_surname"]; ?></h4>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-info">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-12">ประวัติส่วนตัว</div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">บัตรประชาชน&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["student_idcard"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">ชื่อ-สกุล&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["student_name"]; ?>&nbsp;<?php echo @$row["student_surname"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">Name-Surname&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["student_name_eng"]; ?>&nbsp;<?php echo @$row["student_surname_eng"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">ชื่อเล่น&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["nickname"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">เพศ&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9">
                                        <?php
                                        if (($row["gender"] == 1)) {
                                            echo "ชาย";
                                        } elseif (($row["gender"] == 2)) {
                                            echo "หญิง";
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">วันเดือนปีเกิด&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9">

                                        <?php
                                        if (($row["birth_day"] == "" or $row["birth_day"] == "0000-00-00")) {
                                            echo "-";
                                        } else {
                                            $copy_date = date("d-m-Y", strtotime($row["birth_day"]));
                                            $data_age = new dateofbirthRS($copy_date);
                                            echo $row["birth_day"] . " (" . $data_age->agestr . ")";
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">รหัสนิสิต&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["student_id"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">ระดับชั้น&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9">
                                        <?php
                                        $sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$row["grade_id"]}'";
                                        $cc = row_array($sql);
                                        if ((is_array($cc) && count($cc))) {
                                            echo $cc["grade_name"] . " (" . $cc["grade_name_eng"] . ")";
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">ห้องเรียน&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9">
                                        <?php
                                        $sql = "SELECT `classroom_name` FROM `tb_classroom` WHERE `classroom_id`='{$row["student_class"]}';";
                                        $cc = row_array($sql);
                                        if ((is_array($cc) && count($cc))) {
                                            echo $cc["classroom_name"];
                                        } else {
                                            echo "-";
                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } elseif (($manage == "form_add")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลนิสิต</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลนิสิต</button>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <form name="student_data_add" id="student_data_add">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">บัตรประชาชน</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <input type="text" name="idcard" id="idcard" class="form-control" value="" placeholder="กรอกข้อมูลบัตรประชาชน" required="required">
                                                                <span>กรอกข้อมูลบัตรประชาชน</span>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="name-null">
                                                                    <input type="text" name="name" id="name" class="form-control" value="" placeholder="กรอกข้อมูลชื่อ" required="required">
                                                                    <span>กรอกข้อมูลชื่อ</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุล </label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="surname-null">
                                                                    <input type="text" name="surname" id="surname" class="form-control" value="" placeholder="กรอกข้อมูลนามสกุล" required="required">
                                                                    <span>กรอกข้อมูลนามสกุล</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อภาษาอังกฤษ </label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="ename-null">
                                                                    <input type="text" name="ename" id="ename" class="form-control" value="" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">
                                                                    <span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุลภาษาอังกฤษ </label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="esurname-null">
                                                                    <input type="text" name="esurname" id="esurname" class="form-control" value="" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">
                                                                    <span>กรอกข้อมูลนามสกุลภาษาอังกฤษ</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อเล่น </label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="nickname-null">
                                                                    <input type="text" name="nickname" id="nickname" class="form-control" value="" placeholder="กรอกกรอกข้อมูลชื่อเล่น" required="required">
                                                                    <span>กรอกข้อมูลชื่อเล่น</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">เพศ</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <select class="form-control select" name="gender" id="gender" data-placeholder="เลือกเพศ..." required="required">
                                                                    <option></option>
                                                                    <optgroup label="เพศ">
                                                                        <option value="1">ชาย</option>
                                                                        <option value="2">หญิง</option>
                                                                        <option value="0">ไม่ระบุ</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">วันเดือนปีเกิด</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <input type="text" name="birthday" id="birthday" class="form-control pickadate-accessibility rounded-right" value="" placeholder="เลือกวันเดือนปีเกิด" required="required">
                                                                <span>กรอกวันเดือนปีเกิด</span>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">รหัสนิสิต <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="username-null">
                                                                    <input type="text" name="username" id="username" class="form-control" value="" placeholder="กรอกข้อมูลรหัสนิสิต ใช่เป็น Username" required="required">
                                                                    <span>กรอกข้อมูลรหัสนิสิต ใช่เป็น Username</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">Password <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="password-null">
                                                                    <input type="text" name="password" id="password" class="form-control" value="aba@123456" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">
                                                                    <span>ข้อมูล Password เบื้องต้น aba@123456</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ระดับชั้น <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <select class="form-control select" name="grade" id="grade" data-placeholder="เลือกระดับชั้น..." required="required">
                                                                    <option></option>
                                                                    <optgroup label="ระดับชั้น">
                                                                        <?php
                                                                        $sql = "SELECT * FROM tb_grade ORDER BY grade_id ASC";
                                                                        $cc = result_array($sql);
                                                                        ?>
                                                                        <?php foreach ($cc as $_cc) {
                                                                            if (($_cc["grade_id"] == 1)) {
                                                                                $cc_selected = 'selected="selected"';
                                                                            } else {
                                                                                $cc_selected = null;
                                                                            }
                                                                        ?>
                                                                            <option value="<?php echo $_cc['grade_id']; ?>" <?php echo $cc_selected; ?>><?php echo $_cc['grade_name']; ?></option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="grade-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <select class="form-control select" name="classroom" id="classroom" data-placeholder="เลือกระดับชั้น..." required="required">
                                                                    <option></option>
                                                                    <optgroup label="ห้องเรียน">
                                                                        <?php
                                                                        $sql = "SELECT * FROM tb_classroom ORDER BY classroom_name ASC";
                                                                        $cc = result_array($sql);
                                                                        ?>
                                                                        <?php foreach ($cc as $_cc) { ?>
                                                                            <option value="<?php echo $_cc['classroom_id']; ?>"><?php echo $_cc['classroom_name']; ?></option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="classroom-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">สถานะนิสิต <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <select class="form-control select" name="status" id="status" data-placeholder="เลือกสถานะนิสิต.." required="required">
                                                                    <option></option>
                                                                    <optgroup label="สถานะนิสิต">
                                                                        <option value="1">ปกติ</option>
                                                                        <option value="2">ลาออก</option>
                                                                        <option value="3">จบการศึกษา</option>
                                                                        <option value="4">ลาพัก</option>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="status-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <button type="button" name="Add_Student_Data" id="Add_Student_Data" class="btn btn-info" value="">บันทึก</button>&nbsp;
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
                <!--The test-->
                <!--<div id="test_set"></div>-->
                <!--The test-->
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } elseif (($manage == "form_edit")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                @$student_key = base64_decode(filter_input(INPUT_GET, 'student_key'));
                if (($student_key != null)) {
                    $sql = "SELECT * FROM tb_student WHERE student_id = '{$student_key}'";
                    $row = row_array($sql); ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลนิสิต</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลนิสิต</button>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="student_data_edit" id="student_data_edit">
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">บัตรประชาชน</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <input type="text" name="idcard" id="idcard" class="form-control" value="<?php echo $row['student_idcard']; ?>" placeholder="กรอกข้อมูลบัตรประชาชน">
                                                                    <span>กรอกข้อมูลบัตรประชาชน</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="name-edit">
                                                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['student_name']; ?>" placeholder="กรอกข้อมูลชื่อ" required="required">
                                                                        <span>กรอกข้อมูลชื่อ</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุล </label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="surname-edit">
                                                                        <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $row['student_surname']; ?>" placeholder="กรอกข้อมูลนามสกุล">
                                                                        <span>กรอกข้อมูลนามสกุล</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อภาษาอังกฤษ </label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="ename-edit">
                                                                        <input type="text" name="ename" id="ename" class="form-control" value="<?php echo $row['student_name_eng']; ?>" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ">
                                                                        <span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุลภาษาอังกฤษ </label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="esurname-edit">
                                                                        <input type="text" name="esurname" id="esurname" class="form-control" value="<?php echo $row['student_surname_eng']; ?>" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ">
                                                                        <span>กรอกข้อมูลนามสกุลภาษาอังกฤษ</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อเล่น </label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="nickname-edit">
                                                                        <input type="text" name="nickname" id="nickname" class="form-control" value="<?php echo $row['nickname']; ?>" placeholder="กรอกกรอกข้อมูลชื่อเล่น">
                                                                        <span>กรอกข้อมูลชื่อเล่น</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">เพศ</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <select class="form-control select" name="gender" id="gender" data-placeholder="เลือกเพศ...">
                                                                        <option></option>
                                                                        <optgroup label="เพศ">
                                                                            <option <?php echo $row['gender'] == 1 ? "selected" : ""; ?> value="1">ชาย</option>
                                                                            <option <?php echo $row['gender'] == 2 ? "selected" : ""; ?> value="2">หญิง</option>
                                                                            <option <?php echo $row['gender'] == 0 ? "selected" : ""; ?> value="0">ไม่ระบุ</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">วันเดือนปีเกิด</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <?php
                                                                    if (($row['birth_day'] != null)) { ?>
                                                                        <input type="text" name="birthday" id="birthday" class="form-control pickadate-accessibility rounded-right" value="<?php echo date("Y-m-d", strtotime($row['birth_day'])); ?>" placeholder="เลือกวันเดือนปีเกิด" required="required">
                                                                        <span>กรอกวันเดือนปีเกิด</span>
                                                                    <?php    } else { ?>
                                                                        <input type="text" name="birthday" id="birthday" class="form-control pickadate-accessibility rounded-right" value="" placeholder="เลือกวันเดือนปีเกิด">
                                                                        <span>กรอกวันเดือนปีเกิด</span>
                                                                    <?php    } ?>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">รหัสนิสิต <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="username-edit">
                                                                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['student_id']; ?>" placeholder="กรอกข้อมูลรหัสนิสิต ใช่เป็น Username" required="required" readonly="readonly">
                                                                        <span>กรอกข้อมูลรหัสนิสิต ใช่เป็น Username</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ระดับชั้น <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <select class="form-control select" name="grade" id="grade" data-placeholder="เลือกระดับชั้น..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ระดับชั้น">
                                                                            <?php
                                                                            $sql = "SELECT * FROM tb_grade ORDER BY grade_id ASC";
                                                                            $cc = result_array($sql);
                                                                            ?>
                                                                            <?php foreach ($cc as $_cc) { ?>
                                                                                <option <?php echo $row['grade_id'] == $_cc['grade_id'] ? "selected" : ""; ?> value="<?php echo $_cc['grade_id']; ?>"><?php echo $_cc['grade_name']; ?></option>
                                                                            <?php } ?>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="grade-edit"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <select class="form-control select" name="classroom" id="classroom" data-placeholder="เลือกระดับชั้น..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ห้องเรียน">
                                                                            <?php
                                                                            $sql = "SELECT * FROM tb_classroom ORDER BY classroom_name ASC";
                                                                            $cc = result_array($sql);
                                                                            ?>
                                                                            <?php foreach ($cc as $_cc) { ?>
                                                                                <option <?php echo $row['student_class'] == $_cc['classroom_id'] ? "selected" : ""; ?> value="<?php echo $_cc['classroom_id']; ?>"><?php echo $_cc['classroom_name']; ?></option>
                                                                            <?php } ?>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="classroom-edit"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">สถานะนิสิต <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <select class="form-control select" name="status" id="status" data-placeholder="เลือกสถานะนิสิต.." required="required">
                                                                        <option></option>
                                                                        <optgroup label="สถานะนิสิต">
                                                                            <option <?php echo $row['student_status'] == 1 ? "selected" : ""; ?> value="1">ปกติ</option>
                                                                            <option <?php echo $row['student_status'] == 2 ? "selected" : ""; ?> value="2">ลาออก</option>
                                                                            <option <?php echo $row['student_status'] == 3 ? "selected" : ""; ?> value="3">จบการศึกษา</option>
                                                                            <option <?php echo $row['student_status'] == 4 ? "selected" : ""; ?> value="4">ลาพัก</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="status-edit"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <button type="button" name="edit_teacher_data1" id="edit_teacher_data1" class="btn btn-info">บันทึก</button>&nbsp;
                                                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="student_key" id="student_key" value="<?php echo $row['student_id']; ?>">
                                                </from>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                    $linkcopy = $RunLink->Call_Link_System();
                    exit("<script>window.location='$linkcopy/?modules=student_data1';</script>");
                } ?>

                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } elseif (($manage == "password")) { ?>

                <?php
                @$student_key = base64_decode(filter_input(INPUT_GET, 'student_key'));
                if (($student_key != "")) {

                    $sql = "SELECT * FROM tb_student WHERE student_id = '{$student_key}'";
                    $row = row_array($sql);

                ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="toast" style="opacity: 1; max-width: none;">
                                <div class="toast-header bg-success border-success">
                                    <span class="font-weight-semibold mr-auto">ฟอร์มเปลี่ยนรหัสผ่าน</span>
                                </div>
                                <div class="toast-body">
                                    <form name="student_data_password" id="student_data_password" method="post" accept-charset="utf-8">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-<?php echo $grid; ?>-4">รหัส</label>
                                                        <div class="col-<?php echo $grid; ?>-8">
                                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                                <input type="text" name="student_key" id="student_key" class="form-control form-control-lg" value="<?php echo @$row['student_id']; ?>" required="required" readonly="readonly">
                                                                <div class="form-control-feedback form-control-feedback-lg">
                                                                    <i class="icon-credit-card"></i>
                                                                </div>
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
                                                        <label class="col-form-label col-<?php echo $grid; ?>-4">ชื่อ-นามสกุล</label>
                                                        <div class="col-<?php echo $grid; ?>-8">
                                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                                <input type="text" name="student_name" id="student_name" class="form-control form-control-lg" value="<?php echo @$row['student_name'] . " " . @$row['student_surname'] . " (" . @$row['nickname'] . ")"; ?>" required="required" readonly="readonly">
                                                                <div class="form-control-feedback form-control-feedback-lg">
                                                                    <i class="icon-users2"></i>
                                                                </div>
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
                                                        <label class="col-form-label col-<?php echo $grid; ?>-4">รหัสผ่านใหม่</label>
                                                        <div class="col-<?php echo $grid; ?>-8">
                                                            <div id="password-edit">
                                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                                    <input type="text" name="student_password" id="student_password" class="form-control form-control-lg" value="aba@123456" required="required">
                                                                    <span>กรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร ต้องมีตัวเลขและตัวอังกฤษ(รหัสผ่านเบื้องต้น aba@123456)</span>
                                                                    <div class="form-control-feedback form-control-feedback-lg">
                                                                        <i class="icon-key"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3" style="float: right">
                                                    <button type="button" name="StudentDataPassword" id="StudentDataPassword" class="btn btn-info">บันทึก</button>&nbsp;
                                                    <button type="reset" name="changepass_cancel" id="changepass_cancel" class="btn btn-danger">ยกเลิก</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                    $linkcopy = $RunLink->Call_Link_System();
                    exit("<script>window.location='$linkcopy/?modules=student_data1';</script>");
                } ?>

            <?php   } else {

                @$classroom_id = base64_decode(filter_input(INPUT_GET, 'classroom'));
            ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลนิสิตทั้งหมด</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลนิสิต</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <form name="student_data_read" id="student_data_read">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable-button-html5-columns-STD">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>
                                                                <div>ลำดับ</div>
                                                            </th>
                                                            <th>
                                                                <div>รหัส</div>
                                                            </th>
                                                            <th>
                                                                <div>รายชื่อ</div>
                                                            </th>
                                                            <th>
                                                                <div>รายชื่อ(Eng)</div>
                                                            </th>
                                                            <th>
                                                                <div>บัตร</div>
                                                            </th>
                                                            <th>
                                                                <div>วันเดือนปีเกิด</div>
                                                            </th>
                                                            <th>
                                                                <div>ชื่อเล่น</div>
                                                            </th>
                                                            <th>
                                                                <div>เพศ</div>
                                                            </th>
                                                            <th>
                                                                <div>เบอร์โทร</div>
                                                            </th>
                                                            <th>
                                                                <div>ห้องเรียน</div>
                                                            </th>
                                                            <th style="width: 18%;">
                                                                <div>จัดการ</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php


                                                        if ((isset($classroom))) {
                                                            //$sql = "SELECT * FROM tb_student a INNER JOIN tb_classroom b ON a.student_class=b.classroom_id WHERE a.grade_id = '{$check_grade}' AND a.student_status='1' AND (a.student_no != '0' OR a.student_no != '') AND a.student_status='1' AND b.classroom_id = '{$classroom}' ORDER BY a.student_class ASC ,a.student_no ASC";
                                                            $sql = "SELECT * FROM tb_student a INNER JOIN tb_classroom b ON a.student_class=b.classroom_id WHERE a.grade_id = '{$check_grade}' AND a.student_status='1'  AND a.student_status='1' AND b.classroom_id = '{$classroom}' ORDER BY a.student_class ASC ,a.student_no ASC";
                                                        } elseif ((!isset($classroom))) {
                                                            $sql = "SELECT * FROM tb_student WHERE grade_id = '{$check_grade}' AND student_status='1' AND (student_no !='0' OR student_no='') AND student_status='1' ORDER BY student_class ASC ,student_no ASC";
                                                        } else {
                                                        }

                                                        $list = result_array($sql);
                                                        ?>
                                                        <?php foreach ($list as $key => $row) { ?>

                                                            <?php
                                                            if (($row['gender'] == '1')) {
                                                                $gender = "ชาย";
                                                            } elseif (($row['gender'] == '2')) {
                                                                $gender = "หญิง";
                                                            }

                                                            $sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$row[student_class]'";
                                                            $rowC = row_array($sqlC);

                                                            if (($row['birth_day'] == "" || $row['birth_day'] == "0000-00-00")) {
                                                                $birth_day = "";
                                                            } else {
                                                                $birth_day = date_short_th($row['birth_day']);
                                                            }

                                                            ?>

                                                            <tr>
                                                                <td align="center">
                                                                    <div><?php echo $key + 1; ?></div>
                                                                </td>
                                                                <td align="center">
                                                                    <div><?php echo @$row['student_id']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['student_name']; ?>&nbsp;<?php echo @$row['student_surname']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['student_name_eng']; ?>&nbsp;<?php echo @$row['student_surname_eng']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['student_idcard']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$birth_day; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['nickname']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$gender; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['student_tel']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$rowC['classroom_name']; ?></div>
                                                                </td>
                                                                <td style="width: 18%;" align="center">
                                                                    <div align="center">
                                                                        <button type="button" name="" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=password&student_key=<?php echo base64_encode($row['student_id']); ?>';" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="เปลี่ยนรหัสผ่าน" data-placement="bottom" value=""><i class="icon-key"></i></button>
                                                                        <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=profile&student_key=<?php echo base64_encode($row['student_id']); ?>&classroom=<?php echo base64_encode($row['classroom_id']); ?>';" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom"><i class="icon-search4"></i></button>
                                                                        <button type="button" name="Up_Student_Data" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=form_edit&student_key=<?php echo base64_encode($row['student_id']); ?>&classroom=<?php echo base64_encode($row['classroom_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo $row['student_id']; ?>"><i class="icon-pen"></i></button>
                                                                        <button type="button" name="Delete_Student_Data" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['student_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>


                                                            <!--Delete-->
                                                            <div id="modal_theme_success_Delete<?php echo $row['student_id']; ?>" class="modal fade" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white">
                                                                            <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form name="student-data-delete" id="student-data-delete" method="post" accept-charset="utf-8">
                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                ต้องการลบข้อมูล <?php echo $row['student_name'] . " " . $row['student_surname']; ?> หรือไม่
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><br>
                                                                                <div class="row" style="text-align: center;">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <button type="button" id="delete_<?php echo $row['student_id']; ?>" name="delete_<?php echo $row['student_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['student_id']; ?>">ใช่</button>
                                                                                        <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                    </div>
                                                                                </div>

                                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                <!--Delete-->
                                                                                <script>
                                                                                    var ABA_DeleteStudentData<?php echo $row['student_id']; ?> = function() {
                                                                                        var _componentABA_DeleteStudentData = function() {
                                                                                            if (typeof swal == 'undefined') {
                                                                                                console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                return;
                                                                                            }
                                                                                            // Defaults
                                                                                            var swalInitDeleteStudentData = swal.mixin({
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
                                                                                            $('#delete_<?php echo $row['student_id']; ?>').on('click', function() {

                                                                                                var action = "delete";
                                                                                                var table = "tb_student";
                                                                                                var ff = "student_id";
                                                                                                var student_key = $("#delete_<?php echo $row['student_id']; ?>").val();;

                                                                                                if (action == "") {
                                                                                                    swalInitDeleteStudentData.fire({
                                                                                                        title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                        icon: 'error'
                                                                                                    });
                                                                                                } else {

                                                                                                    if (student_key != "") {
                                                                                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/student_data1/student_data1_process.php", {
                                                                                                            action: action,
                                                                                                            table: table,
                                                                                                            ff: ff,
                                                                                                            student_key: student_key
                                                                                                        }, function(process_add) {
                                                                                                            var process_add = process_add;
                                                                                                            if (process_add.trim() === "no_error") {

                                                                                                                let timerInterval;
                                                                                                                swalInitDeleteStudentData.fire({
                                                                                                                    title: 'ลบสำเร็จ',
                                                                                                                    //html: 'I will close in <b></b> milliseconds.',
                                                                                                                    timer: 1200,
                                                                                                                    icon: 'success',
                                                                                                                    timerProgressBar: true,
                                                                                                                    didOpen: function() {
                                                                                                                        Swal.showLoading()
                                                                                                                        timerInterval = setInterval(function() {
                                                                                                                            const content = Swal.getContent();
                                                                                                                            if (content) {
                                                                                                                                const b_student_data = content.querySelector('b_student_data')
                                                                                                                                if (b_student_data) {
                                                                                                                                    b_student_data.textContent = Swal.getTimerLeft();
                                                                                                                                } else {}
                                                                                                                            } else {}
                                                                                                                        }, 100);
                                                                                                                    },
                                                                                                                    willClose: function() {
                                                                                                                        clearInterval(timerInterval)
                                                                                                                    }
                                                                                                                }).then(function(result) {
                                                                                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                        document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1";
                                                                                                                    } else {}
                                                                                                                });

                                                                                                            } else if (process_add.trim() === "it_error") {
                                                                                                                swalInitDeleteStudentData.fire({
                                                                                                                    title: 'ข้อมูลซ้ำ',
                                                                                                                    icon: 'error'
                                                                                                                });
                                                                                                            } else {
                                                                                                                swalInitDeleteStudentData.fire({
                                                                                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                                                                                    icon: 'error'
                                                                                                                });
                                                                                                            }
                                                                                                        })

                                                                                                    } else {}

                                                                                                }
                                                                                            });

                                                                                            //--------------------------------------------------------------------------------------
                                                                                        };
                                                                                        //--------------------------------------------------------------------------------------
                                                                                        return {
                                                                                            initComponentsDeleteStudentData: function() {
                                                                                                _componentABA_DeleteStudentData();
                                                                                            }
                                                                                        }
                                                                                    }();
                                                                                    // Initialize module
                                                                                    // ------------------------------
                                                                                    document.addEventListener('DOMContentLoaded', function() {
                                                                                        ABA_DeleteStudentData<?php echo $row['student_id']; ?>.initComponentsDeleteStudentData();
                                                                                    });
                                                                                </script>
                                                                                <!--Delete end-->
                                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Delete End-->



                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } ?>

        </div>

        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } else {
    }
}
?>