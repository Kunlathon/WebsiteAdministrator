<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

	$data = array(
			"sort" => $c_no
			
    );

    update("tb_course_class_detail", $data, "course_class_id = '{$cid}' AND course_class_detail_id = '{$cdid}'");

	header( "location: ../?modules=course_show_class&id=$cid&rid=$rid&check_term=$check_term&check_grade=$check_grade" );

	//echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=course_show_class&id=$cid&rid=$rid&check_term=$check_term&check_grade=$check_grade';</script>";

?>
