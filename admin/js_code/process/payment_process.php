<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$date_update = date('Y-m-d H:i:s');

if (empty($id)) {

} else {

    $data = array(
			"payment_score1" => $payment_score1 ,
			"payment_score2" => $payment_score2 ,
			"payment_score3" => $payment_score3 ,
			"payment_score4" => $payment_score4
    );

    update("tb_payment", $data, "payment_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=manage_payment_data&id=$grade';</script>";

}
?>

