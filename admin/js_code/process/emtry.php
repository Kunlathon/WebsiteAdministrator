<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_GET);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$tid=isset($_GET['tid']) ? $_GET['tid'] : '';

if ($tid == "teacher1"){

	$data = array(
				"teacher_id1" => "" ,
				"rate1" => ""	,
				"score2_1" => ""	,
				"score2_2" => ""	,
				"admin_id" => $aid ,
				"admin_update" => $update
	);

} else if ($tid == "teacher2"){
	$data = array(
				"teacher_id2" => "" ,
				"rate2" => "" ,
				"score2_1" => ""	,
				"score2_2" => ""	,
				"admin_id" => $aid ,
				"admin_update" => $update
	);

} else if ($tid == "teacher3"){
	$data = array(
				"teacher_id3" => "" ,
				"rate3" => "",
				"admin_id" => $aid ,
				"admin_update" => $update
	);

}

		update("tb_course_class_level", $data, "course_class_level_id = '{$lid}' AND course_class_detail_id = '{$cdid}'");
	
echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=course_subject_show&id=$id&cdid=$cdid&cid=$cid&check_grade=$check_grade&check_term=$check_term';</script>";

?>