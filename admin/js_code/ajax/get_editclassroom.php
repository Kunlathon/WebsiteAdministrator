<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$check_term = $_GET['check_term'];
$check_grade = $_GET['check_grade'];

$sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$id}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
$row = row_array($sql);

$classroomid = $row['classroom_id'];

$sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
$rowc = row_array($sqlc);
?>			
											<form action="process/classroom_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขห้องเรียน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade; ?>">

													<!--<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['classroom_name'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลห้องเรียน เช่น Grade 1A , Grade 2A</span>
															</div>
														</div>
														<div>&nbsp;</div>-->

														<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="classroomid" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกห้องเรียน</option>
																				<?php
																				$sql = "SELECT * FROM  tb_classroom WHERE grade_id = '$check_grade' ORDER BY classroom_name ASC";
																				$cr = result_array($sql);
																				?>

																				<?php foreach ($cr as $_cr) { ?>
																					<option <?php echo $rowc['classroom_id']== $_cr['classroom_id'] ? "selected":""; ?> value="<?php echo $_cr['classroom_id'];?>"><?php echo "$_cr[classroom_name]";?></option>
																				<?php } ?>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add1-1">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<!--<div class="form-group">
															<label class="col-md-4 control-label">ชั้นเรียน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline input-medium" size="16" type="number" name="class" value="<?php echo $row['classroom_class'] ?>" />
																<span class="help-block"> กรอกข้อมูลชั้นเรียน เช่น Grade 1A , Grade 2A</span>
															</div>
														</div>
														<div>&nbsp;</div>-->

														<!--<div class="form-group">
															<label class="col-md-4 control-label">จำนวนนักเรียน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline input-medium" size="16" type="number" name="num" value="<?php echo $row['student_num'] ?>" />
																<span class="help-block"> กรอกข้อมูลจำนวนนักเรียน</span>
															</div>
														</div>
														<div>&nbsp;</div>-->

													<!--<div class="form-group">
															<label class="col-md-4 control-label">อาคารเรียน</label>

															<div class="col-md-8">
																		<select name="building" class="form-control" required>
																			<option value="" disabled selected>เลือกอาคารเรียน</option>
																			<?php
																			$sql = "SELECT * FROM tb_building ORDER BY building_name DESC";
																			$tbd = result_array($sql);
																			?>

																			<?php foreach ($tbd as $_tbd) { ?>
																					<option <?php echo $row['building_id']== $_tbd['building_id'] ? "selected":""; ?> value="<?php echo $_tbd['building_id'] ?>"><?php echo "$_tbd[building_name]";?></option>
																			<?php } ?>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>-->

														<div class="form-group">
															<label class="col-md-4 control-label">ครูประจำชั้น(Eng)</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="teacher1" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกครูประจำชั้น(Eng)</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher WHERE teacher_status='1'  ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																				<?php } ?>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add1-1">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ตำแหน่งครูประจำชั้น</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-2" name="position1" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกตำแหน่งครูประจำชั้น</option>
																					<option value="1" <?php echo $row['position_id1']== 1 ? "selected":""; ?>>English Homeroom Teacher</option>
																					<option value="2" <?php echo $row['position_id1']== 2 ? "selected":""; ?>>Academic Affairs</option>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add1-2">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ครูประจำชั้น(Tha)</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-2" name="teacher2" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกครูประจำชั้น(Tha)</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher WHERE teacher_status='1' ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['teacher_id2']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																				<?php } ?>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add1-2">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ฝ่ายวิชาการ</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="teacher3" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																				<?php } ?>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add1-1">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
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

		<!-- BEGIN PAGE LEVEL PLUGINS -->	
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->