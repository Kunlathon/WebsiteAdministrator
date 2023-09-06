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
    if((preg_match("/assessment_classroom.php/", $_SERVER['PHP_SELF']))){
        Header("Location:../index.php");
        die();
    }else{
        if((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        $id=base64_decode(filter_input(INPUT_GET,'id'));
        $check_term=base64_decode(filter_input(INPUT_GET,'check_term'));
        $check_grade=base64_decode(filter_input(INPUT_GET,'check_grade'));
            if(($id!="" and $check_term!="" and $check_grade!="")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> หน้าแรก</a>
                <a href="#" class="breadcrumb-item"><i class="icon-three-bars mr-2"></i> xx</a>
                <a href="#" class="breadcrumb-item"><i class="icon-list-unordered mr-2"></i> xx</a>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<div class="content">

        <?php
            $check_id=$id;
            $sqlC = "SELECT * FROM `tb_assessment_classroom` WHERE `a_classroom_id` = '{$check_id}'";
            $rowC = row_array($sqlC);
            $cid = $rowC['a_classroom_id'];
            $class = $rowC['a_classroom_name'];

            $sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
            $row = row_array($sql);	
            $grade="ระดับชั้น".$row['grade_name'];

            $sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
            $row = row_array($sql);	
            $term=$row['term']."/".$row['year'];
            $year=$row['year'];

            $tid1=$rowC['teacher_id1'];
            $sqlT1 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid1}'";
            $rowT1= row_array($sqlT1);

                if(($rowC['teacher_id2']!="")){
                    $tid2=$rowC['teacher_id2'];
                    $sqlT2 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid2}'";
                    $rowT2= row_array($sqlT2);
                }else{}
        ?>

    <div class="row">
        <div class="col-<?php echo $grid;?>-12" style="font-size: 20px;">บัญชีรายชื่อนิสิต ประจำปีการศึกษา <?php echo $year;?> ภาคเรียน <?php echo $term;?></div>
        <div class="col-<?php echo $grid;?>-12" style="font-size: 20px;"><?php echo $grade;?> / <?php echo $class;?></div>
        <div class="col-<?php echo $grid;?>-12" style="font-size: 20px;">ครูประจำชั้น(Eng) <?php echo @$rowT1['teacher_name'];?>&nbsp;<?php echo @$rowT1['teacher_surname'];?>&nbsp;ครูประจำชั้น(Thai) <?php echo @$rowT2['teacher_name'];?>&nbsp;<?php echo @$rowT2['teacher_surname'];?></div>
    </div><br>

            <?php
                //$list=base64_decode(filter_input(INPUT_GET,'list'));

                if((isset($_POST["list"]))){
                    $manage=base64_decode(filter_input(INPUT_POST,'list'));
                }else{
                    if((isset($_GET["list"]))){
                        $manage=base64_decode(filter_input(INPUT_GET,'list'));
                    }else{}
                }

                //@$list=base64_decode($list);
                        if(($manage=="form_classroom")){ ?>
    
            <?php
                $sql = "SELECT * FROM tb_assessment_classroom a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id=b.classroom_t_id WHERE a.a_classroom_id = '{$id}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}'";
                $row = row_array($sql);
                
                $cid = $row['classroom_t_id'];
                $classroom_name = $row['classroom_name'];
            ?>

    <div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <div class="card border border-purple">
                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลห้องเรียน</div>
                    <div class="col-<?php echo $grid; ?>-6" align="right">
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>?modules=assessment_classroom_show&id=<?php echo base64_encode($id);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>               
                    </div>
                </div>

                <div class="card-body">
<form name="form_classroom_acs" id="form_classroom_acs" accept-charset="utf-8">

                    <div class="row">       
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ห้องเรียน <font style="color: red;">*</font></label>
                                    <div class="col-<?php echo $grid; ?>-10">
                                        <select class="form-control select-search" name="classroom" id="classroom" data-placeholder="เลือกห้องเรียน..." required="required">
                                                    <option></option>
                                                <optgroup label="ห้องเรียน">
            <?php
				$sql = "SELECT * FROM  `tb_classroom_teacher` WHERE `grade_id` = '{$check_grade}' AND `term_id` = '{$check_term}' ORDER BY `classroom_name` ASC";
				$tt = result_array($sql);
			?>
            <?php foreach ($tt as $_tt) { ?>
													<option value="<?php echo @$_tt['classroom_t_id'] ?>"><?php echo @$_tt['classroom_name'];?></option>
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
                                    <button type="button" name="Add_classroom_acs" id="Add_classroom_acs" class="btn btn-info" value="<?php echo $list_copy;?>">บันทึก</button>&nbsp;
                                    <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                                </div>
                            </fieldset>
                        </div>
                    </div> 

                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
					<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
					<input type="hidden" name="term" id="term" value="<?php echo $check_term; ?>">
					<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade; ?>">

</form>
                </div>
            </div>            
        </div>
    </div>

            <?php       }elseif(($manage=="form_student")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php
                $check_id=$id;
                $sqlC = "SELECT * FROM `tb_assessment_classroom` WHERE `a_classroom_id` = '{$check_id}'";
                $rowC = row_array($sqlC);
                $cid = $rowC['a_classroom_id'];
                $class = $rowC['a_classroom_name'];
            
                $sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
                $row = row_array($sql);	
                $grade="ระดับชั้น".$row['grade_name'];
            
                $sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                $row = row_array($sql);	
                $term=$row['term']."/".$row['year'];
                $year=$row['year'];
            
                $tid1=$rowC['teacher_id1'];
                $sqlT1 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid1}'";
                $rowT1= row_array($sqlT1);
            ?>
<div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <div class="card border border-purple">
                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลจัดนิสิต</div>
                    <div class="col-<?php echo $grid; ?>-6" align="right">
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>?modules=assessment_classroom_show&id=<?php echo base64_encode($id);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>               
                    </div>
                </div>

                <div class="card-body">
<form name="form_student_acs" id="form_student_acs" accept-charset="utf-8">

                    <div class="row">       
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid; ?>-2">นิสิต <font style="color: red;">*</font></label>
                                    <div class="col-<?php echo $grid; ?>-10">
                                        <select class="form-control select-search" name="student_id" id="student_id" data-placeholder="เลือกนิสิต..." required="required">
                                                    <option></option>
                                                <optgroup label="นิสิต">
            <?php
				$sql = "SELECT * FROM tb_student WHERE grade_id = '$check_grade' AND student_status='1' ORDER BY student_name ASC";
				$sj = result_array($sql);
			?>

			<?php foreach ($sj as $_sj) { ?>
													<option value="<?php echo @$_sj['student_id'] ?>"><?php echo @$_sj['student_id'];?>&nbsp;-&nbsp;<?php echo @$_sj['student_name'];?>&nbsp;<?php echo @$_sj['student_surname'];?></option>
			<?php } ?>
                                                </optgroup>
                                        </select>
                                        <div id="student_id-null"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    <div class="row">       
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หมายเหตุ </label>
                                    <div class="col-<?php echo $grid; ?>-10">
                                        <textarea class="form-control" rows="3" name="memo" id="memo"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <button type="button" name="Add_student_acs" id="Add_student_acs" class="btn btn-info" value="<?php echo $list_copy;?>">บันทึก</button>&nbsp;
                                    <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                                </div>
                            </fieldset>
                        </div>
                    </div> 

    <input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>">
	<input type="hidden" name="class_id" id="class_id" value="<?php echo $class;?>">
	<input type="hidden" name="term" id="term" value="<?php echo $check_term;?>">
	<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade;?>">

</form>
                </div>
            </div>            
        </div>
    </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php       }elseif(($manage=="data_student")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php
                $student_id=base64_decode(filter_input(INPUT_GET,'student_id'));
                $sql = "SELECT * FROM tb_student WHERE student_id = '{$student_id}'";
                $row = row_array($sql);
                
                $date_now = date('Y-m-d');
            ?>

<div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <div class="card border border-purple">
                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลนิสิต</div>
                    <div class="col-<?php echo $grid; ?>-6" align="right">
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>?modules=assessment_classroom_show&id=<?php echo base64_encode($id);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>               
                    </div>
                </div>

                <div class="card-body">
<form name="form_data_student_acs" id="form_data_student_acs" accept-charset="utf-8">

                    <div class="row">       
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid; ?>-2">รหัสนิสิต </label>
                                    <div class="col-<?php echo $grid; ?>-10">
                                        <input type="text" name="student_id" id="student_id" class="form-control" value="<?php echo @$row['student_id']; ?>" placeholder="กรอกรหัสนิสิต" required="required" readonly="readonly">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">       
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อ-นามสกุล </label>
                                    <div class="col-<?php echo $grid; ?>-10">
                                        <input type="text"  class="form-control" value="<?php echo @$row['student_name']."&nbsp;".@$row['student_surname'];?>" placeholder="กรอกรหัสนิสิต" required="required" readonly="readonly">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div> 
                    
                    <div class="row">       
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid; ?>-2">เลขที่ </label>
                                    <div class="col-<?php echo $grid; ?>-10">
                                        <input type="number" name="stu_no" id="stu_no" class="form-control" value="<?php echo @$row['student_no'];?>" placeholder="กรอกเลขที่" required="required">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>                     

                    <div class="row">       
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะนิสิต <font style="color: red;">*</font></label>
                                    <div class="col-<?php echo $grid; ?>-10">
                                        <select class="form-control select" name="status" id="status" data-placeholder="เลือกสถานะนิสิต..." required="required">
                                                    <option></option>
                                                <optgroup label="สถานะนิสิต">
                                                <option <?php echo @$row['student_status']== 1 ? "selected":""; ?> value="1">ปกติ</option>
													<option <?php echo @$row['student_status']== 2 ? "selected":""; ?> value="2">ลาออก</option>
													<option <?php echo @$row['student_status']== 3 ? "selected":""; ?> value="3">จบการศึกษา</option>
													<option <?php echo @$row['student_status']== 4 ? "selected":""; ?> value="4">ลาพัก</option>
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
                                    <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่ลาออก </label>
                                    <div class="col-<?php echo $grid; ?>-10">
                                        <input type="text" name="dateout" id="dateout" class="form-control pickadate-accessibility rounded-right" value="<?php echo $date_now; ?>" placeholder="เลือกวันที่ลาออก" required="required">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>                     

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <button type="button" name="Up_student_acs" id="Up_student_acs" class="btn btn-info" value="<?php echo $list_copy;?>">บันทึก</button>&nbsp;
                                    <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                                </div>
                            </fieldset>
                        </div>
                    </div> 

 
	<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	<input type="hidden" name="classroom" id="classroom" value="<?php echo @$row['student_class']; ?>">
	<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">

</form>
                </div>
            </div>            
        </div>
    </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php       }else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <div class="card border border-purple">
                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลห้องเรียน ภาคเรียน <?php echo $term;?> <?php echo $grade;?></div>
                    <div class="col-<?php echo $grid; ?>-6" align="right">
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom_show&id=<?php echo base64_encode($id);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>               
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom_show&list=<?php echo base64_encode('form_classroom');?>&id=<?php echo base64_encode($id);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-users4"></i> จัดนิสิตทั้งห้อง</button>
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom_show&list=<?php echo base64_encode('form_student');?>&id=<?php echo base64_encode($id);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-user-plus"></i> จัดนิสิต</button>
                    </div>
                </div>


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
<form name="assessment_classroom_show_read" id="assessment_classroom_show_read"  accept-charset="utf-8">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered datatable-button-html5-columns-STD">
                                    <thead>
                                        <tr align="center">
                                            <th align="center"><div>ลำดับ</div></th>
                                            <th><div>รหัส</div></th>
                                            <th><div>รายชื่อ</div></th>
                                            <th><div>รายชื่อ(Eng)</div></th>
                                            <th><div>บัตร</div></th>
                                            <th><div>ชื่อเล่น</div></th>
                                            <th><div>เพศ</div></th>
                                            <th><div>เบอร์โทร</div></th>
                                            <th><div>จัดการ</div></th>
                                        </tr>    
                                    </thead>
                                    <tbody>
                <?php
                    $sql = "SELECT * FROM tb_term a INNER JOIN tb_assessment_classroom b ON a.term_id = b.term_id WHERE a.term_id = '{$check_term}' AND b.a_classroom_id = '{$cid}' AND b.a_classroom_status = '1' ORDER BY b.a_classroom_name ASC";
                    $row = row_array($sql);

                    $sql = "SELECT * , b.student_no AS STNO FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$cid}' AND a.a_classroom_detail_status='1' AND b.student_status='1' ORDER BY b.student_no ASC";
                    $list = result_array($sql);

                        foreach ($list as $key => $row){ 
                            if(($row['gender']=='1')){
                                $gender = "ชาย";
                            }elseif(($row['gender']=='2')){
                                $gender = "หญิง";
                            }else{}
                            $sqlC = "SELECT * FROM tb_assessment WHERE assessment_id = '{$row['student_class']}'";
                            $rowC = row_array($sqlC);

                            ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                        <tr>
                                            <td align="center">
                                                <div><?php echo @$row['STNO'];?> <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom_show&list=<?php echo base64_encode('data_student');?>&student_id=<?php echo base64_encode(@$row['student_id']);?>&id=<?php echo base64_encode($id);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>';" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="แก้ไขเลขที่" data-placement="bottom" value="<?php echo @$row['student_id']; ?>"><i class="icon-pen"></i></button></div>
                                            </td>
                                            <td><div><?php echo @$row['student_id'];?></div></td>
                                            <td><div><?php echo @$row['student_name']."&nbsp;".@$row['student_surname'];?></div></td>
                                            <td><div><?php echo @$row['student_name_eng']."&nbsp;".@$row['student_surname_eng'];?></div></td>
                                            <td><div><?php echo @$row['student_idcard'];?></div></td>
                                            <td><div><?php echo @$row['nickname'];?></div></td>
                                            <td><div><?php echo $gender;?></div></td>
                                            <td><div><?php echo @$row['student_tel'];?></div></td>
                                            <td>
                                                <div align="right">
                                                    <button type="button" name="modal_theme_success_Delete<?php echo @$row['student_id'];?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo @$row['student_id'];?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                </div>                                            
                                            </td>
                                        </tr>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="modal_theme_success_Delete<?php echo @$row['student_id']; ?>" class="modal fade" tabindex="-1">
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
						            ต้องการลบข้อมูล <?php echo @$row['student_name']. " " .@$row['student_surname']; ?> หรือไม่
                                </div>
                            </div>
                        </div>
                    </div><br>
					
                    <div class="row" style="text-align: center;">
                        <div class="col-<?php echo $grid; ?>-12">
                            <button type="button" id="delete_<?php echo @$row['student_id']; ?>" name="delete_<?php echo @$row['student_id']; ?>" class="btn btn-outline-success" value="<?php echo @$row['a_classroom_detail_id']; ?>">ใช่</button>
                            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary">ยกเลิก</button>
                        </div>
                    </div>

    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--Delete-->
                        <script>
                            var ABA_DeleteAssessmentClassroom<?php echo @$row['student_id']; ?> = function() {
                            var _componentABA_DeleteAssessmentClassroom = function() {
                                if (typeof swal == 'undefined') {
                                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                                    return;
                                }
    // Defaults
                                    var swalInitDeleteAssessmentClassroom = swal.mixin({
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
                                    $('#delete_<?php echo @$row['student_id']; ?>').on('click', function() {

                                        var action = "delete";
                                        var table = "tb_assessment_classroom_detail";
                                        var ff = "a_classroom_detail_id";
                                        var id = $("#delete_<?php echo $row['student_id']; ?>").val();

                                            if (action=="") {
											
                                                swalInitDeleteAssessmentClassroom.fire({
                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                    icon: 'error'
                                                });
												
                                            }else{

                                                if(id!=""){
                                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/assessment_classroom_show/assessment_classroom_show_process.php", {
                                                        action: action,
                                                        table: table,
                                                        ff: ff,
                                                        id: id
                                                    }, function(process_add) {
                                                    var process_add = process_add;
															if (process_add.trim() === "no_error") {

                                                                let timerInterval;
                                                                    swalInitDeleteAssessmentClassroom.fire({
                                                                        title: 'ลบสำเร็จ',
                                                                        //html: 'I will close in <b></b> milliseconds.',
                                                                        timer: 1200,
                                                                        icon: 'success',
                                                                        timerProgressBar: true,
                                                                        didOpen: function() {
                                                                            Swal.showLoading()
																			timerInterval = setInterval(function() {
                                                                            const content = Swal.getContent();
                                                                                if(content){
																					const b_assessment_classrom_show = content.querySelector('b_assessment_classrom_show')
                                                                                        if(b_assessment_classrom_show){
                                                                                            b_assessment_classrom_show.textContent = Swal.getTimerLeft();
                                                                                        }else{}
                                                                                }else{}
                                                                            }, 100);
                                                                        },
                                                                        willClose: function(){
                                                                            clearInterval(timerInterval)
                                                                        }
                                                                    }).then(function(result){
                                                                        if(result.dismiss===Swal.DismissReason.timer){
																			document.location = "<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom_show&id=<?php echo base64_encode($id);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>";
                                                                        }else{}
                                                                    });

															}else if(process_add.trim()==="it_error"){
                                                                swalInitDeleteAssessmentClassroom.fire({
                                                                    title: 'ข้อมูลซ้ำ',
                                                                    icon: 'error'
                                                                });
															}else{
                                                                swalInitDeleteAssessmentClassroom.fire({
                                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+process_add.trim(),
                                                                    icon: 'error'
                                                                });
															}
                                                        })

												}else{}

                                            }
                                    });

    //--------------------------------------------------------------------------------------
                            };
    //--------------------------------------------------------------------------------------
								return {
                                    initComponentsDeleteAssessmentClassroom: function() {
                                        _componentABA_DeleteAssessmentClassroom();
                                    }
                                }
                            }();
    // Initialize module
    // ------------------------------
                                document.addEventListener('DOMContentLoaded', function() {
                                    ABA_DeleteAssessmentClassroom<?php echo @$row['student_id']; ?>.initComponentsDeleteAssessmentClassroom();
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } ?>
</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{} ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->            
<?php   }else{}
    } ?>