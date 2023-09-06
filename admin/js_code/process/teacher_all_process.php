<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

function fnc_count($username)   
{
    $s = "SELECT * FROM tb_teacher WHERE teacher_username = '$username'";
	//$s = "SELECT * FROM tb_teacher WHERE teacher_name = '$name' AND teacher_surname = '$surname' AND teacher_username = '$username'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if (empty($id)) {

	$check = fnc_count($username);
	
	if ($check) {

		$pass = MD5($password);

		$data = array(
			"teacher_section_id" => $section ,
			"teacher_username" => $username ,
			"teacher_password" => $pass ,
			"teacher_name" => $name ,
			"teacher_surname" => $surname ,
			"position" => $position ,
			"gender" => $gender ,
			"admin_id" => $aid ,
			"admin_update" => $update,	
			"teacher_class" => $tclass ,	
			"teacher_teach" => $tteach ,
			"teacher_type" => $ttype ,
			"teacher_status" => 1,
			"teacher_work" => 1
			
		);

		insert("tb_teacher", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=teacher_all';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

} else {

    $data = array(
			"teacher_section_id" => $section ,
			"teacher_username" => $username ,
			"teacher_name" => $name ,
			"teacher_surname" => $surname ,
			"position" => $position ,
			"gender" => $gender ,
			"admin_id" => $aid ,
			"admin_update" => $update,	
			"teacher_class" => $tclass ,	
			"teacher_teach" => $tteach ,	
			"teacher_type" => $ttype,
			"teacher_work" => $status_work
		
    );

    update("tb_teacher", $data, "teacher_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=teacher_all';</script>";

}
?>
