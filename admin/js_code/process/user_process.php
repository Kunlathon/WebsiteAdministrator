<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

function fnc_count($username)   
{
    $s = "SELECT * FROM tb_admin WHERE admin_username = '$username'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

//$aid = check_session("admin_id");
$now_date = date('Y-m-d');

if (empty($id)) {

	$pass = md5($password);

	$check = fnc_count($username);
	
	if ($check) {

		$data = array(
			"admin_name" => $name ,
			"admin_lastname" => $surname ,
			"admin_username" => $username ,
			"admin_password" => $pass ,
			"admin_tel" => $tel ,
			"admin_email" => $email ,
			"grade_id" => $grade ,			
			"admin_date" => $now_date  ,
			"admin_update" => $now_date  ,
			"admin_status" => $type 
			
		);

		insert("tb_admin", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=user_data';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

} else {

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

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=user_data';</script>";

}
?>
