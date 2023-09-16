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

    if ((preg_match("/manage_news.php/", $_SERVER['PHP_SELF']))) {
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
                $manage="add";

                if(($manage=="add")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>เพิ่มข้อมูลข่าว</h4>
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
    <form name="form_manage_news_show" id="form_manage_news_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news">
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
<form name="form_add" accept-charset="utf-8" action="#" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ประเภทข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select name="" id="" data-placeholder="เลือกประเภทข่าว..." class="form-control select" data-fouc>
                                                    <option></option>
                                                    <optgroup label="ประเภทข่าว">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="WY">Wyoming</option>
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
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อข่าว</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="text" name="news_topic" id="news_topic" class="form-control" value="" placeholder="หัวข้อข่าว" required="required" maxlength="100">                                           
                                            <div>
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
                                                <input type="file" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="" id="" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 1 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="" id="" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 2 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="" id="" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 3 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="" id="" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 4 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                            
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="" id="" class="summernote" ></textarea>          
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5 รูปภาพที่ 1</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div id="-null">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาข่าว 5 รูปภาพที่ 2</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="" class="file-input-custom" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            <div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <fieldset class="mb-3">
                                    <button type="button" name="sub_up" id="sub_up" class="btn btn-info">บันทึก</button>&nbsp;
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
        <?php   }else{}

            ?>

        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }

?>