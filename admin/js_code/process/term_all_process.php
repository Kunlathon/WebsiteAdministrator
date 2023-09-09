<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$date_update = date('Y-m-d H:i:s');

$sql = "SELECT * FROM tb_grade";
$list = result_array($sql); 

foreach ($list as $row) {

		$sqlTer = "SELECT *,MAX(term_id) AS ID FROM tb_term";
		$tcrTer = row_array($sqlTer);

		$T_ID = $tcrTer['ID'] + 1;

		$grade = $row['grade_id'];

		$data1 = array(
			"term_id" => $T_ID ,
			"term" => $term ,
			"year" => $term_year ,			
			"term_start" => $date_start ,
			"term_end" => $date_end ,				
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $date_update ,
			"term_status" => 1
		);

		insert("tb_term", $data1);

		$data2 = array(
			"term_id" => $T_ID ,
			"exam1_no" => 1,
			"exam2_no" => 2 ,	
			"term_detail_status" => 1

		);

		insert("tb_term_detail", $data2);


}	
		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=term_data_list';</script>";

?>

