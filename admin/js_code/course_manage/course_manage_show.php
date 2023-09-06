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
    include ("../../config/connect.ini.php");
    include ("../../config/fnc.php");

    include("../../structure/link.php");
    $RunLink = new link_system();

    check_login('admin_username_aba', 'login.php');
?>

<script type="text/javascript">
    function setScreenHWCookie() {
        $.cookie('sw', screen.width);
        //$.cookie('sh',screen.height);
        return true;
    }
    setScreenHWCookie();
</script>

<?php
$width_system = filter_input(INPUT_COOKIE, 'sw');
    if(($width_system >= 1200)) {
        $grid = "xl";
    }elseif(($width_system >= 992)) {
        $grid = "lg";
    }elseif(($width_system <= 768)) {
        $grid = "md";
    }elseif(($width_system <= 576)) {
        $grid = "sm";
    }else{
        $grid = "xs";
    }
?>

<?php
    $course_class_key=filter_input(INPUT_POST, 'course_class_key');
    $class_key=filter_input(INPUT_POST, 'class_key');
    $check_term=filter_input(INPUT_POST, 'check_term');
    $check_grade=filter_input(INPUT_POST, 'check_grade');
?>

<div class="row">
                                <div class="col-<?php echo $grid;?>-12">
            
                                    <div class="table-responsive">


                                            <table class="table table-bordered datatable-button-html5-columns-STDB" id="">
                                                <thead>
													<tr>
                                                        <th > &nbsp; </th>
														<th > &nbsp; </th>
                                                        <th> &nbsp; 											
		
														<?php
																if((check_session("admin_username")) == "snaper" || (check_session("admin_username") == "krusoh")){ 
														?>
															
                                                        <div>
                                                            <ul class="nav justify-content-center">
                                                                <li class="nav-item">
<form name="form_gccd">
                                                                            <button type="submit" name=""  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="สำเนาการเรียน" data-placement="bottom" value=""><i class="icon-copy3"></i> สำเนาการเรียน</button>                                             
<input name="grade_key" type="hidden" value="<?php echo $row['grade_id']; ?>">
<input name="course_class_key" type="hidden" value="<?php echo $course_class_key; ?>">

</form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                            
                                                            <!--<a href="ajax/get_copycourse_check_detail.php?id=<?php echo $row['grade_id'];?>&cid=<?php echo $course_class_key;?>" data-toggle="modal" data-id="<?php echo $row['course_id'];?>" data-target="#CopyCourseCheck" class="btn btn-sm yellow-gold">
																	<i class="fa fa-copy"></i> สำเนา</a>-->
															
														<?php
															}
														?>
													</th>
														<th > &nbsp; </th>
														<?php
															$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id WHERE a.course_class_id = '$course_class_key' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC";

															//echo $sql;
															$row = result_array($sql);

															foreach ($row as $_row) { 

															$sql1 = "SELECT *,COUNT(course_class_level_id) AS CC1 FROM tb_course_class_level WHERE course_class_detail_id = '$_row[course_class_detail_id]' ORDER BY course_class_level_name ASC";

															//echo $sql1;
															$row1 = row_array($sql1);

															//echo $row1['CC1'];

														?>
														
														<th colspan="<?php echo $row1['CC1'];?>" align="center" bgcolor="">
															<?php echo $_row['subject_code'];?><br>
															<?php echo $_row['subject_name'];?>
														
														</th>
														<?php } ?>

                                                    </tr>

                                                     <tr>
                                                        <th><div>เลขที่</div></th>
														<!--<th width="30"> ลำดับ </th>-->
														<th><div>รหัส</div></th>
                                                        <th><div>รายชื่อ</div></th>
														<th><div>ชื่อเล่น</div></th>
														<?php
															$sqlSco_1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$course_class_key' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

															//$sqlSco_1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$course_class_key' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

															//echo $sqlSco_1;
															$rowSco_1 = result_array($sqlSco_1);
                                                            $count_cm=1;
															foreach ($rowSco_1 as $_rowSco_1) { 

															//echo $_rowSco_1['course_class_level_id'];
														?>
														<th  class="text-nowrap" align="center" bgcolor="#ccf4fd">
															<!--<a href="ajax/get_addclasscheck.php?id=<?php echo $_rowSco_1['course_class_id'];?>&rid=<?php echo $_rowSco_1['classroom_t_id'];?>&sid=<?php echo $_rowSco_1['subject_id'];?>&lid=<?php echo $_rowSco_1['course_class_level_id'];?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" data-toggle="modal" data-id="<?php echo $_rowSco_1['assessment_id'];?>" data-target="#AddCheck" class="btn btn-sm blue" title="<?php echo $_rowSco_1['course_class_level_name'];?>-<?php echo $_rowSco_1['subject_code'];?> <?php echo $_rowSco_1['subject_name'];?>">
																<i class="icon-file-text"></i> </a>-->
														
                                                            <div><a data-toggle="modal" data-toggle="modal" data-target="#AddCheck<?php echo $count_cm;?>" class="badge badge-info p-1" title=""><i class="icon-file-text2"></i></a></div>
                                                            <div><?php echo $_rowSco_1['course_class_level_name'];?></div>

																
														
                                                            <div id="AddCheck<?php echo $count_cm;?>" class="modal fade" tabindex="-1">
<form action="<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_manage/course_manage_process.php" name="frmMain<?php echo $count_cm;?>" method="post">      

    <?php

        $sqlC = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id='{$_rowSco_1['classroom_t_id']}' "; 
        $rowC = row_array($sqlC);

        $sqlS = "SELECT *, c.teacher_id1 AS T1, c.teacher_id2 AS T2 FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id = c.course_class_detail_id INNER JOIN tb_subject d ON b.subject_id = d.subject_id WHERE a.course_class_id = '{$_rowSco_1['course_class_id']}' AND b.subject_id='{$_rowSco_1['subject_id']}' AND c.course_class_level_id = '{$_rowSco_1['course_class_level_id']}'";

        //echo $sqlS;
        $rowS = row_array($sqlS);
        
        $ccdid = $rowS['course_class_detail_id'];
        $cid = $rowS['classroom_t_id'];

        //check Course

        $cc_id = $rowS['course_class_id'];
        $cd_id = $rowS['course_class_detail_id'];
        $cl_id = $rowS['course_class_level_id'];
        $sj_id = $rowS['subject_id'];				

        $sqlClass = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id WHERE a.classroom_t_id = '{$cid}'";

        //echo $sqlClass;

        $rowClass = result_array($sqlClass); 

        foreach ($rowClass as $key => $_rowClass) { 

            $sql_1 = "SELECT * , COUNT(b.course_s_detail_id) AS NUM FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id' AND a.term_id = '$check_term' AND a.grade_id = '$check_grade'  AND a.student_id = '$_rowClass[student_id]' AND b.course_class_detail_id = '$cd_id' AND b.course_class_level_id = '$cl_id' AND c.subject_id = '$sj_id'";
            
            //echo $sql_1;
            $row_1 = row_array($sql_1);

            $number = $row_1['NUM'];

            if($number > 0){

            } else if($number == 0){

                $sql = "SELECT * FROM tb_course_class_level WHERE course_class_level_id = '$cl_id'";
                $row = row_array($sql); 

                $cdid = $row['course_class_detail_id'];
                $clid = $row['course_class_level_id'];

                $sqlCou = "SELECT * FROM tb_course_student WHERE course_class_id = '$cc_id'";
            
                //echo $sqlCou;
                $rowCou = result_array($sqlCou); 

                foreach ($rowCou as $key => $_rowCou) { 

                    $sqlT = "SELECT *,MAX(course_s_detail_id) AS ID FROM tb_course_student_detail";
                    $tcrT = row_array($sqlT);

                    $CS_ID = $tcrT['ID'] + 1;

                    $csid = $_rowCou['course_s_id'];					

                    $aid = check_session("admin_id_aba");
                    $update = date('Y-m-d H:i:s');

                            $data3 = array(
                                "course_s_detail_id" => $CS_ID ,
                                "course_s_id" => $csid ,
                                "course_class_detail_id" =>  $cdid,
                                "course_class_level_id" =>  $clid,			
                                "course_class_level_check" =>  0,	
                                "score1" =>  0,	
                                "score2" =>  0,	
                                "score" =>  0,	
                                "admin_id" => $aid ,
                                "admin_update" => $update ,
                                "course_s_detail_status" => 1

                            );

                            insert("tb_course_student_detail", $data3);
                }
            }

        }



    ?>

                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-info text-white">
                                                                            
                                                                            <div class="col-<?php echo $grid;?>-12">
                                                                                <div><h6 class="modal-title">จัดการเรียน ห้องเรียน <?php echo $rowC['classroom_name']; ?></h6></div>
                                                                                <div><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                                                                            </div>
                                                                            
                                                                        </div>

<input type="hidden" name="ccid" id="ccid" value="<?php echo $_rowSco_1['course_class_id'];?>">
<input type="hidden" name="ccdid" id="ccdid" value="<?php echo $ccdid; ?>">
<input type="hidden" name="rid" id="rid" value="<?php echo $_rowSco_1['classroom_t_id'];?>">
<input type="hidden" name="sid" id="sid" value="<?php echo $_rowSco_1['subject_id'];?>">
<input type="hidden" name="lid" id="lid" value="<?php echo $_rowSco_1['course_class_level_id'];?>">
<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">                                                                          

                                                                        <div class="modal-body">
                                                                           
                                                                            <div class="row">
                                                                                <div class="col-<?php echo $grid;?>-12">
                                                                                    <div>วิชา <?php echo $rowS['subject_code'];?> <?php echo $rowS['subject_name'];?> (<?php echo $rowS['course_class_level_name'];?>)</div>
                                                                                    
    <?php
		    if(($rowS['T1'] != 0) && ($rowS['T1'] != "")){
			    $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '$rowS[T1]' AND teacher_status='1'";
			    $rowT1 = row_array($sqlT1); ?>           
                                                                                    <div><h6 class="font-weight-semibold">ครูผู้สอน : <?php echo $rowT1['teacher_name'];?>&nbsp;<?php echo $rowT1['teacher_surname'];?></h6></div>
    <?php   }else{}

            if(($rowS['T2'] != 0) && ($rowS['T2'] != "")) {
                $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '$rowS[teacher_id2]' AND teacher_status='1'";
                $rowT2 = row_array($sqlT2); ?>
                                                                                    <div><h6 class="font-weight-semibold">ครูผู้สอน : <?php echo $rowT2['teacher_name'];?>&nbsp;<?php echo $rowT2['teacher_surname'];?></h6></div>
    <?php    }else{} ?>
                                                                                    

                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <hr>

                                                                            <div class="row">
                                                                                <div class="col-<?php echo $grid;?>-12">
                                                                            
                                                                                    <table class="table table-bordered" id="">
                                                                                        <thead>
                                                                                            <tr bgcolor="#dcdcdc">
                                                                                                <th  align="center"> ลำดับ </th>
                                                                                                <th  align="center"> รหัส </th>
                                                                                                <th align="center"> รายชื่อ </th>
                                                                                                <th  align="center"> ชื่อเล่น </th>
                                                                                                <th  align="center"> จัดการ </th>
                                                                                                </th>
                                                                                            </tr>
                                                                                            <tr bgcolor="#FFFFFF">
                                                                                                <th  align="center">&nbsp;</th>
                                                                                                <th  align="center">&nbsp;</th>
                                                                                                <th align="center">&nbsp;</th>
                                                                                                <th  align="center">&nbsp;</th>
                                                                                                <th  align="center">

                                                                                                    <div>
                                                                                                        <center><label class="custom-control custom-control-success custom-checkbox mb-2">
                                                                                                            <input type="checkbox" class="custom-control-input" id="checkAll">
                                                                                                            <span class="custom-control-label"></span>
                                                                                                        </label></center>
                                                                                                    </div>


                                                                                                </th>
                                                                                            </tr>

                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <?php 		
                                                                                            
                                                                                            $sql = "SELECT * FROM tb_course_student a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.course_class_id='{$course_class_key}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.course_s_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1'  ORDER BY b.student_no ASC"; 
                                                                                            $list = result_array($sql);
                                                                                        ?>
                                                                                        <?php 
                                                                                        $no = 1;

                                                                                        foreach ($list as $key => $row) { 
                                                                                                                                                
                                                                                        ?>

                                                                                            <tr>
                                                                                                <td align="center"><?php echo $row['student_no'];?></td>
                                                                                                <td align="center"><?php echo $row['student_id'];?></td>
                                                                                                <td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?></td>
                                                                                                <td align="left"><?php echo $row['nickname'];?></td>

                                                                                            <?php													

                                                                                            $sqlCo = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '{$_rowSco_1['course_class_id']}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.student_id = '{$row['student_id']}' AND b.course_class_level_id = '{$_rowSco_1['course_class_level_id']}' AND c.subject_id = '{$_rowSco_1['subject_id']}'";

                                                                                            //echo $sqlCo;
                                                                                            $rowCo = row_array($sqlCo);												

                                                                                            if($rowCo['course_class_level_check']==0) {		
                                                                                                $checked = "";
                                                                                            } else if($rowCo['course_class_level_check'] ==1) {
                                                                                                $checked = "checked";
                                                                                            }

                                                                                            ?>
                                                                                            <td align="center">

                                                                                                    <div>
                                                                                                        </center><label class="custom-control custom-control-success custom-checkbox mb-1">
                                                                                                            <input type="checkbox" class="check custom-control-input" value="1" name="chk[<?php echo $no;?>]" id="chk<?php echo $no;?>" <?php echo $checked;?> >
                                                                                                            <input type="hidden" name="id[<?php echo $no;?>]" id="id<?php echo $no;?>" value="<?php echo $rowCo['course_s_detail_id'];?>">
                                                                                                            <span class="custom-control-label"></span>
                                                                                                        </label></center>
                                                                                                    </div>

                                                                                                </td>
                                                                                            </tr>

                                                                                            <?php 	
                                                                                            $no++;
                                                                                            }
                                                                                            ?>

                                                                                        </tbody>
                                                                                    </table>

                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
                                                                            <button type="submit" name="submit_<?php echo $count_cm;?>" class="btn btn-info">บันทึก</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <!--</div>-->
</form>


														</th>
														<?php 
                                                                $count_cm=$count_cm+1;
                                                            } ?>

                                                    </tr>

                                                </thead>
                                                <tbody>
												<?php 
													$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.course_class_id='{$course_class_key}' AND a.course_s_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' ORDER BY b.student_no ASC"; 
													$list = result_array($sql);
												?>
												<?php foreach ($list as $key => $row) { ?>
                                                    <tr>
														<td align="center"><div><?php echo $row['student_no'];?></div></td>
														<!--<td align="center"><?php echo $key+1;?></td>-->
                                                        <td align="center"><div><?php echo $row['student_id'];?></div></td>
														<td><div><?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?></div></td>
														<td align="center"><div><?php echo $row['nickname'];?></div></td>

														<?php
															$sqlSco1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$course_class_key' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

															//echo $sqlSco1;
															$rowSco1 = result_array($sqlSco1);

															foreach ($rowSco1 as $_rowSco1) { 

															$cc_id = $_rowSco1['course_class_id'];
															$cd_id = $_rowSco1['course_class_detail_id'];
															$cl_id = $_rowSco1['course_class_level_id'];
															$sj_id = $_rowSco1['subject_id'];															

															$sql_1 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id' AND a.student_id = '$row[student_id]' AND b.course_class_detail_id = '$cd_id' AND b.course_class_level_id = '$cl_id' AND c.subject_id = '$sj_id'";
															//echo $sql_1;
															$row_1 = row_array($sql_1);
															
														?>
														<td  align="center" bgcolor="#FFFFFF">

															<?php
															if($row_1['course_class_level_check']=='1') {
															?>

															<i class="icon-checkmark4"></i>

															<!--<div class="form-group">
																	<div class="">
																		<label class="mt-checkbox mt-checkbox-outline">
																			<input type="checkbox" value="1" name="chk" checked disabled/>
																			<span></span>
																		</label>
																	</div>
																</div>-->		
															
															<?php
															}

															?>													
														
														</td>
														<?php 
															} 
														?>

                                                    </tr>
													<?php } ?>

                                                </tbody>
                                            </table>                                    


                                    </div>



                                </div>
                            </div>