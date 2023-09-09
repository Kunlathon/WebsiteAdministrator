<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_lcm','login.php');

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$sql = "SELECT * FROM tb_classroom_teacher ORDER BY classroom_t_id ASC";
//echo "$sql<br>";
$list = result_array($sql); 

foreach ($list as $row) {

	$classroomtid = $row['classroom_t_id'];
	$name = $row['classroom_name'];
	$ename = $row['classroom_name_eng'];
	$cyear = $row['classroom_year'];

	$teacher1= $row['teacher_id1'];
	$position1 = $row['position_id1'];
	$teacher2 = $row['teacher_id2'];
	$teacher3 = $row['teacher_id3'];

	$teacher_esl = "";

	$term = $row['term_id'];

	$grade = $row['grade_id'];

	$sqlAss = "SELECT * FROM tb_assessment_classroom WHERE classroom_t_id = '{$classroomtid}'";
	//echo "$sqlAss<br>";
	$resultAss = row_array($sqlAss);

	if($resultAss > 0){

	} else {

		$sqlC = "SELECT *,MAX(a_classroom_id) AS ID FROM tb_assessment_classroom";
		$tcrC = row_array($sqlC);

		$C_ID = $tcrC['ID'] + 1;

		$data1 = array(
			"a_classroom_id" => $C_ID ,
			"classroom_t_id" => $classroomtid ,
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

		insert("tb_assessment_classroom", $data1);

		$sqlAssD = "SELECT * , b.student_no AS STNO FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.term_id = '{$term}' AND a.grade_id='{$grade}' AND a.classroom_t_id='{$classroomtid}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC";

		echo "$sqlAssD<br>";
		$listAssD = result_array($sqlAssD);

		foreach ($listAssD as $key => $rowAssD) { 

		$student_id = $rowAssD['student_id'];
		$memo = "";
				
				$sqlST = "SELECT * FROM tb_student WHERE student_id = '$student_id'";
				$rowST = row_array($sqlST);

				$data2 = array(
					"a_classroom_id" => $C_ID ,
					"student_no" => $rowST['student_no'] ,
					"student_id" => $rowST['student_id'] ,
					"a_student_type" => 1 ,
					"memo" => $memo ,
					"term_id" => $term ,
					"grade_id" => $grade ,
					"admin_id" => $aid ,
					"admin_update" => $update,
					"a_classroom_detail_status" => 1 ,		

				);

				insert("tb_assessment_classroom_detail", $data2);
	}
  }
}
echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../index.php';</script>";
?>
