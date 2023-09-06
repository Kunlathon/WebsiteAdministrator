<?php
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//โทร 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//โทร 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
//no_error
//it_error
//filter_input(INPUT_POST,'xxxx')

    include ('../../config/connect.ini.php'); 
    include ('../../config/fnc.php'); 
    check_login('admin_username_aba', 'login.php'); 

    $aid=check_session("admin_id");
    $update=date('Y-m-d H:i:s');

//$count = count($id);

$ccid=filter_input(INPUT_POST, 'ccid');
$ccdid=filter_input(INPUT_POST, 'ccdid');
$rid=filter_input(INPUT_POST, 'rid');
$sid=filter_input(INPUT_POST, 'sid');
$lid=filter_input(INPUT_POST, 'lid');
$check_grade=filter_input(INPUT_POST, 'check_grade');
$check_term=filter_input(INPUT_POST, 'check_term');

//$id=filter_input(INPUT_POST, 'id');
$count=count($_POST["id"]);

//echo "ccid->".$ccid."ccdid->".$ccdid."rid->".$rid."sid->".$sid."lid->".$lid."check_grade->".$check_grade."check_term->".$check_term;

//echo $count;

//$count = count($id) + 1;

for($i=1;$i<$count;$i++){
	$chk=$_POST["chk"][$i];

	$course_s_detail_key=$_POST["id"][$i];

	$data = array(
			"course_class_level_check" => $chk ,
			"admin_id" => $aid ,
			"admin_update" => $update
	);


	update("tb_course_student_detail", $data, "course_s_detail_id = '{$course_s_detail_key}' AND course_class_detail_id = '{$ccdid}' AND course_class_level_id = '{$lid}'");


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

    //echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../../?modules=course_manage&id=$ccid&rid=$rid&check_term=$check_term&check_grade=$check_grade';</script>";
    exit("<script>window.location='../../?modules=course_manage&id=$ccid&rid=$rid&check_term=$check_term&check_grade=$check_grade';</script>");


?>