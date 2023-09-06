<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

	$pass = md5($password);

    $data = array(
			"admin_password" => $pass ,
			"admin_update" => $now_date
		
    );

    update("tb_admin", $data, "admin_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('เปลี่ยนรหัสผ่านสำเร็จ!!');location.href='../?modules=user_data2';</script>";

?>
