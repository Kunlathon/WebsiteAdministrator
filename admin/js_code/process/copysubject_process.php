<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");

		$sql = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '{$id}' AND course_detail_class_status='1'";
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$classroom = $row['classroom_id'];

			$subjectid = $sid;
			
			$sqlS1 = "SELECT * FROM tb_subject WHERE subject_id='$subjectid'";
			$rowS1 = row_array($sqlS1);

			$data = array(
				"course_id" => $courseid ,	
				"subject_id" => $subjectid ,	
				"subject_code" => $rowS1['subject_code'] ,	
				"subject_name" => $rowS1['subject_name'] ,	
				"subject_name_eng" => $rowS1['subject_name_eng'] ,		
				"unit" => $rowS1['unit'] ,					
				"weight" => $rowS1['weight'] ,	
				"subt_id" => $rowS1['subt_id'] ,	
				"grade_id" => $rowS1['grade_id'] ,
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
				"course_detail_status" => 1 ,		
			);

			insert("tb_course_detail", $data);

		}

		echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=course_show_class&id=$grade&cid=$courseid$&rid=$classroom&check_term=$term';</script>";

?>