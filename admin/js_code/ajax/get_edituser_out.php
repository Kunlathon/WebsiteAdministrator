<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_admin WHERE admin_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/user_out_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลผู้ใช้งานระบบ</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="section" id="section" value="edit">

													<div class="form-group">
															<label class="col-md-4 control-label">ชื่อ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['admin_name'];?>" required/>
																<span class="help-block"> กรอกข้อมูลชื่อ </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">นามสกุล</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="surname" value="<?php echo $row['admin_lastname'];?>" required/>
																<span class="help-block"> กรอกข้อมูลนามสกุล </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ชื่อผู้ใช้งาน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="username" readonly value="<?php echo $row['admin_username'];?>" pattern='.{6,}' required title="ชื่อผู้ใช้งานต้องมีอย่างน้อย 6 ตัวอักษร"/>
																<span class="help-block"> กรอกข้อมูลชื่อผู้ใช้งานต้องมีอย่างน้อย 6 ตัวอักษร </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">เบอร์โทรศัพท์</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="tel" value="<?php echo $row['admin_tel'];?>" pattern='.{10,}' required title="เบอร์โทรไม่ถูกต้อง/ต้องมี 10 ตัวอักษร"/>
																<span class="help-block"> กรอกข้อมูลเบอร์โทรศัพท์ </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">อีเมล์</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="email" name="email" value="<?php echo $row['admin_email'];?>" required/>
																<span class="help-block"> กรอกข้อมูลอีเมล์ </span>
															</div>
														</div>
														<div>&nbsp;</div>				
														
														<div class="form-group">
															<label class="col-md-4 control-label">ประเภทผู้ใช้งานระบบ</label>

															<div class="col-md-8">
																		<select name="type" class="form-control" required>
																			<option value="" disabled selected>เลือกประเภทผู้ใช้งานระบบ</option>
																				<option <?php echo $row['admin_status']== 1 ? "selected":""; ?> value="1">ผู้ดูแลระบบ</option>
																				<option <?php echo $row['admin_status']== 2 ? "selected":""; ?> value="2">วิชาการไทย</option>
																				<option <?php echo $row['admin_status']== 3 ? "selected":""; ?> value="3">วิชาการต่างประเทศ</option>
																				<option <?php echo $row['admin_status']== 4 ? "selected":""; ?> value="4">นายทะเบียน</option>
																				<option <?php echo $row['admin_status']== 5 ? "selected":""; ?> value="5">เจ้าหน้าที่ทะเบียน</option>
																		</select>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ประจำระดับชั้น</label>

															<div class="col-md-8">
																		<select name="grade" class="form-control" required>
																			<option value="" disabled selected>เลือกประจำระดับชั้น</option>
																				<option <?php echo $row['grade_id']== 1 ? "selected":""; ?> value="1">ระดับประถมศึกษา</option>
																				<option <?php echo $row['grade_id']== 2 ? "selected":""; ?> value="2">ระดับมัธยมศึกษา</option>
																		</select>
																		<span class="help-block"> เลือกกรณีประเภทผู้ใช้งานระบบเป็นวิชาการ </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">สถานภาพการทำงาน</label>

															<div class="col-md-8">
																		<select name="status_work" class="form-control" required>
																			<option value="" disabled selected>เลือกสถานภาพการทำงาน</option>
																			<option <?php echo $row['admin_work']== 1 ? "selected":""; ?> value="1">ทำงาน</option>
																			<option <?php echo $row['admin_work']== 0 ? "selected":""; ?> value="0">ออกแล้ว</option>
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