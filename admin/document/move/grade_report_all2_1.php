<?php
error_reporting (E_ALL ^ E_NOTICE);
include '../config/connect.ini.php';
include '../config/fnc.php';

check_login('admin_username_aba','login.php');

	$classroom=isset($_REQUEST['classroom']) ? $_REQUEST['classroom'] : '';

	$check_grade = 2;

	$exam_no="1";

if (isset($_REQUEST['check_term'])) {
	$check_term=$_REQUEST['check_term'];
	$sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_id = '{$check_term}' ORDER BY a.year DESC , a.term DESC";
	$row = row_array($sql);	
	$term1="$row[term]";
	$year1="$row[year]";
	$year2=$year1-543;
	$term="$row[term]/$row[year]";
	$date_score_1="$row[score_1]";
} else if (!isset($_REQUEST['check_term'])) {
	$sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_status = '1' ORDER BY a.year DESC , a.term DESC";
	$row = row_array($sql);
	$check_term=$row['term_id'];
	$term1="$row[term]";
	$year1="$row[year]";
	$year2=$year1-543;
	$term="$row[term]/$row[year]";
	$date_score_1="$row[score_1]";
} 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title></title> 
<!--<title>:: แบบรายงานผลพัฒนาคุณภาพผู้เรียนรายบุคคล ::</title> -->
<link rel="stylesheet" type="text/css" href="css/aba.css" />
<link rel="stylesheet" type="text/css" href="css/style_detail.css" />
<link rel="stylesheet" href="css/fonts/th_niramit_as.css" />

</head>

<!--<body>-->
<body onLoad="window.print()">

<?php

$sqlCla = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id =b.classroom_t_id WHERE a.classroom_t_id='{$classroom}' AND b.grade_id = '$check_grade' AND b.term_id = '$check_term' AND a.classroom_status='1' ORDER BY b.student_no ASC";

//$sqlCla = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id =b.classroom_t_id WHERE a.classroom_t_id='{$classroom}' AND b.grade_id = '$check_grade' AND b.term_id = '$check_term' AND a.classroom_status='1' ORDER BY b.student_no ASC";

//echo $sqlCla;
$listCla = result_array($sqlCla);

foreach ($listCla as $rowCla) {  

$id = $rowCla['student_id'];

$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id WHERE b.classroom_t_id='{$classroom}' AND c.student_id='{$id}' AND (d.student_no != '0' OR d.student_no != '') AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.course_class_status='1'";

//echo $sql;
$row = row_array($sql);

if($row > 0){

$course = $row['course_class_id'];
$courses_id = $row['course_s_id'];
$student_id = $row['student_id'];
$course_type = $row['course_class_type'];

$filedoc = $row['classroom_name'];
$file_explode = explode(" ",$filedoc);
$file_explode1 = $file_explode[0];
$file_explode2 = $file_explode[1];
$class_name = $file_explode2;
?>
<table class="page-break" style="width:794px; height:1122px; border:0px solid #000;">
<tr>
<td width='100%' align="center">

<div style='margin:0px 0px 0px 0px;'>
<div class='th_niramit_as'>
<div id='nwForm'>
	<table  cellSpacing='0' cellPadding='0' border='0' width='794px;' bgcolor='#FFFFFF' class='th_niramit_as'>
	<!--<table  cellSpacing='0' cellPadding='0' border='0' width='794px;' bgcolor='#FFFFFF' class='th_niramit_as'>-->
				<tr>
				<td width='794px;' colspan='2' align="center">
					<table  cellSpacing='0' cellPadding='0' border='0' width='794px;' bgcolor='#FFFFFF' class='th_niramit_as'>
						<tr> 
							<td width='100px;' align="center" valign="top">&nbsp;</td>
							<td width='694px;' align="center" valign="top"><p class='data'>
									<strong>แบบรายงานผลพัฒนาคุณภาพผู้เรียนรายบุคคล / Assessment Report, Secondary Level</strong><br>
									โรงเรียนยุวฑูตศึกษาราชพฤกษ์ / Ambassador Bilingual Academy<br>
									การประเมินครั้งที่ 1 ภาคเรียนที่ <?php echo $term1;?> ปีการศึกษา <?php echo $year1;?> / 1<sup>st</sup> Assessment Semester <?php echo $term1;?> Academic Year <?php echo $year2;?><br>
									<div style="display:block;width:500px;height:15px">
									<?php 
										$txt = $row['classroom_name'];
										$txt_grade = substr($txt, 6 , 1);
									?>

									<strong>ชั้นมัธยมศึกษาปีที่ <?php echo $row['classroom_year'];?> / Grade <?php echo $txt_grade;?></strong><br>
									<!--ชั้นมัธยมศึกษาปีที่ <?php echo $row['classroom_year'];?> /Grade <?php echo $row['classroom_name'];?><br>-->
									</div>
								<div style="display:block;width:500px;height:15px">&nbsp;</div>
							</td>

					</tr> 
					</table>					
				</td>
		</tr> 


		<tr>
				<td width='794px;' colspan='2'>

				<!-- BEGIN SAMPLE TABLE PORTLET-->

								<?php 
									$txt2 = $row['classroom_name'];
									$txt_grade2 = substr($txt2, 7);
								?>

											<table width="780" border="0" cellpadding="0" cellspacing="0">
                                                    <!--
													<tr>
														<td width="80" align="left"> Student ID : </td>
														<td width="40" align="left">&nbsp;<?php echo $row['student_id'];?></td> 
														<td width="110"> Name - Surname : </td>
														<td width="390" align="left">&nbsp;<?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?>&nbsp;/&nbsp;<?php echo $row['student_name_eng'];?>&nbsp;<?php echo $row['student_surname_eng'];?></td> 
														<td width="50" align="left"> Grade :  </td>
														<td width="50" align="left">&nbsp;G.<?php echo $class_name;?></td>
														<td width="30" align="left"> No.  </td>
														<td width="20" align="left">&nbsp;<?php echo $row['student_no'];?></td>
                                                    </tr>
													-->

													<tr>
                                                        <td width="130" align="left"> เลขประจำตัวนักเรียน : </td>
														<td width="40" align="left">&nbsp;<?php echo $row['student_id'];?></td>  
														<td width="140"align="left"> ชื่อ - สกุล : </td>
														<td width="230" align="left">&nbsp;<?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?></td>   
														<td width="80" align="left"> ระดับชั้น :  </td>
														<td width="80" align="left">&nbsp;ม.<?php echo $row['classroom_year'];?><?php echo $txt_grade2;?></td>  
														<td width="40" align="left"> เลขที่  </td>
														<td width="40" align="left">&nbsp;<?php echo $row['student_no'];?></td>
													</tr>
													<tr>
														<td width="130" align="left"> Student ID : </td>
														<td width="40" align="left">&nbsp;<?php echo $row['student_id'];?></td> 
														<td width="140"> Name - Surname : </td>
														<td width="230" align="left">&nbsp;<?php echo $row['student_name_eng'];?>&nbsp;<?php echo $row['student_surname_eng'];?></td> 
														<td width="80" align="left"> Grade :  </td>
														<td width="80" align="left">&nbsp;G.<?php echo $class_name;?></td>
														<td width="40" align="left"> No.  </td>
														<td width="40" align="left">&nbsp;<?php echo $row['student_no'];?></td>
                                                    </tr>
													
                                            </table>
									</div>
							</div>

						<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->

                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table width="780" border="1" cellpadding="0" cellspacing="0" bordercolor="#333333">
                                                <thead>
                                                    <!--
													<tr bgcolor="#dcdcdc">
                                                        <th width="30"> <font size="2">No.</font></th>
														<th width="80"> <font size="2">Subject Code</font></th>  
                                                       <th width="350"> <font size="2">Subject</font> </th>
														<th width="80">  <font size="2">Standards Score</font> </th>
														<th width="80"> <font size="2">Test Score</font> </th>
														<th width="80"> <font size="2">Total 100%</font> </th>
                                                        <th width="80"> <font size="2">Ratio</font> </th>
                                                    </tr>
													-->
													
													<tr bgcolor="#dcdcdc">
                                                        <th width="25"> ลำดับ <br>No.</th>
														<th width="70">รหัสวิชา <br>Subject Code</th>  
														<th width="365"> รายวิชา/Subject </th>
														<th width="80"> คะแนนเก็บตามตัวชี้วัด <br>Standards Score </th>
														<th width="80"> คะแนนสอบ <br>Test Score </th>
														<th width="80"> คะแนนรวม/Total <br>100% </th>
                                                        <th width="80"> สัดส่วนคะแนน <br> Ratio </th>
                                                    </tr>
													
                                                </thead>
                                                <tbody>
												<?php 
													$score1 = 0;
													$score2 = 0;

													$sum_s = 0;
													$max_s = 0;

													$sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course}' AND b.subt_id !='4' AND b.grade_id = '$check_grade' AND a.course_class_detail_status='1' ORDER BY b.subt_id ASC, a.sort ASC, b.subject_id ASC";

													//echo $sql;
													$list = result_array($sql);
												?>
												<?php 
												$key1 = 1;
												foreach ($list as $key => $row) { 

												$coursedetail = $row['course_class_detail_id'];

												$subid = $row['subject_id'];		

												$sql111 = "SELECT * , COUNT(a.course_s_detail_id) AS NUM FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id}' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

												//echo "<br>$sql111";
												$row111 = row_array($sql111);

												$num_csd = $row111['NUM'];

												if ($num_csd  == 0) {

													$key1 = $key1-1;

												} else {				
											
												?>
                                                    <tr>
                                                        <td align="center"><font size="2"><?php echo $key1;?></font></td>
														<!--<td align="center"><?php echo $key+1;?></td>-->
                                                        <td align="center"><font size="2"><?php echo  $row['subject_code']; ?></font></td>
														<td align="left">&nbsp;<font size="2"><?php echo  $row['subject_name']; ?></font>&nbsp;
														<?php
														if($row['subject_name_eng'] != "") {
															if(($row['subject_code'] == "ว30261") || ($row['subject_code'] == "ว30291")) {
															//if(($row['subject_code'] == "ว30106") || ($row['subject_code'] == "ว30291") || ($row['subject_code'] == "ว30292") || ($row['subject_code'] == "อ31201") || ($row['subject_code'] == "อ32201") || ($row['subject_code'] == "อ33201") || ($row['subject_code'] == "ว30271") || ($row['subject_code'] == "ว30104")  || ($row['subject_code'] == "ว30294")) {
														?>
														<br>&nbsp;/&nbsp;<font size="2"><?php echo $row['subject_name_eng']; ?></font>&nbsp;
														<?php
															} else {
														?>
														/&nbsp;<font size="2"><?php echo $row['subject_name_eng']; ?></font>&nbsp;
														<?php
															}
														} else if($row['subject_name_eng'] == "") {

														}
														
														?>

														&nbsp;

														<?php

														$course_cln = $row111['course_class_level_name'];

														if ($course_cln == "Normal" || $course_cln == "HSL-B" || $course_cln == "HSL-I" || $course_cln == "HSL-A") {
															$course_cln_show = "";

														} else if ($course_cln == "TSL-B" || $course_cln == "TSL-I" || $course_cln == "TSL-A") {
															$course_cln_show = "(TSL)";
															
															if(($row['subject_code'] == "ส11111") || ($row['subject_code'] == "ส11102") || ($row['subject_code'] == "ส12102") || ($row['subject_code'] == "ส13102") || ($row['subject_code'] == "ส14102") || ($row['subject_code'] == "ส15102") || ($row['subject_code'] == "ส16102") || ($row['subject_code'] == "ส12111") || ($row['subject_code'] == "ส12121") || ($row['subject_code'] == "ส13111") || ($row['subject_code'] == "ส13121") || ($row['subject_code'] == "ส14111") || ($row['subject_code'] == "ส14121") || ($row['subject_code'] == "ส15111") || ($row['subject_code'] == "ส15121") || ($row['subject_code'] == "ส16111") || ($row['subject_code'] == "ส16121") || ($row['subject_code'] == "ส31121") || ($row['subject_code'] == "ส31122") || ($row['subject_code'] == "ส11101") || ($row['subject_code'] == "ส12101") || ($row['subject_code'] == "ส13101") || ($row['subject_code'] == "ส14101") || ($row['subject_code'] == "ส15101")  || ($row['subject_code'] == "ส16101") || ($row['subject_code'] == "ส21102") || ($row['subject_code'] == "ส21122") || ($row['subject_code'] == "ส22102") || ($row['subject_code'] == "ส22122") || ($row['subject_code'] == "ส23112") || ($row['subject_code'] == "ส23122") || ($row['subject_code'] == "ส32121") || ($row['subject_code'] == "ส32122") || ($row['subject_code'] == "ส23121") || ($row['subject_code'] == "ส22121") || ($row['subject_code'] == "ส21121") || ($row['subject_code'] == "ส22101") || ($row['subject_code'] == "ส21101")) {
																$course_cln_show = "";
															} else {
																$course_cln_show = "(TSL)";

															}

														} else if ($course_cln == "ESL-B" || $course_cln == "ESL-I" || $course_cln == "ESL-A") {
														//} else if ($course_cln == "ESL") {
															$course_cln_show = "(ESL)";

														} else if ($course_cln == "IEP") {
															$course_cln_show = "(IEP)";

														} else if ($course_cln == "Pre-Intermediate") {

															if(($row['subject_code'] == "ว11201") || ($row['subject_code'] == "ว12201") || ($row['subject_code'] == "ว13201") || ($row['subject_code'] == "ว14201") || ($row['subject_code'] == "ว15201") || ($row['subject_code'] == "ว16201") || ($row['subject_code'] == "ว21201") || ($row['subject_code'] == "ว22201") || ($row['subject_code'] == "ว23201") || ($row['subject_code'] == "ว21202") || ($row['subject_code'] == "ว22202") || ($row['subject_code'] == "ว23202") || ($row['subject_code'] == "ว21101") || ($row['subject_code'] == "ว22101") || ($row['subject_code'] == "ว21102") || ($row['subject_code'] == "ว22102") || ($row['subject_code'] == "ว23101") || ($row['subject_code'] == "ว23102")) {

																$course_cln_show = "(IEP)";

															} else if(($row['subject_code'] == "ค11201") || ($row['subject_code'] == "ค12201") || ($row['subject_code'] == "ค13201") || ($row['subject_code'] == "ค14201") || ($row['subject_code'] == "ค15201") || ($row['subject_code'] == "ค16201") || ($row['subject_code'] == "ค21201") || ($row['subject_code'] == "ค22201") || ($row['subject_code'] == "ค23201") || ($row['subject_code'] == "ค21202") || ($row['subject_code'] == "ค22202") || ($row['subject_code'] == "ค23202") || ($row['subject_code'] == "ค31201") || ($row['subject_code'] == "ค32201") || ($row['subject_code'] == "ค33201") || ($row['subject_code'] == "ค31202") || ($row['subject_code'] == "ค32202") || ($row['subject_code'] == "ค33202")) {

																$course_cln_show = "(ESL)";

															} else if(($row['subject_code'] == "อ21101") || ($row['subject_code'] == "อ23101") || ($row['subject_code'] == "อ22101") || ($row['subject_code'] == "อ21101") || ($row['subject_code'] == "อ23102") || ($row['subject_code'] == "อ22102") || ($row['subject_code'] == "อ21102") || ($row['subject_code'] == "อ23201") || ($row['subject_code'] == "อ23202") || ($row['subject_code'] == "อ22202") || ($row['subject_code'] == "อ21202") || ($row['subject_code'] == "อ23202") || ($row['subject_code'] == "อ21201") || ($row['subject_code'] == "อ22201")) {

																$course_cln_show = "(ESL)";

															} else {

																$course_cln_show = "";

															}

														}

														echo "<font size=1.9>$course_cln_show</font>";

														?>
														
														</td>

												<?php								

												//echo " <br>$course_s_id  -  $coursedetail  -- $subid<br>";

												$sql11 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id}' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

												//echo $sql11;
												$row11 = row_array($sql11);

												$teacherid1 = $row11['teacher_id1'];
												$teacherid2 = $row11['teacher_id2'];

												$course_class_lid = $row11['course_class_level_id'];

												if($teacherid1 != "" && ($teacherid2 == "" || $teacherid2 == 0)) {

													//echo "T1-1 ";

													$rate1 = $row11['rate1'];

													$score1_1 = $row11['score1_1'];
													$score1_2 = $row11['score1_2'];

													//echo "<br>$rate1 -  $score1_1 - $score1_2<br>";

													//$sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

													$sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

													//echo "$sqlSco1<br><br>";
													$list1 = result_array($sqlSco1);

													//echo count($list1)."---";

													foreach ($list1 as $key => $rowSco1) { 

														$scoreid1 = $rowSco1['score_id'];

														$max_s = $max_s + $rowSco1['score_max'];

														//echo $max_s ;

														$sum_score = $rowSco1['score'];

														$sum_s = $sum_s + $sum_score;

														//$sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														$sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

														$rowSco2 = row_array($sqlSco2);
														$score2 = $rowSco2['score'];

														$score2  = number_format($score2,0);

													}
													//echo "$max_s-$sum_s-$rate1-$score1_1<br>";

														if($max_s == "") { 
															$score1 = 0;

														} else if($max_s != "" ) { 
														
															$score1 = ($score1_1*$sum_s)/$max_s;

															//echo "$score1 = ($score1_1*$sum_s)/$max_s;";

															//echo "$summary_s = ($score1_1*$sum_s)/$max_s";
														}

														$score1 = number_format($score1,0);	

												} else if($teacherid1 != "" && $teacherid2 != "") {

													$rate1 = $row11['rate1'];													
													$rate2 = $row11['rate2'];

													$score1_1 = $row11['score1_1'];
													$score1_2 = $row11['score1_2'];

													//echo "T1";

													//echo "<br>$rate1 - $rate2 - $score1_1 - $score1_2<br>";

													$sqlSco1_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

													//$sqlSco1_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

													//echo "$sqlSco1_1<br><br>";
													$list1_1 = result_array($sqlSco1_1);

													//echo count($list1_1)."---";

													$max_s1_1 = 0;
													$sum_s1_1 = 0;

													foreach ($list1_1 as $key => $rowSco1_1) { 

														$scoreid1_1 = $rowSco1_1['score_id'];

														$max_s1_1 = $max_s1_1 + $rowSco1_1['score_max'];

														//echo $max_s1_1 ;

														$sum_score1_1 = $rowSco1_1['score'];

														$sum_s1_1 = $sum_s1_1 + $sum_score1_1;

														$sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														//$sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

														$rowSco1_2 = row_array($sqlSco1_2);
														$score12 = $rowSco1_2['score'];

														$score12  = number_format($score12,0);

													}
													//echo "$max_s1_1-$sum_s1_1-$rate1-$score12<br>";

														if($max_s1_1 == "") { 
															$score11 = 0;

														} else if($max_s1_1 != "" ) { 
														
															$score11 = ($score1_1*$sum_s1_1)/$max_s1_1;

															//echo "$score11 = ($score1_1*$sum_s1_1)/$max_s1_1";

														}

														$score11 = number_format($score11,0);	

													//echo "T2";

													$sqlSco2_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id'";

													//$sqlSco2_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id' AND b.score!='0'";

													//echo "$sqlSco2_1<br><br>";
													$list2_1 = result_array($sqlSco2_1);

													//echo count($list2_1)."---";

													$max_s2_1 = 0;
													$sum_s2_1 = 0;

													foreach ($list2_1 as $key => $rowSco2_1) { 

														$scoreid2_1 = $rowSco2_1['score_id'];

														$max_s2_1 = $max_s2_1 + $rowSco2_1['score_max'];

														//echo $max_s2_1 ;

														$sum_score2_1 = $rowSco2_1['score'];

														$sum_s2_1 = $sum_s2_1 + $sum_score2_1;

														$sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														//$sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

														$rowSco2_2 = row_array($sqlSco2_2);
														$score22 = $rowSco2_2['score'];

														$score22  = number_format($score22,0);

													}
													//echo "$max_s-$sum_s-$rate1-$score1_1<br>";

														if($max_s2_1 == "") { 
															$score21 = 0;

														} else if($max_s2_1 != "" ) { 
														
															$score21 = ($score1_1*$sum_s2_1)/$max_s2_1;

															//echo "$score21 = ($score1_1*$sum_s2_1)/$max_s2_1";

														}

														$score21 = number_format($score21,0);	

														//check rate

														$sum_maxs_1_1 = ($score11*$rate1)/100;																
														$sum_maxs_1_2 = ($score21*$rate2)/100;	
														$score1 = $sum_maxs_1_1+$sum_maxs_1_2;		

														$sum_maxs_2_1 = ($score12*$rate1)/100;																
														$sum_maxs_2_2 = ($score22*$rate2)/100;	
														$score2 = $sum_maxs_2_1+$sum_maxs_2_2;		


												}											


												?>
														<td align="center"><font size="2"><?php echo number_format($score1,0);?></font></td>
														<td align="center"><font size="2"><?php echo number_format($score2,0); ?></font></td>
														<?php 
															$score1 = number_format($score1,0);
															$score2 = number_format($score2,0);

															$max_sum = $score1+$score2;
														
														?>
														<td align="center"><font size="2"><?php echo  number_format($max_sum,0); ?></font></td>
														<td align="center"><font size="2">(<?php echo $score1_1; ?>:<?php echo $score1_2; ?>)</font></td>
                                                    </tr>
													<?php
													$score1 = 0;
													$score2 = 0;

													$sum_s = 0;
													$max_s = 0;
													} 

													$key1 = $key1+1;

												}
													?>

                                                </tbody>
                                            </table>

											<table width="780" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333">
                                                <tbody>
												<tr>
														<td align="left" colspan="7">&nbsp;</td>
                                                    </tr>
													 <tr valign="top">
														<td align="left" colspan="4">
														<table width="100%" border="1" cellpadding="0" cellspacing="0">
														<tr>
															<td align="center" colspan="3"><strong><font size="2">กิจกรรมพัฒนาผู้เรียน / Learner Development Activities</font></strong></td>
														</tr>

														<?php 
															$sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course}' AND b.subt_id='4' AND b.grade_id = '$check_grade' AND a.course_class_detail_status='1' ORDER BY b.subt_id ASC, a.sort ASC, b.subject_id ASC";
															$list = result_array($sql);
														?>
														<?php foreach ($list as $key => $row) { ?>

														<tr>
															<td align="center"><font size="2">กิจกรรม</font></td>
															<td align="left">&nbsp;<font size="2"><?php echo  $row['subject_name']; ?> / <?php echo  $row['subject_name_eng']; ?></font></td>
															<td align="center" width="80"><font size="2">N/A</font></td>
														</tr>

														<?php } ?>

														</table>

														<p>&nbsp;</p>

														<table width="100%" border="1" cellpadding="0" cellspacing="0">
														<tr>
															<td align="center" colspan="2"><strong><font size="2">การประเมินคุณลักษณะ / Character Evaluation</font></strong></td>
														</tr>
														<tr>
															<td align="left"><font size="2">คุณลักษณะอันพึงประสงค์ของสถานศึกษา / Desirable characteristics<br> 
															(The Basic Education Core Curriculum)</font>
															</td>
															<td align="center" width="80"><font size="2">N/A</font></td>
														</tr>
														<tr>
															<td align="left"><font size="2">การอ่าน คิด วิเคราะห์และเขียน / Capacity for communication,<br>  
															thinking, problem-solving and applying life skills</font></td>
															<td align="center" width="80"><font size="2">N/A</font></td>
														</tr>
														<tr>
															<td align="left"><font size="2">กิจกรรมพัฒนาผู้เรียน / Student activities</font></td>
															<td align="center" width="80"><font size="2">N/A</font></td>
														</tr>

														</table>
														<table width="100%" border="0" cellpadding="0" cellspacing="0">
															<tr>
																<td align="left" colspan="2">
																	<strong><u>หมายเหตุ</u> : N/A = Not Applicable / ยังไม่มีการประเมินผล จะประเมินเมื่อสิ้นปีการศึกษา
																</td>
															</tr>
														</table>
														</td>

							<?php
								$sql1 = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id='{$classroom}' AND classroom_status='1'";
								//echo $sql1;
								$cc1 = row_array($sql1);
							?>
							<?php 
								$tid1=$row['teacher_id1'];
								$sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$cc1['teacher_id1']}'";
								$rowT1= row_array($sqlT1);
							?>
							<?php 
								$tid2=$row['teacher_id2'];
								$sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$cc1['teacher_id2']}'";
								$rowT2= row_array($sqlT2);
							?>
							<?php 
								$tid3=$row['teacher_id3'];
								$sqlT3 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$cc1['teacher_id3']}'";
								$rowT3= row_array($sqlT3);
							?>

														<td align="center" colspan="3">
														<table width="100%" border="0" cellpadding="0" cellspacing="0">
														<tr>
															<td align="center">&nbsp;</td>
														</tr>
														<tr>
															<td align="center">ลงชื่อ ............................................</td>
														</tr>
														<tr>
															<td align="center">( <?php echo  $rowT1['teacher_name']; ?>&nbsp;<?php echo  $rowT1['teacher_surname']; ?> )</td>
														</tr>
														<tr>
															<td align="center">
														<?php 
															if($cc1['position_id1']==1){
																echo "English Homeroom Teacher";
															} else if($cc1['position_id1']==2){
																echo "Academic Affairs";															
															}

														?>
														</td>
														</tr>

														<tr>
															<td align="center">&nbsp;</td>
														</tr>
														<tr>
															<td align="center">ลงชื่อ ............................................</td>
														</tr>

														<tr>
															<td align="center">( <?php echo  $rowT2['teacher_name']; ?>&nbsp;<?php echo  $rowT2['teacher_surname']; ?> )</td>
														</tr>
														<tr>
															<td align="center">Thai Homeroom Teacher</td>
														</tr>

														<tr>
															<td align="center">&nbsp;</td>
														</tr>
														<tr>
															<td align="center">ลงชื่อ ............................................</td>
														</tr>

														<tr>
															<td align="center">( <?php echo  $rowT3['teacher_name']; ?>&nbsp;<?php echo  $rowT3['teacher_surname']; ?> )</td>
														</tr>
														<tr>
															<td align="center">Academic Affairs</td>
														</tr>

														<tr>
															<td align="center">
															<?php
																//$date = date('Y-m-d H:i:s');
																$date = $date_score_1;
															?>
															<?php echo date_en($date);?>
															</td>
														</tr>	

														</table>

														</td>
                                                    </tr>
												</tbody>
                                            </table>

                                        </div>
									</div>
								</div>
								</div>
                                    
                                <!-- END SAMPLE TABLE PORTLET-->

				</td>
		</tr> 

	</table>

</div>
</div>
</td>
</tr> 
</table>
<?php
 }
}
?>
</body>

</html>
