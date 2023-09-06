<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];

if (isset($_GET['check_grade'])) {
	$check_grade=$_GET['check_grade'];
	$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
	$row = row_array($sql);	
	$grade_name="ระดับชั้น$row[grade_name]";
} else if (!isset($_GET['check_grade'])) {
	$grade_name="";
} 

$id = $_GET['id'];
$rid = $_GET['rid'];

$check_term = $_GET['check_term'];

$sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$id}'";
$row = row_array($sql);

$course_id = $row['course_id'];

?>			
											<form action="process/course_class_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขหลักสูตร <?php echo $grade_name; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="course" id="course" value="<?php echo $course_id; ?>">
													<input type="hidden" name="cclass" id="cclass" value="<?php echo $rid; ?>">
													<input type="hidden" name="type_course" id="type_course" value="1">

															<div class="form-group">
															<label class="col-md-4 control-label">ภาคเรียน</label>

															<div class="col-md-8">
																		<select name="check_term" class="form-control" required>
																			<option value="" disabled selected>เลือกภาคเรียน</option>
																			<?php
																			$sql = "SELECT * FROM tb_term ORDER BY year DESC , term DESC";
																			$wt = result_array($sql);
																			?>

																			<?php foreach ($wt as $_wt) { ?>
																				<option <?php echo $row['term_id']== $_wt['term_id'] ? "selected":""; ?> value="<?php echo $_wt['term_id'] ?>"><?php echo "$_wt[term]/$_wt[year]";?></option>
																			<?php } ?>
																		</select>
															</div>
														</div>
														<div>&nbsp;</div>		

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="txtname" value="<?php echo $row['course_class_name'];?>" required/>
																<span class="help-block"> เช่น โครงสร้างหลักสูตร ระดับชั้นประถมศึกษาปีที่ 1 </span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตรภาษาอังกฤษ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="ename" value="<?php echo $row['course_class_name_eng'];?>"/>
																<span class="help-block"> กรอกข้อมูลหลักสูตรภาษาอังกฤษ </span>
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

														<div class="form-group">
															<label class="col-md-4 control-label">ปีที่</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="cy" value="<?php echo $row['course_class_year'];?>" required/>
																<span class="help-block"> กรอกข้อมูลปี เช่น 1 , 2 , 3</span>
															</div>
														</div>
														<div>&nbsp;</div>
														
														<div class="form-group">
															<label class="col-md-4 control-label">หมายเหตุ</label>

															<div class="col-md-8">
																<textarea class="form-control" rows="3" name="memo"><?php echo $row['memo'] ?></textarea>
															</div>
														</div>
														<div>&nbsp;</div>

														<!--<div class="form-group">
															<label class="col-md-4 control-label">ประเภทหลักสูตร</label>

															<div class="col-md-8">
																		<select name="type_course" class="form-control">
																				<option <?php echo $row['course_class_type'] == 1 ? "selected":""; ?> value="1">ปกติ</option>
																				<option <?php echo $row['course_class_type'] == 2 ? "selected":""; ?> value="2">TSL</option>
																				<option <?php echo $row['course_class_type'] == 3 ? "selected":""; ?> value="3">ESL</option>
																				<option <?php echo $row['course_class_type'] == 4 ? "selected":""; ?> value="4">TSL/ESL</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>-->

												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn green">บันทึก</button>
											<button type="button" class="btn dark btn-outline" data-dismiss="modal">ปิด</button>
										</div>
										</form>