<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_GET);

		$sql = "SELECT * FROM tb_assessment ORDER BY assessment_sort ASC";
		$list = result_array($sql); 

		foreach ($list as $key => $row) { 

			$assessment_id = $row['assessment_id'];

			$sqlScor = "SELECT * FROM tb_assessment_classroom_detail WHERE a_classroom_id='$clid' ORDER BY a_classroom_detail_id ASC";

			//$sqlScor = "SELECT * FROM tb_assessment_classroom a INNER JOIN tb_assessment_classroom_detail b ON a.a_classroom_id = b.a_classroom_id WHERE a.a_classroom_status='1' ORDER BY a.a_classroom_id ASC";

			$listScor = result_array($sqlScor); 

			foreach ($listScor as $key => $rowScor) { 

					$data3 = array(
						"assessment_id" => $assessment_id ,
						"a_classroom_id" =>  $rowScor['a_classroom_id'],
						"student_id" =>  $rowScor['student_id'],				
						"assessment_detail_status" => 1

					);

					insert("tb_assessment_detail", $data3);

			}

		}

		echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');location.href='../?modules=assessment_classroom_data&id=$id';</script>";

?>