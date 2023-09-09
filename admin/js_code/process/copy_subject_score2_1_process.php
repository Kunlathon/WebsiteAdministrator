<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$sqlCT = "SELECT * FROM tb_term a INNER JOIN tb_course_class b ON a.term_id = b.term_id WHERE a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' AND b.course_class_id = '{$cid}' AND b.course_class_status = '1' ORDER BY b.course_class_name ASC";

//echo "$sqlCT<br>";
$rowCT = row_array($sqlCT);

$course_type = $rowCT['course_class_type'];

$sql = "SELECT * , b.teacher_id1 AS T1 , b.teacher_id2 AS T2 FROM tb_course_class_detail a INNER JOIN tb_course_class_level b ON a.course_class_detail_id=b.course_class_detail_id WHERE a.course_class_detail_id='{$cdid}' AND a.subject_id='{$subjectid}' AND b.course_class_level_status='1' AND b.teacher_id1='{$tid}' AND b.course_class_level_id='{$cl_id}' ORDER BY b.course_class_level_name ASC";

						
//echo "$sql<br><br>";

$row = row_array($sql);

$course_class_detail_id = $row['course_class_detail_id'];
$course_class_level_id = $row['course_class_level_id'];
$course_class_level_name = $row['course_class_level_name'];

if(($row['T1'] != "" || $row['T1'] != "0") && ($row['T2'] == "" || $row['T2'] == "0")) {		

	
	//echo "$row[teacher_id1] - <br>$row[teacher_id2] - ";
	//echo " $row[T1] - <br>$row[T2] - ";

		$tid = $row['T1'];

		$sql = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id WHERE a.course_class_id='{$cid}' AND a.classroom_t_id ='{$rid}' AND a.teacher_id='{$tid}' AND a.score_no = '{$exam_no}' AND a.grade_id='{$check_grade}' AND a.term_id='{$check_term}' AND b.course_class_detail_id='{$course_class_detail_id}'  AND b.course_class_level_id='{$course_class_level_id}' AND a.score_type='2'";

		//echo "$sql<br>";
		$list = result_array($sql); 

		foreach ($list as $key => $row) { 

			$score_id = $row['score_id'];
			$score = $row['score'];

			$sql2 = "SELECT * FROM tb_score_detail WHERE score_id = '{$score_id}' AND score_detail_status='1'";
			$sql2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id WHERE a.course_class_id='{$cid}' AND a.classroom_t_id ='{$rid}' AND a.teacher_id='{$tid}' AND a.score_no = '{$exam_no}' AND a.grade_id='{$check_grade}' AND a.term_id='{$check_term}' AND b.course_class_detail_id='{$course_class_detail_id}'  AND b.course_class_level_id='{$course_class_level_id}' AND score_id = '{$score_id}' AND a.score_type='2'";

			//echo "$sql2<br>";
			$list2 = result_array($sql2);

			foreach ($list2 as $key => $row2) { 

				$data2 = array(
						"score" => $row2['score'] ,	
						"admin_id" => $row2['admin_id'] ,
						"admin_update" => $row2['admin_update']

				);

				update("tb_score_detail", $data2, "score_detail_id = '$score_detail_id'");

			}
		}

		echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";
		

	} else if(($row['T1'] != "" || $row['T1'] != "0") && ($row['T2'] != "" || $row['T2'] != "0")) {	

		$tid = $row['T2'];

		$sql = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id WHERE a.course_class_id='{$cid}' AND a.classroom_t_id ='{$rid}' AND a.teacher_id='{$tid}' AND a.score_no = '{$exam_no}' AND a.grade_id='{$check_grade}' AND a.term_id='{$check_term}' AND b.course_class_detail_id='{$course_class_detail_id}'  AND b.course_class_level_id='{$course_class_level_id}' AND a.score_type='2' GROUP BY a.score_id ASC";

		//echo "$sql<br>";
		$list = result_array($sql); 

		foreach ($list as $key => $row) { 

			$score_id = $row['score_id'];
			//echo $score_id;

			$sql3 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id = c.course_class_detail_id INNER JOIN tb_subject d ON b.subject_id = d.subject_id WHERE a.course_class_id='{$cid}' AND b.subject_id = '{$subj_id}' AND c.teacher_id2 = '$tid' AND a.classroom_t_id='$rid' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  b.course_class_detail_status='1'";

			//echo "$sql3<br>";
			$row3 = row_array($sql3);

			$course_class_detail_id = $row3['course_class_detail_id'];
			$course_class_level_id = $row3['course_class_level_id'];

			$sql2 = "SELECT * FROM tb_score_detail WHERE score_id = '{$score_id}' AND score_detail_status='1'";
			//echo "$sql2<br>";
			$list2 = result_array($sql2);

			foreach ($list2 as $key => $row2) { 

				$data2 = array(
						"score" => $row2['score'] ,	
						"admin_id" => $row2['admin_id'] ,
						"admin_update" => $row2['admin_update']

				);

				update("tb_score_detail", $data2, "score_detail_id = '$score_detail_id'");

			}
		}

		echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";
		
}

?>
