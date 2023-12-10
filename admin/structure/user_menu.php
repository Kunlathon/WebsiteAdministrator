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
if ((preg_match("/user_menu.php/", $_SERVER['PHP_SELF']))) {
	Header("Location: ../index.php");
	die();
} else { ?>
<?php check_login('admin_username_lcm', 'login.php'); ?>
	<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<div class="sidebar-section sidebar-user my-1">
		<div class="sidebar-section-body">
			<div class="media">

		<?php
            $mn_aid = check_session("admin_id_lcm");
            $mn_sql = "SELECT * FROM `tb_admin` WHERE `admin_id` = '{$mn_aid}'";
            $mn_row = row_array($mn_sql);
                if(($mn_row["admin_img"]!=null)){
                    $mn_copy_img_user=$mn_row["admin_img"];
                }else{
                    $mn_copy_img_user="no_picture.jpg";
                }
        ?>

		<?php
                 if((!file_exists("uploads/profile_picture/$mn_copy_img_user"))){ ?>
					<a href="#" class="mr-3"><img src="<?php echo $RunLink->Call_Link_System();?>/uploads/profile_picture/no_picture.jpg" class="rounded-circle" alt=""></a> 
        <?php    }else{ ?>
					<a href="#" class="mr-3"><img src="<?php echo $RunLink->Call_Link_System();?>/uploads/profile_picture/<?php echo $mn_row['admin_img'];?>" class="rounded-circle" alt=""></a> 
        <?php    }  ?>

				<?php
					$admin_name_lcm = check_session("admin_name_lcm");
					$admin_status_lcm = check_session("admin_status_lcm");
				?>

				<div class="media-body">
					<div class="font-weight-semibold"><?php echo $admin_name_lcm;?></div>
					<div class="font-size-sm line-height-sm opacity-50">
					<?php echo admin_status($admin_status_lcm);?>
					</div>
				</div>

				<div class="ml-3 align-self-center">
					<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
						<i class="icon-transmission"></i>
					</button>

					<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
						<i class="icon-cross2"></i>
					</button>
				</div>

			</div>
		</div>
	</div>
	<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php	} ?>