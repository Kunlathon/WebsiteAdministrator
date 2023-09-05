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
    ini_set('display_errors', 'On');
?>

<?php
    if((preg_match("/course_data.php/", $_SERVER['PHP_SELF']))){
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')){ ?>


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

                        <a href="?modules=course_data" class="breadcrumb-item"> จัดการหลักสูตรหลัก</a>

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
                        <button type="button" name="course_data" id="course_data" class="btn btn-success btn-sm" value="">หลักสูตรหลัก</button>&nbsp;&nbsp;
                        <button type="button" name="classroom_data" id="classroom_data" class="btn btn-outline-success btn-sm" value="">จัดหลักสูตร</button>
                    </div>
                </div>

                <div class="col-<?php echo $grid; ?>-6">
                    <fieldset class="mb-3">
                        <div class="form-group row">
                            <label class="col-form-label col-<?php echo $grid; ?>-3">ระดับชั้น</label>
                            <div class="col-<?php echo $grid; ?>-9">
                                <select class="form-control select" name="classSD" id="classSD" data-placeholder="ระดับชั้น..." required="required">
                                    <option></option>
                                    <optgroup label="ระดับชั้น">

                                        <?php
                                        $listSD = $list;
                                        $classSD_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                                                        FROM `tb_grade` 
                                                        ORDER BY `grade_id` ASC";
                                        $classSD_Row = result_array($classSD_Sql);
                                        foreach ($classSD_Row as $key => $classSD_Print) {
                                            if ((is_array($classSD_Print) && count($classSD_Print))) { ?>
                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                <?php
                                                if (($listSD == $classSD_Print["grade_id"])) { ?>
                                                    <option value="<?php echo $classSD_Print["grade_id"]; ?>" selected="selected"><?php echo $classSD_Print["grade_name"]; ?></option>
                                                <?php   } else { ?>
                                                    <option value="<?php echo $classSD_Print["grade_id"]; ?>"><?php echo $classSD_Print["grade_name"]; ?></option>
                                                <?php   } ?>

                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                        <?php       } else {
                                            }
                                        } ?>


                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>

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
                                
                                if(($manage=="form_edit")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

        <?php
                    if((isset($_POST["id"]))){
                        $id = filter_input(INPUT_POST, 'id');
                    }else{
                        if((isset($_GET["id"]))){
                            $id = base64_decode(filter_input(INPUT_GET, 'id'));
                        }else{}
                    }
                    
                    
                    if ((isset($id))){
                        $sql = "SELECT * 
                                FROM `tb_course` 
                                WHERE `course_id` = '{$id}'";
                        $row = row_array($sql);

                        $grade_key = $row['grade_id'];
                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` 
                                      FROM `tb_grade` WHERE `grade_id`='{$grade_key}';";
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
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลหลักสูตรหลัก <?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" accept-charset="utf-8">
                                            <input type="hidden" name="id"  value="<?php echo $list; ?>">
                                            <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                            <input type="hidden" name="manage"  value="show">
                                            <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                            <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มหลักสูตรหลัก</button> -->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="course_data_list_1123_up" id="course_data_list_1123_up" method="post" accept-charset="utf-8">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หลักสูตร</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-name-null">
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['course_name']; ?>" placeholder="" required="required">
                                                                            <span>กรอกข้อมูลหลักสูตร เช่น โครงสร้างหลักสูตร ระดับชั้นประถมศึกษาปีที่ 1</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หลักสูตรภาษาอังกฤษ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-ename-null">
                                                                            <input type="text" name="ename" id="ename" class="form-control" value="<?php echo $row['course_name_eng']; ?>" placeholder="" required="">
                                                                            <span>กรอกข้อมูลหลักสูตรภาษาอังกฤษ</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <select class="form-control select" name="grade" id="grade" data-placeholder="ระดับชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="หลักสูตรหลัก">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['grade_id'] == $row['grade_id'] ? "selected" : ""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]"; ?></option>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ปีที่</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-cy-null">
                                                                            <input type="text" name="cy" id="cy" class="form-control" value="<?php echo $row['course_year']; ?>" placeholder="" required="required">
                                                                            <span>กรอกข้อมูลปี เช่น 1 , 2 , 3</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หมายเหตุ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-note-null">
                                                                            <textarea class="form-control" rows="3" name="note" id="note"><?php echo $row['memo']; ?></textarea>
                                                                            <span>กรอกข้อมูลหมายเหตุ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <!-- <div id="test1">test1</div> -->
                                                    <!-- <div id="test2">test2</div> -->

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <button type="button" name="Update_course_data" id="Update_course_data" class="btn btn-info" value="<?php echo $id; ?>">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                    <input type="hidden" name="course_key" id="course_key" value="<?php echo $row['course_id']; ?>">
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php       }else{} ?>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php                       }elseif(($manage=="form_add")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลหลักสูตรหลัก <?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" accept-charset="utf-8">
                                            <input type="hidden" name="id"  value="<?php echo $list; ?>">
                                            <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                            <input type="hidden" name="manage"  value="show">
                                            <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                            <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มหลักสูตรหลัก</button> -->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="course_data_list_1123_add" id="course_data_list_1123_add" method="post" accept-charset="utf-8">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หลักสูตร</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-name-null">
                                                                            <input type="text" name="name" id="name" class="form-control" placeholder="โครงสร้างหลักสูตร ระดับชั้น" value=""  required="required">
                                                                            <span>กรอกข้อมูลหลักสูตร เช่น โครงสร้างหลักสูตร ระดับชั้นประถมศึกษาปีที่ 1</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หลักสูตรภาษาอังกฤษ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-ename-null">
                                                                            <input type="text" name="ename" id="ename" class="form-control" value="" placeholder="" required="">
                                                                            <span>กรอกข้อมูลหลักสูตรภาษาอังกฤษ</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <select class="form-control select" name="grade" id="grade" data-placeholder="ระดับชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="หลักสูตรหลัก">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['grade_id'] == $list ? "selected" : ""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]"; ?></option>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ปีที่</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-cy-null">
                                                                            <input type="text" name="cy" id="cy" class="form-control" value="" placeholder="" required="required">
                                                                            <span>กรอกข้อมูลปี เช่น 1 , 2 , 3</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หมายเหตุ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-note-null">
                                                                            <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                                                                            <span>กรอกข้อมูลหมายเหตุ</span>
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
                                                                    <button type="button" name="Add_course_data" id="Add_course_data" class="btn btn-info">บันทึก</button>&nbsp;
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
     
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php                   }elseif(($manage=="form_add_success")){ ?>
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
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&list=show&id=<?php echo base64_encode($course_id); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button> -->
                                        <button type="button" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_level_success_Add"><i class="icon-plus3"></i> เพิ่มระดับรายวิชา</button>
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
                                                                $classSJ_Sql = "SELECT `subject_id`,`subject_code`,`subject_name`,`subject_name_eng` ,`unit` ,`weight`FROM `tb_subject` WHERE `grade_id` = '$grade_key' ORDER BY `subject_name` ASC";
                                                                $classSJ_Row = result_array($classSJ_Sql);
                                                                foreach ($classSJ_Row as $key => $classSJ_Print) {
                                                                    if ((is_array($classSJ_Print) && count($classSJ_Print))) {
                                                                        if (($classSJ_Print["subject_id"] == $subject_id)) {
                                                                            $sj_selected = 'selected="selected"';
                                                                        } else {
                                                                            $sj_selected = null;
                                                                        }
                                                                ?>
                                                                        <option value="<?php echo $classSJ_Print["subject_id"]; ?>" <?php echo $sj_selected; ?>><?php echo $classSJ_Print["subject_code"]; ?>-<?php echo $classSJ_Print["subject_name"]; ?>&nbsp;<?php echo $classSJ_Print["subject_name_eng"]; ?> <?php echo $classSJ_Print["weight"]." หน่วยกิต"; ?></option>
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
        <?php                   }elseif(($manage=="form_show_level")){ ?>
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

                                    if((isset($_POST["cid"]))){
                                        $cid=filter_input(INPUT_POST, 'cid');
                                    }else{
                                        if((isset($_GET["cid"]))){
                                            $cid=base64_decode(filter_input(INPUT_GET, 'cid'));
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
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                
                                        <div class="card border border-info">
                                            <div class="card-header header-elements-inline bg-info text-white">
                                                <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลหลักสูตร<?php echo $txt_grade_name; ?></div>
                                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                                    <table align="right">
                                                        <tr>
                                                            <td>
                                                                <div>
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" accept-charset="utf-8">
                                                                    <input type="hidden" name="id" value="<?php echo $list; ?>">
                                                                    <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                                                    <input type="hidden" name="manage"  value="form_show_level">
                                                                    <input type="hidden" name="cid"  value="<?php echo $row['course_id']; ?>">
                                                                    <input type="hidden" name="subject_key"  value="<?php echo $subject_key?>">
                                                                    
                                                                    <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
<form name="form_level_success_Add_01" id="form_level_success_Add_01" action="" method="post" accept-charset="utf-8">
                                                                    <button type="button" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_level_success_Add_01"><i class="icon-plus3"></i> เพิ่มระดับรายวิชา</button>
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
    ?>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid;?>-12" align="center">
                                                        <div style="font-size: 20px;"><?php echo $course_name; ?></div>
                                                    </div>
                                                </div>
    <?php
        $sqlS = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight , a.subt_id AS subt_id FROM tb_course_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id INNER JOIN tb_subject_type c ON a.subt_id=c.subt_id WHERE a.course_id='{$course_id}' AND a.subject_id='{$subject_key}' AND a.course_detail_status='1'";
        // echo "$sqlS";
        $rowS = row_array($sqlS);
    ?>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12" align="center">
                                                        <div style="font-size: 18px;">รหัสวิชา <?php echo $rowS["subject_code"]; ?> ชื่อวิชา <?php echo $rowS["subject_name"]; ?> ชื่อวิชา(Eng) <?php echo $rowS["subject_name_eng"]; ?></div>
                                                        <div style="font-size: 16px;">ประเภท <?php echo $rowS["subt_name"]; ?> เวลาเรียน/ปี <?php echo $rowS["unit"]; ?> หน่วยกิต <?php echo $rowS["weight"]; ?></div>
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
                                                                                            <th> จัดการ </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $sqlCD = "SELECT * FROM tb_course_detail a INNER JOIN tb_subject c ON a.subject_id = c.subject_id WHERE a.course_id='{$course_id}' AND a.subject_id='{$subject_key}' AND a.course_detail_status='1'";

                                                                                        $rowCD = row_array($sqlCD);

                                                                                        $C_DID = $rowCD['course_detail_id'];

                                                                                        $sql = "SELECT * FROM tb_course_detail a INNER JOIN tb_course_level b ON a.course_detail_id = b.course_detail_id INNER JOIN tb_subject c ON a.subject_id = c.subject_id WHERE a.course_id='{$course_id}' AND a.subject_id='{$subject_key}' AND a.course_detail_status='1' ORDER BY b.course_level_id ASC";
                                                                                        $list = result_array($sql);
                                                                                        ?>
                                                                                        <?php foreach ($list as $key => $row) { ?>

                                                                                            <tr>
                                                                                                <td align="center" style="width: 4%;"><?php echo $key + 1; ?></td>
                                                                                                <td align="left"><?php echo $row['course_level_name']; ?></td>
                                                                                                <td align="center" style="width: 16%;">
                                                                                                    <div>
                                                                                                        <ul class="nav justify-content-center">
                                                                                                            <li class="nav-item">

                                                                                                                <form>
                                                                                                                    <button type="button" name="modal_level_success_Delete<?php echo $row['course_level_id']; ?>" data-toggle="modal" data-target="#modal_level_success_Delete<?php echo $row['course_level_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                                                                    <input type="hidden" name="course_key" id="course_key" value="<?php echo $row['course_id']; ?>">
                                                                                                                    <input type="hidden" name="sid" id="sid" value="<?php echo $subject_key?>">
                                                                                                                </form>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>

                                                                                                </td>
                                                                                            </tr>

                                                                                            <!-- /dangermodal -->
                                                                                            <div id="modal_level_success_Delete<?php echo $row['course_level_id']; ?>" class="modal fade" tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-danger text-white">
                                                                                                            <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                                                        </div>

                                                                                                        <div class="modal-body">
                                                                                                            <form name="course-level-delete" id="course-level-delete" method="post" accept-charset="utf-8">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                                                        <div class="row" style="text-align: center;">
                                                                                                                            <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                                                ต้องการลบข้อมูลรายวิชา <?php echo $row['course_level_name']; ?> หรือไม่
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <div class="row" style="text-align: center;">
                                                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                                                <button type="button" data-dismiss="modal" id="delete_course_level<?php echo $row['course_level_id']; ?>" name="delete_course_level<?php echo $row['course_level_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['course_level_id']; ?>">ใช่</button>
                                                                                                                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                   
                                                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                                                        <!--Delete-->
                                                                                                                        <script>
                                                                                                                            $(document).ready(function() {
                                                                                                                                // Defaults
                                                                                                                                var swalInitDeleteSubjectLevel = swal.mixin({
                                                                                                                                    buttonsStyling: false,
                                                                                                                                    customClass: {
                                                                                                                                        confirmButton: 'btn btn-primary',
                                                                                                                                        cancelButton: 'btn btn-light',
                                                                                                                                        denyButton: 'btn btn-light',
                                                                                                                                        input: 'form-control'
                                                                                                                                    }
                                                                                                                                });
                                                                                                                                // Defaults End        
                                                                                                                                $('#delete_course_level<?php echo $row['course_level_id']; ?>').on('click', function() {

                                                                                                                                    var action = "delete_course_level";
                                                                                                                                    var course_level_key = $("#delete_course_level<?php echo $row['course_level_id']; ?>").val();
                                                                                                                                    var table = "tb_course_level";
                                                                                                                                    var ff = "course_level_id";
                                                                                                                                    var course_key = $("#course_key").val();
                                                                                                                                    var subject_key = $("#subject_key").val(); 
                                                                                                                                    var id_key = btoa(course_key);
                                                                                                                                    var sid=$("#sid").val();

                                                                                                                                    if (action == "") {
                                                                                                                                        swalInitDeleteSubjectLevel.fire({
                                                                                                                                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                                            icon: 'error'
                                                                                                                                        });
                                                                                                                                    } else {

                                                                                                                                        if (course_level_key != "") {
                                                                                                                                            var manage="form_show_level";
                                                                                                                                            var id=btoa("<?php echo $row['course_id']; ?>");
                                                                                                                                            var list=btoa("<?php echo $row['course_id']; ?>");
                                                                                                                                            var cid=btoa(course_key);
                                                                                                                                            var sid=btoa(sid);
                                                                                                                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_data/course_data_process.php", {
                                                                                                                                                action: action,
                                                                                                                                                course_level_key: course_level_key,
                                                                                                                                                table: table,
                                                                                                                                                ff: ff
                                                                                                                                            }, function(process_add) {
                                                                                                                                                var process_add = process_add;
                                                                                                                                                if (process_add.trim() === "no_error") {

                                                                                                                                                    let timerInterval;
                                                                                                                                                    swalInitDeleteSubjectLevel.fire({
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
                                                                                                                                                                    const b_course_level = content.querySelector('b_course_level')
                                                                                                                                                                    if (b_course_level) {
                                                                                                                                                                        b_course_level.textContent = Swal.getTimerLeft();
                                                                                                                                                                    } else {}
                                                                                                                                                                } else {}
                                                                                                                                                            }, 100);
                                                                                                                                                        },
                                                                                                                                                        willClose: function() {
                                                                                                                                                            clearInterval(timerInterval)
                                                                                                                                                        }
                                                                                                                                                    }).then(function(result) {
                                                                                                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&manage="+manage+"&list="+list+"&id="+id+"&cid="+cid+"&sid="+sid;
                                                                                                                                                        } else {}
                                                                                                                                                    });

                                                                                                                                                } else if (process_add.trim() === "it_error") {
                                                                                                                                                    swalInitDeleteSubjectLevel.fire({
                                                                                                                                                        title: 'ข้อมูลซ้ำ',
                                                                                                                                                        icon: 'error'
                                                                                                                                                    });
                                                                                                                                                } else {
                                                                                                                                                    swalInitDeleteSubjectLevel.fire({
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                            </div>
                                                    </div>
                                                </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                            <!-- Success modal -->
                                                                                            <div id="modal_level_success_Add_01" class="modal fade" tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-success text-white">
                                                                                                            <h6 class="modal-title">ฟอร์มข้อมูลระดับรายวิชา</h6>
                                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        </div>

                                                                                                        <div class="modal-body">
                                                                                                            <form name="subject-data-add" id="subject-data-add" method="post" accept-charset="utf-8">

                                                                                                                <div class="form-group row">

                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">รหัสวิชา</label>
                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                                                <fieldset class="mb-3">
                                                                                                                                    <div class="form-group row">
                                                                                                                                        <div class="col-<?php echo $grid; ?>-10">
                                                                                                                                            <div id="add-ename-null">
                                                                                                                                                <?php echo $rowS['subject_code']; ?>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </fieldset>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อวิชา</label>
                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                                                <fieldset class="mb-3">
                                                                                                                                    <div class="form-group row">
                                                                                                                                        <div class="col-<?php echo $grid; ?>-10">
                                                                                                                                            <div id="add-ename-null">
                                                                                                                                                <?php echo $rowS['subject_name']; ?>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </fieldset>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ระดับรายวิชา</label>
                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                        <select class="form-control select" name="level" id="level" data-placeholder="ระดับรายวิชา..." required="required">
                                                                                                                            <option></option>
                                                                                                                            <optgroup label="ระดับรายวิชา">
                                                                                                                                <?php
                                                                                                                                $classSJ_Sql = "SELECT `subject_level_id`,`subject_level_name`,`subject_level_name_eng` FROM `tb_subject_level` ORDER BY `subject_level_id` ASC";
                                                                                                                                $classSJ_Row = result_array($classSJ_Sql);
                                                                                                                                foreach ($classSJ_Row as $key => $classSJ_Print) {
                                                                                                                                    if ((is_array($classSJ_Print) && count($classSJ_Print))) {
                                                                                                                                        if (($classSJ_Print["subject_level_name"] == $subject_level_name)) {
                                                                                                                                            $sj_selected = 'selected="selected"';
                                                                                                                                        } else {
                                                                                                                                            $sj_selected = null;
                                                                                                                                        }
                                                                                                                                ?>
                                                                                                                                        <option value="<?php echo $classSJ_Print["subject_level_name"]; ?>" <?php echo $sj_selected; ?>><?php echo $classSJ_Print["subject_level_name"]; ?></option>
                                                                                                                                <?php       } else {
                                                                                                                                    }
                                                                                                                                } ?>
                                                                                                                            </optgroup>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>


                                                                                                            </form>
                                                                                                        </div>

                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                                                                                            <button type="button" data-dismiss="modal" name="Add_Subject_Level" id="Add_Subject_Level" class="btn btn-primary">บันทึกข้อมูล</button>
                                                                                                            <input type="hidden" name="course_key" id="course_key" value="<?php echo $course_id; ?>">
                                                                                                            <input type="hidden" name="course_detail_key" id="course_detail_key" value="<?php echo $C_DID;?>">
                                                                                                            <input type="hidden" name="subject_key" id="subject_key" value="<?php echo $subject_key; ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /success modal -->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                            </div>

                                        </div>

                                    </div>
                                </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php                       }else{} ?>


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
                                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&list=show&id=<?php echo base64_encode($course_key); ?>;'" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
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
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" accept-charset="utf-8">
                                                    <input type="hidden" name="id"  value="<?php echo $list; ?>">
                                                    <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                                    <input type="hidden" name="manage"  value="form_show_course">
                                                    <input type="hidden" name="cid"  value="<?php echo  $course_id;?>">
                                                    <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
<form name="form_success_Add" id="form_success_Add" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" method="post" accept-charset="utf-8">
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

                                        <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button> -->

                                    </div>
                                </div>

    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid;?>-12">
    <?php
        $sql = "SELECT * FROM tb_course WHERE course_id='{$course_id}' AND grade_id='{$grade_key}' AND course_status = '1'";
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
        $sqlSub = "SELECT * FROM `tb_subject_type` ORDER BY `subt_id` ASC";
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
                                                                                            $sql = "SELECT * FROM tb_course_detail WHERE course_id='{$course_id}' AND subt_id='{$subt_id}' AND grade_id = '$grade_key' AND course_detail_status = '1' ORDER BY sort ASC ,subject_id ASC";
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
<form name="gcdp_search" id="gcdp_search" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" method="post" accept-charset="utf-8">
                                                                                                                        <button type="submit" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom"><i class="icon-search4"></i></button>
                                                                                                                        <input type="hidden" name="course_key"  value="<?php echo $row['course_id']; ?>">
                                                                                                                        <input type="hidden" name="subject_key"  value="<?php echo $row['subject_id']; ?>">
                                                                                                                        <input type="hidden" name="manage"  value="form_show_level">
                                                                                                                        <input type="hidden" name="id"  value="<?php echo $grade_key;?>"> <!-- //ซ้ำแต่จำเป็นเพราะมีผลต่อระบบ ไม่ให้ซ้ำต้องแก้หลายจุด-->
                                                                                                                        <input type="hidden" name="list"  value="<?php echo $grade_key;?>">
                                                                                                                        <input type="hidden" name="cid"  value="<?php echo $row['course_id']; ?>">
</form>
                                                                                                                </li>
                                                                                                                <li class="nav-item">
<form name="gcdp_form_up<?php echo $row['course_detail_id']; ?>" id="gcdp_form_up<?php echo $row['course_detail_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" method="post" accept-charset="utf-8">
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
            if((check_session("admin_status_aba") == '1')){ ?>
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
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_data/course_data_process.php", {
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
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&manage="+manage+"&list="+list+"&id="+id+"&cid="+cid;
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
                                                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_data/course_data_process.php", {
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
                                                                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&manage="+manage+"&list="+list+"&id="+id+"&cid="+cid;
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
                                }elseif(($manage=="show")){ ?>
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">

                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลหลักสูตรหลัก ระดับชั้น<?php echo $txt_grade_name; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">

                                        <ul class="btn-group">
                                            <ul class="nav justify-content-center">
<form name="form_list" id="form_list"  method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" accept-charset="utf-8">
                                                <input type="hidden" name="id"  value="<?php echo $list; ?>">
                                                <input type="hidden" name="list"  value="<?php echo $list; ?>">
                                                <input type="hidden" name="manage"  value="show">
                                                <button type="submit" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>
                                            </ul>
                                            &nbsp;
                                            <ul class="nav justify-content-center">
<form name="form_add_course" id="form_add_course" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" accept-charset="utf-8" method="POST">
                                                <button type="submit" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มหลักสูตรหลัก</button>
                                                <input type="hidden" name="manage"  value="form_add">
                                                <input type="hidden" name="id"  value="<?php echo $list; ?>"> 
                                                <input type="hidden" name="list"  value="<?php echo $list; ?>">
</form>                                                    
                                            </ul>
                                        </ul>


                                        <!-- <button type="button" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_theme_success_Add"><i class="icon-plus3"></i> เพิ่มหลักสูตรหลัก</button> -->
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <!--<form name="course_data">-->

                                                <table class="table table-bordered datatable-button-html5-columns-STD">
                                                    <thead>
                                                        <tr align="center">
                                                            <th style="width: 4%;">
                                                                <div>ลำดับ</div>
                                                            </th>
                                                            <th>
                                                                <div>หลักสูตรหลัก</div>
                                                            </th>
                                                            <th>
                                                                <div>สำเนา</div>
                                                            </th>
                                                            <th style="width: 16%;">
                                                                <div>จัดการ</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $sql = "SELECT * FROM tb_course WHERE grade_id = '{$grade_key}' ORDER BY course_name ASC , course_year ASC";
                                                    $list = result_array($sql);
                                                    ?>
                                                    <tbody>
                                                        <?php foreach ($list as $key => $row) {
                                                            $key = $key + 1;
                                                        ?>

                                                            <tr>
                                                                <td style="width: 4%;" align="center">
                                                                    <div><?php echo $key; ?></div>
                                                                </td>

                                                                <td align="left">
                                                                    <div><?php echo $row['course_name']; ?></div>
                                                                </td>

                                                                <td align="center">
                                                                   <ul class="nav justify-content-center">
                                                                        <li class="nav-item">
<form name="" >
                                                                            <button type="submit" name=""  class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="สำเนา" data-placement="bottom" value=""><i class="icon-copy3"></i></button>                                             
<input name="grade_key" type="hidden" value="<?php echo $row['grade_id']; ?>">
<input name="course_key" type="hidden" value="<?php echo $row['course_id']; ?>">

</form>
                                                                        </li>
                                                                   </ul>
                                                                <!--<div><a href="ajax/get_copycourse.php?id=<?php echo $row['grade_id']; ?>&cid=<?php echo $row['course_id']; ?>" data-toggle="modal" data-id="<?php echo $row['course_id']; ?>" data-target="#CopyCourse" class="btn btn-sm yellow-gold">
                                                                            <i class="fa fa-copy"></i> สำเนา</a></div>-->
                                                                </td>

                                                                <td style="width: 16%;" align="center">
                                                                    <div align="center">

                                                                        <ul class="nav justify-content-center">
                                                                            <li class="nav-item">
<form name="form_show_<?php echo $row['course_id']; ?>" id="form_show_<?php echo $row['course_id']; ?>" accept-charset="utf-8" method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data">
                                                                        <button type="submit" name="show_<?php echo $row['course_id']; ?>"  class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>
                                                                        <input name="list"  type="hidden" value="<?php echo $grade_key;?>">
                                                                        <input name="id"  type="hidden" value="<?php echo $grade_key;?>">
                                                                        <input name="cid"  type="hidden" value="<?php echo $row['course_id']; ?>">
                                                                        <input name="manage"  type="hidden" value="form_show_course">
</form>
                                                                            </li>
                                                                            <li class="nav-item">
<form name="form_update_<?php echo $row['course_id']; ?>" id="form_update_<?php echo $row['course_id']; ?>"  accept-charset="utf-8" method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data">
                                                                        <button type="submit" name="update_<?php echo $row['course_id']; ?>"  class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value=""><i class="icon-pen"></i></button>
                                                                        <input name="manage"  type="hidden" value="form_edit">
                                                                        <input name="list"  type="hidden" value="<?php echo $grade_key;?>">
                                                                        <input name="id"  type="hidden" value="<?php echo $row['course_id']; ?>">
</form>
                                                                            </li>
    <?php
            if((check_session("admin_status_aba") == '1')){ ?>
                                                                            <li class="nav-item">
<form name="delete_<?php echo $row['course_id']; ?>" id="delete_<?php echo $row['course_id']; ?>">
                                                                        <button type="button" name="delete_<?php echo $row['course_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['course_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
</form>
                                                                            </li>
    <?php   }else{} ?>


                                                                        </ul>

                                                                        




                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- /dangermodal -->
                                                            <div id="modal_theme_success_Delete<?php echo $row['course_id']; ?>" class="modal fade" tabindex="-1">
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
                                                                                                ต้องการลบข้อมูลหลักสูตรหลัก <?php echo $row['course_name']; ?> หรือไม่
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                <button type="button" data-dismiss="modal"  id="delete_<?php echo $row['course_id']; ?>" name="delete_<?php echo $row['course_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['course_id']; ?>">ใช่</button>
                                                                                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <script>
                                                                                            var SA_DeleteSubjectData<?php echo $row['course_id']; ?> = function() {
                                                                                                var _componentSA_DeleteSubjectData = function() {
                                                                                                    if (typeof swal == 'undefined') {
                                                                                                        console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                        return;
                                                                                                    }
                                                                                                    // Defaults
                                                                                                    var swalInitDeleteSubjectData = swal.mixin({
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
                                                                                                    $('#delete_<?php echo $row['course_id']; ?>').on('click', function() {

                                                                                                        //var course_name="<?php echo $row['course_name']; ?>";
                                                                                                        var grade_key = "<?php echo $grade_key; ?>";
                                                                                                        var course_key = $("#delete_<?php echo $row['course_id']; ?>").val();
                                                                                                        var action = "delete";
                                                                                                        var id_key = btoa(course_key);

                                                                                                        if (action == "") {
                                                                                                            swalInitDeleteSubjectData.fire({
                                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                icon: 'error'
                                                                                                            });
                                                                                                        } else {

                                                                                                            if (course_key != "") {
                                                                                                                var code_list=btoa(grade_key);
                                                                                                                var manage="show";
                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_data/course_data_process.php", {
                                                                                                                    action: action,
                                                                                                                    grade_key: grade_key,
                                                                                                                    course_key: course_key
                                                                                                                }, function(process_add) {
                                                                                                                    var process_add = process_add;
                                                                                                                    if (process_add.trim() === "no_error") {

                                                                                                                        let timerInterval;
                                                                                                                        swalInitDeleteSubjectData.fire({
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
                                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data&manage="+manage+"&list="+code_list+"&id="+code_list;
                                                                                                                            } else {}
                                                                                                                        });

                                                                                                                    } else if (process_add.trim() === "it_error") {
                                                                                                                        swalInitDeleteSubjectData.fire({
                                                                                                                            title: 'ข้อมูลซ้ำ',
                                                                                                                            icon: 'error'
                                                                                                                        });
                                                                                                                    } else {
                                                                                                                        swalInitDeleteSubjectData.fire({
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
                                                                                                SA_DeleteSubjectData<?php echo $row['course_id']; ?>.initComponentsDeleteSubjectData();
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

                                                        <?php } ?>
                                                    </tbody>

                                                </table>

                                            <!--</form>-->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>                

    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php                       }else{}


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
<form name="list_class<?php echo $count_color;?>" id="list_class<?php echo $count_color;?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data">
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





<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>
   
    </div>
<?php   }else{
            //status
        }
    }
?>
