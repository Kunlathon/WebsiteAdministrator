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
    <!-- Main -->
    <?php if ((check_session("admin_status_lcm") == '1')) { ?>

        <li class="nav-item">
            <a href="index.php" class="nav-link">
                <i class="icon-home4"></i>
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
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>ข้อมูลพื้นฐาน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide" class="nav-link ">ภาพสไลด์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video" class="nav-link ">youtube</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album" class="nav-link ">ภาพกิจกรรม</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-design"></i> <span>จัดการหน้าเว็บไซต์</span></a>

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
            <a href="#" class="nav-link"><i class="icon-list-unordered"></i> <span>จัดการหน้าข่าวสาร</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news" class="nav-link ">ข่าวสารทั้งหมด</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=announcemen_news" class="nav-link ">ข่าวประกาศ</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=press_release_news" class="nav-link ">ข่าวประชาสัมพันธ์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=procurement_news" class="nav-link ">ข่าวจัดชื้อจัดจ้าง</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=job_recruitment_news" class="nav-link ">ข่าวรับสมัครงาน</a></li>

            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-graduation2"></i> <span>จัดการหลักสูตร</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data" class="nav-link ">จัดหลักสูตร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" class="nav-link">หลักสูตรหลัก</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data" class="nav-link">ภาคเรียน</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-reading"></i> <span>ข้อมูลนิสิต</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data" class="nav-link ">รายชื่อนิสิต</a></li>                
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_success" class="nav-link">สำเร็จการศึกษา</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni" class="nav-link">ศิษย์เก่า</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_resign" class="nav-link">ลาออก</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_drop" class="nav-link">ลาพัก</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-stack2"></i> <span>บริการออนไลน์</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
				<li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=request_card" class="nav-link ">ยื่นเอกสารขอบัตร</a></li>  
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=request_card_list" class="nav-link">รายการผู้ขอเอกสารขอบัตร</a></li>
				<li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=request_certified" class="nav-link">ยื่นเรื่องขอเอกสารรับรอง</a></li>
				<li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=request_certified_list" class="nav-link">รายการผู้ขอเอกสารรับรอง</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-sphere"></i> <span>เอกสารดาวน์โหลด</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document" class="nav-link ">เอกสาร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document_category" class="nav-link">ประเภท</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-people"></i> <span>ข้อมูลผู้ใช้งาน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data" class="nav-link">ผู้ใช้งาน</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data2" class="nav-link">ผู้ใช้งาน (ออกแล้ว)</a></li>
            </ul>
        </li>


        <!-- /main -->

    <?php }else{} ?>
    <!-- /page kits -->
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } ?>