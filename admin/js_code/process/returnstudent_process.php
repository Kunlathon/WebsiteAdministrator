<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($username)   
{
    $s = "SELECT * FROM tb_student WHERE student_id = '$username'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if (empty($id)) {

	$check = fnc_count($username);
	
	if ($check) {

		$pass = MD5($password);

		$data = array(
			"student_id" => $username ,
			"student_idcard" => $idcard ,
			"student_no" => 0 ,			
			"student_class" => $classroom ,			
			"student_username" => $username ,
			"student_password" => $pass ,
			"student_name" => $name ,
			"student_surname" => $surname ,
			"student_name_eng" => $ename ,
			"student_surname_eng" => $esurname ,
			"nickname" => $nickname ,			
			"gender" => $gender ,	
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update ,
			"student_status" => 1
			
		);

		insert("tb_student", $data);

		//Add Classroom

		$sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade}' ORDER BY year DESC , term DESC";
		$row = row_array($sql);
		$check_term=$row['term_id'];

		$sqlT = "SELECT * FROM tb_classroom_teacher WHERE classroom_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$grade}' ORDER BY classroom_t_id DESC";
		$listT = result_array($sqlT); 

		foreach ($listT as $rowT) {

			$classroomT = $rowT['classroom_t_id'];

			$data2 = array(
				"classroom_t_id" => $classroomT ,
				"student_no" => 0 ,	
				"student_id" => $username ,
				"term_id" => $check_term ,
				"grade_id" => $grade ,
				"admin_id" => $aid ,
				"admin_update" => $update ,
				"classroom_detail_status" => 1	

			);

			insert("tb_classroom_detail", $data2);
		}

		//Add Assessment

		$data3 = array(
			"a_classroom_id" => $classroom ,
			"student_no" => 0 ,	
			"student_id" => $username ,
			"a_classroom_detail_status" => 1

		);

		insert("tb_assessment_classroom_detail", $data3);

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=student_data';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

} else {

if($status==2){

	$dateout = date('Y-m-d');

    $data = array(
			"student_idcard" => $idcard ,
			"student_class" => $classroom ,	
			"student_name" => $name ,
			"student_surname" => $surname ,
			"student_name_eng" => $ename ,
			"student_surname_eng" => $esurname ,
			"nickname" => $nickname ,		
			"gender" => $gender ,	
			"grade_id" => $grade ,
			"date_out" => $dateout ,		
			"admin_id" => $aid ,
			"admin_update" => $update,
			"student_status" => $status 
			
    );

} else {

	$data = array(
			"student_idcard" => $idcard ,
			"student_class" => $classroom ,	
			"student_name" => $name ,
			"student_surname" => $surname ,
			"student_name_eng" => $ename ,
			"student_surname_eng" => $esurname ,
			"nickname" => $nickname ,		
			"gender" => $gender ,	
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"student_status" => $status 
			
    );

}

    update("tb_student", $data, "student_id = '{$id}'");

	//Edit Classroom

		/*$sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade}' ORDER BY year DESC , term DESC";
		$row = row_array($sql);
		$check_term=$row['term_id'];

		$sqlT = "SELECT * FROM tb_classroom_teacher WHERE classroom_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$grade}' ORDER BY classroom_t_id DESC";
		$listT = result_array($sqlT); 

		foreach ($listT as $rowT) {

			$classroomT = $rowT['classroom_t_id'];

			$data2 = array(
				"classroom_t_id" => $classroomT ,
				"student_id" => $id ,
				"term_id" => $check_term ,
				"grade_id" => $grade ,
				"admin_id" => $aid ,
				"admin_update" => $update		

			);

			update("tb_classroom_detail", $data2, "student_id = '{$id}'");
		}/*

		//Edit Assessment

	/*$data3 = array(
			"a_classroom_id" => $classroom ,
			"student_id" => $id

	);

	update("tb_assessment_classroom_detail", $data3, "student_id = '{$id}'");*/

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=student_data';</script>";

}
?>
