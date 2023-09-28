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
$RunLink=new link_system(); //link from admin
$RunLinkWeb=new link_wbe(); //link from web
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
	} elseif (($modules == "student_data")) {
		include("js_code/student_data/student_data_js.php");
	} elseif (($modules == "term_data")) {
		include("js_code/term_data/term_data_js.php");
	} elseif (($modules == "course_data")) {
		include("js_code/course_data/course_data_js.php");
	} elseif (($modules == "classroom_data")) {
		include("js_code/classroom_data/classroom_data_js.php");	
	} elseif (($modules == "user_data")) {
		include("js_code/user_data/user_data_js.php");	
	} elseif (($modules == "user_data2")) {
		include("js_code/user_data2/user_data2_js.php");	
	} elseif (($modules == "check_payment")) {
		include("js_code/check_payment/check_payment_js.php");
	} elseif (($modules == "payment_show")) {
		include("js_code/payment_show/payment_show_js.php");
	}elseif(($modules=="manage_payment")){
		include("js_code/manage_payment/manage_payment_js.php");
	}elseif(($modules=="course_show_class")){
		include("js_code/course_show_class/course_show_class_js.php");
	}elseif(($modules=="course_manage")){
		include("js_code/course_manage/course_manage_js.php");	
	}elseif(($modules=="image_slide")){
		include("js_code/image_slide/image_slide_js.php");
//----------------------------------------------------------------------------------------
	}elseif(($modules=="manage_history")){
		include("js_code/manage_history/manage_history_js.php");
	}elseif(($modules=="manage_history_en")){
		include("js_code/manage_history_en/manage_history_en_js.php");
	}elseif(($modules=="manage_history_cn")){
		include("js_code/manage_history_cn/manage_history_cn_js.php");
//----------------------------------------------------------------------------------------		
	}elseif(($modules=="manage_vision")){
		include("js_code/manage_vision/manage_vision_js.php");
	}elseif(($modules=="manage_vision_en")){
		include("js_code/manage_vision_en/manage_vision_en_js.php");
	}elseif(($modules=="manage_vision_cn")){
		include("js_code/manage_vision_cn/manage_vision_cn_js.php");
//----------------------------------------------------------------------------------------	
	}elseif(($modules=="manage_strategic_plan")){
		include("js_code/manage_strategic_plan/manage_strategic_plan_js.php");
	}elseif(($modules=="manage_strategic_plan_en")){
		include("js_code/manage_strategic_plan_en/manage_strategic_plan_en_js.php");
	}elseif(($modules=="manage_strategic_plan_cn")){
		include("js_code/manage_strategic_plan_cn/manage_strategic_plan_cn_js.php");
//----------------------------------------------------------------------------------------		
	}elseif(($modules=="manage_director")){
		include("js_code/manage_director/manage_director_js.php");
	}elseif(($modules=="manage_director_en")){
		include("js_code/manage_director_en/manage_director_en_js.php");
	}elseif(($modules=="manage_director_cn")){
		include("js_code/manage_director_cn/manage_director_cn_js.php");
//----------------------------------------------------------------------------------------		
	}elseif(($modules=="manage_organization")){
		include("js_code/manage_organization/manage_organization_js.php");
	}elseif(($modules=="manage_organization_en")){
		include("js_code/manage_organization_en/manage_organization_en_js.php");
	}elseif(($modules=="manage_organization_cn")){
		include("js_code/manage_organization_cn/manage_organization_cn_js.php");
//----------------------------------------------------------------------------------------		
	}elseif(($modules=="manage_executive")){
		include("js_code/manage_executive/manage_executive_js.php");
	}elseif(($modules=="manage_executive_en")){
		include("js_code/manage_executive_en/manage_executive_en_js.php");
	}elseif(($modules=="manage_executive_cn")){
		include("js_code/manage_executive_cn/manage_executive_cn_js.php");
//----------------------------------------------------------------------------------------
	}elseif(($modules=="manage_contact")){
		include("js_code/manage_contact/manage_contact_js.php");
	}elseif(($modules=="manage_contact_en")){
		include("js_code/manage_contact_en/manage_contact_en_js.php");
	}elseif(($modules=="manage_contact_cn")){
		include("js_code/manage_contact_cn/manage_contact_cn_js.php");
//----------------------------------------------------------------------------------------		
	}elseif(($modules=="manage_map")){
		include("js_code/manage_map/manage_map_js.php");
	}elseif(($modules=="manage_map_en")){
		include("js_code/manage_map_en/manage_map_en_js.php");
	}elseif(($modules=="manage_map_cn")){
		include("js_code/manage_map_cn/manage_map_cn_js.php");
//----------------------------------------------------------------------------------------
	}elseif(($modules=="manage_video")){
		include("js_code/manage_video/manage_video_js.php");
	}elseif(($modules=="manage_news")){
		include("js_code/manage_news/manage_news_js.php");
	}elseif(($modules=="announcemen_news")){
		include("js_code/announcemen_news/announcemen_news_js.php");
	}elseif(($modules=="press_release_news")){
		include("js_code/press_release_news/press_release_news_js.php");
	}elseif(($modules=="procurement_news")){
		include("js_code/procurement_news/procurement_news_js.php");
	}elseif(($modules=="job_recruitment_news")){
		include("js_code/job_recruitment_news/job_recruitment_news_js.php");
	}elseif(($modules=="picture_album")){
		include("js_code/picture_album/picture_album_js.php");
	}elseif(($modules=="document")){
		include("js_code/document/document_js.php");
	}elseif(($modules=="document_category")){
		include("js_code/document_category/document_category_js.php");
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

<body>

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
						case "student_data":
							include $load;
							break;						
						case "user_data":
							include $load;
							break;						
						case "user_data2";
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
						case "course_show_class":
							include $load;
							break;
						case "course_manage":
							include $load;
							break;						
						case "image_slide":
							include $load;
							break;
//----------------------------------------------------------------------------------------	
						case "manage_news":
							include $load;
							break;
						case "announcemen_news":
							include $load;
							break;
						case "press_release_news":
							include $load;
							break;
						case "procurement_news":
							include $load;
							break;
						case "job_recruitment_news":
							include $load;
							break;
//----------------------------------------------------------------------------------------
						case "manage_history":
							include $load;
							break;
						case "manage_history_en":
							include $load;
							break;
						case "manage_history_cn":
							include $load;
							break;
//----------------------------------------------------------------------------------------
						case "manage_vision":
							include $load;
							break;
						case "manage_vision_en":
							include $load;
							break;
						case "manage_vision_cn":
							include $load;
							break;
//----------------------------------------------------------------------------------------
						case "manage_strategic_plan":
							include $load;
							break;
						case "manage_strategic_plan_en":
							include $load;
							break;
						case "manage_strategic_plan_cn":
							include $load;
							break;
//---------------------------------------------------------------------------------------
						case "manage_director":
							include $load;
							break;
						case "manage_director_en":
							include $load;
							break;
						case "manage_director_cn":
							include $load;
							break;
//---------------------------------------------------------------------------------------
						case "manage_organization":
							include $load;
							break;
						case "manage_organization_en":
							include $load;
							break;
						case "manage_organization_cn":
							include $load;
							break;
//---------------------------------------------------------------------------------------
						case "manage_executive":
							include $load;
							break;
						case "manage_executive_en":
							include $load;
							break;
						case "manage_executive_cn":
							include $load;
							break;
//---------------------------------------------------------------------------------------
						case "manage_contact":
							include $load;
							break;
						case "manage_contact_en":
							include $load;
							break;
						case "manage_contact_cn":
							include $load;
							break;
//---------------------------------------------------------------------------------------
						case "manage_map":
							include $load;
							break;
						case "manage_map_en":
							include $load;
							break;
						case "manage_map_cn":
							include $load;
							break;
						case "manage_video":
							include $load;
							break;
						case "picture_album";
							include $load;
							break;
						case "document":
							include $load;
							break;
							// ----- Non ----- //
						case "term_data":
							include $load;
							break;
						case "course_data":
							include $load;
							break;
						case "document_category":
							include $load;
							break;
							//-------------------
						case "dashboard":
							include $load;
							break;
						default: ?> 
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<?php	}
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

