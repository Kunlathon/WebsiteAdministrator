<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

extract($_POST);

$exam_no = 1;

$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id  INNER JOIN tb_score_detail d ON a.score_id=d.score_id INNER JOIN tb_course_class_detail c ON d.course_class_detail_id=c.course_class_detail_id WHERE d.course_class_detail_id='{$coursedetail}' AND c.subject_id='{$sid}' AND a.teacher_id = '{$tid}' AND b.classroom_t_id = '{$clid}' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='$type' AND a.score_status='1'  AND b.course_class_type='$typec' AND d.course_class_level_id = '$courseclasslevel' GROUP BY a.score_id ASC";

//echo "$sqlSco<br><br>";
$rowSco = row_array($sqlSco);
$courseclasslevel=$rowSco['course_class_level_id'];
$scoreid = $rowSco['score_id'];

//echo "$courseclasslevel-$rowSco[score_id]<br>";

$count = count($id);

for($i=0;$i<$count;$i++){

    $sql = "SELECT * FROM tb_score_detail WHERE score_detail_id = {$id[$i]} AND course_class_detail_id='$coursedetail' AND course_class_level_id='$courseclasslevel'";
    $data = row_array($sql);

	$scores[$i] = $score[$i];

}
	$ii = 0;

	//$sqlScoC = "SELECT * FROM tb_score_detail WHERE score_id = '{$scoreid}' AND course_class_detail_id='$coursedetail' AND course_class_level_id='$courseclasslevel' ORDER BY score_detail_id ASC";

	$sqlScoC = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id WHERE a.score_id = '{$scoreid}' AND a.subject_id = '{$sid}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id = '{$clid}' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='$type' AND a.score_status='1' ORDER BY b.score_detail_id ASC";

	//echo "$sqlScoC<br><br>";
	$sqlScoC = result_array($sqlScoC);

	foreach ($sqlScoC as $_sqlScoC) { 

		$score_detail_id = $_sqlScoC['score_detail_id'];

		//echo "$score_detail_id-$ii-$scores[$ii]<br>";

		$data = array(
				"score" => $scores[$ii]
		);

		update("tb_score_detail", $data, "score_detail_id = '$score_detail_id' AND course_class_detail_id='$coursedetail' AND course_class_level_id='$courseclasslevel'");

	$ii++;
	}



    echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";
	
	//echo "<meta charset='utf-8'/><script>location.href='../?modules=check_subject_teach_detail2&id=$sid&idd=$idd&tid=$tid&cdid=$cdid&cid=$cid&rid=$clid&exam_no=$exam_no&typec=$typec&check_term=$check_term&check_grade=$check_grade';</script>";

?>
