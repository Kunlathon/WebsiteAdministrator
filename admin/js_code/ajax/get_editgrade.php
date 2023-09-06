<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/grade_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลระดับชั้น</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">ระดับชั้น</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['grade_name'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลระดับชั้น </span>
															</div>
														</div>
														<div>&nbsp;</div>

													<div class="form-group">
															<label class="col-md-4 control-label">ระดับชั้น(Eng)</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name_eng" value="<?php echo $row['grade_name_eng'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลระดับชั้นภาษาอังกฤษ </span>
															</div>
														</div>
														<div>&nbsp;</div>

													<div class="form-group">
															<label class="col-md-4 control-label">รายละเอียด</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="detail" value="<?php echo $row['grade_detail'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลรายละเอียด </span>
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