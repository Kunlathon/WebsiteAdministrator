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

//error_reporting (E_ALL ^ E_NOTICE);
//ini_set('display_errors', 'On');

error_reporting(E_ALL ^ E_NOTICE);

    if((preg_match("/user.php/", $_SERVER['PHP_SELF']))) {
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?> 
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
       
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=student_data" class="breadcrumb-item"> ข้อมูลนิสิตทั้งหมด</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลนิสิตทั้งหมด</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

    <?php
        if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST,'manage');
        }else{
            if((isset($_GET["manage"]))){
                $manage=filter_input(INPUT_GET,'manage');
            }else{
                $manage="show";
            }
        }

            if(($manage=="add")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset>
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลผู้ใช้งานระบบ</h4>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ฟอร์มข้อมูลผู้ใช้งานระบบ</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="user_form_add" id="user_form_add" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_cfa" id="sub_cfa" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-pencil4"></i> เพิ่มข้อมูล</button>
</form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="user_form_show" id="user_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_cfs" id="sub_cfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> แสดงข้อมูล</button>
</form>
                                        </div>
                                    </td>
                                </tr>
                            </table>                    
                        </div>
                    </div>

                    <div class="card-body">
<form name="form_add_user" id="form_add_user" accept-charset="utf-8" action="#" method="post" enctype="multipart/form-data">


                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อ</label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <div id="name-null">
                                                <input type="text" name="name" id="name" class="form-control" value="" placeholder="ชื่อ" required="required" maxlength="100" required="required">
                                                <span>กรอกข้อมูลชื่อ</span>
                                            </div>
                                        <div>
                                    </div>
                                <div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">นามสกุล</label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <div id="surname-null">
                                                <input type="text" name="surname" id="surname" class="form-control" value="" placeholder="นามสกุล" required="required" maxlength="100" required="required">                                           
                                                <span>กรอกข้อมูลนามสกุล</span>
                                            </div>
                                        <div>
                                    </div>
                                <div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อผู้ใช้งาน</label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <div id="username-null">
                                                <input type="text" name="username" id="username" class="form-control" value="" placeholder="ชื่อผู้ใช้งาน" required="required" maxlength="100" required="required">                                           
                                                <span>กรอกข้อมูลชื่อผู้ใช้งาน</span>
                                            </div>
                                        <div>
                                    </div>
                                <div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">รหัสผ่าน</label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <div id="password-null">
                                                <input type="password" name="password" id="password" class="form-control" value="" placeholder="รหัสผ่าน" required="required" maxlength="100" required="required">                                           
                                                <span>กรอกข้อมูลรหัสผ่าน</span>
                                            </div>
                                        <div>
                                    </div>
                                <div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">เบอร์โทรศัพท์</label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <div id="tel-null">
                                                <input type="tel" name="tel" id="tel" class="form-control" value="" pattern="[0-9]{3}-[0-9]{7}" placeholder="เบอร์โทรศัพท์" required="required" maxlength="100" required="required">                                           
                                                <span>กรอกข้อมูลเบอร์โทรศัพท์</span>
                                            </div>
                                        <div>
                                    </div>
                                <div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">อีเมล</label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <div id="email-null">
                                                <input type="email" name="email" id="email" class="form-control" value="" placeholder="อีเมล" required="required" maxlength="100" required="required">                                           
                                                <span>กรอกข้อมูลเบอร์โทรศัพท์</span>
                                            </div>
                                        <div>
                                    </div>
                                <div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid; ?>-2">ประเภทผู้ใช้งานระบบ</label>
                                        <div class="col-<?php echo $grid; ?>-10">
                                            <select class="form-control select" data-fouc  name="type" id="type">  
                                                <option value="">ประเภทผู้ใช้งานระบบ</option>
    <?php
        $select_type_txt=array("ผู้ดูแลระบบ","เจ้าหน้าที่");
        $select_type_id=array(1,2);
        $select_type_count=0;
            while($select_type_count<2){ ?>

                                                <option value="<?php echo $select_type_id[$select_type_count];?>"><?php echo $select_type_txt[$select_type_count];?></option>

    <?php   $select_type_count=$select_type_count+1; 
            } ?>
                                            </select>
                                            <div id="type-null"><span>กรอกข้อมูลประเภทผู้ใช้งานระบบ</span></div>
                                        <div>
                                    </div>
                                <div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <button type="button" name="sub_up" id="sub_up" class="btn btn-info" value="create" >บันทึก</button>&nbsp;
                                    <button type="button" name="reset_up" id="reset_up"  value="Reset" class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </div>
                        </fieldset>

</form>
                    </div>

                </div>     
            </div>
        </div>
    </fieldset>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }elseif(($manage=="list")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลผู้ใช้งานระบบ</h4>
            </div>
        </div>
    </fieldset>


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }elseif(($manage=="show")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลผู้ใช้งานระบบ</h4>
            </div>
        </div>
    </fieldset>

    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ตารางข้อมูลผู้ใช้งานระบบ</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="user_form_add" id="user_form_add" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_cfa" id="sub_cfa" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-pencil4"></i> เพิ่มข้อมูล</button>
</form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="user_form_show" id="user_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_cfs" id="sub_cfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> แสดงข้อมูล</button>
</form>
                                        </div>
                                    </td>
                                </tr>
                            </table>                    
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="Run_Show_All">
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>       
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="run_show" id="run_show" value="show">

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลผู้ใช้งานระบบ</h4>
            </div>
        </div>
    </fieldset>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php  }

    ?>
        </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 <?php  }else{}
    }
?>