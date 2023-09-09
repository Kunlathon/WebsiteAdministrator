<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];

if (isset($_REQUEST['id'])) {
	$check_grade=$_REQUEST['id'];
	$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
	$row = row_array($sql);	
	$grade="ระดับชั้น$row[grade_name]";
} else if (!isset($_REQUEST['id'])) {
	$grade="";
} 

$cid = $_GET['cid'];

$sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$cid}'";
$row = row_array($sql);

$check_term = $row['term_id'];
$classroom = $row['classroom_id'];
?>			
											<form action="process/copycourse_class_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มสำเนาหลักสูตร <?php echo $grade; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $cid; ?>">
													<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade; ?>">										

														<div class="modal-body" style="overflow: hidden;">

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(ต้นฉบับ)</label>

															<div class="col-md-8">
															<?php echo $row['course_class_name']; ?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(สำเนา)</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['course_class_name'] ?>" required/>
																<span class="help-block"> เช่น โครงสร้างหลักสูตร ระดับชั้นประถมศึกษาปีที่ 1 </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ภาคเรียน</label>

															<div class="col-md-8">
																		<select name="term" class="form-control" required>
																			<option value="" disabled selected>เลือกภาคเรียน</option>
																			<?php
																			$sql = "SELECT * FROM tb_term WHERE grade_id = '$check_grade' ORDER BY year DESC , term DESC";
																			$cc = result_array($sql);
																		   ?>
																		   <?php foreach ($cc as $_cc) { ?>
																						<option <?php echo $check_term == $_cc['term_id'] ? "selected":""; ?>
																							value="<?php echo $_cc['term_id'] ?>"><?php echo $_cc['term'] ?>/<?php echo $_cc['year'] ?></option>
																		  <?php } ?>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>	

														<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียน</label>

															<div class="col-md-8">
																		<select name="classroom" class="form-control" required>
																			<option value="" disabled selected>เลือกห้องเรียน</option>
																			<?php
																			$sql = "SELECT * FROM tb_classroom WHERE grade_id = '$check_grade' ORDER BY classroom_name ASC";
																			$rclass = result_array($sql);
																		   ?>
																		   <?php foreach ($rclass as $_rclass) { ?>
																						<option <?php echo $classroom == $_rclass['classroom_id'] ? "selected":""; ?>
																							value="<?php echo $_rclass['classroom_id'] ?>"><?php echo $_rclass['classroom_name'] ?></option>
																		  <?php } ?>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>	

														<div class="form-group">
															<label class="col-md-4 control-label">ประเภทหลักสูตร</label>

															<div class="col-md-8">
																		<select name="type_course" class="form-control">
																				<option <?php echo $row['course_class_type'] == 1 ? "selected":""; ?> value="1">ปกติ</option>
																				<option <?php echo $row['course_class_type'] == 2 ? "selected":""; ?> value="2">TSL</option>
																				<option <?php echo $row['course_class_type'] == 3 ? "selected":""; ?> value="3">ESL</option>
																				<option <?php echo $row['course_class_type'] == 4 ? "selected":""; ?> value="4">TSL/ESL</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หมายเหตุ</label>

															<div class="col-md-8">
																<textarea class="form-control" rows="3" name="memo"><?php echo $row['memo'] ?></textarea>
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