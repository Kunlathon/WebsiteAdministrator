<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$tid = $_GET['tid'];

$sql = "SELECT * FROM tb_examtable a INNER JOIN tb_examtable_teacher b ON a.examtable_id=b.examtable_id WHERE a.examtable_id = '{$id}' AND b.examtable_teacher_id = '{$tid}'";
$row = row_array($sql);
?>			
											<form action="process/roomexam_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขห้องสอบ</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
													<input type="hidden" name="id" id="id" value="<?php echo $row['examtable_teacher_id']; ?>">
													<input type="hidden" name="eid" id="eid" value="<?php echo $row['examtable_id']; ?>">
													<input type="hidden" name="cy" id="cy" value="<?php echo $row['course_year']; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $row['term_id']; ?>">

														<div class="form-group">
															<label class="col-md-4 control-label">ห้องสอบภาคปกติ</label>

															<div class="col-md-8">
																		<select name="room" class="form-control" required>
																			<option value="" disabled selected>เลือกห้องสอบ</option>
																			<?php
																			$sql = "SELECT * FROM  tb_examroom a INNER JOIN tb_classroom b ON a.classroom_id = b.classroom_id WHERE a.term_id='{$row[term_id]}' AND a.part='ปกติ' ORDER BY b.classroom_name ASC";
																			//$sql = "SELECT * FROM  tb_examroom a INNER JOIN tb_classroom b ON a.classroom_id = b.classroom_id AND a.term_id='{$id}' AND a.part='ปกติ' ORDER BY b.classroom_name ASC";
																			$ter = result_array($sql);
																			?>

																			<?php foreach ($ter as $_ter) { ?>
																				<option <?php echo $row['examroom_id']== $_ter['examroom_id'] ? "selected":""; ?> value="<?php echo $_ter['examroom_id'] ?>"><?php echo "$_ter[classroom_name]&nbsp;ชั้น&nbsp;$_ter[classroom_class]";?></option>
																			<?php } ?>
																			</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">อาจารย์คุมสอบ</label>

															<div class="col-md-8">
																		<select name="teacher3" class="form-control">
																			<option value="" selected>เลือกอาจารย์</option>
																			<?php
																			$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
																			$tt = result_array($sql);
																			?>

																			<?php foreach ($tt as $_tt) { ?>
																				<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																			<?php } ?>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">อาจารย์คุมสอบ</label>

															<div class="col-md-8">
																		<select name="teacher4" class="form-control">
																			<option value="" selected>เลือกอาจารย์</option>
																			<?php
																			$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
																			$tt = result_array($sql);
																			?>

																			<?php foreach ($tt as $_tt) { ?>
																				<option <?php echo $row['teacher_id4']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																			<?php } ?>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">อาจารย์คุมสอบ</label>

															<div class="col-md-8">
																		<select name="teacher5" class="form-control">
																			<option value="" selected>เลือกอาจารย์</option>
																			<?php
																			$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
																			$tt = result_array($sql);
																			?>

																			<?php foreach ($tt as $_tt) { ?>
																				<option <?php echo $row['teacher_id5']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
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