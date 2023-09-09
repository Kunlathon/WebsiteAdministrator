<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

	$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id WHERE a.course_class_id = '$id' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC";
	$row = result_array($sql);

	foreach ($row as $_row) { 

		$sqlSco_1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$id' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";
		$rowSco_1 = result_array($sqlSco_1);

		foreach ($rowSco_1 as $_rowSco_1) { 

			$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.course_class_id='{$id}' AND a.course_s_status='1' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC"; 
			$list = result_array($sql);

			foreach ($list as $key => $row) { 

				$stuid = $row['student_id'];

				$sqlSco1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$id' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

				//echo $sqlSco1;
				$rowSco1 = result_array($sqlSco1);

				foreach ($rowSco1 as $_rowSco1) { 

					$cc_id = $_rowSco1['course_class_id'];
					$cd_id = $_rowSco1['course_class_detail_id'];
					$cl_id = $_rowSco1['course_class_level_id'];
					$sj_id = $_rowSco1['subject_id'];		

					$sql_1 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id' AND a.student_id = '$row[student_id]' AND b.course_class_detail_id = '$cd_id' AND b.course_class_level_id = '$cl_id' AND c.subject_id = '$sj_id' ORDER BY b.course_class_level_id ASC";

					//echo $sql_1;
					$row_1 = row_array($sql_1);

					$class_level_check = $row_1['course_class_level_check'];


					$sql_s = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$courseid' AND a.student_id = '$stuid' AND c.subject_id = '$sj_id' ORDER BY b.course_class_level_id ASC";
					$row_s = row_array($sql_s);

					$course_s1 = $row_s['course_s_id'];
					$course_class_detail1 = $row_s['course_class_detail_id'];
					$course_class_level1 = $row_s['course_class_level_id'];
					

						$data = array(
							"course_class_level_check" => $class_level_check ,
							"admin_id" => $aid,		
							"admin_update" => $update	
						);

						update("tb_course_student_detail", $data, "course_s_id = '{$course_s1}' AND course_class_detail_id = '{$course_class_detail1}' AND course_class_level_id = '{$course_class_level1}'");


				}

			}

		}

	}

	/*$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.course_class_id='{$id}' AND a.course_s_status='1' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC"; 
	$list = result_array($sql);

	foreach ($list as $key => $row) {


		$sqlSco1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$id' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

		//echo $sqlSco1;
		$rowSco1 = result_array($sqlSco1);

		foreach ($rowSco1 as $_rowSco1) { 

		 $cc_id = $_rowSco1['course_class_id'];
		 $cd_id = $_rowSco1['course_class_detail_id'];
		 $cl_id = $_rowSco1['course_class_level_id'];
		 $sj_id = $_rowSco1['subject_id']; 

		 $sql_1 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id' AND a.student_id = '$row[student_id]' AND b.course_class_detail_id = '$cd_id' AND b.course_class_level_id = '$cl_id' AND c.subject_id = '$sj_id'";
		 //echo $sql_1;
		 $row_1 = row_array($sql_1);

		 $class_level_check = $row_1['course_class_level_check'];

			$data = array(
				"course_class_level_check" => $class_level_check ,
				"admin_id" => $aid,		
				"admin_update" => $update	
			);

			update("tb_course_student_detail", $data, "course_s_id = '{$courseid}'");

		}

	
	}*/

		//echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=course_manage&id=$courseid&rid=$classroom&check_term=$term&check_grade=$grade';</script>";

?>