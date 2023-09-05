<?php
error_reporting (E_ALL ^ E_NOTICE);
include '../config/connect.ini.php';
include '../config/fnc.php';

check_login('admin_username_aba','login.php');

	$tid =isset($_POST['tid']) ? $_POST['tid'] : '';

	$id = isset($_POST['id']) ? $_POST['id'] : '';

	//$cid=isset($_POST['cid']) ? $_POST['cid'] : '';

	$clid=isset($_POST['clid']) ? $_POST['clid'] : '';

	$exam_no=isset($_POST['exam_no']) ? $_POST['exam_no'] : '';

	$subject_id=isset($_POST['id']) ? $_POST['id'] : '';

	$typec=isset($_POST['typec']) ? $_POST['typec'] : '';


if (isset($_REQUEST['check_grade'])) {
	$check_grade=$_REQUEST['check_grade'];
	$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
	$row = row_array($sql);	
	$grade="ระดับชั้น$row[grade_name]";
} else if (!isset($_REQUEST['check_grad'])) {
	$grade="";
} 

if (isset($_REQUEST['check_term'])) {
	$check_term=$_REQUEST['check_term'];
	$sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_id = '{$check_term}' ORDER BY a.year DESC , a.term DESC";
	$row = row_array($sql);	
	$term1="$row[term]";
	$year1="$row[year]";
	$year2=$year1-543;
	$term="$row[term]/$row[year]";
} else if (!isset($_REQUEST['check_term'])) {
	$sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_status = '1' ORDER BY a.year DESC , a.term DESC";
	$row = row_array($sql);
	$check_term=$row['term_id'];
	$term1="$row[term]";
	$year1="$row[year]";
	$year2=$year1-543;
	$term="$row[term]/$row[year]";
} 

$sqlS = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subject_id = '$subject_id'";
$rowS = row_array($sqlS);

$sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}'";
$row = row_array($sql);

$term1 = $row['term'];
$year1 = $row['year'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title></title> 
<!--<title>:: แบบรายงานผลพัฒนาคุณภาพผู้เรียนรายบุคคล ::</title> -->
<link rel="stylesheet" type="text/css" href="css/aba_a4.css" />
<link rel="stylesheet" type="text/css" href="css/style_detail_a4.css" />
<link rel="stylesheet" href="css/fonts/th_niramit_as.css" />

</head>

<!--<body>-->
<body onLoad="window.print()">

<div style='margin:0px 0px 0px 15px;'>
<div class='th_niramit_as'>
<div id='nwForm'>
	<table  cellSpacing='0' cellPadding='0' border='0' width='780' bgcolor='#FFFFFF' class='th_niramit_as'>
	<!--<table  cellSpacing='0' cellPadding='0' border='0' width='780' bgcolor='#FFFFFF' class='th_niramit_as'>-->
				<tr>
				<td width='780' colspan='2' align="center">
					<table  cellSpacing='0' cellPadding='0' border='0' width='780' bgcolor='#FFFFFF' class='th_niramit_as'>
						<tr> 
							<td width='780' align="center" valign="top">
							<?php 

								$sqlT = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid}'";
								//echo $sqlT;
								$rowT = row_array($sqlT);
		
								$sqlS = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subject_id='{$id}' AND a.grade_id = '$check_grade' ORDER BY a.subt_id ASC , a.subject_name ASC";
								//echo $sqlS;
								$rowS = row_array($sqlS);

								$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id  INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  b.subject_id='{$subject_id}' AND b.course_class_detail_status='1' AND a.course_class_type='$typec' AND (d.teacher_id1 = '$tid' OR d.teacher_id2 = '$tid') GROUP BY b.subject_id";

								//echo $sql;
								$row =row_array($sql);

								//echo $row['course_class_id'];

								if($row['teacher_id1'] == $tid && $row['teacher_id2'] != $tid) {

									//echo "T1";
									$sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$row['teacher_id1']}'";
									$rowT1 = row_array($sqlT1);

									$rate_name1 = $row['rate1'];	

									$teacher1 = "ชื่อครูผู้สอน/Teacher $rowT1[teacher_name]&nbsp;$rowT1[teacher_surname]&nbsp;(สัดส่วนคะแนน Ratio&nbsp;$rate_name1%)<br>";

									$teacherid1 = $rowT1['teacher_id'];

									$teacher_name1 = "$rowT1[teacher_name]&nbsp;$rowT1[teacher_surname]";

								if($row['teacher_id2'] == "" || $row['teacher_id2'] == 0) {
									$teacher2 = "";								

								} else if($row['teacher_id2'] != "") {

									$sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$row['teacher_id2']}'";
									$rowT2 = row_array($sqlT2);

									$rate_name2 = $row['rate2'];			

									$teacher2 = "ชื่อครูผู้สอน/Teacher $rowT2[teacher_name]&nbsp;$rowT2[teacher_surname]&nbsp;(สัดส่วนคะแนน Ratio&nbsp;$rate_name2%)<br>";

									$teacherid2 = $rowT2['teacher_id'];

									$teacher_name2 = "$rowT2[teacher_name]&nbsp;$rowT2[teacher_surname]";

								}
		
								?>

								รายงานผลการเรียน (GRADE REPORT)&nbsp;
								ภาคเรียนที่/Semester <?php echo $term1;?> ปีการศึกษา/Academic Year <?php echo $year1;?><br>
								รหัสวิชา/Subject Code <?php echo $rowS['subject_code'];?> ชื่อวิชา/Subject <?php echo $rowS['subject_name'];?> (<?php  echo $rowS['subject_name_eng'];?>) จำนวนหน่วยกิต/Subject Credits <?php echo $rowS['weight'];?> <br>
								<?php echo $teacher1;?>
								<!--<?php echo $teacher2;?>-->
									

								<?php

								} if($row['teacher_id1'] != $tid && $row['teacher_id2'] == $tid) {

									//echo "T2";

								if($row['teacher_id1'] == "" || $row['teacher_id1'] == 0) {
									$teacher1 = "";								

								} else if($row['teacher_id1'] != "") {

									$sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$row['teacher_id1']}'";
									$rowT1 = row_array($sqlT1);

									$rate_name1 = $row['rate1'];			

									$teacher1 = "ชื่อครูผู้สอน/Teacher $rowT1[teacher_name]&nbsp;$rowT1[teacher_surname]&nbsp;(สัดส่วนคะแนนRatio&nbsp;$rate_name1%)<br>";

									$teacherid1 = $rowT1['teacher_id'];

									$teacher_name1 = "$rowT1[teacher_name]&nbsp;$rowT1[teacher_surname]";

								}

									$sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$row['teacher_id2']}'";
									$rowT2 = row_array($sqlT2);

									$rate_name2 = $row['rate2'];			

									$teacher2 = "ชื่อครูผู้สอน/Teacher $rowT2[teacher_name]&nbsp;$rowT2[teacher_surname]&nbsp;(สัดส่วนคะแนน Ratio&nbsp;$rate_name2%)<br>";

									$teacherid2 = $rowT2['teacher_id'];

									$teacher_name2 = "$rowT2[teacher_name]&nbsp;$rowT2[teacher_surname]";
								?>
							
								รายงานผลการเรียน (GRADE REPORT)&nbsp;
								ภาคเรียนที่/Semester <?php echo $term1;?> ปีการศึกษา/Academic Year <?php echo $year1;?><br>
								รหัสวิชา/Subject Code <?php echo $rowS['subject_code'];?> ชื่อวิชา/Subject <?php echo $rowS['subject_name'];?> (<?php  echo $rowS['subject_name_eng'];?>) จำนวนหน่วยกิต/Subject Credits <?php echo $rowS['weight'];?> <br>
								<!--<?php echo $teacher1;?>-->
								<?php echo $teacher2;?>
								

							<?php
								}
														
							?>

					</tr> 
					</table>					
				</td>
		</tr> 

		<tr>
				<td width='780' colspan='2'>

				<!-- BEGIN SAMPLE TABLE PORTLET-->

				<center>
				<table  cellSpacing='0' cellPadding='0' border='0' width='780' bgcolor='#FFFFFF' class='th_niramit_as'>
             <tr>
			 <td>

	<?php 

										if($row['teacher_id1'] == $tid && $row['teacher_id2'] != $tid) {		
											
											$check_teacher=1;										

										?>

										<table class="table table-striped table-bordered" id="">
                                                <thead>
                                                    <tr>
														<th colspan="3">&nbsp;
														
														</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<tr>
													<td colspan="3">

												<?php

												$sqlC1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE c.teacher_id1 = '{$tid}' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND a.classroom_t_id='$clid'";

												//echo $sqlC1;
												$listC1 = result_array($sqlC1);
												foreach ($listC1 as $key => $rowC1) {

												$course_cid = $rowC1['course_class_id'];
												
												$clid = $rowC1['classroom_t_id'];

												$course_class_lid = $rowC1['course_class_level_id'];

												//echo "$clid - $course_class_lid";

												if ($exam_no == 1){

												$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";

												} else if ($exam_no == 2){

												$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";

												}

												//echo $sqlSco;
												$rowSco = result_array($sqlSco);
												?>

												<table width="780" border="1" cellpadding="0" cellspacing="0" bordercolor="#333333">
												<!--<table class="table table-striped table-bordered table-hover" id="">-->
                                                <thead>
                                                     <tr bgcolor="#dcdcdc">
                                                        <th width="50" align="center"> เลขที่ </th>
														<th width="40" align="center"> รหัส </th>
                                                        <th width="170" align="center"> รายชื่อ </th>
														<th align="center"> ชื่อเล่น </th>
														<th width="80" align="center"> ห้องเรียน </th>
														<?php foreach ($rowSco as $_rowSco) { ?>
														<th width="50" align="center">
														<?php echo $_rowSco['score_name'];?>
														
														</th>
												<?php } ?>
														<th width="50" align="center"> รวม </th>
														<th width="50" align="center"> คะแนนเก็บ </th>
														<th width="50" align="center"> คะแนนสอบ 
														<br>
												<?php												
												if ($exam_no == 1){

												$sqlSco3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid'";

												} else if ($exam_no == 2){

												$sqlSco3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid'";

												}

												//echo $sqlSco3;
												$_rowSco3 = row_array($sqlSco3);
												?>

	
														</th>
														<th width="50" align="center"> รวม </th>
														<th width="50" align="center"> เกรด </th>
                                                    </tr>
													<tr>
                                                        <th colspan="5">&nbsp;</th>
												<?php 
												$max = 0;
												foreach ($rowSco as $_rowSco) { 
												?>
														<th align="center" width="50" bgcolor="#e2e2e2">
														<?php echo $_rowSco['score_max'];?>
														</th>
														
												<?php 

														$max = $max + $_rowSco['score_max'];
												
													} 

													$score1_1 = $rowC1['score1_1'];
													$score1_2 = $rowC1['score1_2'];

													$max_s = $max;
												
												?>
														
														<th width="50" align="center" bgcolor="#b5bffd"><?php echo $max_s;?></a></th>
														<th width="50" align="center" bgcolor="#dab0fb"><?php echo $score1_1;?></a></th>
														<th width="50" align="center" bgcolor="#fcbbfb"><?php echo $score1_2;?></a></th>
												<?php 

														$sum_score = $score1_1 + $score1_2;		
														
														$scoreid = $rowSco1['score_id'];

												?>

														<th width="50" align="center" bgcolor="#fae59e"><?php echo $sum_score;?></a></th>
														<th width="50">&nbsp;</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php 
													$sum_s = 0;				

													$sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND c.teacher_id1 = '{$tid}' AND a.classroom_t_id='$clid' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND c.course_class_level_id = '$course_class_lid'";

													//echo $sql1;
													$list1 = result_array($sql1);
													foreach ($list1 as $key => $row1) {

													$cc_id = $row1['course_class_id'];
													$cd_id = $row1['course_class_detail_id'];
													$cl_id = $row1['course_class_level_id'];

													$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id = '{$cc_id}' AND b.course_class_detail_id = '{$cd_id}' AND b.course_class_level_id = '{$cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') ORDER BY c.student_class ASC , c.student_no ASC";

													//echo $sql;
													$list = result_array($sql);
												?>
												<?php foreach ($list as $key => $row) { ?>
												<?php
													if ($row['gender'] == 1) {
														$gender = "ชาย";

													} else if ($row['gender'] == 2) {
														$gender = "หญิง";

													}

													$stuid = $row['student_id'];

													$sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$row[student_class]'";
													$rowC = row_array($sqlC);
												?>

                                                    <tr>
                                                        <td align="center"><?php echo $row['student_no'];?></td>
                                                        <td align="center"><?php echo $row['student_id'];?></td>
														<td align="left"><?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?></td>
														<td align="left"><?php echo $row['nickname'];?></td>
														<td align="center"><?php echo $rowC['classroom_name'];?></td>

													<?php															
													
													if ($exam_no == 1){

													$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id = '{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='1' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

													} else if ($exam_no == 2){

													$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id = '{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='1' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

													}											

													//echo $sqlSco;
													$sqlSco = result_array($sqlSco);

													foreach ($sqlSco as $_sqlSco) { 

														$scoreid =  $_sqlSco['score_id'];

														$sqlScor = "SELECT * FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='1' AND a.score_detail_status='1'";

														//echo $sqlScor;
														$_rowScor = row_array($sqlScor);														
													
													?>
														<td align="center">
														<?php echo $_rowScor['score'];?>
														<!--<input id="<?php echo $_rowScor['score_detail_id'];?>" name="qty" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor['score'];?>" min="0" max="<?php echo $max;?>">-->
														</td>
													<?php 

														$sum_s = $sum_s + $_rowScor['score'];
														} 
													?>
														<td align="center" bgcolor="#b5bffd"><?php echo $sum_s;?></td>
														<?php 

														if($max_s == "") { 
															$summary_s = 0;

														} else if($max_s != "" ) { 
														
															$summary_s = ($score1_1*$sum_s)/$max_s;

															//echo "$summary_s = ($score1_1*$sum_s)/$max_s";
														}

														?>

														<td align="center" bgcolor="#dab0fb"><?php echo number_format($summary_s,0);?></td>
														<td align="center" bgcolor="#fcbbfb">
														<?php
														$max2 = $score1_2;

														if ($exam_no == 1){

															$_sqlScor3 =  "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id = '{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='2' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

															$_rowScor3 = row_array($_sqlScor3);

															$scoreid31 = $_rowScor3['score_id'];

															$sqlScor3 = "SELECT * FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid31}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='2' AND a.score_detail_status='1'";


														} else if ($exam_no == 2){

															$_sqlScor3 =  "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id = '{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='2' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

															$_rowScor3 = row_array($_sqlScor3);

															$scoreid31 = $_rowScor3['score_id'];															

															$sqlScor3 = "SELECT * FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid31}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='2' AND a.score_detail_status='1'";

														}

														//echo $sqlScor3;

														$_rowScor3 = row_array($sqlScor3);
														?>

														<?php echo $_rowScor3['score'];?>
														<!--<input id="<?php echo $_rowScor3['score_detail_id'];?>" name="qty2" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor3['score'];?>" min="0" max="<?php echo $max2;?>">-->
														</td>

														<?php 

															$sum_s1 = $_rowScor2['score'];
															$sum_s2 = $_rowScor3['score'];
															$summary_g = $summary_s + $sum_s1 + $sum_s2;
															$summary_grade = number_format($summary_g,0);
														?>
														<td align="center" bgcolor="#fae59e"><?php echo number_format($summary_grade,0);?></td>
														<td align="center">
														<?php

															if(($summary_grade >= 80) && ($summary_grade <= 100)){
																echo "4.0";

															} else if(($summary_grade >= 75) && ($summary_grade < 80)){
																echo "3.5";

															} else if(($summary_grade >= 70) && ($summary_grade < 75)){
																echo "3.0";

															} else if(($summary_grade >= 65) && ($summary_grade < 70)){
																echo "2.5";

															} else if(($summary_grade >= 60) && ($summary_grade < 65)){
																echo "2.0";

															} else if(($summary_grade >= 55) && ($summary_grade < 60)){
																echo "1.5";

															} else if(($summary_grade >= 50) && ($summary_grade < 55)){
																echo "1.0";

															} else if(($summary_grade >= 0) && ($summary_grade < 50)){
																echo "0.0";

															}

														?>
														</td>
                                                    </tr>

													<?php 											

														$sum_s = 0;
														$summary_s = 0;
														$summary_grade = 0;
														} 										
													} 
													?>

	                                          </tbody>
                                            </table>

											<?php
												}

											} else if($row['teacher_id1'] != $tid && $row['teacher_id2'] == $tid) {

											$check_teacher=2;
											
											?>

										<table class="table table-striped table-bordered" id="">
                                                <thead>
                                                    <tr>
														<th colspan="3">&nbsp;
														
														</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<tr>
													<td colspan="3">

												<?php

												$sqlC1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE c.teacher_id2 = '{$tid}' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec'";

												//echo $sqlC1;
												$listC1 = result_array($sqlC1);
												foreach ($listC1 as $key => $rowC1) {											

												$course_cid = $rowC1['course_class_id'];
												$clid = $rowC1['classroom_t_id'];

												$course_class_lid = $rowC1['course_class_level_id'];

												//echo "$clid - $course_class_lid";

												if ($exam_no == 1){

												$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";

												} else if ($exam_no == 2){

												$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";

												}

												//echo $sqlSco;
												$rowSco = result_array($sqlSco);
												?>

												<table width="780" border="1" cellpadding="0" cellspacing="0" bordercolor="#333333">
												<!--<table class="table table-striped table-bordered table-hover" id="">-->
                                                <thead>
                                                     <tr bgcolor="#dcdcdc">
                                                        <th width="50" align="center"> เลขที่ </th>
														<th width="40" align="center"> รหัส </th>
                                                        <th width="170" align="center"> รายชื่อ </th>
														<th align="center"> ชื่อเล่น </th>
														<th width="80" align="center"> ห้องเรียน </th>
														<?php foreach ($rowSco as $_rowSco) { ?>
														<th width="50" align="center">
														<?php echo $_rowSco['score_name'];?>														
																												
														</th>
												<?php } ?>
														<th width="50" align="center"> รวม </th>
														<th width="50" align="center"> คะแนนเก็บ </th>
														<th width="50" align="center"> คะแนนสอบ 
														<br>
												<?php
												if ($exam_no == 1){

												$sqlSco3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid'";

												} else if ($exam_no == 2){

												$sqlSco3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid'";

												}

												//echo $sqlSco3;
												$_rowSco3 = row_array($sqlSco3);
												?>

														</th>
														<th width="50" align="center"> รวม </th>
														<th width="50" align="center"> เกรด </th>
                                                    </tr>
													<tr>
                                                        <th colspan="5">&nbsp;</th>
												<?php 
												$max = 0;
												foreach ($rowSco as $_rowSco) { 
												?>
														<th align="center" width="50" bgcolor="#e2e2e2">
														<?php echo $_rowSco['score_max'];?>
														</th>
														
												<?php 

														$max = $max + $_rowSco['score_max'];
												
													} 

													$score1_1 = $rowC1['score1_1'];
													$score1_2 = $rowC1['score1_2'];

													$max_s = $max;
												
												?>
														
														<th width="50" align="center" bgcolor="#b5bffd"><?php echo $max_s;?></a></th>
														<th width="50" align="center" bgcolor="#dab0fb"><?php echo $score1_1;?></a></th>
														<th width="50" align="center" bgcolor="#fcbbfb"><?php echo $score1_2;?></a></th>
												<?php 

														$sum_score = $score1_1 + $score1_2;		
														
														$scoreid = $rowSco1['score_id'];

												?>

														<th width="50" align="center" bgcolor="#fae59e"><?php echo $sum_score;?></a></th>
														<th width="50">&nbsp;</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php 
													$sum_s = 0;				

													$sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND c.teacher_id2 = '{$tid}' AND a.classroom_t_id='$clid' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND c.course_class_level_id = '$course_class_lid'";

													//echo $sql1;
													$list1 = result_array($sql1);
													foreach ($list1 as $key => $row1) {

													$cc_id = $row1['course_class_id'];
													$cd_id = $row1['course_class_detail_id'];
													$cl_id = $row1['course_class_level_id'];

													$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id = '{$cc_id}' AND b.course_class_detail_id = '{$cd_id}' AND b.course_class_level_id = '{$cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') ORDER BY c.student_class ASC , c.student_no ASC";

													//echo $sql;
													$list = result_array($sql);
												?>
												<?php foreach ($list as $key => $row) { ?>
												<?php
													if ($row['gender'] == 1) {
														$gender = "ชาย";

													} else if ($row['gender'] == 2) {
														$gender = "หญิง";

													}

													$stuid = $row['student_id'];

													$sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$row[student_class]'";
													$rowC = row_array($sqlC);
												?>

                                                    <tr>
                                                        <td align="center"><?php echo $row['student_no'];?></td>
                                                        <td align="center"><?php echo $row['student_id'];?></td>
														<td align="left"><?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?></td>
														<td align="left"><?php echo $row['nickname'];?></td>
														<td align="center"><?php echo $rowC['classroom_name'];?></td>

													<?php		
													
													if ($exam_no == 1){

													$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id = '{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='1' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

													} else if ($exam_no == 2){

													$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id = '{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='1' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

													}											

													//echo $sqlSco;
													$sqlSco = result_array($sqlSco);

													foreach ($sqlSco as $_sqlSco) { 

														$scoreid =  $_sqlSco['score_id'];

														$sqlScor = "SELECT * FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='1' AND a.score_detail_status='1'";

														//echo $sqlScor;
														$_rowScor = row_array($sqlScor);
													
													?>
														<td align="center">
														<?php echo $_rowScor['score'];?>
														<!--<input id="<?php echo $_rowScor['score_detail_id'];?>" name="qty" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor['score'];?>" min="0" max="<?php echo $max;?>">-->
														</td>
													<?php 

														$sum_s = $sum_s + $_rowScor['score'];
														} 
													?>
														<td align="center" bgcolor="#b5bffd"><?php echo $sum_s;?></td>
														<?php 

														if($max_s == "") { 
															$summary_s = 0;

														} else if($max_s != "" ) { 
														
															$summary_s = ($score1_1*$sum_s)/$max_s;

															//echo "$summary_s = ($score1_1*$sum_s)/$max_s";
														}

														?>

														<td align="center" bgcolor="#dab0fb"><?php echo number_format($summary_s,0);?></td>
														<td align="center" bgcolor="#fcbbfb">
														<?php
														$max2 = $score1_2;

														if ($exam_no == 1){

															$_sqlScor3 =  "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id = '{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='2' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

															$_rowScor3 = row_array($_sqlScor3);

															$scoreid31 = $_rowScor3['score_id'];

															$sqlScor3 = "SELECT * FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid31}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='2' AND a.score_detail_status='1'";

														} else if ($exam_no == 2){

															$_sqlScor3 =  "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id = '{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='2' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

															$_rowScor3 = row_array($_sqlScor3);

															$scoreid31 = $_rowScor3['score_id'];

															$sqlScor3 = "SELECT * FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid31}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='2' AND a.score_detail_status='1'";

														}

														//echo $sqlScor3;

														$_rowScor3 = row_array($sqlScor3);
														?>

														<?php echo $_rowScor3['score'];?>
														<!--<input id="<?php echo $_rowScor3['score_detail_id'];?>" name="qty2" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor3['score'];?>" min="0" max="<?php echo $max2;?>">-->
														</td>

														<?php 

															$sum_s1 = $_rowScor2['score'];
															$sum_s2 = $_rowScor3['score'];
															$summary_g = $summary_s + $sum_s1 + $sum_s2;
															$summary_grade = number_format($summary_g,0);
														?>
														<td align="center" bgcolor="#fae59e"><?php echo number_format($summary_grade,0);?></td>
														<td align="center">
														<?php

															if(($summary_grade >= 80) && ($summary_grade <= 100)){
																echo "4.0";

															} else if(($summary_grade >= 75) && ($summary_grade < 80)){
																echo "3.5";

															} else if(($summary_grade >= 70) && ($summary_grade < 75)){
																echo "3.0";

															} else if(($summary_grade >= 65) && ($summary_grade < 70)){
																echo "2.5";

															} else if(($summary_grade >= 60) && ($summary_grade < 65)){
																echo "2.0";

															} else if(($summary_grade >= 55) && ($summary_grade < 60)){
																echo "1.5";

															} else if(($summary_grade >= 50) && ($summary_grade < 55)){
																echo "1.0";

															} else if(($summary_grade >= 0) && ($summary_grade < 50)){
																echo "0.0";

															}

														?>
														</td>
                                                    </tr>

													<?php 											

														$sum_s = 0;
														$summary_s = 0;
														$summary_grade = 0;
														} 										
													} 
													?>

	                                          </tbody>
                                            </table>

											<?php
												}
											} // end Check
											?>							


			 <td>
			<tr>				

        </table>			

		<table class="table" width="98%" style="font-size: 11pt; text-align: center;" cellspacing="0" cellpadding="1" border="0" >

				<tr>
				<td align="center" colspan="2">&nbsp;</td>
				</tr>
				<tr>
				<td align="center" colspan="2">&nbsp;</td>
				</tr>
				<tr>
				<td align="center" colspan="2">&nbsp;</td>
				</tr>
				<tr>
				<td align="center" width="50%">&nbsp;
				</td>
				<td align="center" width="50%">
				ลงชื่อ____________________________<br>
				<?php
				if($teacherid1 == $tid && $teacherid2 != $tid) {
				?>
				( <?php echo $teacher_name1;?> )<br>
				<?php
				} else if($teacherid1 != $tid && $teacherid2 == $tid) {
				?>
				( <?php echo $teacher_name2;?> )<br>
				<?php
				}
				?>

				ผู้สอน/Teacher<br>
				<?php
					$date = date('Y-m-d H:i:s');
				?>
				วันที่ <?php echo date_full_time_th($date);?><br>
				</td>
				</tr>

        </table>
    </center>

                 <!-- END SAMPLE TABLE PORTLET-->

				</td>
		</tr> 

	</table>

</div>
</div>
</body>

</html>
