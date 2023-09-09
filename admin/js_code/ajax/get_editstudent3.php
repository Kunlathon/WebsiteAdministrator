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
											<form action="process/student3_process.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลนักเรียน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">รหัสนักเรียน</label>

															<div class="col-md-8">
																<?php echo $row['student_id'];?>
															</div>
														</div>
														<div>&nbsp;</div>

													<div class="form-group">
															<label class="col-md-4 control-label">บัตรประชาชน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="idcard" value="<?php echo $row['student_idcard'];?>" />
																<span class="help-block"> กรอกข้อมูลบัตรประชาชน </span>
															</div>
														</div>
														<div>&nbsp;</div>

													<div class="form-group">
															<label class="col-md-4 control-label">ชื่อ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['student_name'];?>" required/>
																<span class="help-block"> กรอกข้อมูลชื่อ </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">นามสกุล</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="surname" value="<?php echo $row['student_surname'];?>"/>
																<span class="help-block"> กรอกข้อมูลนามสกุล </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ชื่อภาษาอังกฤษ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="ename" value="<?php echo $row['student_name_eng'];?>" />
																<span class="help-block"> กรอกข้อมูลชื่อภาษาอังกฤษ </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">นามสกุลภาษาอังกฤษ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="esurname" value="<?php echo $row['student_surname_eng'];?>"/>
																<span class="help-block"> กรอกข้อมูลนามสกุลภาษาอังกฤษ </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ชื่อเล่น</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="nickname" value="<?php echo $row['nickname'];?>"/>
																<span class="help-block"> กรอกกรอกข้อมูลชื่อเล่น</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">เพศ</label>

															<div class="col-md-8">
																		<select name="gender" class="form-control" style="width : 200px;" required>
																			<option value="" disabled selected>เลือกเพศ</option>
																			<option <?php echo $row['gender']== 1 ? "selected":""; ?> value="1">ชาย</option>
																			<option <?php echo $row['gender']== 2 ? "selected":""; ?> value="2">หญิง</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">วันเดือนปีเกิด</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline date-picker" data-date-format="yyyy-mm-dd" size="16" type="text" name="birthday" value="<?php echo $row['birth_day'];?>" />
																<span class="help-block"> เลือกข้อมูลวันเดือนปีเกิด </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ระดับชั้น</label>

															<div class="col-md-8">
																<select name="grade" class="form-control" style="width : 200px;">
																	<option value="" disabled selected>เลือกระดับชั้น</option>
																	<?php
																			$sql = "SELECT * FROM tb_grade ORDER BY grade_id ASC";
																			$cc = result_array($sql);
																   ?>
																   <?php foreach ($cc as $_cc) { ?>
																				<option <?php echo $row['grade_id'] == $_cc['grade_id'] ? "selected":""; ?> value="<?php echo $_cc['grade_id']; ?>"><?php echo $_cc['grade_name']; ?></option>
																  <?php } ?>
																</select>	
															</div>
														</div>
														<div>&nbsp;</div>
														
														<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียน</label>

															<div class="col-md-8">
																<select name="classroom" class="form-control" style="width : 200px;">
																	<option value="" disabled selected>เลือกห้องเรียน</option>
																	<?php
																			$sql = "SELECT * FROM tb_classroom ORDER BY classroom_name ASC";
																			$cc = result_array($sql);
																   ?>
																   <?php foreach ($cc as $_cc) { ?>
																				<option <?php echo $row['student_class'] == $_cc['classroom_id'] ? "selected":""; ?> value="<?php echo $_cc['classroom_id']; ?>"><?php echo $_cc['classroom_name']; ?></option>
																  <?php } ?>
																</select>	
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">สถานะนักเรียน</label>

															<div class="col-md-8">
																		<select name="status" class="form-control" required>
																			<option value="" disabled selected>เลือกสถานะนักเรียน</option>
																				<option <?php echo $row['student_status']== 1 ? "selected":""; ?> value="1">ปกติ</option>
																				<option <?php echo $row['student_status']== 2 ? "selected":""; ?> value="2">ลาออก</option>
																				<option <?php echo $row['student_status']== 3 ? "selected":""; ?> value="3">จบการศึกษา</option>
																				<option <?php echo $row['student_status']== 4 ? "selected":""; ?> value="4">ลาพัก</option>
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

		<!-- BEGIN PAGE LEVEL SCRIPTS -->
			<script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->