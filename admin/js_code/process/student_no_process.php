<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if($status==2){

	//$dateout = date('Y-m-d');

	$data = array(
			"student_no" => $stu_no ,
			"date_out" => $dateout ,	
			"admin_id" => $aid ,
			"admin_update" => $update,
			"student_status" => $status 
			
    );

} else {

	$data = array(
			"student_no" => $stu_no ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"student_status" => $status 
			
    );

}

    update("tb_student", $data, "student_id = '{$id}'");

    $data2 = array(
			"student_no" => $stu_no ,
			"admin_id" => $aid ,
			"admin_update" => $update
			
    );

    update("tb_classroom_detail", $data2, "student_id = '{$id}'");

	/*$data3 = array(
			"student_no" => $stu_no

	);

	update("tb_assessment_classroom_detail", $data3, "student_id = '{$id}'");*/

	if($status==2){

		$table = "tb_classroom_detail";

		delete($table,"classroom_t_id = '{$cid}' AND student_id = '{$id}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}'");

	}

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=classroom_show&id=$cid&check_term=$check_term&check_grade=$check_grade';</script>";

?>

