<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/dashboard.php/", $_SERVER['PHP_SELF']))) {
	Header("Location: ../index.php");
	die();
} else {

	if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) {
		//----------------------------------------------------------------------------------------------
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
				<div class="col-xs-3 col-sm-3">
					<a href="?modules=classroom_data" class="nav-link">
						<div class="card card-body bg-primary text-white has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-graduation2 icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">หลักสูตร</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="?modules=subject_data" class="nav-link">
						<div class="card card-body bg-danger text-white has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-design icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">รายวิชา</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="?modules=student_data" class="nav-link">
						<div class="card card-body bg-purple text-white has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-reading icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">นิสิต</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="?modules=teacher_all" class="nav-link">
						<div class="card card-body bg-info text-white has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-quill4 icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">ครู</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-3 col-sm-3">
					<a href="?modules=assessment_classroom" class="nav-link">
						<div class="card card-body bg-warning text-white has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-equalizer icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">ประเมิน</h3>
								</div>
							</div>
						</div>
					</a>

				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="?modules=teach_data" class="nav-link">
						<div class="card card-body bg-success text-white has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-pencil-ruler icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">เช็คการสอน</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="?modules=check_subject" class="nav-link">
						<div class="card card-body bg-dark text-white has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-book3 icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">เช็ครายวิชา</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-3 col-sm-3">
					<a href="?modules=report_score" class="nav-link">
						<div class="card card-body bg-indigo text-white has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-stats-bars icon-3x opacity-75"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="mb-0">ผลการเรียน</h3>
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
