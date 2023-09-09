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
if ((preg_match("/teacher_data3.php/", $_SERVER['PHP_SELF']))) {
    Header("Location:../index.php");
    die();
} else {




    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=teacher_data3" class="breadcrumb-item"> ครู บุคลากร(ออกแล้ว)</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลคครู บุคลากร(ออกแล้ว)</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <?php
            @$list = filter_input(INPUT_GET, 'list');
            @$list = base64_decode($list);
            //@$id=filter_input(INPUT_GET, 'id');
            if (($list == "profile")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                $teacher_key = base64_decode(filter_input(INPUT_GET, 'teacher_key'));
                //$list=filter_input(INPUT_GET,'list');
                //$manage=filter_input(INPUT_GET,'manage');
                if ((!is_null($teacher_key))) {

                    $sql = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$teacher_key}'";
                    $fe_row = row_array($sql);

                ?>


                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">

                            <table>
                                <tr>
                                    <td>
                                        <div>
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3';" class="btn btn-outline-success" value="">รายการ</button>
                                        </div>
                                    </td>
                                    <td>

                                        <div>
                                            <form name="form_show" id="form_show" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3&list=<?php echo base64_encode('profile'); ?>&teacher_key=<?php echo base64_encode(@$fe_row['teacher_id']); ?>">
                                                <button type="submit" name="button_show" id="button_show" class="btn btn-outline-success" value="">ประวัติส่วนตัว</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <form name="update_ta" id="update_ta" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3&manage=form_edit&teacher_key=<?php echo base64_encode(@$fe_row['teacher_id']); ?>">
                                                <button type="submit" name="submit_update" id="submit_update" class="btn btn-outline-success" value="">แก้ไขประวัติส่วนตัว</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button type="button" name="profile_teacher_img" id="profile_teacher_img" class="btn btn-outline-success" value="img">เปลี่ยนรูป</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <h4>ชื่อ-สกุล : <?php echo @$fe_row['teacher_name'] . " " . @$fe_row['teacher_surname']; ?></h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-info">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <h6 class="card-title">ประวัติส่วนตัว</h6>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">Username : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['teacher_username']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">เลขที่บัตรประชาชน : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['teacher_idcard']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ชื่อ-นามสกุล : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['teacher_name']; ?>&nbsp;<?php echo @$fe_row['teacher_surname']; ?>&nbsp;(<?php echo @$fe_row['nickname']; ?>)</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">Name-Surname :</div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['teacher_name_eng']; ?>&nbsp;<?php echo @$fe_row['teacher_surname_eng']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">เพศ : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo teacher_gender(@$fe_row['gender']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ศาสนา : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['religion']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">เชื้อชาติ : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['race']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">สัญชาติ : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['nationality']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">วันเดือนปีเกิด : </div>
                                        <?php
                                        if ($fe_row['birth_day'] == "" || $fe_row['birth_day'] == "0000-00-00") {
                                        } else {
                                        ?>
                                            <div class="col-<?php echo $grid; ?>-9"><?php echo date_full_th(@$fe_row['birth_day']); ?></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">สถานที่เกิด : </div>
                                        <div class="col-<?php echo $grid; ?>-9">
                                            <?php
                                            if ((is_null($fe_row['birthplace']))) {
                                                echo "-";
                                            } else {
                                                echo @$fe_row['birthplace'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">สถานภาพ : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo marital_status(@$fe_row['marital_status']); ?></div>
                                    </div>
                                    <?php
                                    $sqlTc = "SELECT * FROM  `tb_teacher_section` WHERE `teacher_section_id` = '{$fe_row['teacher_section_id']}'";
                                    $rowTc = row_array($sqlTc);
                                    ?>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ตำแหน่ง :</div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['position']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">แผนก : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$rowTc['teacher_section_name']; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ประเภทครู : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo teacher_status(@$fe_row['teacher_type']); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ครูประจำชั้น : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo teacher_class_status(@$fe_row['teacher_class']); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ครูประจำรายวิชา : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo teacher_teach_status(@$fe_row['teacher_teach']); ?></div>
                                    </div>


                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">สถานะครู : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo work_status(@$fe_row['teacher_work']); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-info">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <h6 class="card-title">วุฒิการศึกษา</h6>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">วุฒิการศึกษา : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row['education_name']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">สาขา : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row['major_name']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-info">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <h6 class="card-title">ที่อยู่ตามทะเบียนบ้าน</h6>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ที่อยู่ : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row['teacher_address']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">เบอร์โทรศัพท์มือถือ : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row['mobile']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">อีเมล์ : </div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row['email']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php   } else {
                } ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } else { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                $manage = filter_input(INPUT_GET, 'manage');
                if (($manage == "form_add")) { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } elseif (($manage == "form_edit")) { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    @$teacher_key = base64_decode(filter_input(INPUT_GET, 'teacher_key'));
                    if (($teacher_key != null)) {
                        $sql = "SELECT * FROM tb_teacher WHERE teacher_id = '{$teacher_key}'";
                        $row = row_array($sql);
                    ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลครู</div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="teacher_data3_form_edit" id="teacher_data3_form_edit" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="name-edit">
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo @$row['teacher_name']; ?>" placeholder="กรอกข้อมูลชื่อ" required="required">
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุล</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <input type="text" name="surname" id="surname" class="form-control" value="<?php echo @$row['teacher_surname']; ?>" placeholder="กรอกข้อมูลนามสกุล" required="required">
                                                                        <span>กรอกข้อมูลนามสกุล</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ตำแหน่ง</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <input type="text" name="position" id="position" class="form-control" value="<?php echo @$row['position']; ?>" placeholder="กรอกข้อมูลตำแหน่ง" required="required">
                                                                        <span>กรอกข้อมูลตำแหน่ง</span>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">แผนก</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="section" id="section" data-placeholder="เลือกแผนก..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="แผนก">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  `tb_teacher_section` ORDER BY `teacher_section_id` ASC";
                                                                                $tt = result_array($sql);
                                                                                foreach ($tt as $_tt) { ?>
                                                                                    <option <?php echo @$row['teacher_section_id'] == @$_tt['teacher_section_id'] ? "selected" : ""; ?> value="<?php echo @$_tt['teacher_section_id'] ?>"><?php echo @$_tt['teacher_section_name']; ?></option>
                                                                                <?php    } ?>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ประเภทครู</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="ttype" id="ttype" data-placeholder="เลือกประเภทครู..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ประเภทครู">
                                                                                <option <?php echo @$row['teacher_type'] == 1 ? "selected" : ""; ?> value="1">ครูไทย</option>
                                                                                <option <?php echo @$row['teacher_type'] == 2 ? "selected" : ""; ?> value="2">ครูต่างประเทศ</option>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ครูประจำชั้น</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="tclass" id="tclass" data-placeholder="เลือกครูประจำชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ครูประจำชั้น">
                                                                                <option <?php echo @$row['teacher_class'] == 1 ? "selected" : ""; ?> value="1">เป็น</option>
                                                                                <option <?php echo @$row['teacher_class'] == 0 ? "selected" : ""; ?> value="0">ไม่เป็น</option>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ครูประจำรายวิชา</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="tteach" id="tteach" data-placeholder="เลือกครูประจำรายวิชา..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ครูประจำรายวิชา">
                                                                                <option <?php echo @$row['teacher_teach'] == 1 ? "selected" : ""; ?> value="1">เป็น</option>
                                                                                <option <?php echo @$row['teacher_teach'] == 0 ? "selected" : ""; ?> value="0">ไม่เป็น</option>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">Username <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="username-edit">
                                                                            <input type="text" name="username_show" id="username_show" class="form-control" value="<?php echo @$row['teacher_username'] ?>" placeholder="กรอก Username" required="required" disabled>
                                                                            <input type="hidden" name="username" id="username" class="form-control" value="<?php echo @$row['teacher_username'] ?>" placeholder="กรอก Username" required="required">
                                                                            <span>ข้อมูล Username</span>
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
                                                <input type="text" name="password" id="password" class="form-control" value="aba@123456" placeholder="กรอก Password" required="required">
                                                <span>กรอก Password เบื้องต้น aba@123456</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">สถานภาพการทำงาน <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="status_work" id="status_work" data-placeholder="เลือกสถานภาพการทำงาน..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="สถานภาพการทำงาน">
                                                                                <option <?php echo @$row['teacher_work'] == 1 ? "selected" : ""; ?> value="1">ทำงาน</option>
                                                                                <option <?php echo @$row['teacher_work'] == 0 ? "selected" : ""; ?> value="0">ออกแล้ว</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="status_work-edit"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <button type="button" name="Edit_teacher_data3" id="Edit_teacher_data3" class="btn btn-info" value="<?php echo @$row['teacher_id']; ?>">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="td_id" id="td_id" value="3">
                                                    <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>">


                                                    </from>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                        $linkcopy = $RunLink->Call_Link_System();
                        exit("<script>window.location='$linkcopy/?modules=teacher_data3';</script>");
                    }
                    ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } elseif (($manage == "password")) { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    @$teacher_key = base64_decode(filter_input(INPUT_GET, 'teacher_key'));
                    if (($teacher_key != "")) {
                        $sql = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$teacher_key}'";
                        $row = row_array($sql);
                    ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="toast" style="opacity: 1; max-width: none;">
                                    <div class="toast-header bg-success border-success">
                                        <span class="font-weight-semibold mr-auto">ฟอร์มเปลี่ยนรหัสผ่าน</span>
                                    </div>
                                    <div class="toast-body">
                                        <form name="teacher_data3_password" id="teacher_data3_password" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-4">ชื่อ-นามสกุล</label>
                                                            <div class="col-<?php echo $grid; ?>-8">
                                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left"><?php echo @$row['teacher_name']; ?> <?php echo @$row['teacher_surname']; ?>
                                                                        <?php
                                                                        if ($row['nickname'] == "") {
                                                                        } else {
                                                                            echo "(  $row[nickname] )";
                                                                        }
                                                                        ?>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-4">ตำแหน่ง</label>
                                                            <div class="col-<?php echo $grid; ?>-8">
                                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left"><?php echo @$row['position']; ?></div>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-4">ชื่อผู้ใช่</label>
                                                            <div class="col-<?php echo $grid; ?>-8">
                                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left"><?php echo @$row['teacher_username']; ?>
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
                                                                <div id="password-pass">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                                        <input type="text" name="password" id="password" class="form-control form-control-lg" value="aba@123456" required="required">
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
                                                        <button type="button" name="password_teacher_data3" id="password_teacher_data3" class="btn btn-info">บันทึก</button>&nbsp;
                                                        <button type="reset" name="changepass_cancel" id="changepass_cancel" class="btn btn-danger">ยกเลิก</button>
                                                        <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>">
                                                </div>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                        $linkcopy = $RunLink->Call_Link_System();
                        exit("<script>window.location='$linkcopy/?modules=teacher_data3';</script>");
                    } ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลครู บุคลากร(ออกแล้ว)</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="teacher_data3_read" id="teacher_data3_read" method="post" accept-charset="utf-8">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-button-html5-columns-STD">
                                                        <thead>
                                                            <tr align="center">
                                                                <th align="center">
                                                                    <div>ลำดับ</div>
                                                                </th>
                                                                <th>
                                                                    <div>รายชื่อ</div>
                                                                </th>
                                                                <th>
                                                                    <div>รายชื่อ (Eng)</div>
                                                                </th>
                                                                <th>
                                                                    <div>ชื่อเล่น</div>
                                                                </th>
                                                                <th>
                                                                    <div>ตำแหน่ง</div>
                                                                </th>
                                                                <th align="center">
                                                                    <div>แผนก</div>
                                                                </th>
                                                                <th align="center">
                                                                    <div>เบอร์โทร</div>
                                                                </th>
                                                                <th align="center">
                                                                    <div>ชื่อผู้ใช่</div>
                                                                </th>
                                                                <th style="width: 18%;">
                                                                    <div>จัดการ</div>
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $sql = "SELECT * FROM `tb_teacher` WHERE `teacher_work`='0' ORDER BY  `teacher_section_id` ASC, `teacher_name` ASC";
                                                            $list = result_array($sql);
                                                            ?>
                                                            <?php
                                                            $key = 0;
                                                            foreach ($list as $key => $row) {
                                                                $secid = $row['teacher_section_id'];
                                                                $sqlS = "SELECT * FROM `tb_teacher_section` WHERE `teacher_section_id` = '{$secid}'";
                                                                $rowS = row_array($sqlS);
                                                                $key = $key + 1;
                                                            ?>
                                                                <tr>
                                                                    <td align="center">
                                                                        <div><?php echo $key; ?></div>
                                                                    </td>
                                                                    <th>
                                                                        <div><?php echo @$row['teacher_name']; ?>&nbsp;<?php echo @$row['teacher_surname']; ?></div>
                                                                    </th>
                                                                    <th>
                                                                        <div><?php echo @$row['teacher_name_eng']; ?>&nbsp;<?php echo @$row['teacher_surname_eng']; ?></div>
                                                                    </th>
                                                                    <th>
                                                                        <div><?php echo @$row['nickname']; ?></div>
                                                                    </th>
                                                                    <th>
                                                                        <div><?php echo @$row['position']; ?></div>
                                                                    </th>
                                                                    <th align="center">
                                                                        <div><?php echo @$rowS['teacher_section_name']; ?></div>
                                                                    </th>
                                                                    <th align="center">
                                                                        <div><?php echo @$row['mobile']; ?></div>
                                                                    </th>
                                                                    <th align="center">
                                                                        <div><?php echo @$row['teacher_username']; ?></div>
                                                                    </th>
                                                                    <td style="width: 18%;">
                                                                        <div align="center">
                                                                            <button type="button" name="" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3&manage=password&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>';" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="เปลี่ยนรหัสผ่าน" data-placement="bottom" value=""><i class="icon-key"></i></button>

                                                                            <button type="button" name="Showteacher_data" id="Showteacher_data" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3&list=<?php echo base64_encode('profile'); ?>&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>';" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value="<?php echo @$row['teacher_id']; ?>"><i class="icon-search4"></i></button>

                                                                            <button type="button" name="Upteacher_data3" id="Upteacher_data3" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3&manage=form_edit&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo @$row['teacher_id']; ?>"><i class="icon-pen"></i></button>
                                                                            <button type="button" name="modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                <div id="modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" class="modal fade" tabindex="-1">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-danger text-white">
                                                                                <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <form name="teacher-data-delete" id="teacher-data-delete" method="post" accept-charset="utf-8">
                                                                                    <div class="row">
                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                            <div class="row" style="text-align: center;">
                                                                                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                    ต้องการลบข้อมูล <?php echo @$row['teacher_name'] . " " . @$row['teacher_surname']; ?> หรือไม่
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br>

                                                                                    <div class="row" style="text-align: center;">
                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                            <button type="button" id="delete_<?php echo @$row['teacher_id']; ?>" name="delete_<?php echo @$row['teacher_id']; ?>" class="btn btn-outline-success" value="<?php echo @$row['teacher_id']; ?>">ใช่</button>
                                                                                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                    <!--Delete-->
                                                                                    <script>
                                                                                        var ABA_DeleteTeacherAll<?php echo @$row['teacher_id']; ?> = function() {
                                                                                            var _componentABA_DeleteTeacherAll = function() {
                                                                                                if (typeof swal == 'undefined') {
                                                                                                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                    return;
                                                                                                }
                                                                                                // Defaults
                                                                                                var swalInitDeleteTeacherAll = swal.mixin({
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
                                                                                                $('#delete_<?php echo @$row['teacher_id']; ?>').on('click', function() {

                                                                                                    var action = "delete";
                                                                                                    var table = "tb_teacher";
                                                                                                    var ff = "teacher_id";
                                                                                                    var id = $("#delete_<?php echo $row['teacher_id']; ?>").val();

                                                                                                    if (action == "") {

                                                                                                        swalInitDeleteTeacherAll.fire({
                                                                                                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                            icon: 'error'
                                                                                                        });

                                                                                                    } else {

                                                                                                        if (id != "") {
                                                                                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/teacher_data3/teacher_data3_process.php", {
                                                                                                                action: action,
                                                                                                                table: table,
                                                                                                                ff: ff,
                                                                                                                id: id
                                                                                                            }, function(process_add) {
                                                                                                                var process_add = process_add;
                                                                                                                if (process_add.trim() === "no_error") {

                                                                                                                    let timerInterval;
                                                                                                                    swalInitDeleteTeacherAll.fire({
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
                                                                                                                                    const b_teacher_data3 = content.querySelector('b_teacher_data3')
                                                                                                                                    if (b_teacher_data3) {
                                                                                                                                        b_teacher_data3.textContent = Swal.getTimerLeft();
                                                                                                                                    } else {}
                                                                                                                                } else {}
                                                                                                                            }, 100);
                                                                                                                        },
                                                                                                                        willClose: function() {
                                                                                                                            clearInterval(timerInterval)
                                                                                                                        }
                                                                                                                    }).then(function(result) {
                                                                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3";
                                                                                                                        } else {}
                                                                                                                    });

                                                                                                                } else if (process_add.trim() === "it_error") {
                                                                                                                    swalInitDeleteTeacherAll.fire({
                                                                                                                        title: 'ข้อมูลซ้ำ',
                                                                                                                        icon: 'error'
                                                                                                                    });
                                                                                                                } else {
                                                                                                                    swalInitDeleteTeacherAll.fire({
                                                                                                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + process_add.trim(),
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
                                                                                                initComponentsDeleteTeacherAll: function() {
                                                                                                    _componentABA_DeleteTeacherAll();
                                                                                                }
                                                                                            }
                                                                                        }();
                                                                                        // Initialize module
                                                                                        // ------------------------------
                                                                                        document.addEventListener('DOMContentLoaded', function() {
                                                                                            ABA_DeleteTeacherAll<?php echo @$row['teacher_id']; ?>.initComponentsDeleteTeacherAll();
                                                                                        });
                                                                                    </script>
                                                                                    <!--Delete end-->
                                                                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                            <?php    } ?>


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
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } ?>

        </div>

        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } else {
    }
} ?>