<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");

		$sql = "SELECT * FROM tb_timetable a INNER JOIN tb_timetable_detail b ON a.timetable_id=b.timetable_id WHERE a.course_id = '{$course}' AND b.timetable_id = '{$id}' AND b.day = '{$day}' AND b.status_timetable='1'";
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$sqlTim = "SELECT * FROM tb_timetable WHERE course_id = '{$course2}' AND status_timetable='1' ";
			$rowTim = row_array($sqlTim);

			$tid = $rowTim['timetable_id'];

			$data = array(
				"timetable_id" => $tid ,
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
		
		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=timetable_show&id=$id&cid=$course2&cy=$cy';</script>";

?>
