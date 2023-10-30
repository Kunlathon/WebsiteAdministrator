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
            <a href="<?php echo $RunLink->Call_Link_System(); ?>/" class="nav-link">
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
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>ข้อมูลประชาสัมพันธ์</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news" class="nav-link ">ข่าวสารทั้งหมด</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=basic_website" class="nav-link ">ข้อมูลเว็บไชต์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide" class="nav-link ">ภาพสไลด์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album" class="nav-link ">ภาพกิจกรรม</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video" class="nav-link ">วิดีโอ</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document" class="nav-link ">เอกสารดาวน์โหลด</a></li>

            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>หลักสูตร</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">จัดหลักสูตร</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>ข้อมูลการสมัครเรียน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">ข้อมูลการสมัครเรียน</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">นิสิตที่ผ่านการสมัคร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">นิสิตที่ไม่ผ่านการสมัคร</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>บริการออนไลน์</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">ยื่นเอกสารขอบัตร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">รายชื่อผู้ขอเอกสารขอบัตร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">ยื่นเรื่องขอเอกสารรับรอง</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">รายชื่อผู้ขอเอกสารรับรอง</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>ข้อมูลนิสิต</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">อาจารย์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">ผู้ใช้งานระบบ</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>ตั้งค่า</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">ภาคเรียน</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>จัดการผู้ใช้</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">อาจารย์</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=" class="nav-link ">ผู้ใช้งานระบบ</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>ออกจากระแบบ</span></a>
        </li>

        <!-- /main -->

    <?php }else{} ?>
    <!-- /page kits -->
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } ?>