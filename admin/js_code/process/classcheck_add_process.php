<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

//$count = count($id);
$count = count($id) + 1;

for($i=1;$i<$count;$i++){

	$data = array(
			"course_class_level_check" => $chk[$i] ,
			"admin_id" => $aid ,
			"admin_update" => $update
	);

    update("tb_course_student_detail", $data, "course_s_detail_id = '{$id[$i]}' AND course_class_detail_id = '{$ccdid}' AND course_class_level_id = '{$lid}'");


	/*$sql = "SELECT * FROM tb_course_student_detail WHERE course_s_detail_id != '{$id[$i]}' AND course_class_detail_id = '{$ccdid}' AND course_class_level_check = '1'";
	$list = result_array($sql);

	foreach ($list as $row) { 

		$data1 = array(
				"course_class_level_check" => 0 ,
				"admin_id" => $aid ,
				"admin_update" => $update
		);

		update("tb_course_student_detail", $data1, "course_s_detail_id != '{$row[course_s_detail_id]}' AND course_class_detail_id = '{$row[course_class_detail_id]}' AND course_class_level_check = '1'");

	}*/

}

    echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=course_manage&id=$ccid&rid=$rid&check_term=$check_term&check_grade=$check_grade';</script>"

?>
