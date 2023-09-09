<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];

if (isset($_REQUEST['check_grade'])) {
	$check_grade=$_REQUEST['check_grade'];
	$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
	$row = row_array($sql);	
	$grade="ระดับชั้น$row[grade_name]";
} else if (!isset($_REQUEST['id'])) {
	$grade="";
} 

$cid = $_GET['cid'];

$sql = "SELECT * FROM tb_classroom WHERE classroom_id = '{$cid}'";
$row = row_array($sql);

$id = $_GET['id'];

$sqlStu = "SELECT * FROM tb_student WHERE student_id = '{$id}'";
$rowStu = row_array($sqlStu);

$stuid = $rowStu['student_id'];
?>			
											<form action="process/student_finnish_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มจบการศึกษา ห้องเรียน <?php echo $row['classroom_name']; ?> <?php echo $grade; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $cid; ?>">													
													<input type="hidden" name="stuid" id="stuid" value="<?php echo $stuid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">										

														<div class="modal-body" style="overflow: hidden;">

														<div class="form-group">
															<label class="col-md-4 control-label">รหัส</label>

																	<div class="col-md-8">
																		<?php echo $rowStu['student_id'] ?>
																	</div>
														</div>
														<div>&nbsp;</div>	

														<div class="form-group">
															<label class="col-md-4 control-label">ชื่อ-สกุล</label>

																	<div class="col-md-8">
																		<?php echo $rowStu['student_name'] ?>&nbsp;&nbsp;<?php echo $rowStu['student_surname'] ?>
																	</div>
														</div>
														<div>&nbsp;</div>	


														<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียนที่จบการศึกษา</label>

																	<div class="col-md-8">
																		<?php echo $row['classroom_name'] ?>
																	</div>
														</div>
														<div>&nbsp;</div>	

												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn green">บันทึก</button>
											<button type="button" class="btn dark btn-outline" data-dismiss="modal">ปิด</button>
										</div>
										</form>