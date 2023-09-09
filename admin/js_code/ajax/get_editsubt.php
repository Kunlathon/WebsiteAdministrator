<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_subject_type WHERE subt_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/subt_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลประเภทรายวิชา</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">ประเภทรายวิชา</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['subt_name'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลประเภทรายวิชา</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ประเภทรายวิชาภาษาอังกฤษ</label>
															
															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="ename" value="<?php echo $row['subt_name_eng'] ?>" />
																<span class="help-block"> กรอกข้อมูลประเภทรายวิชาภาษาอังกฤษ</span>
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