<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

		$sqlT = "SELECT *,MAX(course_id) AS ID , MAX(course_sort) AS SORT FROM tb_course";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;
		$C_SORT = $tcrT['SORT'] + 1;

		$sql = "SELECT * FROM tb_course WHERE course_id='{$id}'";
		$tcr = row_array($sql);

		$data1 = array(
			"course_id" => $C_ID ,
			"course_name" =>  $name,
			"course_name_eng" => $tcr['course_name_eng'] ,
			"grade_id" => $grade ,	
			"course_year" => $tcr['course_year'] ,				
			"memo" => $tcr['memo'] ,			
			"course_sort" => $C_SORT ,	
			"admin_id" => $aid,	
			"admin_update" => $update,
			"course_status" => 1

		);

		insert("tb_course", $data1);

		$sql = "SELECT * FROM tb_course_detail WHERE course_id = '{$id}' AND course_detail_status='1'";
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$courseD = $row['course_detail_id'];

			$sqlD = "SELECT *,MAX(course_detail_id) AS DID FROM tb_course_detail";
			$tcrD = row_array($sqlD);

			$D_ID = $tcrD['DID'] + 1;

			$data2 = array(
				"course_detail_id" => $D_ID ,
				"course_id" => $C_ID ,
				"subject_id" => $row['subject_id'] ,	
				"subject_code" => $row['subject_code'] ,	
				"subject_name" => $row['subject_name'] ,	
				"subject_name_eng" => $row['subject_name_eng'] ,	
				"unit" => $row['unit'] ,					
				"weight" => $row['weight'] ,	
				"subt_id" => $row['subt_id'] ,	
				"grade_id" => $row['grade_id'] ,
				"subject_sort" => $row['subject_sort'] ,	
				"subject_catagory" => $row['subject_catagory'] ,
				"teacher_id1" => $row['teacher_id1'] ,	
				"rate1" => $row['rate1'] ,	
				"teacher_id2" => $row['teacher_id2'] ,	
				"rate2" => $row['rate2'] ,	
				"teacher_id3" => $row['teacher_id3'] ,	
				"rate3" => $row['rate3'] ,	
				"sort" => $row['sort'] ,	
				"admin_id" => $aid ,
				"admin_update" => $update,
				"course_detail_status" => 1 ,		
			);

			insert("tb_course_detail", $data2);

			$sql = "SELECT * FROM tb_course_level WHERE course_detail_id = '{$courseD}' AND course_level_status='1'";
			$list = result_array($sql);

			foreach ($list as $key => $row) { 

				$data3 = array(
					"course_detail_id" => $D_ID ,
					"course_level_name" => $row['course_level_name'] ,	
					"teacher_id1" => $row['teacher_id1'] ,	
					"rate1" => $row['rate1'] ,	
					"teacher_id2" => $row['teacher_id2'] ,	
					"rate2" => $row['rate2'] ,	
					"teacher_id3" => $row['teacher_id3'] ,	
					"rate3" => $row['rate3'] ,	
					"sort" => $row['sort'] ,	
					"admin_id" => $aid ,
					"admin_update" => $update,
					"course_level_status" => 1 ,		
				);

				insert("tb_course_level", $data3);

			}

		}
			
		echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=course_data&id=$grade';</script>";

?>