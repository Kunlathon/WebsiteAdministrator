<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$sql = "SELECT * FROM tb_course WHERE course_id = '{$course}'";
$row = row_array($sql);

$course_id = $row['course_id'];
$name = $row['course_name'];
$ename = $row['course_name_eng'];
//$term = $row['term_id'];
//$grade = $row['grade_id'];
$cy = $row['course_year'];
$memo = $row['memo'];

function fnc_count($check_term,$check_grade,$cy,$name,$cclass)   
{
    $s = "SELECT * FROM tb_course_class WHERE term_id = '$check_term' AND grade_id = '$check_grade' AND course_class_year = '$cy' AND course_class_name = '$name' AND classroom_t_id = '$cclass'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

if (empty($id)) {

	$check = fnc_count($check_term,$check_grade,$cy,$name,$cclass)   ;
	
	if ($check) {

		$sqlT = "SELECT *,MAX(course_class_id) AS ID  FROM tb_course_class";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;

		$data = array(
			"course_class_id" => $C_ID ,
			"course_id" => $course_id ,
			"classroom_t_id" => $cclass ,
			"course_class_name" => $name ,
			"course_class_name_eng" => $ename ,
			"term_id" => $check_term ,
			"grade_id" => $check_grade ,
			"course_class_year" => $cy ,
			"memo" => $memo ,		
			"admin_id" => $aid ,
			"admin_update" => $update ,
			"course_class_type" => $type_course ,	
			"course_class_sub_type" => 1 ,
			"course_class_status" => 1		

		);

		insert("tb_course_class", $data);

		$sql = "SELECT * FROM tb_course_detail WHERE course_id = '{$course_id}' AND course_detail_status='1'";
		//echo $sql;
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$course_d_id = $row['course_detail_id'];
			$subject_id = $row['subject_id'];
			$sort = $row['sort'];

			$sqlD = "SELECT *,MAX(course_class_detail_id) AS DID FROM tb_course_class_detail";
			$tcrD = row_array($sqlD);

			$C_DID = $tcrD['DID'] + 1;
			
			/*$sqlS = "SELECT * FROM tb_subject WHERE subject_id='$subject_id'";
			$rowS = row_array($sqlS);*/

			$data2 = array(
				"course_class_detail_id" => $C_DID ,
				"course_class_id" => $C_ID ,
				"subject_id" => $subject_id ,	
				"subject_code" => $row['subject_code'] ,
				"subject_name" => $row['subject_name'] ,
				"subject_name_eng" => $row['subject_name_eng'] ,
				"unit" => $row['unit'] ,					
				"weight" => $row['weight'] ,	
				"subt_id" => $row['subt_id'] ,	
				"grade_id" => $row['grade_id'] ,
				"sort" => $sort ,	
				"admin_id" => $aid ,
				"admin_update" => $update,
				"course_class_detail_status" => 1
			);

			insert("tb_course_class_detail", $data2);

			$sql = "SELECT * FROM tb_course_level WHERE course_detail_id = '{$course_d_id}' AND course_level_status='1' ";
			$list = result_array($sql);

			foreach ($list as $key => $row) { 

				$sqlD = "SELECT *,MAX(course_class_level_id) AS LID FROM tb_course_class_level";
				$tcrD = row_array($sqlD);

				$C_LID = $tcrD['LID'] + 1;

				$data3 = array(
					"course_class_level_id" => $C_LID ,
					"course_class_detail_id" => $C_DID ,
					"course_class_level_name" => $row['course_level_name'] ,				
					"teacher_id1" => $row['teacher_id1'] ,	
					"rate1" => $row['rate1'] ,
					"teacher_id2" => $row['teacher_id2'] ,	
					"rate2" => $row['rate2'] ,
					"teacher_id3" => $row['teacher_id3'] ,	
					"rate3" => $row['rate3'] ,
					"sort" => $row['sort'] ,
					"admin_id" => $aid ,
					"admin_update" => $update,
					"course_class_level_status" => 1
				);

				insert("tb_course_class_level", $data3);

			}

		}

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=course_data_class&id=$cclass&check_term=$check_term&check_grade=$check_grade';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลหลักสูตรซ้ำ!!');window.history.back();</script>";
    }

} else {

    $data = array(
			"course_id" => $course ,
			"classroom_t_id" => $cclass ,
			"course_class_name" => $txtname ,
			"course_class_name_eng" => $ename ,
			"term_id" => $check_term ,
			"grade_id" => $check_grade ,
			"course_class_year" => $cy ,
			"memo" => $memo ,		
			"admin_id" => $aid ,
			"admin_update" => $update ,
			"course_class_type" => $type_course

    );

    update("tb_course_class", $data, "course_class_id = '{$id}'");

	echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../?modules=course_data_class&id=$cclass&check_term=$check_term&check_grade=$check_grade';</script>";

}
?>

