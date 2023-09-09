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
if ((preg_match("/teach_data.php/", $_SERVER['PHP_SELF']))) {
    Header("Location:../index.php");
    die();
} else {
    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=teach_data" class="breadcrumb-item"> เช็คการสอน</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลเช็คการสอน</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <?php
            @$list = filter_input(INPUT_GET, 'list');
            @$list = base64_decode($list);
            @$id = filter_input(INPUT_GET, 'id');
            if (($list == "teach_data_show")) { ?>
<!--แสดงข้อมูลการสอนตามรายวิชา -->            
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        $teacher_key = base64_decode(filter_input(INPUT_GET, 'teacher_key'));
        $id = base64_decode(filter_input(INPUT_GET, 'id'));
        $list=filter_input(INPUT_GET,'list');
        $manage=filter_input(INPUT_GET,'manage');  
        
        $sqlT = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$teacher_key}'";
        $rowT = row_array($sqlT);
    ?>

    
    <div class="row">
        <div class="col-<?php echo $grid;?>-4"><h4>ข้อมูลการสอน&nbsp;<?php echo $rowT['teacher_name'];?> <?php echo $rowT['teacher_surname'];?>&nbsp;ครูผู้สอน<h1></div>
        <div class="col-<?php echo $grid;?>-4">
            <fieldset class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-<?php echo $grid; ?>-4">การสอบครั้งที่</label>
                    <div class="col-<?php echo $grid; ?>-8">
                        <select class="form-control select-search" name="check_test" id="check_test" data-placeholder="เลือกการสอบครั้งที่..." required="required">
                            <option></option>
                            <optgroup label="การสอบครั้งที่">
                                <option value="1">การสอบครั้งที่ 1</option>
                                <option value="2">การสอบครั้งที่ 2</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </fieldset>    
        </div>
        <div class="col-<?php echo $grid;?>-4">
            <fieldset class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-<?php echo $grid; ?>-3">ภาคเรียน</label>
                    <div class="col-<?php echo $grid; ?>-9">
                        <select class="form-control select-search" name="check_term" id="check_term" data-placeholder="เลือกภาคเรียน..." required="required">
                            <option></option>
                            <optgroup label="ภาคเรียน">
                                <?php
                                $sql = "SELECT * FROM `tb_term` 
                                        GROUP BY `year` DESC , `term` DESC";
                                $cc = result_array($sql);
                                ?>
                                <?php foreach ($cc as $_cc) { ?>
                                    <option value="<?php echo $_cc["term_id"]; ?>"><?php echo $_cc['term'] . "/" . $_cc['year']; ?></option>
                                <?php } ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <input type="hidden" name="tid" id="tid" value="<?php echo $teacher_key;?>">
    <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
    <input type="hidden" name="exam_no" id="exam_no" value="1">
    
    <div id="run_teach_data"></div>
    
<!--แสดงข้อมูลการสอนตามรายวิชา จบ-->         
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } else { ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>เช็คการสอน</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="btn-group">
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode(1); ?>';" class="btn btn-outline-secondary">ครูไทย</button>
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode(2); ?>';" class="btn btn-outline-success">ครูต่างประเทศ</button>
                        </div>
                    </div>
                </div><br>

                <?php
                //@$list = filter_input(INPUT_GET, 'list');
                //@$list = base64_decode($list);
                $list_row_txt = array('ครูไทย', 'ครูต่างประเทศ');
                $list_row_id = array(1, 2);
                if (($list == "1")) { ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <h4>ข้อมูลเช็คการสอน <?php echo $list_row_txt[0]; ?></h4>
                        </div>
                    </div><br>

                    <?php
                    $manage = filter_input(INPUT_GET, 'manage');
                    if (($manage == "form_add1")) { ?>
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
                                                            <button type="button" name="Add_Teach_Data1" id="Add_Teach_Data1" class="btn btn-info">บันทึก</button>&nbsp;
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
                    <?php } elseif (($manage == "form_edit1")) { ?>
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
                                                <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[0]); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[0]); ?>&manage=form_add1';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <form name="teach_data_form_edit" id="teach_data_form_edit" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                                                                            <select class="form-control select" name="ttype" id="ttype" data-placeholder="เลือกประเภทครู...">
                                                                                <option></option>
                                                                                <optgroup label="ประเภทครู">
                                                                                    <option <?php echo @$row['teacher_type'] == 1 ? "selected" : ""; ?> value="1">เช็คการสอน</option>
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
                                                                        <button type="button" name="Edit_teach_data" id="Edit_teach_data" class="btn btn-info">บันทึก</button>&nbsp;
                                                                        <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                        <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>">
                                                                        <input type="hidden" name="td_id" id="td_id" value="1">
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        </from>
                                                <!--</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>-->
                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <?php   } else {
                            $linkcopy = $RunLink->Call_Link_System();
                            exit("<script>window.location='$linkcopy/?modules=teach_data';</script>");
                        }
                        ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php } elseif (($manage == "password1")) { ?>
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
                                            <form name="teach_data_password" id="teach_data_password" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-4">ชื่อ-นามสกุล</label>
                                                                <div class="col-<?php echo $grid; ?>-8">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                                        <div class="form-group form-group-feedback form-group-feedback-left"><?php echo @$row['teacher_name']; ?> <?php echo @$row['teacher_surname']; ?>
                                                                            <?php
                                                                            if (($row['nickname'] == null)) {
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
                                                            <button type="button" name="password_teach_data" id="password_teach_data" class="btn btn-info">บันทึก</button>&nbsp;
                                                            <button type="reset" name="changepass_cancel" id="changepass_cancel" class="btn btn-danger">ยกเลิก</button>
                                                            <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>">
                                                            <input type="hidden" name="td_id" id="td_id" value="1">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <?php   } else {
                            $linkcopy = $RunLink->Call_Link_System();
                            exit("<script>window.location='$linkcopy/?modules=teach_data';</script>");
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
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[0]); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[0]); ?>&manage=form_add1';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <!--<form name="teach_data_read" id="teach_data_read" method="post" accept-charset="utf-8">-->
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
                                                                $sql = "SELECT * FROM `tb_teacher` WHERE `teacher_status`='1' AND `teacher_teach` = '1' AND `teacher_type`='1' AND `teacher_work`='1' ORDER BY `teacher_section_id` ASC, `teacher_name` ASC";
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
                                                                                <!-- <button type="button" name="" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[0]); ?>&manage=password1&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>';" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="เปลี่ยนรหัสผ่าน" data-placement="bottom" value=""><i class="icon-key"></i></button> -->
                                                                                <button type="button" name="Showteach_data" id="Showteach_data" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode('teach_data_show'); ?>&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>&id=<?php echo base64_encode($list_row_id[0]); ?>';" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value="<?php echo @$row['teacher_id']; ?>"><i class="icon-search4"></i></button>
                                                                                <button type="button" name="Upteach_data" id="Upteach_data" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[0]); ?>&manage=form_edit1&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo @$row['teacher_id']; ?>"><i class="icon-pen"></i></button>
                                                                                <!-- <button type="button" name="modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button> -->
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
                                                                                            var ABA_DeleteTeacherData1<?php echo @$row['teacher_id']; ?> = function() {
                                                                                                var _componentABA_DeleteTeacherData1 = function() {
                                                                                                    if (typeof swal == 'undefined') {
                                                                                                        console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                        return;
                                                                                                    }
                                                                                                    // Defaults
                                                                                                    var swalInitDeleteTeacherData1 = swal.mixin({
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
                                                                                                        var teacher_key = $("#delete_<?php echo $row['teacher_id']; ?>").val();

                                                                                                        if (action == "") {

                                                                                                            swalInitDeleteTeacherData1.fire({
                                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                icon: 'error'
                                                                                                            });

                                                                                                        } else {

                                                                                                            if (teacher_key != "") {
                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/teach_data/teach_data_process.php", {
                                                                                                                    action: action,
                                                                                                                    table: table,
                                                                                                                    ff: ff,
                                                                                                                    teacher_key: teacher_key
                                                                                                                }, function(process_add) {
                                                                                                                    var process_add = process_add;
                                                                                                                    if (process_add.trim() === "no_error") {

                                                                                                                        let timerInterval;
                                                                                                                        swalInitDeleteTeacherData1.fire({
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
                                                                                                                                        const b_teach_data = content.querySelector('b_teach_data')
                                                                                                                                        if (b_teach_data) {
                                                                                                                                            b_teach_data.textContent = Swal.getTimerLeft();
                                                                                                                                        } else {}
                                                                                                                                    } else {}
                                                                                                                                }, 100);
                                                                                                                            },
                                                                                                                            willClose: function() {
                                                                                                                                clearInterval(timerInterval)
                                                                                                                            }
                                                                                                                        }).then(function(result) {
                                                                                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[0]); ?>";
                                                                                                                            } else {}
                                                                                                                        });

                                                                                                                    } else if (process_add.trim() === "it_error") {
                                                                                                                        swalInitDeleteTeacherData1.fire({
                                                                                                                            title: 'ข้อมูลซ้ำ',
                                                                                                                            icon: 'error'
                                                                                                                        });
                                                                                                                    } else {
                                                                                                                        swalInitDeleteTeacherData1.fire({
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
                                                                                                    initComponentsDeleteTeacherData1: function() {
                                                                                                        _componentABA_DeleteTeacherData1();
                                                                                                    }
                                                                                                }
                                                                                            }();
                                                                                            // Initialize module
                                                                                            // ------------------------------
                                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                                ABA_DeleteTeacherData1<?php echo @$row['teacher_id']; ?>.initComponentsDeleteTeacherData1();
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
                                                <!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php } ?>

                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } elseif (($list == "2")) { ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <h4>ข้อมูลเช็คการสอน <?php echo $list_row_txt[1]; ?></h4>
                        </div>
                    </div><br>

                    <?php
                    $manage = filter_input(INPUT_GET, 'manage');
                    if (($manage == "form_add2")) { ?>
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
                                                            <button type="button" name="Add_Teacher_Data2" id="Add_Teacher_Data2" class="btn btn-info">บันทึก</button>&nbsp;
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
                    <?php } elseif (($manage == "form_edit2")) { ?>
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
                                                <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[1]); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[1]); ?>&manage=form_add2';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
<!--<form name="teacher_data2_form_edit" id="teacher_data2_form_edit" method="post" accept-charset="utf-8" enctype="multipart/form-data">-->
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
                                                                                    <option <?php echo @$row['teacher_type'] == 1 ? "selected" : ""; ?> value="1">เช็คการสอน</option>
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
                                                                        <button type="button" name="Edit_teacher_data2" id="Edit_teacher_data2" class="btn btn-info" value="<?php echo @$row['teacher_id']; ?>">บันทึก</button>&nbsp;
                                                                        <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                        <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>">
                                                                        <input type="hidden" name="td_id" id="td_id" value="2">
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
    <!--</from>-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <?php   } else {
                            $linkcopy = $RunLink->Call_Link_System();
                            exit("<script>window.location='$linkcopy/?modules=teacher_data2';</script>");
                        }
                        ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php } elseif (($manage == "password2")) { ?>
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
                                            <form name="teacher_data2_password" id="teacher_data2_password" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                                                            <button type="button" name="password_teacher_data2" id="password_teacher_data2" class="btn btn-info">บันทึก</button>&nbsp;
                                                            <button type="reset" name="changepass_cancel" id="changepass_cancel" class="btn btn-danger">ยกเลิก</button>
                                                            <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>">
                                                            <input type="hidden" name="td_id" id="td_id" value="2">
                                                        </fieldset>                                                   
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <?php   } else {
                            $linkcopy = $RunLink->Call_Link_System();
                            exit("<script>window.location='$linkcopy/?modules=teacher_data2';</script>");
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
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[1]); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[1]); ?>&manage=form_add2';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลครู</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <!--<form name="teacher_data2_read" id="teacher_data2_read" method="post" accept-charset="utf-8">-->
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
                                                                $sql = "SELECT * FROM `tb_teacher` WHERE `teacher_status`='1' AND `teacher_class` = '1' AND `teacher_type`='1' AND `teacher_work`='1' ORDER BY `teacher_section_id` ASC, `teacher_name` ASC";
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
                                                                        <td>
                                                                            <div><?php echo @$row['teacher_name']; ?>&nbsp;<?php echo @$row['teacher_surname']; ?></div>
                                                                        </td>
                                                                        <td>
                                                                            <div><?php echo @$row['teacher_name_eng']; ?>&nbsp;<?php echo @$row['teacher_surname_eng']; ?></div>
                                                                        </td>
                                                                        <td>
                                                                            <div><?php echo @$row['nickname']; ?></div>
                                                                        </td>
                                                                        <td>
                                                                            <div><?php echo @$row['position']; ?></div>
                                                                        </td>
                                                                        <td align="center">
                                                                            <div><?php echo @$rowS['teacher_section_name']; ?></div>
                                                                        </td>
                                                                        <td align="center">
                                                                            <div><?php echo @$row['mobile']; ?></div>
                                                                        </td>
                                                                        <td align="center">
                                                                            <div><?php echo @$row['teacher_username']; ?></div>
                                                                        </td>
                                                                        <td style="width: 18%;">
                                                                            <div align="center">
                                                                                <!-- <button type="button" name="" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[1]); ?>&manage=password2&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>';" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="เปลี่ยนรหัสผ่าน" data-placement="bottom" value=""><i class="icon-key"></i></button> -->

                                                                                <button type="button" name="Showteacher_data2" id="Showteacher_data2" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode('teach_data_show'); ?>&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>&id=<?php echo base64_encode($list_row_id[1]); ?>';" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value="<?php echo @$row['teacher_id']; ?>"><i class="icon-search4"></i></button>

                                                                                <button type="button" name="Upteacher_data2" id="Upteacher_data2" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[1]); ?>&manage=form_edit2&teacher_key=<?php echo base64_encode(@$row['teacher_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo @$row['teacher_id']; ?>"><i class="icon-pen"></i></button>
                                                                                <!-- <button type="button" name="modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button> -->
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
                                                                                            var ABA_DeleteTeacherData2<?php echo @$row['teacher_id']; ?> = function() {
                                                                                                var _componentABA_DeleteTeacherData2 = function() {
                                                                                                    if (typeof swal == 'undefined') {
                                                                                                        console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                        return;
                                                                                                    }
                                                                                                    // Defaults
                                                                                                    var swalInitDeleteTeacherData2 = swal.mixin({
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
                                                                                                        var teacher_key = $("#delete_<?php echo $row['teacher_id']; ?>").val();

                                                                                                        if (action == "") {

                                                                                                            swalInitDeleteTeacherData2.fire({
                                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                icon: 'error'
                                                                                                            });

                                                                                                        } else {

                                                                                                            if (teacher_key != "") {
                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/teach_data/teach_data_process.php", {
                                                                                                                    action: action,
                                                                                                                    table: table,
                                                                                                                    ff: ff,
                                                                                                                    teacher_key: teacher_key
                                                                                                                }, function(process_add) {
                                                                                                                    var process_add = process_add;
                                                                                                                    if (process_add.trim() === "no_error") {

                                                                                                                        let timerInterval;
                                                                                                                        swalInitDeleteTeacherData2.fire({
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
                                                                                                                                        const b_teacher_data2 = content.querySelector('b_teacher_data2')
                                                                                                                                        if (b_teacher_data2) {
                                                                                                                                            b_teacher_data2.textContent = Swal.getTimerLeft();
                                                                                                                                        } else {}
                                                                                                                                    } else {}
                                                                                                                                }, 100);
                                                                                                                            },
                                                                                                                            willClose: function() {
                                                                                                                                clearInterval(timerInterval)
                                                                                                                            }
                                                                                                                        }).then(function(result) {
                                                                                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data&list=<?php echo base64_encode($list_row_id[1]); ?>";
                                                                                                                            } else {}
                                                                                                                        });

                                                                                                                    } else if (process_add.trim() === "it_error") {
                                                                                                                        swalInitDeleteTeacherData2.fire({
                                                                                                                            title: 'ข้อมูลซ้ำ',
                                                                                                                            icon: 'error'
                                                                                                                        });
                                                                                                                    } else {
                                                                                                                        swalInitDeleteTeacherData2.fire({
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
                                                                                                    initComponentsDeleteTeacherData2: function() {
                                                                                                        _componentABA_DeleteTeacherData2();
                                                                                                    }
                                                                                                }
                                                                                            }();
                                                                                            // Initialize module
                                                                                            // ------------------------------
                                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                                ABA_DeleteTeacherData2<?php echo @$row['teacher_id']; ?>.initComponentsDeleteTeacherData2();
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
                                                <!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php } ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                }
                ?>


            <?php   } ?>

        </div>




<?php   } else {
    }
}
?>