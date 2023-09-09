<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

	$pass = md5($password);

    $data = array(
			"teacher_password" => $pass ,
			"admin_id" => $aid ,
			"admin_update" => $update
		
    );

    update("tb_teacher", $data, "teacher_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('เปลี่ยนรหัสผ่านสำเร็จ!!');location.href='../?modules=teacher_all';</script>";

?>
