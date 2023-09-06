<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

extract($_GET);

			$sqlScor = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id = b.score_id INNER JOIN tb_course_class c ON a.course_class_id = c.course_class_id INNER JOIN tb_course_class_detail d ON c.course_class_id = d.course_class_id WHERE a.course_class_id = '{$cid}' AND b.course_class_detail_id = '{$cdid}' AND  a.teacher_id = '{$tid}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2'";

			//echo $sqlScor;
			$cc = result_array($sqlScor);

			if(count($cc) == 0) {

					$course_class_id = $row['course_class_id'];

					$sqlCou = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id WHERE a.course_class_id = '{$cid}' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' AND a.course_class_status='1'";

					//echo $sqlCou;
					$rowCou = row_array($sqlCou);

					$score_max = $rowCou['score1_2'];

					$sqlT = "SELECT *,MAX(score_id) AS ID FROM tb_score";
					$tcrT = row_array($sqlT);

					$SS_ID = $tcrT['ID'] + 1;

					$data3 = array(
						"score_id" => $SS_ID ,
						"course_class_id" =>  $cid,
						"score_name" =>  "คะแนนสอบ",
						//"score_name_eng" => "Test Score" ,
						"term_id" => $check_term ,
						"grade_id" => $check_grade ,	
						"teacher_id" => $tid ,	
						"score_max" => $score_max,			
						"score_type" => 2,					
						"score_status" => 1

					);

					insert("tb_score", $data3);

					$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_class_detail b ON a.course_class_id=b.course_class_id WHERE a.course_class_id = '{$cid}' AND subject_id = '{$sid}' AND (b.teacher_id1 = '{$tid}' OR b.teacher_id2 = '{$tid}') AND a.course_s_status='1'";
					$list = result_array($sql); 

					foreach ($list as $key => $row) { 

					$course_s_id = $row['course_s_id'];
					$course_class_detail_id = $row['course_class_detail_id'];

					$data4 = array(
						"score_id" => $SS_ID ,
						"course_s_id" => $course_s_id ,
						"course_class_detail_id" => $course_class_detail_id ,	
						"score1" => "" ,	
						"score2" => "" ,	
						"score" => 0 ,	
						"result" => "" ,	
						"score_type" => 2,
						"score_detail_status" => 1 ,		
					);

					insert("tb_score_detail", $data4);
				}
			}

    echo "<meta charset='utf-8'/><script>location.href='../?modules=teach_show_detail&id=$sid&idd=$idd&tid=$tid&cid=$cid&clid=$clid&check_grade=$check_grade&check_term=$check_term';</script>";

?>
