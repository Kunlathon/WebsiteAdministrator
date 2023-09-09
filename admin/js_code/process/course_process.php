<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($cy,$name)   
{
    $s = "SELECT * FROM tb_course WHERE course_year = '$cy' AND course_name = '$name'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if (empty($id)) {

	$check = fnc_count($cy,$name);
	
	if ($check) {

		$sqlT = "SELECT *,MAX(course_id) AS ID , MAX(course_sort) AS SORT FROM tb_course";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;
		$C_SORT = $tcrT['SORT'] + 1;

		$data = array(
			"course_id" => $C_ID ,
			"course_name" => $name ,
			"course_name_eng" => $ename ,
			"grade_id" => $grade ,
			"course_year" => $cy ,
			"memo" => $memo ,		
			"course_sort" => $C_SORT ,	
			"admin_id" => $aid ,
			"admin_update" => $update,
			"course_status" => 1 ,		

		);

		insert("tb_course", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=course_data&id=$grade';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลหลักสูตรซ้ำ!!');window.history.back();</script>";
    }

} else {

    $data = array(
			"course_name" => $name ,
			"course_name_eng" => $ename ,
			"grade_id" => $grade ,
			"course_year" => $cy ,
			"memo" => $memo ,		
			"admin_id" => $aid,
			"admin_update" => $update
    );

    update("tb_course", $data, "course_id = '{$id}'");

	echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=course_data&id=$grade';</script>";

}
?>

