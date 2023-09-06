<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$cid = $_GET['cid'];
$rid = $_GET['rid'];
$check_term = $_GET['check_term'];
$check_grade = $_GET['check_grade'];

$sql = "SELECT * FROM tb_subject WHERE subject_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/subject3_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลรายวิชา</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="rid" id="rid" value="<?php echo $rid; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">รหัสรายวิชา</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="code" value="<?php echo $row['subject_code'];?>" required/>
																<span class="help-block"> กรอกข้อมูลรหัสรายวิชา เช่น ท11101 , ค12101</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">รายวิชา</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['subject_name'];?>" required/>
																<span class="help-block"> กรอกข้อมูลรายวิชา </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">รายวิชาภาษาอังกฤษ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="ename" value="<?php echo $row['subject_name_eng'];?>" required/>
																<span class="help-block"> กรอกข้อมูลรายวิชาภาษาอังกฤษ </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">เวลาเรียน/ปี</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="unit" value="<?php echo $row['unit'];?>" required/>
																<span class="help-block"> กรอกข้อมูลเวลาเรียน/ปี เช่น 40 ชม. (เท่ากับ 1 หน่วยกิต)</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หน่วยกิต</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="weight" value="<?php echo $row['weight'];?>" required/>
																<span class="help-block"> กรอกข้อมูลหน่วยกิต เช่น 2 </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ประเภทรายวิชา</label>

															<div class="col-md-8">
																		<select name="subt" class="form-control" required>
																			<option value="" disabled selected>เลือกประเภทรายวิชา</option>
																			<?php
																			$sql = "SELECT * FROM  tb_subject_type ORDER BY subt_name ASC";
																			$tst = result_array($sql);
																			?>

																			<?php foreach ($tst as $_tst) { ?>
																				<option <?php echo $_tst['subt_id'] == $row['subt_id'] ? "selected":""; ?> value="<?php echo $_tst['subt_id'] ?>"><?php echo "$_tst[subt_name]";?></option>
																			<?php } ?>
																			</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ระดับชั้น</label>

															<div class="col-md-8">
																		<select name="check_grade" class="form-control">
																			<option value="" selected>เลือกระดับชั้น</option>
																			<?php
																			$sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
																			$tst = result_array($sql);
																			?>

																			<?php foreach ($tst as $_tst) { ?>
																				<option <?php echo $_tst['grade_id'] == $row['grade_id'] ? "selected":""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]";?></option>
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