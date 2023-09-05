<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
//$tid = $_GET['tid'];
$clid = $_GET['clid'];
$check_grade = $_GET['check_grade'];
$check_term = $_GET['check_term'];
//$type = $_GET['type'];
$ctid = $_GET['ctid'];

$sql = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id INNER JOIN tb_assessment_classroom c ON b.a_classroom_id=c.a_classroom_id WHERE a.assessment_id = '{$id}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.a_classroom_id = '{$clid}'";
//$sql = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id INNER JOIN tb_assessment_classroom c ON b.a_classroom_id=c.a_classroom_id WHERE a.assessment_id = '{$id}' AND c.teacher_id1 = '{$tid}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.a_classroom_id = '{$clid}'";

//echo $sql;
$row = row_array($sql);

$tid1=$row['teacher_id1'];
$tidE=$row['teacher_esl'];
?>			
											<form action="process/rate_add_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ระดับคะแนน ห้องเรียน <?php echo $row['a_classroom_name']; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="asid" id="asid" value="<?php echo $id; ?>">
													<input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">									
													<input type="hidden" name="ctid" id="ctid" value="<?php echo $ctid; ?>">

													<div class="form-group">
															<label class="col-md-12 control-label">ระดับชั้น <?php echo $check_grade;?> ห้องเรียน <?php echo $row['a_classroom_name']; ?></label>
													</div>
													<div>&nbsp;</div>

														<div class="form-group">

															<div class="col-md-12">

													<table class="table table-striped table-hover">
														<thead>
															 <tr bgcolor="#dcdcdc">
																<th width="30" align="center"> ลำดับ </th>
																<th width="40" align="center"> รหัส </th>
																<th align="center"> รายชื่อ </th>
																<th width="100" align="center"> ชื่อเล่น </th>
																<th width="50" align="center">
																<?php echo $row['assessment_name'];?>
																</th>
																</th>
															</tr>
														<tr>
															<th colspan="4">&nbsp;</th>
															<th align="center" width="50">
															<?php 
															echo $row['score_max'];
															$max = $row['score_max'];
															?>
															</th>
														</tr>
                                                </thead>
														<tbody>
														<?php 
															$sum_s = 0;					
															
															$sql = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$clid}' AND a.a_classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status = '1' ORDER BY b.student_no ASC"; 
															$list = result_array($sql);
														?>
														<?php foreach ($list as $key => $row) { 								
														
															$stuid = $row['student_id'];
														
															$sqlCouC = "SELECT * , COUNT(c.course_s_detail_id) AS NUM FROM tb_course_class a INNER JOIN tb_course_student b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_student_detail c ON b.course_s_id = c.course_s_id INNER JOIN tb_course_class_level d ON c.course_class_level_id = d.course_class_level_id WHERE a.classroom_t_id='{$ctid}' AND b.student_id='{$stuid}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND (d.course_class_level_name = 'ESL-B' OR d.course_class_level_name = 'ESL-I' OR d.course_class_level_name = 'ESL-A') AND c.course_class_level_check='1' AND a.course_class_status='1'"; 

																//echo "<br>$sqlCouC<br>";
																$rowCouC = row_array($sqlCouC);

																$num_csd = $rowCouC['NUM'];
															
														?>
															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?>&nbsp;
																<?php		

																if ($num_csd  > 0) {
																//} else if ($course_cln == "ESL") {
																	$course_cln_show = "(ESL)";

																} else {
																	$course_cln_show = "";
																}									
																echo "<font color=red>$course_cln_show</font>";
																?>
																</td>
																<td align="left"><?php echo $row['nickname'];?></td>

															<?php													

															$sqlSco = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id WHERE a.assessment_id= '$id' AND (a.assessment_cat_id !='5' OR a.assessment_cat_id !='7') AND b.a_classroom_id = '{$clid}' AND b.student_id='$stuid' ORDER BY a.assessment_sort ASC";

															//echo $sqlSco;
															$listSco = result_array($sqlSco);

															foreach ($listSco as $_sqlSco) { 
															}
															?>
																<td>
																<input id="<?php echo $_sqlSco['assessment_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $_sqlSco['score']; ?>" min="0" max="<?php echo $max;?>">
																<input type="hidden" name="id[]" id="id" value="<?php echo $_sqlSco['assessment_detail_id']; ?>">
																</td>
															</tr>

															<?php 							
															} 
															?>

														</tbody>
													</table>

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