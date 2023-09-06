<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if($pay==1) {
	//$count = count($id);
	$count = count($id) + 1;

	for($i=1;$i<$count;$i++){

		$data = array(
			"payment_student_score1" => $chk[$i] ,
			"admin_id" => $aid ,
			"admin_update" => $update
		);

		update("tb_payment_student", $data, "payment_student_id = '{$id[$i]}' AND payment_id = '{$pid}'");

	}

} else if ($pay==2) {
	//$count = count($id);
	$count = count($id) + 1;

	for($i=1;$i<$count;$i++){

		$data = array(
			"payment_student_score2" => $chk[$i] ,
			"admin_id" => $aid ,
			"admin_update" => $update
		);

		update("tb_payment_student", $data, "payment_student_id = '{$id[$i]}' AND payment_id = '{$pid}'");

	}

} else if ($pay==3) {
	//$count = count($id);
	$count = count($id) + 1;

	for($i=1;$i<$count;$i++){

		$data = array(
			"payment_student_score3" => $chk[$i] ,
			"admin_id" => $aid ,
			"admin_update" => $update
		);

		update("tb_payment_student", $data, "payment_student_id = '{$id[$i]}' AND payment_id = '{$pid}'");

	}

} else if ($pay==4) {
	//$count = count($id);
	$count = count($id) + 1;

	for($i=1;$i<$count;$i++){

		$data = array(
			"payment_student_score4" => $chk[$i] ,
			"admin_id" => $aid ,
			"admin_update" => $update
		);

		update("tb_payment_student", $data, "payment_student_id = '{$id[$i]}' AND payment_id = '{$pid}'");

	}

}

    echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=payment_show3&id=$rid&check_term=$check_term&check_grade=$check_grade';</script>"

?>
