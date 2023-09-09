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
            <a href="#" class="nav-link"><i class="icon-city"></i> <span>ข้อมูลพื้นฐาน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide" class="nav-link ">ภาพสไลด์</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-city"></i> <span>จัดการหน้าเว็บไซต์</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_history" class="nav-link ">ประวัติศูนย์ภาษา</a></li>
                <li class="nav-item"><a href="#" class="nav-link ">ปณิธาน & วิสัยทัศน์ & พันธกิจ & วัตถุประสงค์</a></li>
                <li class="nav-item"><a href="#" class="nav-link ">แผนยุทธศาสตร์ & เป้าประสงค์</a></li>
                <li class="nav-item"><a href="#" class="nav-link ">สารจากผู้บริหาร</a></li>
                <li class="nav-item"><a href="#" class="nav-link ">โครงสร้างองค์กร และคณะกรรมการ</a></li>
                <li class="nav-item"><a href="#" class="nav-link ">คณะผู้บริหาร</a></li>
                <li class="nav-item"><a href="#" class="nav-link ">ติดต่อเรา</a></li>
                <li class="nav-item"><a href="#" class="nav-link ">แผนที่</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-graduation2"></i> <span>จัดการหลักสูตร</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data" class="nav-link ">จัดหลักสูตร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data" class="nav-link">หลักสูตรหลัก</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data" class="nav-link">ระดับชั้น</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data" class="nav-link">ภาคเรียน</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data" class="nav-link">เช็คการสอน</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject" class="nav-link">เช็ครายวิชา</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-design"></i> <span>จัดการรายวิชา</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data" class="nav-link ">รายวิชา</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data" class="nav-link">ประเภทรายวิชา</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_level_data" class="nav-link">ระดับรายวิชา</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-list-unordered"></i> <span>แบบประเมิน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=assessment_classroom" class="nav-link ">จัดการแบบประเมิน</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=assessment_data" class="nav-link">ประเมินนิสิต(ครูต่างประเทศ)</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=assessment_data_th" class="nav-link">ประเมินนิสิต(ครูไทย)</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=character_data" class="nav-link">ประเมินคุณลักษณะนิสิต</a></li>
                <li class="nav-item"><a href="#" class="nav-link">ประเมินกิจกรรมพัฒนาผู้เรียน</a></li>
                <!-- <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=activity_data" class="nav-link">ประเมินกิจกรรมพัฒนาผู้เรียน</a></li> -->
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-reading"></i> <span>ข้อมูลนิสิต</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data" class="nav-link ">รายชื่อนิสิต</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1" class="nav-link">ประถมศึกษา</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data2" class="nav-link">มัธยมศึกษาตอนต้น</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data3" class="nav-link">มัธยมศึกษาตอนปลาย</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_success" class="nav-link">สำเร็จการศึกษา</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_alumni" class="nav-link">ศิษย์เก่า</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_resign" class="nav-link">ลาออก</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_drop" class="nav-link">ลาพัก</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-quill4"></i> <span>ข้อมูลครู</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all" class="nav-link ">รายชื่อครูทั้งหมด</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data1" class="nav-link">ครูไทย</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data2" class="nav-link">ครูต่างประเทศ</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=person_data" class="nav-link">บุคลากร</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_data3" class="nav-link">ครู บุคลากร(ออกแล้ว)</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data" class="nav-link">ผู้ใช้งาน</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data2" class="nav-link">ผู้ใช้งาน(ออกแล้ว)</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-stats-bars"></i> <span>ผลคะแนน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score" class="nav-link ">ผลคะแนน</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_back" class="nav-link">ผลคะแนน(ย้อนหลัง)</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_double" class="nav-link">ผลคะแนน(ดับเบิล)</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_assessment" class="nav-link">การประเมิน</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-stats-bars3"></i> <span>รายงานผลสัมฤทธิ์</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_achievement_edu" class="nav-link ">ผลสัมฤทธิ์ทางการศึกษา</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_achievement_update" class="nav-link">ปรับปรุงผลสัมฤทธิ์</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-coins"></i> <span>ตรวจสอบการชำระเงิน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_payment" class="nav-link ">ตรวจสอบการชำระเงิน</a></li>
                <li class="nav-item"><a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment" class="nav-link">จัดการการชำระเงิน</a></li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-book"></i> <span>คู่มือการใช้งาน</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item"><a href="guide/aba-system-guide.pdf" class="nav-link ">คู่มือการใช้งาน</a></li>
            </ul>
        </li>

        <!-- /main -->

    <?php }else{} ?>
    <!-- /page kits -->
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } ?>