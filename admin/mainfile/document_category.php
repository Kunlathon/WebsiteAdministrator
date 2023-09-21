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
    if ((preg_match("/document_category.php/", $_SERVER['PHP_SELF']))) {
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลเอกสาร</a>

                        <a href="#" class="breadcrumb-item"> ประเภทเอกสาร</a>

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

                

                if(($manage=="add")){  ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <h4>ประเภทเอกสาร</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid;?>-6">ประเภทเอกสาร</div>
                                    <div class="col-<?php echo $grid;?>-6">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <form name="form_document_show" id="form_document_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document_category">
                                                                <input type="hidden" name="manage" id="manage" value="show">
                                                                <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>

                                <div class="card-body">

<form name="form_add" id="form_add" accept-charset="utf-8"  method="post">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div id="document_category_name-null">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อประเภทเอกสาร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_category_name" id="document_category_name" class="form-control" value="" placeholder="ชื่อประเภทเอกสาร" required="required" maxlength="100">                                                
                                                <div>
                                            </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อประเภทเอกสาร EN</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_category_name_en" id="document_category_name_en" class="form-control" value="" placeholder="ชื่อประเภทเอกสาร EN"  maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อประเภทเอกสาร CN</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_category_name_cn" id="document_category_name_cn" class="form-control" value="" placeholder="ชื่อประเภทเอกสาร CN"  maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <button type="button" name="sub_add" id="sub_add" class="btn btn-info">บันทึก</button>&nbsp;
                                            <button type="reset" name="reset_add" id="reset_add" class="btn btn-danger">ยกเลิก</button>
                                        </fieldset>
                                    </div>
                                </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <input type="hidden" name="action" id="action" value="add">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
</form>

                                </div>

                            </div>
                        </div>
                    </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
       <?php    }elseif(($manage=="show")){   ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>ประเภทเอกสาร</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลประเภทเอกสาร</div>
                                <div class="col-<?php echo $grid; ?>-6">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <form name="form_document_category_show" id="form_document_category_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document_category">
                                                        <input type="hidden" name="manage" id="manage" value="show">
                                                        <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    </form>

                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="form_document_category_add" id="form_document_category_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document_category">
                                                        <input type="hidden" name="manage" id="manage" value="add">
                                                        <button type="submit" name="sub_mva" id="sub_mva" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลประเภทเอกสาร</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <div id="Run_Show_All"><i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <input type="hidden" name="run_show" id="run_show" value="show">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

       <?php    }elseif(($manage=="edit")){ 
        
                    if(isset($_POST["document_category_id"])){

                        $category_id=filter_input(INPUT_POST,'document_category_id');

                        $DocumentCategorySql="SELECT * 
                                              FROM `tb_document_category` 
                                              WHERE `document_category_id`='{$category_id}';";
                        $DocumentCategoryList = result_array($DocumentCategorySql);
                        foreach ($DocumentCategoryList as $key => $DocumentCategoryrow){
                            if((is_array($DocumentCategoryrow) and count($DocumentCategoryrow))){

                                $category_id=$DocumentCategoryrow["document_category_id"];
                                $category_name=$DocumentCategoryrow["document_category_name"];
                                $category_name_en=$DocumentCategoryrow["document_category_name_en"];
                                $category_name_cn=$DocumentCategoryrow["document_category_name_cn"];

                            }else{}
                        }   ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <h4>ประเภทเอกสาร</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid;?>-6">ฟอร์มแก้ไขข้อมูลประเภทข่าว</div>
                                    <div class="col-<?php echo $grid;?>-6">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <form name="form_document_show" id="form_document_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document_category">
                                                                <input type="hidden" name="manage" id="manage" value="show">
                                                                <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>

                                <div class="card-body">

<form name="form_add" id="form_add" accept-charset="utf-8"  method="post">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div id="document_category_name-null">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อประเภทเอกสาร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_category_name" id="document_category_name" class="form-control" value="<?php echo $category_name;?>" placeholder="ชื่อประเภทเอกสาร" required="required" maxlength="100">                                                
                                                <div>
                                            </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อประเภทเอกสาร EN</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_category_name_en" id="document_category_name_en" class="form-control" value="<?php echo $category_name_en;?>" placeholder="ชื่อประเภทเอกสาร EN"  maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อประเภทเอกสาร CN</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_category_name_cn" id="document_category_name_cn" class="form-control" value="<?php echo $category_name_cn;?>" placeholder="ชื่อประเภทเอกสาร CN"  maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <button type="button" name="sub_up" id="sub_up" class="btn btn-info">บันทึก</button>&nbsp;
                                            <button type="reset" name="reset_add" id="reset_add" class="btn btn-danger">ยกเลิก</button>
                                        </fieldset>
                                    </div>
                                </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <input type="hidden" name="action" id="action" value="edit">
    <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id; ?>">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
</form>

                                </div>

                            </div>
                        </div>
                    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
       <?php
                    }else{} ?>

       <?php    }else{} ?>

        

        </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 <?php  }else{}
    }
?>