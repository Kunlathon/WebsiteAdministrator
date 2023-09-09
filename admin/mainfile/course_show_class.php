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

    //header("Content-Type: text/html;charset=UTF-8");

    error_reporting (E_ALL ^ E_NOTICE);
    //ini_set('display_errors', 'On');
?>
<?php
    if((preg_match("/course_show_class.php/", $_SERVER['PHP_SELF']))){
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<?php
        if((isset($_POST["list"]))){
            $list=filter_input(INPUT_POST, 'list');
        }else{
            if((isset($_GET["list"]))){
                $list=base64_decode(filter_input(INPUT_GET, 'list')) ;
            }else{}
        }
?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=course_show_class" class="breadcrumb-item"> จัดการหลักสูตรหลัก</a>

                        <a href="#" class="breadcrumb-item"> หลักสูตรหลัก</a>


                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>หลักสูตรหลัก</h4>
                </div>
            </div>

            <div class="row">

                <div class="col-<?php echo $grid; ?>-6">
                    <div class="btn-group">
                        <button type="button" name="term_data" id="term_data" class="btn btn-outline-success btn-sm" value="">ภาคเรียน</button>&nbsp;&nbsp;
                        <button type="button" name="grade_data" id="grade_data" class="btn btn-outline-success btn-sm" value="">ระดับชั้น</button>&nbsp;&nbsp;
                        <button type="button" name="course_show_class" id="course_show_class" class="btn btn-outline-success btn-sm" value="">หลักสูตรหลัก</button>&nbsp;&nbsp;
                        <button type="button" name="classroom_data" id="classroom_data" class="btn btn-success btn-sm" value="">จัดหลักสูตร</button>
                    </div>
                </div>

                <div class="col-<?php echo $grid; ?>-6"></div>

            </div><br>

    <?php

            if((isset($_POST["manage"]))){
                $manage=filter_input(INPUT_POST, 'manage');
            }else{
                if((isset($_GET["manage"]))){
                    $manage=filter_input(INPUT_GET, 'manage');
                }else{}
            }

            /*if((isset($_POST["list"]))){
                $list=filter_input(INPUT_POST, 'list');
            }else{
                if((isset($_GET["list"]))){
                    $list=base64_decode(filter_input(INPUT_GET, 'list')) ;
                }else{}
            }*/

            if((isset($manage))){

                if((isset($list))){
                    //$list=filter_input(INPUT_POST, 'list');
//Test list
                        if((is_numeric($list))){
                            $grade_key = $list;
                            $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$grade_key}';";
                            $class_Row = result_array($class_Sql);
                            foreach ($class_Row as $key => $class_Print) {
                                if ((is_array($class_Print) && count($class_Print))) {
                                    $txt_grade_name = $class_Print["grade_name"];
                                    $txt_grade_name_eng = $class_Print["grade_name_eng"];
                                } else {
                                    $txt_grade_name = "";
                                    $txt_grade_name_eng = "";
                                }
                            }
                        }else{}
//Test list end
                            /*if((isset($_POST["manage"]))){
                                $manage=filter_input(INPUT_POST, 'manage');
                            }else{
                                if((isset($_GET["manage"]))){
                                    $manage=filter_input(INPUT_GET, 'manage');
                                }else{}
                            }*/

                            if((isset($manage))){
                                
                                if(($manage=="add_course_class")){ 
                                    
                                    if((isset($_POST['cdid']))){
                                        $cdid=filter_input(INPUT_POST, 'cdid');
                                    }else{
                                        if((isset($_GET['cdid']))){
                                            $cdid=filter_input(INPUT_GET, 'cdid');
                                        }else{}
                                    }
                                    
                                    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
           
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-info">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มครูผู้สอน</div>
                            <div class="col-<?php echo $grid; ?>-6" align="right">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" accept-charset="utf-8">
                                                <input type="hidden" name="id" value="<?php echo $list; ?>">
                                                <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                                <input type="hidden" name="manage"  value="form_subject_show">
                                                <input type="hidden" name="cid"  value="<?php echo $row['course_id']; ?>">
                                                <input type="hidden" name="subject_key"  value="<?php echo $subject_key?>">
                                                                    
                                                <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
<form name="form_add_course_class" id="form_add_course_class" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" method="post" accept-charset="utf-8">
                                                <input type="hidden" name="id" value="<?php echo $list; ?>">                                                                    
                                                <input type="hidden" name="list" value="<?php echo $list; ?>">
                                                <input type="hidden" name="manage" value="add_course_class"/>
                                                <button type="submit" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> จัดครูผู้สอน</button>
</form>
                                            </div>
                                        </td>
                                    </tr>
                                </table>                                            
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับวิชา <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select class="form-control select-search" name="level" id="level" data-placeholder="เลือกระดับวิชา..." data-fouc>
                                                        <option></option>
                                                    <optgroup label="ระดับวิชา">
                                                        <option value="Normal">Normal</option>
														<option value="TSL-B">TSL-B</option>
														<option value="TSL-I">TSL-I</option>
														<option value="TSL-A">TSL-A</option>
														<option value="ESL">ESL</option>
														<option value="ESL-B">ESL-B</option>
														<option value="ESL-I">ESL-I</option>
														<option value="ESL-A">ESL-A</option>
														<option value="IEP">IEP</option>
														<option value="IEP-B">IEP-B</option>
														<option value="IEP-I">IEP-I</option>
														<option value="IEP-A">IEP-A</option>
														<option value="HSL-B">HSL-B</option>
														<option value="HSL-I">HSL-I</option>
														<option value="HSL-A">HSL-A</option>											
														<option value="Pre-Intermediate">Pre-Intermediate</option>
                                                    </optgroup>
										        </select>
                                                <div id="level-null"><span></span></div>
                                            </div>
                                        </div>
                                    </fieldset>                             
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ครูผู้สอน <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select class="form-control select-search" name="teacher1" id="teacher1" data-placeholder="เลือกครูผู้สอน..." data-fouc>
                                                            <option></option>
                                                    <optgroup label="ครูผู้สอน">
    <?php
														$sql = "SELECT * 
                                                        FROM  `tb_teacher` 
                                                        ORDER BY `teacher_name` ASC";
														$tt = result_array($sql);
                                                        foreach ($tt as $_tt) { ?>
                                                            <option value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
    <?php                                               } ?>
                                                    </optgroup>
                                                </select>
                                                <div id="teacher1-null"><span></span></div>
                                            </div>
                                        </div>
                                    </fieldset>                            
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">หน่วยกิตคะแนน <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <div id="rate1-null">
                                                    <input type="text" name="rate1" id="rate1" class="form-control" value="" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">
                                                    <span>กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ครูผู้สอน</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select class="form-control select-search" name="teacher2" id="teacher2" data-placeholder="เลือกครูผู้สอน..." data-fouc>
                                                            <option></option>
                                                    <optgroup label="ครูผู้สอน">
    <?php
														$sql = "SELECT * 
                                                        FROM  `tb_teacher` 
                                                        ORDER BY `teacher_name` ASC";
														$tt = result_array($sql);
                                                        foreach ($tt as $_tt) { ?>
                                                            <option value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
    <?php                                               } ?>
                                                    </optgroup>
                                                </select>
                                                <div id="teacher2-null"><span></span></div>
                                            </div>
                                        </div>
                                    </fieldset>                            
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">หน่วยกิตคะแนน</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <div id="rate2-null">
                                                    <input type="text" name="rate2" id="rate2" class="form-control" value="" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">
                                                    <span>กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สัดส่วนคะแนนเก็บ <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <div id="score1_1-null">
                                                    <input type="text" name="score1_1" id="score1_1" class="form-control" value="" placeholder="กรอกข้อมูลสัดส่วนคะแนนเก็บ" required="required">
                                                    <span>กรอกเปอร์เซ็นต์สัดส่วนคะแนนเก็บ เช่น 70</span>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สัดส่วนคะแนนสอบ <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <div id="score1_2-null">
                                                    <input type="text" name="score1_2" id="score1_2" class="form-control" value="" placeholder="กรอกข้อมูลสัดส่วนคะแนนสอบ" required="required">
                                                    <span>กรอกเปอร์เซ็นต์สัดส่วนคะแนนสอบ เช่น 30</span>
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
                                            <button type="button" name="Add_Course_Class" id="Add_Course_Class" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                           

                        </div>


                    </div>
                </div>
            </div>


			<input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php                   }elseif(($manage=="form_subject_show")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php
                                    if((isset($_POST["subject_key"]))){
                                        $subject_key = filter_input(INPUT_POST, 'subject_key');
                                    }else{
                                        if((isset($_GET["sid"]))){
                                            $subject_key=base64_decode(filter_input(INPUT_GET, 'sid'));
                                        }else{}
                                    }

                                    if((isset($_POST["id"]))){
                                        $id=filter_input(INPUT_POST, 'id');
                                    }else{
                                        if((isset($_GET["id"]))){
                                            $id=base64_decode(filter_input(INPUT_GET, 'id'));
                                        }else{}
                                    }

                                    if((isset($_POST["course_key"]))){
                                        $cid=filter_input(INPUT_POST, 'course_key');
                                    }else{
                                        if((isset($_GET["cid"]))){
                                            $cid=base64_decode(filter_input(INPUT_GET, 'cid'));
                                        }else{}
                                    }              

                                    if((isset($_POST["course_class_id"]))){
                                        $ccid=filter_input(INPUT_POST, 'course_class_id');
                                    }else{
                                        if((isset($_GET["ccid"]))){
                                            $ccid=base64_decode(filter_input(INPUT_GET, 'ccid'));
                                        }else{}
                                    } 

                                    if((isset($_POST["cdid"]))){
                                        $cdid=filter_input(INPUT_POST, 'cdid');
                                    }else{
                                        if((isset($_GET["cdid"]))){
                                            $cdid=base64_decode(filter_input(INPUT_GET, 'cdid'));
                                        }else{}
                                    } 
                                    

                                    if((isset($id))){

                                        $sql = "SELECT * 
                                                FROM `tb_course` 
                                                WHERE `course_id` = '{$cid}'";
                                        $row = row_array($sql);
                
                                        $course_id = $row['course_id'];
                                        $grade_key = $row['grade_id'];
                        
                                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$grade_key}';";
                                        $class_Row = result_array($class_Sql);
                                        foreach ($class_Row as $key => $class_Print) {
                                            if ((is_array($class_Print) && count($class_Print))) {
                                                $txt_grade_name = $class_Print["grade_name"];
                                                $txt_grade_name_eng = $class_Print["grade_name_eng"];
                                            } else {
                                                $txt_grade_name = "-";
                                                $txt_grade_name_eng = "-";
                                            }
                                        } ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        //$sqlS = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight , a.subt_id AS subt_id FROM tb_course_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id INNER JOIN tb_subject_type c ON a.subt_id=c.subt_id WHERE a.course_id='{$course_id}' AND a.subject_id='{$subject_key}' AND a.course_detail_status='1'";
        //$sqlS = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$ccid}' AND b.subt_id='{$subject_key}' AND b.grade_id = '{$grade_key}' AND a.course_class_detail_status='1' ORDER BY a.sort ASC ,b.subject_id ASC";
        // echo "$sqlS";
        /*$rowS = row_array($sqlS);

        if((isset($rowS['course_class_detail_id']))){
            $cdid=$rowS['course_class_detail_id'];
        }else{} */
        
    ?>                     

                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                               
    <?php  //echo "cdid->".$cdid."id->".$id."course_id->".$course_id."subject_key->".$subject_key."grade_id->".$grade_key;?>

                                        <div class="card border border-info">
                                            <div class="card-header header-elements-inline bg-info text-white">
                                                <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลหลักสูตร<?php echo $txt_grade_name; ?></div>
                                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                                    <table align="right">
                                                        <tr>
                                                            <td>
                                                                <div>
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" accept-charset="utf-8">
                                                                    <input type="hidden" name="id" value="<?php echo $list; ?>">
                                                                    <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                                                    <input type="hidden" name="manage"  value="form_subject_show">
                                                                    <input type="hidden" name="cid"  value="<?php echo $row['course_id']; ?>">
                                                                    <input type="hidden" name="subject_key"  value="<?php echo $subject_key?>">
                                                                    
                                                                    <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
<form name="form_add_course_class" id="form_add_course_class" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" method="post" accept-charset="utf-8">
                                                                    <input type="hidden" name="id" value="<?php echo $list; ?>">                                                                    
                                                                    <input type="hidden" name="list" value="<?php echo $list; ?>">
                                                                    <input type="hidden" name="cdid" value="<?php echo $cdid;?>">
                                                                    <input type="hidden" name="manage" value="add_course_class"/>
                                                                    <button type="submit" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> จัดครูผู้สอน</button>
</form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>                                            
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
    <?php        
            $sql = "SELECT * 
                    FROM `tb_course` 
                    WHERE `course_id`='{$course_id}' 
                    AND `grade_id`='{$grade_key}' 
                    AND `course_status` = '1'";
            $row = row_array($sql);

            $course_name = $row['course_name'];
                if((isset($row['course_name']))){
                    $course_name = $row['course_name'];
                }else{
                    $course_name = "";
                }

                $Subject_Sql = "SELECT * FROM `tb_subject` a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subject_id='{$subject_key}' AND a.grade_id = '{$grade_key}' ORDER BY a.subt_id ASC , a.subject_name ASC";
                $Subject_Row = row_array($Subject_Sql);

    ?>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid;?>-12" align="center">
                                                        <div style="font-size: 20px;"><?php echo $course_name; ?></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12" align="center">
                                                        <div style="font-size: 18px;">รหัสวิชา <?php echo $Subject_Row["subject_code"]; ?> ชื่อวิชา <?php echo $Subject_Row["subject_name"]; ?> ชื่อวิชา(Eng) <?php echo $Subject_Row["subject_name_eng"]; ?></div>
                                                        <div style="font-size: 16px;">ประเภท <?php echo $Subject_Row["subt_name"]; ?> เวลาเรียน/ปี <?php echo $Subject_Row["unit"]; ?> หน่วยกิต <?php echo $Subject_Row["weight"]; ?></div>
                                                    
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                            <div class="table-responsive">
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                <table class="table table-bordered" id="datatable-button-html5-columns-STDA">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th> ลำดับ </th>
                                                                                            <th> ระดับรายวิชา</th>
                                                                                            <th> ครูผู้สอน </th>
                                                                                            <th> หน่วยกิตคะแนน </th>
                                                                                            <th> คะแนนเก็บ </th>
                                                                                            <th> คะแนนสอบ </th>
                                                                                            <th> ตำแหน่ง </th>
                                                                                            <th> แผนก </th>
                                                                                            <th> เบอร์โทร </th>
                                                                                            <th> จัดการ </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
    <?php



            $sql = "SELECT * 
                    FROM `tb_course_class_level` 
                    WHERE `course_class_detail_id`='{$cdid}' 
                    AND course_class_level_status='1' 
                    ORDER BY course_class_level_name ASC";
            $list = result_array($sql);
            $count_key=1;
            foreach ($list as $key => $row) { 
                $sqlT = "SELECT * FROM tb_teacher WHERE teacher_id = '$row[teacher_id1]' AND teacher_status='1'";
                $rowT = row_array($sqlT);

                $secid=$rowT['teacher_section_id'];
                $sqlS = "SELECT * FROM `tb_teacher_section` WHERE `teacher_section_id` = '{$secid}'";
                $rowS= row_array($sqlS);

                ?>
                                                                                        <tr>
                                                                                            <td><?php echo $count_key;?></td>
                                                                                            <td><?php echo $row['course_class_level_name'];?></td>
                                                                                            <td><?php echo $rowT['teacher_name'];?>&nbsp;<?php echo $rowT['teacher_surname'];?></td>
                                                                                            <td><?php echo $row['rate1'];?>%</td>
                                                                                            <td><?php echo $row['score1_1'];?>%</td>
                                                                                            <td><?php echo $row['score1_2'];?>%</td>
                                                                                            <td><?php echo $rowT['position'];?></td>
                                                                                            <td><?php echo $rowS['teacher_section_name'];?></td>
                                                                                            <td><?php echo $rowT['mobile'];?></td>
                                                                                            <td  align="center">
                                                                                                <div align="center">
                                           
                                                                                                    <ul class="nav justify-content-center">
                                                                                                        <li class="nav-item">
<form name="form_edit_course_class<?php echo $count_key;?>" id="form_edit_course_class<?php echo $count_key;?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" method="post" accept-charset="utf-8">
                                                                                                        <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
                                                                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">                                                                    
                                                                                                        <input type="hidden" name="list" value="<?php echo $id; ?>">
                                                                                                        <input type="hidden" name="cdid" value="<?php echo $cdid;?>">
                                                                                                        <input type="hidden" name="cid" value="<?php echo $row['course_id']; ?>">
                                                                                                        <input type="hidden" name="lid" value="<?php echo $row['course_class_level_id'];?>">
                                                                                                        <input type="hidden" name="manage" value="edit_course_class"/>
</form>
                                                                                                        </li>
                                                                                                        <li class="nav-item">
<form name="form_belete_course_class<?php echo $count_key;?>" id="form_belete_course_class<?php echo $count_key;?>">
                                                                                                        <input type="hidden" name="id" id="id<?php echo $count_key;?>" value="<?php echo $id; ?>">                                                                    
                                                                                                        <input type="hidden" name="list" id="list<?php echo $count_key;?>" value="<?php echo $id; ?>">
                                                                                                        <input type="hidden" name="cdid" id="cdid<?php echo $count_key;?>" value="<?php echo $cdid;?>">
                                                                                                        <input type="hidden" name="cid" id="cid<?php echo $count_key;?>" value="<?php echo $row['course_id']; ?>">
                                                                                                        <input type="hidden" name="lid" id="lid<?php echo $count_key;?>" value="<?php echo $row['course_class_level_id'];?>">                                                                                                        <button type="button" name="delete_<?php echo $row['course_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $count_key;?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
</form>
                                                                                                        </li>
                                                                                                        <li class="nav-item">&nbsp; &nbsp;</li>
                                                                                                    </ul>                                                                                                

                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>


                                                        <!-- /dangermodal -->
                                                            <div id="modal_theme_success_Delete<?php echo $count_key;?>" class="modal fade" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white">
                                                                            <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form name="course-type-data-delete" id="course-type-data-delete" method="post" accept-charset="utf-8">
                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                ต้องการลบข้อมูลระดับรายวิชา <?php echo $row['course_class_level_name']; ?> ครูผู้สอน <?php echo $rowT['teacher_name'];?>&nbsp;<?php echo $rowT['teacher_surname'];?> หรือไม่
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                <button type="button" data-dismiss="modal"  id="delete_<?php echo $count_key;?>" name="delete_<?php echo $count_key;?>" class="btn btn-outline-success" value="<?php echo "$row[teacher_id1]";?>">ใช่</button>
                                                                                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <script>
                                                                                            var SA_DeleteSubjectData<?php echo $count_key;?> = function() {
                                                                                                var _componentSA_DeleteSubjectData = function() {
                                                                                                    if (typeof swal == 'undefined') {
                                                                                                        console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                        return;
                                                                                                    }
                                                                                                    // Defaults
                                                                                                    var swalInitDeleteCourseData = swal.mixin({
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
                                                                                                    $('#delete_<?php echo $count_key;?>').on('click', function() {

                                                                                                      
                                                                                                        
                                                                                                        var tid="teacher1";
                                                                                                        var lid=$("#lid<?php echo $count_key;?>").val();
                                                                                                        var cdid=$("#cdid<?php echo $count_key;?>").val();

                                                                                    
                                                                                                        var action = "delete_course_class";
                                                                                                    

                                                                                                        if (action == "") {
                                                                                                            swalInitDeleteCourseData.fire({
                                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                icon: 'error'
                                                                                                            });
                                                                                                        } else {

                                                                                                            if (tid != "") {
                                                                                                                //var code_list=btoa(grade_key);
                                                                                                                //var manage="delete_course_class";
                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                                                                                                    action: action,
                                                                                                                    tid:tid,
                                                                                                                    lid:lid,
                                                                                                                    cdid:cdid
                                                                                                                }, function(process_add) {
                                                                                                                    var process_add = process_add;
                                                                                                                    if (process_add.trim() === "no_error") {

                                                                                                                        let timerInterval;
                                                                                                                        swalInitDeleteCourseData.fire({
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
                                                                                                                                        const b_course_data = content.querySelector('b_course_data')
                                                                                                                                        if (b_course_data) {
                                                                                                                                            b_course_data.textContent = Swal.getTimerLeft();
                                                                                                                                        } else {}
                                                                                                                                    } else {}
                                                                                                                                }, 100);
                                                                                                                            },
                                                                                                                            willClose: function() {
                                                                                                                                clearInterval(timerInterval)
                                                                                                                            }
                                                                                                                        }).then(function(result) {
                                                                                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class";
                                                                                                                            } else {}
                                                                                                                        });

                                                                                                                    } else if (process_add.trim() === "it_error") {
                                                                                                                        swalInitDeleteCourseData.fire({
                                                                                                                            title: 'ข้อมูลซ้ำ',
                                                                                                                            icon: 'error'
                                                                                                                        });
                                                                                                                    } else {
                                                                                                                        swalInitDeleteCourseData.fire({
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
                                                                                                    initComponentsDeleteSubjectData: function() {
                                                                                                        _componentSA_DeleteSubjectData();
                                                                                                    }
                                                                                                }
                                                                                            }();
                                                                                            // Initialize module
                                                                                            // ------------------------------
                                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                                SA_DeleteSubjectData<?php echo $count_key;?>.initComponentsDeleteSubjectData();
                                                                                            });
                                                                                        </script>
                                                                                        <!--Delete end-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete End-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                    </div>
                                                                                </div>


                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                         <!-- /danger modal -->  



    <?php 																					
        $sqlT = "SELECT * 
                FROM `tb_teacher` 
                WHERE `teacher_id` = '{$row['teacher_id2']}' 
                AND teacher_status='1'";
        $rowT = row_array($sqlT);
                        
        $secid=$rowT['teacher_section_id'];
        $sqlS = "SELECT * 
                 FROM `tb_teacher_section` 
                 WHERE `teacher_section_id` = '{$secid}'";
        $rowS= row_array($sqlS);
    ?>


                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td><?php echo $row['course_class_level_name'];?></td>
                                                                                            <td><?php echo $rowT['teacher_name'];?>&nbsp;<?php echo $rowT['teacher_surname'];?></td>
                                                                                            <td><?php echo $row['rate2'];?>%</td>
                                                                                            <td><?php echo $row['score2_1'];?>%</td>
                                                                                            <td><?php echo $row['score2_2'];?>%</td>
                                                                                            <td><?php echo $rowT['position'];?></td>
                                                                                            <td><?php echo $rowS['teacher_section_name'];?></td>
                                                                                            <td><?php echo $rowT['mobile'];?></td>
                                                                                            
                                                                                            <td></td>
                                                                                        </tr>

   
                                                                                   


    <?php   $count_key=$count_key+1; } ?>   


                                                                                    </tbody>
                                                                                </table>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                            </div>
                                                    </div>
                                                </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                            </div>

                                        </div>

                                    </div>
                                </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php                       }else{} ?>


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php                   }elseif(($manage=="edit_course_class")){

                                    if((isset($_POST['lid']))){
                                        $lid=filter_input(INPUT_POST, 'lid');
                                    }else{
                                        if((isset($_GET['lid']))){
                                            $lid=filter_input(INPUT_GET, 'lid');
                                         }else{}
                                    }

                                    if((isset($_POST['cdid']))){
                                        $cdid=filter_input(INPUT_POST, 'cdid');
                                    }else{
                                        if((isset($_GET['cdid']))){
                                            $cdid=filter_input(INPUT_GET, 'cdid');
                                         }else{}
                                    }

                                    $sql = "SELECT * 
                                            FROM `tb_course_class_level`
                                            WHERE `course_class_level_id`='{$lid}' 
                                            AND `course_class_level_status`='1'";
                                    $row = row_array($sql);

            ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-info">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขครูผู้สอน</div>
                            <div class="col-<?php echo $grid; ?>-6" align="right">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" accept-charset="utf-8">
                                                <input type="hidden" name="id" value="<?php echo $list; ?>">
                                                <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                                <input type="hidden" name="manage"  value="form_subject_show">
                                                <input type="hidden" name="cid"  value="<?php echo $row['course_id']; ?>">
                                                <input type="hidden" name="subject_key"  value="<?php echo $subject_key?>">
                                                                    
                                                <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
<form name="form_add_course_class" id="form_add_course_class" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" method="post" accept-charset="utf-8">
                                                <input type="hidden" name="id" value="<?php echo $list; ?>">                                                                    
                                                <input type="hidden" name="list" value="<?php echo $list; ?>">
                                                <input type="hidden" name="manage" value="add_course_class"/>
                                                <button type="submit" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> จัดครูผู้สอน</button>
</form>
                                            </div>
                                        </td>
                                    </tr>
                                </table>                                            
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับวิชา <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select class="form-control select-search" name="level" id="level" data-placeholder="เลือกระดับวิชา..." data-fouc>
                                                        <option></option>
                                                    <optgroup label="ระดับวิชา">
                                                    <option <?php echo $row['course_class_level_name']== "Normal" ? "selected":""; ?> value="Normal" >Normal</option>
														<option <?php echo $row['course_class_level_name']== "TSL-B" ? "selected":""; ?> value="TSL-B">TSL-B</option>
														<option <?php echo $row['course_class_level_name']== "TSL-I" ? "selected":""; ?> value="TSL-I">TSL-I</option>
														<option <?php echo $row['course_class_level_name']== "TSL-A" ? "selected":""; ?> value="TSL-A">TSL-A</option>
														<option <?php echo $row['course_class_level_name']== "ESL" ? "selected":""; ?> value="ESL">ESL</option>
														<option <?php echo $row['course_class_level_name']== "ESL-B" ? "selected":""; ?> value="ESL-B">ESL-B</option>
														<option <?php echo $row['course_class_level_name']== "ESL-I" ? "selected":""; ?> value="ESL-I">ESL-I</option>
														<option <?php echo $row['course_class_level_name']== "ESL-A" ? "selected":""; ?> value="ESL-A">ESL-A</option>
														<option <?php echo $row['course_class_level_name']== "IEP" ? "selected":""; ?> value="IEP">IEP</option>
														<option <?php echo $row['course_class_level_name']== "IEP-B" ? "selected":""; ?> value="IEP-B">IEP-B</option>
														<option <?php echo $row['course_class_level_name']== "IEP-I" ? "selected":""; ?> value="IEP-I">IEP-I</option>
														<option <?php echo $row['course_class_level_name']== "IEP-A" ? "selected":""; ?> value="IEP-A">IEP-A</option>
														<option <?php echo $row['course_class_level_name']== "HSL-B" ? "selected":""; ?> value="HSL-B">HSL-B</option>
														<option <?php echo $row['course_class_level_name']== "HSL-I" ? "selected":""; ?> value="HSL-I">HSL-I</option>
														<option <?php echo $row['course_class_level_name']== "HSL-A" ? "selected":""; ?> value="HSL-A">HSL-A</option>																				
														<option <?php echo $row['course_class_level_name']== "Pre-Intermediate" ? "selected":""; ?> value="Pre-Intermediate">Pre-Intermediate</option>
                                                    </optgroup>
										        </select>
                                                <div id="level-null"><span></span></div>
                                            </div>
                                        </div>
                                    </fieldset>                             
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ครูผู้สอน <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select class="form-control select-search" name="teacher1" id="teacher1" data-placeholder="เลือกครูผู้สอน..." data-fouc>
                                                            <option></option>
                                                    <optgroup label="ครูผู้สอน">
    <?php
														$sql = "SELECT * 
                                                        FROM  `tb_teacher` 
                                                        ORDER BY `teacher_name` ASC";
														$tt = result_array($sql);
                                                        foreach ($tt as $_tt) { ?>
                                                            <option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
    <?php                                               } ?>
                                                    </optgroup>
                                                </select>
                                                <div id="teacher1-null"><span></span></div>
                                            </div>
                                        </div>
                                    </fieldset>                            
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">หน่วยกิตคะแนน <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <div id="rate1-null">
                                                    <input type="text" name="rate1" id="rate1" class="form-control" value="<?php echo $row['rate1'];?>" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">
                                                    <span>กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ครูผู้สอน</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select class="form-control select-search" name="teacher2" id="teacher2" data-placeholder="เลือกครูผู้สอน..." data-fouc>
                                                            <option></option>
                                                    <optgroup label="ครูผู้สอน">
    <?php
														$sql = "SELECT * 
                                                        FROM  `tb_teacher` 
                                                        ORDER BY `teacher_name` ASC";
														$tt = result_array($sql);
                                                        foreach ($tt as $_tt) { ?>
                                                            <option <?php echo $row['teacher_id2']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?>
    <?php                                               } ?>
                                                    </optgroup>
                                                </select>
                                                <div id="teacher2-null"><span></span></div>
                                            </div>
                                        </div>
                                    </fieldset>                            
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">หน่วยกิตคะแนน</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <div id="rate2-null">
                                                    <input type="text" name="rate2" id="rate2" class="form-control" value="<?php echo $row['rate2'];?>" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">
                                                    <span>กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สัดส่วนคะแนนเก็บ <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <div id="score1_1-null">
                                                    <input type="text" name="score1_1" id="score1_1" class="form-control" value="<?php echo $row['score1_1'];?>" placeholder="กรอกข้อมูลสัดส่วนคะแนนเก็บ" required="required">
                                                    <span>กรอกเปอร์เซ็นต์สัดส่วนคะแนนเก็บ เช่น 70</span>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สัดส่วนคะแนนสอบ <font style="color: red;">*</font></label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <div id="score1_2-null">
                                                    <input type="text" name="score1_2" id="score1_2" class="form-control" value="<?php echo $row['score1_2'];?>" placeholder="กรอกข้อมูลสัดส่วนคะแนนสอบ" required="required">
                                                    <span>กรอกเปอร์เซ็นต์สัดส่วนคะแนนสอบ เช่น 30</span>
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
                                            <button type="button" name="Edit_Course_Class" id="Edit_Course_Class" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                           

                        </div>


                    </div>
                </div>
            </div>
            <input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">
            <input type="hidden" name="lid" id="lid" value="<?php echo $lid; ?>">
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php                   }elseif(($manage=="form_add_success")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
                                    if((isset($_POST["cid"]))){
                                        $cid=filter_input(INPUT_POST, 'cid');
                                    }else{
                                        if((isset($_GET["cid"]))){
                                            $cid=base64_decode(filter_input(INPUT_GET, 'cid'));
                                        }else{}
                                    }


                                    if(isset($cid)){
                                        //$id = filter_input(INPUT_POST, 'id');

                                        $sql = "SELECT * 
                                                FROM `tb_course` 
                                                WHERE `course_id` = '{$cid}'";
                                        $row = row_array($sql);

                                        $course_id = $row['course_id'];

                                        $grade_key = $row['grade_id'];
                                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$grade_key}';";
                                        $class_Row = result_array($class_Sql);
                                        foreach ($class_Row as $key => $class_Print) {
                                            if ((is_array($class_Print) && count($class_Print))) {
                                                $txt_grade_name = $class_Print["grade_name"];
                                                $txt_grade_name_eng = $class_Print["grade_name_eng"];
                                            } else {
                                                $txt_grade_name = "";
                                                $txt_grade_name_eng = "";
                                            }
                                        } ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <div class="card border border-info">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลรายวิชา</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">

                                        <table align="right">
                                            <tr>
                                                <td>
                                                    <div>
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" accept-charset="utf-8">
                                                        <input type="hidden" name="id" value="<?php echo $list; ?>">
                                                        <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                                        <input type="hidden" name="manage"  value="form_subject_show">
                                                        <input type="hidden" name="cid"  value="<?php echo $row['course_id']; ?>">
                                                        <input type="hidden" name="subject_key"  value="<?php echo $subject_key?>">
                                                                            
                                                        <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button type="button" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_level_success_Add"><i class="icon-plus3"></i> เพิ่มระดับรายวิชา</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
								</div>

                                <div class="modal-body">
<form name="subject-data-add" id="subject-data-add" method="post" accept-charset="utf-8">

                                    <div class="row">
                                        <div class="col-<?php echo $grid;?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">รายวิชา</label>
                                                    <div class="col-<?php echo $grid; ?>-9">
                                                        <select class="form-control select-search" name="subjectid" id="subjectid" data-placeholder="รายวิชา..." required="required">
                                                            <option></option>
                                                            <optgroup label="รายวิชา">
                                                                <?php
                                                                $classSJ_Sql = "SELECT `subject_id`,`subject_code`,`subject_name`,`subject_name_eng` FROM `tb_subject` WHERE `grade_id` = '$grade_key' ORDER BY `subject_name` ASC";
                                                                $classSJ_Row = result_array($classSJ_Sql);
                                                                foreach ($classSJ_Row as $key => $classSJ_Print) {
                                                                    if ((is_array($classSJ_Print) && count($classSJ_Print))) {
                                                                        if (($classSJ_Print["subject_id"] == $subject_id)) {
                                                                            $sj_selected = 'selected="selected"';
                                                                        } else {
                                                                            $sj_selected = null;
                                                                        }
                                                                ?>
                                                                        <option value="<?php echo $classSJ_Print["subject_id"]; ?>" <?php echo $sj_selected; ?>><?php echo $classSJ_Print["subject_code"]; ?>-<?php echo $classSJ_Print["subject_name"]; ?>&nbsp;<?php echo $classSJ_Print["subject_name_eng"]; ?></option>
                                                                <?php       } else {
                                                                    }
                                                                } ?>
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
                                                    <button type="button" name="Add_Subject_Data" id="Add_Subject_Data" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
<input type="hidden" name="course_key" id="course_key" value="<?php echo $course_id; ?>">
<input type="hidden" name="id" id="id" value="<?php echo $list; ?>">
<input type="hidden" name="list" id="list" value="<?php echo $list; ?>">

</form>
                                </div>

                            </div>
                        </div>
                    </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->                                        
        <?php                         }else{} ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php                   }elseif(($manage=="form_edit_subject")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

        <?php
                $course_key = filter_input(INPUT_POST, 'course_key');
                $course_detail_key = filter_input(INPUT_POST, 'course_detail_key');
                // $subject_key = filter_input(INPUT_POST, 'subject_key');

                if ((isset($course_detail_key))) {
                    $sql = "SELECT * FROM `tb_course_detail` WHERE `course_detail_id` = '{$course_detail_key}'";
                    $row = row_array($sql); ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div id="run_class_subject">

                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลรายวิชา</div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&list=show&id=<?php echo base64_encode($course_key); ?>;'" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หน่วยกิต</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="update-weight-null">
                                                                            <input type="text" name="weight" id="weight" class="form-control" value="<?php echo $row['weight']; ?>" placeholder="กรอกข้อมูลหน่วยกิต เช่น 2" required="required">
                                                                            <span>กรอกข้อมูลหน่วยกิต เช่น 2</span>
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
                                                                    <input type="hidden" name="course_key" id="course_key" value="<?php echo $course_key; ?>">
                                                                    <input type="hidden" name="course_detail_key" id="course_detail_key" value="<?php echo $course_detail_key; ?>">
                                                                    <!-- <input type="hidden" name="subject_key" id="subject_key" value="<?php echo $row['subject_id']; ?>"> -->

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

                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php       } else {} ?>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php                       }elseif(($manage=="form_show_course")){
//Test id -> null                                   
                                    

                                    if((isset($_POST["cid"]))){
                                        $cid=filter_input(INPUT_POST, 'cid');
                                    }else{
                                        if((isset($_GET["cid"]))){
                                            $cid=base64_decode(filter_input(INPUT_GET, 'cid'));
                                        }else{}
                                    }

                                    if((isset($_POST["course_class_key"]))){
                                        $course_class_key=filter_input(INPUT_POST, 'course_class_key');
                                    }else{
                                        if((isset($_GET["course_class_key"]))){
                                            $course_class_key=base64_decode(filter_input(INPUT_GET, 'course_class_key'));
                                        }else{}
                                    }

                                    if(isset($cid)){
                                        //$id = filter_input(INPUT_POST, 'id');

                                        $sql = "SELECT * 
                                                FROM `tb_course` 
                                                WHERE `course_id` = '{$cid}'";
                                        $row = row_array($sql);

                                        $course_id = $row['course_id'];

                                        $grade_key = $row['grade_id'];
                                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` 
                                                     FROM `tb_grade` 
                                                     WHERE `grade_id`='{$grade_key}';";
                                        $class_Row = result_array($class_Sql);
                                        foreach ($class_Row as $key => $class_Print) {
                                            if ((is_array($class_Print) && count($class_Print))) {
                                                $txt_grade_name = $class_Print["grade_name"];
                                                $txt_grade_name_eng = $class_Print["grade_name_eng"];
                                            } else {
                                                $txt_grade_name = "";
                                                $txt_grade_name_eng = "";
                                            }
                                        } ?>
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                    
                            <div class="card border border-purple">

                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลหลักสูตร <?php echo $txt_grade_name; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" accept-charset="utf-8">
                                                    <input type="hidden" name="id"  value="<?php echo $list; ?>">
                                                    <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                                    <input type="hidden" name="manage"  value="form_show_course">
                                                    <input type="hidden" name="cid"  value="<?php echo  $course_id;?>">
                                                    <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
<form name="form_success_Add" id="form_success_Add" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" method="post" accept-charset="utf-8">
                                                <button type="submit" name="but_success_Add"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button>  
                                                <input type="hidden" name="manage"  value="form_add_success">
                                                <input type="hidden" name="list"  value="<?php echo $grade_key;?>">
                                                <input type="hidden" name="id"  value="<?php echo $grade_key;?>"> 
                                                <input type="hidden" name="cid"  value="<?php echo  $course_id;?>">
</form>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                        <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button> -->

                                    </div>
                                </div>

    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid;?>-12">
    <?php
       // $sql = "SELECT * FROM tb_course WHERE course_id='{$course_id}' AND grade_id='{$grade_key}' AND course_status = '1'";
       $sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course_class_key}' AND b.subt_id='{$course_id}' AND b.grade_id = '$grade_key' AND a.course_class_detail_status='1' ORDER BY a.sort ASC ,b.subject_id ASC";
        $row = row_array($sql);
            if((isset($row['course_name']))){
                $course_name = $row['course_name'];
            }else{
                $course_name="";
            }
    ?>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12" align="center">
                                                    <h4><?php echo $course_name; ?></h4>
                                                </div>
                                            </div>

    <?php
        $sqlSub = "SELECT * FROM `tb_subject_type` GROUP BY `subt_id` ASC";
        $listSub = result_array($sqlSub);

        foreach ($listSub as $key_Sub => $_row){
            if((is_array($_row) && count($_row))){
                $subt_id = $_row['subt_id']; ?>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">

                                                    <div class="card">
                                                        <div class="card-header bg-success text-white header-elements-inline">
                                                            <strong><?php echo $_row['subt_name']; ?> (<?php echo $_row['subt_name_eng']; ?>)</strong>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-<?php echo $grid;?>-12">
                                                                    <div class="table-responsive">

                                                                                    <table class="table datatable-button-html5-basic table-bordered ">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>ลำดับ</th>
                                                                                                <th>รหัสวิชา</th>
                                                                                                <th>ชื่อวิชา</th>
                                                                                                <th>ชื่อวิชา(Eng)</th>
                                                                                                <th>ประเภท</th>
                                                                                                <th>เวลาเรียน/ปี</th>
                                                                                                <th>หน่วยกิต</th>
                                                                                                <th class="no-print"> จัดการ </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $sql="SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course_class_key}' AND b.subt_id='{$subt_id}' AND b.grade_id = '{$grade_key}' AND a.course_class_detail_status='1' ORDER BY a.sort ASC ,b.subject_id ASC";
                                                                                            //$sql = "SELECT * FROM tb_course_detail WHERE course_id='{$course_id}' AND subt_id='{$subt_id}' AND grade_id = '$grade_key' AND course_detail_status = '1' ORDER BY sort ASC ,subject_id ASC";
                                                                                            $list = result_array($sql);
                                                                                            ?>
                                                                                            <?php foreach ($list as $key => $row) { ?>

                                                                                                <tr>
                                                                                                    <!--<td align="center"><?php echo $key + 1; ?></td>-->
                                                                                                    <td align="center"><?php echo $row['sort']; ?>
                                                                                                        <div>
                                                                                                            <ul class="nav justify-content-center">
                                                                                                                <li class="nav-item">
                                                                                                                    <form>
                                                                                                                        <button type="button" name="modal_course_no_Add<?php echo $row['course_detail_id']; ?>" data-toggle="modal" data-target="#modal_course_no_Add<?php echo $row['course_detail_id']; ?>" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="แก้ไขลำดับ" data-placement="bottom"><i class="icon-cog"></i></button>
                                                                                                                        <input type="hidden" name="course_key" id="course_key" value="<?php echo $row['course_id']; ?>">
                                                                                                                        <input type="hidden" name="course_detail_key" id="course_detail_key" value="<?php echo $row['course_detail_id']; ?>">
                                                                                                                        <input type="hidden" name="subject_name" id="subject_name" value="<?php echo $row['subject_name']; ?>">
                                                                                                                    </form>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td align="center"><?php echo $row['subject_code']; ?>&nbsp;
                                                                                                    </td>
                                                                                                    <td align="left"><?php echo $row['subject_name']; ?></td>
                                                                                                    <td align="left"><?php echo $row['subject_name_eng']; ?></td>
                                                                                                    <td align="center"><?php echo $_row['subt_name']; ?></td>
                                                                                                    <td align="center"><?php echo $row['unit']; ?></td>
                                                                                                    <td align="center"><?php echo $row['weight']; ?></td>
                                                                                                    <td align="center" class="no-print">
                                                                                                        <div  style="text-align: center;">
                                                                                                            <ul class="nav justify-content-center">
                                                                                                                <li class="nav-item">
<form name="gcdp_search" id="gcdp_search" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" method="post" accept-charset="utf-8">
                                                                                                                        <button type="submit" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom"><i class="icon-search4"></i></button>
                                                                                                                        <input type="hidden" name="course_key"  value="<?php echo $course_id;?>">
                                                                                                                        <input type="hidden" name="subject_key"  value="<?php echo $row['subject_id']; ?>">
                                                                                                                        <input type="hidden" name="manage"  value="form_subject_show">
                                                                                                                        <input type="hidden" name="id"  value="<?php echo $grade_key;?>"> <!-- //ซ้ำแต่จำเป็นเพราะมีผลต่อระบบ ไม่ให้ซ้ำต้องแก้หลายจุด-->
                                                                                                                        <input type="hidden" name="list"  value="<?php echo $grade_key;?>">
                                                                                                                        <input type="hidden" name="course_class_id"  value="<?php echo $row['course_class_id']; ?>">
                                                                                                                        <input type="hidden" name="cdid"  value="<?php echo $row['course_class_detail_id']; ?>">

                                                                                                                        

                                                                                                                    

</form>
                                                                                                                </li>
                                                                                                                <li class="nav-item">
<form name="gcdp_form_up<?php echo $row['course_detail_id']; ?>" id="gcdp_form_up<?php echo $row['course_detail_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class" method="post" accept-charset="utf-8">
                                                                                                                        <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
                                                                                                                        <input type="hidden" name="course_key"  value="<?php echo $row['course_id']; ?>">
                                                                                                                        <input type="hidden" name="course_detail_key"  value="<?php echo $row['course_detail_id']; ?>">
                                                                                                                        <input type="hidden" name="manage"  value="form_edit_subject">
                                                                                                                        <input type="hidden" name="id"  value="<?php echo $grade_key;?>">
                                                                                                                        <input type="hidden" name="list" value="<?php echo $grade_key;?>">
                                                                                                                        <input type="hidden" name="cid"  value="<?php echo $row['course_id']; ?>">

</form>
                                                                                                                </li>
    <?php
            if((check_session("admin_status_lcm") == '1')){ ?>
                                                                                                                <li class="nav-item">
<form name="gcdp_delete<?php echo $row['course_detail_id']; ?>" id="gcdp_delete<?php echo $row['course_detail_id']; ?>" accept-charset="utf-8">
                                                                                                                        <button type="button" name="delete_course_detail<?php echo $row['course_detail_id']; ?>" data-toggle="modal" data-target="#modal_course_detail_success_Delete<?php echo $row['course_detail_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                                                                        <input type="hidden" name="course_key" id="course_key" value="<?php echo $row['course_id']; ?>">                                                                                            
</form>
                                                                                                                </li>
    <?php   }else{}?>                                                                                           


                                                                                                                
                                                                                                            </ul>
                                                                                                        </div>

                                                                                                    </td>
                                                                                                </tr>


                                                                                                <!-- Success modal -->
                                                                                                <div id="modal_course_no_Add<?php echo $row['course_detail_id']; ?>" class="modal fade" tabindex="-1">
                                                                                                    <div class="modal-dialog">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header bg-success text-white">
                                                                                                                <h6 class="modal-title">ฟอร์มแก้ไขข้อมูลลำดับหลักสูตร</h6>
                                                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                            </div>

                                                                                                            <div class="modal-body">
                                                                                                                <form name="course-no-add" id="course-no-add" method="post" accept-charset="utf-8">

                                                                                                                    <div class="row">
                                                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                                                            <fieldset class="mb-3">
                                                                                                                                <div class="form-group row">
                                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">หลักสูตร </label>
                                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                                        <div id="grade_name-null">
                                                                                                                                            <?php echo $course_name; ?>
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
                                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">วิชา </label>
                                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                                        <div id="grade_name-null">
                                                                                                                                            <?php echo $row['subject_name']; ?>
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
                                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ลำดับ <font style="color: red;">*</font></label>
                                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                                        <div id="grade_name-null">
                                                                                                                                            <input type="number" name="sort" id="sort<?php echo $row['course_detail_id']; ?>" class="form-control" value="<?php echo $row['sort']; ?>" placeholder="กรอกข้อมูลลำดับ" required="required">
                                                                                                                                            <span>กรอกข้อมูลลำดับ</span>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </fieldset>
                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                </form>
                                                                                                            </div>

                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                                                                                                <button type="button" data-dismiss="modal" name="Add_course_no" id="Add_course_no<?php echo $row['course_detail_id']; ?>" class="btn btn-primary">บันทึกข้อมูล</button>
                                                                                                                <input type="hidden" name="course_key" id="course_key<?php echo $row['course_detail_id']; ?>" value="<?php echo $row['course_id']; ?>">
                                                                                                                <input type="hidden" name="course_detail_key" id="course_detail_key<?php echo $row['course_detail_id']; ?>" value="<?php echo $row['course_detail_id']; ?>">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- /success modal -->
                                                                                                
<!--แก้ไขลำดับ-->                                                                                            
    <script>
        $(document).ready(function() {

            // Defaults
            var swalInitAddCourseNo = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
            // Defaults End

            $('#Add_course_no<?php echo $row['course_detail_id']; ?>').on('click', function() {
                swalInitAddCourseNo.fire({
                    title: 'ต้องการบันทึกข้อมูลหรือไม่',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: 'ไม่',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    }
                }).then(function(result) {
                    if (result.value) {

                        var action = "course_no";
                        var course_key = $("#course_key<?php echo $row['course_detail_id']; ?>").val();
                        var course_detail_key = $("#course_detail_key<?php echo $row['course_detail_id']; ?>").val();
                        var sort = $("#sort<?php echo $row['course_detail_id']; ?>").val();
                        var id_key = btoa(course_key);

                        if (action == "") {
                            swalInitAddCourseNo.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {


                            if (course_key != "" && course_detail_key != "") {
                                var manage="form_show_course";
                                var id=btoa("<?php echo $grade_key;?>");
                                var list=btoa("<?php echo $grade_key;?>");
                                var cid=btoa(course_key);
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                    action: action,
                                    course_key: course_key,
                                    course_detail_key: course_detail_key,
                                    sort: sort
                                }, function(process_edit) {

                                    let timerInterval;
                                    swalInitAddCourseNo.fire({
                                        title: 'บันทึกสำเร็จ',
                                        //html: 'I will close in <b></b> milliseconds.',
                                        timer: 1200,
                                        icon: 'success',
                                        timerProgressBar: true,
                                        didOpen: function() {
                                            Swal.showLoading()
                                            timerInterval = setInterval(function() {
                                                const content = Swal.getContent();
                                                if (content) {
                                                    const b_course_no = content.querySelector('b_course_no')
                                                    if (b_course_no) {
                                                        b_course_no.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+list+"&id="+id+"&cid="+cid;
                                        } else {}
                                    });


                                })
                            } else {}
                        }
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        //swalInitLogout.fire(
                        //'Cancelled',
                        //'Your imaginary file is safe :)',
                        //'error'
                        //);
                    } else {
                        //--------------------------------------------------------------------------------------					
                    }
                });
            });

        })
    </script>
<!--แก้ไขลำดับ จบ-->   


                                                                                                <!-- /dangermodal -->
                                                                                                <div id="modal_course_detail_success_Delete<?php echo $row['course_detail_id']; ?>" class="modal fade" tabindex="-1">
                                                                                                    <div class="modal-dialog">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header bg-danger text-white">
                                                                                                                <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                                                            </div>

                                                                                                            <div class="modal-body">
                                                                                                                <form name="course-detail-data-delete" id="course-detail-data-delete" method="post" accept-charset="utf-8">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                                                            <div class="row" style="text-align: center;">
                                                                                                                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                                                    ต้องการลบข้อมูลรายวิชา <?php echo $row['subject_code']; ?>&nbsp;<?php echo $row['subject_name']; ?> หรือไม่
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <br>
                                                                                                                            <div class="row" style="text-align: center;">
                                                                                                                                <div class="col-<?php echo $grid; ?>-12">
                                                                                                                                    <button type="button" data-dismiss="modal" id="delete_course_detail<?php echo $row['course_detail_id']; ?>" name="delete_course_detail<?php echo $row['course_detail_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['course_detail_id']; ?>">ใช่</button>
                                                                                                                                    <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                                                            <!--Delete-->
                                                                                                                            <script>
                                                                                                                                $(document).ready(function() {
                                                                                                                                    // Defaults
                                                                                                                                    var swalInitDeleteCourseDetailData = swal.mixin({
                                                                                                                                        buttonsStyling: false,
                                                                                                                                        customClass: {
                                                                                                                                            confirmButton: 'btn btn-primary',
                                                                                                                                            cancelButton: 'btn btn-light',
                                                                                                                                            denyButton: 'btn btn-light',
                                                                                                                                            input: 'form-control'
                                                                                                                                        }
                                                                                                                                    });
                                                                                                                                    // Defaults End        
                                                                                                                                    $('#delete_course_detail<?php echo $row['course_detail_id']; ?>').on('click', function() {
                                                                                                                                        var action = "delete_course_detail";
                                                                                                                                        var course_detail_key = $("#delete_course_detail<?php echo $row['course_detail_id']; ?>").val();
                                                                                                                                        var table = "tb_course_detail";
                                                                                                                                        var ff = "course_detail_id";

                                                                                                                                        var course_key = $("#course_key").val();

                                                                                                                                        var id_key = btoa(course_key);

                                                                                                                                        if (action == "") {
                                                                                                                                            swalInitDeleteCourseDetailData.fire({
                                                                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                                                icon: 'error'
                                                                                                                                            });
                                                                                                                                        } else {

                                                                                                                                            if (course_detail_key != "") {
                                                                                                                                                var manage="form_show_course";
                                                                                                                                                var id=btoa("<?php echo $grade_key;?>");
                                                                                                                                                var list=btoa("<?php echo $grade_key;?>");
                                                                                                                                                var cid=btoa(course_key);
                                                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                                                                                                                                    action: action,
                                                                                                                                                    course_detail_key: course_detail_key,
                                                                                                                                                    table: table,
                                                                                                                                                    ff: ff
                                                                                                                                                }, function(process_add) {
                                                                                                                                                    var process_add = process_add;
                                                                                                                                                    if (process_add.trim() === "no_error") {

                                                                                                                                                        let timerInterval;
                                                                                                                                                        swalInitDeleteCourseDetailData.fire({
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
                                                                                                                                                                        const b_course_detail_data = content.querySelector('b_course_detail_data')
                                                                                                                                                                        if (b_course_detail_data) {
                                                                                                                                                                            b_course_detail_data.textContent = Swal.getTimerLeft();
                                                                                                                                                                        } else {}
                                                                                                                                                                    } else {}
                                                                                                                                                                }, 100);
                                                                                                                                                            },
                                                                                                                                                            willClose: function() {
                                                                                                                                                                clearInterval(timerInterval)
                                                                                                                                                            }
                                                                                                                                                        }).then(function(result) {
                                                                                                                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+list+"&id="+id+"&cid="+cid;
                                                                                                                                                            } else {}
                                                                                                                                                        });

                                                                                                                                                    } else if (process_add.trim() === "it_error") {
                                                                                                                                                        swalInitDeleteCourseDetailData.fire({
                                                                                                                                                            title: 'ข้อมูลซ้ำ',
                                                                                                                                                            icon: 'error'
                                                                                                                                                        });
                                                                                                                                                    } else {
                                                                                                                                                        swalInitDeleteCourseDetailData.fire({
                                                                                                                                                            title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                                                                                                                            icon: 'error'
                                                                                                                                                        });
                                                                                                                                                    }
                                                                                                                                                })
                                                                                                                                            } else {}
                                                                                                                                        }
                                                                                                                                    });
                                                                                                                                })
                                                                                                                            </script>
                                                                                                                            <!--Delete end-->
                                                                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                </form>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- /danger modal -->


                                                                                            <?php } ?>

                                                                                        </tbody>
                                                                                    </table>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

							                        </div>


                                                </div>
                                            </div>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{}

        }
    ?>

                                            <div class="row">
                                                <div class="col-<?php echo $grid;?>-12">
    <?php
            if((isset($memo))){ ?>
                                                <div align="left"><strong>หมายเหตุ :</strong>&nbsp;<?php echo $memo; ?></div>
    <?php   }else{ ?>
                                                <div align="left"><strong>หมายเหตุ :</strong>&nbsp;</div>
    <?php   } ?>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                            </div>

                        </div>
                    </div>                    




    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
                                    }else{}
//Test id -> null end                                    
                                }else{}


                            }else{
                                //manage-> null
                            }

                }else{
                    //list-> null
                }
    
            }else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->          
        
    <div class="row">

        <?php
            $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                          FROM `tb_grade` 
                          ORDER BY `grade_id` ASC";
            $class_Row = result_array($class_Sql);

            $count_color=0;
            $bg_color=array("bg-primary","bg-success","bg-info");

            foreach ($class_Row as $key => $class_Print){

                if ((is_array($class_Print) && count($class_Print))) { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    
                        <div class="col-<?php echo $grid; ?>-4">
<form name="list_class<?php echo $count_color;?>" id="list_class<?php echo $count_color;?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class">
                            <button type="submit" class="card card-body <?php echo $bg_color[$count_color];?> btn-block text-white has-bg-image btn-float m-0">
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
<input name="list"  type="hidden" value="<?php echo $class_Print['grade_id']; ?>">
<input name="manage"  type="hidden" value="show" >
</form>
                        </div>
                        
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php
                $count_color=$count_color+1;
                    if(($count_color=="3")){
                        $count_color=0;
                    }else{}

               }else{}
            }
        ?>


    </div>





<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>
   
    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    } ?>