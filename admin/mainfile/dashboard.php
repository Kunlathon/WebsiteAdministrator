<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/dashboard.php/", $_SERVER['PHP_SELF']))) {
	Header("Location: ../index.php");
	die();
} else {

	if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) {
		//----------------------------------------------------------------------------------------------

	//Register1

	$sql1_register1 = "SELECT * FROM tb_register WHERE user_status = '1'";
	$cc1_register1 = result_array($sql1_register1);
	$count1_register1 = count($cc1_register1);

	//end*************************************

	//Pass1

	$sql2_register1 = "SELECT * FROM tb_register WHERE user_status = '2'";
	$cc2_register1 = result_array($sql2_register1);
	$count2_register_pass1 = count($cc2_register1);

	//end*************************************

	//Unpass1

	$sql3_register1 = "SELECT * FROM tb_register WHERE user_status = '3'";
	$cc3_register1 = result_array($sql3_register1);
	$count3_register_unpass1 = count($cc3_register1);

	//end*************************************

	//Student1

	$sql_student1 = "SELECT * FROM tb_student WHERE user_status = '1'";
	$cc_student1 = result_array($sql_student1);
	$count_student1 = count($cc_student1);

	//end*************************************

	//Student_card1

	$sql_studentcard1 = "SELECT * FROM tb_student_card WHERE user_status = '1'";
	$cc_studentcard1 = result_array($sql_studentcard1);
	$count_studentcard1 = count($cc_studentcard1);

//end*************************************

//Student_card2

	$sql_studentcard2 = "SELECT * FROM tb_student_card WHERE user_status = '2'";
	$cc_studentcard2 = result_array($sql_studentcard2);
	$count_studentcard2 = count($cc_studentcard2);

//end*************************************

//Certified1

	$sql_certified1 = "SELECT * FROM tb_certified WHERE user_status = '1'";
	$cc_certified1 = result_array($sql_certified1);
	$count_certified1 = count($cc_certified1);

//end*************************************

//Certified2

	$sql_certified2 = "SELECT * FROM tb_certified WHERE user_status = '2'";
	$cc_certified2 = result_array($sql_certified2);
	$count_certified2 = count($cc_certified2);

//end*************************************

?>
		<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

		<!-- Page header -->
		<div class="page-header page-header-light">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
							<i class="icon-home2 mr-2"></i> หน้าแรก</a>
					</div>
					<a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
				</div>
			</div>
		</div>
		<!-- /page header -->

		<div class="content">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="mb-3">
						<div class="mb-0 font-weight-semibold" style="font-size: 24px; text-align: center;">ศูนย์ภาษา มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="mb-3">
						<div class="mb-0 font-weight-semibold" style="font-size: 24px;">รายการผู้สมัคร</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-3 col-sm-3">
					<a href="" >
						<div class="card card-body bg-info text-white has-bg-image">
							<div class="media">
								<div class="mr-4 align-self-center">
									<i class="icon-graduation2 icon-2x opacity-70"></i>
								</div>

								<div class="media-body text-right">
									<div class="mb-1" style="font-size: 16px;">จำนวนผู้สมัคร</div>
									<span class="text-uppercase font-size-xs"><?php echo $count1_register1; ?></span>
								</div>
							</div>
						</div>
					</a>
				</div>	
				<div class="col-xs-3 col-sm-3">
					<a href="" >
						<div class="card card-body bg-yellow text-white has-bg-image">
							<div class="media">
								<div class="mr-4 align-self-center">
									<i class="icon-design icon-2x opacity-70"></i>
								</div>

								<div class="media-body text-right">
									<div class="mb-1" style="font-size: 16px;">จำนวนนิสิตที่ผ่านการสมัคร</div>
									<span class="text-uppercase font-size-xs"><?php echo $count2_register_pass1; ?></span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="" >
						<div class="card card-body bg-danger text-white has-bg-image">
							<div class="media">
								<div class="mr-4 align-self-center">
									<i class="icon-reading icon-2x opacity-70"></i>
								</div>

								<div class="media-body text-right">
									<div class="mb-1" style="font-size: 16px;">จำนวนนิสิตไม่ผ่านการสมัคร</div>
									<span class="text-uppercase font-size-xs"><?php echo $count3_register_unpass1; ?></span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="" >
						<div class="card card-body bg-primary text-white has-bg-image">
							<div class="media">
								<div class="mr-4 align-self-center">
									<i class="icon-quill4 icon-2x opacity-70"></i>
								</div>

								<div class="media-body text-right">
									<div class="mb-1" style="font-size: 16px;">จำนวนนิสิตทั้งหมด</div>
									<span class="text-uppercase font-size-xs"><font id="cu-count_student1" class="count-up" data-value="<?php echo $count_student1; ?>"><?php echo $count_student1; ?></font></span>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>


			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="mb-3">
						<div class="mb-0 font-weight-semibold" style="font-size: 24px;">บริการออนไลน์</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-3 col-sm-3">
					<a href="" >
						<div class="card card-body bg-primary text-white has-bg-image">
							<div class="media">
								<div class="mr-4 align-self-center">
									<i class="icon-equalizer icon-2x opacity-70"></i>
								</div>

								<div class="media-body text-right">
									<div class="mb-1" style="font-size: 16px;">ยื่นเอกสารขอบัตร</div>
									<span style="" class="text-uppercase font-size-xs">0</span>
								</div>
							</div>
						</div>
					</a>

				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="" >
						<div class="card card-body bg-success text-white has-bg-image">
							<div class="media">
								<div class="mr-4 align-self-center">
									<i class="icon-pencil-ruler icon-2x opacity-70"></i>
								</div>

								<div class="media-body text-right">
									<div class="mb-1" style="font-size: 16px;">รายชื่อผู้ขอเอกสารขอบัตร</div>
									<span class="text-uppercase font-size-xs">0</span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="" >
						<div class="card card-body bg-purple  text-white has-bg-image">
							<div class="media">
								<div class="mr-4 align-self-center">
									<i class="icon-book3 icon-2x opacity-70"></i>
								</div>

								<div class="media-body text-right">
									<div class="mb-1" style="font-size: 16px;">ยื่นเรื่องขอเอกสารรับรอง</div>
									<span class="text-uppercase font-size-xs">0</span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="" >
						<div class="card card-body bg-warning text-white has-bg-image">
							<div class="media">
								<div class="mr-4 align-self-center">
									<i class="icon-stats-bars icon-2x opacity-70"></i>
								</div>

								<div class="media-body text-right">
									<div class="mb-1" style="font-size: 16px;">รายชื่อผู้ขอเอกสารรับรอง</div>
									<span class="text-uppercase font-size-xs">0</span>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>

		<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
	}
}
?>
