<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username', 'login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_term WHERE term_id = '{$id}'";
$row = row_array($sql);
?>
<form action="process/term_process.php" method="post">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">ฟอร์มแก้ไขภาคการศึกษา</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
				<input type="hidden" name="term" id="term" value="<?php echo $row['term']; ?>">
				<input type="hidden" name="term_year" id="term_year" value="<?php echo $row['year']; ?>">

				<!--<div class="form-group">
															<label class="col-md-4 control-label">ภาคเรียน</label>
															
															<div class="col-md-8">
																		<select name="term" class="form-control input-medium" required>
																			<option value="" disabled selected>เลือกภาคเรียน</option>
																			<option <?php echo $row['term'] == 1 ? "selected" : ""; ?> value="1">1</option>
																			<option <?php echo $row['term'] == 2 ? "selected" : ""; ?> value="2">2</option>
																			<option <?php echo $row['term'] == 3 ? "selected" : ""; ?> value="3">3</option>
																		</select>

															</div>
														</div>
														<div>&nbsp;</div>
														
														<div class="form-group">
															<label class="col-md-4 control-label">ปีการศึกษา</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline input-medium" size="16" type="number" name="term_year" value="<?php echo $row['year']; ?>" />
																<span class="help-block"> เลือกข้อมูลปีการศึกษา </span>
															</div>
														</div>
														<div>&nbsp;</div>-->

				<div class="form-group">
					<label class="col-md-4 control-label">ปีการศึกษา</label>

					<div class="col-md-8">
						<?php echo $row['term']; ?>/<?php echo $row['year']; ?>
					</div>
				</div>
				<div>&nbsp;</div>


				<div class="form-group">
					<label class="col-md-4 control-label">วันที่เปิดเรียน</label>

					<div class="col-md-8">
						<input class="form-control form-control-inline date-picker" data-date-format="yyyy-mm-dd" size="16" type="text" name="date_start" value="<?php echo $row['term_start']; ?>" />
						<span class="help-block"> เลือกข้อมูลวันที่เปิดเรียน </span>
					</div>
				</div>
				<div>&nbsp;</div>

				<div class="form-group">
					<label class="col-md-4 control-label">วันที่ปิดเรียน</label>

					<div class="col-md-8">
						<input class="form-control form-control-inline date-picker" data-date-format="yyyy-mm-dd" size="16" type="text" name="date_end" value="<?php echo $row['term_end']; ?>" />
						<span class="help-block"> เลือกข้อมูลวันที่ปิดเรียน </span>
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
								<option <?php echo $_tst['grade_id'] == $row['grade_id'] ? "selected" : ""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]"; ?></option>
							<?php } ?>
						</select>

					</div>
				</div>
				<div>&nbsp;</div>

				<div class="form-group">
					<label class="col-md-4 control-label">การใช้งาน</label>

					<div class="col-md-8">
						<select name="status" class="form-control input-medium" required>
							<option value="" disabled selected>เลือกการใช้งาน</option>
							<option <?php echo $row['term_status'] == 1 ? "selected" : ""; ?> value="1">เปิดการใช้งาน</option>
							<option <?php echo $row['term_status'] == 0 ? "selected" : ""; ?> value="0">ปิดการใช้งาน</option>
						</select>

					</div>
				</div>
				<div>&nbsp;</div>

				<div class="form-group">
					<label class="col-md-4 control-label">ผลการเรียน</label>

					<div class="col-md-8">
						<select name="checkgrade_st" class="form-control input-medium" required>
							<option value="" disabled selected>เลือกผลการเรียน</option>
							<option <?php echo $row['checkgrade_status'] == 1 ? "selected" : ""; ?> value="1">เปิดการใช้งาน</option>
							<option <?php echo $row['checkgrade_status'] == 0 ? "selected" : ""; ?> value="0">ปิดการใช้งาน</option>
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