<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id_lcm");
$update = date('Y-m-d H:i:s');

		

		$tid = check_session("teacher_id_lcm");

		$data1 = array(
			"memo" =>  $memo,	
			"admin_id" => $aid ,
			"admin_update" => $update

		);

		update("tb_score_detail", $data1, "score_detail_id = '{$dsid}' AND score_id = '{$id}'");

		//echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";

		echo "no_error";

		//echo $memo."<br>".$dsid."<br>".$id;
		//echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');location.href='../?modules=teach_show_detail&id=$sid&idd=$idd&tid=$tid&exam_no=$exam_no&clid=$clid&typec=$typec&check_grade=$grade&check_term=$term';</script>";

?>