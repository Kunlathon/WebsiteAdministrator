<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$tid = $_GET['tid'];

$sqlE = "SELECT * FROM tb_examtable a INNER JOIN tb_examtable_teacher b ON a.examtable_id=b.examtable_id WHERE a.examtable_id = '{$id}' AND b.examtable_teacher_id = '{$tid}'";
$rowE = row_array($sqlE);

$check_term=$rowE['term_id'];
$sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}' ORDER BY year DESC , term DESC";
$row = row_array($sql);	
$term="$row[term]/$row[year]";

$examroomid = $rowE['examroom_id'];

$sqlC = "SELECT * FROM tb_examroom a INNER JOIN tb_classroom b ON a.classroom_id = b.classroom_id INNER JOIN tb_building c ON b.building_id = c.building_id WHERE a.examroom_id = '$examroomid'";
$rowC= row_array($sqlC);

if($rowC['classroom_class']!="") {
	$room = "ห้อง&nbsp;$rowC[classroom_name]&nbsp;ชั้น&nbsp;$rowC[classroom_class]&nbsp;$rowC[building_name]";
} else if($rowC['classroom_class']=="") {
	$room = "ห้อง&nbsp;$rowC[classroom_name]&nbsp;$rowC[building_name]";
}

?>			
											<form action="process/addteacherexam_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขอาจารย์คุมสอบ</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $tid; ?>">
													<input type="hidden" name="etid" id="etid" value="<?php echo $id; ?>">
													<input type="hidden" name="eid" id="eid" value="<?php echo $examroomid; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $check_term;?>">	

														<div class="form-group">
															<label class="col-md-4 control-label">ภาคเรียน</label>

															<div class="col-md-8">
																<?php echo $term;?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ห้องสอบ</label>

																<div class="col-md-8">
																	<?php echo "$room";?>
																</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">นิสิตชั้นปี</label>

															<div class="col-md-8">
																ชั้นปีที่ <?php echo $rowE['course_year'];?>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">วันที่สอบ</label>
																	<div class="col-md-8">
																		<?php echo date_th($rowE['course_year']);?>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">เวลา</label>
															<div class="col-md-8">
																<?php echo "$rowE[time_start]";?> - <?php echo "$rowE[time_end]";?> น.

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">รายวิชา</label>
															
																<div class="col-md-8">
																				<?php
																				$sqlS = "SELECT * FROM  tb_timetable a INNER JOIN tb_timetable_detail b ON a.timetable_id = b.timetable_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id WHERE a.term_id='{$check_term}' AND a.part='ภาคปกติ' AND c.subject_id='$rowE[subject_id]'";
																				
																				$rowS = row_array($sqlS);
																				?>

																				<?php echo "$rowS[subject_code]";?> - <?php echo "$rowS[subject_name]";?>&nbsp;<?php echo "$rowS[subject_name_eng]";?>
																</div>

														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">อาจารย์คุมสอบ <a href="?modules=check_teacher_exam" target="blank">เช็ค</a></label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="teacher3" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกอาจารย์</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher WHERE status_teacher = '1' ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $rowE['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
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
															<label class="col-md-4 control-label">อาจารย์คุมสอบ <a href="?modules=check_teacher_exam" target="blank">เช็ค</a></label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="teacher4" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกอาจารย์</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher WHERE status_teacher = '1' ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $rowE['teacher_id4']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
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
															<label class="col-md-4 control-label">อาจารย์คุมสอบ <a href="?modules=check_teacher_exam" target="blank">เช็ค</a></label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="teacher5" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกอาจารย์</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher WHERE status_teacher = '1' ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $rowE['teacher_id5']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
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