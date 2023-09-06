<?php
/* 
Develop By Arnon Manomuang
พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
Tel 0631146517 , 0946164461
โทร 0631146517 , 0946164461
Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

Develop By Kunlathon Saowakhon
พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
Tel 0932670639
โทร 0932670639
Email: mpamese.pc2001@gmail.com
*/


if ((preg_match("/main_navbar.php/", $_SERVER['PHP_SELF']))) {
	Header("Location: ../index.php");
	die();
} else {
	check_login('admin_username_aba', 'login.php');
?>
	<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="navbar navbar-expand-lg navbar-dark navbar-static">
		<div class="d-flex flex-1 d-lg-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-paragraph-justify3"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-transmission"></i>
			</button>
		</div>

		<div class="navbar-brand text-center text-lg-left">
			<a href="index.php" class="d-inline-block">
				<img src="template/global_assets/images/logo_light.png" class="d-none d-sm-block" alt="">
				<img src="template/global_assets/images/logo_icon_light.png" class="d-sm-none" alt="">
			</a>
		</div>

		<div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">

					<div class="dropdown-menu dropdown-content wmin-lg-350">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Git updates</span>
							<a href="#" class="text-body"><i class="icon-sync"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-transparent border-primary text-primary rounded-pill border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
									</div>

									<div class="media-body">
										Have Carousel ignore keyboard events
										<div class="text-muted font-size-sm">Dec 12, 05:46</div>
									</div>
								</li>

							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-body mr-auto">All updates</a>
							<div>
								<a href="#" class="text-body" data-popup="tooltip" title="Mark all as read"><i class="icon-radio-unchecked"></i></a>
								<a href="#" class="text-body ml-2" data-popup="tooltip" title="Bug tracker"><i class="icon-bug2"></i></a>
							</div>
						</div>
					</div>
				</li>
			</ul>

			<span class="badge badge-success my-3 my-lg-0 ml-lg-3">Online</span>

			<ul class="navbar-nav ml-lg-auto">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link" data-toggle="dropdown">
						<i class="icon-people"></i>
						<span class="d-lg-none ml-3">Messages</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-lg-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Users online</span>
							<a href="#" class="text-body"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">

								<li class="media">
									<div class="mr-3">
										<img src="template/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Admin</a>
										<span class="d-block text-muted font-size-sm">Check Grade</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-warning"></span></div>
								</li>

							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-body mr-auto">All users</a>
							<a href="#" class="text-body"><i class="icon-gear"></i></a>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
			<li class="nav-item nav-item-dropdown-lg dropdown">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown">
					<i class="icon-bubbles4"></i>
					<span class="badge badge-warning badge-pill ml-auto ml-lg-0">2</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-lg-350">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold">Messages</span>
						<a href="#" class="text-body"><i class="icon-compose"></i></a>
					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">

							<li class="media">
								<div class="mr-3 position-relative">
									<img src="template/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
								</div>

								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Admin</span>
											<span class="text-muted float-right font-size-sm">12:16</span>
										</a>
									</div>

									<span class="text-muted">Login...</span>
								</div>
							</li>
						</ul>
					</div>

					<div class="dropdown-content-footer justify-content-center p-0">
						<a href="#" class="btn btn-light btn-block border-0 rounded-top-0" data-popup="tooltip" title="Load more"><i class="icon-menu7"></i></a>
					</div>
				</div>
			</li>

			<?php $admin_name_aba = check_session("admin_name_aba"); ?>

			<li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
					<img src="template/global_assets/images/placeholders/placeholder.jpg" class="rounded-pill mr-lg-2" height="34" alt="">
					<span class="d-none d-lg-inline-block"><?php echo $admin_name_aba; ?></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="?modules=profile" class="dropdown-item"><i class="icon-user-plus"></i> ข้อมูลของฉัน</a>
					<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> การเข้าสู่ระบบ <span class="badge badge-primary badge-pill ml-auto">58</span></a>
					<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-primary badge-pill ml-auto">58</span></a>
					<div class="dropdown-divider"></div>
					<a href="?modules=school" class="dropdown-item"><i class="icon-cog5"></i> ตั้งค่าโรงเรียน</a>
					<a id="sweet_Logout" class="dropdown-item"><i class="icon-switch2"></i> ออกจากระบบ</a>
				</div>
			</li>
		</ul>
	</div>
	<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php } ?>