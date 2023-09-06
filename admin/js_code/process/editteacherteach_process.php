<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$teacher1=isset($_POST['teacher1']) ? $_POST['teacher1'] : '';
$teacher2=isset($_POST['teacher2']) ? $_POST['teacher2'] : '';
$teacher3=isset($_POST['teacher3']) ? $_POST['teacher3'] : '';

$score1_1=isset($_POST['score1_1']) ? $_POST['score1_1'] : '';
$score1_2=isset($_POST['score1_2']) ? $_POST['score1_2'] : '';

		$data = array(
				"course_class_detail_id" => $cdid ,
				"course_class_level_name" => $level ,
				"teacher_id1" => $teacher1 ,
				"rate1" => $rate1 ,
				"teacher_id2" => $teacher2 ,
				"rate2" => $rate2 ,
				//"teacher_id3" => $teacher3 ,
				//"rate3" => $rate3 ,
				"score1_1" => $score1_1 ,
				"score1_2" => $score1_2 ,
				"score2_1" => $score1_1 ,
				"score2_2" => $score1_2 ,
				"admin_id" => $aid ,
				"admin_update" => $update ,
		);



		update("tb_course_class_level", $data, "course_class_level_id = '{$lid}' AND course_class_detail_id = '{$cdid}'");

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=course_subject_show&id=$id&cdid=$cdid&cid=$cid&check_grade=$check_grade&check_term=$check_term';</script>";

?>