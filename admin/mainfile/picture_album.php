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
    
    if ((preg_match("/picture_album.php/", $_SERVER['PHP_SELF']))) {
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

                        <a href="#" class="breadcrumb-item"> จัดการการชำระเงิน</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลภาคเรียน</a>

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
        ?>

        <?php

                if(($manage=="add")){  ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>เพิ่มข้อมูลรูปกิจกรรม</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ฟอร์มเพิ่มข้อมูลวิดีโอ</div>
                            <div class="col-<?php echo $grid;?>-6">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
<form name="form_picture_album_show" id="form_picture_album_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
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

<form name="form_add" id="form_add" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/picture_album/picture_album_process.php" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="text" name="gallery_name" id="gallery_name" class="form-control" value="" placeholder="ชื่อกิจกรรม" required="required" maxlength="100">                                                
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหากิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="gallery_topic" id="gallery_topic" class="summernote" required="required"></textarea>                                               
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาพหน้าปกกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="gallery_thumbnail" id="gallery_thumbnail" class="file-input-custom-A" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>                                                                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาพกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="picture_name[]" id="picture_name[]" class="file-input-custom-B" multiple="multiple" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>                                                                                             
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะรูปกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select name="gallery_status" id="gallery_status"  class="form-control select" required="required" data-fouc>
                                                    <option value="1">แสดง</option>
                                                    <option value="0">ไม่แสดง</option>
                                                </select> 
                                            <div>
                                        </div>
                                    </fieldset>                        
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <button type="submit" name="sub_up" id="sub_up" class="btn btn-info">บันทึก</button>&nbsp;
                                        <button type="reset" name="reset_up" id="reset_up" class="btn btn-danger">ยกเลิก</button>
                                    </fieldset>
                                </div>
                            </div>

<input type="hidden" name="action" id="action" value="add">

</form>

                        </div>

                    </div>
                </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php    }elseif(($manage=="show")){  ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลรูปกิจกรรมทั้งหมด</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ข้อมูลรูปกิจกรรมทั้งหมด</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="form_picture_album_show" id="form_picture_album_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="form_picture_album_add" id="form_picture_album_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_mva" id="sub_mva"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลข่าว</button>
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
        <?php    }else{ ?>

        <?php    }?>

        </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}

    }
?>