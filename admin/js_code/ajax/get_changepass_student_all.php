<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_student WHERE student_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/changepass_student_all_process.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มเปลี่ยนรหัสผ่านนักเรียน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">รหัส</label>

															<div class="col-md-8">
																<?php echo $row['student_id'];?>
															</div>
														</div>
														<div>&nbsp;</div>

													<div class="form-group">
															<label class="col-md-4 control-label">ชื่อ-นามสกุล</label>

															<div class="col-md-8">
																<?php echo $row['student_name'];?> <?php echo $row['student_surname'];?> (<?php echo $row['nickname'];?>)
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">รหัสผ่านใหม่</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="password" value="<?php echo $row['student_password'];?>" pattern='.{6,}' required title="รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร"/>
																<span class="help-block"> กรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร</span>
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