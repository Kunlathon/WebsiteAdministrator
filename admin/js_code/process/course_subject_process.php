<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

		$sqlT = "SELECT *,MAX(course_detail_id) AS ID , MAX(sort) AS SORT FROM tb_course_detail";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;
		$C_SORT = $tcrT['SORT'] + 1;

		$sqlS = "SELECT * FROM tb_subject WHERE subject_id='$subject'";
		$rowS = row_array($sqlS);

		$data = array(
			"course_id" => $cid ,
			"subject_id" => $subject ,
			"subject_code" => $rowS['subject_code'] ,
			"subject_name" => $rowS['subject_name'] ,
			"subject_name_eng" => $rowS['subject_name_eng'] ,
			"unit" => $rowS['unit'] ,					
			"weight" => $rowS['weight'] ,	
			"subt_id" => $rowS['subt_id'] ,	
			"grade_id" => $rowS['grade_id'] ,
			"sort" => $C_SORT ,	
			"admin_id" => $aid ,
			"admin_update" => $update,
			"course_detail_status" => 1 ,		

		);

		insert("tb_course_detail", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=course_show&id=$grade&cid=$cid';</script>";

?>

