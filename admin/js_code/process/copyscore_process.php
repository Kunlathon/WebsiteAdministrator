<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$sqlCT = "SELECT * FROM tb_term a INNER JOIN tb_course_class b ON a.term_id = b.term_id WHERE a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' AND b.course_class_id = '{$cid}' AND b.course_class_status = '1' ORDER BY b.course_class_name ASC";

//echo "$sqlCT<br>";
$rowCT = row_array($sqlCT);

$course_type = $rowCT['course_class_type'];


$sql = "SELECT * , b.teacher_id1 AS T1 , b.teacher_id2 AS T2 FROM tb_course_class_detail a INNER JOIN tb_course_class_level b ON a.course_class_detail_id=b.course_class_detail_id WHERE a.course_class_detail_id='{$cdid}' AND a.subject_id='{$subjectid}' AND b.teacher_id1='$tid' AND b.course_class_level_status='1'  ORDER BY b.course_class_level_name ASC";
							
//echo "$sql<br>";
$row = row_array($sql);


	$course_class_detail_id = $row['course_class_detail_id'];
	$course_class_level_id = $row['course_class_level_id'];

	if(($row['T1'] != "" || $row['T1'] != "0") && ($row['T2'] == "" || $row['T2'] == "0")) {		

	
	//echo "$row[teacher_id1] - <br>$row[teacher_id2] - ";
	//echo " $row[T1] - <br>$row[T2] - ";

		$tid = $row['T1'];

		$sql = "SELECT * FROM tb_score WHERE course_class_id='{$cid}' AND classroom_t_id ='{$rid}' AND teacher_id='{$tid}' AND subject_id='{$subjectid}' AND score_no='{$exam_no}' AND grade_id='{$check_grade}' AND term_id='{$check_term}'";

		//$sql = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id WHERE a.course_class_id='{$cid}' AND a.classroom_t_id ='{$rid}' AND a.teacher_id='{$tid}' AND a.score_no = '{$exam_no}' AND a.grade_id='{$check_grade}' AND a.term_id='{$check_term}' AND b.course_class_detail_id='{$course_class_detail_id}'  AND b.course_class_level_id='{$course_class_level_id}' ";

		//$sql = "SELECT * FROM tb_score WHERE course_class_id='{$cid}' AND classroom_t_id ='{$rid}' AND teacher_id='{$tid}' AND grade_id='{$check_grade}' AND term_id='{$check_term}'";

		//echo "$sql<br>";
		$list = result_array($sql); 

		foreach ($list as $key => $row) { 

			$score_id = $row['score_id'];
			//echo $score_id;

			$sqlSc = "SELECT *,MAX(score_id) AS ID FROM tb_score";
			$tcrSc = row_array($sqlSc);

			$SC_ID = $tcrSc['ID'] + 1;

			$data1 = array(
				"score_id" => $SC_ID ,
				"course_class_id" => $row['course_class_id'] ,
				"classroom_t_id" =>  $row['classroom_t_id'] ,
				"score_name" =>  $row['score_name'] ,
				"score_name_eng" => $row['score_name_eng'] ,
				"term_id" => $row['term_id'] ,
				"grade_id" => $row['grade_id'] ,
				"teacher_id" => $row['teacher_id'] ,
				"subject_id" => $subj_id ,				
				"score_max" => $row['score_max'] ,
				"score_no" => $row['score_no'] ,
				"score_exam" => $row['score_exam'] ,
				"score_memo" => $row['score_memo'] ,
				"admin_id" => $row['admin_id'] ,
				"admin_update" => $row['admin_update'] ,
				"teacher__id" => $row['teacher__id'] ,
				"teacher__update" => $row['teacher__update'] ,	
				"score_type" => $row['score_type'] ,		
				"score_lock" => $row['score_lock'] ,			
				"teacher_check" => $row['teacher_check'] ,	
				"check_status" => $row['check_status'] ,		
				"check_date" => $row['check_date'] ,	
				"score_status" => $row['score_status'] 

			);

			insert("tb_score", $data1);

			$sql3 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id = c.course_class_detail_id INNER JOIN tb_subject d ON b.subject_id = d.subject_id WHERE a.course_class_id='{$cid}' AND b.subject_id = '{$subj_id}' AND c.teacher_id1 = '$tid' AND a.classroom_t_id='$rid' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  b.course_class_detail_status='1'";

			//echo "$sql3<br>";
			$row3 = row_array($sql3);

			$course_class_detail_id = $row3['course_class_detail_id'];
			$course_class_level_id = $row3['course_class_level_id'];

			$sql2 = "SELECT * FROM tb_score_detail WHERE score_id = '{$score_id}' AND score_detail_status='1'";
			//echo "$sql2<br>";
			$list2 = result_array($sql2);

			foreach ($list2 as $key => $row2) { 

				$data2 = array(
						"score_id" => $SC_ID ,
						"course_s_id" => $row2['course_s_id'],
						"student_id" => $row2['student_id'] ,	
						"course_class_detail_id" => $course_class_detail_id ,
						"course_class_level_id" => $course_class_level_id ,
						"score1" => $row2['score1'] ,	
						"score2" => $row2['score2'] ,	
						"score" => $row2['score'] ,	
						"result" => $row2['result'] ,	
						"score_type" => $row2['score_type'] ,	
						"score_detail_status" => $row2['score_detail_status'] ,	
						"memo" => $row2['memo'] ,
						"admin_id" => $row2['admin_id'] ,
						"admin_update" => $row2['admin_update'] ,
						"teacher__id" => $row2['teacher__id'] ,
						"teacher__update" => $row2['teacher__update'] 

				);

				insert("tb_score_detail", $data2);
			}

		}

		//echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=check_subject_teach_detail2&id=$id&idd=$idd&tid=$tid&cdid=$cdid&cid=$cid&rid=$rid&exam_no=$exam_no&typec=$typec&check_term=$check_term&check_grade=$check_grade';</script>";

		echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";


	} else if(($row['T1'] != "" || $row['T1'] != "0") && ($row['T2'] != "" || $row['T2'] != "0")) {	

		$tid = $row['T2'];

		$sql = "SELECT * FROM tb_score WHERE course_class_id='{$cid}' AND classroom_t_id ='{$rid}' AND teacher_id='{$tid}' AND subject_id='{$subjectid}' AND score_no='{$exam_no}' AND grade_id='{$check_grade}' AND term_id='{$check_term}'";

		//$sql = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id WHERE a.course_class_id='{$cid}' AND a.classroom_t_id ='{$rid}' AND a.teacher_id='{$tid}' AND a.score_no = '{$exam_no}' AND a.grade_id='{$check_grade}' AND a.term_id='{$check_term}' AND b.course_class_detail_id='{$course_class_detail_id}'  AND b.course_class_level_id='{$course_class_level_id}' ";

		//$sql = "SELECT * FROM tb_score WHERE course_class_id='{$cid}' AND classroom_t_id ='{$rid}' AND teacher_id='{$tid}' AND grade_id='{$check_grade}' AND term_id='{$check_term}'";

		//echo "$sql<br>";
		$list = result_array($sql); 

		foreach ($list as $key => $row) { 

			$score_id = $row['score_id'];
			//echo $score_id;

			$sqlSc = "SELECT *,MAX(score_id) AS ID FROM tb_score";
			$tcrSc = row_array($sqlSc);

			$SC_ID = $tcrSc['ID'] + 1;

			$data1 = array(
				"score_id" => $SC_ID ,
				"course_class_id" => $row['course_class_id'] ,
				"classroom_t_id" =>  $row['classroom_t_id'] ,
				"score_name" =>  $row['score_name'] ,
				"score_name_eng" => $row['score_name_eng'] ,
				"term_id" => $row['term_id'] ,
				"grade_id" => $row['grade_id'] ,
				"teacher_id" => $row['teacher_id'] ,
				"subject_id" => $subj_id ,				
				"score_max" => $row['score_max'] ,
				"score_no" => $row['score_no'] ,
				"score_exam" => $row['score_exam'] ,
				"memo" => $row['memo'] ,
				"admin_id" => $row['admin_id'] ,
				"admin_update" => $row['admin_update'] ,
				"teacher__id" => $row['teacher__id'] ,
				"teacher__update" => $row['teacher__update'] ,	
				"score_type" => $row['score_type'] ,		
				"score_lock" => $row['score_lock'] ,			
				"teacher_check" => $row['teacher_check'] ,	
				"check_status" => $row['check_status'] ,		
				"check_date" => $row['check_date'] ,	
				"score_status" => $row['score_status'] 

			);

			insert("tb_score", $data1);

			$sql3 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id = c.course_class_detail_id INNER JOIN tb_subject d ON b.subject_id = d.subject_id WHERE a.course_class_id='{$cid}' AND b.subject_id = '{$subj_id}' AND c.teacher_id1 = '$tid' AND a.classroom_t_id='$rid' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  b.course_class_detail_status='1'";

			//echo "$sql3<br>";
			$row3 = row_array($sql3);

			$course_class_detail_id = $row3['course_class_detail_id'];
			$course_class_level_id = $row3['course_class_level_id'];

			$sql2 = "SELECT * FROM tb_score_detail WHERE score_id = '{$score_id}' AND score_detail_status='1'";
			//echo "$sql2<br>";
			$list2 = result_array($sql2);

			foreach ($list2 as $key => $row2) { 

				$data2 = array(
						"score_id" => $SC_ID ,
						"course_s_id" => $row2['course_s_id'],
						"student_id" => $row2['student_id'] ,	
						"course_class_detail_id" => $course_class_detail_id ,
						"course_class_level_id" => $course_class_level_id ,
						"score1" => $row2['score1'] ,	
						"score2" => $row2['score2'] ,	
						"score" => $row2['score'] ,	
						"result" => $row2['result'] ,	
						"score_type" => $row2['score_type'] ,	
						"score_detail_status" => $row2['score_detail_status'] ,	
						"memo" => $row2['memo'] ,
						"admin_id" => $row2['admin_id'] ,
						"admin_update" => $row2['admin_update'] ,
						"teacher__id" => $row2['teacher__id'] ,
						"teacher__update" => $row2['teacher__update'] 

				);

				insert("tb_score_detail", $data2);
			}

		}

		//echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=check_subject_teach_detail2&id=$id&idd=$idd&tid=$tid&cdid=$cdid&cid=$cid&rid=$rid&exam_no=$exam_no&typec=$typec&check_term=$check_term&check_grade=$check_grade';</script>";

		echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";
	}


?>
