<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$now_date = date('Y-m-d');

    $data = array(
			"admin_idcard" => $idcard ,
			"admin_name" => $firstname ,
			"admin_lastname" => $lastname ,
			"admin_address" => $address ,
			"admin_tel" => $tel ,
			"admin_email" => $email ,
			"admin_update" => $now_date
    );

    update("tb_admin", $data, "admin_id = '{$aid}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=profile';</script>";


?>