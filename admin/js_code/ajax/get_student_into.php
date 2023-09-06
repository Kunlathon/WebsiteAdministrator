<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];

if (isset($_REQUEST['check_grade'])) {
	$check_grade=$_REQUEST['check_grade'];
	$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
	$row = row_array($sql);	
	$grade="ระดับชั้น$row[grade_name]";
} else if (!isset($_REQUEST['id'])) {
	$grade="";
} 

$cid = $_GET['cid'];

$sql = "SELECT * FROM tb_classroom WHERE classroom_id = '{$cid}'";
$row = row_array($sql);

?>			
											<form action="process/student_into_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มนำเข้าห้องเรียน <?php echo $row['classroom_name']; ?> <?php echo $grade; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $cid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">										

														<div class="modal-body" style="overflow: hidden;">

														<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียนที่นำเข้า</label>

																	<div class="col-md-8">
																		<?php echo $row['classroom_name']; ?>
																	</div>
														</div>
														<div>&nbsp;</div>	

														<div class="form-group">
															<label class="col-md-4 control-label">นักเรียน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="stuid" class="form-control select2-allow-clear">
																				<option value="" disabled selected>เลือกนักเรียน</option>
																				<?php
																				$sql = "SELECT * FROM  tb_student WHERE student_status='3' ORDER BY student_name ASC";
																				$cr = result_array($sql);
																				?>

																				<?php foreach ($cr as $_cr) { ?>
																					<option value="<?php echo $_cr['student_id'];?>"><?php echo $_cr['student_id'];?> - <?php echo "$_cr[student_name]";?>&nbsp;<?php echo "$_cr[student_surname]";?></option>
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