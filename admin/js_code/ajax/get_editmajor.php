<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_major WHERE major_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/major_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลสาขาวิชา</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">สาขาวิชา</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['major_name'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลสาขาวิชา </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">คณะ</label>

															<div class="col-md-8">
																		<select name="faculty" class="form-control" required>
																			<option value="" disabled selected>เลือกคณะ</option>
																			<?php
																			$sql = "SELECT * FROM tb_faculty ORDER BY faculty_name ASC";
																			$tf = result_array($sql);
																			?>

																			<?php foreach ($tf as $_tf) { ?>
																				<option <?php echo $row['faculty_id']== $_tf['faculty_id'] ? "selected":""; ?> value="<?php echo $_tf['faculty_id'] ?>"><?php echo "$_tf[faculty_name]";?></option>
																			<?php } ?>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หัวหน้าสาขาวิชา</label>

															<div class="col-md-8">
																		<select name="teacher" class="form-control">
																			<option value="" disabled selected>เลือกอาจารย์</option>
																			<?php
																			$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
																			$tt = result_array($sql);
																			?>

																			<?php foreach ($tt as $_tt) { ?>
																				<option <?php echo $row['head_of_major']== $_tt['teacher_id'] ? "selected":""; ?>  value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
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