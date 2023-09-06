<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

function fnc_count($student_id,$term,$grade)   
{
    $s = "SELECT * FROM tb_assessment_classroom_detail WHERE student_id = '$student_id' AND term_id ='$term' AND grade_id='$grade'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');


$check = fnc_count($student_id,$term,$grade);
	
	if ($check) {
		
		$sqlST = "SELECT * FROM tb_student WHERE student_id = '$student_id'";
		$rowST = row_array($sqlST);

		$data = array(
			"a_classroom_id" => $cid ,
			"student_no" => $rowST['student_no'] ,
			"student_id" => $rowST['student_id'] ,
			"a_student_type" => 1 ,
			"memo" => $memo ,
			"term_id" => $term ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"a_classroom_detail_status" => 1 ,		

		);

		insert("tb_assessment_classroom_detail", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=assessment_classroom_show&id=$cid&check_term=$term&check_grade=$grade';</script>";

} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลนักเรียนซ้ำ!!');window.history.back();</script>";
}

?>

