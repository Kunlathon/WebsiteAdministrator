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

    if ((preg_match("/procurement_news.php/", $_SERVER['PHP_SELF']))) {
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
               

                if(($manage=="add")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>เพิ่มข้อมูลข่าวจัดชื้อจัดจ้าง</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ฟอร์มเพิ่มข้อมูลข่าวจัดชื้อจัดจ้าง</div>
                            <div class="col-<?php echo $grid;?>-6">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
    <form name="form_procurement_news_show" id="form_procurement_news_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=procurement_news">
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
<form name="form_add" id="form_add" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/procurement_news/procurement_news_process.php" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ประเภทข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select name="news_category_id" id="news_category_id" data-placeholder="เลือกประเภทข่าว..." class="form-control select" required="required" data-fouc>
                                                    <option></option>
                                                    <optgroup label="ประเภทข่าว">
        <?php
            $NewsCategory_sql = "SELECT `news_category_id`,`news_category_name` FROM `tb_news_category` ORDER BY `news_category_id` ASC";  
            $NewsCategory_list = result_array($NewsCategory_sql);      
            foreach ($NewsCategory_list as $key => $NewsCategory_row) { 
                if((is_array($NewsCategory_row) && count($NewsCategory_row))){
                    $NewsCategoryId=$NewsCategory_row["news_category_id"];
                    $NewsCategoryName=$NewsCategory_row["news_category_name"]; 
                    
                    if(($NewsCategoryId=='3')){
                        $nc_selected='selected="selected"';
                    }else{
                        $nc_selected=null;
                    } 
                    
                    ?>
                                                        <option value="<?php echo $NewsCategoryId;?>" <?php echo $nc_selected;?>><?php echo $NewsCategoryName;?></option>        
        <?php   }else{
                    $NewsCategoryId=null;
                    $NewsCategoryName=null;
                }

            }              
        ?>

                                                    </optgroup>
										        </select>                                          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="news_topic-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="text" name="news_topic" id="news_topic" class="form-control" value="" placeholder="หัวข้อข่าว" required="required" maxlength="100" required="required">                                           
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาพหัวข้อข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="news_image0" id="news_image0" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true">
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_1" id="news_detail_1" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="news_image1_1" id="news_image1_1" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image1_2" id="news_image1_2" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_2" id="news_detail_2" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image2_1" id="news_image2_1" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image2_2" id="news_image2_2" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_3" id="news_detail_3" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image3_1" id="news_image3_1" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image3_2" id="news_image3_2" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_4" id="news_detail_4" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image4_1" id="news_image4_1" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image4_2" id="news_image4_2" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_5" id="news_detail_5" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="news_image5_1" id="news_image5_1" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="news_image5_2" id="news_image5_2" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
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
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select name="news_status" id="news_status"  class="form-control select" required="required" data-fouc>
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

</form>

                        </div>

                    </div>
                </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php   }elseif(($manage=="edit")){
                    if((isset($_POST["news_id"]))){
                        $news_key=filter_input(INPUT_POST,'news_id');

                        $news_sql = "SELECT * FROM `tb_news`  WHERE `news_id`='{$news_key}'";
                        $news_list = result_array($news_sql);
                        foreach ($news_list as $key => $news_row) {
                            $news_id=$news_row["news_id"];
                            $news_category_id=$news_row["news_category_id"];
                            $news_topic=$news_row["news_topic"];
                            $news_image0=$news_row["news_image0"];
                            $news_detail_1=$news_row["news_detail_1"];
                            $news_image1_1=$news_row["news_image1_1"];
                            $news_image1_2=$news_row["news_image1_2"];
                            $news_detail_2=$news_row["news_detail_2"];
                            $news_image2_1=$news_row["news_image2_1"];
                            $news_image2_2=$news_row["news_image2_2"];
                            $news_detail_3=$news_row["news_detail_3"];
                            $news_image3_1=$news_row["news_image3_1"];
                            $news_image3_1=$news_row["news_image3_1"];
                            $news_image3_2=$news_row["news_image3_2"];
                            $news_detail_4=$news_row["news_detail_4"];
                            $news_image4_1=$news_row["news_image4_1"];
                            $news_image4_2=$news_row["news_image4_2"];
                            $news_detail_5=$news_row["news_detail_5"];
                            $news_image5_1=$news_row["news_image5_1"];
                            $news_image5_2=$news_row["news_image5_2"];
                            $news_status=$news_row["news_status"];
                        } ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>แก้ไขข้อมูลข่าวจัดชื้อจัดจ้าง</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ฟอร์มแก้ไขข้อมูลข่าวจัดชื้อจัดจ้าง</div>
                            <div class="col-<?php echo $grid;?>-6">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
    <form name="form_procurement_news_show" id="form_procurement_news_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=procurement_news">
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
<form name="form_up" id="form_up" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/procurement_news/procurement_news_process.php" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ประเภทข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select name="news_category_id" id="news_category_id" data-placeholder="เลือกประเภทข่าว..." class="form-control select" required="required" data-fouc>
                                                    <option></option>
                                                    <optgroup label="ประเภทข่าว">
        <?php
            $NewsCategory_sql = "SELECT `news_category_id`,`news_category_name` FROM `tb_news_category` ORDER BY `news_category_id` ASC";  
            $NewsCategory_list = result_array($NewsCategory_sql);      
            foreach ($NewsCategory_list as $key => $NewsCategory_row) { 
                if((is_array($NewsCategory_row) && count($NewsCategory_row))){
                    $NewsCategoryId=$NewsCategory_row["news_category_id"];
                    $NewsCategoryName=$NewsCategory_row["news_category_name"]; 
                    
                        if(($NewsCategoryId==$news_category_id)){
                            $news_category='selected="selected"';
                        }else{
                            $news_category=null;
                        }
                    
                    ?>
                                                        <option value="<?php echo $NewsCategoryId;?>" <?php echo $news_category;?>><?php echo $NewsCategoryName;?></option>        
        <?php   }else{
                    $NewsCategoryId=null;
                    $NewsCategoryName=null;
                }

            }              
        ?>

                                                    </optgroup>
										        </select>                                          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="news_topic-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="text" name="news_topic" id="news_topic" class="form-control" value="<?php echo $news_topic;?>" placeholder="หัวข้อข่าว" required="required" maxlength="100" required="required">                                           
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาพหัวข้อข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="news_image0" id="news_image0" class="file-input-image0" data-show-upload="false" data-show-caption="true" data-show-preview="true">
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image0').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },



            initialPreview: [

        <?php
                if((($news_image0!=null))){
                    if(file_exists("../uploads/news/".$news_image0)){ ?>
                        '../uploads/news/<?php echo $news_image0;?>'                
        <?php       }else{}
                }else{} ?>    
            
            ],                

            initialPreviewConfig: [

        <?php
                if((($news_image0!=null))){
                    if(file_exists("../uploads/news/".$news_image0)){ ?>
                        {caption: '<?php echo $news_image0;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}
        <?php       }else{}
                }else{} ?> 
                
            ],

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: true,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_1" id="news_detail_1" class="summernote" ><?php echo $news_detail_1;?></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="news_image1_1" id="news_image1_1" class="file-input-image1_1" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image1_1').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
//-------------------------------------------------------------------------------------------------------------
    
            initialPreview: [    

        <?php
                if(($news_image1_1!=null)){
                    if(file_exists("../uploads/news/".$news_image1_1)){ ?>

    
                        '../uploads/news/<?php echo $news_image1_1;?>'                                
                        

        <?php       }else{}
                }else{} ?>

            ],            
//-------------------------------------------------------------------------------------------------------------
            initialPreviewConfig: [    

        <?php
                if((isset($news_image1_1))){
                    if(file_exists("../uploads/news/".$news_image1_1)){ ?>

                    {caption: '<?php echo $news_image1_1;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}                


        <?php       }else{}
                }else{} ?>

            ],
//-------------------------------------------------------------------------------------------------------------
            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: true,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image1_2" id="news_image1_2" class="file-input-image1_2" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image1_2').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreview: [  

        <?php
                if((($news_image1_2!=null))){
                    if(file_exists("../uploads/news/".$news_image1_2)){ ?>

        
                        '../uploads/news/<?php echo $news_image1_2;?>'                
                

        <?php       }else{}
                }else{} ?>

            ],   

            initialPreviewConfig: [

        <?php
                if((($news_image1_2!=null))){
                    if(file_exists("../uploads/news/".$news_image1_2)){ ?>


                    {caption: '<?php echo $news_image1_2;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}                


        <?php       }else{}
                }else{} ?>

            ],

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_2" id="news_detail_2" class="summernote" ><?php echo $news_detail_2;?></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image2_1" id="news_image2_1" class="file-input-image2_1" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image2_1').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreview: [

        <?php
                if((($news_image2_1!=null))){
                    if(file_exists("../uploads/news/".$news_image2_1)){ ?>


                        '../uploads/news/<?php echo $news_image2_1;?>'                


        <?php       }else{}
                }else{} ?>

            ],

            initialPreviewConfig: [ 

        <?php
                if((($news_image2_1!=null))){
                    if(file_exists("../uploads/news/".$news_image2_1)){ ?>


                    {caption: '<?php echo $news_image2_1;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}


        <?php       }else{}
                }else{} ?>

            ],

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image2_2" id="news_image2_2" class="file-input-image2_2" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image2_2').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreview: [

        <?php
                if((($news_image2_2!=null))){

                    if(file_exists("../uploads/news/".$news_image2_2)){ ?>


                        '../uploads/news/<?php echo $news_image2_2;?>'
                    

        <?php       }else{}
                }else{} ?>

            ], 

             initialPreviewConfig: [           

        <?php
                if((($news_image2_2!=null))){

                    if(file_exists("../uploads/news/".$news_image2_2)){ ?>


                    {caption: '<?php echo $news_image2_2;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}
                

        <?php       }else{}
                }else{} ?>

             ],             

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_3" id="news_detail_3" class="summernote" ><?php echo $news_detail_3;?></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image3_1" id="news_image3_1" class="file-input-image3_1" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image3_1').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

               initialPreview: [

    <?php
            if((($news_image3_1!=null))){
                if(file_exists("../uploads/news/".$news_image3_1)){ ?>


                    '../uploads/news/<?php echo $news_image3_1;?>'
            

    <?php       }else{}
            }else{} ?>

                ],   

                initialPreviewConfig: [                
    <?php
            if((($news_image3_1!=null))){
                if(file_exists("../uploads/news/".$news_image3_1)){ ?>


                    {caption: '<?php echo $news_image3_1;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}
               

    <?php       }else{}
            }else{} ?>

                ],            

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: true,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image3_2" id="news_image3_2" class="file-input-image3_2" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image3_2').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreview: [   

        <?php
                if((($news_image3_2!=null))){
                    if(file_exists("../uploads/news/".$news_image3_2)){ ?>


                        '../uploads/news/<?php echo $news_image3_2;?>'
                    

        <?php       }else{}
                }else{} ?>

            ],

            initialPreviewConfig: [

        <?php
                if((($news_image3_2!=null))){
                    if(file_exists("../uploads/news/".$news_image3_2)){ ?>


                    {caption: '<?php echo $news_image3_2;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}
                    

        <?php       }else{}
                }else{} ?>

            ], 

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_4" id="news_detail_4" class="summernote" ><?php echo $news_detail_4;?></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image4_1" id="news_image4_1" class="file-input-image4_1" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image4_1').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreview: [

        <?php
                if((($news_image4_1!=null))){
                    if(file_exists("../uploads/news/".$news_image4_1)){ ?>


                        '../uploads/news/<?php echo $news_image4_1;?>'
                

        <?php       }else{}
                }else{} ?>

            ],    

            initialPreviewConfig: [     

    <?php
            if((($news_image4_1!=null))){
                if(file_exists("../uploads/news/".$news_image4_1)){ ?>


                {caption: '<?php echo $news_image4_1;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}
       

    <?php       }else{}
            }else{} ?>

            ],              

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="news_image4_2" id="news_image4_2" class="file-input-image4_2" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image4_2').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreview: [

        <?php
                if((($news_image4_2!=null))){
                    if(file_exists("../uploads/news/".$news_image4_2)){ ?>


                        '../uploads/news/<?php echo $news_image4_2;?>'
                

        <?php       }else{}
                }else{} ?>

            ],  

            initialPreviewConfig: [    

        <?php
                if((($news_image4_2!=null))){
                    if(file_exists("../uploads/news/".$news_image4_2)){ ?>


                    {caption: '<?php echo $news_image4_2;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}
                

        <?php       }else{}
                }else{} ?>

            ],              
            
            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="news_detail_5" id="news_detail_5" class="summernote" ><?php echo $news_detail_5;?></textarea>          
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="news_image5_1" id="news_image5_1" class="file-input-image5_1" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image5_1').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreview: [   

        <?php
                if((($news_image5_1!=null))){
                    if(file_exists("../uploads/news/".$news_image5_1)){ ?>


                        '../uploads/news/<?php echo $news_image5_1;?>'
                

        <?php       }else{}
                }else{} ?>  

            ],              


             initialPreviewConfig: [    

        <?php
                if((($news_image5_1!=null))){
                    if(file_exists("../uploads/news/".$news_image5_1)){ ?>


                    {caption: '<?php echo $news_image5_1;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}
                    

        <?php       }else{}
                }else{} ?>  

            ],            

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="news_image5_2" id="news_image5_2" class="file-input-image5_2" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input-image5_2').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreview: [

        <?php
                if((($news_image5_2!=null))){
                    if(file_exists("../uploads/news/".$news_image5_2)){ ?>


                        '../uploads/news/<?php echo $news_image5_2;?>'
                    

        <?php       }else{}
                }else{} ?>       
            
            ], 

           initialPreviewConfig: [

        <?php
                if((($news_image5_2!=null))){
                    if(file_exists("../uploads/news/".$news_image5_2)){ ?>

    
                    {caption: '<?php echo $news_image5_2;?>', size: 800000, key: 1, url: '{$url}', showDrag: false}
                        

        <?php       }else{}
                }else{} ?>  

            ],            

            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            initialPreviewAsData: true,
            overwriteInitial: false,
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select name="news_status" id="news_status"  class="form-control select" required="required" data-fouc>
                                                    
        <?php
                if(($news_status==0)){  ?>
                                                    <option value="1">แสดง</option>
                                                    <option value="0" selected="selected">ไม่แสดง</option>                                                    
        <?php   }elseif(($news_status==1)){   ?>
                                                    <option value="1" selected="selected">แสดง</option>
                                                    <option value="0">ไม่แสดง</option>
        <?php   }else{ ?>
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
                                    <button type="submit" name="sub_up" id="sub_up" class="btn btn-info">บันทึก</button>&nbsp;
                                    <button type="reset" name="reset_up" id="reset_up" class="btn btn-danger">ยกเลิก</button>
                                </fieldset>
                            </div>
                        </div>

<input type="hidden" name="action" id="action" value="edit">
<input type="hidden" name="news_id" id="news_id" value="<?php echo $news_id;?>">
</form>

                        </div>

                    </div>
                </div>
            </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php
                    }else{}
         }elseif(($manage=="show")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลข่าวจัดชื้อจัดจ้างทั้งหมด</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ข้อมูลข่าวจัดชื้อจัดจ้างทั้งหมด</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="form_procurement_news_show" id="form_procurement_news_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=procurement_news">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="form_procurement_news_add" id="form_procurement_news_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=procurement_news">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_mva" id="sub_mva"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลข่าวจัดชื้อจัดจ้าง</button>
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
        <?php   }else{} ?>

        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }

?>