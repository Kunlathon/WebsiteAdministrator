<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$cdid = $_GET['cdid'];
$cid = $_GET['cid'];
$lid = $_GET['lid'];
$check_grade = $_GET['check_grade'];
$check_term = $_GET['check_term'];

$sql = "SELECT * FROM tb_course_class_level WHERE course_class_level_id='{$lid}' AND course_class_level_status='1'";
$row = row_array($sql);

?>			
											<form action="process/editteacherteach_process.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขครูผู้สอน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">
													<input type="hidden" name="lid" id="lid" value="<?php echo $lid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">ระดับวิชา</label>

															<div class="col-md-8">
																		<select name="level" class="form-control" required>
																			<option value="" disabled selected>เลือกระดับวิชา</option>
																				<option <?php echo $row['course_class_level_name']== "Normal" ? "selected":""; ?> value="Normal" >Normal</option>
																				<option <?php echo $row['course_class_level_name']== "TSL-B" ? "selected":""; ?> value="TSL-B">TSL-B</option>
																				<option <?php echo $row['course_class_level_name']== "TSL-I" ? "selected":""; ?> value="TSL-I">TSL-I</option>
																				<option <?php echo $row['course_class_level_name']== "TSL-A" ? "selected":""; ?> value="TSL-A">TSL-A</option>
																				<!--<option <?php echo $row['course_class_level_name']== "ESL" ? "selected":""; ?> value="ESL">ESL</option>-->
																				<option <?php echo $row['course_class_level_name']== "ESL-B" ? "selected":""; ?> value="ESL-B">ESL-B</option>
																				<option <?php echo $row['course_class_level_name']== "ESL-I" ? "selected":""; ?> value="ESL-I">ESL-I</option>
																				<option <?php echo $row['course_class_level_name']== "ESL-A" ? "selected":""; ?> value="ESL-A">ESL-A</option>
																				<option <?php echo $row['course_class_level_name']== "IEP" ? "selected":""; ?> value="IEP">IEP</option>
																				<option <?php echo $row['course_class_level_name']== "IEP-B" ? "selected":""; ?> value="IEP-B">IEP-B</option>
																				<option <?php echo $row['course_class_level_name']== "IEP-I" ? "selected":""; ?> value="IEP-I">IEP-I</option>
																				<option <?php echo $row['course_class_level_name']== "IEP-A" ? "selected":""; ?> value="IEP-A">IEP-A</option>
																				<option <?php echo $row['course_class_level_name']== "HSL-B" ? "selected":""; ?> value="HSL-B">HSL-B</option>
																				<option <?php echo $row['course_class_level_name']== "HSL-I" ? "selected":""; ?> value="HSL-I">HSL-I</option>
																				<option <?php echo $row['course_class_level_name']== "HSL-A" ? "selected":""; ?> value="HSL-A">HSL-A</option>																				
																				<option <?php echo $row['course_class_level_name']== "Pre-Intermediate" ? "selected":""; ?> value="Pre-Intermediate">Pre-Intermediate</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

													<div class="form-group">
															<label class="col-md-4 control-label">ครูผู้สอน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add2-1" name="teacher1" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกครูผู้สอน</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																				<?php } ?>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add2-1">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>
														
														<div class="form-group">
															<label class="col-md-4 control-label">หน่วยกิตคะแนน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="rate1" value="<?php echo $row['rate1'];?>" required/>
																<span class="help-block"> กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ครูผู้สอน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add2-2" name="teacher2" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกครูผู้สอน</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['teacher_id2']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																				<?php } ?>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add2-2">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หน่วยกิตคะแนน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="rate2" value="<?php echo $row['rate2'];?>"/>
																<span class="help-block"> กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">สัดส่วนคะแนนเก็บ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="number" name="score1_1" value="<?php echo $row['score1_1'];?>" required/>
																<span class="help-block"> กรอกเปอร์เซ็นต์สัดส่วนคะแนนเก็บ เช่น 70</span>
															</div>
														</div>
														<div>&nbsp;</div>


														<div class="form-group">
															<label class="col-md-4 control-label">สัดส่วนคะแนนสอบ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="number" name="score1_2" value="<?php echo $row['score1_2'];?>" required/>
																<span class="help-block"> กรอกเปอร์เซ็นต์สัดส่วนคะแนนสอบ เช่น 30</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<!--<div class="form-group">
															<label class="col-md-4 control-label">ครูผู้สอน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add3-2" name="teacher3" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกครูผู้สอน</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																				<?php } ?>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add3-2">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">หน่วยกิตคะแนน</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="rate3" value="<?php echo $row['rate3'];?>"/>
																<span class="help-block"> กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>
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
										
		<!-- BEGIN PAGE LEVEL PLUGINS -->	
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->