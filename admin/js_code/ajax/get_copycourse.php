<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

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

$sql = "SELECT * FROM tb_course WHERE course_id = '{$cid}'";
$row = row_array($sql);

$check_term = $row['term_id'];
?>			
											<form action="process/copycourse_process.php" method="post">
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
															<?php echo $row['course_name'] ?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(สำเนา)</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['course_name'] ?>" required/>
																<span class="help-block"> เช่น โครงสร้างหลักสูตร ระดับชั้นประถมศึกษาปีที่ 1 </span>
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