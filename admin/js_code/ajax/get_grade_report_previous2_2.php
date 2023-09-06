<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

$now_date = date('Y-m-d');

//$id = $_POST['id'];
$id = $_GET['id'];
$classroom = $_GET['classroom'];
$check_term = $_GET['check_term'];
$check_grade = $_GET['check_grade'];

$sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
$row = row_array($sql);

$classroomid = $row['classroom_id'];

$sqlstu = "SELECT * FROM tb_student WHERE student_id = '{$id}'";
$rowstu = row_array($sqlstu);

$sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
$rowc = row_array($sqlc);
?>			
											<form action="document/grade_report_previous2_2.php" method="post" target="_blank">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มตั้งค่าการพิมพ์คะแนนครํ้งที่ 2 (ย้อนหลัง)</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom; ?>">
													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">

													<!--<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['classroom_name'] ?>" required/>
																<span class="help-block"> กรอกข้อมูลห้องเรียน เช่น Grade 1A , Grade 2A</span>
															</div>
														</div>
														<div>&nbsp;</div>-->

														<div class="form-group">
															<label class="col-md-4 control-label">เลขประจำตัวนักเรียน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<?php echo $rowstu['student_id'];?>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ชื่อ-สกุล</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<?php echo $rowstu['student_name']; ?>&nbsp;<?php echo $rowstu['student_surname']; ?>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<?php echo $rowc['classroom_name']; ?>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ฝ่ายวิชาการ</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="teacher1" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
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
															<label class="col-md-4 control-label">ตำแหน่งฝ่ายวิชาการ</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-2" name="position1" class="form-control select2-allow-clear">
																					<option value="1" selected>School Registrar</option>
																					<option value="2">Academic Affairs</option>
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
															<label class="col-md-4 control-label">ฝ่ายอำนวยการ</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="teacher2" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
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
															<label class="col-md-4 control-label">ตำแหน่งฝ่ายอำนวยการ</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-2" name="position2" class="form-control select2-allow-clear">
																					<option value="3" selected>School Director</option>
																					<option value="4">Deputy Director</option>
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
															<label class="col-md-4 control-label">วันที่</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline input-medium date-picker" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
																<span class="help-block"> กรอกข้อมูลวันที่</span>
															</div>
														</div>
														<div>&nbsp;</div>	


												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn green">พิมพ์</button>
											<button type="button" class="btn dark btn-outline" data-dismiss="modal">ปิด</button>
										</div>
										</form>


		<!-- BEGIN PAGE LEVEL PLUGINS -->	
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

		<!-- BEGIN PAGE LEVEL SCRIPTS -->
			<!-- <script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS -->
