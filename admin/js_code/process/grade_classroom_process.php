<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

function fnc_count($name)
{
    $s = "SELECT * FROM tb_classroom WHERE classroom_name = '$name'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if (empty($id)) {

	$check = fnc_count($name);
	
	if ($check) {

		$sqlT = "SELECT *,MAX(classroom_id) AS ID FROM tb_classroom";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;

		$data = array(
			"classroom_id" => $C_ID ,
			"classroom_name" => $name ,
			"classroom_name_eng" => $name ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update ,
			"classroom_status" => 1
			
		);

		insert("tb_classroom", $data);

		$sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade}' ORDER BY year DESC , term DESC";
		$row = row_array($sql);
		$check_term=$row['term_id'];

		$data2 = array(
			"classroom_id" => $C_ID ,
			"classroom_name" => $name ,
			"classroom_name_eng" => $name ,
			"term_id" => $check_term ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update ,
			"classroom_status" => 1
			
		);

		insert("tb_classroom_teacher", $data2);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=grade_classroom_data&id=$grade';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

} else {

    $data = array(
			"classroom_name" => $name ,
			"classroom_name_eng" => $name ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update
    );

    update("tb_classroom", $data, "classroom_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=grade_classroom_data&id=$grade';</script>";

}
?>

