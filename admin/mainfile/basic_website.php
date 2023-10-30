<?php
    error_reporting(E_ALL ^ E_NOTICE);
        if((preg_match("/basic_website.php/", $_SERVER['PHP_SELF']))) {
            Header("Location: ../index.php");
            die();
        }else{
            if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_contact" class="breadcrumb-item">  ข้อมูลพื้นฐาน</a>

                        <a href="#" class="breadcrumb-item">  ข้อมูลพื้นฐาน</a>

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
                $manage="edit";
            }
        }


            if(($manage=="edit")){  
                
                $setting_sql = "SELECT * FROM `tb_setting`";
                $setting_row = row_array($setting_sql);
                    if((is_array($setting_row) and count($setting_row))){

   



                    }else{}
                ?>
                



        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลเว็บไซต์</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid; ?>-6">ข้อมูลเว็บไซต์</div>
                        <div class="col-<?php echo $grid; ?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="form_basic_website_list" id="form_basic_website_list" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=basic_website">
                                            <input type="hidden" name="manage" id="manage" value="edit">
                                            <button type="submit" name="sub_bw_list" id="sub_bw_list" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">

					    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-purple rounded-top border-0 mb-0">
						    <li class="nav-item"><a href="#bw-nav-tab-th" class="nav-link rounded-left rounded-bottom-0 active" data-toggle="tab">ข้อมูลเว็บไซต์ TH</a></li>
							<li class="nav-item"><a href="#bw-nav-tab-en" class="nav-link" data-toggle="tab">ข้อมูลเว็บไซต์ EN</a></li>
                            <li class="nav-item"><a href="#bw-nav-tab-cn" class="nav-link" data-toggle="tab">ข้อมูลเว็บไซต์ CN</a></li>
						</ul>

						<div class="tab-content card card-body rounded-top-0 border-top-0 mb-0">

							<div class="tab-pane fade active show" id="bw-nav-tab-th">

<form name="form_basic_website_edit_th" id="form_basic_website_edit_th" accept-charset="uft-8">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">อีเมล</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">เบอร์โทร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ที่อยู่</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <textarea  name="" id="" class="form-control" rows="5" id="comment"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สี</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <button type="button" name="" id="" class="btn btn-info">บันทึก</button>&nbsp;
                                            <button type="reset" name="reset_add" id="reset_add" class="btn btn-danger">ยกเลิก</button>
                                        </fieldset>
                                    </div>
                                </div>

    <input type="hidden" name="action" id="action" value="edit_th">	

</form> 

							</div>

							<div class="tab-pane fade" id="bw-nav-tab-en">

<form name="form_basic_website_edit_en" id="form_basic_website_edit_en" accept-charset="uft-8">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">อีเมล</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">เบอร์โทร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ที่อยู่</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <textarea  name="" id="" class="form-control" rows="5" id="comment"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <button type="button" name="" id="" class="btn btn-info">บันทึก</button>&nbsp;
                                            <button type="reset" name="reset_add" id="reset_add" class="btn btn-danger">ยกเลิก</button>
                                        </fieldset>
                                    </div>
                                </div>

<input type="hidden" name="action" id="action" value="edit_en">		

</form> 

							</div>

                            <div class="tab-pane fade" id="bw-nav-tab-cn">

<form name="form_basic_website_edit_cn" id="form_basic_website_edit_cn" accept-charset="uft-8">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">อีเมล</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">เบอร์โทร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="" id="" class="form-control" value="" placeholder="" required="required" maxlength="100">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ที่อยู่</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <textarea  name="" id="" class="form-control" rows="5" id="comment"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <button type="button" name="" id="" class="btn btn-info">บันทึก</button>&nbsp;
                                            <button type="reset" name="reset_add" id="reset_add" class="btn btn-danger">ยกเลิก</button>
                                        </fieldset>
                                    </div>
                                </div>

<input type="hidden" name="action" id="action" value="edit_cn">		

</form>                             

							</div>

					    </div>
								

                    



                    </div>

                </div>
            </div>
        </div>

    <?php   }else{}

    ?>

        </div>

<?php       }else{  ?>
<!--==========================-->
<?php       }
        }
?>