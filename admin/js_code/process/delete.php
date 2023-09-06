<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_GET);

delete($table,"{$ff} = '{$id}'");

echo "<meta charset='utf-8'/><script>alert('ลบสำเร็จ!!');window.location.href = document.referrer;</script>";

?>