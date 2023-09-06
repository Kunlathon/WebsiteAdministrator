<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

/*function fnc_count($code,$name)   
{
    $s = "SELECT * FROM tb_subject WHERE subject_code = '$code' AND subject_name = '$name'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}*/

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

    $data = array(
			"course_class_id" => $cid ,
			"subject_id" => $subject ,
			"subject_code" => $code ,
			"subject_name" => $name ,
			"subject_name_eng" => $ename ,
			"unit" => $unit ,					
			"weight" => $weight ,	
			"subt_id" => $subt ,	
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"course_class_detail_status" => 1
    );

    update("tb_course_class_detail", $data, "course_class_detail_id = '$cdid'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=course_show&id=$grade&cid=$cid';</script>";

?>
