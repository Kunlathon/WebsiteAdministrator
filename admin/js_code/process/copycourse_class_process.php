<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");

		$sqlT = "SELECT *,MAX(course_class_id) AS ID FROM tb_course_class";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;

		$sql = "SELECT * FROM tb_course_class WHERE course_class_id='{$id}'";
		$tcr = row_array($sql);

		$data = array(
			"course_class_id" => $C_ID ,
			"classroom_id" =>  $classroom,
			"course_class_name" =>  $name,
			"course_class_name_eng" => $tcr['course_class_name_eng'] ,
			"term_id" => $term ,
			"grade_id" => $grade ,	
			"course_class_year" => $tcr['course_class_year'] ,	
			"memo" => $tcr['memo'] ,		
			"admin_id" => $aid,							
			"course_class_type" => $type_course ,	
			"course_class_status" => 1

		);

		insert("tb_course_class", $data);

		$sql = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '{$id}' AND course_class_detail_status='1'";
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$data = array(
				"course_class_id" => $C_ID ,
				"subject_id" => $row['subject_id'] ,	
				"subject_code" => $row['subject_code'] ,	
				"subject_name" => $row['subject_name'] ,	
				"subject_name_eng" => $row['subject_name_eng'] ,		
				"unit" => $row['unit'] ,					
				"weight" => $row['weight'] ,	
				"subt_id" => $row['subt_id'] ,	
				"grade_id" => $row['grade_id'] ,
				"teacher_id1" => $row['teacher_id1'] ,	
				"rate1" => $row['rate1'] ,	
				"teacher_id2" => $row['teacher_id2'] ,	
				"rate2" => $row['rate2'] ,	
				"teacher_id3" => $row['teacher_id3'] ,	
				"rate3" => $row['rate3'] ,	
				"score1_1" => $row['score1_1'] ,	
				"score1_2" => $row['score1_2'] ,	
				"score2_1" => $row['score2_1'] ,	
				"score2_2" => $row['score2_2'] ,
				"course_class_detail_status" => 1 ,		
			);

			insert("tb_course_class_detail", $data);

		}
		
		echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=course_data_class&id=$grade&cid=$classroom&check_term=$term';</script>";

?>