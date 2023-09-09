<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_lcm','login.php');

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$sql1 = "SELECT * FROM tb_course_detail ORDER BY course_detail_id ASC";
$list1 = result_array($sql1); 

foreach ($list1 as $row1) {
		$course_detail_id = $row1['course_detail_id'];
		$subjectid = $row1['subject_id'];

		
		$sqlS1 = "SELECT * FROM tb_subject WHERE subject_id='$subjectid'";
		$rowS1 = row_array($sqlS1);


		$data1 = array(
				"subject_code" => $rowS1['subject_code'] ,
				"subject_name" => $rowS1['subject_name'] ,
				"subject_name_eng" => $rowS1['subject_name_eng'] ,			
				"unit" => $rowS1['unit'] ,					
				"weight" => $rowS1['weight'] ,	
				"subt_id" => $rowS1['subt_id'] ,	
				"grade_id" => $rowS1['grade_id'] ,
				"subject_sort" => $rowS1['subject_sort'] ,	
				"subject_catagory" => $rowS1['subject_catagory'] ,
				"admin_id" => $aid ,
				"admin_update" => $update
		);

		update("tb_course_detail", $data1, "course_detail_id = '$course_detail_id'");

}

$sql2 = "SELECT * FROM tb_course_class_detail ORDER BY course_class_detail_id ASC";
$list2 = result_array($sql2); 

foreach ($list2 as $row2) {
		$course_class_detail_id = $row2['course_class_detail_id'];
		$subjectid = $row2['subject_id'];

		
		$sqlS2 = "SELECT * FROM tb_subject WHERE subject_id='$subjectid'";
		$rowS2 = row_array($sqlS2);

		$data2 = array(
				"subject_code" => $rowS2['subject_code'] ,
				"subject_name" => $rowS2['subject_name'] ,
				"subject_name_eng" => $rowS2['subject_name_eng'] ,			
				"unit" => $rowS2['unit'] ,					
				"weight" => $rowS2['weight'] ,	
				"subt_id" => $rowS2['subt_id'] ,	
				"grade_id" => $rowS2['grade_id'] ,
				"subject_sort" => $rowS2['subject_sort'] ,	
				"subject_catagory" => $rowS2['subject_catagory'] ,
				"admin_id" => $aid ,
				"admin_update" => $update
		);

		update("tb_course_class_detail", $data2, "course_class_detail_id = '$course_class_detail_id'");
}

echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../index.php';</script>";
?>
