<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_lcm','login.php');

$sql = "SELECT * FROM tb_score WHERE term_id='27' AND grade_id='1' AND score_no='2' ORDER BY score_id ASC";
//$sql = "SELECT * FROM tb_score WHERE term_id='27' AND grade_id='1' AND admin_update LIKE '2020-06%' OR admin_update LIKE '2020-07%' OR teacher__update LIKE '2020-06%' OR teacher__update LIKE '2020-07%' ORDER BY score_id ASC";
$list = result_array($sql); 

foreach ($list as $row) {
	$scoreid = $row['score_id'];

		$data = array(
				"score_no" => 1
		);

		update("tb_score", $data, "score_id='$scoreid'");

}
?>
