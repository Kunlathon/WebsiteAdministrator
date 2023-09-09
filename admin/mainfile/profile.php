<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/profile.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) {
        //----------------------------------------------------------------------------------------------
?>


        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=profile" class="breadcrumb-item"> จัดการข้อมูลส่วนตัว</a>

                        <a href="#" class="breadcrumb-item"> ประวัติส่วนตัว</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>ประวัติส่วนตัว</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <div class="btn-group">
        <?php
                $manage = filter_input(INPUT_GET, 'manage');
                
                if(($manage=="show")){ ?>
                        <button type="button" name="profile_read" id="profile_read" class="btn btn-secondary" value="show">ประวัติส่วนตัว</button>
                        <button type="button" name="profile_update" id="profile_update" class="btn btn-outline-success" value="edit">แก้ไขประวัติส่วนตัว</button>
                        <button type="button" name="profile_img" id="profile_img" class="btn btn-outline-info" value="change_picture">เปลี่ยนรูป</button>
        <?php   }elseif(($manage=="edit")){ ?>
                        <button type="button" name="profile_read" id="profile_read" class="btn btn-outline-secondary" value="show">ประวัติส่วนตัว</button>
                        <button type="button" name="profile_update" id="profile_update" class="btn btn-success" value="edit">แก้ไขประวัติส่วนตัว</button>
                        <button type="button" name="profile_img" id="profile_img" class="btn btn-outline-info" value="change_picture">เปลี่ยนรูป</button>
        <?php   }elseif(($manage=="change_picture")){ ?>
                        <button type="button" name="profile_read" id="profile_read" class="btn btn-outline-secondary" value="show">ประวัติส่วนตัว</button>
                        <button type="button" name="profile_update" id="profile_update" class="btn btn-outline-success" value="edit">แก้ไขประวัติส่วนตัว</button>
                        <button type="button" name="profile_img" id="profile_img" class="btn btn-info" value="change_picture">เปลี่ยนรูป</button>
        <?php   }else{ ?>
                        <button type="button" name="profile_read" id="profile_read" class="btn btn-outline-secondary" value="show">ประวัติส่วนตัว</button>
                        <button type="button" name="profile_update" id="profile_update" class="btn btn-outline-success" value="edit">แก้ไขประวัติส่วนตัว</button>
                        <button type="button" name="profile_img" id="profile_img" class="btn btn-outline-info" value="change_picture">เปลี่ยนรูป</button>
        <?php   } ?>



                    </div>
                </div>
            </div><br>


            <?php

           // $manage = filter_input(INPUT_GET, 'manage');

            if (($manage == "create")) { ?>

            <?php    } elseif (($manage == "edit")) { ?>

                <?php
                $aid = check_session("admin_id_lcm");
                $sql = "SELECT * FROM tb_admin WHERE admin_id = '{$aid}'";
                $row = row_array($sql);
                ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card">
                            <div class="card-body">

                                <form name="Update_Profile" id="Update_Profile" method="post" accept-charset="utf-8">

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12" style="font-size: 20px; font-weight: bold;">ข้อมูลประวัติส่วนตัว</div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ</label>
                                                    <div class="col-<?php echo $grid; ?>-9">
                                                        <div id="firstname-null">
                                                            <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo @$row['admin_name']; ?>" placeholder="ชื่อ" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุล</label>
                                                    <div class="col-<?php echo $grid; ?>-9">
                                                        <div id="lastname-null">
                                                            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $row['admin_lastname']; ?>" placeholder="นามสกุล" required="required">
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
                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">เลขที่บัตรประชาชน</label>
                                                    <div class="col-<?php echo $grid; ?>-9">
                                                        <div id="idcard-null">
                                                            <input type="text" name="idcard" id="idcard" class="form-control" value="<?php echo $row['admin_idcard']; ?>" placeholder="เลขที่บัตรประชาชน" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">Username</label>
                                                    <div class="col-<?php echo $grid; ?>-9">
                                                        <div id="username-null">
                                                            <input type="text" name="username_show" id="username_show" class="form-control" value="<?php echo $row['admin_username']; ?>" placeholder="Username" required="required" disabled="disabled">
                                                            <input type="hidden" name="username" id="username" class="form-control" value="<?php echo $row['admin_username']; ?>" placeholder="Username" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12" style="font-size: 20px; font-weight: bold;">ข้อมูลติดต่อ</div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ที่อยู่ตามทะเบียนบ้าน</label>
                                                    <div class="col-<?php echo $grid; ?>-9">
                                                        <div id="address-null">
                                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="ที่อยู่ตามทะเบียนบ้าน" required="required"><?php echo $row['admin_address']; ?></textarea>
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
                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">เบอร์โทรศัพท์มือถือ</label>
                                                    <div class="col-<?php echo $grid; ?>-9">
                                                        <div id="tel-null">
                                                            <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $row['admin_tel']; ?>" pattern="[0-9]" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">อีเมล์</label>
                                                    <div class="col-<?php echo $grid; ?>-9">
                                                        <div id="email-null">
                                                            <input type="mail" name="email" id="email" class="form-control" value="<?php echo $row['admin_email']; ?>" required="required">
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
                                                    <button type="button" name="Edit_Profile" id="Edit_Profile" class="btn btn-info">บันทึก</button>&nbsp;
                                                    <button type="button" name="update_cancel" id="update_cancel" class="btn btn-danger">ยกเลิก</button>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            <?php    } elseif (($manage == "process")) { ?>

                <?php
                $aid = check_session("admin_id_lcm");
                $now_date = date('Y-m-d');

                $idcard = filter_input(INPUT_POST, 'idcard');
                $firstname = filter_input(INPUT_POST, 'firstname');
                $lastname = filter_input(INPUT_POST, 'lastname');
                $address = filter_input(INPUT_POST, 'address');
                $tel = filter_input(INPUT_POST, 'tel');
                $email = filter_input(INPUT_POST, 'email');

                $data = array(
                    "admin_idcard" => $idcard,
                    "admin_name" => $firstname,
                    "admin_lastname" => $lastname,
                    "admin_address" => $address,
                    "admin_tel" => $tel,
                    "admin_email" => $email,
                    "admin_update" => $now_date
                );

                update("tb_admin", $data, "admin_id = '{$aid}'");

                ?>


            <?php    } elseif (($manage == "change_picture")) { 
                $aid = check_session("admin_id_lcm");
                $profile_img_sql = "SELECT * FROM tb_admin WHERE admin_id = '{$aid}'";
                $profile_img_row = row_array($profile_img_sql);
                
                ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12" style="font-size: 20px; font-weight: bold;">เปลี่ยนรูป</div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-6">
                <?php
                        if(($profile_img_row['admin_img']==null or $profile_img_row['admin_img']=='0' or $profile_img_row['admin_img']=='-')){ ?>
                                    <img src="https://www.abaacademic.com/web2023/admin/images/aba.jpg" class="img-thumbnail">
                <?php   }else{ ?>
                                    <img src="<?php echo $RunLink->Call_Link_System();?>/uploads/profile_picture/<?php echo $profile_img_row['admin_img'];?>" class="img-thumbnail">
                <?php   }  ?>                                  
                                        
                                    </div>
                                    <div class="col-<?php echo $grid; ?>-6">
<form name="form_change_picture" id="form_change_picture" enctype="multipart/form-data" action="<?php echo $RunLink->Call_Link_System();?>/js_code/profile/profile_process.php" method="post">

                                        <div class="form-group row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <input type="file" name="change_picture" id="change_picture" class="ChangePicture" data-fouc>
                                                <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code> <code>png</code>,<code>PNG</code></span>
                                            </div>
                                        </div>



    <input type="hidden" name="action" id="action" value="change_picture">                                                
</form>                
                                    </div>
                                </div>     

                            </div>
                        </div>
                    </div>
                </div>

               
                
            <?php   } else { ?>

                <?php
                $aid = check_session("admin_id_lcm");
                $sql = "SELECT * FROM tb_admin WHERE admin_id = '{$aid}'";
                $row = row_array($sql);
                ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card">
                            <div class="collapse show">
                                <div class="row card-body">
                                    <div class="col-<?php echo $grid; ?>-4">

                                        <div class="card-img-actions">
                                            
                        <?php
                                if(($row['admin_img']==null or $row['admin_img']=='0' or $row['admin_img']=='-')){ ?>
                                    <img class="card-img-top img-fluid mx-auto d-block" style="width: 50%;" src="https://www.abaacademic.com/web2023/admin/images/aba.jpg" class="img-thumbnail">
                        <?php   }else{ ?>
                                    <img class="card-img-top img-fluid mx-auto d-block" style="width: 50%;" src="<?php echo $RunLink->Call_Link_System();?>/uploads/profile_picture/<?php echo $row['admin_img'];?>" class="img-thumbnail">
                        <?php   }  ?>                                          
                                        </div>

                                    </div>
                                    <div class="col-<?php echo $grid; ?>-8">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12" style="font-size: 20px; font-weight: bold;">ข้อมูลประวัติส่วนตัว</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <ul class="nav nav-sidebar">
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <b>ชื่อ</b>&nbsp;:&nbsp;<?php echo $row['admin_name']; ?>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <b>นามสกุล</b>&nbsp;:&nbsp;<?php echo $row['admin_lastname']; ?>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <b>เลขที่บัตรประชาชน</b>&nbsp;:&nbsp;<?php echo $row['admin_idcard']; ?>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <b>Username</b>&nbsp;:&nbsp;<?php echo $row['admin_username']; ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-<?php echo $grid; ?>-4">

                                    </div>

                                    <div class="col-<?php echo $grid; ?>-8">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12" style="font-size: 20px; font-weight: bold;">ข้อมูลติดต่อ</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <ul class="nav nav-sidebar">
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <b>ที่อยู่ตามทะเบียนบ้าน</b>&nbsp;:&nbsp;<?php echo $row['admin_address']; ?>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <b>เบอร์โทรศัพท์มือถือ</b>&nbsp;:&nbsp;<?php echo $row['admin_tel']; ?>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <b>อีเมล์</b>&nbsp;:&nbsp;<?php echo $row['admin_email']; ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            <?php   } ?>

        </div>

<?php
    } else {
    }
}
?>