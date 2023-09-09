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
$sid = $_GET['sid'];

$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id WHERE b.course_class_detail_id = '{$cid}' AND b.course_class_detail_status = '1'";
$row = row_array($sql);

$check_term = $row['term_id'];

$sqlS = "SELECT * FROM tb_subject WHERE subject_id = '$sid'";
$ccS = row_array($sqlS);
?>			
											<form action="process/copysubject_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มสำเนาหลักสูตร <?php echo $grade; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $cid; ?>">
													<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
													<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade; ?>">					
													<input type="hidden" name="term" id="term" value="<?php echo $check_term; ?>">		

														<div class="modal-body" style="overflow: hidden;">

														<div class="form-group">
															<label class="col-md-4 control-label">วิชา</label>

															<div class="col-md-8">
															<?php echo $ccS['subject_name'] ?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(ต้นฉบับ)</label>

															<div class="col-md-8">
															<?php echo $row['course_class_name'] ?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(สำเนา)</label>

															<div class="col-md-8">
																		<select name="courseid" class="form-control" required>
																			<option value="" disabled selected>เลือกหลักสูตร</option>
																			<?php
																			$sql = "SELECT * FROM tb_course_class WHERE grade_id = '$check_grade' AND course_id = '$row[course_id]' ORDER BY course_class_name ASC";
																			$cc = result_array($sql);
																		   ?>
																		   <?php foreach ($cc as $_cc) { ?>
																						<option value="<?php echo $_cc['course_class_id'] ?>"><?php echo $_cc['course_class_name'] ?></option>
																		  <?php } ?>
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