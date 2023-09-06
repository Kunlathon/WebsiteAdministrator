<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

extract($_POST);

$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class c ON a.course_class_id=c.course_class_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE b.score_detail_id='{$id}'";
$rowSco = row_array($sqlSco); 

if($rowSco['score_max'] >= $unit){

    if($unit < 0){
        echo"<meta charset='utf-8'/><script>alert('จำนวนต้องมากกว่า 0!!');window.location.href = document.referrer;</script>";
        die();
    }

	$_sqlScor = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_teacher c ON a.teacher_id=c.teacher_id WHERE b.score_detail_id='{$id}'";
	$_rowScor = row_array($_sqlScor); 

	$data = array(
			"score" => $unit
    );

	update("tb_score_detail", $data, "score_detail_id = '{$id}'");

	echo "<meta charset='utf-8'/><script>window.location.href = document.referrer;</script>";

    //echo "<meta charset='utf-8'/><script>location.href='../?modules=check_subject_teach_detail2&id=$rowSco[subject_id]&idd=$rowSco[teacher_type]&tid=$rowSco[teacher_id]&cid=$rowSco[course_class_id]&clid=$rowSco[classroom_id]&check_grade=$rowSco[grade_id]&check_term=$rowSco[term_id]';</script>";

}else{
    echo"<meta charset='utf-8'/><script>alert('คะแนนเต็ม {$rowSco['score_max']} เท่านั้นค่ะ!!');window.location.href = document.referrer;</script>";
    die();
}

?>
