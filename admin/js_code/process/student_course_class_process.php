<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($student)   
{
    $s = "SELECT * FROM tb_classroom_detail WHERE student_id = '$student'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");

$check = fnc_count($student);
	
	if ($check) {

		$sqlS = "SELECT *,MAX(course_id) AS ID FROM tb_classroom_detail WHERE classroom_t_id ='$cid' AND term_id ='$check_term' AND grade_id ='$check_grade' AND classroom_detail_status='1'";
		$tcrS = row_array($sqlS);

		$SN_ID = $tcrS['ID'] + 1;

		$data = array(
			"classroom_t_id" => $cid ,
			"student_no" => $SN_ID ,
			"student_id" => $student ,
			"memo" => $memo ,
			"classroom_detail_status" => 1 ,		

		);

		insert("tb_classroom_detail", $data);

		$data2 = array(
			"student_class" => $class ,
			"memo" => $memo ,		
			"admin_id" => $aid

		);

		update("tb_student", $data2, "student_id = '{$student}'");

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=classroom_course_show&id=$cid&check_term=$term&check_grade=$grade';</script>";

} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลนักเรียนซ้ำ!!');window.history.back();</script>";
}

?>

