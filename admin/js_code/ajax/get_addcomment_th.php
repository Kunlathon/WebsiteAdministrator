<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$sid = $_GET['sid'];
$clid = $_GET['clid'];
$check_grade = $_GET['check_grade'];
$check_term = $_GET['check_term'];
//$type = $_GET['type'];

$sql = "SELECT * FROM tb_assessment a INNER JOIN tb_assessment_detail b ON a.assessment_id=b.assessment_id INNER JOIN tb_assessment_classroom c ON b.a_classroom_id=c.a_classroom_id WHERE b.assessment_detail_id = '{$id}' AND b.student_id='$sid' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.a_classroom_id = '{$clid}'";

//echo $sql;
$row = row_array($sql);

$memo = $row['memo'];
$assessment_name = $row['assessment_name'];
?>			
											<form action="process/comment_add_th_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">Comment Classroom <?php echo $row['a_classroom_name']; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="assid" id="assid" value="<?php echo $id; ?>">
													<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
													<input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">

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
															</tr>
                                                    </tr>
                                                </thead>
														<tbody>
														<?php 
															$sum_s = 0;					
															
															$sql = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$clid}' AND a.a_classroom_detail_status='1' AND b.student_id='$sid' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC"; 
															$row = row_array($sql);
														?>
															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?>&nbsp;
																<?php
																if($row['a_student_type']==2) {
																?>
																	<font color='red'>(ESL)</font>

																<?php
																}														
																?>
																</td>
																<td align="left"><?php echo $row['nickname'];?></td>

															</tr>

															<tr>
																<td align="center" colspan="4">
																<div class="form-group">
																	<label class="col-md-12 control-label"><strong><?php echo $assessment_name;?></strong></label>	
																</div>	
																<div>&nbsp;</div>
															</td>
															</tr>

															<tr>
																<td align="center" colspan="4">
																<div class="form-group">													
																	<div class="col-md-12">
																			<textarea class="form-control" rows="7" name="txtdetail"><?php echo $memo;?></textarea>
																			<!--<textarea class="form-control" rows="5" name="txtdetail" maxlength="500"><?php echo $memo;?></textarea>-->
																			<!--<textarea class="wysihtml5 form-control" rows="3" name="txtdetail" maxlength="500"><?php echo $memo;?></textarea>-->
																			<span class="help-block"> <font color='red'>Comments do not exceed 350 characters.</font></span>
																	</div>
																</div>	
																<div>&nbsp;</div>
															</td>
															</tr>															

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