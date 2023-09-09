<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_teacher WHERE teacher_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/teacher2_process.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลครูต่างประเทศ</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $row['teacher_id']; ?>">
													<input type="hidden" name="type" id="type" value="2">

													<div class="form-group">
															<label class="col-md-4 control-label">ชื่อ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['teacher_name'];?>" required/>
																<span class="help-block"> กรอกข้อมูลชื่อ </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">นามสกุล</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="surname" value="<?php echo $row['teacher_surname'];?>"/>
																<span class="help-block"> กรอกข้อมูลนามสกุล </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">เพศ</label>

															<div class="col-md-8">
																		<select name="gender" class="form-control" required>
																			<option value="" disabled selected>เลือกเพศ</option>
																			<option <?php echo $row['gender']== 1 ? "selected":""; ?> value="1">ชาย</option>
																			<option <?php echo $row['gender']== 2 ? "selected":""; ?> value="2">หญิง</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ตำแหน่ง</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="position" value="<?php echo $row['position'];?>"/>
																<span class="help-block"> กรอกข้อมูลตำแหน่ง </span>
															</div>
														</div>
														<div>&nbsp;</div>
														
														<div class="form-group">
															<label class="col-md-4 control-label">แผนก</label>

															<div class="col-md-8">
																		<select name="section" class="form-control">
																			<option value="" disabled selected>เลือกแผนก</option>
																			<?php
																			$sql = "SELECT * FROM  tb_teacher_section ORDER BY teacher_section_id ASC";
																			$tt = result_array($sql);
																			?>

																			<?php foreach ($tt as $_tt) { ?>
																				<option <?php echo $row['teacher_section_id']== $_tt['teacher_section_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_section_id'] ?>"><?php echo "$_tt[teacher_section_name]";?></option>
																			<?php } ?>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ครูประจำชั้น</label>

															<div class="col-md-8">
																		<select name="tclass" class="form-control" required>
																			<option value="" disabled selected>เลือกครูประจำชั้น</option>
																			<option <?php echo $row['teacher_class']== 1 ? "selected":""; ?> value="1">เป็น</option>
																			<option <?php echo $row['teacher_class']== 0 ? "selected":""; ?> value="0">ไม่เป็น</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ครูประจำรายวิชา</label>

															<div class="col-md-8">
																		<select name="tteach" class="form-control" required>
																			<option value="" disabled selected>เลือกครูประจำรายวิชา</option>
																			<option <?php echo $row['teacher_teach']== 1 ? "selected":""; ?> value="1">เป็น</option>
																			<option <?php echo $row['teacher_teach']== 0 ? "selected":""; ?> value="0">ไม่เป็น</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">Username</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="username" value="<?php echo $row['teacher_username'] ?>" required/>
																<span class="help-block"> กรอกข้อมูล Username </span>
															</div>
														</div>
														<div>&nbsp;</div>											

														<div class="form-group">
															<label class="col-md-4 control-label">สถานภาพการทำงาน</label>

															<div class="col-md-8">
																		<select name="status_work" class="form-control" required>
																			<option value="" disabled selected>เลือกสถานภาพการทำงาน</option>
																			<option <?php echo $row['teacher_work']== 1 ? "selected":""; ?> value="1">ทำงาน</option>
																			<option <?php echo $row['teacher_work']== 0 ? "selected":""; ?> value="0">ออกแล้ว</option>
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