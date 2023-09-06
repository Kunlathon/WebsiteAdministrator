<?php
error_reporting (E_ALL ^ E_NOTICE);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

//$aid = check_session("admin_id");

//$now_date = date('Y-m-d');

    $data = array(
			"school_name" => $name ,
			"school_name_eng" => $ename ,
			"school_affiliation" => $affiliation ,
			"school_area" => $area ,
			"school_tambon" => $tambon ,
			"school_amphoe" => $amphoe ,
			"school_province_id" => $provinceid ,
			"school_register" => $register ,
			"school_direction" => $direction
    );

    update("tb_school", $data, "school_id = '{$sid}'");

    echo "<meta charset='utf-8'/><script>alert('แก้ไขข้อมูลสำเร็จ!!');location.href='../index.php';</script>";


?>