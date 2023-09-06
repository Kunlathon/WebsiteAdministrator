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

$sql = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id INNER JOIN tb_classroom_teacher c ON b.classroom_t_id=c.classroom_t_id WHERE a.character_id = '{$id}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.classroom_t_id = '{$clid}'";
//$sql = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id INNER JOIN tb_classroom_teacher c ON b.classroom_t_id=c.classroom_t_id WHERE a.character_id = '{$id}' AND c.teacher_id1 = '{$tid}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.classroom_t_id = '{$clid}'";

//echo $sql;
$row = row_array($sql);

?>			
											<form action="process/rate_character_add_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ระดับคะแนน ห้องเรียน <?php echo $row['classroom_name']; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="asid" id="asid" value="<?php echo $id; ?>">
													<input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">

													<div class="form-group">
															<label class="col-md-12 control-label">ระดับชั้น <?php echo $check_grade;?> ห้องเรียน <?php echo $row['classroom_name']; ?></label>
													</div>
													<div>&nbsp;</div>

														<div class="form-group">

															<div class="col-md-12">

													<table class="table table-striped table-hover">
														<thead>
															 <tr bgcolor="#dcdcdc">
																<td width="30" align="center"> ลำดับ </td>
																<td width="40" align="center"> รหัส </td>
																<td align="center"> รายชื่อ </td>
																<td width="100" align="center"> ชื่อเล่น </td>
																<td width="50" align="center">
																<?php echo $row['character_name'];?>
																</td>
															</tr>

														<?php
															if($id==12){
																$max = $row['score_max'];
														?>
														<tr>
														<td colspan="5" align="right">1: ผ่าน/Pass , 2: ไม่ผ่าน/Fail</td>
														</tr>
														<?php
														} else {

														?>
															<tr>
															<td colspan="4">&nbsp;</td>
															<td align="center" width="50">
															<?php 
															echo $row['score_max'];
															$max = $row['score_max'];
															?>
															</td>
														</tr>
														<?php
														}

														?>

														

                                                </thead>
														<tbody>
														<?php 
															$sum_s = 0;					
															
															$sql = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$clid}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status = '1' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' ORDER BY b.student_no ASC"; 
															$list = result_array($sql);
														?>
														<?php foreach ($list as $key => $row) { ?>

															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?>
																</td>
																<td align="left"><?php echo $row['nickname'];?></td>

															<?php													

															$sqlSco = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE a.character_id= '$id' AND b.classroom_t_id = '{$clid}' AND b.student_id='$row[student_id]' ORDER BY a.character_sort ASC";

															//echo $sqlSco;
															$listSco = result_array($sqlSco);

															foreach ($listSco as $_sqlSco) { 
															}
															?>
																<td>
																<input id="<?php echo $_sqlSco['character_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $_sqlSco['score']; ?>" min="0" max="<?php echo $max;?>">
																<input type="hidden" name="id[]" id="id" value="<?php echo $_sqlSco['character_detail_id']; ?>">
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