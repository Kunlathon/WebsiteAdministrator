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
    ini_set('display_errors', 'On'); // Open Error , PHP Code



?>

<?php
    if((preg_match("/image_slide.php/", $_SERVER['PHP_SELF']))){
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                    <a href="?modules=grade_data" class="breadcrumb-item"> จัดการระดับชั้น</a>

                    <a href="?modules=grade_classroom_data&grade_key=<?php echo $grade_key; ?>" class="breadcrumb-item"> ข้อมูลระดับชั้น</a>

                    <a href="#" class="breadcrumb-item">รายละเอียดระดับชั้น</a>

                </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

    <?php
        if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST, 'manage');
        }else{
            if((isset($_GET["manage"]))){
                $manage=filter_input(INPUT_GET, 'manage');
            }else{
                $manage="show";
            }
        }
             if(($manage=="add")){ ?>

        <div class="row">
            <div class="col-<?php echo $grid; ?>-12">
                <h4>เพิ่มข้อมูลภาพสไลด์</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ฟอร์มเพิ่มข้อมูลภาพสไลด์</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
    <form name="image_slide_form_show" id="image_slide_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_isfs" id="sub_isfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
    </form>

                                        </div>
                                    </td>
                                    <td>
                                        <div>
    <form name="image_slide_form_add" id="image_slide_form_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_isfa" id="sub_isfa"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลภาพสไลด์</button>
    </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>                
                        </div>
                    </div>
                    <div class="card-body">
<form name="form_add" id="form_add" accept-charset="utf-8" action="" method="post" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-<?php echo $grid;?>-7">
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อเรื่อง</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <div id="slide_topic-null">
                                                        <input type="text" name="slide_topic" id="slide_topic" class="form-control" value="" placeholder="กรอกข้อมูลหัวข้อเรื่อง" required="required" maxlength="">
                                                        <span style="color: #DC143C;">กรอกข้อมูลหัวข้อเรื่อง</span>                                                
                                                    </div>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สิงค์</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="url" name="slide_link" id="slide_link" class="form-control" value="" placeholder="ข้อมูลสิงค์">
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <select class="form-control select" name="slide_status" id="slide_status" data-placeholder="เลือกสถานะ..." required="required">
                                                        <optgroup label="สถานะ">
                                                            <option value="1">แสดง</option>
                                                            <option value="0">ไม่แสดง</option>
                                                        </optgroup>
                                                    </select>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                            <div class="col-<?php echo $grid;?>-5">
                                
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <input type="file" name="slide_image" id="slide_image" class="UpdateFile_ImageSlide" data-fouc>
                                                <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            </div>
                                        </fieldset>
                                    </div>                            
                                </div> 

                            </div>

                        </div>
<input name="action " id="action " value="add">
</form>
                    </div>                    
                </div>
            </div>
        </div>

    <?php    }elseif(($manage=="edit")){ 
                if((isset($_POST["slide_id"]))){
                    $slide_id=filter_input(INPUT_POST, 'slide_id');
                }else{
                    if((isset($_GET["slide_id"]))){
                        $slide_id=base64_decode(filter_input(INPUT_GET, 'slide_id'));
                    }else{
                        $slide_id="-";
                    }
                } 
                if(($slide_id!="-")){   ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>แก้ไขข้อมูลภาพสไลด์</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ฟอร์มแก้ไขข้อมูลภาพสไลด์</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="image_slide_form_show" id="image_slide_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_isfs" id="sub_isfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="image_slide_form_add" id="image_slide_form_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_isfa" id="sub_isfa"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลภาพสไลด์</button>
</form>
                                        </div>
                                    </td>
                                </tr>
                            </table>                
                        </div>
                    </div>
                    <div class="card-body">

<form name="form_edit" id="form_edit" accept-charset="utf-8" action="" method="post" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-<?php echo $grid;?>-7">
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อเรื่อง</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <div id="slide_topic-null">
                                                        <input type="text" name="slide_topic" id="slide_topic" class="form-control" value="" placeholder="กรอกข้อมูลหัวข้อเรื่อง" required="required" maxlength="">
                                                        <span style="color: #DC143C;">กรอกข้อมูลหัวข้อเรื่อง</span>                                                
                                                    </div>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สิงค์</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="url" name="slide_link" id="slide_link" class="form-control" value="" placeholder="ข้อมูลสิงค์">
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <select class="form-control select" name="slide_status" id="slide_status" data-placeholder="เลือกสถานะ..." required="required">
                                                        <optgroup label="สถานะ">
                                                            <option value="1">แสดง</option>
                                                            <option value="0">ไม่แสดง</option>
                                                        </optgroup>
                                                    </select>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                            <div class="col-<?php echo $grid;?>-5">
                                
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <input type="file" name="slide_image" id="slide_image" class="UpdateFile_ImageSlide" data-fouc>
                                                <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            </div>
                                        </fieldset>
                                    </div>                            
                                </div> 

                            </div>

                        </div>
    <input name="action " id="action " value="edit">
</form>

                    </div>
                </div>
            </div>
        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php       }else{}
            }else{ ?>

        <div class="row">
            <div class="col-<?php echo $grid; ?>-12">
                <h4>ข้อมูลภาพสไลด์</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลภาพสไลด์</div>
                        <div class="col-<?php echo $grid; ?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <form name="image_slide_form_add" id="image_slide_form_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                                <button type="submit" name="manage" id="manage" value="add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลภาพสไลด์</button>
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

    <input type="hidden" name="run_show" id="run_show" value="show">

    <?php    } ?>


    </div>


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }

?>