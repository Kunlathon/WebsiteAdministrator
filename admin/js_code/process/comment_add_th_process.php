<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

extract($_POST);

	$db = connect();
	$txt_detail = mysqli_real_escape_string($db ,$txtdetail);

	$data = array(
			"memo" => $txt_detail
	);

    update("tb_assessment_detail", $data, "assessment_detail_id = '{$assid}' AND student_id='{$sid}'");

    echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=assessment_th_show&id=$clid&check_grade=$check_grade&check_term=$check_term';</script>"

?>
