<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

extract($_POST);

$count = count($id);

for($i=0;$i<$count;$i++){

    $sql = "SELECT * FROM tb_score_detail WHERE score_detail_id = {$id[$i]} AND course_class_detail_id='$coursedetail' AND course_class_level_id='$courseclasslevel'";
    $data = row_array($sql);

	$data = array(
			"score" => $score[$i]
	);

    update("tb_score_detail", $data, "score_detail_id = '{$id[$i]}' AND course_class_detail_id='$coursedetail' AND course_class_level_id='$courseclasslevel'");

}

    echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";
	
	//echo "<meta charset='utf-8'/><script>location.href='../?modules=check_subject_teach_detail2&id=$sid&idd=$idd&tid=$tid&cdid=$cdid&cid=$cid&rid=$clid&exam_no=$exam_no&typec=$typec&check_term=$check_term&check_grade=$check_grade';</script>";

?>
