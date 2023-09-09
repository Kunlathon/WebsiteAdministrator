<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_lcm','login.php');

$sql = "SELECT * FROM tb_payment_student WHERE term_id = '23' AND grade_id = '1' ORDER BY payment_student_id ASC";
$list = result_array($sql); 

foreach ($list as $row) {
	$payment_id = $row['payment_student_id'];

		$data = array(
				"payment_student_score1" => 1 ,
				"payment_student_score2" => 1 ,
				"payment_student_score3" => 1 ,
				"payment_student_score4" => 1
		);

		update("tb_payment_student", $data, "payment_student_id='$payment_id'");

}
?>
