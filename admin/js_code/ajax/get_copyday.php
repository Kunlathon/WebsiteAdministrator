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
$cy = $_GET['cy'];
$day = $_GET['day'];

$sql = "SELECT * FROM tb_timetable WHERE timetable_id = '{$id}'";
$row = row_array($sql);

$check_term = $row['term_id'];
?>			
											<form action="process/copyday_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มสำเนาตารางสอนภาคปกติ ชั้นปีที่ <?php echo $cy; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $row['term_id']; ?>">
													<input type="hidden" name="course" id="course" value="<?php echo $cid; ?>">
													<input type="hidden" name="cy" value="<?php echo $cy;?>">	
													<input type="hidden" name="day" value="<?php echo $day;?>">	

															<div class="form-group">
															<label class="col-md-4 control-label">ภาคเรียน</label>

															<div class="col-md-8">
																			<?php
																			$sql = "SELECT * FROM tb_term WHERE term_id = '$row[term_id]'";
																			$_wt = row_array($sql);
																			?>

																			<?php echo "$_wt[term]/$_wt[year]";?>
															</div>
														</div>
														<div>&nbsp;</div>			

														<div class="form-group">
															<label class="col-md-4 control-label">วัน</label>

															<div class="col-md-8">
															<?php
																if ($day==1) {
																	 $day="จันทร์";

																 } else  if ($day==2) {
																	$day="อังคาร";

																 } else  if ($day==3) {
																	$day="พุธ";

																} else  if ($day==4) {
																	$day="พฤหัสบดี";

																} else  if ($day==5) {
																	$day="ศุกร์";

																} else  if ($day==6) {
																	$day="เสาร์";

																} else  if ($day==7) {
																	$day="อาทิตย์";

																}
																echo $day;
															?>
															</div>
														</div>
														<div>&nbsp;</div>		
														
														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(ต้นฉบับ)</label>

															<div class="col-md-8">
																			<?php
																			$sql = "SELECT * FROM  tb_course a INNER JOIN tb_course_detail b ON a.course_id = b.course_id WHERE a.course_id='{$cid}' AND a.term_id='{$check_term}' AND a.part='ภาคปกติ' AND a.course_year='{$cy}' GROUP BY b.course_id ASC ORDER BY a.major_id ASC,a.course_name ASC";
																			$_tcr = row_array($sql);
																			?>
																			<?php 
																				$clid=$_tcr['classroom_id'];
																				$sqlCl = "SELECT * FROM tb_classroom a INNER JOIN tb_building b ON a.building_id = b.building_id  WHERE a.classroom_id = '{$clid}'";
																				$rowCl= row_array($sqlCl);
																			?>
																			<?php 
																				$mid=$_tcr['major_id'];
																				$sqlM = "SELECT * FROM tb_major WHERE major_id='{$mid}'";
																				$rowM= row_array($sqlM);
																			?>
																			<?php echo "ชั้นปีที่&nbsp;$_tcr[course_year]&nbsp;สาชาวิชา&nbsp;$rowM[major_name]&nbsp;($_tcr[part]/$_tcr[student_type])&nbsp;ห้อง&nbsp;$rowCl[classroom_name]&nbsp;$rowCl[building_name]";?>

															</div>
														</div>
														<div>&nbsp;</div>
														
														<div class="form-group">
															<label class="col-md-4 control-label">หลักสูตร(สำเนา)</label>

															<div class="col-md-8">
																		<select name="course2" class="form-control" required>
																			<option value="" disabled selected>เลือกหลักสูตร</option>
																			<?php
																			$sql = "SELECT * FROM  tb_course a INNER JOIN tb_course_detail b ON a.course_id = b.course_id WHERE a.course_id!='{$cid}' AND a.term_id='{$check_term}' AND a.part='ภาคปกติ' AND a.course_year='{$cy}' GROUP BY b.course_id ASC ORDER BY a.major_id ASC,a.course_name ASC";
																			$tcr = result_array($sql);
																			?>

																			<?php foreach ($tcr as $_tcr) { ?>
																			<?php 
																				$clid=$_tcr['classroom_id'];
																				$sqlCl = "SELECT * FROM tb_classroom a INNER JOIN tb_building b ON a.building_id = b.building_id  WHERE a.classroom_id = '{$clid}'";
																				$rowCl= row_array($sqlCl);
																			?>
																			<?php 
																				$mid=$_tcr['major_id'];
																				$sqlM = "SELECT * FROM tb_major WHERE major_id='{$mid}'";
																				$rowM= row_array($sqlM);
																			?>
																				<option value="<?php echo $_tcr['course_id'] ?>"><?php echo "ชั้นปีที่&nbsp;$_tcr[course_year]&nbsp;สาชาวิชา&nbsp;$rowM[major_name]&nbsp;($_tcr[part]/$_tcr[student_type])&nbsp;ห้อง&nbsp;$rowCl[classroom_name]&nbsp;$rowCl[building_name]";?></option>
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