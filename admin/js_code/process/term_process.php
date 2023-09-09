<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($term,$term_year,$date_start,$date_end,$grade)   
{
    $s = "SELECT * FROM tb_term WHERE term = '$term' AND year = '$term_year' AND term_start = '$date_start' AND term_end = '$date_end' AND grade_id = '$grade'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

function fnc_count_t($term,$term_year,$grade)   
{
    $s = "SELECT * FROM tb_term WHERE term = '$term' AND year = '$term_year' AND grade_id = '$grade'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");
$date_update = date('Y-m-d H:i:s');

if (empty($id)) {

	$check_t = fnc_count_t($term,$term_year,$grade);
	
	if ($check_t) {

	$check = fnc_count($term,$term_year,$date_start,$date_end,$grade);
	
	if ($check) {

		$sqlTer = "SELECT *,MAX(term_id) AS ID FROM tb_term";
		$tcrTer = row_array($sqlTer);

		$T_ID = $tcrTer['ID'] + 1;

		$data = array(
			"term_id" => $T_ID ,
			"term" => $term ,
			"year" => $term_year ,			
			"term_start" => $date_start ,
			"term_end" => $date_end ,				
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $date_update ,
			"term_status" => 1 ,
			"checkgrade_status" => 0
		);

		insert("tb_term", $data);

		$data2 = array(
			"term_id" => $T_ID ,
			"exam1_no" => 1,
			"exam2_no" => 2 ,	
			"term_detail_status" => 1

		);

		insert("tb_term_detail", $data2);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=term_data&id=$grade';</script>";

		} else {
			echo "<meta charset='utf-8'/><script>alert('ข้อมูลการจัดภาคเรียนซ้ำ!!');window.history.back();</script>";
		}

	} else {
		echo "<meta charset='utf-8'/><script>alert('ข้อมูลการจัดภาคเรียนซ้ำ!!');window.history.back();</script>";
	}

} else {

    $data = array(
			"term" => $term ,
			"year" => $term_year ,			
			"term_start" => $date_start ,
			"term_end" => $date_end ,	
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $date_update ,
			"term_status" => $status ,
			"checkgrade_status" => $checkgrade_st
    );

    update("tb_term", $data, "term_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=term_data&id=$grade';</script>";

}
?>

