<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];
$rid = $_GET['rid'];
$sid = $_GET['sid'];
$lid = $_GET['lid'];
$check_grade = $_GET['check_grade'];
$check_term = $_GET['check_term'];

$sqlC = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id='{$rid}' "; 
$rowC = row_array($sqlC);

$sqlS = "SELECT *, c.teacher_id1 AS T1, c.teacher_id2 AS T2 FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id = c.course_class_detail_id INNER JOIN tb_subject d ON b.subject_id = d.subject_id WHERE a.course_class_id = '$id' AND b.subject_id='{$sid}' AND c.course_class_level_id = '$lid'";

//echo $sqlS;
$rowS = row_array($sqlS);

$ccdid = $rowS['course_class_detail_id'];
$cid = $rowS['classroom_t_id'];

//check Course

		$cc_id = $rowS['course_class_id'];
		$cd_id = $rowS['course_class_detail_id'];
		$cl_id = $rowS['course_class_level_id'];
		$sj_id = $rowS['subject_id'];				
		
		$sqlClass = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id WHERE a.classroom_t_id = '{$cid}'";

		//echo $sqlClass;

		$rowClass = result_array($sqlClass); 

		foreach ($rowClass as $key => $_rowClass) { 

			$sql_1 = "SELECT * , COUNT(b.course_s_detail_id) AS NUM FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id' AND a.term_id = '$check_term' AND a.grade_id = '$check_grade'  AND a.student_id = '$_rowClass[student_id]' AND b.course_class_detail_id = '$cd_id' AND b.course_class_level_id = '$cl_id' AND c.subject_id = '$sj_id'";
			
			//echo $sql_1;
			$row_1 = row_array($sql_1);

			$number = $row_1['NUM'];

			if($number > 0){

			} else if($number == 0){

				$sql = "SELECT * FROM tb_course_class_level WHERE course_class_level_id = '$cl_id'";
				$row = row_array($sql); 

				$cdid = $row['course_class_detail_id'];
				$clid = $row['course_class_level_id'];

				$sqlCou = "SELECT * FROM tb_course_student WHERE course_class_id = '$cc_id'";
			
				//echo $sqlCou;
				$rowCou = result_array($sqlCou); 

				foreach ($rowCou as $key => $_rowCou) { 

					$sqlT = "SELECT *,MAX(course_s_detail_id) AS ID FROM tb_course_student_detail";
					$tcrT = row_array($sqlT);

					$CS_ID = $tcrT['ID'] + 1;

					$csid = $_rowCou['course_s_id'];					

					$aid = check_session("admin_id");
					$update = date('Y-m-d H:i:s');

							$data3 = array(
								"course_s_detail_id" => $CS_ID ,
								"course_s_id" => $csid ,
								"course_class_detail_id" =>  $cdid,
								"course_class_level_id" =>  $clid,			
								"course_class_level_check" =>  0,	
								"score1" =>  0,	
								"score2" =>  0,	
								"score" =>  0,	
								"admin_id" => $aid ,
								"admin_update" => $update ,
								"course_s_detail_status" => 1

							);

							insert("tb_course_student_detail", $data3);
				}
			}

		}

?>	
											<form action="process/classcheck_add_process.php" name="frmMain" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">จัดการเรียน ห้องเรียน <?php echo $rowC['classroom_name']; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="ccid" id="ccid" value="<?php echo $id; ?>">
													<input type="hidden" name="ccdid" id="ccdid" value="<?php echo $ccdid; ?>">
													<input type="hidden" name="rid" id="rid" value="<?php echo $rid; ?>">
													<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
													<input type="hidden" name="lid" id="lid" value="<?php echo $lid; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">

													<div class="form-group">
															<label class="col-md-12 control-label">วิชา <?php echo $rowS['subject_code'];?> <?php echo $rowS['subject_name'];?> (<?php echo $rowS['course_class_level_name'];?>)</label>
													</div>

													<?php
													if(($rowS['T1'] != 0) && ($rowS['T1'] != "")) {
													$sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '$rowS[T1]' AND teacher_status='1'";
													$rowT1 = row_array($sqlT1);
													?>
													<div class="form-group">
															<label class="col-md-12 control-label">ครูผู้สอน : <?php echo $rowT1['teacher_name'];?>&nbsp;<?php echo $rowT1['teacher_surname'];?></label>
													</div>
 
													<?php } ?>

													<?php
													if(($rowS['T2'] != 0) && ($rowS['T2'] != "")) {
													$sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '$rowS[teacher_id2]' AND teacher_status='1'";
													$rowT2 = row_array($sqlT2);
													?>
													<div class="form-group">
															<label class="col-md-12 control-label">ครูผู้สอน : <?php echo $rowT2['teacher_name'];?>&nbsp;<?php echo $rowT2['teacher_surname'];?></label>
													</div>
 
													<?php } ?>

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
															
															$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.course_class_id='{$id}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.course_s_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1'  ORDER BY b.student_no ASC"; 
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

															$sqlCo = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$id' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.student_id = '$row[student_id]' AND b.course_class_level_id = '$lid' AND c.subject_id = '$sid'";

															//echo $sqlCo;
															$rowCo = row_array($sqlCo);												

															if($rowCo['course_class_level_check']==0) {		
																$checked = "";
															} else if($rowCo['course_class_level_check'] ==1) {
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
																<input type="hidden" name="id[<?php echo $no;?>]" id="id<?php echo $no;?>" value="<?php echo $rowCo['course_s_detail_id'];?>">
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

