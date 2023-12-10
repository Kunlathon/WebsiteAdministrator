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
    error_reporting(E_ALL ^ E_NOTICE);
    if ((preg_match("/course.php/", $_SERVER['PHP_SELF']))) {
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="#" class="breadcrumb-item"> หลักสูตร</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลหลักสูตร</h4>
            </div>
        </div>
    </fieldset>

    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ฟอร์มข้อมูลหลักสูตร</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="course_form_add" id="course_form_add" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_cfa" id="sub_cfa" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-pencil4"></i> เพิ่มข้อมูล</button>
</form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="course_form_show" id="course_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course">
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
<form name="form_course_add" id="form_course_add" accept-charset="uft-8">

                    <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
								<div id="txtname-null">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid;?>-2">หลักสูตร (TH)</label>
                                        <div class="col-<?php echo $grid;?>-10">
                                            <input name="txtname" id="txtname" type="text" class="form-control" placeholder="กรอกข้อมูลหลักสูตร (TH)..." value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </fieldset>

                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="form-group row">
									<label class="col-form-label col-<?php echo $grid;?>-2">หลักสูตร (EN)</label>
									<div class="col-<?php echo $grid;?>-10">
										<input name="txtnameen" id="txtnameen" type="text" class="form-control" placeholder="กรอกข้อมูลหลักสูตร (EN)...">
									</div>
								</div>
                            </div>
                        </div>
                     </fieldset>

                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="form-group row">
									<label class="col-form-label col-<?php echo $grid;?>-2">หลักสูตร (CN)</label>
									<div class="col-<?php echo $grid;?>-10">
										<input name="txtnamecn" id="txtnamecn" type="text" class="form-control" placeholder="กรอกข้อมูลหลักสูตร (CN)...">
									</div>
								</div>
                            </div>
                        </div>
                     </fieldset>

                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="form-group row">
                                    <button type="button" name="button_course_add" id="button_course_add" class="btn btn-info" value="create">บันทึก</button>&nbsp;
                                    <button type="button" name="button_course_reset" id="button_course_reset" class="btn btn-danger">ยกเลิก</button>
								</div>
                            </div>
                        </div>
                     </fieldset>
</form>
                    </div>

                </div>       
            </div>
        </div>
    </fieldset>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    }elseif(($manage=="edit")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                         if((isset($_POST["course_id"]))){ 
                            $course_key=filter_input(INPUT_POST,'course_id');
                            $sql = "SELECT * FROM `tb_course` WHERE `course_id`= '{$course_key}'";
                            $row = row_array($sql);

                                if((isset($row['course_name']))){
                                    $course_name=$row['course_name'];
                                }else{
                                    $course_name=null;
                                }

                                if((isset($row['course_name_en']))){
                                    $course_name_en=$row['course_name_en'];
                                }else{
                                    $course_name_en=null;
                                }

                                
                                if((isset($row['course_name_cn']))){
                                    $course_name_cn=$row['course_name_cn'];
                                }else{
                                    $course_name_cn=null;
                                }

                                if((isset($row['course_status']))){
                                    if(($row['course_status']==1)){
                                        $cs_status='checked="checked"';
                                    }else{
                                        $cs_status=null;
                                    }
                                }else{

                                }

                            ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลหลักสูตร</h4>
            </div>
        </div>
    </fieldset>

    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ฟอร์มแก้ไขข้อมูลหลักสูตร</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="course_form_add" id="course_form_add" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_cfa" id="sub_cfa" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-pencil4"></i> เพิ่มข้อมูล</button>
</form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="course_form_show" id="course_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course">
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
<form name="form_course_add" id="form_course_add" accept-charset="uft-8">

                    <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
								<div id="txtname-null">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid;?>-2">หลักสูตร (TH)</label>
                                        <div class="col-<?php echo $grid;?>-10">
                                            <input name="txtname" id="txtname" type="text" class="form-control" placeholder="กรอกข้อมูลหลักสูตร (TH)..." value="<?php echo $course_name;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </fieldset>

                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="form-group row">
									<label class="col-form-label col-<?php echo $grid;?>-2">หลักสูตร (EN)</label>
									<div class="col-<?php echo $grid;?>-10">
										<input name="txtnameen" id="txtnameen" type="text" class="form-control" placeholder="กรอกข้อมูลหลักสูตร (EN)..." value="<?php echo $course_name_en;?>">
									</div>
								</div>
                            </div>
                        </div>
                     </fieldset>

                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="form-group row">
									<label class="col-form-label col-<?php echo $grid;?>-2">หลักสูตร (CN)</label>
									<div class="col-<?php echo $grid;?>-10">
										<input name="txtnamecn" id="txtnamecn" type="text" class="form-control" placeholder="กรอกข้อมูลหลักสูตร (CN)..." value="<?php echo $course_name_cn;?>">
									</div>
								</div>
                            </div>
                        </div>
                     </fieldset>

                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid;?>-2">สถานะ</label>
                                    <div class="col-<?php echo $grid;?>-10">
                                        <div class="custom-control custom-switch custom-switch-square custom-control-success mb-2">
                                            <input type="checkbox" class="custom-control-input" name="course_status" id="course_status" value="1" <?php echo $cs_status;?>>
                                            <label class="custom-control-label" for="course_status">แสดง</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                     </fieldset>



                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="form-group row">
                                    <button type="button" name="button_course_add" id="button_course_add" class="btn btn-info" value="create">บันทึก</button>&nbsp;
                                    <button type="button" name="button_course_reset" id="button_course_reset" class="btn btn-danger">ยกเลิก</button>
								</div>
                            </div>
                        </div>
                     </fieldset>
</form>
                    </div>

                </div>       
            </div>
        </div>
    </fieldset>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php    }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลหลักสูตร</h4>
            </div>
        </div>
    </fieldset>
    <fieldset class="mb-3">
        <div class="row">
           <div class="col-<?php echo $grid;?>-12">
                <div class="content d-flex justify-content-center align-items-center">
                    <div class="flex-fill">
<!-- Error title -->
                        <div class="text-center mb-4">
                            <img src="../../../../global_assets/images/error_bg.svg" class="img-fluid mb-3" height="230" alt="">
                            <h1 class="display-2 font-weight-semibold line-height-1 mb-2">403</h1>
                            <h6 class="w-md-25 mx-md-auto">Oops, an error has occurred. <br> Access to this resource on the server is denied.</h6>
                        </div>
<!-- /error title -->
<!-- Error content -->
                        <div class="text-center">
                            <button type="button" class="btn btn-primary"><i class="icon-home4 mr-2"></i> Return to dashboard</button>
                        </div>
<!-- /error wrapper -->

                    </div>
                </div>
            </div> 
        </div>
    </fieldset>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php    } ?>





<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    }elseif(($manage=="show")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลหลักสูตร</h4>
            </div>
        </div>
    </fieldset>

    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ตารางข้อมูลหลักสูตร</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="course_form_add" id="course_form_add" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_cfa" id="sub_cfa" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-pencil4"></i> เพิ่มข้อมูล</button>
</form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="course_form_show" id="course_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course">
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    }  ?>

        </div>


<?php   }else{ ?>

<?php   }
    }
?>