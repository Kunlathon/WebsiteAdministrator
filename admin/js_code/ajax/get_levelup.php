<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];

if (isset($_REQUEST['id'])) {
	$check_grade=$_REQUEST['id'];
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
											<form action="process/levelup_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มเลื่อนชั้นห้องเรียน <?php echo $row['classroom_name']; ?> <?php echo $grade; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $cid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">										

														<div class="modal-body" style="overflow: hidden;">

														<div class="form-group">
															<label class="col-md-4 control-label">ห้องเรียน</label>

																	<div class="col-md-8">
																		<?php echo $row['classroom_name'] ?>
																	</div>
														</div>
														<div>&nbsp;</div>	

														<div class="form-group">
															<label class="col-md-4 control-label">เลื่อนชั้น ไปห้องเรียน</label>

															<div class="col-md-8">
																		<select name="classroom" class="form-control" required>
																			<option value="" disabled selected>เลือกห้องเรียน</option>
																			<?php
																			$sql = "SELECT * FROM tb_classroom WHERE classroom_status ='1' ORDER BY classroom_name ASC";
																			//$sql = "SELECT * FROM tb_classroom WHERE grade_id = '$check_grade' AND classroom_status ='1' ORDER BY classroom_name ASC";
																			$cc = result_array($sql);
																		   ?>
																		   <?php foreach ($cc as $_cc) { ?>
																						<option value="<?php echo $_cc['classroom_id'] ?>"><?php echo $_cc['classroom_name'] ?></option>
																		  <?php } ?>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>	

														<div class="form-group">
															<label class="col-md-4 control-label">ระดับชั้น</label>

															<div class="col-md-8">
																		<select name="grade" class="form-control">
																			<option value="" selected>เลือกระดับชั้น</option>
																			<?php
																			$sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
																			$tst = result_array($sql);
																			?>

																			<?php foreach ($tst as $_tst) { ?>
																				<option <?php echo $_tst['grade_id'] == $check_grade ? "selected":""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]";?></option>
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