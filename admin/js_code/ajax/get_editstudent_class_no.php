<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$classid = $_GET['classid'];
$cid = $_GET['cid'];
$check_term = $_GET['check_term'];
$check_grade = $_GET['check_grade'];

$sql = "SELECT * FROM tb_student WHERE student_id = '{$id}' AND student_class ='$cid'";
$row = row_array($sql);

$date_now = date('Y-m-d');
?>			
											<form action="process/student_class_no_process.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลนักเรียน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
													<input type="hidden" name="classid" id="classid" value="<?php echo $classid; ?>">
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
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
															<label class="col-md-4 control-label">เลขที่</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="number" name="stu_no" value="<?php echo $row['student_no'];?>" />
																<span class="help-block"> กรอกข้อมูลเลขที่ </span>
															</div>
														</div>
														<div>&nbsp;</div>			
														
														<div class="form-group">
															<label class="col-md-4 control-label">สถานะนักเรียน</label>

															<div class="col-md-8">
																		<select name="status" class="form-control" required>
																			<option value="" disabled selected>เลือกสถานะนักเรียน</option>
																				<option <?php echo $row['student_status']== 1 ? "selected":""; ?> value="1">ปกติ</option>
																				<option <?php echo $row['student_status']== 2 ? "selected":""; ?> value="2">ลาออก</option>
																				<option <?php echo $row['student_status']== 3 ? "selected":""; ?> value="3">จบการศึกษา</option>
																				<option <?php echo $row['student_status']== 4 ? "selected":""; ?> value="4">ลาพัก</option>
																		</select>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">วันที่ลาออก</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline date-picker" data-date-format="yyyy-mm-dd" size="16" type="text" name="dateout" value="<?php echo $date_now; ?>" />
																<span class="help-block"> เลือกข้อมูลวันที่ลาออก </span>
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

	