<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$cid = $_GET['cid'];
$check_term = $_GET['check_term'];
$check_grade = $_GET['check_grade'];

$sql = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE b.student_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/student_type_process.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลนักเรียน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="classroom_detail_id" id="classroom_detail_id" value="<?php echo $row['a_classroom_detail_id']; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">

														<div class="form-group">
															<label class="col-md-4 control-label">รหัสนักเรียน</label>

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
															<label class="col-md-4 control-label">ประเภทการเรียน</label>

															<div class="col-md-8">
																		<select name="stu_type" class="form-control" required>
																			<option value="" disabled selected>เลือกประเภทการเรียน</option>
																			<option <?php echo $row['a_student_type']== 1 ? "selected":""; ?> value="1">Normal</option>
																			<option <?php echo $row['a_student_type']== 2 ? "selected":""; ?> value="2">ESL</option>
																		</select>

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