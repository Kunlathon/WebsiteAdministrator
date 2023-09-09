<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$date_update = date('Y-m-d H:i:s');

// Update Course_Student
$sql = "SELECT * FROM tb_course_student WHERE course_class_id = '{$id}' AND term_id='$check_term' AND grade_id='$check_grade' AND student_id='$stuid'";
$list = result_array($sql);

foreach ($list as $key => $row) {

	$csid = $row['course_s_id'];

			$sqlCs = "SELECT * FROM tb_course_student_detail WHERE course_s_id='{$csid}'";
			$listCs = result_array($sqlCs);

			foreach ($listCs as $key => $rowCs) {

				$cdid = $rowCs['course_s_detail_id'];

						$data1 = array(
							"admin_id" => $aid ,
							"admin_update" => $date_update ,
							"course_s_detail_status" => 0

						);

						update("tb_course_student_detail", $data1, "course_s_detail_id = '{$cdid}' AND course_s_id = '{$csid}'");

			}

				$data2 = array(
					"admin_id" => $aid ,
					"admin_update" => $date_update ,
					"course_s_status" => 0

				);

				update("tb_course_student", $data2, "student_id = '{$csid}'");

}

// Move Course_Student
function fnc_count($course_new,$check_term,$check_grade,$stuid)   
{
    $s = "SELECT * FROM tb_course_student WHERE course_class_id = '$course_new' AND term_id='$check_term' AND grade_id='$check_grade' AND student_id='$stuid' AND course_s_status='1'";
	echo 
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}


$check = fnc_count($course_new,$check_term,$check_grade,$stuid);
	
	if ($check) {

		$sqlT = "SELECT *,MAX(course_s_id) AS SID FROM tb_course_student";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['SID'] + 1;

		$sql = "SELECT * FROM tb_course_class WHERE course_class_id='{$course_new}'";
		$tcr = row_array($sql);

		$course_new_id = $tcr['course_class_id'];

		$data = array(
			"course_s_id" => $C_ID ,
			"course_class_id" => $course_new_id ,
			"term_id" => $check_term ,
			"grade_id" => $check_grade ,
			"student_id" => $stuid ,
			"memo" => $memo ,
			"admin_id" => $aid ,
			"admin_update" => $date_update ,
			"course_s_status" => 1 ,		

		);

		insert("tb_course_student", $data);

		//check Course
		$sqlSco1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$course_new_id' AND c.subt_id != '4' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";
		//echo $sqlSco1;
		$rowSco1 = result_array($sqlSco1); 

		foreach ($rowSco1 as $key => $_rowSco1) { 

				$cc_id = $_rowSco1['course_class_id'];
				$cd_id = $_rowSco1['course_class_detail_id'];
				$cl_id = $_rowSco1['course_class_level_id'];
				$sj_id = $_rowSco1['subject_id'];			
				$c_t_id = $_rowSco1['classroom_t_id'];	
				
				$sqlClass = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id WHERE a.classroom_t_id = '{$c_t_id}'";

				$rowClass = result_array($sqlClass); 

				foreach ($rowClass as $key => $_rowClass) { 

					$sql_1 = "SELECT * , COUNT(b.course_s_detail_id) AS NUM FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id' AND a.student_id = '$_rowClass[student_id]' AND b.course_class_detail_id = '$cd_id' AND b.course_class_level_id = '$cl_id' AND c.subject_id = '$sj_id'";
					
					//echo $sql_1;
					$row_1 = row_array($sql_1);

					$number = $row_1['NUM'];

					if($number > 0){

					} else if($number == 0){

						$sql = "SELECT * FROM tb_course_class_level WHERE course_class_level_id = '$cl_id'";
						$row = row_array($sql); 

						$cdid = $row['course_class_detail_id'];
						$clid = $row['course_class_level_id'];

						$sqlCou = "SELECT * FROM tb_course_student WHERE course_class_id = '$cc_id'";
					
						//echo $sqlCou;
						$rowCou = result_array($sqlCou); 

						foreach ($rowCou as $key => $_rowCou) { 

							$csid = $_rowCou['course_s_id'];					

									$data3 = array(
										"course_s_id" => $csid ,
										"course_class_detail_id" =>  $cdid,
										"course_class_level_id" =>  $clid,			
										"course_class_level_check" =>  0,	
										"score1" =>  0,	
										"score2" =>  0,	
										"score" =>  0,	
										"admin_id" => $aid ,
										"admin_update" => $date_update ,
										"course_s_detail_status" => 1

									);

									insert("tb_course_student_detail", $data3);
						}
					}

				}

		}		

		$sqlCT = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$c_t_id}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ORDER BY classroom_t_id DESC";
		$rowCT = row_array($sqlCT); 

		$classroom = $rowCT['classroom_id'];	


		$data4 = array(
			"student_class" => $classroom ,	
			"admin_id" => $aid ,
			"admin_update" => $date_update ,
				
		);

		update("tb_student", $data4, "student_id = '{$stuid}'");

		echo "<meta charset='utf-8'/><script>alert('ย้ายข้อมูลสำเร็จ!!');location.href='../?modules=course_data_class&id=$rid&check_term=$check_term&check_grade=$check_grade';</script>";
	
	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

?>