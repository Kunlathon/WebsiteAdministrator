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
if ((preg_match("/subject_data.php/", $_SERVER['PHP_SELF']))) {
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

                        <a href="?modules=subject_data" class="breadcrumb-item"> จัดการรายวิชา</a>

                        <a href="#" class="breadcrumb-item"> รายวิชา</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>รายวิชา</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid; ?>-4">
                <div class="btn-group">
                        <button type="button" name="subject_type_data" id="subject_type_data" class="btn btn-outline-success btn-sm" value="">ประเภทรายวิชา</button>&nbsp;&nbsp;
                        <button type="button" name="subject_data" id="subject_data" class="btn btn-outline-success btn-sm" value="">รายวิชา</button>&nbsp;&nbsp;
                        <button type="button" name="subject_level_data" id="subject_level_data" class="btn btn-outline-success btn-sm" value="">ระดับรายวิชา</button>
                    </div>
                </div>
                <div class="col-<?php echo $grid; ?>-4"></div>
                <div class="col-<?php echo $grid; ?>-4">
    
    <div id="run_class_look">            
    <?php
        if((is_null(filter_input(INPUT_GET, 'grade')))){
            $copy_grade="0";
        }else{
            $copy_grade=base64_decode(filter_input(INPUT_GET, 'grade'));
        }
    
    ?>
    </div>
                    <fieldset class="mb-3">
                        <div class="form-group row">
                            <label class="col-form-label col-<?php echo $grid; ?>-3">ระดับชั้น</label>
                            <div class="col-<?php echo $grid; ?>-9">
                                <div id="run_class_sd">
                                <select class="form-control select" name="classSD" id="classSD" data-placeholder="ระดับชั้น..." required="required">
                                    <option></option>
                                    <optgroup label="ระดับชั้น">
                                        <?php
                                        $classSD_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` FROM `tb_grade` ORDER BY `grade_id` ASC";
                                        $classSD_Row = result_array($classSD_Sql);
                                        foreach ($classSD_Row as $key => $classSD_Print) {
                                            if ((is_array($classSD_Print) && count($classSD_Print))) {
                                                    if(($classSD_Print["grade_id"]==$copy_grade)){
                                                        $cg_selected='selected="selected"';
                                                    }else{
                                                        $cg_selected=null;
                                                    }
                                                ?>
                                                <option value="<?php echo $classSD_Print["grade_id"]; ?>" <?php echo $cg_selected;?>><?php echo $classSD_Print["grade_name"]; ?></option>
                                        <?php       } else {
                                            }
                                        } ?>
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                </div>
            </div><br>

            <?php
            @$manage = filter_input(INPUT_POST, 'manage');

            if (($manage == "show_form_excel")) {   ?>
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
                $test_miss = 0;
                foreach ($namedDataArray as $excel_subject_data) {
                    $count_all_esd = $count_all_esd + 1;

                    if (($excel_subject_data["รหัสรายวิชา"] == null)) {
                        $test_miss = $test_miss + 1;
                    } else {
                        $test_miss = $test_miss + 0;
                    }
                    if (($excel_subject_data["รายวิชา"] == null)) {
                        $test_miss = $test_miss + 1;
                    } else {
                        $test_miss = $test_miss + 0;
                    }
                    if (($excel_subject_data["รายวิชาภาษาอังกฤษ"] == null)) {
                        $test_miss = $test_miss + 1;
                    } else {
                        $test_miss = $test_miss + 0;
                    }
                    if (($excel_subject_data["เวลาเรียน/ปี"] == null)) {
                        $test_miss = $test_miss + 1;
                    } else {
                        $test_miss = $test_miss + 0;
                    }
                    if (($excel_subject_data["ประเภทรายวิชา"] == null)) {
                        $test_miss = $test_miss + 1;
                    } else {
                        $test_miss = $test_miss + 0;
                    }
                    if (($excel_subject_data["ระดับชั้น"] == null)) {
                        $test_miss = $test_miss + 1;
                    } else {
                        $test_miss = $test_miss + 0;
                    }

                    if (($test_miss >= 1)) {
                        $test_miss = 0;
                        $count_miss = $count_miss + 1;
                    } else {

                        $code = $excel_subject_data["รหัสรายวิชา"];
                        $name = $excel_subject_data["รายวิชา"];
                        $ename = $excel_subject_data["รายวิชาภาษาอังกฤษ"];
                        $unit = $excel_subject_data["เวลาเรียน/ปี"];

                        $subt_txt = $excel_subject_data["ประเภทรายวิชา"];
                        $grade_txt = $excel_subject_data["ระดับชั้น"];

                        $subt_sql = "SELECT `subt_id` FROM `tb_subject_type` WHERE `subt_name`='{$subt_txt}'";
                        $subt_rs = result_array($subt_sql);
                        foreach ($subt_rs as $subt_row) {
                            if ((is_array($subt_row) && count($subt_row))) {
                                $subt = $subt_row["subt_id"];
                            } else {
                                $subt = null;
                            }
                        }

                        $grade_sql = "SELECT `grade_id` FROM `tb_grade` WHERE `grade_name`='{$grade_txt}'";
                        $grade_rs = result_array($grade_sql);
                        foreach ($grade_rs as $grade_row) {
                            if ((is_array($grade_row) && count($grade_row))) {
                                $grade = $grade_row["grade_id"];
                            } else {
                                $grade = null;
                            }
                        }

                        $fnc_count_code_sql = "SELECT COUNT(`subject_id`) AS `count_cc` FROM tb_subject WHERE subject_code = '{$code}'";
                        $fnc_count_code_rs = result_array($fnc_count_code_sql);
                        foreach ($fnc_count_code_rs as $fnc_count_code_row) {
                            if ((is_array($fnc_count_code_row) && count($fnc_count_code_row))) {
                                $txt_count_cc_error = $fnc_count_code_row["count_cc"];
                            } else {
                                $txt_count_cc_error = 0;
                            }
                        }

                        $fnc_count_sql = "SELECT COUNT(`subject_id`) AS `count_c` FROM tb_subject WHERE subject_code = '{$code}' AND subject_name = '{$name}'";
                        $fnc_count_rs = result_array($fnc_count_sql);
                        foreach ($fnc_count_rs as $fnc_count_row) {
                            if ((is_array($fnc_count_row) && count($fnc_count_row))) {
                                $txt_count_c_error = $fnc_count_row["count_c"];
                            } else {
                                $txt_count_c_error = 0;
                            }
                        }

                        if (($txt_count_cc_error >= 1)) {
                            $txt_error = "-";
                        } else {
                            $txt_error = null;
                        }

                        if (($txt_count_c_error >= 1)) {
                            $txt_error = "-";
                        } else {
                            $txt_error = null;
                        }

                        if (($txt_error == "-")) {
                            $count_error = $count_error + 1;
                        } else {

                            if (($subt == 4)) {
                                $weight = 0;
                            } else {
                                $weight = $unit / 40;
                            }

                            $data = array(
                                "subject_code" => $code,
                                "subject_name" => $name,
                                "subject_name_eng" => $ename,
                                "unit" => $unit,
                                "weight" => $weight,
                                "subt_id" => $subt,
                                "grade_id" => $grade,
                                "admin_id" => $aid,
                                "admin_update" => $update,
                                "subject_status" => 1
                            );
                            insert("tb_subject", $data);
                            $count_save = $count_save + 1;
                        }
                    }
                }
                ?>
                <div id="run_class_subject">

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
                                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                                            <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลนิสิต</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                                            <button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลนิสิต(Excel)</button>
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
                    $excel_new_name = "all_subject" . "(" . $aid . ")" . $update_file_time . "." . $fileType;
                    $excel_tmp = $_FILES["upsd"]["tmp_name"];
                    $excel_size = $_FILES["upsd"]["size"];
                    move_uploaded_file($excel_tmp, 'uploads/subject/' . $excel_new_name);
                    ?>

                </div>

            <?php   } elseif (($manage == "form_add_excel")) { ?>
                <div id="run_class_subject">

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มข้อมูลรายวิชา (อัพโหลดไฟส์)</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <table align="right">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                                            <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                                            <button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา(Excel)</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form name="up_file_subject_data" id="up_file_subject_data" method="post" enctype="multipart/form-data" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-6">
                                                <div class="card card-body bg-primary text-white has-bg-image">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h4 class="mb-0">ดาวน์โหลดไฟส์อัพโหลดข้อมูลรายวิชาทั้งหมด</h4>
                                                            <span class="text-uppercase font-size-xs">ชนิดไฟส์ Excel นานสกุล <code>.xlsx</code></span>
                                                        </div>

                                                        <div class="ml-3 align-self-center">
                                                            <button type="button" class="btn btn-success btn-float" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/uploads/example/all_subject.xlsx';"><i class="icon-file-excel icon-2x"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-<?php echo $grid; ?>-6">
                                                <div class="form-group row">
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <input type="file" name="upsd" id="upsd" class="UpdateFile_StudentDate" data-fouc>
                                                        <span class="form-text text-muted">นานสกุลไฟส์ <code>xls</code>,<code>xlsx</code></span>
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

                </div>
            <?php   } elseif (($manage == "form_add")) { 
                
                        if((is_null(filter_input(INPUT_POST, 'class_subject')))){
                            $class_subject=0;
                            if((is_null(filter_input(INPUT_GET,'grade')))){
                                $class_subject=0;
                            }else{
                                $class_subject=base64_decode(filter_input(INPUT_GET,'grade'));
                            }
                        }else{
                            $class_subject=filter_input(INPUT_POST, 'class_subject');
                        }   

                        //$check_grade=$list;
                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$class_subject}';";
                        $class_Row = result_array($class_Sql);
                        foreach ($class_Row as $key => $class_Print) {
                            if ((is_array($class_Print) && count($class_Print))) {
                                $txt_grade_name = $class_Print["grade_name"];
                                $txt_grade_name_eng = $class_Print["grade_name_eng"];
                            } else {
                                $txt_grade_name = "-";
                                $txt_grade_name_eng = "-";
                            }
                        }

                ?>
          

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มข้อมูลรายวิชา ระดับชั้น<?php echo $txt_grade_name; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <table align="right">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=<?php echo base64_encode($class_subject);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=<?php echo base64_encode($class_subject);?>">
                                                            <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                                            <button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา(Excel)</button>
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
                                            <form name="subject_data_list_1123_add" id="subject_data_list_1123_add" method="post" accept-charset="utf-8">
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">รหัสรายวิชา</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <div id="add-code-null">
                                                                        <input type="text" name="code" id="code" class="form-control" value="" placeholder="" required="required">
                                                                        <span>กรอกข้อมูลรหัสรายวิชา เช่น ท11101 , ค12101</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">รายวิชา</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <div id="add-name-null">
                                                                        <input type="text" name="name" id="name" class="form-control" value="" placeholder="" required="required">
                                                                        <span>กรอกข้อมูลรายวิชา</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">รายวิชาภาษาอังกฤษ</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <div id="add-ename-null">
                                                                        <input type="text" name="ename" id="ename" class="form-control" value="" placeholder="" required="required">
                                                                        <span>กรอกข้อมูลรายวิชาภาษาอังกฤษ</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">เวลาเรียน/ปี</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <div id="add-unit-null">
                                                                        <input type="text" name="unit" id="unit" class="form-control" value="" placeholder="" required="required">
                                                                        <span>กรอกข้อมูลเวลาเรียน/ปี เช่น 40 ชม. (เท่ากับ 1 หน่วยกิต)</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ประเภทรายวิชา</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <select class="form-control select" name="subt" id="subt" data-placeholder="ประเภทรายวิชา..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ประเภทรายวิชา">
                                                                            <?php
                                                                            $sql = "SELECT * FROM  tb_subject_type ORDER BY subt_name ASC";
                                                                            $tst = result_array($sql);
                                                                            ?>
                                                                            <?php foreach ($tst as $_tst) { ?>
                                                                                <option value="<?php echo $_tst['subt_id'] ?>"><?php echo "$_tst[subt_name]"; ?></option>
                                                                            <?php } ?>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="add-subt-null"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <select class="form-control select" name="grade" id="grade" data-placeholder="ระดับชั้น..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ประเภทรายวิชา">
                                                                            <?php
                                                                            $sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
                                                                            $tst = result_array($sql);
                                                                            ?>
                                                                            <?php foreach ($tst as $_tst) { 
                                                                                
                                                                                if(($class_subject==$_tst["grade_id"])){
                                                                                    $cs_selected='selected="selected"';
                                                                                }else{
                                                                                    $cs_selected=null;
                                                                                }
                                                                                
                                                                                ?>
                                                                                <option value="<?php echo $_tst['grade_id'] ?>" <?php echo $cs_selected;?> ><?php echo "$_tst[grade_name]"; ?></option>
                                                                            <?php } ?>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="add-grade-null"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <button type="button" name="Add_Subject_data" id="Add_Subject_data" class="btn btn-info">บันทึก</button>&nbsp;
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

              
            <?php   } elseif (($manage == "form_update")) { ?>

                <?php
                $id = filter_input(INPUT_POST, 'id');
                
                if ((!is_null($id))) {
                    $sql = "SELECT * FROM `tb_subject` WHERE `subject_id` = '{$id}'";
                    $row = row_array($sql); 
                    
//$check_grade=$list;
                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$row['grade_id']}';";
                        $class_Row = result_array($class_Sql);
                        foreach ($class_Row as $key => $class_Print) {
                            if ((is_array($class_Print) && count($class_Print))) {
                                $txt_grade_name = $class_Print["grade_name"];
                                $txt_grade_name_eng = $class_Print["grade_name_eng"];
                            } else {
                                $txt_grade_name = "-";
                                $txt_grade_name_eng = "-";
                            }
                        }
                    
                    ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div id="run_class_subject">

                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลรายวิชา ระดับชั้น<?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=<?php echo base64_encode($row['grade_id']);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                                                <!--<button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button>-->
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                                                <!--<button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา(Excel)</button>-->
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
                                                <form name="subject_data_list_1123_up" id="subject_data_list_1123_up" method="post" accept-charset="utf-8">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">รหัสรายวิชา</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="update-code-null">
                                                                            <input type="text" name="code" id="code" class="form-control" value="<?php echo $row['subject_code']; ?>" placeholder="กรอกข้อมูลรหัสรายวิชา เช่น ท11101 , ค12101" required="required">
                                                                            <span>กรอกข้อมูลรหัสรายวิชา เช่น ท11101 , ค12101</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">รายวิชา</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="update-name-null">
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['subject_name']; ?>" placeholder="กรอกข้อมูลรายวิชา" required="required">
                                                                            <span>กรอกข้อมูลรายวิชา</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">รายวิชาภาษาอังกฤษ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="update-ename-null">
                                                                            <input type="text" name="ename" id="ename" class="form-control" value="<?php echo $row['subject_name_eng']; ?>" placeholder="กรอกข้อมูลรายวิชาภาษาอังกฤษ" required="required">
                                                                            <span>กรอกข้อมูลรายวิชาภาษาอังกฤษ</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">เวลาเรียน/ปี</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="update-unit-null">
                                                                            <input type="text" name="unit" id="unit" class="form-control" value="<?php echo $row['unit']; ?>" placeholder="กรอกข้อมูลเวลาเรียน/ปี เช่น 40 ชม. (เท่ากับ 1 หน่วยกิต)" required="required">
                                                                            <span>กรอกข้อมูลเวลาเรียน/ปี เช่น 40 ชม. (เท่ากับ 1 หน่วยกิต)</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ประเภทรายวิชา</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <select class="form-control select" name="subt" id="subt" data-placeholder="ประเภทรายวิชา..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ประเภทรายวิชา">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_subject_type ORDER BY subt_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['subt_id'] == $row['subt_id'] ? "selected" : ""; ?> value="<?php echo $_tst['subt_id'] ?>"><?php echo "$_tst[subt_name]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="update-subt-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <select class="form-control select" name="grade" id="grade" data-placeholder="ระดับชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ประเภทรายวิชา">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['grade_id'] == $row['grade_id'] ? "selected" : ""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="update-grade-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <button type="button" name="Update_Subject_data" id="Update_Subject_data" class="btn btn-info" value="<?php echo $id; ?>">บันทึก</button>&nbsp;
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

                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                } ?>

            <?php   } else { ?>

                <?php
                    if((is_null(filter_input(INPUT_GET, 'grade')))){
                        $id_grade="0";
                    }else{
                        $id_grade=base64_decode(filter_input(INPUT_GET, 'grade'));
                    }
                ?>

             
                <?php
                        if(($id_grade==0)){ ?>

                <div id="run_class_subject">

                    <div class="row row-tile no-gutters">
                        <?php
                        $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` FROM `tb_grade` ORDER BY `grade_id` ASC";
                        $class_Row = result_array($class_Sql);
                        $count_color=0;
                        $bg_color=array("bg-primary","bg-success","bg-info");
                        foreach ($class_Row as $key => $class_Print) {
                            if ((is_array($class_Print) && count($class_Print))) { ?>

                        <div class="col-<?php echo $grid; ?>-4">
                            <button type="button" id="button_class<?php echo $class_Print["grade_id"]; ?>" value="<?php echo $class_Print["grade_id"]; ?>" class="card card-body <?php echo $bg_color[$count_color];?> btn-block text-white has-bg-image btn-float m-0">
                                <div class="media">
                                    <div class="mr-3 align-self-center">
                                        <i class="icon-graduation2 icon-3x opacity-75"></i>
                                    </div>

                                    <div class="media-body text-right">
                                        <h3 class="mb-0">ระดับชั้น<?php echo $class_Print["grade_name"]; ?>&nbsp;</h3>
                                        <span class="text-uppercase font-size-xs"><?php echo $class_Print["grade_name_eng"];?>&nbsp;</span>
                                    </div>
                                </div>
							</button>
                        </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#button_class<?php echo @$class_Print["grade_id"]; ?>').on('click', function() {
                                            var cp_class = $("#button_class<?php echo @$class_Print["grade_id"]; ?>").val();
                                            if (cp_class != "") {
                                               
                                               
                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_data/subject_class_look.php", {
                                                    class_id: cp_class
                                                }, function(class_subject3) {
                                                    $("#run_class_look").html(class_subject3);

                                                    var grade=btoa(cp_class);
                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=" + grade;

                                                })
                                               
                                               
                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_data/subject_data_show.php", {
                                                    class_id: cp_class
                                                }, function(class_subject) {
                                                    $("#run_class_subject").html(class_subject);

                                                    /*var grade=btoa(cp_class);
                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=" + grade;*/

                                                })

                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_data/subject_class_sd.php", {
                                                    class_id: cp_class
                                                }, function(class_subject2) {
                                                    $("#run_class_sd").html(class_subject2);

                                                    /*var grade=btoa(cp_class);
                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=" + grade;*/

                                                })



                                            } else {}
                                        })
                                    })
                                </script>




                        <?php   } else {
                            }
                        
                            $count_color=$count_color+1;
                        } ?>

                    </div>
                </div>

                <?php   }else{ ?>


                <div id="run_class_subjectB">
                    <input type="hidden" name="id_grade" id="id_grade" value="<?php echo $id_grade;?>">
                </div>

                    

                <?php   } ?>



                

            <?php   } ?>

        </div>



<?php   } else {
    }
}
?>