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
if ((preg_match("/teacher_all.php/", $_SERVER['PHP_SELF']))) {
    Header("Location:../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) {

        //$manage = filter_input(INPUT_POST, 'manage');

        if((filter_input(INPUT_POST, 'manage')==null)){
            if((filter_input(INPUT_GET, 'manage')==null)){
                $manage=null;
            }else{
                $manage=filter_input(INPUT_GET, 'manage');
            }
        }else{
            $manage=filter_input(INPUT_POST, 'manage');
        }

?>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=teacher_all" class="breadcrumb-item"> ครูทั้งหมด</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลครูทั้งหมด</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <?php
            if (($manage == "form_edit" || $manage == "profile")) {
                @$teacher_key = filter_input(INPUT_POST, 'teacher_key');
                $fe_sql = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$teacher_key}'";
                $fe_row = row_array($fe_sql);
            ?>

            <?php   } else { ?>
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>รายชื่อครูทั้งหมด</h4>
                    </div>
                </div>
            <?php   } ?>


            <?php

            if (($manage == "profile")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">

                        <table>
                            <tr>
                                <td>
                                    <div>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all';" class="btn btn-outline-success" value="">รายการ</button>
                                    </div>
                                </td>
                                <td>

                                    <div>
                                        <form name="form_show" id="form_show" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                            <button type="submit" name="button_show" id="button_show" class="btn btn-outline-success" value="">ประวัติส่วนตัว</button>
                                            <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$fe_row['teacher_id']; ?>"> 
                                            <input type="hidden" name="manage" id="manage" value="profile">
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <form name="update_ta" id="update_ta" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                            <button type="submit" name="submit_update" id="submit_update" class="btn btn-outline-success" value="">แก้ไขประวัติส่วนตัว</button>
                                            <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$fe_row['teacher_id']; ?>"> 
                                            <input type="hidden" name="manage" id="manage" value="form_edit">
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <form name="update_picture" id="update_picture" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                            <button type="submit" name="submit_picture" id="submit_picture" class="btn btn-outline-success" value="">เปลี่ยนรูป</button>
                                            <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$fe_row['teacher_id']; ?>"> 
                                            <input type="hidden" name="manage" id="manage" value="change_picture">
                                        </form>
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
                                    <div class="col-<?php echo $grid; ?>-9">
                                        
                    <?php
                            if(($fe_row['tPic']==null OR $fe_row['tPic']=="-" OR $fe_row['tPic']=="0")){ ?>
                                        <div style="width : 40%"><img src="https://www.abaacademic.com/web2023/admin/images/aba.jpg" class="img-thumbnail"></div>
                    <?php    }else{ ?>
                                        <div style="width : 40%"><img src="<?php echo $RunLink->Call_Link_System();?>/uploads/teacher_picture/<?php echo $fe_row['tPic'];?>" class="img-thumbnail"></div>
                    <?php    } ?>                
                                    

                                        <div><?php echo @$fe_row['teacher_username']; ?></div>
                                    </div>
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
                                // echo $sqlTc;
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
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['education_name']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">สาขา : </div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['major_name']; ?></div>
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
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['teacher_address']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">เบอร์โทรศัพท์มือถือ : </div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['mobile']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">อีเมล์ : </div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo @$fe_row['email']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } elseif (($manage == "show_form_excel")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                require_once("js_code/tool_js/PHPExcel-1.8/Classes/PHPExcel.php");
                include("js_code/tool_js/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");

                // include 'config/connect.ini.php'; 
                // include 'config/fnc.php'; 

                $form_excel_name = $_FILES["upsd"]["tmp_name"];

                $inputFileName = "$form_excel_name";
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objReader->setReadDataOnly(true);
                $objPHPExcel = $objReader->load($inputFileName);

                $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
                $highestRow = $objWorksheet->getHighestRow();
                $highestColumn = $objWorksheet->getHighestColumn();

                $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
                $headingsArray = $headingsArray[1];

                $r = -1;
                $namedDataArray = array();
                for ($row = 2; $row <= $highestRow; ++$row) {
                    $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
                    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
                        ++$r;
                        foreach ($headingsArray as $columnKey => $columnHeading) {
                            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                        }
                    }
                }
                ?>

                <?php
                $aid = check_session("admin_id_aba");
                $update = date('Y-m-d H:i:s');
                $count_all_esd = 0;
                $count_miss = 0;
                $count_save = 0;
                $count_error = 0;
                $keep_error = 0;
                foreach ($namedDataArray as $excel_teacher_data) {

                    if (($excel_teacher_data["ชื่อ"] == null)) {
                        $keep_error = $keep_error + 1;
                    } else {
                        $keep_error = $keep_error + 0;
                    }

                    if (($excel_teacher_data["Username"] == null)) {
                        $keep_error = $keep_error + 1;
                    } else {
                        $keep_error = $keep_error + 0;
                    }

                    if (($keep_error >= 1)) {
                        $count_miss = $count_miss + 1;
                        $keep_error = 0;
                    } else {

                        if (($excel_teacher_data["เพศ"] == "ชาย")) {
                            $gender = "1";
                        } elseif (($excel_teacher_data["เพศ"] == "หญิง")) {
                            $gender = "2";
                        } else {
                            $gender = "0";
                        }

                        if (($excel_teacher_data["ประเภทครู"] == "ครูไทย")) {
                            $ttype = "1";
                        } elseif (($excel_teacher_data["ประเภทครู"] == "ครูต่างประเทศ" OR $excel_teacher_data["ประเภทครู"] =="ครูต่างชาติ")) {
                            $ttype = "2";
                        } else {
                            $ttype = null;
                        }

                        if (($excel_teacher_data["ครูประจำชั้น"] == "เป็น")) {
                            $tclass = "1";
                        } elseif (($excel_teacher_data["ครูประจำชั้น"] == "ไม่เป็น")) {
                            $tclass = "0";
                        } else {
                            $tclass = null;
                        }

                        if (($excel_teacher_data["ครูประจำรายวิชา"] == "เป็น")) {
                            $tteach = "1";
                        } elseif (($excel_teacher_data["ครูประจำรายวิชา"] == "ไม่เป็น")) {
                            $tteach = "0";
                        } else {
                            $tteach = null;
                        }


                        $sql = "SELECT `teacher_section_id` FROM `tb_teacher_section` WHERE `teacher_section_name`='{$excel_teacher_data["แผนก"]}'";
                        $tt = result_array($sql);
                        foreach ($tt as $_tt) {
                            if ((is_array($_tt) && count($_tt))) {
                                $section = $_tt["teacher_section_id"];
                            } else {
                                $section = null;
                            }
                        }


                        $name = $excel_teacher_data["ชื่อ"];
                        $surname = $excel_teacher_data["นามสกุล"];
                        $position = $excel_teacher_data["ตำแหน่ง"];
                        $username = $excel_teacher_data["Username"];
                        $password = "aba@123456";

                        $pass = MD5($password);

                        $ta_test_sql = "SELECT count(`teacher_id`) AS `count_teacher` FROM `tb_teacher` WHERE `teacher_username`='{$username}'";
                        //$s = "SELECT * FROM tb_teacher WHERE teacher_name = '$name' AND teacher_surname = '$surname' AND teacher_username = '$username'";
                        $ta_test_rs = result_array($ta_test_sql);
                        foreach ($ta_test_rs as $ta_test) {
                            if ((is_array($ta_test) && count($ta_test))) {
                                $count_teacher = $ta_test["count_teacher"];
                            } else {
                                $count_teacher = 0;
                            }
                        }

                        if (($count_teacher >= 1)) {
                            $count_error = $count_error + 1;
                        } else {

                            if (($surname == null)) {
                                $surname = "-";
                            } else {
                                //$surname="-";
                            }

                            if (($gender == null)) {
                                $gender = "0";
                            } else {
                                //$gender="0";
                            }

                            if (($position == null)) {
                                $position = "-";
                            } else {
                                //$position="-";
                            }

                            if ((is_null(@$section))) {
                                $section = "0";
                            } else {
                                //$section="0";
                            }

                            if ((is_null($ttype))) {
                                $ttype = "0";
                            } else {
                                //$ttype="0";
                            }

                            if (($tclass == null)) {
                                $tclass = "0";
                            } else {
                                //$tclass="0";
                            }

                            if (($tteach == null)) {
                                $tteach = "0";
                            } else {
                                //$tteach="0";
                            }


                            $data = array(
                                "teacher_section_id" => $section,
                                "teacher_username" => $username,
                                "teacher_password" => $pass,
                                "teacher_name" => $name,
                                "teacher_surname" => $surname,
                                "position" => $position,
                                "gender" => $gender,
                                "admin_id" => $aid,
                                "admin_update" => $update,
                                "teacher_class" => $tclass,
                                "teacher_teach" => $tteach,
                                "teacher_type" => $ttype,
                                "teacher_status" => 1,
                                "teacher_work" => 1
                            );
                            insert("tb_teacher", $data);
                            $count_save = $count_save + 1;
                        }
                    }

                    $count_all_esd = $count_all_esd + 1;
                }

                ?>



                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">

                                <div class="col-<?php echo $grid; ?>-6">รายงานผลการอัพข้อมูล</div>

                                <div class="col-<?php echo $grid; ?>-6">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                                        <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                                        <button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู(Excel)</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <div class="card card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="font-weight-semibold mb-0"><?php echo $count_all_esd; ?></h3>
                                                    <span class="text-uppercase font-size-sm text-muted">ข้อมูลทั้งหมด</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-database-refresh icon-3x text-info"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <div class="card card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="font-weight-semibold mb-0"><?php echo $count_miss; ?></h3>
                                                    <span class="text-uppercase font-size-sm text-muted">ข้อมูลไม่ครบ</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-alert icon-3x text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <div class="card card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="font-weight-semibold mb-0"><?php echo $count_save; ?></h3>
                                                    <span class="text-uppercase font-size-sm text-muted">บันทึกข้อมูลสำเร็จ</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-database-check icon-3x text-success"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <div class="card card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="font-weight-semibold mb-0"><?php echo $count_error; ?></h3>
                                                    <span class="text-uppercase font-size-sm text-muted">บันทึกข้อมูลไม่สำเร็จ</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-database-remove icon-3x text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $update_file_time = date("Y_m_d_H_i_s", strtotime($update));
                $excel_name = $_FILES["upsd"]["name"];
                $excel_type = $_FILES["upsd"]["type"];
                //new file Name
                $expFile = explode('.', $excel_name);
                $fileType = $expFile[count($expFile) - 1];
                //new file Name end
                $excel_new_name = "all_teacher" . "(" . $aid . ")" . $update_file_time . "." . $fileType;
                $excel_tmp = $_FILES["upsd"]["tmp_name"];
                $excel_size = $_FILES["upsd"]["size"];
                move_uploaded_file($excel_tmp, 'uploads/teacher/' . $excel_new_name);
                ?>

                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php } elseif (($manage == "form_add_excel")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มข้อมูลครู</div>
                                <div class="col-<?php echo $grid; ?>-6">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                                        <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                                        <button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู(Excel)</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <form name="up_file_teacher_data" id="up_file_teacher_data" method="post" enctype="multipart/form-data" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-6">
                                            <div class="card card-body bg-primary text-white has-bg-image">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="mb-0">ดาวน์โหลดไฟส์อัพโหลดข้อมูลครูทั้งหมด</h4>
                                                        <span class="text-uppercase font-size-xs">ชนิดไฟส์ Excel นานสกุล <code>.xlsx</code></span>
                                                    </div>

                                                    <div class="ml-3 align-self-center">
                                                        <button type="button" class="btn btn-success btn-float" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/uploads/example/all_teacher.xlsx';"><i class="icon-file-excel icon-2x"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-<?php echo $grid; ?>-6">
                                            <div class="form-group row">
                                                <div class="col-<?php echo $grid; ?>-9">
                                                    <input type="file" name="upsd" id="upsd" class="UpdateFile_StudentDate" data-fouc>
                                                    <span class="form-text text-muted">นานสกุลไฟส์ <code>xls</code>,<code>xlsx</code>,<code>csv</code></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="manage" id="manage" value="show_form_excel">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php } elseif (($manage == "form_add")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มข้อมูลครู</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">

                                        <form name="teacher_all_add" id="teacher_all_add" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="name-null">
                                                                    <input type="text" name="name" id="name" class="form-control" placeholder="กรอกข้อมูลชื่อ" required="required">
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
                                                                <input type="text" name="surname" id="surname" class="form-control" placeholder="กรอกข้อมูลนามสกุล">
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
                                                                <select class="form-control select" name="gender" id="gender" data-placeholder="เลือกเพศ...">
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ตำแหน่ง</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <input type="text" name="position" id="position" class="form-control" placeholder="กรอกข้อมูลตำแหน่ง">
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
                                                                <select class="form-control select" name="section" id="section" data-placeholder="เลือกแผนก...">
                                                                    <option></option>
                                                                    <optgroup label="แผนก">
                                                                        <?php
                                                                        $sql = "SELECT * FROM  `tb_teacher_section` ORDER BY `teacher_section_id` ASC";
                                                                        $tt = result_array($sql);
                                                                        foreach ($tt as $_tt) { ?>
                                                                            <option value="<?php echo @$_tt['teacher_section_id'] ?>"><?php echo @$_tt['teacher_section_name']; ?></option>
                                                                        <?php } ?>
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
                                                                <select class="form-control select" name="ttype" id="ttype" data-placeholder="เลือกประเภทครู...">
                                                                    <option></option>
                                                                    <optgroup label="ประเภทครู">
                                                                        <option value="1">ครูไทย</option>
                                                                        <option value="2">ครูต่างประเทศ</option>
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
                                                                <select class="form-control select" name="tclass" id="tclass" data-placeholder="เลือกครูประจำชั้น...">
                                                                    <option></option>
                                                                    <optgroup label="ครูประจำชั้น">
                                                                        <option value="1">เป็น</option>
                                                                        <option value="0" selected="selected">ไม่เป็น</option>
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
                                                                <select class="form-control select" name="tteach" id="tteach" data-placeholder="เลือกครูประจำรายวิชา...">
                                                                    <option></option>
                                                                    <optgroup label="ครูประจำรายวิชา">
                                                                        <option value="1">เป็น</option>
                                                                        <option value="0" selected="selected">ไม่เป็น</option>
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
                                                                <div id="username-null">
                                                                    <input type="text" name="username" id="username" class="form-control" placeholder="กรอก Username" required="required">
                                                                    <span>ข้อมูล Username</span>
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
                                                                    <input type="text" name="password" id="password" class="form-control" value="aba@123456" placeholder="กรอก Password" required="required">
                                                                    <span>กรอก Password เบื้องต้น aba@123456</span>
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
                                                            <button type="button" name="Add_Teacher_All" id="Add_Teacher_All" class="btn btn-info">บันทึก</button>&nbsp;
                                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php } elseif (($manage == "form_edit")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                //@$teacher_key = filter_input(INPUT_POST, 'teacher_key');
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
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button> -->
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">

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
                                                                <input type="text" name="surname" id="surname" class="form-control" value="<?php echo @$row['teacher_surname']; ?>" placeholder="กรอกข้อมูลนามสกุล">
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ตำแหน่ง</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <input type="text" name="position" id="position" class="form-control" value="<?php echo @$row['position']; ?>" placeholder="กรอกข้อมูลตำแหน่ง">
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
                                                                <select class="form-control select" name="section" id="section" data-placeholder="เลือกแผนก...">
                                                                    <option></option>
                                                                    <optgroup label="แผนก">
                                                                        <?php
                                                                        $sql = "SELECT * FROM  `tb_teacher_section` ORDER BY `teacher_section_id` ASC";
                                                                        $tt = result_array($sql);
                                                                        foreach ($tt as $_tt) { ?>
                                                                            <option <?php echo @$row['teacher_section_id'] == @$_tt['teacher_section_id'] ? "selected" : ""; ?> value="<?php echo @$_tt['teacher_section_id'] ?>"><?php echo @$_tt['teacher_section_name']; ?></option>
                                                                        <?php } ?>
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
                                                                <select class="form-control select" name="ttype" id="ttype" data-placeholder="เลือกประเภทครู...">
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
                                                                <select class="form-control select" name="tclass" id="tclass" data-placeholder="เลือกครูประจำชั้น...">
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
                                                                <select class="form-control select" name="tteach" id="tteach" data-placeholder="เลือกครูประจำรายวิชา...">
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
                                                            <button type="button" name="Edit_Teacher_All" id="Edit_Teacher_All" class="btn btn-info">บันทึก</button>&nbsp;
                                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                            <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>">
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



                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php } else {
                    $linkcopy = $RunLink->Call_Link_System();
                    exit("<script>window.location='$linkcopy/?modules=teacher_all';</script>");
                }
                ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php }elseif(($manage=="change_picture")){ ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                
                if((filter_input(INPUT_POST, 'teacher_key'))){
                    $teacher_key=filter_input(INPUT_POST, 'teacher_key');
                }else{
                    if((filter_input(INPUT_GET, 'id'))){
                        $teacher_key=base64_decode(filter_input(INPUT_GET, 'id'));
                    }else{
                        $teacher_key=null;
                    }
                }


                if (($teacher_key != null)) {
                    $img_sql = "SELECT * FROM tb_teacher WHERE teacher_id = '{$teacher_key}'";
                    $img_row = row_array($img_sql);
                ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">เปลี่ยนรูป</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button> -->
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-6">
                    <?php
                            if(($img_row['tPic']==null or $img_row['tPic']=='0' or $img_row['tPic']=='-')){ ?>
                                        <img src="https://www.abaacademic.com/web2023/admin/images/aba.jpg" class="img-thumbnail">
                    <?php   }else{ ?>
                                        <img src="<?php echo $RunLink->Call_Link_System();?>/uploads/teacher_picture/<?php echo $img_row['tPic'];?>" class="img-thumbnail">
                    <?php   }  ?>                                  
                                            
                                        </div>
                                        <div class="col-<?php echo $grid; ?>-6">
<form name="form_change_picture" id="form_change_picture" enctype="multipart/form-data" action="<?php echo $RunLink->Call_Link_System();?>/js_code/teacher_all/teacher_all_process.php" method="post">

                                            <div class="form-group row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <input type="file" name="change_picture" id="change_picture" class="ChangePicture" data-fouc>
                                                    <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code> <code>png</code>,<code>PNG</code></span>
                                                </div>
                                            </div>

                                            

<input type="hidden" name="action" id="action" value="change_picture">   
<input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo $img_row['teacher_id'];?>">                                             
</form>                
                                        </div>
                                    </div> 

                                </div>

                            </div>
                        </div>
                    </div>



                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php } else {
                    $linkcopy = $RunLink->Call_Link_System();
                    exit("<script>window.location='$linkcopy/?modules=teacher_all';</script>");
                }
                ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php }elseif (($manage == "password")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                @$teacher_key = filter_input(INPUT_POST, 'teacher_key');
                if (($teacher_key != null)) {
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
                                    <form name="teacher_all_password" id="teacher_all_password" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                                                    <button type="button" name="password_teacher_all" id="password_teacher_all" class="btn btn-info">บันทึก</button>&nbsp;
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
                <?php } else {
                    $linkcopy = $RunLink->Call_Link_System();
                    exit("<script>window.location='$linkcopy/?modules=teacher_all';</script>");
                } ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php } else { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลคุณครูทั้งหมด</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">

                                                        <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                                        <button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู(Excel)</button>
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
                                        <div id="run_data_ta"><i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php } ?>

        </div>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php } else {
    }
}
?>