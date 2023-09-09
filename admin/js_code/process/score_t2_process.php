<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if($checkt==1) {
	$check_teacher = "d.teacher_id1 = '$tid'";

} else if($checkt==2) {
	$check_teacher = "d.teacher_id2 = '$tid'";

} 

$sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id = '$course_cid' AND c.teacher_id1 = '{$tid}' AND b.subject_id = '{$sid}' AND a.course_class_type='$typec' AND c.course_class_level_id = '{$cclid}'";

//$sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id = '$course_cid' AND c.teacher_id1 = '{$tid}' AND b.subject_id = '{$sid}' AND a.course_class_type='$typec'";

//echo $sql1;
//$list1 = result_array($sql1);
//foreach ($list1 as $key => $row1) {

$row1 = row_array($sql1);

		$cid = $row1['course_class_id'];
		$clid = $row1['classroom_t_id'];
		$cc_id = $row1['course_class_id'];
		$cd_id = $row1['course_class_detail_id'];
		$cl_id = $row1['course_class_level_id'];

		$sqlT = "SELECT *,MAX(score_id) AS ID FROM tb_score";
		$tcrT = row_array($sqlT);

		$S_ID = $tcrT['ID'] + 1;

		$data1 = array(
			"score_id" => $S_ID ,
			"course_class_id" =>  $cid,
			"classroom_t_id" =>  $clid,
			"score_name" =>  $name,
			//"score_name_eng" => $ename ,
			"term_id" => $term ,
			"grade_id" => $grade ,	
			"teacher_id" => $tid ,	
			"subject_id" => $sid ,
			"score_max" => $unit,		
			"score_no" => $exam_no,	
			"admin_id" => $aid ,
			"admin_update" => $update ,
			"score_type" => 1,			
			"score_lock" => 0,	
			"score_status" => 1		

		);

		insert("tb_score", $data1);

		$sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND c.teacher_id1 = '{$tid}' AND a.classroom_t_id='$clid' AND b.subject_id = '{$sid}' AND a.course_class_type='$typec' AND c.course_class_level_id = '{$cclid}'";

		//echo $sql1;
		$list1 = result_array($sql1);
		foreach ($list1 as $key => $row1) {

		$cc_id = $row1['course_class_id'];
		$cd_id = $row1['course_class_detail_id'];
		$cl_id = $row1['course_class_level_id'];

		$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id = '{$cc_id}' AND b.course_class_detail_id = '{$cd_id}' AND b.course_class_level_id = '{$cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') ORDER BY c.student_class ASC , c.student_no ASC";

		//$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_class b ON a.course_class_id = b.course_class_id INNER JOIN tb_student c ON a.student_id = c.student_id INNER JOIN tb_course_class_detail d ON b.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON d.course_class_detail_id=e.course_class_detail_id INNER JOIN tb_course_student_detail f ON e.course_class_level_id=f.course_class_level_id WHERE a.course_class_id = '$course_cid' AND b.classroom_t_id='{$clid}' AND e.teacher_id1 = '{$tid}' AND d.subject_id = '{$sid}' AND a.course_s_status='1' AND f.course_class_level_check ='1' AND (c.student_no != '0' OR c.student_no != '') ORDER BY c.student_no ASC";

		//echo $sql;
		$list = result_array($sql); 

		foreach ($list as $key => $row) { 

			$course_s_id = $row['course_s_id'];
			$student_id = $row['student_id'];
			//$cid = $row['course_class_id'];
			$course_class_detail_id = $row['course_class_detail_id'];
			$course_class_level_id = $row['course_class_level_id'];

			$data2 = array(
				"score_id" => $S_ID ,
				"course_s_id" => $course_s_id ,
				"student_id" => $student_id ,
				"course_class_detail_id" => $course_class_detail_id ,	
				"course_class_level_id" => $course_class_level_id ,	
				"score1" => "" ,	
				"score2" => "" ,	
				"score" => 0 ,	
				"result" => "" ,	
				"score_type" => 1,
				"score_detail_status" => 1	,
				"admin_id" => $aid ,
				"admin_update" => $update
			);

			insert("tb_score_detail", $data2);
		}

			$sqlScor2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id = b.score_id WHERE a.course_class_id = '{$course_cid}' AND a.classroom_t_id='{$clid}' AND a.term_id = '{$term}' AND a.grade_id = '{$grade}' AND a.subject_id = '{$sid}' AND a.teacher_id = '{$tid}' AND a.score_type='2' AND a.score_no = '$exam_no' AND a.score_status='1' AND b.course_s_id = '$course_s_id' AND b.course_class_detail_id = '$course_class_detail_id' AND b.course_class_level_id='$course_class_level_id' AND b.score_type='2' ";

			//$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id = '{$cc_id}' AND b.course_class_detail_id = '{$cd_id}' AND b.course_class_level_id = '{$cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') ORDER BY c.student_class ASC , c.student_no ASC";			

			$cc2 = result_array($sqlScor2);

			//$ccc = count($cc2);

			//echo "$sqlScor2 $ccc<br>";

			if(count($cc2) == 0) {

					$sqlCou = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id = '{$cid}' AND a.classroom_t_id = '{$clid}' AND a.term_id = '{$term}' AND a.grade_id = '{$grade}' AND a.course_class_status='1' AND c.teacher_id1 = '{$tid}' AND c.course_class_level_id = '{$cclid}'";

					$rowCou = row_array($sqlCou);

					$score_max = $rowCou['score1_2'];
					//$score_max = $rowCou['score2_2'];

					$SS_ID = $S_ID + 1;

					$data3 = array(
						"score_id" => $SS_ID ,
						"course_class_id" =>  $cid,
						"classroom_t_id" =>  $clid,
						"score_name" =>  "คะแนนสอบ",
						//"score_name_eng" => "Test Score" ,
						"term_id" => $term ,
						"grade_id" => $grade ,	
						"teacher_id" => $tid ,	
						"subject_id" => $sid ,
						"score_max" => $score_max,			
						"score_no" => $exam_no,	
						"admin_id" => $aid ,
						"admin_update" => $update ,
						"score_type" => 2,				
						"score_lock" => 0,	
						"score_status" => 1

					);

					insert("tb_score", $data3);

					//$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_class b ON a.course_class_id = b.course_class_id INNER JOIN tb_student c ON a.student_id = c.student_id INNER JOIN tb_course_class_detail d ON b.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON d.course_class_detail_id=e.course_class_detail_id INNER JOIN tb_course_student_detail f ON a.course_s_id=f.course_s_id WHERE b.classroom_t_id='{$clid}' AND e.teacher_id1 = '{$tid}' AND d.subject_id = '{$sid}' AND a.course_s_status='1' AND f.course_class_level_check ='1' ORDER BY c.student_no ASC";

					$sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND c.teacher_id1 = '{$tid}' AND a.classroom_t_id='$clid' AND b.subject_id = '{$sid}' AND a.course_class_type='$typec' AND c.course_class_level_id = '{$cclid}'";

					//echo $sql1;
					$list1 = result_array($sql1);
					foreach ($list1 as $key => $row1) {

					$cc_id = $row1['course_class_id'];
					$cd_id = $row1['course_class_detail_id'];
					$cl_id = $row1['course_class_level_id'];

					$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id = '{$cc_id}' AND b.course_class_detail_id = '{$cd_id}' AND b.course_class_level_id = '{$cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') ORDER BY c.student_class ASC , c.student_no ASC";

					$list = result_array($sql); 

					foreach ($list as $key => $row) { 

					$course_s_id = $row['course_s_id'];
					$student_id = $row['student_id'];
					$course_class_detail_id = $row['course_class_detail_id'];
					$course_class_level_id = $row['course_class_level_id'];

						$data4 = array(
							"score_id" => $SS_ID ,
							"course_s_id" => $course_s_id ,
							"student_id" => $student_id ,
							"course_class_detail_id" => $course_class_detail_id ,	
							"course_class_level_id" => $course_class_level_id ,	
							"score1" => "" ,	
							"score2" => "" ,	
							"score" => 0 ,	
							"result" => "" ,	
							"score_type" => 2,
							"score_detail_status" => 1 ,
							"admin_id" => $aid ,
							"admin_update" => $update

						);

						insert("tb_score_detail", $data4);
					}
			}

		}

		}

		//echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";

		echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');location.href='../?modules=teach_show_detail&id=$sid&idd=$idd&tid=$tid&exam_no=$exam_no&clid=$clid&typec=$typec&check_grade=$grade&check_term=$term';</script>";

//}

?>