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
if ((preg_match("/student_alumni.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=student_data" class="breadcrumb-item"> นิสิตทั้งหมด</a>

                        <a href="?modules=student_alumni" class="breadcrumb-item"> ศิษย์เก่า</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลศิษย์เก่า</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>ข้อมูลศิษย์เก่า</h4>
                </div>
            </div>

            <?php
            @$manage = filter_input(INPUT_POST, 'manage');
            if (($manage == "profile")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                @$student_key = filter_input(INPUT_POST, 'student_key');
                $sql = "SELECT * FROM `tb_student` WHERE `student_id` = '{$student_key}'";
                $row = row_array($sql);
                ?>


                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <table>
                            <tr>
                                <td>
                                    <div>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni';" class="btn btn-outline-success" value="">รายการ</button>
                                    </div>
                                </td>
                                <td>

                                    <div>
                                        <form name="form_show" id="form_show" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni">
                                            <button type="submit" name="button_show" id="button_show" class="btn btn-outline-success" value="">ประวัติส่วนตัว</button>
                                            <input type="hidden" name="student_key" id="student_key" value="<?php echo @$row['student_id']; ?>">
                                            <input type="hidden" name="manage" id="manage" value="profile">
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <form name="update_ta" id="update_ta" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni">
                                            <button type="submit" name="submit_update" id="submit_update" class="btn btn-outline-success" value="">แก้ไขประวัติส่วนตัว</button>
                                            <input type="hidden" name="student_key" id="student_key" value="<?php echo @$row['student_id']; ?>">
                                            <input type="hidden" name="manage" id="manage" value="form_edit">
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
                        <h4>ชื่อ-สกุล : <?php echo @$row["student_name"] . "&nbsp;" . @$row["student_lastname"]; ?></h4>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-info">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ประวัติส่วนตัว</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                </div>
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
            <?php } elseif (($manage == "man_student")) { ?>
                <?php
                @$check_grade = filter_input(INPUT_POST, 'check_grade');
                @$student_id = filter_input(INPUT_POST, 'student_id');

                if (isset($check_grade)) {
                    //$check_grade=$_REQUEST['check_grade'];
                    $sql = "SELECT * FROM `tb_grade` WHERE `grade_id` = '{$check_grade}'";
                    $row = row_array($sql);
                    $grade = "ระดับชั้น" . @$row['grade_name'];
                } else {
                    $grade = null;
                }

                //$sid = $_GET['sid'];

                $sql = "SELECT * FROM  `tb_student` WHERE `student_id` = '{$student_id}'";
                $row = row_array($sql);

                ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มนำเข้าห้องเรียน</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <?php echo "Student&nbsp;ID&nbsp;" . @$row['student_id'] . "&nbsp;-&nbsp;" . @$row['student_name'] . "&nbsp;" . @$row['student_surname']; ?>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-3">เลือกห้องเรียน </label>
                                                <div class="col-<?php echo $grid; ?>-9">
                                                    <select class="form-control select-search" name="classroom" id="classroom" data-placeholder="เลือกห้องเรียน..." required="required">
                                                        <option></option>
                                                        <optgroup label="ห้องเรียน">
                                                            <?php
                                                            $sql = "SELECT * FROM tb_classroom WHERE classroom_status ='1' ORDER BY classroom_name ASC";
                                                            //$sql = "SELECT * FROM tb_classroom WHERE grade_id = '$check_grade' AND classroom_status ='1' ORDER BY classroom_name ASC";
                                                            $cc = result_array($sql);
                                                            ?>
                                                            <?php foreach ($cc as $_cc) { ?>
                                                                <option value="<?php echo $_cc['classroom_id'] ?>"><?php echo $_cc['classroom_name'] ?></option>
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
                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ระดับชั้น</label>
                                                <div class="col-<?php echo $grid; ?>-9">
                                                    <select class="form-control select" name="grade" id="grade" data-placeholder="เลือกระดับชั้น..." required="required">
                                                        <option></option>
                                                        <optgroup label="ระดับชั้น">
                                                            <?php
                                                            $sql = "SELECT * FROM  `tb_grade` ORDER BY `grade_name` ASC";
                                                            $tst = result_array($sql);
                                                            ?>

                                                            <?php foreach ($tst as $_tst) { ?>
                                                                <option <?php echo @$_tst["grade_id"] == $check_grade ? "selected" : ""; ?> value="<?php echo @$_tst["grade_id"] ?>"><?php echo @$_tst["grade_name"]; ?></option>
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
                                                <button type="button" name="Add_Alumni_data" id="Add_Alumni_data" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                <form name="alumni_data" id="alumni_data" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni" accept-charset="utf-8">
                                                    <button type="submit" class="btn btn-danger">ยกเลิก</button>
                                                    <input type="hidden" name="manage" id="manage" value="man_student">
                                                    <input type="hidden" name="check_grade" id="check_grade" value="<?php echo @$row["grade_id"]; ?>">
                                                    <input type="hidden" name="student_key" id="student_key" value="<?php echo @$row["student_id"]; ?>">

                                                </form>






                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>" />
                                <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>" />

                            </div>
                        </div>
                    </div>

                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php  } elseif (($manage == "form_edit")) { ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    //@$student_key = base64_decode(filter_input(INPUT_GET, 'student_key'));
                    @$student_key = filter_input(INPUT_POST, 'student_key');
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
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">บัตรประชาชน</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <input type="text" name="idcard" id="idcard" class="form-control" value="<?php echo $row['student_idcard']; ?>" placeholder="กรอกข้อมูลบัตรประชาชน" required="required">
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
                                                                        <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $row['student_surname']; ?>" placeholder="กรอกข้อมูลนามสกุล" required="required">
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
                                                                        <input type="text" name="ename" id="ename" class="form-control" value="<?php echo $row['student_name_eng']; ?>" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">
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
                                                                        <input type="text" name="esurname" id="esurname" class="form-control" value="<?php echo $row['student_surname_eng']; ?>" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">
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
                                                                        <input type="text" name="nickname" id="nickname" class="form-control" value="<?php echo $row['nickname']; ?>" placeholder="กรอกกรอกข้อมูลชื่อเล่น" required="required">
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">วันที่เข้า</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <?php
                                                                    if ($row['date_in'] == "" || $row['date_in'] == "0000-00-00") {
                                                                        $now_date = date("Y-m-d");

                                                                    ?>
                                                                        <input type="text" name="datein" id="datein" class="form-control pickadate-accessibility rounded-right" value="<?php echo $now_date; ?>" placeholder="เลือกวันที่เข้า" required="required">
                                                                        <span>กรอกวันที่เข้า</span>

                                                                    <?php
                                                                    } elseif (($row['date_in'] != null)) {

                                                                        $date_in = @$row['date_in'];
                                                                        $txt_date_in = new strto_datetime("th_year", $date_in);
                                                                    ?>
                                                                        <input type="text" name="datein" id="datein" class="form-control pickadate-accessibility rounded-right" value="<?php echo date("Y-m-d", strtotime(@$row['date_in'])); ?>" placeholder="เลือกวันที่เข้า" required="required">
                                                                        <span>กรอกวันที่เข้า</span>

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
                                                <!--<div class="row">
                                                    <div class="col-<?php //echo $grid; 
                                                                    ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php //echo $grid; 
                                                                                                    ?>-3">Password <font style="color: red;">*</font></label>
                                                                <div class="col-<?php //echo $grid; 
                                                                                ?>-9">
                                                                    <div id="password-edit">
                                                                        <input type="text" name="password" id="password" class="form-control" value="<?php //echo $row['student_password']; 
                                                                                                                                                        ?>" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required" readonly="readonly">
                                                                        <span>ข้อมูล Password เบื้องต้น aba@123456</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>-->
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
                                                                <button type="button" name="Edit_Student_Data" id="Edit_Student_Data" class="btn btn-info" value="<?php echo $row['student_id']; ?>">บันทึก</button>&nbsp;
                                                                <form name="drop_data_reset" id="drop_data_reset" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_drop">
                                                                    <button type="submit" class="btn btn-danger">ยกเลิก</button>
                                                                    <input type="hidden" name="manage" value="form_edit">
                                                                    <input type="hidden" name="student_key" id="student_key" value="<?php echo $row['student_id']; ?>">

                                                                </form>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                        $linkcopy = $RunLink->Call_Link_System();
                        exit("<script>window.location='$linkcopy/?modules=student_alumni';</script>");
                    } ?>

                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                <?php   } else { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลนิสิต</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='#';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">

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
                                                                <div>อีเมล์</div>
                                                            </th>
                                                            <th style="width: 10%;">
                                                                <div>จัดการ</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $sql = "SELECT * FROM tb_student WHERE student_status='2' OR student_status='3' ORDER BY year_term DESC , student_name ASC";
                                                        $list = result_array($sql);
                                                        ?>
                                                        <?php foreach ($list as $key => $row) { ?>

                                                            <?php
                                                            if (($row['gender'] == '1')) {
                                                                $gender = "ชาย";
                                                            } elseif (($row['gender'] == '2')) {
                                                                $gender = "หญิง";
                                                            } else {
                                                                $gender = null;
                                                            }
                                                            ?>

                                                            <?php
                                                            if (@$row['birth_day'] == "" || @$row['birth_day'] == "0000-00-00") {
                                                                $birth_day = "-";
                                                            } else {
                                                                $birth_day = @$row['birth_day'];
                                                                $txt_birth_day = new strto_datetime("th_year", $birth_day);
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
                                                                    <div><?php echo @$row['student_name'] . "&nbsp;" . @$row['student_surname']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['student_idcard']; ?></div>
                                                                </td>

                                                                <td>
                                                                    <?php
                                                                    if (@$row['birth_day'] == "" || @$row['birth_day'] == "0000-00-00") {
                                                                        $birth_day_show = "-";
                                                                    } else {
                                                                        $birth_day_show = $txt_birth_day->print_datetime();
                                                                    }

                                                                    ?>

                                                                    <div><?php echo $birth_day_show; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['nickname']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo $gender; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['student_tel']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div><?php echo @$row['student_email']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div align="right">

                                                                        <ul class="nav">
                                                                            <li class="nav-item">
                                                                                <form name="drop_data_up<?php echo @$row['student_id']; ?>" id="drop_data_up<?php echo @$row['student_id']; ?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni" accept-charset="utf-8">
                                                                                    <button type="submit" name="button_show" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>
                                                                                    <input type="hidden" name="manage" value="profile"><input type="hidden" name="student_key" id="student_key" value="<?php echo @$row['student_id']; ?>">
                                                                                </form>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <form name="alumni_data<?php echo @$row['student_id']; ?>" id="alumni_data<?php echo @$row['student_id']; ?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni" accept-charset="utf-8">
                                                                                    <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="นำเข้าห้อง" data-placement="bottom" value=""><i class="icon-plus22"></i></button>
                                                                                    <input type="hidden" name="manage" id="manage" value="man_student"> <input type="hidden" name="check_grade" id="check_grade" value="<?php echo @$row["grade_id"]; ?>"> <input type="hidden" name="student_id" id="student_id" value="<?php echo @$row["student_id"]; ?>">
                                                                                </form>
                                                                            </li>
                                                                        </ul>




                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        <?php   } ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php   } else {
    }
} ?>

                </div>