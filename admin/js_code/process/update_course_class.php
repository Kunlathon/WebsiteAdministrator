<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_lcm','login.php');

extract($_GET);

		$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_class b ON a.course_class_id=b.course_class_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.course_class_id = '{$cid}' AND c.subject_id = '{$sid}' AND a.course_s_status='1'";
		$list = result_array($sql); 

				foreach ($list as $key => $row) { 

					$course_s_id1 = $row['course_s_id'];
					$ccid = $row['course_class_detail_id'];

					$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id WHERE a.score_id='{$id}' AND a.course_class_id = '{$cid}' AND b.course_class_detail_id = '{$ccid}' AND a.score_type='$type' AND b.course_s_id = '$course_s_id1'";
					$_rowSco = result_array($sqlSco);

					$count = count($_rowSco);

					if($count==0) {

						$data = array(
							"score_id" => $id ,
							"course_s_id" => $course_s_id1 ,
							"course_class_detail_id" => $ccid ,	
							"score1" => "" ,	
							"score2" => "" ,	
							"score" => 0 ,	
							"result" => "" ,	
							"score_type" => $type,
							"score_detail_status" => 1 ,		
						);

						insert("tb_score_detail", $data);
					}
				}

    echo "<meta charset='utf-8'/><script>location.href='../?modules=teach_show_detail&id=$sid&idd=$idd&tid=$tid&cid=$cid&clid=$clid&check_grade=$check_grade&check_term=$check_term';</script>";

?>
