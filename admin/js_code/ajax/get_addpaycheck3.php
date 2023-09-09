<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];

$rid = $_GET['rid'];
$pid = $_GET['pid'];
$check_grade = $_GET['check_grade'];
$check_term = $_GET['check_term'];
$scorepay = $_GET['scorepay'];
$pay = $_GET['pay'];

$sqlC = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id='{$rid}' "; 
$rowC = row_array($sqlC);

?>	
											<form action="process/paycheck3_add_process.php" name="frmMain" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">จัดการการจ่ายเงิน ห้องเรียน <?php echo $rowC['classroom_name']; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="rid" id="rid" value="<?php echo $rid; ?>">
													<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="scorepay" id="scorepay" value="<?php echo $scorepay; ?>">
													<input type="hidden" name="pay" id="pay" value="<?php echo $pay; ?>">

													<div>&nbsp;</div>

														<div class="form-group">

															<div class="col-md-12">

													<table class="table table-striped table-hover" id="">
													<!--<table class="table table-striped table-hover" id="sample_2">-->
														<thead>
															 <tr bgcolor="#dcdcdc">
																<th width="30" align="center"> ลำดับ </th>
																<th width="40" align="center"> รหัส </th>
																<th align="center"> รายชื่อ </th>
																<th width="100" align="center"> ชื่อเล่น </th>
																<th width="50" align="center"> จัดการ </th>
																</th>
															</tr>
															<tr bgcolor="#FFFFFF">
																<th width="30" align="center">&nbsp;</th>
																<th width="40" align="center">&nbsp;</th>
																<th align="center">&nbsp;</th>
																<th width="100" align="center">&nbsp;</th>
																<th width="50" align="center">
																<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																	<!--<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />-->
																	<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
																	<span></span>
																</label>
																</th>
															</tr>

														</thead>
														<tbody>
														<?php 		
															
															$sql = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$rid}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC"; 
															$list = result_array($sql);
														?>
														<?php 
														$no = 1;

														foreach ($list as $key => $row) { 
																												
														?>

															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?></td>
																<td align="left"><?php echo $row['nickname'];?></td>

															<?php			
															
															if($scorepay==1) {
																$pays = "AND a.payment_score1='1'";

															} else if ($scorepay==2) {
																$pays = "AND a.payment_score2='1'";

															} else if ($scorepay==3) {
																$pays = "AND a.payment_score3='1'";

															} else if ($scorepay==4) {
																$pays = "AND a.payment_score4='1'";

															}

															$sqlCo = "SELECT * FROM tb_payment a INNER JOIN tb_payment_student b ON a.payment_id = b.payment_id WHERE a.payment_id = '$pid' $pays AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND b.student_id = '$row[student_id]'";

															//echo $sqlCo;
															$rowCo = row_array($sqlCo);	
															
															if($scorepay==1) {
																$sscore = "$rowCo[payment_student_score1]";

															} else if ($scorepay==2) {
																$sscore = "$rowCo[payment_student_score2]";

															} else if ($scorepay==3) {
																$sscore = "$rowCo[payment_student_score3]";

															} else if ($scorepay==4) {
																$sscore = "$rowCo[payment_student_score4]";

															}

															if($sscore == 0) {		
																$checked = "";
															} else if($sscore == 1) {
																$checked = "checked";
															}

															?>
															<td align="center">
																<div class="form-group">
																	<div class="mt-checkbox-list">
																		<label class="mt-checkbox mt-checkbox-outline">
																			<input type="checkbox" value="1" name="chk[<?php echo $no;?>]" id="chk<?php echo $no;?>" <?php echo $checked;?>/>
																			<span></span>
																		</label>
																	</div>
																</div>
																<input type="hidden" name="id[<?php echo $no;?>]" id="id<?php echo $no;?>" value="<?php echo $rowCo['payment_student_id'];?>">
																</td>
															</tr>

															<?php 	
															$no++;
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
											<input type="hidden" name="hdnCount" value="<?php echo $no;?>">
										</div>
										</form>

										<!-- BEGIN PAGE LEVEL SCRIPTS -->
										<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>

										<script language="JavaScript">
											function ClickCheckAll(vol)
											{
											
												var i=1;
												for(i=1;i<=document.frmMain.hdnCount.value;i++)
												{
													if(vol.checked == true)
													{
														eval("document.frmMain.chk"+i+".checked=true");
													}
													else
													{
														eval("document.frmMain.chk"+i+".checked=false");
													}
												}
											}

										</script>

