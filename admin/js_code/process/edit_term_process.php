<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$date_update = date('Y-m-d H:i:s');

		$data = array(
			"exam1_start" => $date_start1 ,
			"exam1_end" => $date_end1 ,	
			"exam2_start" => $date_start2 ,	
			"exam2_end" => $date_end2 ,	
			"score_1" => $date_score_1 ,	
			"score_2" => $date_score_2 ,	
			"score_F" => $date_score_f ,	
			"score_G" => $date_score_g ,	
			"admin_id" => $aid ,
			"admin_update" => $date_update ,
			"term_detail_status" => 1

		);

		update("tb_term_detail", $data, "term_detail_id = '{$id}'");

		echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=term_show&id=$id';</script>";

?>

