<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$now_date = date('Y-m-d');

if($password==$repassword) {

	$pass = md5($password);

    $data = array(
			"admin_password" => $pass ,
			"admin_update" => $now_date
    );

    update("tb_admin", $data, "admin_id = '{$aid}'");

    echo "<meta charset='utf-8'/><script>alert('เปลี่ยนรหัสผ่านสำเร็จ!!');location.href='../process/logout.php';</script>";
}else{
    echo"<meta charset='utf-8'/><script>alert('รหัสผ่านไม่ถูกต้อง!!');location.href='index.php';</script>";
}
?>

