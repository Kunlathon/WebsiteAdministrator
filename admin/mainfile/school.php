<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/dashboard.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) {
        //----------------------------------------------------------------------------------------------
?>


        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=dashboard" class="breadcrumb-item"> จัดการข้อมูลพื้นฐาน</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลพื้นฐาน</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>ข้อมูลพื้นฐานสถานศึกษา</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <div class="btn-group">
<?php
    $manage = filter_input(INPUT_GET, 'manage');
        if(($manage=="show")){ ?>
                        <button type="button" name="school_show" id="school_show" class="btn btn-secondary" value="show">ข้อมูลพื้นฐาน</button>
                        <button type="button" name="school_edit" id="school_edit" class="btn btn-outline-success" value="edit">แก้ไขข้อมูลพื้นฐาน</button>
                        <button type="button" name="school_img" id="school_img" class="btn btn-outline-info" value="change_picture">เปลี่ยนรูป</button>                        
<?php   }elseif(($manage=="edit")){ ?>
                        <button type="button" name="school_show" id="school_show" class="btn btn-outline-secondary" value="show">ข้อมูลพื้นฐาน</button>
                        <button type="button" name="school_edit" id="school_edit" class="btn btn-success" value="edit">แก้ไขข้อมูลพื้นฐาน</button>
                        <button type="button" name="school_img" id="school_img" class="btn btn-outline-info" value="change_picture">เปลี่ยนรูป</button>
<?php   }elseif(($manage=="change_picture")){ ?>
                        <button type="button" name="school_show" id="school_show" class="btn btn-outline-secondary" value="show">ข้อมูลพื้นฐาน</button>
                        <button type="button" name="school_edit" id="school_edit" class="btn btn-outline-success" value="edit">แก้ไขข้อมูลพื้นฐาน</button>
                        <button type="button" name="school_img" id="school_img" class="btn btn-info" value="change_picture">เปลี่ยนรูป</button>
<?php   }else{ ?>
                        <button type="button" name="school_show" id="school_show" class="btn btn-outline-secondary" value="show">ข้อมูลพื้นฐาน</button>
                        <button type="button" name="school_edit" id="school_edit" class="btn btn-outline-success" value="edit">แก้ไขข้อมูลพื้นฐาน</button>
                        <button type="button" name="school_img" id="school_img" class="btn btn-outline-info" value="change_picture">เปลี่ยนรูป</button>
<?php   } ?>





                    </div>
                </div>
            </div><br>


            <?php

            $sql = "SELECT * FROM tb_school a INNER JOIN tb_province b ON a.school_province_id=b.province_id ORDER BY a.school_id DESC";
            $row = row_array($sql);

            //$manage = filter_input(INPUT_GET, 'manage');
            if (($manage == "create")) { ?>

            <?php    } elseif (($manage == "edit")) { ?>
                <form name="school-update" id="school-update" method="post" accept-charset="utf-8">

                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อโรงเรียน</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <div id="name-null">
                                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['school_name']; ?>">
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">School</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <div id="ename-null">
                                                    <input type="text" name="ename" id="ename" class="form-control" value="<?php echo $row['school_name_eng']; ?>">
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">สังกัด</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <div id="affiliation-null">
                                                    <input type="text" name="affiliation" id="affiliation" class="form-control" value="<?php echo $row['school_affiliation']; ?>">
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">เขตพื้นที่</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <div id="area-null">
                                                    <input type="text" name="area" id="area" class="form-control" value="<?php echo $row['school_area']; ?>">
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ตำบล</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <div id="tambon-null">
                                                    <input type="text" name="tambon" id="tambon" class="form-control" value="<?php echo $row['school_tambon']; ?>">
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">อำเภอ</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <div id="amphoe-null">
                                                    <input type="text" name="amphoe" id="amphoe" class="form-control" value="<?php echo $row['school_amphoe']; ?>">
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">จังหวัด</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <select class="form-control select-search" name="provinceid" id="provinceid" data-fouc>

                                                    <?php
                                                    $sql = "SELECT * FROM tb_province ORDER BY province ASC";
                                                    $tm = result_array($sql);
                                                    ?>

                                                    <?php foreach ($tm as $_tm) { ?>

                                                        <option <?php echo $row['province_id'] == $_tm['province_id'] ? "selected" : ""; ?> value="<?php echo $_tm['province_id']; ?>"><?php echo $_tm['province']; ?>
                                                        </option>
                                                    <?php } ?>

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
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">นายทะเบียน</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <div id="register-null">
                                                    <input type="text" name="register" id="register" class="form-control" value="<?php echo $row['school_register']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ผู้อำนวยการ</label>
                                            <div class="col-<?php echo $grid; ?>-9">
                                                <div id="direction-null">
                                                    <input type="text" name="direction" id="direction" class="form-control" value="<?php echo $row['school_direction']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3" style="float: left">
                                        <div class="form-group row">
                                            <button type="button" name="update_school" id="update_school" class="btn btn-info">บันทึก</button>&nbsp;
                                            <button type="button" name="update_cancel" id="update_cancel" class="btn btn-danger">ยกเลิก</button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>


            <?php    }elseif(($manage=="change_picture")){ 

                    $img_sql = "SELECT * FROM tb_school a INNER JOIN tb_province b ON a.school_province_id=b.province_id ORDER BY a.school_id DESC";
                    $img_row = row_array($img_sql);

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
                        if(($img_row['school_img']==null or $img_row['school_img']=='0' or $img_row['school_img']=='-')){ ?>
                                    <img src="https://www.abaacademic.com/web2023/admin/images/aba.jpg" class="img-thumbnail">
                <?php   }else{ ?>
                                    <img src="<?php echo $RunLink->Call_Link_System();?>/uploads/school_picture/<?php echo $img_row['school_img'];?>" class="img-thumbnail">
                <?php   }  ?>                                  
                                        
                                    </div>
                                    <div class="col-<?php echo $grid; ?>-6">
<form name="form_change_picture" id="form_change_picture" enctype="multipart/form-data" action="<?php echo $RunLink->Call_Link_System();?>/js_code/school/school_process.php" method="post">

                                        <div class="form-group row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <input type="file" name="change_picture" id="change_picture" class="ChangePicture" data-fouc>
                                                <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code> <code>png</code>,<code>PNG</code></span>
                                            </div>
                                        </div>

 

    <input type="hidden" name="action" id="action" value="change_picture">   
    <input type="hidden" name="sid" id="sid" value="<?php echo $row['school_id'];?>">                                             
</form>                
                                    </div>
                                </div>     

                            </div>
                        </div>
                    </div>
                </div>


            <?php    }elseif (($manage == "process")) { ?>

                <?php
                $action = filter_input(INPUT_POST, 'action');

                if (($action == "edit")) {
                    $name = filter_input(INPUT_POST, 'name');
                    $ename = filter_input(INPUT_POST, 'ename');
                    $affiliation = filter_input(INPUT_POST, 'affiliation');
                    $area = filter_input(INPUT_POST, 'area');
                    $tambon = filter_input(INPUT_POST, 'tambon');
                    $amphoe = filter_input(INPUT_POST, 'amphoe');
                    $provinceid = filter_input(INPUT_POST, 'provinceid');
                    $register = filter_input(INPUT_POST, 'register');
                    $direction = filter_input(INPUT_POST, 'direction');
                    $sid = filter_input(INPUT_POST, 'sid');
                    $data = array(
                        "school_name" => $name,
                        "school_name_eng" => $ename,
                        "school_affiliation" => $affiliation,
                        "school_area" => $area,
                        "school_tambon" => $tambon,
                        "school_amphoe" => $amphoe,
                        "school_province_id" => $provinceid,
                        "school_register" => $register,
                        "school_direction" => $direction
                    );
                    $Set_update = update("tb_school", $data, "school_id = '{$sid}'");
                } else {
                }
                ?>

            <?php    } else { ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-4">
                        <div class="card">
                            <div class="card-img-actions">

                <?php
                        if(($row['school_img']==null or $row['school_img']=='0' or $row['school_img']=='-')){ ?>
                                <img class="card-img-top img-fluid mx-auto d-block" style="width: 50%;" src="https://www.abaacademic.com/web2023/admin/images/aba.jpg" class="img-thumbnail">
                <?php   }else{ ?>
                                <img class="card-img-top img-fluid mx-auto d-block" style="width: 50%;" src="<?php echo $RunLink->Call_Link_System();?>/uploads/school_picture/<?php echo $row['school_img'];?>" class="img-thumbnail">
                <?php   }  ?>   



                            </div>
                            <div class="card-body text-center">
                                <h6 class="font-weight-semibold mb-0"><?php echo $row['school_name']; ?></h6>
                                <span class="d-block text-muted"><?php echo $row['school_name_eng']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-<?php echo $grid; ?>-8">

                        <div class="card">
                            <div class="collapse show">
                                <ul class="nav nav-sidebar">
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>ชื่อโรงเรียน</b>&nbsp;:&nbsp;<?php echo $row['school_name']; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>School</b>&nbsp;:&nbsp;<?php echo $row['school_name_eng']; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>สังกัด</b>&nbsp;:&nbsp;<?php echo $row['school_affiliation']; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>เขตพื้นที่</b>&nbsp;:&nbsp;<?php echo $row['school_area']; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>ตำบล</b>&nbsp;:&nbsp;<?php echo $row['school_tambon']; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>อำเภอ</b>&nbsp;:&nbsp;<?php echo $row['school_amphoe']; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>จังหวัด</b>&nbsp;:&nbsp;<?php echo $row['province']; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>นายทะเบียน</b>&nbsp;:&nbsp;<?php echo $row['school_register']; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <b>ผู้อำนวยการ</b>&nbsp;:&nbsp;<?php echo $row['school_direction']; ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>



            <?php    } ?>

        </div>

<?php
    }
}
?>