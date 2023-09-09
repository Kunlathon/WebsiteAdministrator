<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($username)   
{
    $s = "SELECT * FROM tb_admin WHERE admin_username = '$username'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

//$aid = check_session("admin_id");
$now_date = date('Y-m-d');

if ($section=='edit') {

    $data = array(
			"admin_name" => $name ,
			"admin_lastname" => $surname ,
			"admin_tel" => $tel ,
			"admin_email" => $email ,
			"grade_id" => $grade ,	
			"admin_update" => $now_date  ,
			"admin_status" => $type ,	
			"admin_work" => $status_work
    );

    update("tb_admin", $data, "admin_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=user_data2';</script>";

}
?>

