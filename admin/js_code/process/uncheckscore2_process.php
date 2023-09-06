<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_GET);

$aid = check_session("admin_id");
$date_update = date('Y-m-d H:i:s');

    $data = array(
			"check_status2" => 0 ,
			"check_date2" => "",
			"admin_check2" => "" ,
			"admin_check_status2" => 0 ,
			"admin_check_date2" => ""
    );

    update("tb_course_class_level", $data, "course_class_level_id = '{$ccid}' AND course_class_detail_id = '{$cdid}'");

	// Update Checked
	$sql = "SELECT * FROM tb_score_detail WHERE course_class_level_id = '{$ccid}' AND course_class_detail_id = '{$cdid}' GROUP BY score_id ASC";
	//echo $sql;
	$list = result_array($sql);

	foreach ($list as $key => $row) {
			
			$scoreid = $row['score_id'];

			$data2 = array(
			"score_lock2" => 0 ,
			"admin_check2" => "" ,
			"check_status2" => 0 ,
			"check_date2" => ""
			);

			update("tb_score", $data2, "score_id = '{$scoreid}'");

	}

    //echo "<meta charset='utf-8'/><script>alert('Save Successfully!!');location.href='../?modules=score_teach_detaill&id=$id&tid=$tid&exam_no=$exam_no&clid=$clid&typec=$typec&check_grade=$grade&check_term=$term';</script>";

	echo "<meta charset='utf-8'/><script>alert('Save Successfully!!');window.location.href = document.referrer;</script>";

?>