<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");

		$sqlT = "SELECT *,MAX(timetable_id) AS ID FROM tb_timetable";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;

		$sql = "SELECT * FROM tb_timetable WHERE timetable_id='{$id}' AND course_id='{$course}'";
		$tcr = row_array($sql);

		$data = array(
			"timetable_id" => $C_ID ,
			"term_id" => $term ,
			"course_id" => $course2 ,
			"classroom_id" => $tcr['classroom_id'] ,
			"part" => $tcr['part'] ,
			"student_type" => $tcr['student_type'] ,			
			"student_num" => $num ,
			"degree" => 1 ,
			"course_year" => $tcr['course_year'] ,
			"status_timetable" => 1 ,		
			"memo" => $tcr['memo'] ,			
			"admin_id" => $aid

		);

		insert("tb_timetable", $data);

		$sql = "SELECT * FROM tb_timetable_detail WHERE timetable_id = '{$id}' AND status_timetable='1' ";
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$data = array(
				"timetable_id" => $C_ID ,
				"subject_id" => $row['subject_id'] ,
				"teacher_id" => $row['teacher_id'] ,
				"teacher_id2" => $row['teacher_id2'] ,
				"teacher_id3" => $row['teacher_id3'] ,
				"day" => $row['day'] ,
				"time_start" => $row['time_start'] ,
				"time_end" => $row['time_end'] ,
				"classroom_id" => $row['classroom_id'] ,
				"status_timetable" => 1
			);

			insert("tb_timetable_detail", $data);

		
		}
		
		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=timetable_data&check_term=$term&cy=$cy';</script>";

?>

