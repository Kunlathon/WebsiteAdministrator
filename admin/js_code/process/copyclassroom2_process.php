<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

		$sqlT = "SELECT *,MAX(classroom_t_id) AS ID FROM tb_classroom_teacher";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;

		$sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_id='{$id}' AND term_id ='{$term1}' AND grade_id='{$grade}' ";
		$tcr = row_array($sql);

		$CT_ID = $tcr['classroom_t_id'];

		$data = array(
			"classroom_t_id" => $C_ID ,
			"classroom_id" => $id ,
			"classroom_name" => $tcr['classroom_name'] ,
			"classroom_name_eng" => $tcr['classroom_name_eng'] ,
			"classroom_class" => $tcr['classroom_class'] ,
			"classroom_year" => $tcr['classroom_year'] ,
			"student_num" => $tcr['student_num'] ,
			"building_id" => $tcr['building_id'] ,
			"teacher_id1" => $tcr['teacher_id1'] ,
			"teacher_id2" => $tcr['teacher_id2'] ,
			"teacher_id3" => $tcr['teacher_id3'] ,
			"building_id" => $tcr['building_id'] ,
			"term_id" => $term2 ,
			"grade_id" => $grade ,		
			"admin_id" => $aid,	
			"admin_update" => $update ,			
			"classroom_status" => 1

		);

		insert("tb_classroom_teacher", $data);

		$sql = "SELECT * FROM tb_classroom_detail WHERE classroom_t_id = '{$CT_ID}' AND classroom_detail_status='1'";
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$data = array(
				"classroom_t_id" => $C_ID ,
				"student_no" => $row['student_no'] ,	
				"student_id" => $row['student_id'] ,	
				"student_head" => $row['student_head'] ,	
				"memo" => $row['memo'] ,	
				"term_id" => $term2 ,
				"grade_id" => $grade ,	
				"admin_id" => $aid ,
				"admin_update" => $update ,
				"classroom_detail_status" => 1 ,		
			);

			insert("tb_classroom_detail", $data);

		}
		
		echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=grade_classroom_show&id=$id&check_grade=$grade';</script>";

?>