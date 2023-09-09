<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

$aid = check_session("admin_id");
$now_date = date('Y-m-d');

//$id = $_POST['id'];
$id = $_GET['id'];
$check_grade = $_GET['check_grade'];
$check_term = $_GET['check_term'];
$classroom = $_GET['classroom'];
$check_year = $_GET['check_year'];

$sql1_Cg = "SELECT * FROM tb_checkgrade WHERE student_id = '{$id}'";
$cc1_Cg = result_array($sql1_Cg);
$count1_Cg = count($cc1_Cg);

if($count1_Cg>0) {

$sql = "SELECT * FROM tb_checkgrade a INNER JOIN tb_student b ON a.student_id=b.student_id WHERE a.student_id = '{$id}'";
$row = row_array($sql);

} else {

$filegrade = "";

$data = array(
			"student_id" => $id ,
			"filegrade" => $filegrade ,
			"term_id" => $check_term  ,
			"grade_id" => $check_grade  ,
			"admin_id" => $aid  ,
			"admin_update" => $now_date  ,
			"checkgrade_status" => 1
			
);

insert("tb_checkgrade", $data);

$sql = "SELECT * FROM tb_checkgrade a INNER JOIN tb_student b ON a.student_id=b.student_id WHERE a.student_id = '{$id}'";
$row = row_array($sql);
}
?>			
											<form action="process/filegrade_process2.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มกรอกข้อมูลคะแนน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom; ?>">
													<input type="hidden" name="check_year" id="check_year" value="<?php echo $check_year; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">รหัสนักเรียน (ชื่อผู้ใช้) </label>

															<div class="col-md-8">
																<?php echo $row['student_id'];?>
															</div>
														</div>
														<div>&nbsp;</div>
														
														<div class="form-group">
															<label class="col-md-4 control-label">ชื่อ-นามสกุล</label>

															<div class="col-md-8">
																<?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">รหัสบัตรประชาชน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="idcard" value="<?php echo $row['student_idcard'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลรหัสบัตรประชาชน</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">รหัสผ่าน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="password" value="<?php echo $row['student_password'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลรหัสผ่าน</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<?php 
															if($row['filegrade'] == "") {

															} else {
														?>

														<div class="form-group">
															<label class="col-md-4 control-label">ไฟล์คะแนน</label>

															<div class="col-md-8">
																<a href="../checkgrade/uploads/filegrade/<?php echo $row['filegrade'];?>" class="btn btn-sm grey-salsa" title="ผลการเรียน" target="_blank">
																<i class="fa fa-print"></i> </a>
																
															</div>
														</div>
														<div>&nbsp;</div>

														<?php
															}
														?>

														<div class="form-group">
															<label class="col-md-4 control-label">ไฟล์คะแนน</label>

															<div class="col-sm-8">
																<input class="form-control form-control-inline input-medium" size="16" type="file" name="filegrade" value="" />
																<input type="hidden" name="filename" id="filename" value="<?php echo $row['filegrade'];?>">
																	<span class="help-block"> กรอกไฟล์คะแนน ต้องเป็น pdf เท่านั้น</span>
															</div>
														</div>	

												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn green">บันทึก</button>
											<button type="button" class="btn dark btn-outline" data-dismiss="modal">ปิด</button>
										</div>
										</form>