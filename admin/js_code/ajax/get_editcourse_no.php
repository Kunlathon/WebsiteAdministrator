<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$cid = $_GET['cid'];
$cdid = $_GET['cdid'];
$check_grade = $_GET['check_grade'];

$sql = "SELECT * FROM tb_course a INNER JOIN tb_course_detail b ON a.course_id=b.course_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id WHERE a.course_id='{$cid}' AND b.course_detail_id = '{$cdid}'";
$row = row_array($sql);
?>			
											<form action="process/course_no_process.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลลำดับหลักสูตร</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร</label>

															<div class="col-md-8">
																<?php echo $row['course_name'];?>
															</div>
														</div>
														<div>&nbsp;</div>
														
														<div class="form-group">
															<label class="col-md-4 control-label">วิชา</label>

															<div class="col-md-8">
																<?php echo $row['subject_name'];?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ลำดับ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="number" name="c_no" value="<?php echo $row['sort'];?>" />
																<span class="help-block"> กรอกข้อมูลลำดับ </span>
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