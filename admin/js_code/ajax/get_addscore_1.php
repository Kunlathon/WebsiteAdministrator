<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$course_cid = $_GET['course_cid'];
$idd = $_GET['idd'];
$tid = $_GET['tid'];
$clid = $_GET['clid'];
$sid = $_GET['sid'];
$exam_no = $_GET['exam_no'];
$cclid = $_GET['cclid'];
$typec = $_GET['typec'];
$check_grade = $_GET['grade'];
$check_term = $_GET['term'];
$checkt = $_GET['checkt'];

?>			
											<form action="process/score_t1_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มเพิ่มข้อมูลตัวชี้วัด</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<!--<input type="hidden" name="sid" id="sid" value="<?php echo $id;?>">-->
													<!--<input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>">-->
													<input type="hidden" name="course_cid" id="course_cid" value="<?php echo $course_cid;?>">
													<input type="hidden" name="idd" id="idd" value="<?php echo $idd;?>">
													<input type="hidden" name="tid" id="tid" value="<?php echo $tid;?>">
													<input type="hidden" name="clid" id="clid" value="<?php echo $clid;?>">
													<input type="hidden" name="sid" id="sid" value="<?php echo $sid;?>">
													<!--<input type="hidden" name="exam_no" id="exam_no" value="1">-->
													<!--<input type="hidden" name="exam_no" id="exam_no" value="2">-->
													<input type="hidden" name="exam_no" id="exam_no" value="<?php echo $exam_no;?>">
													<input type="hidden" name="cclid" id="cclid" value="<?php echo $cclid;?>">
													<input type="hidden" name="typec" id="typec" value="<?php echo $typec;?>">
													<input type="hidden" name="grade" id="grade" value="<?php echo $check_grade;?>">
													<input type="hidden" name="term" id="term" value="<?php echo $check_term;?>">
													<input type="hidden" name="checkt" id="checkt" value="<?php echo $check_teacher;?>">									
													
													<div class="form-group">
															<label class="col-md-4 control-label">ตัวชี้วัด</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="" required/>
																<span class="help-block"> กรอกข้อมูลตัวชี้วัด</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<!--<div class="form-group">
															<label class="col-md-4 control-label">หัวข้อการสอบภาษาอังกฤษ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="ename" value="" />
																<span class="help-block"> กรอกข้อมูลหัวข้อการสอบภาษาอังกฤษ</span>
															</div>
														</div>
														<div>&nbsp;</div>-->

														<div class="form-group">
															<label class="col-md-4 control-label">คะแนนเต็ม</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="number" name="unit" value="" required/>
																<span class="help-block"> กรอกข้อมูลคะแนนเต็ม เช่น 10 20 </span>
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