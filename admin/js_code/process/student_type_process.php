<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");

    $data = array(
			"a_student_type" => $stu_type 
			
    );

    update("tb_assessment_classroom_detail", $data, "a_classroom_detail_id='{$classroom_detail_id}' AND student_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=assessment_classroom_show&id=$cid&check_term=$check_term&check_grade=$check_grade';</script>";

?>
