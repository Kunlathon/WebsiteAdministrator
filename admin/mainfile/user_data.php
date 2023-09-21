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
<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/user_data.php/", $_SERVER['PHP_SELF']))) {
    Header("Location:../index.php");
    die();
} else {
    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=user_data" class="breadcrumb-item"> ผู้ใช่งานระบบ</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลผู้ใช่งานระบบ</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <?php
            @$list = filter_input(INPUT_GET, 'list');
            @$list = base64_decode($list);
            //@$id=filter_input(INPUT_GET, 'id');

            if (($list == "profile")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                $admin_key = base64_decode(filter_input(INPUT_GET, 'admin_key'));
                if ((!is_null($admin_key))) {
                    $sql = "SELECT * FROM `tb_admin` WHERE `admin_id`='{$admin_key}'";
                    $row = row_array($sql); ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <h4>ข้อมูลผู้ใช่งานระบบ</h4>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">

                            <table>
                                <tr>
                                    <td>
                                        <div>
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data';" class="btn btn-outline-success" value="">รายการ</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <form name="form_show" id="form_show" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data&list=<?php echo base64_encode('profile'); ?>&admin_key=<?php echo base64_encode(@$row['admin_id']); ?>">
                                                <button type="submit" name="button_show" id="button_show" class="btn btn-outline-success" value="">ประวัติส่วนตัว</button>
                                                <input type="hidden" name="list" id="list" value="<?php echo base64_encode('profile'); ?>">
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <form name="update_ta" id="update_ta" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data&manage=form_edit&admin_key=<?php echo base64_encode(@$row['admin_id']); ?>">
                                                <button type="submit" name="submit_update" id="submit_update" class="btn btn-outline-success" value="">แก้ไขประวัติส่วนตัว</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button type="button" name="profile_teacher_img" id="profile_teacher_img" class="btn btn-outline-success" value="img">เปลี่ยนรูป</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <h4>ชื่อ-สกุล : <?php echo @$row["admin_name"] . "&nbsp;" . @$row["admin_lastname"]; ?></h4>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-info">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-12">ประวัติส่วนตัว</div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ชื่อ-นามสกุล&nbsp;:&nbsp;</div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["admin_name"]; ?>&nbsp;<?php echo @$row["admin_lastname"]; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">Username&nbsp;:&nbsp;</div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["admin_username"]; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">เลขที่บัตรประชาชน&nbsp;:&nbsp;</div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["admin_idcard"]; ?></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-info">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <h6 class="card-title">ข้อมูลติดต่อ</h6>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">ที่อยู่ตามทะเบียนบ้าน&nbsp;:&nbsp;</div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["admin_address"]; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">เบอร์โทรศัพท์มือถือ&nbsp;:&nbsp;</div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["admin_tel"]; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-3">อีเมล์&nbsp;:&nbsp;</div>
                                        <div class="col-<?php echo $grid; ?>-9"><?php echo @$row["admin_email"]; ?></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                } ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } else { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>รายชื่อผู้ใช่งานระบบทั้งหมด</h4>
                    </div>
                </div>

                <?php
                $manage = filter_input(INPUT_GET, 'manage');
                if (($manage == "form_add")) { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลผู้ใช่งานระบบ</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลผู้ใช่งานระบบ</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="user_data_form_add" id="user_data_form_add" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="name-null">
                                                                        <input type="text" name="name" id="name" class="form-control" value="" placeholder="กรอกข้อมูลชื่อ" required="required">
                                                                        <span>กรอกข้อมูลชื่อ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุล</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <input type="text" name="surname" id="surname" class="form-control" value="" placeholder="กรอกข้อมูลนามสกุล" required="required">
                                                                    <span>กรอกข้อมูลนามสกุล</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อผู้ใช่งาน <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="username-null">
                                                                        <input type="text" name="username" id="username" class="form-control" value="" placeholder="กรอกข้อมูลชื่อผู้ใช่งาน" required="required">
                                                                        <span>กรอกข้อมูลชื่อผู้ใช่งานต้องมีอย่างน้อย 6 ตัวอักษร</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">รหัสผ่าน <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="password-null">
                                                                        <input type="text" name="password" id="password" class="form-control" value="aba@123456" placeholder="กรอกข้อมูลชื่อผู้ใช่งาน" required="required">
                                                                        <span>กรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร เบื้องต้น aba@123456</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">เบอร์โทรศัพท์ <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="tel-null">
                                                                        <input type="text" name="tel" id="tel" class="form-control" value="" placeholder="กรอกข้อมูลเบอร์โทรศัพท์" required="required">
                                                                        <span>กรอกข้อมูลเบอร์โทรศัพท์</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">อีเมล์ <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <div id="email-null">
                                                                        <input type="email" name="email" id="email" class="form-control" value="" placeholder="กรอกข้อมูลอีเมล์" required="required">
                                                                        <span>กรอกข้อมูลอีเมล์</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ประเภทผู้ใช่งานระบบ <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <select class="form-control select" name="type" id="type" data-placeholder="เลือกประเภทผู้ใช่งานระบบ..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ประเภทผู้ใช่งานระบบ">
                                                                            <option value="1">ผู้ดูแลระบบ</option>
                                                                            <option value="2">วิชาการไทย</option>
                                                                            <option value="3">วิชาการต่างประเทศ</option>
                                                                            <option value="4">นายทะเบียน</option>
                                                                            <option value="5">บุคลากรทะเบียน</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="type-null"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ประจำระดับชั้น</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <select class="form-control select" name="grade" id="grade" data-placeholder="เลือกประจำระดับชั้น..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ประจำระดับชั้น">
                                                                            <option value="1">ระดับประถมศึกษา</option>
                                                                            <option value="2">ระดับมัธยมศึกษา</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    <span>
                                                                        <font>เลือกกรณีประเภทผู้ใช่งานระบบเป็นวิชาการ</font>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <button type="button" name="Add_user_data" id="Add_user_data" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                </from>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php } elseif (($manage == "form_edit")) { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    @$admin_key = base64_decode(filter_input(INPUT_GET, 'admin_key'));
                    if (($admin_key != null)) {
                        $sql = "SELECT * FROM `tb_admin` WHERE `admin_id` = '{$admin_key}'";
                        $row = row_array($sql);
                    ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลผู้ใช่งานระบบ</div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลผู้ใช่งานระบบ</button>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="user_data_form_edit" id="user_data_form_edit" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="name-null">
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['admin_name']; ?>" placeholder="กรอกข้อมูลชื่อ" required="required">
                                                                            <span>กรอกข้อมูลชื่อ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุล</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $row['admin_lastname']; ?>" placeholder="กรอกข้อมูลนามสกุล" required="required">
                                                                        <span>กรอกข้อมูลนามสกุล</span>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อผู้ใช่งาน <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="username-null">
                                                                            <input type="text" name="username_show" id="username_show" class="form-control" value="<?php echo $row['admin_username']; ?>" placeholder="กรอกข้อมูลชื่อผู้ใช่งาน" required="required" disabled="disabled" />
                                                                            <input type="hidden" name="username" id="username" class="form-control" value="<?php echo $row['admin_username']; ?>" placeholder="กรอกข้อมูลชื่อผู้ใช่งาน" required="required">
                                                                            <span>กรอกข้อมูลชื่อผู้ใช่งานต้องมีอย่างน้อย 6 ตัวอักษร</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">เบอร์โทรศัพท์ <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="tel-null">
                                                                            <input type="text" name="tel" id="tel" class="form-control" value="<?php echo $row['admin_tel']; ?>" placeholder="กรอกข้อมูลเบอร์โทรศัพท์" required="required">
                                                                            <span>กรอกข้อมูลเบอร์โทรศัพท์</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">อีเมล์ <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="email-null">
                                                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['admin_email']; ?>" placeholder="กรอกข้อมูลอีเมล์" required="required">
                                                                            <span>กรอกข้อมูลอีเมล์</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ประเภทผู้ใช่งานระบบ <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="type" id="type" data-placeholder="เลือกประเภทผู้ใช่งานระบบ..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ประเภทผู้ใช่งานระบบ">
                                                                                <option <?php echo $row['admin_status'] == 1 ? "selected" : ""; ?> value="1">ผู้ดูแลระบบ</option>
                                                                                <option <?php echo $row['admin_status'] == 2 ? "selected" : ""; ?> value="2">วิชาการไทย</option>
                                                                                <option <?php echo $row['admin_status'] == 3 ? "selected" : ""; ?> value="3">วิชาการต่างประเทศ</option>
                                                                                <option <?php echo $row['admin_status'] == 4 ? "selected" : ""; ?> value="4">นายทะเบียน</option>
                                                                                <option <?php echo $row['admin_status'] == 5 ? "selected" : ""; ?> value="5">เจ้าหน้าที่ทะเบียน</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="type-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ประจำระดับชั้น</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="grade" id="grade" data-placeholder="เลือกประจำระดับชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ประจำระดับชั้น">
                                                                                <option <?php echo $row['grade_id'] == 1 ? "selected" : ""; ?> value="1">ระดับประถมศึกษา</option>
                                                                                <option <?php echo $row['grade_id'] == 2 ? "selected" : ""; ?> value="2">ระดับมัธยมศึกษา</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        <span>
                                                                            <font>เลือกกรณีประเภทผู้ใช่งานระบบเป็นวิชาการ</font>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">สถานภาพการทำงาน</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="status_work" id="status_work" data-placeholder="เลือกสถานภาพการทำงาน..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="สถานภาพการทำงาน">
                                                                                <option <?php echo $row['admin_work'] == 1 ? "selected" : ""; ?> value="1">ทำงาน</option>
                                                                                <option <?php echo $row['admin_work'] == 0 ? "selected" : ""; ?> value="0">ออกแล้ว</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <button type="button" name="Edit_user_data" id="Edit_user_data" class="btn btn-info" value="<?php echo @$row['admin_id']; ?>">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                    <input type="hidden" name="admin_key" id="admin_key" value="<?php echo @$row['admin_id']; ?>">
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    </from>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                        $linkcopy = $RunLink->Call_Link_System();
                        exit("<script>window.location='$linkcopy/?modules=user_data';</script>");
                    }
                    ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php } elseif (($manage == "password")) { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    @$admin_key = base64_decode(filter_input(INPUT_GET, 'admin_key'));
                    if (($admin_key != "")) {
                        $sql = "SELECT * FROM `tb_admin` WHERE `admin_id` = '{$admin_key}'";
                        $row = row_array($sql);
                    ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="toast" style="opacity: 1; max-width: none;">
                                    <div class="toast-header bg-success border-success">
                                        <span class="font-weight-semibold mr-auto">ฟอร์มเปลี่ยนรหัสผ่าน</span>
                                    </div>
                                    <div class="toast-body">
                                        <form name="user_data_password" id="user_data_password" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-4">ชื่อ-นามสกุล</label>
                                                            <div class="col-<?php echo $grid; ?>-8">
                                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left"><?php echo @$row['admin_name']; ?> <?php echo @$row['admin_surname']; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-4">ชื่อผู้ใช่</label>
                                                            <div class="col-<?php echo $grid; ?>-8">
                                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left"><?php echo @$row['admin_username']; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-4">รหัสผ่านใหม่</label>
                                                            <div class="col-<?php echo $grid; ?>-8">
                                                                <div id="password-pass">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                                        <input type="text" name="password" id="password" class="form-control form-control-lg" value="aba@123456" required="required">
                                                                        <span>กรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร ต้องมีตัวเลขและตัวอังกฤษ(รหัสผ่านเบื้องต้น aba@123456)</span>
                                                                        <div class="form-control-feedback form-control-feedback-lg">
                                                                            <i class="icon-key"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3" style="float: right">
                                                        <button type="button" name="password_user_data" id="password_user_data" class="btn btn-info">บันทึก</button>&nbsp;
                                                        <button type="reset" name="changepass_cancel" id="changepass_cancel" class="btn btn-danger">ยกเลิก</button>
                                                        <input type="hidden" name="admin_key" id="admin_key" value="<?php echo @$row['admin_id']; ?>">
                                                </div>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                        $linkcopy = $RunLink->Call_Link_System();
                        exit("<script>window.location='$linkcopy/?modules=user_data';</script>");
                    } ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php } else { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลคุณผู้ใช่งานระบบทั้งหมด</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data&manage=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลผู้ใช่งานระบบ</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="user_data_read" id="user_data_read" method="post" accept-charset="utf-8">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-button-html5-columns-STD">
                                                        <thead>
                                                            <tr align="center">
                                                                <th align="center">
                                                                    <div>#</div>
                                                                </th>
                                                                <th>
                                                                    <div>ชื่อ - สกุล</div>
                                                                </th>
                                                                <th>
                                                                    <div>ชื่อผู้ใช่</div>
                                                                </th>
                                                                <th>
                                                                    <div>เบอร์โทร</div>
                                                                </th>
                                                                <th>
                                                                    <div>อีเมล์</div>
                                                                </th>
                                                                <th>
                                                                    <div>สิทธิ์</div>
                                                                </th>
                                                                <th style="width: 18%;">
                                                                    <div>จัดการ</div>
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $sql = "SELECT * FROM `tb_admin` WHERE (`admin_username` != 'admin' AND `admin_username` != 'snaper') AND `admin_work`='1' ORDER BY `admin_name` ASC";
                                                            $list = result_array($sql);
                                                            ?>
                                                            <?php
                                                            $key = 0;
                                                            foreach ($list as $key => $row) {
                                                                /*$secid=$row['user_data_section_id'];
                        $sqlS = "SELECT * FROM `tb_user_data_section` WHERE `user_data_section_id` = '{$secid}'";
                        $rowS= row_array($sqlS);*/
                                                                $key = $key + 1;
                                                            ?>
                                                                <tr>
                                                                    <td align="center">
                                                                        <div><?php echo $key; ?></div>
                                                                    </td>
                                                                    <th>
                                                                        <div><?php echo @$row['admin_name']; ?>&nbsp;<?php echo @$row['admin_lastname']; ?></div>
                                                                    </th>
                                                                    <th>
                                                                        <div><?php echo @$row['admin_username']; ?></div>
                                                                    </th>
                                                                    <th>
                                                                        <div><?php echo @$row['admin_tel']; ?></div>
                                                                    </th>
                                                                    <th>
                                                                        <div><?php echo @$row['admin_email']; ?></div>
                                                                    </th>
                                                                    <th>
                                                                        <div><?php echo admin_status(@$row['admin_status']); ?></div>
                                                                    </th>
                                                                    <td style="width: 18%;">
                                                                        <div align="center">
                                                                            <button type="button" name="" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data&manage=password&admin_key=<?php echo base64_encode(@$row['admin_id']); ?>';" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="เปลี่ยนรหัสผ่าน" data-placement="bottom" value=""><i class="icon-key"></i></button>

                                                                            <button type="button" name="ShowUser_data" id="ShowUser_data" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data&list=<?php echo base64_encode('profile'); ?>&admin_key=<?php echo base64_encode(@$row['admin_id']); ?>';" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value="<?php echo @$row['admin_id']; ?>"><i class="icon-search4"></i></button>

                                                                            <button type="button" name="Upuser_data" id="Upuser_data" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data&manage=form_edit&admin_key=<?php echo base64_encode(@$row['admin_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo @$row['student_id']; ?>"><i class="icon-pen"></i></button>
                                                                            <button type="button" name="modal_theme_success_Delete<?php echo @$row['admin_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo @$row['admin_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                <div id="modal_theme_success_Delete<?php echo @$row['admin_id']; ?>" class="modal fade" tabindex="-1">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-danger text-white">
                                                                                <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <form name="user_data-data-delete" id="user_data-data-delete" method="post" accept-charset="utf-8">
                                                                                    <div class="row">
                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                            <div class="row" style="text-align: center;">
                                                                                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                    ต้องการลบข้อมูล <?php echo @$row['admin_name'] . " " . @$row['admin_surname']; ?> หรือไม่
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br>

                                                                                    <div class="row" style="text-align: center;">
                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                            <button type="button" id="delete_<?php echo @$row['admin_id']; ?>" name="delete_<?php echo @$row['admin_id']; ?>" class="btn btn-outline-success" value="<?php echo @$row['admin_id']; ?>">ใช่</button>
                                                                                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                    <!--Delete-->
                                                                                    <script>
                                                                                        var ABA_DeleteUserData<?php echo @$row['admin_id']; ?> = function() {
                                                                                            var _componentABA_DeleteUserData = function() {
                                                                                                if (typeof swal == 'undefined') {
                                                                                                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                    return;
                                                                                                }
                                                                                                // Defaults
                                                                                                var swalInitDeleteUserData = swal.mixin({
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
                                                                                                $('#delete_<?php echo @$row['admin_id']; ?>').on('click', function() {

                                                                                                    var action = "delete";
                                                                                                    var table = "tb_admin";
                                                                                                    var ff = "admin_id";
                                                                                                    var id = $("#delete_<?php echo $row['admin_id']; ?>").val();

                                                                                                    if (action == "") {

                                                                                                        swalInitDeleteUserData.fire({
                                                                                                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                            icon: 'error'
                                                                                                        });

                                                                                                    } else {

                                                                                                        if (id != "") {

                                                                                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/user_data/user_data_proccess.php", {
                                                                                                                action: action,
                                                                                                                table: table,
                                                                                                                ff: ff,
                                                                                                                id: id
                                                                                                            }, function(process_add) {
                                                                                                                var process_add = process_add;
                                                                                                                if (process_add.trim() === "no_error") {

                                                                                                                    let timerInterval;
                                                                                                                    swalInitDeleteUserData.fire({
                                                                                                                        title: 'ลบสำเร็จ',
                                                                                                                        //html: 'I will close in <b></b> milliseconds.',
                                                                                                                        timer: 1200,
                                                                                                                        icon: 'success',
                                                                                                                        timerProgressBar: true,
                                                                                                                        didOpen: function() {
                                                                                                                            Swal.showLoading()
                                                                                                                            timerInterval = setInterval(function() {
                                                                                                                                const content = Swal.getContent();
                                                                                                                                if (content) {
                                                                                                                                    const b_user_data = content.querySelector('b_user_data')
                                                                                                                                    if (b_user_data) {
                                                                                                                                        b_user_data.textContent = Swal.getTimerLeft();
                                                                                                                                    } else {}
                                                                                                                                } else {}
                                                                                                                            }, 100);
                                                                                                                        },
                                                                                                                        willClose: function() {
                                                                                                                            clearInterval(timerInterval)
                                                                                                                        }
                                                                                                                    }).then(function(result) {
                                                                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=user_data";
                                                                                                                        } else {}
                                                                                                                    });

                                                                                                                } else if (process_add.trim() === "it_error") {
                                                                                                                    swalInitDeleteUserData.fire({
                                                                                                                        title: 'ข้อมูลซ้ำ',
                                                                                                                        icon: 'error'
                                                                                                                    });
                                                                                                                } else {
                                                                                                                    swalInitDeleteUserData.fire({
                                                                                                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + process_add.trim(),
                                                                                                                        icon: 'error'
                                                                                                                    });
                                                                                                                }


                                                                                                            });

                                                                                                        } else {}

                                                                                                    }
                                                                                                });

                                                                                                //--------------------------------------------------------------------------------------
                                                                                            };
                                                                                            //--------------------------------------------------------------------------------------
                                                                                            return {
                                                                                                initComponentsDeleteUserData: function() {
                                                                                                    _componentABA_DeleteUserData();
                                                                                                }
                                                                                            }
                                                                                        }();
                                                                                        // Initialize module
                                                                                        // ------------------------------
                                                                                        document.addEventListener('DOMContentLoaded', function() {
                                                                                            ABA_DeleteUserData<?php echo @$row['admin_id']; ?>.initComponentsDeleteUserData();
                                                                                        });
                                                                                    </script>
                                                                                    <!--Delete end-->
                                                                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                            <?php    } ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php } ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } ?>

        </div>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php  } else {
    }
}
?>