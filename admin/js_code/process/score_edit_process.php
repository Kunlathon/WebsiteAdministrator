<?php

include ("../../config/connect.ini.php");
include ("../../config/fnc.php");
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id_aba");
$update = date('Y-m-d H:i:s');

		//$tid = check_session("teacher_id");

		$data1 = array(
			"score_name" =>  $name,
			//"score_name_eng" => $ename ,
			"score_max" => $unit,			
			"admin_id" => $aid ,
			"admin_update" => $update ,
			"score_type" => $type,					
			"score_status" => 1

		);

		update("tb_score", $data1, "score_id = '{$id}'");


		//echo $name." ".$unit." ".$aid." ".$update." ".$type." ".$id."****";

		echo "no_error";

		// echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');location.href='../?modules=teach_show_detail&id=$sid&idd=$idd&tid=$tid&exam_no=$exam_no&clid=$clid&typec=$typec&check_grade=$grade&check_term=$term';</script>";
		//echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";
?>