<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

		//$tid = check_session("teacher_id");

		$data1 = array(
			"memo" =>  $memo,	
			"admin_id" => $aid ,
			"admin_update" => $update

		);

		update("tb_score_detail", $data1, "score_detail_id = '{$dsid}' AND score_id = '{$id}'");

		echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";

		//echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');location.href='../?modules=check_subject_teach_detail2&id=$sid&idd=$idd&tid=$tid&cdid=$cdid&cid=$cid&rid=$clid&exam_no=$exam_no&typec=$typec&check_grade=$check_grade&check_term=$check_term';</script>";

?>