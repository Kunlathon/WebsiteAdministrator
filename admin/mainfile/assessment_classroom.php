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
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>

<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                    <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                <a href="#" class="breadcrumb-item">
                    <i class="icon-three-bars mr-2"></i> xx</a>

                <a href="#" class="breadcrumb-item">
                    <i class="icon-list-unordered mr-2"></i> xx</a>

            </div>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>    

<div class="content">

    <div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <h4>จัดการแบบประเมิน</h4>
        </div>
    </div>


    <?php 

        if((isset($_POST["list"]))){
            $list=base64_decode(filter_input(INPUT_POST,'list'));
        }else{
            if((isset($_GET["list"]))){
                $list=base64_decode(filter_input(INPUT_GET,'list'));
            }else{}
        }


            if((!is_numeric($list))){
                $manage=$list;
            }else{}  



            if((is_numeric($list))){ 
                $check_grade=$list;

                if(($check_grade!="")){
                    $sql = "SELECT * FROM `tb_grade` WHERE `grade_id` = '{$check_grade}'";
                    $row = row_array($sql);	
                    $grade="ระดับชั้น".$row['grade_name'];
                }else{
                    $grade=null;
                }


                if((isset($_POST["check_term"]))){
                    $test_check_term=base64_decode(filter_input(INPUT_POST,'check_term'));
                }else{
                    if((isset($_GET["check_term"]))){
                        $test_check_term=base64_decode(filter_input(INPUT_GET,'check_term'));
                    }
                }


                if(($test_check_term!=null)){
                    $check_term=$test_check_term;
                    $sql = "SELECT * FROM `tb_term` WHERE `term_id` = '{$check_term}' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
                    $row = row_array($sql);	
                    $term=$row['term']."/".$row['year'];
                }else{
                    $sql = "SELECT * FROM `tb_term` WHERE `term_status` = '1' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
                    $row = row_array($sql);
                    $check_term=$row['term_id'];
                    $term=$row['term']."/".$row['year'];
                }

                ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 
<div class="row">
        <div class="col-<?php echo $grid;?>-3">
            <div class="btn-group">
                <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom';" class="btn btn-outline-secondary">จัดการแบบประเมิน</button>&nbsp;&nbsp;
                <button type="button" name="" id="" class="btn btn-outline-success"></button>
            </div>
        </div>
        <div class="col-<?php echo $grid;?>-3"></div>
        <div class="col-<?php echo $grid;?>-3"></div>
        <div class="col-<?php echo $grid;?>-3">
            <fieldset class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-<?php echo $grid;?>-3">ระดับชั้น</label>
                    <div class="col-<?php echo $grid;?>-9">
                        <select class="form-control select" name="check_term" id="check_term" data-placeholder="ระดับชั้น..." required="required">
                                <option></option>
                            <optgroup label="ระดับชั้น">
        <?php
            $sql = "SELECT * FROM `tb_term` WHERE `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
            $cc = result_array($sql);
        ?>
		<?php foreach ($cc as $_cc) { ?>
                                <option <?php echo $check_term == $_cc['term_id'] ? "selected":"";?> value="<?php echo $_cc['term_id'];?>"><?php echo $_cc['term'];?>/<?php echo $_cc['year'];?></option>
        <?php } ?>      
                            </optgroup>
                        </select>   
                    </div>
                </div>                                         
            </fieldset>
        </div>
        <input type="hidden" name="copy_list" id="copy_list" value="<?php echo $check_grade;?>">        
    </div><br> 


    <div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <div class="card border border-purple"> 

                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid;?>-6">ตารางข้อมูลห้องเรียน ภาคเรียน <?php echo $term;?> <?php echo $grade;?></div>
                    <div class="col-<?php echo $grid;?>-6" align="right">
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom&list=<?php echo base64_encode($list);?>&check_term=<?php echo base64_encode($check_term);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom&list=<?php echo base64_encode('form_add');?>&check_term=<?php echo base64_encode($check_term);?>&list_copy=<?php echo base64_encode($list);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูล</button>
                    </div>
			    </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
<form name="assessment_classroom_data" id="assessment_classroom_data"> 
    <div class="table-responsive">
        <table class="table table-bordered datatable-button-html5-columns-STD">
            <thead>
                <tr align="center">
                    <th align="center"><div>ลำดับ</div></th>
                    <th><div>ห้องเรียน</div></th>
                    <th><div>นิสิต</div></th>
                    <th><div>ครูประจำชั้น(Eng)</div></th>
                    <th><div>ครูประจำชั้น(Tha)</div></th>
                    <th><div>ครูผู้สอน(ESL)</div></th>
                    <th><div>ฝ่ายวิชาการ</div></th>
                    <th style="width: 13%;"><div>จัดการ</div></th>
                </tr>  
            </thead>
            <tbody>


        <?php 						
            $sql = "SELECT * FROM tb_assessment_classroom WHERE term_id = '{$check_term}' AND grade_id = '{$check_grade}' AND a_classroom_status ='1' ORDER BY a_classroom_name ASC";
            $list = result_array($sql);
        ?>
        <?php foreach ($list as $key => $row) { 
            $key=$key+1;
            ?>
        <?php
            $sql1 = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$row['a_classroom_id']}' AND a.a_classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' ORDER BY b.student_no ASC";
            $cc1 = result_array($sql1);
        ?>
        <?php
            $sql1 = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$row['a_classroom_id']}' AND a.a_classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' ORDER BY b.student_no ASC";
            $cc1 = result_array($sql1);
        ?>
        <?php 
            $tid1=$row['teacher_id1'];
            $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
            $rowT1= row_array($sqlT1);
        ?>
        <?php 
            $tid2=$row['teacher_id2'];
            $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid2}'";
            $rowT2= row_array($sqlT2);
        ?>
        <?php 
            $tid3=$row['teacher_id3'];
            $sqlT3 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid3}'";
            $rowT3= row_array($sqlT3);
        ?>
        <?php 
            $tidE=$row['teacher_esl'];
            $sqlTE = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tidE}'";
            $rowTE= row_array($sqlTE);
        ?>
        <?php 
            $tidC=$row['teacher_check'];
            $sqlTC = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tidC}'";
            $rowTC= row_array($sqlTC);
        ?>

                <tr>
                    <td align="center"><div><?php echo $key;?></div></td>
        <?php
                if(($row['assessment_class']!=null)){ ?>
                    <td><div><?php echo $row['a_classroom_name']."&nbsp;ชั้น&nbsp;".$row['a_classroom_class'];?></div></td>
        <?php   }elseif(($row['a_classroom_class']==null)){ ?>
                    <td><div><?php echo $row['a_classroom_name'];?></div></td>
        <?php   }else{ ?>
                    <td><div></div></td>
        <?php   } ?>
                    <td align="center"><div><span class="badge badge-flat badge-pill border-primary text-primary"><?php echo count($cc1);?></span></div></td>
                    <td >
                        <div><?php echo $rowT1['teacher_name']."&nbsp;".$rowT1['teacher_surname'];?></div>
        <?php 
			    if(($row['position_id1']=='1')){ ?>
						<div align="center"><span class="badge badge-success">English Homeroom Teacher</span></div>									
        <?php	}elseif(($row['position_id1']=='2')){ ?>
                        <div align="center"><span class="badge badge-warning">Academic Affairs</span></div>																							
        <?php	}else{ ?>
                        <div align="center"></div>
        <?php   }?>                  
                    </td>
                    <td><div><?php echo $rowT2['teacher_name']."&nbsp;".$rowT2['teacher_surname'];?></div></td>
                    <td><div><?php echo $rowTE['teacher_name']."&nbsp;".$rowTE['teacher_surname'];?></div></td>
                    <td><div><?php echo $rowT3['teacher_name']."&nbsp;".$rowT3['teacher_surname'];?></div></td>
                    <td style="width: 13%;">
                        <div align="right">
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>?modules=assessment_classroom_show&id=<?php echo base64_encode(@$row['a_classroom_id']);?>&check_term=<?php echo base64_encode($check_term);?>&check_grade=<?php echo base64_encode($check_grade);?>'" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="รายอะเอียด" data-placement="bottom"><i class="icon-search4"></i></button>
                            <button type="button" name="Upuser_data" id="Upuser_data" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>?modules=assessment_classroom&list=<?php echo base64_encode('form_edit');?>&check_term=<?php echo base64_encode($check_term);?>&list_copy=<?php echo base64_encode($check_grade);?>&id=<?php echo base64_encode(@$row['a_classroom_id']);?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value=""><i class="icon-pen"></i></button>
                            <button type="button" name="modal_theme_success_Delete<?php echo @$row['a_classroom_id'];?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo @$row['a_classroom_id'];?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>    
                        </div>                                            
                    </td>
                </tr>


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="modal_theme_success_Delete<?php echo $row['a_classroom_id']; ?>" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <div><i class="icon-warning" style="font-size :30px;"></i></div>
                </div>

                <div class="modal-body">
	<form name="assessment-classroom-delete" id="assessment-classroom-delete"  accept-charset="utf-8">
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="row" style="text-align: center;">
                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
						            ต้องการลบข้อมูล ลำดับที่ <?php echo $key;?> หรือไม่
                                </div>
                            </div>
                        </div>
                    </div><br>
					
                    <div class="row" style="text-align: center;">
                        <div class="col-<?php echo $grid; ?>-12">
                            <button type="button" id="delete_<?php echo $row['a_classroom_id']; ?>" name="delete_<?php echo $row['a_classroom_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['a_classroom_id']; ?>">ใช่</button>
                            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary">ยกเลิก</button>
                        </div>
                    </div>

    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--Delete-->
                        <script>
                            var ABA_DeleteAssessmentClassroom<?php echo $row['a_classroom_id']; ?> = function() {
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
                                    $('#delete_<?php echo @$row['a_classroom_id']; ?>').on('click', function() {

                                        var action = "delete";
                                        var table = "tb_assessment_classroom";
                                        var ff = "a_classroom_id";
                                        var id = $("#delete_<?php echo $row['a_classroom_id']; ?>").val();

                                            if (action=="") {
											
                                                swalInitDeleteAssessmentClassroom.fire({
                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                    icon: 'error'
                                                });
												
                                            }else{

                                                if(id!=""){
                                                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_classroom/assessment_classroom_process.php", {
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
																					const b_teacher_data3 = content.querySelector('b_teacher_data3')
                                                                                        if(b_teacher_data3){
                                                                                            b_teacher_data3.textContent = Swal.getTimerLeft();
                                                                                        }else{}
                                                                                }else{}
                                                                            }, 100);
                                                                        },
                                                                        willClose: function(){
                                                                            clearInterval(timerInterval)
                                                                        }
                                                                    }).then(function(result){
                                                                        if(result.dismiss===Swal.DismissReason.timer){
																			document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=assessment_classroom&list=<?php echo base64_encode($check_grade);?>&check_term=<?php echo base64_encode($check_term);?>";
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
                                    ABA_DeleteAssessmentClassroom<?php echo @$row['a_classroom_id']; ?>.initComponentsDeleteAssessmentClassroom();
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }elseif(($manage=="form_edit")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php
                @$list_copy=base64_decode(filter_input(INPUT_GET,'list_copy'));
                @$id=base64_decode(filter_input(INPUT_GET,'id'));
                @$check_term=base64_decode(filter_input(INPUT_GET,'check_term'));
                @$check_grade=$list_copy;

                $sql = "SELECT * FROM tb_assessment_classroom WHERE a_classroom_id = '{$id}'";
                $row = row_array($sql);

        ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
    <div class="col-<?php echo $grid;?>-12">
        <div class="card border border-purple">
            <div class="card-header header-elements-inline bg-info text-white">
                <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลห้องเรียน</div>
                <div class="col-<?php echo $grid; ?>-6" align="right">
                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom&list=<?php echo base64_encode($list_copy);?>&check_term=<?php echo base64_encode($check_term);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-<?php echo $grid;?>-12">
<form name="assessment_classroom_up" id="assessment_classroom_up"  accept-charset="utf-8" enctype="multipart/form-data">

                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ห้องเรียน <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="classroomid" id="classroomid" data-placeholder="เลือกห้องเรียน..." required="required">
                                                    <option></option>
                                                <optgroup label="ห้องเรียน">
            <?php
				$sql = "SELECT * FROM  tb_classroom_teacher WHERE grade_id = '$check_grade' AND term_id = '$check_term' ORDER BY classroom_name ASC";
				$cr = result_array($sql);
				$cr = result_array($sql);
			?>

			<?php foreach ($cr as $_cr) { ?>
													<option <?php echo $row['classroom_t_id']== $_cr['classroom_t_id'] ? "selected":""; ?> value="<?php echo $_cr['classroom_t_id'];?>"><?php echo "$_cr[classroom_name]";?></option>
			<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="classroomid-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        
                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ครูประจำชั้น(Eng) <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="teacher1" id="teacher1" data-placeholder="เลือกครูประจำชั้น(Eng)..." required="required">
                                                    <option></option>
                                                <optgroup label="ครูประจำชั้น(Eng)">
            <?php
				$sql = "SELECT * FROM  tb_teacher WHERE teacher_status='1' ORDER BY teacher_name ASC";
				$tt = result_array($sql);
			?>

			<?php foreach ($tt as $_tt) { ?>
													<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
			<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="teacher1-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>                         

                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ตำแหน่งครูประจำชั้น <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select" name="position1" id="position1" data-placeholder="เลือกตำแหน่งครูประจำชั้น..." required="required">
                                                    <option></option>
                                                <optgroup label="ตำแหน่งครูประจำชั้น">
                                                    <option value="1" <?php echo $row['position_id1']== 1 ? "selected":""; ?>>English Homeroom Teacher</option>
													<option value="2" <?php echo $row['position_id1']== 2 ? "selected":""; ?>>Academic Affairs</option>
                                                </optgroup>
                                            </select>
                                            <div id="position1-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div> 
                        
                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ครูประจำชั้น(Tha) <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="teacher2" id="teacher2" data-placeholder="เลือกครูประจำชั้น(Tha)..." required="required">
                                                    <option></option>
                                                <optgroup label="ครูประจำชั้น(Tha)">
            <?php
				$sql = "SELECT * FROM  tb_teacher WHERE teacher_status='1'  ORDER BY teacher_name ASC";
				$tt = result_array($sql);
			?>

			<?php foreach ($tt as $_tt) { ?>
				<option <?php echo $row['teacher_id2']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
			<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="teacher2-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>         
                        
                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ครูผู้สอน(ESL) <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="teacher_esl" id="teacher_esl" data-placeholder="เลือกครูผู้สอน(ESL)..." required="required">
                                                    <option></option>
                                                <optgroup label="ครูผู้สอน(ESL)">
            <?php
				$sql = "SELECT * FROM  tb_teacher WHERE teacher_status='1' ORDER BY teacher_name ASC";
				$tt = result_array($sql);
			?>

			<?php foreach ($tt as $_tt) { ?>
									                <option <?php echo $row['teacher_esl']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
			<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="teacher_esl-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div> 
                        
                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ฝ่ายวิชาการ <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="teacher3" id="teacher3" data-placeholder="เลือกฝ่ายวิชาการ..." required="required">
                                                    <option></option>
                                                <optgroup label="ฝ่ายวิชาการ">
            <?php
				$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name ASC";
				$tt = result_array($sql);
			?>

			<?php foreach ($tt as $_tt) { ?>
							                        <option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
			<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="teacher3-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>   
                        
                    
                                   
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <button type="button" name="Up_assessment_classroom" id="Up_assessment_classroom" class="btn btn-info" value="<?php echo $list_copy;?>">บันทึก</button>&nbsp;
                                        <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>        

    <input type="hidden" name="term" id="term" value="<?php echo $check_term;?>">
	<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade;?>">
    <input type="hidden" name="a_classroom_id" id="a_classroom_id" value="<?php echo $row['a_classroom_id'];?>">
      

</from>                
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }elseif(($manage=="form_add")){ 

                $list_copy=base64_decode(filter_input(INPUT_GET,'list_copy'));
                $check_grade=$list_copy;

                if((isset($_POST["check_term"]))){
                    $test_check_term=base64_decode(filter_input(INPUT_POST,'check_term'));
                }else{
                    if((isset($_GET["check_term"]))){
                        $test_check_term=base64_decode(filter_input(INPUT_GET,'check_term'));
                    }
                }

                if(($test_check_term!=null)){
                            $check_term=$test_check_term;
                            $sql = "SELECT * FROM `tb_term` WHERE `term_id` = '{$check_term}' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
                            $row = row_array($sql);	
                            $term=$row['term']."/".$row['year'];
                }else{
                            $sql = "SELECT * FROM `tb_term` WHERE `term_status` = '1' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
                            $row = row_array($sql);
                            $check_term=$row['term_id'];
                            $term=$row['term']."/".$row['year'];
                }

        ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
    <div class="col-<?php echo $grid;?>-12">
        <div class="card border border-purple">
            <div class="card-header header-elements-inline bg-info text-white">
                <div class="col-<?php echo $grid; ?>-6">ฟอร์มจัดห้องเรียน</div>
                <div class="col-<?php echo $grid; ?>-6" align="right">
                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom&list=<?php echo base64_encode($list_copy);?>&check_term=<?php echo base64_encode($check_term);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-<?php echo $grid;?>-12">
<form name="assessment_classroom_add" id="assessment_classroom_add"  accept-charset="utf-8" enctype="multipart/form-data">

                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ห้องเรียน <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="classroomid" id="classroomid" data-placeholder="เลือกห้องเรียน..." required="required">
                                                    <option></option>
                                                <optgroup label="ห้องเรียน">
        <?php
			$sql = "SELECT * FROM  tb_classroom_teacher WHERE grade_id = '{$check_grade}' AND term_id = '{$check_term}' ORDER BY classroom_name ASC";
			$cr = result_array($sql);
			?>

		<?php foreach ($cr as $_cr) { ?>
												    <option value="<?php echo @$_cr['classroom_t_id'];?>"><?php echo @$_cr['classroom_name'];?></option>
		<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="classroomid-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        
                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ครูประจำชั้น(Eng) <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="teacher1" id="teacher1" data-placeholder="เลือกครูประจำชั้น(Eng)..." required="required">
                                                    <option></option>
                                                <optgroup label="ครูประจำชั้น(Eng)">
        <?php
			$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
			$tt = result_array($sql);
		?>

		<?php foreach ($tt as $_tt) { ?>
													<option value="<?php echo @$_tt['teacher_id'] ?>"><?php echo @$_tt['teacher_name'];?>&nbsp;<?php echo @$_tt['teacher_surname'];?></option>
		<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="teacher1-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>                         

                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ตำแหน่งครูประจำชั้น <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select" name="position1" id="position1" data-placeholder="เลือกตำแหน่งครูประจำชั้น..." required="required">
                                                    <option></option>
                                                <optgroup label="ตำแหน่งครูประจำชั้น">
                                                    <option value="1">English Homeroom Teacher</option>
                                                    <option value="2">Academic Affairs</option>
                                                </optgroup>
                                            </select>
                                            <div id="position1-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div> 
                        
                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ครูประจำชั้น(Tha) <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="teacher2" id="teacher2" data-placeholder="เลือกครูประจำชั้น(Tha)..." required="required">
                                                    <option></option>
                                                <optgroup label="ครูประจำชั้น(Tha)">
        <?php
			$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
			$tt = result_array($sql);
			?>

		<?php foreach ($tt as $_tt) { ?>
													<option value="<?php echo @$_tt['teacher_id'] ?>"><?php echo @$_tt['teacher_name'];?>&nbsp;<?php echo @$_tt['teacher_surname'];?></option>
		<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="teacher2-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>         
                        
                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ครูผู้สอน(ESL) <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="teacher_esl" id="teacher_esl" data-placeholder="เลือกครูผู้สอน(ESL)..." required="required">
                                                    <option></option>
                                                <optgroup label="ครูผู้สอน(ESL)">
        <?php
			$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
			$tt = result_array($sql);
			?>

		<?php foreach ($tt as $_tt) { ?>
													<option value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
		<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="teacher_esl-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div> 
                        
                        <div class="row">       
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ฝ่ายวิชาการ <font style="color: red;">*</font></label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select-search" name="teacher3" id="teacher3" data-placeholder="เลือกฝ่ายวิชาการ..." required="required">
                                                    <option></option>
                                                <optgroup label="ฝ่ายวิชาการ">
        <?php
			$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' ORDER BY teacher_name ASC";
			$tt = result_array($sql);
			?>

		<?php foreach ($tt as $_tt) { ?>
													<option value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
		<?php } ?>
                                                </optgroup>
                                            </select>
                                            <div id="teacher3-null"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>   
                        
                    
                                   
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <div class="form-group row">
                                        <button type="button" name="Add_assessment_classroom" id="Add_assessment_classroom" class="btn btn-info" value="<?php echo $list_copy;?>">บันทึก</button>&nbsp;
                                        <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>                                                
            
            
    <input type="hidden" name="term" id="term" value="<?php echo $check_term;?>">
	<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade;?>">
    
</from>                
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <div class="row">
        <?php
            $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                          FROM `tb_grade` 
                          ORDER BY `grade_id` ASC";
            $class_Row = result_array($class_Sql);
            $count_color=0;
            $bg_color=array("bg-primary","bg-success","bg-info");
            foreach ($class_Row as $key => $class_Print){
                if((is_array($class_Print) && count($class_Print))){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="col-<?php echo $grid; ?>-4">
<form name="list_class<?php echo $count_color;?>" id="list_class<?php echo $count_color;?>" method="post" action="<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom">
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
        <input name="list"  type="hidden" value="<?php echo base64_encode($class_Print['grade_id']);?>">


</form>
                        </div>
        <?php
            $count_color=$count_color+1;
                if(($count_color=="3")){
                    $count_color=0;
                }else{}
        ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php   }else{}
            }
        ?>
        </div>



<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>







</div>


<?php   }else{}

    } ?>