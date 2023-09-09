<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$cdid = $_GET['cdid'];
$cid = $_GET['cid'];
$check_grade = $_GET['check_grade'];
$check_term = $_GET['check_term'];

?>			
											<form action="process/addteacher2_process.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มเพิ่มครูผู้สอน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">ระดับวิชา</label>

															<div class="col-md-8">
																		<select name="level" class="form-control" required>
																			<option value="" disabled selected>เลือกระดับวิชา</option>
																				<option value="Normal">Normal</option>
																				<option value="TSL-B">TSL-B</option>
																				<option value="TSL-I">TSL-I</option>
																				<option value="TSL-A">TSL-A</option>
																				<!--<option value="ESL">ESL</option>-->
																				<option value="ESL-B">ESL-B</option>
																				<option value="ESL-I">ESL-I</option>
																				<option value="ESL-A">ESL-A</option>
																				<option value="IEP">IEP</option>
																				<option value="IEP-B">IEP-B</option>
																				<option value="IEP-I">IEP-I</option>
																				<option value="IEP-A">IEP-A</option>
																				<option value="HSL-B">HSL-B</option>
																				<option value="HSL-I">HSL-I</option>
																				<option value="HSL-A">HSL-A</option>											
																				<option value="Pre-Intermediate">Pre-Intermediate</option>
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
																					<option value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
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
																<input class="form-control form-control-inline" size="16" type="text" name="rate1" value="" required/>
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
																					<option value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
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
																<input class="form-control form-control-inline" size="16" type="text" name="rate2" value=""/>
																<span class="help-block"> กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">สัดส่วนคะแนนเก็บ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="number" name="score1_1" value="" required/>
																<span class="help-block"> กรอกเปอร์เซ็นต์สัดส่วนคะแนนเก็บ เช่น 70</span>
															</div>
														</div>
														<div>&nbsp;</div>


														<div class="form-group">
															<label class="col-md-4 control-label">สัดส่วนคะแนนสอบ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="number" name="score1_2" value="" required/>
																<span class="help-block"> กรอกเปอร์เซ็นต์สัดส่วนคะแนนสอบ เช่น 30</span>
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