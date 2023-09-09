<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($name,$surname,$username)   
{
    $s = "SELECT * FROM tb_teacher WHERE teacher_name = '$name' AND teacher_surname = '$surname' AND teacher_username = '$username'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$now_date = date('Y-m-d');

$aid = check_session("admin_id");
$update_date = date('Y-m-d');

$check = fnc_count($name,$surname,$username);
	
	if ($check) {

		$data = array(
				"teacher_section_id"= $sectionid ,
				"teacher_idcard" => $idcard ,
				"teacher_username" => $username ,			
				"teacher_name" => $firstname ,
				"teacher_surname" => $surname ,
				"teacher_name_eng" => $firstname_eng ,
				"teacher_surname_eng" => $surname_eng ,
				"teacher_surname_eng" => $surname_eng ,
				"nickname" => $nickname ,
				"position" => $position ,
				"gender" => $gender ,	
				"race" => $race ,	
				"nationality" => $nationality ,	
				"religion" => $religion ,	
				"birth_day" => $birthday ,	
				"birthplace" => $birthplace ,	
				"education_name" => $education ,
				"major_name" => $major ,
				"marital_status" => $marital ,
				"teacher_address" => $address ,
				"mobile" => $tel ,
				"email" => $email ,
				"admin_id" => $aid ,
				"admin_update " => $update_date

		);

		update("tb_teacher", $data, "teacher_id = '{$tid}'");

		echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=profile_teacher&tid=$tid';</script>";
		
	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

?>