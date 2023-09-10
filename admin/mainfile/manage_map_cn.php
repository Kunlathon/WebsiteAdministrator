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

    if((preg_match("/manage_map.php/", $_SERVER['PHP_SELF']))){
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                    <a href="#" class="breadcrumb-item"> จัดการระดับชั้น</a>

                    <a href="#" class="breadcrumb-item"> ข้อมูลระดับชั้น</a>

                    <a href="#" class="breadcrumb-item">รายละเอียดระดับชั้น</a>

                </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

    <?php
        /*if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST, 'manage');
        }else{
            if((isset($_GET["manage"]))){
                $manage=filter_input(INPUT_GET, 'manage');
            }else{
                $manage="show";
            }
        }*/
        $manage="edit";
        $information_key=8;
            if(($manage=="edit")){ 
                $sql = "SELECT `information_id`,`information_topic_cn`,`information_detail_cn`,`information_image` 
                        FROM `tb_information` 
                        WHERE `information_id`='{$information_key}';";
                $list = result_array($sql);
                foreach ($list as $key => $row){
                    if((is_array($row) && count($row))){
                        $information_topic_cn=$row["information_topic_cn"];
                        $information_detail_cn=$row["information_detail_cn"];
                        $information_image=$row["information_image"];
                        $information_id=$row["information_id"];
                    }else{
                        $information_topic_cn=null;
                        $information_detail_cn=null;
                        $information_image=null;
                        $information_id=null;
                    }
                }
                ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <h4>ข้อมูลแผนที่ (CN)</h4>
        </div>
    </div>

	          <div class="row">
                <div class="col-<?php echo $grid; ?>-4">
                <div class="btn-group">
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=manage_map'" class="btn btn-outline-success btn-sm" value="">แก้ไข (TH)</button>&nbsp;&nbsp;
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=manage_map_en'" class="btn btn-outline-success btn-sm" value="">แก้ไข (EN)</button>&nbsp;&nbsp;
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System();?>/?modules=manage_map_cn'" class="btn btn-success btn-sm" value="">แก้ไข (CN)</button>
                    </div>
                </div>
                <div class="col-<?php echo $grid; ?>-4"></div>
                <div class="col-<?php echo $grid; ?>-4"></div>
			</div><br>

    <div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <div class="card border border-purple">
                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid;?>-6">ฟอร์มแก้ไขข้อมูลแผนที่ (CN)</div>
                    <div class="col-<?php echo $grid;?>-6">
                        <table align="right">
                            <tr>
                                <td>
                                    <div>
<form name="manage_map_form_show" id="manage_map_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_map_cn">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_isfs" id="sub_isfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                    </div>
                                </td>
                            </tr>
                        </table>                
                    </div>
                </div>
                <div class="card-body">
<form name="form_edit" id="form_edit" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/manage_map_cn/manage_map_cn_process.php" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <div class="card-header">
                                <h5 class="card-title">หัวข้อ</h5>
                            </div>                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <input type="text" name="information_topic_cn" id="information_topic_cn" class="form-control" value="<?php echo $information_topic_cn;?>" placeholder="หัวข้อเรื่อง" required="required">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-<?php echo $grid;?>-6">
    <?php
            if(($information_image!=null)){ ?>

				<fieldset class="mb-3">
        <?php
                if(file_exists("../dist/information/".$information_image)){ ?>
                            <div><img src="../dist/information/<?php echo $information_image;?>" class="img-thumbnail" alt="<?php echo $information_image;?>" style="width:152px; height:168px;"></div>
        <?php   }else{ ?>
                            <div><img src="../dist/information/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:152px; height:168px;"></div>
        <?php   } ?>

                            </fieldset>

    <?php   }else{ ?>
                            <fieldset class="mb-3">
                                <div><img src="../dist/information/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:152px; height:168px;"></div>
                            </fieldset>
    <?php   } ?>
                        </div>
                    </div>

					<!--<div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <div class="card-header">
                                <h5 class="card-title">ภาพ</h5>
                            </div>                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-6">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <input type="file" name="information_image" id="information_image" class="form-control"  placeholder="ภาพ" readonly="readonly">
                                    </div>
                                </div>
                            </fieldset>
                        </div>                        
                    </div>-->

                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <div class="card-header">
                                <h5 class="card-title">รายละเอียด</h5>
                            </div>                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <textarea name="information_detail_cn" id="editor-full" rows="4" cols="4" required="required">
                                            <?php echo $information_detail_cn;?>
                                        </textarea>
                                    </div>
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
    <input type="hidden" name="action" id="action" value="edit">
    <input type="hidden" name="information_key" id="information_key" value="<?php echo $information_key;?>">
    <input type="hidden" name="copy_image" id="copy_image" value="<?php echo $information_image;?>">
</form>
                </div>
            </div>
        </div>
    </div>



<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php    }else{} ?>

    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }
?>