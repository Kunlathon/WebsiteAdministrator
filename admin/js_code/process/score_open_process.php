<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_GET);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');


if($sc == 1) {

	if($scs == 1) {
			$data = array(
				"score_1_status" => 0	
			);

			update("tb_term_detail", $data,"term_id = '{$tid}' AND term_detail_id = '{$tdid}' AND term_detail_status = '1'");

	} else if($scs == 0) {
			$data = array(
				"score_1_status" => 1	
			);

			update("tb_term_detail", $data,"term_id = '{$tid}' AND term_detail_id = '{$tdid}' AND term_detail_status = '1'");
	}

} else if($sc == 2) {

	if($scs == 1) {
			$data = array(
				"score_2_status" => 0	
			);

			update("tb_term_detail", $data,"term_id = '{$tid}' AND term_detail_id = '{$tdid}' AND term_detail_status = '1'");

	} else if($scs == 0) {
			$data = array(
				"score_2_status" => 1	
			);

			update("tb_term_detail", $data,"term_id = '{$tid}' AND term_detail_id = '{$tdid}' AND term_detail_status = '1'");
	}

}
		
		echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";
		
		//echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');location.href='../?modules=level_up_list&id=$check_grade';</script>";

?>