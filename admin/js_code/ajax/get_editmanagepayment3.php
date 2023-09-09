<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_payment WHERE payment_id = '{$id}'";
$row = row_array($sql);

$sqlTer = "SELECT * FROM tb_term WHERE term_id = '$row[term_id]'";
$rowTer = row_array($sqlTer);
?>			
											<form action="process/managepayment3_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขการชำระเงิน</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $rowTer['term']; ?>">
													<input type="hidden" name="term_year" id="term_year" value="<?php echo $rowTer['year']; ?>">
													<input type="hidden" name="action" id="action" value="edit">

														<div class="form-group">
															<label class="col-md-4 control-label">ปีการศึกษา</label>

															<div class="col-md-8">
																<?php echo $rowTer['term']; ?>/<?php echo $rowTer['year']; ?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">คะแนน ครํ้งที่ 1</label>
															
															<div class="col-md-8">
																		<select name="score1" class="form-control input-medium" required>
																			<option value="" disabled selected>เลือกการใช้งาน</option>
																			<option <?php echo $row['payment_score1']== 1 ? "selected":""; ?> value="1">เปิดการใช้งาน</option>
																			<option <?php echo $row['payment_score1']== 0 ? "selected":""; ?> value="0">ปิดการใช้งาน</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">คะแนน ครํ้งที่ 2</label>
															
															<div class="col-md-8">
																		<select name="score2" class="form-control input-medium" required>
																			<option value="" disabled selected>เลือกการใช้งาน</option>
																			<option <?php echo $row['payment_score2']== 1 ? "selected":""; ?> value="1">เปิดการใช้งาน</option>
																			<option <?php echo $row['payment_score2']== 0 ? "selected":""; ?> value="0">ปิดการใช้งาน</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">สัมฤทธิ์</label>
															
															<div class="col-md-8">
																		<select name="score3" class="form-control input-medium" required>
																			<option value="" disabled selected>เลือกการใช้งาน</option>
																			<option <?php echo $row['payment_score3']== 1 ? "selected":""; ?> value="1">เปิดการใช้งาน</option>
																			<option <?php echo $row['payment_score3']== 0 ? "selected":""; ?> value="0">ปิดการใช้งาน</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">GPA</label>
															
															<div class="col-md-8">
																		<select name="score4" class="form-control input-medium" required>
																			<option value="" disabled selected>เลือกการใช้งาน</option>
																			<option <?php echo $row['payment_score4']== 1 ? "selected":""; ?> value="1">เปิดการใช้งาน</option>
																			<option <?php echo $row['payment_score4']== 0 ? "selected":""; ?> value="0">ปิดการใช้งาน</option>
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