<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

extract($_GET);


$data = array(
    "course_class_detail_status" => $action
);

update("tb_course_class_detail",$data,"course_class_detail_id = {$id}");

echo "<meta charset='utf-8'/><script>window.location.href = document.referrer;</script>";