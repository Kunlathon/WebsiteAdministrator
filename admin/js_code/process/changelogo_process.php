<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

//$aid = check_session("admin_id");
//$date = date('Y-m-d');

if($_FILES["img"]["name"]!="") {
	$file_ext = substr($_FILES["img"]["name"], strripos($_FILES["img"]["name"], '.'));
	$img_name = date('YmdHis') . "_logo" . $file_ext;

	if (move_uploaded_file($_FILES["img"]["tmp_name"], "../uploads/profile/" . $img_name)) {

		$data = array(
            "school_img" => $img_name
		);
		update("tb_school", $data,"school_id = {$sid}");

		echo "<meta charset='utf-8'/><script>alert('เปลียนรูปภาพสำเร็จ!!');location.href='../index.php';</script>";

	} else {
		echo "<meta charset='utf-8'/><script>alert('ไฟล์รูปไม่ถูกต้อง!!');window.history.back();</script>";
	}
} else if($_FILES['img']['name']=="") {
		echo "<meta charset='utf-8'/><script>alert('ไม่ได้เลือกไฟล์รูป!!');window.history.back();</script>";
}

?>

