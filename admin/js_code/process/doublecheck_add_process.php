<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if($action=="add") {
	//$count = count($id);
	$count = count($id) + 1;

	for($i=1;$i<$count;$i++){

		$data = array(
			"score_double_student" => $chk[$i] ,
			"admin_id" => $aid ,
			"admin_update" => $update
		);

		update("tb_payment_student", $data, "payment_student_id = '{$id[$i]}' AND payment_id = '{$pid}'");

	}

}

	echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";

    //echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=payment_show$check_grade&id=$rid&check_term=$check_term&check_grade=$check_grade';</script>"

?>
