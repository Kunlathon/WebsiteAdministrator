<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$ctid = $_GET['ctid'];
$cid = $_GET['cid'];
$check_term = $_GET['check_term'];
$check_grade = $_GET['check_grade'];

$sql = "SELECT * FROM tb_term a INNER JOIN tb_classroom_teacher b ON a.term_id = b.term_id WHERE a.term_id = '{$check_term}' AND b.classroom_t_id = '{$ctid}' AND b.classroom_id = '{$cid}' AND b.grade_id = '{$check_grade}' AND b.term_id = '{$check_term}' AND b.classroom_status = '1' ORDER BY b.classroom_name ASC";
$row = row_array($sql);

$cid = $row['classroom_id'];
$ctid = $row['classroom_t_id'];
$classroom_name = $row['classroom_name'];
?>			
											<form action="process/importstudent_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มนำเข้าข้อมูลนักเรียนห้องเรียน <?php echo $classroom_name; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="ctid" id="ctid" value="<?php echo $ctid; ?>">
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียน</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="classroom" class="form-control select2-allow-clear" required>
																				<option value="" disabled selected>เลือกห้องเรียน</option>
																				<?php
																				$sql = "SELECT * FROM  tb_classroom_teacher WHERE grade_id = '{$check_grade}' AND term_id = '{$check_term}' ORDER BY classroom_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $row['classroom_t_id']== $_tt['classroom_t_id'] ? "selected":""; ?> value="<?php echo $_tt['classroom_t_id'] ?>"><?php echo "$_tt[classroom_name]";?></option>
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