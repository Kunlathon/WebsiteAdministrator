<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

    $data = array(
			"student_password" => $password ,
			"admin_id" => $aid ,
			"admin_update" => $update
		
    );

    update("tb_student", $data, "student_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('เปลี่ยนรหัสผ่านสำเร็จ!!');location.href='../?modules=student_data';</script>";

?>
