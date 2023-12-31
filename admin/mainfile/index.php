<?php
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//โทร 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//โทร 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
?>


<?php include 'config/connect.ini.php'; ?>
<?php include 'config/fnc.php'; ?>

<!--Code function by beer-->
<?php include("structure/function_php_oop.php"); ?>
<!--Code function by beer end-->
<?php check_login('admin_username_lcm', 'login.php'); ?>

<?php
	//error_reporting (E_ALL ^ E_NOTICE);

	header("Content-type:text/html; charset=UTF-8");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);

	include("structure/link.php");
	$RunLink = new link_system();
	//$RunLink->CallLink_System();

	$modules = isset($_GET['modules']) ? $_GET['modules'] : 'dashboard';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $RunLink->Call_Link_System(); ?>/template/layout_1/LTR/default/full/assets/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

	<!-- Core JS files -->
	<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<!-- /core JS files -->


	<script type="text/javascript">
		function setScreenHWCookie() {
			$.cookie('sw', screen.width);
			//$.cookie('sh',screen.height);
			return true;
		}
		setScreenHWCookie();
	</script>

	<?php
	$width_system = filter_input(INPUT_COOKIE, 'sw');
	if (($width_system >= 1200)) {
		$grid = "xl";
	} elseif (($width_system >= 992)) {
		$grid = "lg";
	} elseif (($width_system <= 768)) {
		$grid = "md";
	} elseif (($width_system <= 576)) {
		$grid = "sm";
	} else {
		$grid = "xs";
	}
	?>


	<?php
	if (($modules == "dashboard")) {
		include("js_code/dashboard/dashboard_js.php");
	} elseif (($modules == "school")) {
		include("js_code/school/school_js.php");
	} elseif (($modules == "profile")) {
		include("js_code/profile/profile_js.php");
	} elseif (($modules == "changepass")) {
		include("js_code/changepass/changepass_js.php");
	} elseif (($modules == "subject_type_data")) {
		include("js_code/subject_type_data/subject_type_data_js.php");
	} elseif (($modules == "subject_data")) {
		include("js_code/subject_data/subject_data_js.php");
	} elseif (($modules == "subject_level_data")) {
		include("js_code/subject_level_data/subject_level_data_js.php");
	} elseif (($modules == "student_data")) {
		include("js_code/student_data/student_data_js.php");
	} elseif (($modules == "term_data")) {
		include("js_code/term_data/term_data_js.php");
	} elseif (($modules == "grade_data")) {
		include("js_code/grade_data/grade_data_js.php");
	} elseif (($modules == "course_data")) {
		include("js_code/course_data/course_data_js.php");
	} elseif (($modules == "classroom_data")) {
		include("js_code/classroom_data/classroom_data_js.php");
	} elseif (($modules == "teacher_all")) {
		include("js_code/teacher_all/teacher_all_js.php");
	} elseif (($modules == "teacher_data3")) {
		include("js_code/teacher_data3/teacher_data3_js.php");
	} elseif (($modules == "teacher_data1")) {
		include("js_code/teacher_data1/teacher_data1_js.php");
	} elseif (($modules == "teacher_data2")) {
		include("js_code/teacher_data2/teacher_data2_js.php");
	} elseif (($modules == "person_data")) {
		include("js_code/person_data/person_data_js.php");
	} elseif (($modules == "user_data")) {
		include("js_code/user_data/user_data_js.php");
	} elseif (($modules == "student_data1")) {
		include("js_code/student_data1/student_data1_js.php");
	} elseif (($modules == "student_data2")) {
		include("js_code/student_data2/student_data2_js.php");
	} elseif (($modules == "student_data3")) {
		include("js_code/student_data3/student_data3_js.php");
	} elseif (($modules == "user_data2")) {
		include("js_code/user_data2/user_data2_js.php");
	} elseif (($modules == "assessment_classroom")) {
		include("js_code/assessment_classroom/assessment_classroom_js.php");
	} elseif (($modules == "assessment_classroom_show")) {
		include("js_code/assessment_classroom_show/assessment_classroom_show_js.php");
	} elseif (($modules == "student_success")) {
		include("js_code/student_success/student_success_js.php");
	} elseif (($modules == "student_alumni")) {
		include("js_code/student_alumni/student_alumni_js.php");
	} elseif (($modules == "student_resign")) {
		include("js_code/student_resign/student_resign_js.php");
	} elseif (($modules == "student_drop")) {
		include("js_code/student_drop/student_drop_js.php");
	} elseif (($modules == "check_payment")) {
		include("js_code/check_payment/check_payment_js.php");
	} elseif (($modules == "payment_show")) {
		include("js_code/payment_show/payment_show_js.php");
	} elseif (($modules == "grade_classroom_data")) {
		include("js_code/grade_classroom_data/grade_classroom_data_js.php");
	} elseif (($modules == "teach_data")) {
		include("js_code/teach_data/teach_data_js.php");
	} elseif (($modules == "check_subject")) {
		include("js_code/check_subject/check_subject_js.php");
	}elseif(($modules=="manage_payment")){
		include("js_code/manage_payment/manage_payment_js.php");
	}elseif(($modules=="report_score")){
		include("js_code/report_score/report_score_js.php");
	}elseif(($modules=="assessment_data")){
		include("js_code/assessment_data/assessment_data_js.php");
	}elseif(($modules=="assessment_data_th")){
		include("js_code/assessment_data_th/assessment_data_th_js.php");
	}elseif(($modules=="character_data")){
		include("js_code/character_data/character_data_js.php");
	}elseif(($modules=="activity_data")){
		include("js_code/activity_data/activity_data_js.php");
	}elseif(($modules=="teach_show_detail")){
		include("js_code/teach_show_detail/teach_show_detail_js.php");
	}elseif(($modules=="subject_teach_detail")){
		include("js_code/subject_teach_detail/subject_teach_detail_js.php");
	}else{ ?>
		<!-- Theme JS files -->
		<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script>
		<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/forms/inputs/alpaca/alpaca.min.js"></script>
		<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/forms/inputs/alpaca/price_format.min.js"></script>

		<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/ui/prism.min.js"></script>
		<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
		<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/demo_pages/alpaca_advanced.js"></script>
		<!-- /theme JS files -->
<?php  } ?>

	<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<!-- Theme JS files extra_sweetalert -->
	<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

	<!-- Theme JS files extra_sweetalert -->
	<script>
		var SA_Logout = function() {
			var _componentSA_Logout = function() {
				if (typeof swal == 'undefined') {
					console.warn('Warning - sweet_alert.min.js is not loaded.');
					return;
				}
				// Defaults
				var swalInitLogout = swal.mixin({
					buttonsStyling: false,
					customClass: {
						confirmButton: 'btn btn-primary',
						cancelButton: 'btn btn-light',
						denyButton: 'btn btn-light',
						input: 'form-control'
					}
				});
				// Defaults End

				//--------------------------------------------------------------------------------------
				//--------------------------------------------------------------------------------------
				$('#sweet_Logout').on('click', function() {
					swalInitLogout.fire({
						title: 'ต้องการออกจากระบบหรือไม่',
						//text: "You won't be able to revert this!",
						icon: 'warning',
						allowOutsideClick: false,
						showCancelButton: true,
						confirmButtonText: 'ใช้, ต้องออกจากระบบ',
						cancelButtonText: 'ไม่, ไม่ต้องการออกจากระบบ',
						buttonsStyling: false,
						customClass: {
							confirmButton: 'btn btn-success',
							cancelButton: 'btn btn-danger'
						}
					}).then(function(result) {
						if (result.value) {
							document.location = "<?php echo $RunLink->Call_Link_System(); ?>/process/logout.php";
						} else if (result.dismiss === swal.DismissReason.cancel) {
							//swalInitLogout.fire(
							//'Cancelled',
							//'Your imaginary file is safe :)',
							//'error'
							//);
						} else {
							//--------------------------------------------------------------------------------------					
						}
					});
				});
				//--------------------------------------------------------------------------------------
			};
			//--------------------------------------------------------------------------------------
			return {
				initComponentsLogin: function() {
					_componentSA_Logout();
				}
			}
		}();
		// Initialize module
		// ------------------------------
		document.addEventListener('DOMContentLoaded', function() {
			SA_Logout.initComponentsLogin();
		});
	</script>
	<!-- Theme JS files extra_sweetalert End-->

	<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/layout_1/LTR/default/full/assets/js/app.js"></script>
	<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

</head>

<body class="col-xs-12">

	<!-- Main navbar -->
	<?php require("structure/main_navbar.php"); ?>
	<!-- /main navbar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<?php require("structure/user_menu.php"); ?>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="sidebar-section">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<?php require("structure/main_navigation.php"); ?>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">



			<!-- Inner content -->
			<div class="content-inner">
				<!--Wording Area-->
				<?php
				//$modules = isset($_GET['modules']) ? $_GET['modules'] : 'dashboard';
				$load = "mainfile/{$modules}.php";
				if ((file_exists($load))) {
					//-----------------------------------------------------------------------------------------------------------							
					switch ($modules) {
							// ----- beer ----- //
						case "school":
							include $load;
							break;
						case "profile":
							include $load;
							break;
						case "changepass":
							include $load;
							break;
						case "subject_data":
							include $load;
							break;
						case "subject_type_data":
							include $load;
							break;
						case "subject_level_data":
							include $load;
							break;
						case "student_data":
							include $load;
							break;
						case "teacher_all":
							include $load;
							break;
						case "teacher_data1":
							include $load;
							break;
						case "teacher_data2":
							include $load;
							break;
						case "teacher_data3":
							include $load;
							break;
						case "person_data":
							include $load;
							break;
						case "user_data":
							include $load;
							break;
						case "student_data1":
							include $load;
							break;
						case "student_data2":
							include $load;
							break;
						case "student_data3":
							include $load;
							break;
						case "user_data2";
							include $load;
							break;
						case "assessment_classroom":
							include $load;
							break;
						case "assessment_classroom_show":
							include $load;
							break;
						case "student_success":
							include $load;
							break;
						case "student_alumni":
							include $load;
							break;
						case "student_resign":
							include $load;
							break;
						case "student_drop":
							include $load;
							break;
						case "check_payment":
							include $load;
							break;
						case "payment_show":
							include $load;
							break;
						case "grade_classroom_data":
							include $load;
							break;
						case "manage_payment":
							include $load;
							break;
						case "report_score":
							include $load;
							break;
						case "assessment_data":
							include $load;
							break;
						case "assessment_data_th":
							include $load;
							break;
						case "character_data":
							include $load;
							break;
						case "activity_data":
							include $load;
							break;
						case "report_score_show2":
							include $load;
							break;
						case "report_score_show2_2":
							include $load;
							break;
						case "report_score_show2_F":
							include $load;
							break;
						case "report_score_show2_G":
							include $load;
							break;
						case "report_score_show3":
							include $load;
							break;
						case "report_score_show3_2":
							include $load;
							break;		
						case "report_score_show3_F":
							include $load;
							break;
						case "report_score_show3_G":
							include $load;
							break;
						case "report_score_show1":
							include $load;
							break;
						case "report_score_show1_F_mix":
							include $load;
							break;						
						case "report_score_show1_2":
							include $load;
							break;
						case "report_score_show1_F":
							include $load;
							break;
						case "report_score_show1_1":
							include $load;
							break;
						case "report_score_show1_G":
							include $load;
							break;
						case "teach_show_detail":
							include $load;
							break;
							// ----- Non ----- //

						case "term_data":
							include $load;
							break;
						case "grade_data":
							include $load;
							break;
						case "course_data":
							include $load;
							break;
						case "classroom_data":
							include $load;
							break;
						case "teach_data":
							include $load;
							break;
						case "check_subject":
							include $load;
							break;

							//-------------------
						case "dashboard":
							include $load;
							break;
						default:
							//include $load;
					}
					//-----------------------------------------------------------------------------------------------------------							
				} else {
				}
				?>
				<!--Wording Area-->
				<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<!-- Page header -->
				<!--<div class="page-header page-header-light">
					<div class="page-header-content header-elements-lg-inline">
						<div class="page-title d-flex">
							<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Alpaca</span> - Advanced Inputs</h4>
							<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
						</div>

						<div class="header-elements d-none">
							<div class="d-flex justify-content-center">
								<a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float text-body"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float text-body"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
						<div class="d-flex">
							<div class="breadcrumb">
								<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
								<a href="alpaca_advanced.html" class="breadcrumb-item">Alpaca</a>
								<span class="breadcrumb-item active">Advanced inputs</span>
							</div>

							<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
						</div>

						<div class="header-elements d-none">
							<div class="breadcrumb justify-content-center">
								<a href="#" class="breadcrumb-elements-item">
									<i class="icon-comment-discussion mr-2"></i>
									Support
								</a>

								<div class="breadcrumb-elements-item dropdown p-0">
									<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
										<i class="icon-gear mr-2"></i>
										Settings
									</a>

									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
										<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
										<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				<!-- /page header -->


				<!-- Content area -->
				<!--<div class="content">

					<div class="row">
						<div class="col-md-12"><h1>5555555</h1></div>
					</div>

				</div>-->
				<!-- /content area -->


				<!--Wording Area-->
				<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<!-- Footer -->
				<?php require("structure/footer.php"); ?>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

</html>