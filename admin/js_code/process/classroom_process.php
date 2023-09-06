<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

function fnc_count($classroomid,$teacher1,$teacher2,$term)
//function fnc_count($name,$class,$building,$teacher1,$teacher2)
{
    $s = "SELECT * FROM tb_classroom_teacher WHERE classroom_id = '$classroomid' AND teacher_id1 = '$teacher1' AND teacher_id2 = '$teacher2' AND term_id = '$term'";
	//$s = "SELECT * FROM tb_classroom WHERE classroom_name = '$name' AND classroom_class = '$class' AND building_id = '$building'  AND teacher_id1 = '$teacher1' AND teacher_id2 = '$teacher2' AND teacher_id3 = '$teacher3'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if (empty($id)) {

	$check = fnc_count($classroomid,$teacher1,$teacher2,$term);
	//$check = fnc_count($name,$class,$building,$teacher1,$teacher2);
	
	if ($check) {

		$sql = "SELECT * FROM tb_classroom WHERE classroom_id = '$classroomid'";
		$row = row_array($sql);

		$name = $row['classroom_name'];
		$ename = $row['classroom_name_eng'];

		$data = array(
			"classroom_id" => $classroomid ,
			"classroom_name" => $name ,
			"classroom_name_eng" => $ename ,
			//"classroom_name_eng" => $ename ,
			//"classroom_class" => $class ,
			//"student_num" => $num ,						
			//"building_id" => $building ,
			"teacher_id1" => $teacher1 ,
			"position_id1" => $position1 ,
			"teacher_id2" => $teacher2 ,
			"teacher_id3" => $teacher3 ,
			"term_id" => $term ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"classroom_status" => 1
			
		);

		insert("tb_classroom_teacher", $data);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=classroom_data&id=$grade&check_term=$term';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลห้องเรียนซ้ำ!!');window.history.back();</script>";
    }

} else {

	$sql = "SELECT * FROM tb_classroom WHERE classroom_id = '$classroomid'";
	$row = row_array($sql);

	$name = $row['classroom_name'];
	$ename = $row['classroom_name_eng'];

    $data = array(
			"classroom_id" => $classroomid ,
			"classroom_name" => $name ,
			"classroom_name_eng" => $ename ,
			//"classroom_name_eng" => $ename ,
			//"classroom_class" => $class ,
			//"student_num" => $num ,						
			//"building_id" => $building ,
			"teacher_id1" => $teacher1 ,
			"position_id1" => $position1 ,
			"teacher_id2" => $teacher2 ,
			"teacher_id3" => $teacher3 ,
			"term_id" => $term ,
			"grade_id" => $grade ,
			"admin_id" => $aid,
			"admin_update" => $update
    );

    update("tb_classroom_teacher", $data, "classroom_t_id = '{$id}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=classroom_data&id=$grade&check_term=$term';</script>";

}
?>

