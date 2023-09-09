<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];

$stuid = $_GET['id'];
$cid = $_GET['cid'];
$rid = $_GET['rid'];


if (isset($_REQUEST['check_grade'])) {
	$check_grade=$_REQUEST['check_grade'];
	$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
	$row = row_array($sql);	
	$grade="ระดับชั้น$row[grade_name]";
} else if (!isset($_REQUEST['check_grade'])) {
	$grade="";
} 

$check_term = $_REQUEST['check_term'];

$sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$cid}' AND grade_id='{$check_grade}' AND term_id = '{$check_term}' AND classroom_t_id = '{$rid}'";
//echo $sql;
$row = row_array($sql);

$sqlCla = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$rid'";
$rowCla = row_array($sqlCla);

?>			
											<form action="process/movecourse_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มย้ายหลักสูตร <?php echo $grade; ?> ห้องเรียน <?php echo $rowCla['classroom_name']; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $cid; ?>">
													<input type="hidden" name="rid" id="rid" value="<?php echo $rid; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="stuid" id="stuid" value="<?php echo $stuid; ?>">

														<div class="modal-body" style="overflow: hidden;">

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(เดิม)</label>

															<div class="col-md-8">
															<?php echo $row['course_class_name'] ?> ห้องเรียน <?php echo $rowCla['classroom_name']; ?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(ใหม่)</label>

															<div class="col-md-8">
																		<select name="course_new" class="form-control" required>
																			<option value="" disabled selected>เลือกหลักสูตร(ใหม่)</option>
																			<?php
																			$sqlC = "SELECT * FROM tb_course_class WHERE grade_id = '$check_grade' AND term_id = '$check_term' AND course_class_id != '{$cid}' ORDER BY course_class_name ASC";
																			//echo $sqlC;
																			$cc = result_array($sqlC);
																		   ?>
																		   <?php 
																		   foreach ($cc as $_cc) { 

																				$sqlCCla = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$_cc[classroom_t_id]'";
																				//echo $sqlCCla;
																				$rowCCla = row_array($sqlCCla);
																		   
																		   ?>
																						<option value="<?php echo $_cc['course_class_id'] ?>"><?php echo $_cc['course_class_name'] ?> ห้องเรียน <?php echo $rowCCla['classroom_name']; ?></option>
																		  <?php } ?>
																		</select>
																
																<span class="help-block"> หมายเหตุ - เมื่อย้ายข้อมูลหลักสูตร(เดิม) จะถูกลบ </span>
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