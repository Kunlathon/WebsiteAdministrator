<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if (empty($id)) {
	
		$sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$classroomid' AND grade_id='$grade' AND term_id='$term'";
		$row = row_array($sql);

		$name = $row['classroom_name'];
		$ename = $row['classroom_name_eng'];

		$cyear = $row['classroom_year'];

		$data = array(
			"classroom_t_id" => $classroomid ,
			"a_classroom_name" => $name ,
			"a_classroom_name_eng" => $ename ,
			//"a_classroom_class" => $class ,
			"a_classroom_year" => $cyear ,
			//"a_student_num" => $num ,						
			//"building_id" => $building ,
			"teacher_id1" => $teacher1 ,
			"position_id1" => $position1 ,
			"teacher_id2" => $teacher2 ,
			"teacher_id3" => $teacher3 ,
			"teacher_esl" => $teacher_esl ,				
			"term_id" => $term ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"a_classroom_status" => 1
			
		);

		insert("tb_assessment_classroom", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=assessment_classroom_data&id=$grade&check_term=$term';</script>";

} else {

	$sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$classroomid' AND grade_id='$grade' AND term_id='$term'";
	$row = row_array($sql);

	$name = $row['classroom_name'];
	$ename = $row['classroom_name_eng'];

	$cyear = $row['classroom_year'];

    $data = array(
			"classroom_t_id" => $classroomid ,
			"a_classroom_name" => $name ,
			"a_classroom_name_eng" => $ename ,
			//"a_classroom_class" => $class ,
			"a_classroom_year" => $cyear ,
			//"a_student_num" => $num ,						
			//"a_building_id" => $building ,
			"teacher_id1" => $teacher1 ,
			"position_id1" => $position1 ,
			"teacher_id2" => $teacher2 ,
			"teacher_id3" => $teacher3 ,
			"teacher_esl" => $teacher_esl ,		
			"term_id" => $term ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update
    );

    update("tb_assessment_classroom", $data, "a_classroom_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=assessment_classroom_data&id=$grade&check_term=$term';</script>";

}
?>

