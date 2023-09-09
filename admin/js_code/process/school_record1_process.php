<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

	$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$classroom=isset($_REQUEST['classroom']) ? $_REQUEST['classroom'] : '';
	$check_grade=isset($_REQUEST['check_grade']) ? $_REQUEST['check_grade'] : '';
	$check_term=isset($_REQUEST['check_term']) ? $_REQUEST['check_term'] : '';
	$check_year=isset($_REQUEST['check_year']) ? $_REQUEST['check_year'] : '';

	$check_grade = 1;

if (isset($_REQUEST['check_term'])) {
	$check_term=$_REQUEST['check_term'];
	$sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_id = '{$check_term}' ORDER BY a.year DESC , a.term DESC";
	$row = row_array($sql);	
	$term1="$row[term]";
	$year1="$row[year]";
	$year2=$year1-543;
	$term="$row[term]/$row[year]";
	$date_score_1="$row[score_G]";
} else if (!isset($_REQUEST['check_term'])) {
	$sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
	$row = row_array($sql);
	$check_term=$row['term_id'];
	$term1="$row[term]";
	$year1="$row[year]";
	$year2=$year1-543;
	$term="$row[term]/$row[year]";
	$date_score_1="$row[score_G]";
} 
   
$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id WHERE b.classroom_t_id='{$classroom}' AND c.student_id='{$id}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.course_class_status='1'";

//echo $sql;
$row = row_array($sql);

$course = $row['course_class_id'];
$courses_id = $row['course_s_id'];
$student_id = $row['student_id'];
$course_type = $row['course_class_type'];

$filedoc = $row['classroom_name'];
$file_explode = explode(" ",$filedoc);
$file_explode1 = $file_explode[0];
$file_explode2 = $file_explode[1];
$class_name = $file_explode2;

$txt = $row['classroom_name'];
$txt_grade = substr($txt, 6);

$gradename = "Grade $txt_grade";

//เพิ่มข้อมูล tb_school_record
$sql_countsr = "SELECT * , COUNT(school_record_id) AS NUMSR FROM tb_school_record WHERE classroom_t_id='$classroom' AND term_id = '$check_term' AND grade_id = '$check_grade' AND school_record_year = '$check_year' AND grade_name = '$gradename' AND student_id = '$id' AND school_record_status='1'";

//echo "<br>$sql_countsr";
$row_countsr = row_array($sql_countsr);

$numsr_csr = $row_countsr['NUMSR'];

if ($numsr_csr  == '0') {

	$sqlSr = "SELECT *,MAX(school_record_id) AS ID FROM tb_school_record";
	$tcrSr = row_array($sqlSr);

	$SR_ID = $tcrSr['ID'] + 1;

	$data1 = array(
		"school_record_id" => $SR_ID ,
		"classroom_t_id" =>  $classroom ,
		"term_id" => $check_term ,
		"grade_id" => $check_grade ,
		"school_record_year" => $check_year ,
		"grade_name" => $gradename ,
		"student_id" => $id ,
		"admin_id" => $aid ,
		"admin_update" => $update ,
		"school_record_status" => 1

	);

	insert("tb_school_record", $data1);

	$schoolrecord_id = $SR_ID;

} else {

	$sqlSr = "SELECT * FROM tb_school_record WHERE classroom_t_id='$classroom' AND term_id = '$check_term' AND grade_id = '$check_grade' AND school_record_year = '$check_year' AND grade_name = '$gradename' AND student_id = '$id' AND school_record_status='1'";
	$tcrSr = row_array($sqlSr);

	$schoolrecord_id = $tcrSr['school_record_id'];

	$data1 = array(													
			"admin_id" => $aid ,
			"admin_update" => $update

	);

	update("tb_school_record", $data1, "school_record_id = '$schoolrecord_id'");
	
}
?>

												<?php 

													$score1 = 0;
													$score2 = 0;
													$score3 = 0;
													$score4 = 0;

													$sum_s1 = 0;
													$max_s1 = 0;

													$score12 = 0;
													$score22 = 0;
													$score32 = 0;
													$score42 = 0;

													$sum_s2 = 0;
													$max_s2 = 0;

													$score13 = 0;
													$score23 = 0;
													$score33 = 0;
													$score43 = 0;

													$sum_s3 = 0;
													$max_s3 = 0;

													$score14 = 0;
													$score24 = 0;
													$score34 = 0;
													$score44 = 0;

													$sum_s4 = 0;
													$max_s4 = 0;

													$summary_grade = 0;													

													$total_subweight1 = 0;
													$total_subweight2 = 0;
													$total_subweight3 = 0;
													$total_subweight_show1 = 0;
													$total_subweight_show3 = 0;

													$gpa = 0;
													$total_gpa1 = 0;
													$total_gpa = 0;

													$no = 1;
													

													$sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course}' AND b.subt_id !='4' AND b.grade_id = '$check_grade' AND a.course_class_detail_status='1' ORDER BY b.subt_id ASC, a.sort ASC, b.subject_id ASC";

													//echo $sql;
													$list = result_array($sql);

												
												?>
												<?php 
												$key1 = 1;
												foreach ($list as $key => $row) { 


											//ตรวจสอบรายวิชา

											if ($txt_grade == "1") {
												$subject_code_1 = "ส11111";
												$subject_code_2 = "พ11111";
												$subject_code_3 = "ศ11111";

											} else if ($txt_grade == "2") {												
												$subject_code_1 = "ส12111";
												$subject_code_2 = "พ12111";
												$subject_code_3 = "ศ12111";

											} else if ($txt_grade == "3") {
												$subject_code_1 = "ส13111";
												$subject_code_2 = "พ13111";
												$subject_code_3 = "ศ13111";

											} else if ($txt_grade == "4") {
												$subject_code_1 = "ส14111";
												$subject_code_2 = "พ14111";
												$subject_code_3 = "ศ14111";

											} else if ($txt_grade == "5") {
												$subject_code_1 = "ส15111";
												$subject_code_2 = "พ15111";
												$subject_code_3 = "ศ15111";

											} else if ($txt_grade == "6") {
												$subject_code_1 = "ส16111";
												$subject_code_2 = "พ16111";
												$subject_code_3 = "ศ16111";

											} 

											if($row['subject_code'] == $subject_code_1 || $row['subject_code'] == $subject_code_2 || $row['subject_code'] == $subject_code_3) { // ตรวจสอบรายวิชา
											//if($subject_code_g) { // ตรวจสอบรายวิชา

												//echo "$subject_code_1 - $subject_code_2 - $subject_code_3  <br>";				
												
											} else {

												$coursedetail = $row['course_class_detail_id'];

												$subid = $row['subject_id'];		

												$subweight = $row['weight'];	
												$subtid = $row['subt_id'];	

												$sql111 = "SELECT * , COUNT(a.course_s_detail_id) AS NUM FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id}' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

												//echo "<br>$sql111";
												$row111 = row_array($sql111);

												$num_csd = $row111['NUM'];

												if ($num_csd  == 0) {

													$key1 = $key1-1;

												} else {				
											

														$sqlSubt = "SELECT * FROM tb_subject_type WHERE subt_id='{$subtid}'";

														//echo "<br>$sqlSubt";
														$rowSubt = row_array($sqlSubt);

														if($subtid==1){
															$total_subweight1 = $total_subweight1 + $subweight;
															$total_subweight_show1 = $total_subweight_show1 + $subweight_show;

														} else if($subtid==2) {
															$total_subweight2 = $total_subweight2 + $subweight;
															
														}
															
														?>

												<?php		
												
												//คะแนนสอบเทอม1 

												$sum_s1 = 0;
												$max_s1 = 0;

												$sum_s2 = 0;
												$max_s2 = 0;

												$sqlCla1_1 = "SELECT * FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id INNER JOIN tb_term e ON b.term_id = e.term_id WHERE b.classroom_name='{$filedoc}' AND c.student_id='{$id}' AND a.grade_id = '$check_grade' AND e.grade_id = '$check_grade' AND e.term = '1' AND e.year = '$year1' AND a.course_class_status='1' ORDER BY e.term_id DESC";

												//echo "$sqlCla1_1<br>";
												$rowCla1_1 = row_array($sqlCla1_1);

												$check_grade1 = $rowCla1_1['grade_id'];
												$check_term1 = $rowCla1_1['term_id'];

												$courses1 = $rowCla1_1['course_class_id'];
												$classroom_t1 = $rowCla1_1['classroom_t_id'];

												$courses_id1 = $rowCla1_1['course_s_id'];

												$sqlCouCla1 = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '$courses1' AND subject_id = '$subid' AND course_class_detail_status='1'";
												//echo  "$sqlCouCla1<br>";
												$rowCouCla1 = row_array($sqlCouCla1);
												
												$coursedetail1  = $rowCouCla1['course_class_detail_id'];

												//คะแนนสอบเทอม 1 ครั้งที่ 1

												$sql11 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id1}' AND a.course_class_detail_id = '$coursedetail1' AND a.course_class_level_check='1'";

												//echo $sql11;
												$row11 = row_array($sql11);

												$teacherid1 = $row11['teacher_id1'];
												$teacherid2 = $row11['teacher_id2'];

												$course_class_lid1 = $row11['course_class_level_id'];

												if($teacherid1 != "" && ($teacherid2 == "" || $teacherid2 == 0)) {

													//echo "T1-1 ";

													$rate1 = $row11['rate1'];

													$score1_1 = $row11['score1_1'];
													$score1_2 = $row11['score1_2'];

													//echo "<br>$rate1 -  $score1_1 - $score1_2<br>";

													$sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

													//echo "$sqlSco1<br><br>";
													$list1 = result_array($sqlSco1);

													//echo count($list1)."---";

													foreach ($list1 as $key => $rowSco1) { 

														$scoreid1 = $rowSco1['score_id'];

														$max_s1 = $max_s1 + $rowSco1['score_max'];

														//echo $max_s1 ;

														$sum_score1 = $rowSco1['score'];

														$sum_s1 = $sum_s1 + $sum_score1;

														$sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

														$rowSco2 = row_array($sqlSco2);
														$score2 = $rowSco2['score'];

														$score2  = $score2;
														//$score2  = number_format($score2,0);

													}
													//echo "$max_s-$sum_s-$rate1-$score1_1<br>";

														if($max_s1 == "") { 
															$score1 = 0;

														} else if($max_s1 != "" ) { 
														
															$score1 = ($score1_1*$sum_s1)/$max_s1;

															//echo "$score1 = ($score1_1*$sum_s1)/$max_s1;";

															//echo "$summary_s1 = ($score1_1*$sum_s1)/$max_s1";
														}

														// if score1 == 0

														if($score1==0 && $score2==0) {			

															$sqlCourse1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$courses1' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

															//echo $sqlCourse1;
															$rowCourse1 = result_array($sqlCourse1);

															foreach ($rowCourse1 as $_rowCourse1) { 

																$cc_id1 = $_rowCourse1['course_class_id'];
																$cd_id1 = $_rowCourse1['course_class_detail_id'];
																$cl_id1 = $_rowCourse1['course_class_level_id'];
																$sj_id1 = $_rowCourse1['subject_id'];															

																$sql_1 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id1' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id1' AND b.course_class_level_id = '$cl_id1' AND c.subject_id = '$sj_id1'";
																//echo $sql_1;
																$row_1 = row_array($sql_1);

																$cc__id1 = $row_1['course_class_id'];
																$cd__id1 = $row_1['course_class_detail_id'];
																$cl__id1 = $row_1['course_class_level_id'];
																$sj__id1 = $row_1['subject_id'];		
																$courses_s_id1 = $row_1['course_s_id'];	

																$sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1}' AND b.course_class_detail_id='{$cd__id1}' AND b.course_class_level_id = '$cl__id1' AND c.course_s_id='{$courses_s_id1}' AND d.subject_id ='{$sj__id1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

																//echo "$sqlSco1<br><br>";
																$list1 = result_array($sqlSco1);

																//echo count($list1)."---";

																foreach ($list1 as $key => $rowSco1) { 

																	$scoreid1 = $rowSco1['score_id'];

																	//$max_s1 = $max_s1 + $rowSco1['score_max'];

																	//echo "$scoreid1 - $max_s1<br>";

																	$sum_score1 = $rowSco1['score'];

																	$sum_s1 = $sum_s1 + $sum_score1;

																}
																//echo "$max_s1-$sum_s1-$rate1-$score1_1<br>";

																	if($max_s1 == "") { 
																		$score1 = 0;

																	} else if($max_s1 != "") { 
																	
																		$score1 = ($score1_1*$sum_s1)/$max_s1;

																		//echo "$score1 = ($score1_1*$sum_s1)/$max_s1<br><br>";

																		//echo "$summary_s1 = ($score1_1*$sum_s1)/$max_s1";
																	}

																	$sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1}' AND b.course_class_detail_id='{$cd__id1}' AND b.course_class_level_id = '$cl__id1' AND c.course_s_id='{$courses_s_id1}' AND d.subject_id ='{$sj__id1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

																	//echo "$sqlSco2<br>";

																	$rowSco2 = row_array($sqlSco2);
																	$score_2 = $rowSco2['score'];

																	$score2 = $score2 + $score_2;

																	$score2  = $score2;
																	//$score2  = number_format($score2,0);

															}

															$score1  = $score1;
															//$score1  = number_format($score1,0);

															//echo "$score1 - $score2";


														} else { // if score1 != 0

															$score1  = $score1;
															//$score1  = number_format($score1,0);

														}

												} else if($teacherid1 != "" && $teacherid2 != "") {

													$rate1 = $row11['rate1'];													
													$rate2 = $row11['rate2'];

													$score1_1 = $row11['score1_1'];
													$score1_2 = $row11['score1_2'];

													//echo "T1";

													//echo "<br>$rate1 - $rate2 - $score1_1 - $score1_2<br>";

													$sqlSco1_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

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

														$sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														$rowSco1_2 = row_array($sqlSco1_2);
														$score12 = $rowSco1_2['score'];

														$score12  = $score12;
														//$score12  = number_format($score12,0);

													}
													//echo "$max_s1_1-$sum_s1_1-$rate1-$score12<br>";

														if($max_s1_1 == "") { 
															$score11 = 0;

														} else if($max_s1_1 != "" ) { 
														
															$score11 = ($score1_1*$sum_s1_1)/$max_s1_1;

															//echo "$score11 = ($score1_1*$sum_s1_1)/$max_s1_1";

														}

														$score11 = $score11;	
														//$score11 = number_format($score11,0);

													//echo "T2";

													$sqlSco2_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id'";

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

														$sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														$rowSco2_2 = row_array($sqlSco2_2);
														$score22 = $rowSco2_2['score'];

														$score22  = $score22;
														//$score22  = number_format($score22,0);

													}
													//echo "$max_s-$sum_s-$rate1-$score1_1<br>";

														if($max_s2_1 == "") { 
															$score21 = 0;

														} else if($max_s2_1 != "" ) { 
														
															$score21 = ($score1_1*$sum_s2_1)/$max_s2_1;

															//echo "$score21 = ($score1_1*$sum_s2_1)/$max_s2_1";

														}

														$score21 = $score21;	
														//$score21 = number_format($score21,0);

														//check rate

														$sum_maxs_1_1 = ($score11*$rate1)/100;																
														$sum_maxs_1_2 = ($score21*$rate2)/100;	
														$score1 = $sum_maxs_1_1+$sum_maxs_1_2;		

														$sum_maxs_2_1 = ($score12*$rate1)/100;																
														$sum_maxs_2_2 = ($score22*$rate2)/100;	
														$score2 = $sum_maxs_2_1+$sum_maxs_2_2;		


												}				
												$score1 = $score1;
												$score2 = $score2;

												$score1 = number_format($score1,0);
												$score2 = number_format($score2,0);

												if($score1==0 && $score2==0) {
													$max_sum1_1 = 0;

												} else {
													$max_sum1_1 = $score1+$score2;

												}
												

												//echo "$max_sum1_1 = $score1+$score2<br>";
												
												//สิ้นสุดคะแนนเทอม 1 ครั้งที่ 1


												//คะแนนสอบเทอม 1 ครั้งที่ 2

												$sql11_2 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id1}' AND a.course_class_detail_id = '$coursedetail1' AND a.course_class_level_check='1'";

												//echo $sql11_2;
												$row11_2 = row_array($sql11_2);

												$teacherid1_2 = $row11_2['teacher_id1'];
												$teacherid2_2 = $row11_2['teacher_id2'];

												$course_class_lid1_2 = $row11_2['course_class_level_id'];

												if($teacherid1_2 != "" && ($teacherid2_2 == "" || $teacherid2_2 == 0)) {

													//echo "T1-1 ";

													$rate1_2 = $row11_2['rate1'];

													$score1_1_2 = $row11_2['score1_1'];
													$score1_2_2 = $row11_2['score1_2'];

													//echo "<br>$rate1_2 -  $score1_1_2 - $score1_2_2<br>";

													$sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

													//echo "$sqlSco1_2<br><br>";
													$list1_2 = result_array($sqlSco1_2);

													//echo count($list1_2)."---";

													foreach ($list1_2 as $key => $rowSco1_2) { 

														$scoreid1_2 = $rowSco1_2['score_id'];

														$max_s2 = $max_s2 + $rowSco1_2['score_max'];

														//echo $max_s2 ;

														$sum_score1_2 = $rowSco1_2['score'];

														$sum_s2 = $sum_s2 + $sum_score1_2;

														$sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

														$rowSco2_2 = row_array($sqlSco2_2);
														$score2_2 = $rowSco2_2['score'];

														$score2_2  = $score2_2;
														//$score2_2  = number_format($score2_2,0);

													}
													//echo "$max_s2-$sum_s2-$rate1_2-$score1_1_2<br>";

														if($max_s2 == "") { 
															$score1_2 = 0;

														} else if($max_s2 != "" ) { 
														
															$score1_2 = ($score1_1_2*$sum_s2)/$max_s2;

															//echo "$score1_2 = ($score1_1_2*$sum_s2)/$max_s2;";

															//echo "$summary_s1_2 = ($score1_1_2*$sum_s2)/$max_s2";
														}

														// if score1_2 == 0

														if($score1_2==0 && $score2_2==0) {			

															$sqlCourse1_2 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$courses1' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

															//echo $sqlCourse1_2;
															$rowCourse1_2 = result_array($sqlCourse1_2);

															foreach ($rowCourse1_2 as $_rowCourse1_2) { 

																$cc_id1_2 = $_rowCourse1_2['course_class_id'];
																$cd_id1_2 = $_rowCourse1_2['course_class_detail_id'];
																$cl_id1_2 = $_rowCourse1_2['course_class_level_id'];
																$sj_id1_2 = $_rowCourse1_2['subject_id'];															

																$sql_1_2 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id1_2' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id1_2' AND b.course_class_level_id = '$cl_id1_2' AND c.subject_id = '$sj_id1_2'";
																//echo $sql_1_2;
																$row_1_2 = row_array($sql_1_2);

																$cc__id1_2 = $row_1_2['course_class_id'];
																$cd__id1_2 = $row_1_2['course_class_detail_id'];
																$cl__id1_2 = $row_1_2['course_class_level_id'];
																$sj__id1_2 = $row_1_2['subject_id'];		
																$courses_s_id1_2 = $row_1_2['course_s_id'];	

																$sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_2}' AND b.course_class_detail_id='{$cd__id1_2}' AND b.course_class_level_id = '$cl__id1_2' AND c.course_s_id='{$courses_s_id1_2}' AND d.subject_id ='{$sj__id1_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

																//echo "$sqlSco1_2<br><br>";
																$list1_2 = result_array($sqlSco1_2);

																//echo count($list1_2)."---";

																foreach ($list1_2 as $key => $rowSco1_2) { 

																	$scoreid1_2 = $rowSco1_2['score_id'];

																	//$max_s2 = $max_s2 + $rowSco1_2['score_max'];

																	//echo "$scoreid1_2 - $max_s2<br>";

																	$sum_score1_2 = $rowSco1_2['score'];

																	$sum_s2 = $sum_s2 + $sum_score1_2;

																}
																//echo "$max_s2-$sum_s2-$rate1-$score1_1_2<br>";

																	if($max_s2 == "") { 
																		$score1_2 = 0;

																	} else if($max_s2 != "") { 
																	
																		$score1_2 = ($score1_1_2*$sum_s2)/$max_s2;

																		//echo "$score1_2 = ($score1_1_2*$sum_s2)/$max_s2<br><br>";

																		//echo "$summary_s1_2 = ($score1_1_2*$sum_s2)/$max_s2";
																	}

																	$sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_2}' AND b.course_class_detail_id='{$cd__id1_2}' AND b.course_class_level_id = '$cl__id1_2' AND c.course_s_id='{$courses_s_id1_2}' AND d.subject_id ='{$sj__id1_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

																	//echo "$sqlSco2_2<br>";

																	$rowSco2_2 = row_array($sqlSco2_2);
																	$score_2_2 = $rowSco2_2['score'];

																	$score2_2 = $score2_2 + $score_2_2;

																	$score2_2  = $score2_2;
																	//$score2_2  = number_format($score2_2,0);	

															}

															$score1_2  = $score1_2;
															//$score1_2  = number_format($score1_2,0);

															//echo "$score1_2 - $score2_2";


														} else { // if score1_2 != 0

															$score1_2  = $score1_2;
															//$score1_2  = number_format($score1_2,0);

														}

												} else if($teacherid1_2 != "" && $teacherid2_2 != "") {

													$rate1_2 = $row11_2['rate1'];													
													$rate2_2 = $row11_2['rate2'];	

													$score1_1_2 = $row11_2['score1_1'];
													$score1_2_2 = $row11_2['score1_2'];

													//echo "T1";

													//echo "<br>$rate1_2 - $rate2_2 - $score1_1_2 - $score1_2_2<br>";

													$sqlSco1_1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

													//echo "$sqlSco1_1_2<br><br>";
													$list1_1_2 = result_array($sqlSco1_1_2);

													//echo count($list1_1_2)."---";

													$max_s1_1_2 = 0;
													$sum_s1_1_2 = 0;

													foreach ($list1_1_2 as $key => $rowSco1_1_2) { 

														$scoreid1_1_2 = $rowSco1_1_2['score_id'];

														$max_s1_1_2 = $max_s1_1_2 + $rowSco1_1_2['score_max'];

														//echo $max_s1_1_2 ;

														$sum_score1_1_2 = $rowSco1_1_2['score'];

														$sum_s1_1_2 = $sum_s1_1_2 + $sum_score1_1_2;

														$sqlSco1_2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

														$rowSco1_2_2 = row_array($sqlSco1_2_2);
														$score12_2 = $rowSco1_2_2['score'];

														$score12_2  = $score12_2;
														//$score12_2  = number_format($score12_2,0);

													}
													//echo "$max_s1_1_2-$sum_s1_1_2-$rate1_2-$score12_2<br>";

														if($max_s1_1_2 == "") { 
															$score11_2 = 0;

														} else if($max_s1_1_2 != "" ) { 
														
															$score11_2 = ($score1_1_2*$sum_s1_1_2)/$max_s1_1_2;

															//echo "$score11_2 = ($score1_1_2*$sum_s1_1_2)/$max_s1_1_2";

														}

														$score11_2  = $score11_2;
														//$score11_2  = number_format($score11_2,0);

													//echo "T2";

													$sqlSco2_1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_no ='2' AND a.score_status='1' AND b.student_id='$student_id'";

													//echo "$sqlSco2_1_2<br><br>";
													$list2_1_2 = result_array($sqlSco2_1_2);

													//echo count($list2_1_2)."---";

													$max_s2_1_2 = 0;
													$sum_s2_1_2 = 0;

													foreach ($list2_1_2 as $key => $rowSco2_1_2) { 

														$scoreid2_1_2 = $rowSco2_1_2['score_id'];

														$max_s2_1_2 = $max_s2_1_2 + $rowSco2_1_2['score_max'];

														//echo $max_s2_1_2 ;

														$sum_score2_1_2 = $rowSco2_1_2['score'];

														$sum_s2_1_2 = $sum_s2_1_2 + $sum_score2_1_2;

														$sqlSco2_2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

														$rowSco2_2_2 = row_array($sqlSco2_2_2);
														$score22_2 = $rowSco2_2_2['score'];

														$score22_2  = $score22_2;
														//$score22_2  = number_format($score22_2,0);

													}
													//echo "$max_s2-$sum_s2-$rate1_2-$score1_1_2<br>";

														if($max_s2_1_2 == "") { 
															$score21_2 = 0;

														} else if($max_s2_1_2 != "" ) { 
														
															$score21_2 = ($score1_1_2*$sum_s2_1_2)/$max_s2_1_2;

															//echo "$score21_2 = ($score1_1_2*$sum_s2_1_2)/$max_s2_1_2";

														}

														$score21_2  = $score21_2;
														//$score21_2  = number_format($score21_2,0);		

														//check rate

														$sum_maxs_1_1_2 = ($score11_2*$rate1_2)/100;																
														$sum_maxs_1_2_2= ($score21_2*$rate2_2)/100;	
														$score1_2 = $sum_maxs_1_1_2+$sum_maxs_1_2_2;		

														$sum_maxs_2_1_2 = ($score12_2*$rate1_2)/100;																
														$sum_maxs_2_2_2 = ($score22_2*$rate2_2)/100;	
														$score2_2 = $sum_maxs_2_1_2+$sum_maxs_2_2_2;		


												}				
												$score1_2 = $score1_2;
												$score2_2 = $score2_2;

												$score1_2 = number_format($score1_2,0);
												$score2_2 = number_format($score2_2,0);

												if($score1_2==0 && $score2_2==0) {
													$max_sum1_2 = 0;

												} else {
													$max_sum1_2 = $score1_2+$score2_2;

												}												

												//echo "$max_sum1_2 = $score1_2+$score2_2<br>";
												
												//สิ้นสุดคะแนนเทอม 1 ครั้งที่ 2

												//echo "$max_sum1_1 = $score1+$score2<br>$max_sum1_2 = $score1_2+$score2_2<br>";

												$max_sum1_1 = number_format($max_sum1_1,0);		
												$max_sum1_2 = number_format($max_sum1_2,0);

												$score_show1 = ($max_sum1_1 + $max_sum1_2)/2;


												//คะแนนสอบเทอม2

												$sum_s3 = 0;
												$max_s3 = 0;

												$sum_s4 = 0;
												$max_s4 = 0;

												$sqlCla1_2 = "SELECT * FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id INNER JOIN tb_term e ON b.term_id = e.term_id WHERE b.classroom_name='{$filedoc}' AND c.student_id='{$id}' AND a.grade_id = '$check_grade' AND e.grade_id = '$check_grade' AND e.term = '2' AND e.year = '$year1' AND a.course_class_status='1' ORDER BY e.term_id DESC";

												//echo "$sqlCla1_2<br>";
												$rowCla1_2 = row_array($sqlCla1_2);

												$check_grade2 = $rowCla1_2['grade_id'];
												$check_term2 = $rowCla1_2['term_id'];

												$courses2 = $rowCla1_2['course_class_id'];
												$classroom_t2 = $rowCla1_2['classroom_t_id'];

												$courses_id2 = $rowCla1_2['course_s_id'];

												$sqlCouCla2 = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '$courses2' AND subject_id = '$subid' AND course_class_detail_status='1'";
												//echo  "$sqlCouCla2<br>";
												$rowCouCla2 = row_array($sqlCouCla2);
												
												$coursedetail2  = $rowCouCla2['course_class_detail_id'];

												//คะแนนสอบเทอม 2 ครั้งที่ 1

												$sql11_3 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id2}' AND a.course_class_detail_id = '$coursedetail2' AND a.course_class_level_check='1'";

												//echo "$sql11_3<br>";
												$row11_3 = row_array($sql11_3);

												$teacherid1_3= $row11_3['teacher_id1'];
												$teacherid2_3 = $row11_3['teacher_id2'];

												$course_class_lid2 = $row11_3['course_class_level_id'];

												if($teacherid1_3 != "" && ($teacherid2_3 == "" || $teacherid2_3 == 0)) {

													//echo "T1-1 ";

													$rate1_3 = $row11_3['rate1'];
													$rate2_3 = $row11_3['rate2'];

													$score1_1_3 = $row11_3['score1_1'];
													$score1_2_3= $row11_3['score1_2'];

													//echo "<br>$rate1_3 -  $score1_1_3 - $score1_2_3<br>";

													$sqlSco1_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

													//echo "$sqlSco1_3<br><br>";
													$list1_3 = result_array($sqlSco1_3);

													//echo count($list1_3)."---";

													foreach ($list1_3 as $key => $rowSco1_3) { 

														$scoreid1_3 = $rowSco1_3['score_id'];

														$max_s3 = $max_s3 + $rowSco1_3['score_max'];

														//echo $max_s3 ;

														$sum_score1_3 = $rowSco1_3['score'];

														$sum_s3 = $sum_s3 + $sum_score1_3;

														$sqlSco2_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

														$rowSco2_3 = row_array($sqlSco2_3);
														$score2_3 = $rowSco2_3['score'];

														$score2_3  = $score2_3;
														//$score2_3  = number_format($score2_3,0);

													}
													//echo "$max_s3-$sum_s3-$rate1_3-$score1_1_3<br>";

														if($max_s3 == "") { 
															$score1_3 = 0;

														} else if($max_s3 != "" ) { 
														
															$score1_3 = ($score1_1_3*$sum_s3)/$max_s3;

															//echo "$score1_3 = ($score1_1_3*$sum_s3)/$max_s3";

															//echo "$summary_s1_3 = ($score1_1_3*$sum_s3)/$max_s3";
														}

														// if score1_3 == 0

														if($score1_3==0 && $score2_3==0) {			

															$sqlCourse1_3 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$courses2' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

															//echo $sqlCourse1_3;
															$rowCourse1_3 = result_array($sqlCourse1_3);

															foreach ($rowCourse1_3 as $_rowCourse1_3) { 

																$cc_id1_3 = $_rowCourse1_3['course_class_id'];
																$cd_id1_3 = $_rowCourse1_3['course_class_detail_id'];
																$cl_id1_3 = $_rowCourse1_3['course_class_level_id'];
																$sj_id1_3 = $_rowCourse1_3['subject_id'];															

																$sql_1_3 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id1_3' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id1_3' AND b.course_class_level_id = '$cl_id1_3' AND c.subject_id = '$sj_id1_3'";
																//echo $sql_1_3;
																$row_1_3 = row_array($sql_1_3);

																$cc__id1_3 = $row_1_3['course_class_id'];
																$cd__id1_3 = $row_1_3['course_class_detail_id'];
																$cl__id1_3 = $row_1_3['course_class_level_id'];
																$sj__id1_3 = $row_1_3['subject_id'];		
																$courses_s_id2 = $row_1_3['course_s_id'];	

																$sqlSco1_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_3}' AND b.course_class_detail_id='{$cd__id1_3}' AND b.course_class_level_id = '$cl__id1_3' AND c.course_s_id='{$courses_s_id2}' AND d.subject_id ='{$sj__id1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

																//echo "$sqlSco1_3<br><br>";
																$list1_3 = result_array($sqlSco1_3);

																//echo count($list1_3)."---";

																foreach ($list1_3 as $key => $rowSco1_3) { 

																	$scoreid1_3 = $rowSco1_3['score_id'];

																	//$max_s3 = $max_s3 + $rowSco1_3['score_max'];

																	//echo "$scoreid1_3 - $max_s3<br>";

																	$sum_score1_3 = $rowSco1_3['score'];

																	$sum_s3 = $sum_s3 + $sum_score1_3;

																}
																//echo "$max_s3-$sum_s3-$rate1_3-$score1_1_3<br>";

																	if($max_s3 == "") { 
																		$score1_3 = 0;

																	} else if($max_s3 != "") { 
																	
																		$score1_3 = ($score1_1_3*$sum_s3)/$max_s3;

																		//echo "$score1_3 = ($score1_1_3*$sum_s3)/$max_s3<br><br>";

																		//echo "$summary_s1_3 = ($score1_1_3*$sum_s3)/$max_s3";
																	}

																	$sqlSco2_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_3}' AND b.course_class_detail_id='{$cd__id1_3}' AND b.course_class_level_id = '$cl__id1_3' AND c.course_s_id='{$courses_s_id2}' AND d.subject_id ='{$sj__id1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

																	//echo "$sqlSco2_3<br>";

																	$rowSco2_3 = row_array($sqlSco2_3);
																	$score_2_3 = $rowSco2_3['score'];

																	$score2_3 = $score2_3 + $score_2_3;

																	$score2_3  = $score2_3;
																	//$score2_3  = number_format($score2_3,0);	

															}

															$score1_3  = $score1_3;
															//$score1_3  = number_format($score1_3,0);

															//echo "$score1_3 - $score2_3";


														} else { // if score1_3 != 0

															$score1_3  = $score1_3;
															//$score1_3  = number_format($score1_3,0);

														}

												} else if($teacherid1_3 != "" && $teacherid2_3 != "") {

													$rate1_3 = $row11_3['rate1'];													
													$rate2_3 = $row11_3['rate2'];	

													$score1_1_3 = $row11_3['score1_1'];
													$score1_2_3 = $row11_3['score1_2'];

													//echo "T1";

													//echo "<br>$rate1_3 - $rate2_3 - $score1_1_3 - $score1_2_3<br>";

													$sqlSco1_1_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

													//echo "$sqlSco1_1_3<br><br>";
													$list1_1_3 = result_array($sqlSco1_1_3);

													//echo count($list1_1_3)."---";

													$max_s1_1_3 = 0;
													$sum_s1_1_3 = 0;

													foreach ($list1_1_3 as $key => $rowSco1_1_3) { 

														$scoreid1_1_3 = $rowSco1_1_3['score_id'];

														$max_s1_1_3 = $max_s1_1_3 + $rowSco1_1_3['score_max'];

														//echo $max_s1_1_3 ;

														$sum_score1_1_3 = $rowSco1_1_3['score'];

														$sum_s1_1_3 = $sum_s1_1_3 + $sum_score1_1_3;

														$sqlSco1_2_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

														$rowSco1_2_3 = row_array($sqlSco1_2_3);
														$score12_3 = $rowSco1_2_3['score'];

														$score12_3  = $score12_3;
														//$score12_3  = number_format($score12_3,0);

													}
													//echo "$max_s1_1_3-$sum_s1_1_3-$rate1_3-$score12_3<br>";

														if($max_s1_1_3 == "") { 
															$score11_3 = 0;

														} else if($max_s1_1_3 != "" ) { 
														
															$score11_3 = ($score1_1_3*$sum_s1_1_3)/$max_s1_1_3;

															//echo "$score11_3 = ($score1_1_3*$sum_s1_1_3)/$max_s1_1_3";

														}

														$score11_3  = $score11_3;
														//$score11_3  = number_format($score11_3,0);

													//echo "T2";

													$sqlSco2_1_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id'";

													//echo "$sqlSco2_1_3<br><br>";
													$list2_1_3 = result_array($sqlSco2_1_3);

													//echo count($list2_1_3)."---";

													$max_s2_1_3 = 0;
													$sum_s2_1_3 = 0;

													foreach ($list2_1_3 as $key => $rowSco2_1_3) { 

														$scoreid2_1_3 = $rowSco2_1_3['score_id'];

														$max_s2_1_3 = $max_s2_1_3 + $rowSco2_1_3['score_max'];

														//echo $max_s2_1_3 ;

														$sum_score2_1_3 = $rowSco2_1_3['score'];

														$sum_s2_1_3 = $sum_s2_1_3 + $sum_score2_1_3;

														$sqlSco2_2_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														$rowSco2_2_3 = row_array($sqlSco2_2_3);
														$score22_3 = $rowSco2_2_3['score'];

														$score22_3  = $score22_3;
														//$score22_3  = number_format($score22_3,0);

													}
													//echo "$max_s_3-$sum_s_3-$rate1_3-$score1_1_3<br>";

														if($max_s2_1_3 == "") { 
															$score21_3 = 0;

														} else if($max_s2_1_3 != "" ) { 
														
															$score21_3 = ($score1_1_3*$sum_s2_1_3)/$max_s2_1_3;

															//echo "$score21_3 = ($score1_1_3*$sum_s2_1_3)/$max_s2_1_3";

														}

														$score21_3  = $score21_3;
														//$score21_3  = number_format($score21_3,0);

														//check rate

														$sum_maxs_1_1_3 = ($score11_3*$rate1_3)/100;																
														$sum_maxs_1_2_3 = ($score21_3*$rate2_3)/100;	
														$score1_3 = $sum_maxs_1_1_3+$sum_maxs_1_2_3;		

														$sum_maxs_2_1_3 = ($score12_3*$rate1_3)/100;																
														$sum_maxs_2_2_3 = ($score22_3*$rate2_3)/100;	
														$score2_3 = $sum_maxs_2_1_3+$sum_maxs_2_2_3;		


												}				
												$score1_3 = $score1_3;
												$score2_3 = $score2_3;

												$score1_3 = number_format($score1_3,0);
												$score2_3 = number_format($score2_3,0);

												if($score1_3==0 && $score2_3==0) {
													$max_sum2_1 = 0;

												} else {
													$max_sum2_1 = $score1_3+$score2_3;

												}		


												//echo "$max_sum2_1 = $score1_3+$score2_3<br>";
												
												//สิ้นสุดคะแนนเทอม 2 ครั้งที่ 1


												//คะแนนสอบเทอม 2 ครั้งที่ 2

												$sql11_4 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id2}' AND a.course_class_detail_id = '$coursedetail2' AND a.course_class_level_check='1'";

												//echo $sql11_4;
												$row11_4 = row_array($sql11_4);

												$teacherid1_4 = $row11_4['teacher_id1'];
												$teacherid2_4 = $row11_4['teacher_id2'];

												$course_class_lid1_4 = $row11_4['course_class_level_id'];

												if($teacherid1_4 != "" && ($teacherid2_4 == "" || $teacherid2_4 == 0)) {

													//echo "T1-1 ";

													$rate1_4 = $row11_4['rate1'];
													$rate2_4 = $row11_4['rate2'];

													$score1_1_4 = $row11_4['score1_1'];
													$score1_2_4 = $row11_4['score1_2'];

													//echo "<br>$rate1_4 -  $score1_1_4 - $score1_2_4<br>";

													$sqlSco1_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id' AND b.score!='0'";

													//echo "$sqlSco1_4<br><br>";
													$list1_4 = result_array($sqlSco1_4);

													//echo count($list1_4)."---";

													foreach ($list1_4 as $key => $rowSco1_4) { 

														$scoreid1_4 = $rowSco1_4['score_id'];

														$max_s4 = $max_s4 + $rowSco1_4['score_max'];

														//echo $max_s4 ;

														$sum_score1_4 = $rowSco1_4['score'];

														$sum_s4 = $sum_s4 + $sum_score1_4;

														$sqlSco2_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id' AND b.score!='0'";

														$rowSco2_4 = row_array($sqlSco2_4);
														$score2_4 = $rowSco2_4['score'];

														$score2_4  = $score2_4;
														//$score2_4  = number_format($score2_4,0);

													}
													//echo "$max_s4-$sum_s4-$rate1_4-$score1_1_4<br>";

														if($max_s4 == "") { 
															$score1_4 = 0;

														} else if($max_s4 != "" ) { 
														
															$score1_4 = ($score1_1_4*$sum_s4)/$max_s4;

															//echo "$score1_4 = ($score1_1_4*$sum_s4)/$max_s4;";

															//echo "$summary_s1_4 = ($score1_1_4*$sum_s4)/$max_s4";
														}

														// if score1_4 == 0

														if($score1_4==0 && $score2_4==0) {			

															$sqlCourse1_4 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$courses2' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

															//echo $sqlCourse1_4;
															$rowCourse1_4 = result_array($sqlCourse1_4);

															foreach ($rowCourse1_4 as $_rowCourse1_4) { 

																$cc_id1_4 = $_rowCourse1_4['course_class_id'];
																$cd_id1_4 = $_rowCourse1_4['course_class_detail_id'];
																$cl_id1_4 = $_rowCourse1_4['course_class_level_id'];
																$sj_id1_4 = $_rowCourse1_4['subject_id'];															

																$sql_1_4 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id1_4' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id1_4' AND b.course_class_level_id = '$cl_id1_4' AND c.subject_id = '$sj_id1_4'";
																//echo $sql_1_4;
																$row_1_4 = row_array($sql_1_4);

																$cc__id1_4 = $row_1_4['course_class_id'];
																$cd__id1_4 = $row_1_4['course_class_detail_id'];
																$cl__id1_4 = $row_1_4['course_class_level_id'];
																$sj__id1_4 = $row_1_4['subject_id'];		
																$courses_s_id1_4 = $row_1_4['course_s_id'];	

																$sqlSco1_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_4}' AND b.course_class_detail_id='{$cd__id1_4}' AND b.course_class_level_id = '$cl__id1_4' AND c.course_s_id='{$courses_s_id1_4}' AND d.subject_id ='{$sj__id1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

																//echo "$sqlSco1_4<br><br>";
																$list1_4 = result_array($sqlSco1_4);

																//echo count($list1_4)."---";

																foreach ($list1_4 as $key => $rowSco1_4) { 

																	$scoreid1_4 = $rowSco1_4['score_id'];

																	//$max_s4 = $max_s4 + $rowSco1_4['score_max'];

																	//echo "$scoreid1_4 - $max_s4<br>";

																	$sum_score1_4 = $rowSco1_4['score'];

																	$sum_s4 = $sum_s4 + $sum_score1_4;

																}
																//echo "$max_s4-$sum_s4-$rate1-$score1_1_4<br>";

																	if($max_s4 == "") { 
																		$score1_4 = 0;

																	} else if($max_s4 != "") { 
																	
																		$score1_4 = ($score1_1_4*$sum_s4)/$max_s4;

																		//echo "$score1_4 = ($score1_1_4*$sum_s4)/$max_s4<br><br>";

																		//echo "$summary_s1_4 = ($score1_1_4*$sum_s4)/$max_s4";
																	}

																	$sqlSco2_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_4}' AND b.course_class_detail_id='{$cd__id1_4}' AND b.course_class_level_id = '$cl__id1_4' AND c.course_s_id='{$courses_s_id1_4}' AND d.subject_id ='{$sj__id1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

																	//echo "$sqlSco2_4<br>";

																	$rowSco2_4 = row_array($sqlSco2_4);
																	$score_2_4 = $rowSco2_4['score'];

																	$score2_4 = $score2_4 + $score_2_4;

																	$score2_4  = $score2_4;
																	//$score2_4  = number_format($score2_4,0);	

															}

															$score1_4  = $score1_4;
															//$score1_4  = number_format($score1_4,0);

															//echo "$score1_4 - $score2_4";


														} else { // if score1_4 != 0

															$score1_4 = $score1_4;	
															//$score1_4 = number_format($score1_4,0);	

														}

												} else if($teacherid1_4 != "" && $teacherid2_4 != "") {

													$rate1_4 = $row11_4['rate1'];
													$rate2_4 = $row11_4['rate2'];

													$score1_1_4 = $row11_4['score1_1'];
													$score1_2_4 = $row11_4['score1_2'];

													//echo "T1";

													//echo "<br>$rate1_4 - $rate2_4 - $score1_1_4 - $score1_2_4<br>";

													$sqlSco1_1_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

													//echo "$sqlSco1_1_4<br><br>";
													$list1_1_4 = result_array($sqlSco1_1_4);

													//echo count($list1_1_4)."---";

													$max_s1_1_4 = 0;
													$sum_s1_1_4 = 0;

													foreach ($list1_1_4 as $key => $rowSco1_1_4) { 

														$scoreid1_1_4 = $rowSco1_1_4['score_id'];

														$max_s1_1_4 = $max_s1_1_4 + $rowSco1_1_4['score_max'];

														//echo $max_s1_1_4 ;

														$sum_score1_1_4 = $rowSco1_1_4['score'];

														$sum_s1_1_4 = $sum_s1_1_4 + $sum_score1_1_4;

														$sqlSco1_2_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

														$rowSco1_2_4 = row_array($sqlSco1_2_4);
														$score12_4 = $rowSco1_2_4['score'];

														$score12_4  = $score12_4;
														//$score12_4  = number_format($score12_4,0);

													}
													//echo "$max_s1_1_4-$sum_s1_1_4-$rate1_4-$score12_4<br>";

														if($max_s1_1_4 == "") { 
															$score11_4 = 0;

														} else if($max_s1_1_4 != "" ) { 
														
															$score11_4 = ($score1_1_4*$sum_s1_1_4)/$max_s1_1_4;

															//echo "$score11_4 = ($score1_1_4*$sum_s1_1_4)/$max_s1_1_4";

														}

														$score11_4 = $score11_4;	
														//$score11_4 = number_format($score11_4,0);

													//echo "T2";

													$sqlSco2_1_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_no ='2' AND a.score_status='1' AND b.student_id='$student_id'";

													//echo "$sqlSco2_1_4<br><br>";
													$list2_1_4 = result_array($sqlSco2_1_4);

													//echo count($list2_1_4)."---";

													$max_s2_1_4 = 0;
													$sum_s2_1_4 = 0;

													foreach ($list2_1_4 as $key => $rowSco2_1_4) { 

														$scoreid2_1_4 = $rowSco2_1_4['score_id'];

														$max_s2_1_4 = $max_s2_1_4 + $rowSco2_1_4['score_max'];

														//echo $max_s2_1_4 ;

														$sum_score2_1_4 = $rowSco2_1_4['score'];

														$sum_s2_1_4 = $sum_s2_1_4 + $sum_score2_1_4;

														$sqlSco2_2_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

														$rowSco2_2_4 = row_array($sqlSco2_2_4);
														$score22_4 = $rowSco2_2_4['score'];

														$score22_4  = $score22_4;
														//$score22_4  = number_format($score22_4,0);

													}
													//echo "$max_s4-$sum_s4-$rate1_4-$score1_1_4<br>";

														if($max_s2_1_4 == "") { 
															$score21_4 = 0;

														} else if($max_s2_1_4 != "" ) { 
														
															$score21_4 = ($score1_1_4*$sum_s2_1_4)/$max_s2_1_4;

															//echo "$score21_4 = ($score1_1_4*$sum_s2_1_4)/$max_s2_1_4";

														}

														$score21_4 = $score21_4;	
														//$score21_4 = number_format($score21_4,0);

														//check rate

														$sum_maxs_1_1_4 = ($score11_4*$rate1_4)/100;																
														$sum_maxs_1_2_4= ($score21_4*$rate2_4)/100;	
														$score1_4 = $sum_maxs_1_1_4+$sum_maxs_1_2_4;		

														$sum_maxs_2_1_4 = ($score12_4*$rate1_4)/100;																
														$sum_maxs_2_2_4 = ($score22_4*$rate2_4)/100;	
														$score2_4 = $sum_maxs_2_1_4+$sum_maxs_2_2_4;		


												}				
												$score1_4 = $score1_4;
												$score2_4 = $score2_4;

												$score1_4 = number_format($score1_4,0);
												$score2_4 = number_format($score2_4,0);

												if($score1_4==0 && $score2_4==0) {
													$max_sum2_2 = 0;

												} else {
													$max_sum2_2 = $score1_4+$score2_4;

												}		

												//echo "$max_sum2_2 = $score1_4+$score2_4<br><br>";
												
												//สิ้นสุดคะแนนเทอม 2 ครั้งที่ 2

												//echo "$max_sum2_1 = $score1_3+$score2_3<br>$max_sum2_2 = $score1_4+$score2_4<br><br>";

												//echo "$max_sum1_1 - $max_sum1_2 ||  $max_sum2_1 - $max_sum2_2<br>";

												$max_sum2_1 = number_format($max_sum2_1,0);		
												$max_sum2_2 = number_format($max_sum2_2,0);

												$score_show2 = ($max_sum2_1 + $max_sum2_2)/2;

														/*$max_sum1_1 = number_format($max_sum1_1,0);		
														$max_sum1_2 = number_format($max_sum1_2,0);
														$max_sum2_1 = number_format($max_sum2_1,0);		
														$max_sum2_2 = number_format($max_sum2_2,0);
														
														
														$summary_grade = (((($max_sum1_1 + $max_sum1_2)/2) + (($max_sum2_1 + $max_sum2_2)/2))/2);*/	
														
														$score_show1 = number_format($score_show1,0);		
														$score_show2 = number_format($score_show2,0);
														
														
														$summary_grade = ((($score_show1) + ($score_show2))/2);	
																					

															if(($summary_grade >= 79.5) && ($summary_grade <= 100)){
																$show_grade = "4.0";

															} else if(($summary_grade >= 74.5) && ($summary_grade < 79.5)){
																$show_grade = "3.5";

															} else if(($summary_grade >= 69.5) && ($summary_grade < 74.5)){
																$show_grade = "3.0";

															} else if(($summary_grade >= 64.5) && ($summary_grade < 69.5)){
																$show_grade = "2.5";

															} else if(($summary_grade >= 59.5) && ($summary_grade < 64.5)){
																$show_grade = "2.0";

															} else if(($summary_grade >= 54.5) && ($summary_grade < 59.5)){
																$show_grade = "1.5";

															} else if(($summary_grade >= 49.5) && ($summary_grade < 54.5)){
																$show_grade = "1.0";

															} else if(($summary_grade >= 0) && ($summary_grade < 49.5)){
																$show_grade = "0.0";

															}


															//echo $show_grade;

															//$gpa = $subweight_show * $show_grade;
															//$gpa = $subweight * $show_grade;
															//$total_gpa1 = $total_gpa1 + $gpa;

															

															$sql_count = "SELECT * , COUNT(b.school_record_detail_id) AS NUM FROM tb_school_record a INNER JOIN tb_school_record_detail b ON a.school_record_id = b.school_record_id WHERE a.school_record_id='$schoolrecord_id' AND b.subject_id = '$subid' AND a.school_record_status='1'";

															//echo "<br>$sql_count";
															$row_count = row_array($sql_count);

															$num_csr = $row_count['NUM'];

															if ($num_csr  == '0') {

																$sqlSr = "SELECT *,MAX(school_record_detail_id) AS RID FROM tb_school_record_detail";
																$tcrSr = row_array($sqlSr);

																$SR_ID = $tcrSr['RID'] + 1;

																$data2 = array(
																	"school_record_detail_id" => $SR_ID ,
																	"school_record_id" => $schoolrecord_id ,
																	"subject_id" => $subid ,				
																	"credit" => $subweight ,
																	"score" => $summary_grade ,
																	"result" => $show_grade ,
																	"memo" => "" ,																	
																	"admin_id" => $aid ,
																	"admin_update" => $update

																);

																insert("tb_school_record_detail", $data2);

															} else {

																$sqlSrS = "SELECT * FROM tb_school_record a INNER JOIN tb_school_record_detail b ON a.school_record_id = b.school_record_id WHERE a.school_record_id='$schoolrecord_id' AND b.subject_id = '$subid' AND a.school_record_status='1'";
																$tcrSrS = row_array($sqlSrS);

																$schoolrecord_detail_id = $tcrSrS['school_record_detail_id'];
																
																$data2 = array(
																	"school_record_id" => $schoolrecord_id ,
																	"subject_id" => $subid ,				
																	"credit" => $subweight ,
																	"score" => $summary_grade ,
																	"result" => $show_grade ,
																	"memo" => "" ,																	
																	"admin_id" => $aid ,
																	"admin_update" => $update

																);

																update("tb_school_record_detail", $data2, "school_record_detail_id = '$schoolrecord_detail_id'");

															}

														
													$no = $no+1;
													} //จบการตรวจสอบ

													$score1 = 0;
													$score2 = 0;

													$sum_s = 0;
													$max_s = 0;

													$score12 = 0;
													$score22 = 0;

													$sum_s2 = 0;
													$max_s2 = 0;

													$summary_grade = 0;
													} 

													$key1 = $key1+1;

												}

												$sqlScoC1 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='1') AND b.classroom_t_id = '$classroom' AND b.student_id='$student_id' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco1;
															$rowScoC1 = result_array($sqlScoC1);

															foreach ($rowScoC1 as $key => $_rowScoC1) {

																$score_max_1 = $score_max_1 + $_rowScoC1['score_max'];
																$score_max_100_1 = 100;

																$sum_score_max_1 = $sum_score_max_1 + $_rowScoC1['score'];
																$sum_score_max_100_1 = ($sum_score_max_1*$score_max_100_1)/$score_max_1;
															}

															if($sum_score_max_100_1 >= 90) {
																$analysis1 = "ดีเยี่ยม/EXCELLENT";
																$analysis_num1 = "3";

															} else if($sum_score_max_100_1 >= 75) {
																$analysis1 = "ดี/GOOD	";
																$analysis_num1 = "2";

															} else if($sum_score_max_100_1 >= 60) {
																$analysis1 = "ผ่าน/PASS";
																$analysis_num1 = "1";

															} else if($sum_score_max_100_1 < 60) {
																$analysis1 = "ไม่ผ่าน/FAIL";
																$analysis_num1 = "0";

															}			
															
															//echo $analysis1;

															$sql_count_analysis1 = "SELECT * , COUNT(b.school_record_evaluation_id) AS NUMAL1 FROM tb_school_record a INNER JOIN tb_school_record_evaluation b ON a.school_record_id = b.school_record_id WHERE a.school_record_id='$schoolrecord_id' AND b.character_cat_id ='1' AND a.school_record_status='1'";

															//echo "<br>$sql_count_analysis1";
															$row_count_analysis1 = row_array($sql_count_analysis1);

															$num_analysis1 = $row_count_analysis1['NUMAL1'];

															if ($num_analysis1  == '0') {

																$sqlAL1 = "SELECT *,MAX(school_record_evaluation_id) AS ALID1 FROM tb_school_record_evaluation";
																$tcrAL1 = row_array($sqlAL1);

																$AL1_ID = $tcrAL1['ALID1'] + 1;

																$data_al1 = array(
																	"school_record_evaluation_id" => $AL1_ID ,
																	"school_record_id" => $schoolrecord_id ,
																	"character_cat_id" => 1 ,	
																	"score" => $analysis_num1 ,													
																	"admin_id" => $aid ,
																	"admin_update" => $update

																);

																insert("tb_school_record_evaluation", $data_al1);

															} else {

																$sqlAl1 = "SELECT * FROM tb_school_record a INNER JOIN tb_school_record_evaluation b ON a.school_record_id = b.school_record_id WHERE a.school_record_id='$schoolrecord_id' AND b.character_cat_id ='1' AND a.school_record_status='1'";
																$tcrAl1 = row_array($sqlAl1);

																$schoolrecord_evaluation_id1 = $tcrAl1['school_record_evaluation_id'];
																
																$data_al1 = array(
																	"school_record_id" => $schoolrecord_id ,	
																	"character_cat_id" => 1 ,	
																	"score" => $analysis_num1 ,													
																	"admin_id" => $aid ,
																	"admin_update" => $update

																);

																update("tb_school_record_evaluation", $data_al1, "school_record_evaluation_id = '$schoolrecord_evaluation_id1'");

															}
															
															$sqlScoC2 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='2') AND b.classroom_t_id = '$classroom' AND b.student_id='$student_id' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco2;
															$rowScoC2 = result_array($sqlScoC2);

															foreach ($rowScoC2 as $key => $_rowScoC2) {
																$sum_score_max_2 = $sum_score_max_2 + $_rowScoC2['score'];

															}

															if($sum_score_max_2 >= 90) {
																$analysis2 = "ดีเยี่ยม/EXCELLENT";
																$analysis_num2 = "3";

															} else if($sum_score_max_2 >= 75) {
																$analysis2 = "ดี/GOOD	";
																$analysis_num2 = "2";

															} else if($sum_score_max_2 >= 60) {
																$analysis2 = "ผ่าน/PASS";
																$analysis_num2 = "1";

															} else if($sum_score_max_2 < 60) {
																$analysis2 = "ไม่ผ่าน/FAIL";
																$analysis_num2 = "0";

															}			
															
															//echo $analysis2;

															$sql_count_analysis2 = "SELECT * , COUNT(b.school_record_evaluation_id) AS NUMAL2 FROM tb_school_record a INNER JOIN tb_school_record_evaluation b ON a.school_record_id = b.school_record_id WHERE a.school_record_id='$schoolrecord_id' AND b.character_cat_id ='2' AND a.school_record_status='1'";

															//echo "<br>$sql_count_analysis2";
															$row_count_analysis2 = row_array($sql_count_analysis2);

															$num_analysis2 = $row_count_analysis2['NUMAL2'];

															if ($num_analysis2  == '0') {

																$sqlAL2 = "SELECT *,MAX(school_record_evaluation_id) AS ALID2 FROM tb_school_record_evaluation";
																$tcrAL2 = row_array($sqlAL2);

																$AL2_ID = $tcrAL2['ALID2'] + 1;

																$data_al2 = array(
																	"school_record_evaluation_id" => $AL2_ID ,
																	"school_record_id" => $schoolrecord_id ,
																	"character_cat_id" => 2 ,	
																	"score" => $analysis_num2 ,													
																	"admin_id" => $aid ,
																	"admin_update" => $update

																);

																insert("tb_school_record_evaluation", $data_al2);

															} else {

																$sqlAl2 = "SELECT * FROM tb_school_record a INNER JOIN tb_school_record_evaluation b ON a.school_record_id = b.school_record_id WHERE a.school_record_id='$schoolrecord_id' AND b.character_cat_id ='2' AND a.school_record_status='1'";
																$tcrAl2 = row_array($sqlAl2);

																$schoolrecord_evaluation_id2 = $tcrAl2['school_record_evaluation_id'];
																
																$data_al2 = array(
																	"school_record_id" => $schoolrecord_id ,	
																	"character_cat_id" => 2 ,	
																	"score" => $analysis_num2 ,													
																	"admin_id" => $aid ,
																	"admin_update" => $update

																);

																update("tb_school_record_evaluation", $data_al2, "school_record_evaluation_id = '$schoolrecord_evaluation_id2'");

															}

															$sqlScoC3 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='3') AND b.classroom_t_id = '$classroom' AND b.student_id='$student_id' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco2;
															$rowScoC3 = result_array($sqlScoC3);

															foreach ($rowScoC3 as $key => $_rowScoC3) {
																$sum_score_max_3 = $_rowScoC3['score'];

															}

															if($sum_score_max_3 == 0) {
																$analysis3 = "N/A";
																$analysis_num3 = "0";

															} else if($sum_score_max_3 == 1) {
																$analysis3 = "ผ่าน/PASS";
																$analysis_num3 = "1";

															} else if($sum_score_max_3 == 2) {
																$analysis3 = "ไม่ผ่าน/FAIL";
																$analysis_num3 = "2";

															} 		
															
															//echo $analysis3;

															$sql_count_analysis3 = "SELECT * , COUNT(b.school_record_evaluation_id) AS NUMAL3 FROM tb_school_record a INNER JOIN tb_school_record_evaluation b ON a.school_record_id = b.school_record_id WHERE a.school_record_id='$schoolrecord_id' AND b.character_cat_id ='3' AND a.school_record_status='1'";

															//echo "<br>$sql_count_analysis3";
															$row_count_analysis3 = row_array($sql_count_analysis3);

															$num_analysis3 = $row_count_analysis3['NUMAL3'];

															if ($num_analysis3  == '0') {

																$sqlAL3 = "SELECT *,MAX(school_record_evaluation_id) AS ALID3 FROM tb_school_record_evaluation";
																$tcrAL3 = row_array($sqlAL3);

																$AL3_ID = $tcrAL3['ALID3'] + 1;

																$data_al3 = array(
																	"school_record_evaluation_id" => $AL3_ID ,
																	"school_record_id" => $schoolrecord_id ,
																	"character_cat_id" => 3 ,	
																	"score" => $analysis_num3 ,													
																	"admin_id" => $aid ,
																	"admin_update" => $update

																);

																insert("tb_school_record_evaluation", $data_al3);

															} else {

																$sqlAl3 = "SELECT * FROM tb_school_record a INNER JOIN tb_school_record_evaluation b ON a.school_record_id = b.school_record_id WHERE a.school_record_id='$schoolrecord_id' AND b.character_cat_id ='3' AND a.school_record_status='1'";
																$tcrAl3 = row_array($sqlAl3);

																$schoolrecord_evaluation_id3 = $tcrAl3['school_record_evaluation_id'];
																
																$data_al3 = array(
																	"school_record_id" => $schoolrecord_id ,	
																	"character_cat_id" => 3 ,	
																	"score" => $analysis_num3 ,													
																	"admin_id" => $aid ,
																	"admin_update" => $update

																);

																update("tb_school_record_evaluation", $data_al3, "school_record_evaluation_id = '$schoolrecord_evaluation_id3'");

															}
															
															?>




	<?php
	echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=report_achievement_update_1&classroom=$classroom&check_year=$check_year';</script>";
	?>