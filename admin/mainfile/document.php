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
    
    if ((preg_match("/document.php/", $_SERVER['PHP_SELF']))) {
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

          
        ?>

        <?php
                 if(($manage=="add")){                   
                    if(($_POST["category_key"]!=null)){
                        $category_key=filter_input(INPUT_POST,'category_key');  
                        
                        $DocumentCategorySql="SELECT *
                                              FROM `tb_document_category` 
                                              WHERE `document_category_id`='{$category_key}';";
                        $DocumentCategoryList=result_array($DocumentCategorySql);
                        foreach($DocumentCategoryList as $key=>$DocumentCategoryRow){
                            if((is_array($DocumentCategoryRow) && count($DocumentCategoryRow))){
                                $txt_document_category_id=$DocumentCategoryRow["document_category_id"];
                                $txt_document_category_name=$DocumentCategoryRow["document_category_name"];
                                $txt_document_category_name_en=$DocumentCategoryRow["document_category_name_en"];
                                $txt_document_category_name_cn=$DocumentCategoryRow["document_category_name_cn"];
                            }else{
                                $txt_document_category_id=null;
                                $txt_document_category_name=null;
                                $txt_document_category_name_en=null;
                                $txt_document_category_name_cn=null;
                            }
                        }
                        
                        ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>เอกสาร</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ประเภทเอกสาร : <?php echo $txt_document_category_name;?></div>
                            <div class="col-<?php echo $grid;?>-6">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <form name="form_document_show" id="form_document_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document">
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

    <form name="form_add" id="form_add" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/document/document_process.php" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อเอกสาร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_topic" id="document_topic" class="form-control" value="" placeholder="ชื่อกิจกรรม" required="required" maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ไฟล์เอกสาร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="file" name="document_file" id="document_file" class="file-input-custom" value="" placeholder="ไฟล์เอกสาร" data-show-upload="false" required="required" data-show-preview="false" data-fouc> 
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
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อเอกสาร (EN)</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_topic_en" id="document_topic_en" class="form-control" value="" placeholder="ชื่อเอกสาร (EN)"  maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ไฟล์เอกสาร (EN)</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="file" name="document_file_en" id="document_file_en" class="file-input-custom" value="" placeholder="ไฟล์เอกสาร" data-show-upload="false" data-show-preview="false"  data-fouc> 
                                                    <span class="form-text text-muted">นานสกุลไฟส์ <code>pdf</code>,<code>PDF</code></span>                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อเอกสาร (CN)</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_topic_cn" id="document_topic_cn" class="form-control" value="" placeholder="ชื่อเอกสาร (CN)"  maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ไฟล์เอกสาร (CN)</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="file" name="document_file_cn" id="document_file_cn" class="file-input-custom" value="" placeholder="ไฟล์เอกสาร" data-show-upload="false" data-show-preview="false" data-fouc> 
                                                    <span class="form-text text-muted">นานสกุลไฟส์ <code>pdf</code>,<code>PDF</code></span>                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_post_date" id="document_post_date" class="form-control pickadate-accessibility" value="<?php echo date("Y-m-d");?>" placeholder="<?php echo date("Y-m-d");?>">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <select name="document_status" id="document_status" class="form-control select" required="required" data-fouc>
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
                                                <button type="submit" name="sub_add" id="sub_add" class="btn btn-info">บันทึก</button>&nbsp;
                                                <button type="reset" name="reset_add" id="reset_add" class="btn btn-danger">ยกเลิก</button>
                                            </fieldset>
                                        </div>
                                </div>

                                <input type="hidden" name="action" id="action" value="add">
                                <input type="hidden" name="category_id" id="category_id" value="<?php echo $txt_document_category_id;?>">

    </form>

                        </div>

                    </div>

                </div>
            </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php       
                    }else{} ?>

        <?php    }elseif(($manage=="edit")){   ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                        if((isset($_POST["category_key"],$_POST["document_key"]))){

                            $category_key=filter_input(INPUT_POST,'category_key');  
                            $document_key=filter_input(INPUT_POST,'document_key');         
                        
                            $DocumentCategorySql="SELECT *
                                                FROM `tb_document_category` 
                                                WHERE `document_category_id`='{$category_key}';";
                            $DocumentCategoryList=result_array($DocumentCategorySql);
                            foreach($DocumentCategoryList as $key=>$DocumentCategoryRow){
                                if((is_array($DocumentCategoryRow) and count($DocumentCategoryRow))){
                                    $txt_document_category_id=$DocumentCategoryRow["document_category_id"];
                                    $txt_document_category_name=$DocumentCategoryRow["document_category_name"];
                                    $txt_document_category_name_en=$DocumentCategoryRow["document_category_name_en"];
                                    $txt_document_category_name_cn=$DocumentCategoryRow["document_category_name_cn"];
                                }else{
                                    $txt_document_category_id=null;
                                    $txt_document_category_name=null;
                                    $txt_document_category_name_en=null;
                                    $txt_document_category_name_cn=null;
                                }
                            } 
                            
                            $DocumentSql="SELECT `document_id`,`document_topic`,`document_topic_en`,`document_topic_cn`,`document_file`
                                         ,`document_file_en`,`document_file_cn`,`document_category_id`,`document_post_date`,`document_status`
                                         FROM `tb_document` WHERE `document_id`='{$document_key}'";
                            $DocumentList=result_array($DocumentSql);
                            foreach($DocumentList as $key=>$DocumentRow){
                                if((is_array($DocumentRow) and count($DocumentRow))){
                                    $document_id=$DocumentRow["document_id"];
                                    $document_topic=$DocumentRow["document_topic"];
                                    $document_topic_en=$DocumentRow["document_topic_en"];
                                    $document_topic_cn=$DocumentRow["document_topic_cn"];
                                    $document_file=$DocumentRow["document_file"];
                                    $document_file_en=$DocumentRow["document_file_en"];
                                    $document_file_cn=$DocumentRow["document_file_cn"];
                                    $document_category_id=$DocumentRow["document_category_id"];
                                    $document_post_date=$DocumentRow["document_post_date"];
                                    $document_status=$DocumentRow["document_status"];
                                }else{
                                    $document_id=null;
                                    $document_topic=null;
                                    $document_topic_en=null;
                                    $document_topic_cn=null;
                                    $document_file=null;
                                    $document_file_en=null;
                                    $document_file_cn=null;
                                    $document_category_id=null;
                                    $document_post_date=null;
                                    $document_status=null;
                                }
                            }
                            
                            ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>เอกสาร</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ประเภทเอกสาร : <?php echo $txt_document_category_name;?></div>
                            <div class="col-<?php echo $grid;?>-6">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <form name="form_document_show" id="form_document_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document">
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

    <form name="form_edit" id="form_edit" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/document/document_process.php" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อเอกสาร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_topic" id="document_topic" class="form-control" value="<?php echo $document_topic;?>" placeholder="ชื่อกิจกรรม" required="required" maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ไฟล์เอกสาร</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="file" name="document_file" id="document_file" class="file-input-custom" value="" placeholder="ไฟล์เอกสาร" required="required" data-show-upload="false"  data-show-preview="false" data-fouc> 
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
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อเอกสาร (EN)</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_topic_en" id="document_topic_en" class="form-control" value="<?php echo $document_topic_en;?>" placeholder="ชื่อเอกสาร (EN)"  maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ไฟล์เอกสาร (EN)</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="file" name="document_file_en" id="document_file_en" class="file-input-custom" value="" placeholder="ไฟล์เอกสาร" data-show-upload="false" data-show-preview="false"  data-fouc> 
                                                    <span class="form-text text-muted">นานสกุลไฟส์ <code>pdf</code>,<code>PDF</code></span>                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อเอกสาร (CN)</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_topic_cn" id="document_topic_cn" class="form-control" value="<?php echo $document_topic_cn;?>" placeholder="ชื่อเอกสาร (CN)"  maxlength="100">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ไฟล์เอกสาร (CN)</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="file" name="document_file_cn" id="document_file_cn" class="file-input-custom" value="" placeholder="ไฟล์เอกสาร" data-show-upload="false" data-show-preview="false" data-fouc> 
                                                    <span class="form-text text-muted">นานสกุลไฟส์ <code>pdf</code>,<code>PDF</code></span>                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="text" name="document_post_date" id="document_post_date" class="form-control pickadate-accessibility" value="<?php echo $document_post_date;?>" placeholder="<?php echo date("Y-m-d");?>">                                                
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <select name="document_status" id="document_status" class="form-control select" required="required" data-fouc>
                                                        
                                        <?php
                                                if (($document_status == 0)) {  ?>
                                                        <option value="1">แสดง</option>
                                                        <option value="0" selected="selected">ไม่แสดง</option>
                                        <?php   } elseif (($document_status == 1)) {   ?>
                                                        <option value="1" selected="selected">แสดง</option>
                                                        <option value="0">ไม่แสดง</option>
                                        <?php   } else { ?>
                                                        <option value="1">แสดง</option>
                                                        <option value="0">ไม่แสดง</option>
                                        <?php   } ?>                                                    

                                                    </select>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <button type="submit" name="sub_add" id="sub_add" class="btn btn-info">บันทึก</button>&nbsp;
                                                <button type="reset" name="reset_add" id="reset_add" class="btn btn-danger">ยกเลิก</button>
                                            </fieldset>
                                        </div>
                                </div>

                                <input type="hidden" name="action" id="action" value="edit">
                                <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_key;?>">
                                <input type="hidden" name="document_key" id="document_key" value="<?php echo $document_key;?>">
                                <input type="hidden" name="copy_document_file" id="copy_document_file" value="<?php echo $document_file;?>">
                                <input type="hidden" name="copy_document_file_en" id="copy_document_file_en" value="<?php echo $document_file_en;?>">
                                <input type="hidden" name="copy_document_file_cn" id="copy_document_file_cn" value="<?php echo $document_file_cn;?>">
      
    </form>

                        </div>

                    </div>

                </div>
            </div>                            

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    }else{} ?>

        <?php    }elseif(($manage=="show_data")){ 

                    if((isset($_POST["category_key"]))){
                            $category_key=filter_input(INPUT_POST,'category_key');
                    }else{
                        if((isset($_GET["category_key"]))){
                            $category_key=base64_decode(filter_input(INPUT_GET,'category_key')); 
                        }else{}
                    }
                
                        $DocumentCategorySql="SELECT *
                                              FROM `tb_document_category` 
                                              WHERE `document_category_id`='{$category_key}';";
                        $DocumentCategoryList=result_array($DocumentCategorySql);
                        foreach($DocumentCategoryList as $key=>$DocumentCategoryRow){
                            if((is_array($DocumentCategoryRow) && count($DocumentCategoryRow))){
                                $txt_document_category_id=$DocumentCategoryRow["document_category_id"];
                                $txt_document_category_name=$DocumentCategoryRow["document_category_name"];
                                $txt_document_category_name_en=$DocumentCategoryRow["document_category_name_en"];
                                $txt_document_category_name_cn=$DocumentCategoryRow["document_category_name_cn"];
                            }else{
                                $txt_document_category_id=null;
                                $txt_document_category_name=null;
                                $txt_document_category_name_en=null;
                                $txt_document_category_name_cn=null;
                            }
                        }

        ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>เอกสาร</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ตารางเอกสาร <?php echo $txt_document_category_name;?></div>
                            <div class="col-<?php echo $grid;?>-6">

                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <form name="form_document_show" id="form_document_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document">
                                                        <input type="hidden" name="manage" id="manage" value="show">
                                                        <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    </form>

                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="form_document_add" id="form_document_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document">
                                                        <input type="hidden" name="manage" id="manage" value="add">
                                                        <input type="hidden" name="category_key" id="category_key" value="<?php echo $txt_document_category_id;?>">
                                                        <button type="submit" name="sub_mva" id="sub_mva" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลเอกสาร</button>
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->       
 <input type="hidden" name="run_show" id="run_show" value="show_data">
 <input type="hidden" name="category_key" id="category_key" value="<?php echo $txt_document_category_id ;?>">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php    }elseif(($manage=="show")){  ?>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>เอกสาร</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ประเภทเอกสาร</div>
                            <div class="col-<?php echo $grid;?>-6"></div>
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
 <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->       
            <input type="hidden" name="run_show" id="run_show" value="show">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php    }else{

                 } ?>

        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php  }else{}
    }
?>