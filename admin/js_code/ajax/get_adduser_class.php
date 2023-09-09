<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$cid = $_GET['cid'];
$check_term = $_GET['term'];
$check_grade = $_GET['grade'];

$sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$id}' AND grade_id = '{$check_grade}' AND term_id = '{$check_term}'";
$row = row_array($sql);

$classroom = $row['classroom_t_id'];
$classroomstu = $row['classroom_id'];
$classroom_name = $row['classroom_name'];

?>			
											<form action="process/adduser_class_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มข้อมูลนักเรียนห้องเรียน <?php echo $classroom_name; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">นักเรียน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="stuid" class="form-control select2-allow-clear" required>
																				<option value="" disabled selected>เลือกนักเรียน</option>
																				<?php
																					$sql = "SELECT * FROM tb_student WHERE grade_id = '$check_grade' AND student_class = '{$classroomstu}' AND student_status='1' ORDER BY student_name ASC";
																					$sj = result_array($sql);
																				?>

																				<?php foreach ($sj as $_sj) { ?>
																					<option value="<?php echo $_sj['student_id'] ?>"><?php echo  $_sj['student_id']; ?>&nbsp;-&nbsp;<?php echo  $_sj['student_name']; ?>&nbsp;<?php echo  $_sj['student_surname']; ?></option>
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