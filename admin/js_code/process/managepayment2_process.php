<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$date_update = date('Y-m-d H:i:s');

if ($action=='edit') {

    $data = array(	
			"payment_score1" => $score1 ,
			"payment_score2" => $score2 ,	
			"payment_score3" => $score3 ,
			"payment_score4" => $score4 ,
			"admin_id" => $aid ,
			"admin_update" => $date_update
    );

    update("tb_payment", $data, "payment_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=manage_payment_grade2';</script>";

}
?>

