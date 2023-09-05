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

    //ini_set('display_errors', 1);
    //error_reporting(E_ALL ^ E_NOTICE);


    if((preg_match("/assessment_th_show.php/", $_SERVER['PHP_SELF']))){
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_aba")=='1') or (check_session("admin_status_aba") == '2') or (check_session("admin_status_aba") == '3') or (check_session("admin_status_aba") == '4') or (check_session("admin_status_aba") == '5')){ ?>

    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard" class="breadcrumb-item">
                    <i class="icon-home2 mr-2"></i> หน้าแรก</a>
                
                    <a href="#" class="breadcrumb-item">
                    <i class="icon-three-bars mr-2"></i> xxxx</a>

                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_th_show" class="breadcrumb-item">
                    <i class="icon-list-unordered mr-2"></i> xxxx</a>

                </div>
                <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard"
                    class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

    <?php
       // $a_classroom_key="";   $row['a_classroom_id'];->id
       // $term_key="";          $check_term;->check_term
      //  $grade_key="";         $check_grade;->check_grade

        if((isset($_POST["a_classroom_key"]))){
            $a_classroom_key=filter_input(INPUT_POST, 'a_classroom_key');
        }else{
            if((isset($_GET["id"]))){
                $a_classroom_key=base64_decode(filter_input(INPUT_GET, 'id'));
            }else{}
        }

        if((isset($_POST["term_key"]))){
            $term_key=filter_input(INPUT_POST, 'term_key');
        }else{
            if((isset($_GET["check_term"]))){
                $term_key=base64_decode(filter_input(INPUT_GET, 'check_term'));
            }else{}
        }

        if((isset($_POST["grade_key"]))){
            $grade_key=filter_input(INPUT_POST, 'grade_key');
        }else{
            if((isset($_GET["check_grade"]))){
                $grade_key=base64_decode(filter_input(INPUT_GET, 'check_grade'));
            }else{}
        }


            if((isset($a_classroom_key))){
                $check_id=$a_classroom_key;
                $sqlC = "SELECT * 
                         FROM `tb_assessment_classroom` 
                         WHERE `a_classroom_id` = '{$check_id}'";
                //echo $sqlC;
                $rowC = row_array($sqlC);	
            
                $cid = $rowC['a_classroom_id'];
                //$copy_cid=$rowC['a_classroom_id'];
                $class = $rowC['a_classroom_name'];
                $ctid = $rowC['classroom_t_id'];

                    if(($rowC['teacher_id1'] !="0" and $rowC['teacher_esl'] != "0")){
                        $tid1=$rowC['teacher_id1'];
                        $tid2=$rowC['teacher_esl'];
                        $stu_type = 1;
                    }elseif(($rowC['teacher_id1'] !="0" and $rowC['teacher_esl'] == "0")){
                        $tid1=$rowC['teacher_id1'];
                        $tid2=null;
                        $stu_type = 1;
                    }elseif(($rowC['teacher_id1'] =="0" and $rowC['teacher_esl'] != "0")){
                        $tid1=null;
                        $tid2=$rowC['teacher_esl'];
                        $stu_type = 2;
                    }else{}

            }else{} 

            if((isset($grade_key))){
                $check_grade=$grade_key;
                $sql = "SELECT * FROM `tb_grade` WHERE `grade_id` = '{$check_grade}'";
                $row = row_array($sql);	
                $grade="ระดับชั้น".$row['grade_name'];
            }else{
                $grade="";
            }

            if ((isset($term_key))) {
                $check_term=$term_key;
                $sql = "SELECT * FROM `tb_term` WHERE `term_id` = '{$check_term}' AND `grade_id` = '{$check_grade}' ORDER BY year DESC , term DESC";
                $row = row_array($sql);	
                $year = $row['year'];
                $term=$row["term"]."/".$year;
            }else{
                $sql = "SELECT * FROM `tb_term` WHERE `term_status` = '1' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
                $row = row_array($sql);
                $check_term=$row['term_id'];
                $year = $row['year'];
                $term=$row["term"]."/".$year;
            } 

//check Student
            if (($tid1!=null and $tid2!=null)) {
                $sqlStu = "SELECT * FROM tb_assessment_classroom a INNER JOIN tb_assessment_classroom_detail b ON a.a_classroom_id = b.a_classroom_id WHERE (a.teacher_id1 = '{$tid1}' AND a.teacher_esl = '{$tid2}') AND a.a_classroom_id = '{$check_id}' AND b.a_classroom_detail_status='1' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' AND b.a_student_type='{$stu_type}'";
            }elseif(($tid1!=null and $tid2==null)) {
                $sqlStu = "SELECT * FROM tb_assessment_classroom a INNER JOIN tb_assessment_classroom_detail b ON a.a_classroom_id = b.a_classroom_id WHERE (a.teacher_id1 = '{$tid1}') AND a.a_classroom_id = '{$check_id}' AND b.a_classroom_detail_status='1' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' AND b.a_student_type='{$stu_type}'";
            }elseif(($tid1==null and $tid2!=null)) {
                $sqlStu = "SELECT * FROM tb_assessment_classroom a INNER JOIN tb_assessment_classroom_detail b ON a.a_classroom_id = b.a_classroom_id WHERE (a.teacher_esl = '{$tid2}') AND a.a_classroom_id = '{$check_id}' AND b.a_classroom_detail_status='1' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' AND b.a_student_type='{$stu_type}'";
            }else{}

            $rowStu = result_array($sqlStu);
            foreach ($rowStu as $key => $_rowStu) {
                $stuid = $_rowStu['student_id'];
                $sqlD = "SELECT * FROM `tb_assessment_detail` WHERE `a_classroom_id` = '{$check_id}' AND `student_id` = '{$stuid}' ORDER BY `assessment_detail_id` ASC";
                //echo "$sqlD<br>";
                $resultD = row_array($sqlD);

                    if($resultD > 0){

                        $sqlDC = "SELECT * FROM `tb_assessment_detail` a INNER JOIN tb_assessment b ON a.assessment_id = b.assessment_id INNER JOIN tb_assessment_category c ON b.assessment_cat_id = c.assessment_cat_id WHERE a.a_classroom_id = '{$check_id}' AND a.student_id = '{$stuid}' AND b.assessment_cat_id = '1' ORDER BY a.assessment_detail_id ASC";
            
                        //echo "$sqlD<br>";
                        $resultDC = row_array($sqlDC); 
            
                        if($resultDC > 0){
            
                        } else {
            
                            $sql = "SELECT * FROM `tb_assessment` ORDER BY `assessment_sort` ASC";
                            $list = result_array($sql); 
            
                            foreach ($list as $key => $row) { 
            
                            $assessment_id = $row['assessment_id'];
            
                                    $data4 = array(
                                        "assessment_id" => $assessment_id ,
                                        "a_classroom_id" =>  $check_id,
                                        "student_id" =>  $stuid,				
                                        "assessment_detail_status" => 1
            
                                    );
            
                                    insert("tb_assessment_detail", $data4);
                            }
            
            
                        }
            
                    } else {
            
                        //echo "$stuid<br>";
            
                        $sql = "SELECT * FROM `tb_assessment` ORDER BY `assessment_sort` ASC";
                        $list = result_array($sql); 
            
                        foreach ($list as $key => $row) { 
            
                        $assessment_id = $row['assessment_id'];
            
                                $data3 = array(
                                    "assessment_id" => $assessment_id ,
                                    "a_classroom_id" =>  $check_id,
                                    "student_id" =>  $stuid,				
                                    "assessment_detail_status" => 1
            
                                );
            
                                insert("tb_assessment_detail", $data3);
                        }
                    }

            }
//check Student end

        $tid1=$rowC['teacher_id1'];
        $sqlT1 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid1}'";
        $rowT1= row_array($sqlT1);


    ?>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div style="font-size: 20px;">บัญชีรายชื่อนิสิต ประจำปีการศึกษา <?php echo $year;?> ภาคเรียน <?php echo $term;?></div>
                <div style="font-size: 20px;"><?php echo $grade;?> / <?php echo $class;?></div>

                
    <?php
            if(($rowC['teacher_id2']!=null and $rowC['teacher_id2']!=0)){
                $tid2=$rowC['teacher_id2'];
                $sqlT2 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid2}'";
                $rowT2= row_array($sqlT2); ?>
                <div style="font-size: 20px;">ครูประจำชั้น(Eng) : <?php echo $rowT1['teacher_name'];?>&nbsp;<?php echo $rowT1['teacher_surname'];?>&nbsp;,&nbsp;ครูประจำชั้น(Thai) : <?php echo $rowT2['teacher_name'];?>&nbsp;<?php echo $rowT2['teacher_surname'];?></div>
    <?php   }else{ ?>
                <div style="font-size: 20px;">ครูประจำชั้น(Eng) : <?php echo $rowT1['teacher_name'];?>&nbsp;<?php echo $rowT1['teacher_surname'];?></div>
    <?php   } ?>            
                
    <?php
            if(($rowC['teacher_esl']!=null and $rowC['teacher_esl']!=0)){
                $tidE=$rowC['teacher_esl'];
                $sqlTE= "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tidE}'";
                $rowTE= row_array($sqlTE); ?>
                <div style="font-size: 20px;">ESL Teacher : <?php echo $rowTE['teacher_name_eng'];?>&nbsp;<?php echo $rowTE['teacher_surname_eng'];?></div>                
    <?php   }else{} ?>

            </div>
        </div><br>

    <?php
        $sql = "SELECT * FROM `tb_term` a INNER JOIN tb_assessment_classroom b ON a.term_id = b.term_id WHERE a.term_id = '{$check_term}' AND b.a_classroom_id = '{$cid}' AND b.a_classroom_status = '1' ORDER BY b.a_classroom_name ASC";
        $row = row_array($sql);
    ?>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-info">
				    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">Student list Academic Year <?php echo $year;?> Semester <?php echo $term;?></div>
                        <div class="col-<?php echo $grid;?>-6">
                            <ul class="btn-group">
                                <ul class="nav justify-content-center">
    <?php
            if(($row['check_status']=='1')){ ?>
<form name="form_check_assessment" >
                                    <div><button type="button" class="btn btn-outline-success" title="Checked"><i class="icon-checkmark2"></i> Check</button></div>
                                    <div><span class="badge badge-success">Status : Checked</span></div>     
</form>
    <?php   }elseif(($row['check_status']=='0')){ ?>
<form name="form_check_assessment" >
<!--<a href="process/checkrate_process.php?id=<?php echo $cid;?>&grade=<?php echo $check_grade;?>&term=<?php  echo "$check_term";?>" class="btn btn-sm purple" onclick="return confirm('Confirm Verification!!')" title="Check">
<i class="fa fa-check"></i> Check</a>&nbsp;-->
                                    <div><button type="button" class="btn btn-outline-success" title="Checked"><i class="icon-checkmark2"></i> Check</button></div>
                                    <div><span class="badge badge-danger">Status : Not Checked</span></div>     
</form>
    <?php   }else{} ?>
                                </ul>
                            </ul>
                        </div>
					</div>

					<div class="card-body">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="table-responsive-<?php echo $grid;?>">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                            <table class="table table-striped table-bordered table-hover" id="">
                                                <thead>
													<tr>
                                                        <th width="30"> &nbsp; </th>
														<th width="50"> &nbsp; </th>
                                                        <th> &nbsp; </th>
														<th width="100"> &nbsp; </th>
														<?php
															$sqlSco_1 = "SELECT *,COUNT(assessment_id) AS CC1 FROM tb_assessment a INNER JOIN tb_assessment_category b ON a.assessment_cat_id=b.assessment_cat_id WHERE (a.assessment_cat_id = '1') GROUP BY a.assessment_cat_id ASC ORDER BY a.assessment_cat_id ASC, a.assessment_sort ASC ";

															//echo $sqlSco_1;
															$rowSco_1 = row_array($sqlSco_1);
														?>
														
														<th width="50" colspan="<?php echo $rowSco_1['CC1'];?>" align="center" bgcolor="#ccf4fd">
															<?php echo $rowSco_1['assessment_cat_name'];?>
														
														</th>

                                                        <th  bgcolor=""> Comment </th>
                                                    </tr>

                                                     <tr>
                                                        <th > ลำดับ </th>
														<th > รหัส </th>
                                                        <th> รายชื่อ </th>
														<th > ชื่อเล่น </th>
														<?php
															$sqlSco_1 = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_category b ON a.assessment_cat_id=b.assessment_cat_id WHERE (a.assessment_cat_id = '1')  ORDER BY a.assessment_cat_id ASC, a.assessment_sort ASC";

															//echo $sqlSco_1;
															$rowSco_1 = result_array($sqlSco_1);

															foreach ($rowSco_1 as $_rowSco_1) { 
														?>
														<th width="50" align="center" bgcolor="#ccf4fd">

															<!--<a href="ajax/get_addrate_th.php?id=<?php echo $_rowSco_1['assessment_id'];?>&clid=<?php echo $cid;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>&type=1&ctid=<?php echo $ctid;?>" data-toggle="modal" data-id="<?php echo $_rowSco_1['assessment_id'];?>" data-target="#AddRate" class="btn btn-sm blue" title="<?php echo $_rowSco_1['assessment_sort'];?>.&nbsp;<?php echo $_rowSco_1['assessment_name'];?>">
																<i class="fa fa-file-text-o"></i> </a>-->
                                                                <div><a  title="<?php echo $_rowSco_1['assessment_sort'];?>.&nbsp;<?php echo $_rowSco_1['assessment_name'];?>" class="badge badge-primary p-1" data-toggle="modal" data-target="#AddRate<?php echo $_rowSco_1['assessment_id'];?>" ><i class="icon-file-text3"></i></a></div>


														
														</th>
														<?php } ?>

                                                        <th width="100" bgcolor=""> &nbsp; </th>
                                                    </tr>

													<tr>
                                                        <th width="30"> &nbsp; </th>
														<th width="50"> &nbsp; </th>
                                                        <th> &nbsp; </th>
														<th width="100"> &nbsp; </th>
														<?php
															foreach ($rowSco_1 as $_rowSco_1) {  
														?>
														<th width="50" align="center" bgcolor="#ccf4fd">
															<?php echo $_rowSco_1['score_max'];?>
														
														</th>
														<?php } ?>

                                                        <th width="100">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php 
													$sql = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$cid}' AND a.a_classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' ORDER BY b.student_no ASC"; 
													$list = result_array($sql);
												?>
												<?php 
												
												foreach ($list as $key => $row) { 

													$stuid = $row['student_id'];

													$sqlCouC = "SELECT * , COUNT(c.course_s_detail_id) AS NUM FROM tb_course_class a INNER JOIN tb_course_student b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_student_detail c ON b.course_s_id = c.course_s_id INNER JOIN tb_course_class_level d ON c.course_class_level_id = d.course_class_level_id WHERE a.classroom_t_id='{$ctid}' AND b.student_id='{$stuid}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND (d.course_class_level_name = 'ESL-B' OR d.course_class_level_name = 'ESL-I' OR d.course_class_level_name = 'ESL-A') AND c.course_class_level_check='1' AND a.course_class_status='1'"; 

													//echo "<br>$sqlCouC<br>";
													$rowCouC = row_array($sqlCouC);

													$num_csd = $rowCouC['NUM'];									
												
												?>
                                                    <tr>
                                                        <td align="center"><?php echo $key+1;?></td>
                                                        <td align="center"> <?php echo $row['student_id'];?></td>
														<td><?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?>&nbsp;
														<?php		

														if ($num_csd  > 0) {
														//} else if ($course_cln == "ESL-B" || $course_cln == "ESL-I" || $course_cln == "ESL-A") {
															$course_cln_show = "(ESL)";

														} else {
															$course_cln_show = "";
														}
															
														
														echo "<font color=red>$course_cln_show</font>";
														?>
														</td>
														<td><?php echo $row['nickname'];?></td>

														<?php
															$sqlSco1 = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id WHERE (a.assessment_cat_id ='1') AND b.a_classroom_id = '{$cid}' AND b.student_id='$row[student_id]' ORDER BY a.assessment_cat_id ASC, a.assessment_sort ASC";

															//echo $sqlSco1;
															$rowSco1 = result_array($sqlSco1);

															foreach ($rowSco1 as $_rowSco1) { 
														?>
														<td width="50" align="center" bgcolor="#ccf4fd">
															<?php echo $_rowSco1['score'];?>														
														
														</td>
														<?php 
															} 
															$sqlScoC = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id WHERE (a.assessment_cat_id ='4') AND b.a_classroom_id = '{$cid}' AND b.student_id='$row[student_id]'";

															//echo $sqlScoC;
															$_rowScoC = row_array($sqlScoC);
														?>

														<td width="100">

														<!--<a href="ajax/get_addcomment_th.php?id=<?php echo $_rowScoC['assessment_detail_id'];?>&sid=<?php echo $_rowScoC['student_id'];?>&clid=<?php echo $_rowScoC['a_classroom_id'];?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $_rowScoC['assessment_detail_id'];?>" data-target="#AddComment" class="btn btn-sm blue" title="<?php echo $_rowScoC['assessment_name'];?>">
																<i class="fa fa-file-text-o"></i> Comment</a>-->
                                                                
                                                            <div><a  title="<?php echo $_rowScoC['assessment_name'];?>" class="badge badge-purple p-1" data-toggle="modal" data-target="#AddComment<?php echo $_rowScoC['assessment_detail_id'];?>" ><i class="icon-pencil"></i></a></div>

														</td>

                                                    </tr>
													<?php } ?>

                                                </tbody>
                                            </table>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>
        </div>






<!--Modal Plugin-->
<!--create_AddRate-->
    <?php
            $sqlSco_1 = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_category b ON a.assessment_cat_id=b.assessment_cat_id WHERE (a.assessment_cat_id = '1')  ORDER BY a.assessment_cat_id ASC, a.assessment_sort ASC";
            //echo $sqlSco_1;
            $rowSco_1 = result_array($sqlSco_1);        
            foreach ($rowSco_1 as $_rowSco_1){
                
                $clid=$cid;
                //$ctid;
                $id=$_rowSco_1['assessment_id'];

                $assessment_sql = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id INNER JOIN tb_assessment_classroom c ON b.a_classroom_id=c.a_classroom_id WHERE a.assessment_id = '{$id}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.a_classroom_id = '{$clid}'";
                //$sql = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id INNER JOIN tb_assessment_classroom c ON b.a_classroom_id=c.a_classroom_id WHERE a.assessment_id = '{$id}' AND c.teacher_id1 = '{$tid}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.a_classroom_id = '{$clid}'";

                //echo $sql;
                $assessment_row = row_array($assessment_sql);

                $tid1=$assessment_row['teacher_id1'];
                $tidE=$assessment_row['teacher_esl'];
                
                ?>

                    <div id="AddRate<?php echo $_rowSco_1['assessment_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ระดับคะแนน ห้องเรียน <?php echo $assessment_row['a_classroom_name']; ?> (<?php echo $_rowSco_1['assessment_sort'];?>.&nbsp;<?php echo $_rowSco_1['assessment_name'];?>)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
<form name="form_AddRate<?php echo $_rowSco_1['assessment_id'];?>" method="post" action="<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_th_show/assessment_th_show_process.php">
								<div class="modal-body">
									<h6 class="font-weight-semibold">ระดับชั้น <?php echo $check_grade;?> ห้องเรียน <?php echo $assessment_row['a_classroom_name']; ?></h6>

									<hr>

                                    <div class="row">
                                        <div class="col-<?php echo $grid;?>-12">
                                    
                                                    <table class="table table-striped table-hover">
														<thead>
															 <tr bgcolor="#dcdcdc">
																<th  align="center"> ลำดับ </th>
																<th align="center"> รหัส </th>
																<th align="center"> รายชื่อ </th>
																<th  align="center"> ชื่อเล่น </th>
																<th  align="center">
																<?php echo $assessment_row['assessment_name'];?>
																</th>
																</th>
															</tr>
														<tr>
															<th colspan="4">&nbsp;</th>
															<th align="center">
															<?php 
															echo $assessment_row['score_max'];
															$max = $assessment_row['score_max'];
															?>
															</th>
														</tr>
                                                </thead>
														<tbody>
														<?php 
															$sum_s = 0;					
															
															$sql = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$clid}' AND a.a_classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status = '1' ORDER BY b.student_no ASC"; 
															$list = result_array($sql);
														?>
														<?php foreach ($list as $key => $row) { 	
														
															$stuid = $row['student_id'];
														
															$sqlCouC = "SELECT * , COUNT(c.course_s_detail_id) AS NUM FROM tb_course_class a INNER JOIN tb_course_student b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_student_detail c ON b.course_s_id = c.course_s_id INNER JOIN tb_course_class_level d ON c.course_class_level_id = d.course_class_level_id WHERE a.classroom_t_id='{$ctid}' AND b.student_id='{$stuid}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND (d.course_class_level_name = 'ESL-B' OR d.course_class_level_name = 'ESL-I' OR d.course_class_level_name = 'ESL-A') AND c.course_class_level_check='1' AND a.course_class_status='1'"; 

																//echo "<br>$sqlCouC<br>";
																$rowCouC = row_array($sqlCouC);

																$num_csd = $rowCouC['NUM'];
															
														?>
															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?>&nbsp;
																<?php		

																if ($num_csd  > 0) {
																//} else if ($course_cln == "ESL") {
																	$course_cln_show = "(ESL)";

																} else {
																	$course_cln_show = "";
																}									
																echo "<font color=red>$course_cln_show</font>";
																?>
																</td>
																<td align="left"><?php echo $row['nickname'];?></td>

															<?php													

															$sqlSco = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id WHERE a.assessment_id= '$id' AND (a.assessment_cat_id !='4' OR a.assessment_cat_id !='6') AND b.a_classroom_id = '{$clid}' AND b.student_id='$stuid' ORDER BY a.assessment_sort ASC";

															//echo $sqlSco;
															$listSco = result_array($sqlSco);

															foreach ($listSco as $_sqlSco) { 
															}
															?>
																<td>
																<input id="<?php echo $_sqlSco['assessment_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $_sqlSco['score']; ?>" min="0" max="<?php echo $max;?>">
																<input type="hidden" name="id[]" id="id" value="<?php echo $_sqlSco['assessment_detail_id']; ?>">
																</td>
															</tr>

															<?php 							
															} 
															?>

														</tbody>
													</table>

                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
									<button type="submit" name="but_AddRate<?php echo $_rowSco_1['assessment_id'];?>" class="btn btn-info">บันทึก</button>
								</div>

                                    <input type="hidden" name="asid" id="asid" value="<?php echo $id; ?>">
                                    <input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
                                    <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                    <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">									
				                    <input type="hidden" name="ctid" id="ctid" value="<?php echo $ctid; ?>">
                                    <input type="hidden" name="action" id="action" value="create_AddRate">

</form>
							</div>
						</div>
					</div>


    <?php    }   ?>


<!--create_AddRate End-->


    <?php
            //$cid=$copy_cid;
            $sql = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$cid}' AND a.a_classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' ORDER BY b.student_no ASC"; 
            $list = result_array($sql);
            foreach ($list as $key => $row){ 
                
                $sqlScoC = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id WHERE (a.assessment_cat_id ='4') AND b.a_classroom_id = '{$cid}' AND b.student_id='{$row['student_id']}'";

                $_rowScoC = row_array($sqlScoC);

                $memo = $_rowScoC ['memo'];
                $assessment_name = $_rowScoC ['assessment_name'];

                $id=$_rowScoC['assessment_detail_id'];
                $sid=$_rowScoC['student_id'];
                $clid=$_rowScoC['a_classroom_id'];

                $assessment_sql = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id INNER JOIN tb_assessment_classroom c ON b.a_classroom_id=c.a_classroom_id WHERE b.assessment_detail_id = '{$id}' AND b.student_id='{$sid}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.a_classroom_id = '{$clid}'";
                //echo $sql;
                $assessment_row = row_array($assessment_sql);
                
                $memo = $assessment_row['memo'];
                $assessment_name = $assessment_row['assessment_name'];
                
                ?>

                    <div id="AddComment<?php echo $_rowScoC['assessment_detail_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-purple text-white">
									<h6 class="modal-title">Comment Classroom <?php echo $assessment_row['a_classroom_name']; ?> </h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
<form>
								<div class="modal-body">
									<h6 class="font-weight-semibold">ระดับชั้น <?php echo $check_grade;?> ห้องเรียน <?php echo $row['a_classroom_name']; ?></h6>

									<hr>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">

                                                    <table class="table table-striped table-hover">
														<thead>
															 <tr bgcolor="#dcdcdc">
																<th align="center"> ลำดับ </th>
																<th align="center"> รหัส </th>
																<th align="center"> รายชื่อ </th>
																<th align="center"> ชื่อเล่น </th>
															</tr>

                                                        </thead>
														<tbody>
														<?php 
															$sum_s = 0;					
															
															$sql = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$clid}' AND a.a_classroom_detail_status='1' AND b.student_id='{$sid}' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC"; 
															$row = row_array($sql);
														?>
															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?>&nbsp;
																<?php
																if(($row['a_student_type']==2)) {
																?>
																	<font color='red'>(ESL)</font>

																<?php
																}														
																?>
																</td>
																<td align="left"><?php echo $row['nickname'];?></td>

															</tr>

															<tr>
																<td align="center" colspan="4">
																<div class="form-group">
																	<label class="col-<?php echo $grid?>-12 control-label"><strong><?php echo $assessment_name;?></strong></label>	
																</div>	
																<div>&nbsp;</div>
															</td>
															</tr>

															<tr>
																<td align="center" colspan="4">
																<div class="form-group">													
																	<div class="col-<?php echo $grid?>-12">
																		
                                                                        <textarea class="form-control" rows="7" name="txtdetail" id="txtdetail<?php echo $_rowScoC['assessment_detail_id'];?>"><?php echo $memo;?></textarea>
																			<!--<textarea class="form-control" rows="5" name="txtdetail" maxlength="500"><?php echo $memo;?></textarea>-->
																			<!--<textarea class="wysihtml5 form-control" rows="3" name="txtdetail" maxlength="500"><?php echo $memo;?></textarea>-->
                                                                        <div><font color='red'>Comments do not exceed <span class="badge badge-warning badge-pill"><font id="print_length_txtdetail<?php echo $_rowScoC['assessment_detail_id'];?>">350</font></span> characters.</font> <font id="txtdetail<?php echo $_rowScoC['assessment_detail_id'];?>-null"></font></div>
                                                                        
																	</div>
																</div>	
																<div>&nbsp;</div>
															</td>
															</tr>															

														</tbody>
													</table>

                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
									<button type="button" name="but_comment_<?php echo $_rowScoC['assessment_detail_id'];?>" id="but_comment_<?php echo $_rowScoC['assessment_detail_id'];?>" class="btn btn-info">บันทึก</button>
								</div>
                                
    <input type="hidden" name="assid" id="assid_<?php echo $_rowScoC['assessment_detail_id'];?>" value="<?php echo $id; ?>">
	<input type="hidden" name="sid" id="sid_<?php echo $_rowScoC['assessment_detail_id'];?>" value="<?php echo $sid; ?>">
	<input type="hidden" name="clid" id="clid_<?php echo $_rowScoC['assessment_detail_id'];?>" value="<?php echo $clid; ?>">
	<input type="hidden" name="check_grade" id="check_grade_<?php echo $_rowScoC['assessment_detail_id'];?>" value="<?php echo $check_grade; ?>">
	<input type="hidden" name="check_term" id="check_term_<?php echo $_rowScoC['assessment_detail_id'];?>" value="<?php echo $check_term; ?>">

</form>
							</div>
						</div>
					</div>




<!--run txt-->
    <script>
        $(document).ready(function() {
            var max_txtdetail=350;
            $("#txtdetail<?php echo $_rowScoC['assessment_detail_id'];?>").keyup(function(){
                var this_txtdetail=max_txtdetail-$(this).val().length;
                if(this_txtdetail<0){
                    $(this).val($(this).val().substr(0,350));
                }else{
                    $("#print_length_txtdetail<?php echo $_rowScoC['assessment_detail_id'];?>").html(this_txtdetail);                
                }
            })
        })
    </script>                                                                    
<!--run txt end -->

    <script>
         $(document).ready(function() {

// Defaults
            var swalInitAddCommentData = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
// Defaults End

            $('#but_comment_<?php echo $_rowScoC['assessment_detail_id'];?>').on('click', function() {

                swalInitAddCommentData.fire({
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
                }).then(function(result){
                    if(result.value){
                        var action = "create_Comment";
                            if(action=="create_Comment"){

                                var assid=$("#assid_<?php echo $_rowScoC['assessment_detail_id'];?>").val();
                                var sid=$("#sid_<?php echo $_rowScoC['assessment_detail_id'];?>").val();
                                var clid=$("#clid_<?php echo $_rowScoC['assessment_detail_id'];?>").val();
                                var check_grade=$("#check_grade_<?php echo $_rowScoC['assessment_detail_id'];?>").val();
                                var check_term=$("#check_term_<?php echo $_rowScoC['assessment_detail_id'];?>").val();

                                var txtdetail=$("#txtdetail<?php echo $_rowScoC['assessment_detail_id'];?>").val();

                                if(txtdetail==""){
                                    document.getElementById("txtdetail<?php echo $_rowScoC['assessment_detail_id'];?>-null").innerHTML =
                                    '<span class="badge badge-danger">Comments Please</span>';

                                }else{
                                    document.getElementById("txtdetail<?php echo $_rowScoC['assessment_detail_id'];?>-null").innerHTML =
                                    '<span class="badge badge-success">Comments</span>';
                                    
                                }

                                if(txtdetail!=""){
                                
                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/assessment_th_show/assessment_th_show_process.php",{
                                        action:action,
                                        assid:assid,
                                        sid:sid,
                                        clid:clid,
                                        check_grade:check_grade,
                                        check_term:check_term,
                                        txtdetail:txtdetail
                                    }, function(process_add){
                                        var test_process=process_add.trim();
                                           if(test_process==="no_error"){

                                                let timerInterval;
                                                swalInitAddCommentData.fire({
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
                                                                const b_comment_data = content.querySelector('b_comment_data')
                                                                if (b_comment_data) {
                                                                    b_comment_data.textContent = Swal.getTimerLeft();
                                                                } else {}
                                                            } else {}
                                                        }, 100);
                                                    },
                                                    willClose: function() {
                                                        clearInterval(timerInterval)
                                                    }
                                                }).then(function(result) {
                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                        document.location = '<?php echo $RunLink->Call_Link_System(); ?>/?modules=assessment_th_show&id='+btoa(clid)+'&check_grade='+btoa(check_grade)+'&check_term='+btoa(check_term);
                                                    } else {}
                                                });

                                           }else if(test_process==="it_error"){
                                                swalInitAddCommentData.fire({
                                                    title: 'ข้อมูลซ้ำ',
                                                    icon: 'error'
                                                });
                                           }else{
                                                swalInitAddCommentData.fire({
                                                    //title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process,
                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process,
                                                    icon: 'error'
                                                });
                                           }
                                    })
                                }else{}

                            }else{
                                swalInitAddCommentData.fire({
                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                    icon: 'error'
                                });
                            }
                    }else{} 
                })

            })

         })
    </script>


                    

    <?php   } ?>




<!--Modal Plugin-->



    </div>

<?php   }else{}
    }
?>

