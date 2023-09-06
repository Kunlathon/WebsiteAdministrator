<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

	$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$classroom=isset($_REQUEST['classroom']) ? $_REQUEST['classroom'] : '';
	$check_grade=isset($_REQUEST['check_grade']) ? $_REQUEST['check_grade'] : '';
	$check_term=isset($_REQUEST['check_term']) ? $_REQUEST['check_term'] : '';
	$check_year=isset($_REQUEST['check_year']) ? $_REQUEST['check_year'] : '';

	$check_grade = 3;

if (isset($_REQUEST['check_term'])) {
	$check_term=$_REQUEST['check_term'];
	$sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_id = '$check_term' ORDER BY a.year DESC , a.term DESC";
	$row = row_array($sql);	
	$term1="$row[term]";
	$year1="$row[year]";
	$year2=$year1-543;
	$term="$row[term]/$row[year]";
	$date_score_1="$row[score_G]";
} else if (!isset($_REQUEST['check_term'])) {
	$sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_status = '1' ORDER BY a.year DESC , a.term DESC";
	$row = row_array($sql);
	$check_term=$row['term_id'];
	$term1="$row[term]";
	$year1="$row[year]";
	$year2=$year1-543;
	$term="$row[term]/$row[year]";
	$date_score_1="$row[score_G]";
} 
   
$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id WHERE b.classroom_t_id='$classroom' AND c.student_id='{$id}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.course_class_status='1'";

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
$txt_str = strlen($txt);
if($txt_str>9){
	$txt_grade = substr($txt, 6 ,-3);
} else {											
	$txt_grade = substr($txt, 6 ,-1);									
}

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

													$sum_s = 0;
													$max_s = 0;

													$score12 = 0;
													$score22 = 0;

													$sum_s2 = 0;
													$max_s2 = 0;

													$summary_grade = 0;

													$gpa = 0;
													$total_gpa = 0;

													$rescore_1 = "";
													$rescore_memo1_1 = "";
													$rescore_memo1_2 = "";
													$rescore_memo1_3 = ""; 
													$rescore_memo1_4 = ""; 
													$rescore_memo1_5 = "";
													$rescore_memo1_6 = ""; 
													$rescore_memo2_1 = ""; 
													$rescore_memo2_2 = ""; 
													$rescore_memo2_3 = ""; 
													$rescore_memo2_4 = ""; 
													$rescore_memo2_5 = "";
													$rescore_memo2_6 = "";

													$sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='$course' AND b.subt_id !='4' AND b.grade_id = '$check_grade' AND a.course_class_detail_status='1' ORDER BY b.subt_id ASC, a.sort ASC, b.subject_id ASC";

													//echo $sql;
													$list = result_array($sql);
												?>
												<?php 
												$key1 = 1;
												foreach ($list as $key => $row) { 

												$coursedetail = $row['course_class_detail_id'];

												$subid = $row['subject_id'];		

												$subweight = $row['weight'];	
												$subtid = $row['subt_id'];	

												$sql111 = "SELECT * , COUNT(a.course_s_detail_id) AS NUM FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='$courses_id' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

												//echo "<br>$sql111";
												$row111 = row_array($sql111);

												$num_csd = $row111['NUM'];

												if ($num_csd  == 0) {

													$key1 = $key1-1;

												} else {														
							

														$sqlSubt = "SELECT * FROM tb_subject_type WHERE subt_id='$subtid'";

														//echo "<br>$sqlSubt";
														$rowSubt = row_array($sqlSubt);

														if($subtid==1){
															$total_subweight1 = $total_subweight1 + $subweight;

														} else if($subtid==2) {
															$total_subweight2 = $total_subweight2 + $subweight;
															
														}
															
														?>

												<?php																					

												//echo "<br> $courses_id  -  $coursedetail  -- $subid - $course_class_lid<br>";

												$sql11 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='$courses_id' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

												//echo "<br>$sql11";
												$row11 = row_array($sql11);

												$teacherid1 = $row11['teacher_id1'];
												$teacherid2 = $row11['teacher_id2'];

												$course_class_lid = $row11['course_class_level_id'];

												//echo "<br> $student_id - $teacherid1 -  $teacherid2 - $subid - $course - $coursedetail - $course_class_lid";

												if($teacherid1 != "" && ($teacherid2 == "" || $teacherid2 == 0)) {

													//echo "T1-1 ";

													$rate1 = $row11['rate1'];

													$score1_1 = $row11['score1_1'];
													$score1_2 = $row11['score1_2'];

													//echo "<br>$rate1 -  $score1_1 - $score1_2 - $subid - $course_class_lid<br>";

													$sqlSco1 = "SELECT * , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '$teacherid1' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

													//echo "$sqlSco1<br><br>";
													$list1 = result_array($sqlSco1);

													//echo count($list1)."---";

													foreach ($list1 as $key => $rowSco1) { 

														$row_rescore_memo1_1 = $rowSco1['memo'];

														//echo $row_rescore_memo1_1;

														if ($row_rescore_memo1_1 == "Rescore") {
														//if ($row_rescore_memo1_1 != "") {

															$rescore_memo1_1 = $rescore_memo1_1+1;

														} 

														$scoreid1 = $rowSco1['score_id'];

														$max_s = $max_s + $rowSco1['score_max'];

														//echo "$scoreid1 - $max_s<br>";

														$sum_score = $rowSco1['score'];

														$sum_s = $sum_s + $sum_score;

														$sqlSco2 = "SELECT * , b.memo AS memo  FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '$teacherid1' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														//echo $sqlSco2;

														$rowSco2 = row_array($sqlSco2);
														$score2 = $rowSco2['score'];

														$score2  = $score2;
														//$score2  = number_format($score2,0);

														$row_rescore_memo1_2 = $rowSco2['memo'];

														//echo $row_rescore_memo1_2;

														if ($row_rescore_memo1_2 == "Rescore") {
														//if ($row_rescore_memo1_2 != "") {

															$rescore_memo1_2 = $rescore_memo1_2+1;

														} 

													}
													//echo "$max_s-$sum_s-$rate1-$score1_1<br>";

														if($max_s == "") { 
															$score1 = 0;

														} else if($max_s != "") { 
														
															$score1 = ($score1_1*$sum_s)/$max_s;

															//echo "$score1 = ($score1_1*$sum_s)/$max_s<br><br>";

															//echo "$summary_s = ($score1_1*$sum_s)/$max_s";
														}

														// if score1 == 0

														if($score1==0 && $score2==0) {			

															$sqlCourse1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$course' AND c.subt_id != '4' AND b.subject_id ='$subid' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

															//echo $sqlCourse1;
															$rowCourse1 = result_array($sqlCourse1);

															foreach ($rowCourse1 as $_rowCourse1) { 

																$cc_id = $_rowCourse1['course_class_id'];
																$cd_id = $_rowCourse1['course_class_detail_id'];
																$cl_id = $_rowCourse1['course_class_level_id'];
																$sj_id = $_rowCourse1['subject_id'];															

																$sql_1 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id' AND b.course_class_level_id = '$cl_id' AND c.subject_id = '$sj_id'";
																//echo $sql_1;
																$row_1 = row_array($sql_1);

																$cc__id = $row_1['course_class_id'];
																$cd__id = $row_1['course_class_detail_id'];
																$cl__id = $row_1['course_class_level_id'];
																$sj__id = $row_1['subject_id'];		
																$courses_s_id = $row_1['course_s_id'];	

																$sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id}' AND b.course_class_detail_id='{$cd__id}' AND b.course_class_level_id = '$cl__id' AND c.course_s_id='{$courses_s_id}' AND d.subject_id ='{$sj__id}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

																//echo "$sqlSco1<br><br>";
																$list1 = result_array($sqlSco1);

																//echo count($list1)."---";

																foreach ($list1 as $key => $rowSco1) { 

																	$scoreid1 = $rowSco1['score_id'];

																	//$max_s = $max_s + $rowSco1['score_max'];

																	//echo "$scoreid1 - $max_s<br>";

																	$sum_score = $rowSco1['score'];

																	$sum_s = $sum_s + $sum_score;

																}
																//echo "$max_s-$sum_s-$rate1-$score1_1<br>";

																	if($max_s == "") { 
																		$score1 = 0;

																	} else if($max_s != "") { 
																	
																		$score1 = ($score1_1*$sum_s)/$max_s;

																		//echo "$score1 = ($score1_1*$sum_s)/$max_s<br><br>";

																		//echo "$summary_s = ($score1_1*$sum_s)/$max_s";
																	}

																	$sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id}' AND b.course_class_detail_id='{$cd__id}' AND b.course_class_level_id = '$cl__id' AND c.course_s_id='{$courses_s_id}' AND d.subject_id ='{$sj__id}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

																	//echo "$sqlSco2<br>";

																	$rowSco2 = row_array($sqlSco2);
																	$score_2 = $rowSco2['score'];

																	$score2 = $score2 + $score_2;

																	$score2  = $score2;
																	//$score2  = number_format($score2,0);

															}

															$$score1  = $score1;
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

													$sqlSco1_1 = "SELECT * , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '$teacherid1' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

													//echo "$sqlSco1_1<br><br>";
													$list1_1 = result_array($sqlSco1_1);

													//echo count($list1_1)."---";

													$max_s1_1 = 0;
													$sum_s1_1 = 0;

													foreach ($list1_1 as $key => $rowSco1_1) { 

														$row_rescore_memo1_3 = $rowSco1_1['memo'];	

														//echo $row_rescore_memo1_3;

														if ($row_rescore_memo1_3 == "Rescore") {
														//if ($row_rescore_memo1_3 != "") {

															$rescore_memo1_3 = $rescore_memo1_3+1;

														} 

														$scoreid1_1 = $rowSco1_1['score_id'];

														$max_s1_1 = $max_s1_1 + $rowSco1_1['score_max'];

														//echo $max_s1_1 ;

														$sum_score1_1 = $rowSco1_1['score'];

														$sum_s1_1 = $sum_s1_1 + $sum_score1_1;

														$sqlSco1_2 = "SELECT * , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '$teacherid1' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														$rowSco1_2 = row_array($sqlSco1_2);
														$score12 = $rowSco1_2['score'];

														$score12  = $score12;
														//$score12  = number_format($score12,0);

														$row_rescore_memo1_4 = $rowSco1_2['memo'];	

														//echo $row_rescore_memo1_4;

														if ($row_rescore_memo1_4 == "Rescore") {
														//if ($row_rescore_memo1_4 != "") {

															$rescore_memo1_4 = $rescore_memo1_4+1;

														} 

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

													$sqlSco2_1 = "SELECT *  , b.memo AS memo  FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id'";

													//echo "$sqlSco2_1<br><br>";
													$list2_1 = result_array($sqlSco2_1);

													//echo count($list2_1)."---";

													$max_s2_1 = 0;
													$sum_s2_1 = 0;

													foreach ($list2_1 as $key => $rowSco2_1) { 

														$row_rescore_memo1_5 = $rowSco2_1['memo'];	

														//echo $row_rescore_memo1_5;

														if ($row_rescore_memo1_5 == "Rescore") {
														//if ($row_rescore_memo1_5 != "") {

															$rescore_memo1_5 = $rescore_memo1_5 +1;

														} 


														$scoreid2_1 = $rowSco2_1['score_id'];

														$max_s2_1 = $max_s2_1 + $rowSco2_1['score_max'];

														//echo $max_s2_1 ;

														$sum_score2_1 = $rowSco2_1['score'];

														$sum_s2_1 = $sum_s2_1 + $sum_score2_1;

														$sqlSco2_2 = "SELECT *  , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

														$rowSco2_2 = row_array($sqlSco2_2);
														$score22 = $rowSco2_2['score'];

														$score22  = $score22;
														//$score22  = number_format($score22,0);

														$row_rescore_memo1_6 = $rowSco2_2['memo'];	

														//echo $row_rescore_memo1_6;

														if ($row_rescore_memo1_6 == "Rescore") {
														//if ($row_rescore_memo1_6 != "") {

															$rescore_memo1_6 = $rescore_memo1_6 +1;

														} 

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

															//$score1 = number_format($score1,0);
															//$score2 = number_format($score2,0);

															$max_sum1 = $score1+$score2;
														
														?>
														<!-- ผลคะแนนครั้งที่ 1 -->
														<!--<td align="center"><?php echo  number_format($max_sum1,0);?></td>-->

												<?php																					

												//echo "<br> $courses_id  -  $coursedetail  -- $subid - $course_class_lid<br>";

												$sql112 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='$courses_id' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

												//echo "<br>$sql112";
												$row112 = row_array($sql112);

												$teacherid12 = $row112['teacher_id1'];
												$teacherid22 = $row112['teacher_id2'];

												$course_class_lid2 = $row112['course_class_level_id'];

												//echo "<br> $student_id - $teacherid12 -  $teacherid22 - $subid - $course - $coursedetail - $course_class_lid2";

												if($teacherid12 != "" && ($teacherid22 == "" || $teacherid22 == 0)) {

													//echo "T1-1 ";

													$rate12 = $row112['rate1'];

													$score1_12 = $row112['score1_1'];
													$score1_22 = $row112['score1_2'];

													//echo "<br>$rate12 -  $score1_12 - $score1_22 - $subid - $course_class_lid2<br>";

													$sqlSco12 = "SELECT *  , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '{$teacherid12}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

													//echo "$sqlSco12<br><br>";
													$list12 = result_array($sqlSco12);

													//echo count($list12)."---";

													foreach ($list12 as $key => $rowSco12) { 

														$row_rescore_memo2_1 = $rowSco12['memo'];	

														//echo $row_rescore_memo2_1;

														if ($row_rescore_memo2_1 == "Rescore") {
														//if ($row_rescore_memo2_1 != "") {

															$rescore_memo2_1 = $rescore_memo2_1 +1;

														} 

														$scoreid12 = $rowSco12['score_id'];

														$max_s2 = $max_s2 + $rowSco12['score_max'];

														//echo "$scoreid12 - $max_s2<br>";

														$sum_score2 = $rowSco12['score'];

														$sum_s2 = $sum_s2 + $sum_score2;

														$sqlSco22 = "SELECT *  , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '{$teacherid12}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

														//echo $sqlSco22;

														$rowSco22 = row_array($sqlSco22);
														$score22 = $rowSco22['score'];

														$score22  = $score22;
														//$score22  = number_format($score22,0);

														$row_rescore_memo2_2 = $rowSco22['memo'];	

														//echo $row_rescore_memo2_2;

														if ($row_rescore_memo2_2 == "Rescore") {
														//if ($row_rescore_memo2_2 != "") {

															$rescore_memo2_2 = $rescore_memo2_2 +1;

														} 


													}
													//echo "$max_s2-$sum_s2-$rate12-$score1_12<br>";

														if($max_s2 == "") { 
															$score12 = 0;

														} else if($max_s2 != "") { 
														
															$score12 = ($score1_12*$sum_s2)/$max_s2;

															//echo "$score12 = ($score1_12*$sum_s2)/$max_s2<br><br>";

															//echo "$summary_s2 = ($score1_12*$sum_s2)/$max_s2";
														}

														$score12 = $score12;	
														//$score12 = number_format($score12,0);	

														//echo $score12;

												} else if($teacherid12 != "" && $teacherid22 != "") {

													$rate12 = $row112['rate12'];													
													$rate22 = $row112['rate22'];

													$score1_12 = $row112['score1_12'];
													$score1_22 = $row112['score1_22'];

													//echo "T1";

													//echo "<br>$rate12 - $rate22 - $score1_12 - $score1_22<br>";

													$sqlSco1_12 = "SELECT *  , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '{$teacherid12}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

													//echo "$sqlSco1_12<br><br>";
													$list1_12 = result_array($sqlSco1_12);

													//echo count($list1_12)."---";

													$max_s1_12 = 0;
													$sum_s1_12 = 0;

													foreach ($list1_12 as $key => $rowSco1_12) { 

														$row_rescore_memo2_3 = $rowSco1_12['memo'];	

														//echo $row_rescore_memo2_3;

														if ($row_rescore_memo2_3 == "Rescore") {
														//if ($row_rescore_memo2_3 != "") {

															$rescore_memo2_3 = $rescore_memo2_3 +1;

														} 

														$scoreid1_12 = $rowSco1_12['score_id'];

														$max_s1_12 = $max_s1_12 + $rowSco1_12['score_max'];

														//echo $max_s1_12 ;

														$sum_score1_12 = $rowSco1_12['score'];

														$sum_s1_12 = $sum_s1_12 + $sum_score1_12;

														$sqlSco1_22 = "SELECT *  , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '{$teacherid12}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

														$rowSco1_22 = row_array($sqlSco1_22);
														$score122 = $rowSco1_22['score'];

														$score122  = $score122;
														//$score122  = number_format($score122,0);	

														$row_rescore_memo2_4 = $rowSco1_22['memo'];	

														//echo $row_rescore_memo2_4;

														if ($row_rescore_memo2_4 == "Rescore") {
														//if ($row_rescore_memo2_4 != "") {

															$rescore_memo2_4 = $rescore_memo2_4 +1;

														} 

													}
													//echo "$max_s1_12-$sum_s1_12-$rate12-$score122<br>";

														if($max_s1_12 == "") { 
															$score112 = 0;

														} else if($max_s1_12 != "" ) { 
														
															$score112 = ($score1_12*$sum_s1_12)/$max_s1_12;

															//echo "$score112 = ($score1_12*$sum_s1_12)/$max_s1_12";

														}

														$score112  = $score112;
														//$score112  = number_format($score112,0);	

													//echo "T2";

													$sqlSco2_12 = "SELECT *  , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '{$teacherid22}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='1' AND a.score_no ='2' AND a.score_status='1' AND b.student_id='$student_id'";

													//echo "$sqlSco2_12<br><br>";
													$list2_12 = result_array($sqlSco2_12);

													//echo count($list2_12)."---";

													$max_s2_12 = 0;
													$sum_s2_12 = 0;

													foreach ($list2_12 as $key => $rowSco2_12) { 

														$row_rescore_memo2_5 = $rowSco2_12['memo'];	

														//echo $row_rescore_memo2_5;

														if ($row_rescore_memo2_5 == "Rescore") {
														//if ($row_rescore_memo2_5 != "") {

															$rescore_memo2_5 = $rescore_memo2_5 +1;

														} 

														$scoreid2_12 = $rowSco2_12['score_id'];

														$max_s2_12 = $max_s2_12 + $rowSco2_12['score_max'];

														//echo $max_s2_12 ;

														$sum_score2_12 = $rowSco2_12['score'];

														$sum_s2_12 = $sum_s2_12 + $sum_score2_12;

														$sqlSco2_22 = "SELECT *  , b.memo AS memo FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='$course' AND b.course_class_detail_id='$coursedetail' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='$courses_id' AND d.subject_id ='$subid' AND a.teacher_id = '{$teacherid22}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

														$rowSco2_22 = row_array($sqlSco2_22);
														$score222 = $rowSco2_22['score'];

														$score222  = $score222;
														//$score222  = number_format($score222,0);	

														$row_rescore_memo2_6 = $rowSco2_22['memo'];	

														//echo $row_rescore_memo2_6;

														if ($row_rescore_memo2_6 == "Rescore") {
														//if ($row_rescore_memo2_6 != "") {

															$rescore_memo2_6 = $rescore_memo2_6 +1;

														} 

													}
													//echo "$max_s2-$sum_s2-$rate12-$score1_12<br>";

														if($max_s2_12 == "") { 
															$score212 = 0;

														} else if($max_s2_12 != "" ) { 
														
															$score212 = ($score1_12*$sum_s2_12)/$max_s2_12;

															//echo "$score212 = ($score1_12*$sum_s2_12)/$max_s2_12";

														}

														$score212  = $score212;
														//$score212  = number_format($score212,0);	

														//check rate

														$sum_maxs_1_12 = ($score112*$rate12)/100;																
														$sum_maxs_1_22 = ($score212*$rate22)/100;	
														$score12 = $sum_maxs_1_12+$sum_maxs_1_22;		

														$sum_maxs_2_12 = ($score122*$rate12)/100;																
														$sum_maxs_2_22 = ($score222*$rate22)/100;	
														$score22 = $sum_maxs_2_12+$sum_maxs_2_22;		


												}											

															$score12 = $score12;
															$score22 = $score22;

															//$score12 = number_format($score12,0);
															//$score22 = number_format($score22,0);

															$max_sum2 = $score12+$score22;
														
														?>
			
														<!-- ผลคะแนนครั้งที่ 2 -->
														<!--<td align="center"><?php echo  number_format($max_sum2,0);?></td>-->

														<?php 

														$max_sum1 = number_format($max_sum1,0);		
														$max_sum2 = number_format($max_sum2,0);
														
														$summary_grade = ($max_sum1 + $max_sum2)/2;																												

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
								
													$score1 = 0;
													$score2 = 0;

													$sum_s = 0;
													$max_s = 0;

													$score12 = 0;
													$score22 = 0;

													$sum_s2 = 0;
													$max_s2 = 0;

													$summary_grade = 0;

													$rescore_1 = "";
													$rescore_memo1_1 = "";
													$rescore_memo1_2 = "";
													$rescore_memo1_3 = ""; 
													$rescore_memo1_4 = ""; 
													$rescore_memo1_5 = "";
													$rescore_memo1_6 = ""; 
													$rescore_memo2_1 = ""; 
													$rescore_memo2_2 = ""; 
													$rescore_memo2_3 = ""; 
													$rescore_memo2_4 = ""; 
													$rescore_memo2_5 = "";
													$rescore_memo2_6 = "";
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
	echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=report_achievement_update_3&classroom=$classroom&check_term=$check_term';</script>";
	?>