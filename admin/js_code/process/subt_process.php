<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($name)   
{
    $s = "SELECT * FROM tb_subject_type WHERE subt_name = '$name'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");

if (empty($id)) {

	$check = fnc_count($name);
	
	if ($check) {

		$data = array(
			"subt_name" => $name ,
			"subt_name_eng" => $ename ,
			"admin_id" => $aid
			
		);

		insert("tb_subject_type", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=subject_type_data';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

} else {

    $data = array(
			"subt_name" => $name ,
			"subt_name_eng" => $ename ,
			"admin_id" => $aid
    );

    update("tb_subject_type", $data, "subt_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=subject_type_data';</script>";

}
?>

