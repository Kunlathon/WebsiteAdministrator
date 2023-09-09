<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

		$sqlT = "SELECT *,MAX(course_level_id) AS ID , MAX(sort) AS SORT FROM tb_course_level";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;
		$C_SORT = $tcrT['SORT'] + 1;

		$data = array(
				"course_level_id" => $C_ID ,
				"course_detail_id" => $id ,
				"course_level_name" => $level ,
				"sort" => $C_SORT ,
				"admin_id" => $aid ,
				"admin_update" => $update,
				"course_level_status" => 1
		);

		insert("tb_course_level", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=course_show_detail&id=$grade&cid=$cid&sid=$sid';</script>";

?>

