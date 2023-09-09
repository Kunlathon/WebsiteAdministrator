<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($name)   
{
    $s = "SELECT * FROM tb_building WHERE building_name = '$name'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");

if (empty($id)) {

	$check = fnc_count($name);
	
	if ($check) {

		$data = array(
			"building_name" => $name ,
			"status_building" => 1 ,
			"admin_id" => $aid
			
		);

		insert("tb_building", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=building_data';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

} else {

    $data = array(
			"building_name" => $name ,
			"status_building" => 1 ,
			"admin_id" => $aid
    );

    update("tb_building", $data, "building_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=building_data';</script>";

}
?>

