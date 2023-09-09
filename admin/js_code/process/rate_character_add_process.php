<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$count = count($id);

for($i=0;$i<$count;$i++){

    $sql = "SELECT * FROM tb_character_detail WHERE character_detail_id = '{$id[$i]}' AND character_detail_id='{$asid}'";
    $data = row_array($sql);

	$data = array(
			"score" => $score[$i] ,
			"admin_id" => $aid ,
			"admin_update" => $update
	);

    update("tb_character_detail", $data, "character_detail_id = '{$id[$i]}'");

}

    echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=character_show&id=$clid&check_grade=$check_grade&check_term=$check_term';</script>"
?>
