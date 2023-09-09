<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

/*function fnc_count($code,$name)   
{
    $s = "SELECT * FROM tb_subject WHERE subject_code = '$code' AND subject_name = '$name'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}*/

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

	if($subt == 4) {
		$weight = 0;

	} else {

		$weight = $unit/40;
	}

    $data = array(
			"subject_code" => $code ,
			"subject_name" => $name ,
			"subject_name_eng" => $ename ,
			"unit" => $unit ,
			"weight" => $weight ,
			"subt_id" => $subt ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
    );

    update("tb_course_detail", $data, "course_detail_id = '$id'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=course_show&id=$grade&cid=$cid';</script>";

?>
