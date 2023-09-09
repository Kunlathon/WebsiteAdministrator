<?php
include ("../../config/connect.ini.php");
include ("../../config/fnc.php");

check_login('admin_username_lcm','login.php');

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

    echo "<meta charset='utf-8'/><script>location.href='../../?modules=teach_show_detail&id=$sid&idd=$idd&tid=$tid&exam_no=$exam_no&clid=$clid&typec=$typec&check_grade=$check_grade&check_term=$check_term';</script>";

?>
