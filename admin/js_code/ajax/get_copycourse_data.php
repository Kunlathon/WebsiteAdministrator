<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];

$id = $_GET['id'];

$sqlCl = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$id}'";
$rowCl = row_array($sqlCl);	

if (isset($_REQUEST['check_grade'])) {
	$check_grade=$_REQUEST['check_grade'];
	$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
	$row = row_array($sql);	
	$grade="ระดับชั้น$row[grade_name]";
} else if (!isset($_REQUEST['id'])) {
	$grade="";
} 

if (isset($_REQUEST['check_term'])) {
	$check_term=$_REQUEST['check_term'];
	$sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
	$row = row_array($sql);	
	$term="$row[term]/$row[year]";
} else if (!isset($_REQUEST['check_term'])) {
	$sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
	$row = row_array($sql);
	$check_term=$row['term_id'];
	$term="$row[term]/$row[year]";
} 

?>			
											<form action="process/copycourse_data_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มสำเนาหลักสูตร <?php echo $grade; ?> ห้องเรียน <?php echo $rowCl['classroom_name']; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade; ?>">										

														<div class="modal-body" style="overflow: hidden;">

														<div class="form-group">
															<label class="col-md-4 control-label">ภาคเรียน(ต้นฉบับ)</label>

															<div class="col-md-8">
															<?php echo $row['term'] ?>/<?php echo $row['year'] ?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ภาคเรียน(สำเนา)</label>

															<div class="col-md-8">
																		<select name="term_copy" class="form-control">
																			<option value="" selected>เลือกภาคเรียน</option>
																			<?php
																			$sql = "SELECT * FROM tb_term WHERE grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
																			$tst = result_array($sql);
																			?>

																			<?php foreach ($tst as $_tst) { ?>
																				<option value="<?php echo $_tst['term_id'] ?>"><?php echo "$_tst[term]/$_tst[year]";?></option>
																			<?php } ?>
																			</select>

															</div>
														</div>
														<div>&nbsp;</div>

														<!--<div class="form-group">
															<label class="col-md-4 control-label">หมายเหตุ</label>

															<div class="col-md-8">
																<textarea class="form-control" rows="3" name="memo"><?php echo $row['memo'] ?></textarea>
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