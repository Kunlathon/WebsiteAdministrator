<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$now_date = date('Y-m-d');

		if($_FILES["filegrade"]["name"]!="") {
				$file_ext1 = substr($_FILES["filegrade"]["name"], strripos($_FILES["filegrade"]["name"], '.'));

				if ($file_ext1 == ".pdf" || $file_ext1 == ".PDF") {
					$filegrade = date('YmdHis') . "_grade" . $file_ext1;

					if (move_uploaded_file($_FILES["filegrade"]["tmp_name"], "../../checkgrade/uploads/filegrade/" . $filegrade)) {

					} else {
						echo "<meta charset='utf-8'/><script>alert('ไฟล์เอกสารไม่ถูกต้อง!!');window.history.back();</script>";
					}
				} else {
					echo "<meta charset='utf-8'/><script>alert('ไฟล์เอกสารต้องเป็น pdf เท่านั้น!!');window.history.back();</script>";
				}
		} else if($_FILES['img']['name']=="") {
			$filegrade = $filename;

		}

		$data = array(
			"filegrade" => $filegrade ,
			"term_id" => $check_term  ,
			"grade_id" => $check_grade  ,
			"admin_id" => $aid  ,
			"admin_update" => $now_date 
			
		);
		
		update("tb_checkgrade", $data, "student_id = {$id}");

		$data2 = array(
			"student_idcard" => $idcard ,
			"student_password" => $password ,
			"admin_id" => $aid ,
			"admin_update" => $now_date
			
		);

		update("tb_student", $data2, "student_id = '{$id}'");

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=report_show_grade2&classroom=$classroom&check_year=$check_year';</script>";
		//echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');window.location.href = document.referrer;</script>";


?>

