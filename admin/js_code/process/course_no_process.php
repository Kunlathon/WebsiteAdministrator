<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

	$data = array(
			"sort" => $c_no
			
    );

    update("tb_course_detail", $data, "course_id = '{$cid}' AND course_detail_id = '{$cdid}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=course_show&id=$check_grade&cid=$cid';</script>";

?>
