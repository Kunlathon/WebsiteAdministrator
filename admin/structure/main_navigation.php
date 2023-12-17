<!--
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
-->


<?php
if ((preg_match("/main_navigation.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else { 
    check_login('admin_username_lcm', 'login.php'); 
?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script>
        $(document).ready(function(){
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

			$('#sweet_LogoutB').on('click', function() {
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

        })
    </script>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!-- Main -->
    <?php if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2')) { ?>

        <li class="nav-item">
            <a href="<?php echo $RunLink->Call_Link_System(); ?>/" class="nav-link">
                <i class="icon-home2"></i>
                <span>
                    หน้าแรก
                </span>
            </a>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-user"></i> <span>ข้อมูลส่วนตัว</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <!--<li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=profile" class="nav-link active">ประวัติส่วนตัว</a></li>-->
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=profile" class="nav-link">ประวัติส่วนตัว</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=changepass" class="nav-link">เปลียนรหัสผ่าน</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-star-full2"></i> <span>จัดการหน้าเว็บไซต์</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_history" class="nav-link ">ประวัติศูนย์ภาษา</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_vision" class="nav-link ">ปณิธาน & วิสัยทัศน์ & พันธกิจ & วัตถุประสงค์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_strategic_plan" class="nav-link ">แผนยุทธศาสตร์ & เป้าประสงค์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_director" class="nav-link ">สารจากผู้บริหาร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_organization" class="nav-link ">โครงสร้างองค์กร และคณะกรรมการ</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_executive" class="nav-link ">คณะผู้บริหาร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_contact" class="nav-link ">ติดต่อเรา</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_map" class="nav-link ">แผนที่</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-puzzle3"></i> <span>ข้อมูลประชาสัมพันธ์</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news" class="nav-link ">ข่าวสารทั้งหมด</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=basic_website" class="nav-link ">ข้อมูลเว็บไชต์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide" class="nav-link ">ภาพสไลด์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album" class="nav-link ">ภาพกิจกรรม</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video" class="nav-link ">วิดีโอ</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document_category" class="nav-link ">เอกสารดาวน์โหลด</a></li>

            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-stack3"></i> <span>หลักสูตร/ห้องเรียน</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course" class="nav-link ">จัดการหลักสูตร</a></li>
				<li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_classroom_data" class="nav-link ">จัดการห้องเรียน</a></li>

            </ul>
        </li>

<?php
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

?>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-list-unordered"></i> <span>ข้อมูลการสมัครเรียน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=register1" class="nav-link "><span>ข้อมูลการสมัครเรียน</span>
				<span class="badge badge-info align-self-center ml-auto"> <?php echo $count1_register1; ?></span></a>
				</li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=list_register1" class="nav-link "><span>นิสิตที่ผ่านการสมัคร</span>
				<span class="badge badge-warning align-self-center ml-auto"> <?php echo $count2_register_pass1; ?></span></a>
				</li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=unregister1" class="nav-link "><span>นิสิตที่ไม่ผ่านการสมัคร</span>
				<span class="badge badge-danger align-self-center ml-auto"> <?php echo $count3_register_unpass1; ?></span></a>
				</li>
            </ul>
        </li>

<?php
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

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-stack"></i> <span>บริการออนไลน์</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=list_student_card" class="nav-link "><span>ยื่นเอกสารขอบัตร</span>
				<span class="badge badge-primary align-self-center ml-auto"> <?php echo $count_studentcard1; ?></span></a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_card_show" class="nav-link ">รายชื่อผู้ขอเอกสารขอบัตร
				<span class="badge badge-success align-self-center ml-auto"> <?php echo $count_studentcard2; ?></span></a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=list_certified" class="nav-link "><span>ยื่นเรื่องขอเอกสารรับรอง</span>
				<span class="badge badge-purple align-self-center ml-auto"> <?php echo $count_certified1; ?></span></a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=certified_show" class="nav-link "><span>รายชื่อผู้ขอเอกสารรับรอง</span>
				<span class="badge badge-warning align-self-center ml-auto"> <?php echo $count_certified2; ?></span></a></li>
            </ul>
        </li>

<?php
//Student1

	$sql_student1 = "SELECT * FROM tb_student WHERE user_status = '1'";
	$cc_student1 = result_array($sql_student1);
	$count_student1 = count($cc_student1);

//end*************************************

//Alumni1

	$sql_alumni1 = "SELECT * FROM tb_student WHERE user_status = '2'";
	$cc_alumni1 = result_array($sql_alumni1);
	$count_alumni1 = count($cc_alumni1);

//end*************************************

?>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-people"></i> <span>ข้อมูลนิสิต</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_all" class="nav-link "><span>นิสิตทั้งหมด</span>
				<span class="badge badge-primary align-self-center ml-auto"> <?php echo $count_student1; ?></span></a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=alumni" class="nav-link "><span>ศิษย์เก่า</span>
				<span class="badge badge-danger align-self-center ml-auto"> <?php echo $count_alumni1; ?></span></a></li>
            </ul>
        </li>

        <!--<li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-cog"></i> <span>ตั้งค่า</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">ภาคเรียน</a></li>
            </ul>
        </li>-->

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-users4"></i> <span>จัดการผู้ใช้</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">อาจารย์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user" class="nav-link ">ผู้ใช้งานระบบ</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item">
            <a href="#" id="sweet_LogoutB"  class="nav-link" ><i class="icon-exit3"></i> <span >ออกจากระแบบ</span></a>
        </li>

        <!-- /main -->

    <?php }else{} ?>
    <!-- /page kits -->
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } ?>