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

    //ini_set('display_errors', 1);
    //error_reporting(E_ALL ^ E_NOTICE);;
?>
    <?php
        if((preg_match("/report_assessment.php/", $_SERVER['PHP_SELF']))){
            Header("Location: ../index.php");
            die();
        }else{
            if((check_session("admin_status_aba")=='1') || (check_session("admin_status_aba") == '2') ||(check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard" class="breadcrumb-item">
                    <i class="icon-home2 mr-2"></i> หน้าแรก</a>
                
                    <a href="#" class="breadcrumb-item">
                    <i class="icon-three-bars mr-2"></i> xxxx</a>

                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=report_assessment" class="breadcrumb-item">
                    <i class="icon-list-unordered mr-2"></i> xxxx</a>

                </div>
                <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard"
                    class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div style="font-size: 20px;" >การประเมิน</div>
            </div>
        </div>

        <?php
            if((isset($_POST["manage"]))){
                $manage=filter_input(INPUT_POST, 'manage');
            }else{
                if((isset($_GET["manage"]))){
                    $manage=filter_input(INPUT_GET, 'manage');
                }else{
                    $manage=null;
                }
             }
        ?>

        <?php
                if(($manage=="show")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                        if((isset($_POST["list"]))){
                            $check_grade=filter_input(INPUT_POST,'list');
                        }else{
                            if((isset($_GET["list"]))){
                                $check_grade=base64_decode(filter_input(INPUT_GET,'list'));
                            }else{}
                        }

                            if((isset($check_grade))){ 
                                    $cg_sql = "SELECT * 
                                               FROM `tb_term` 
                                               WHERE `term_status` = '1' 
                                               AND `grade_id` = '{$check_grade}' 
                                               ORDER BY `year` DESC , `term` DESC";
                                    $cg_row = row_array($cg_sql);
                                    $check_term=$cg_row['term_id'];
                                ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->    
        <div class="row">
            <div class="col-<?php echo $grid;?>-4">
                <div style="font-size: 18px;" >การประเมิน</div>
            </div>
            <div class="col-<?php echo $grid;?>-8">
                <div class="row">
                    <div class="col-<?php echo $grid;?>-6">
                        <fieldset class="mb-3">
                            <div class="form-group row">
                                <label class="col-form-label col-<?php echo $grid;?>-5">ภาคเรียน</label>
                                    <div class="col-<?php echo $grid;?>-7">
                                        <select class="form-control select-search" name="term_key" id="term_key" data-fouc>
                                            <optgroup label="เลือก ภาคเรียน">

                        <?php
                            $sql = "SELECT * 
                                    FROM `tb_term` 
                                    WHERE `grade_id` = '{$check_grade}'  
                                    ORDER BY `year` DESC , `term` DESC";
                            $cc = result_array($sql);
                                foreach ($cc as $_cc){
                                    if((is_array($_cc) && count($_cc))){ ?>
                                                <option value="<?php echo $_cc['term_id'];?>"><?php echo $_cc['term']."/".$_cc['year'];?></option>
                        <?php       }else{}
                                }   ?>

                                            </optgroup>
                                        </select>
                                    </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-<?php echo $grid;?>-6">
                        <fieldset class="mb-3">
                            <div class="form-group row">
                                <label class="col-form-label col-<?php echo $grid;?>-5">ห้องเรียน</label>
                                    <div class="col-<?php echo $grid;?>-7">
                                        <select class="form-control select-search" data-placeholder="เลือกห้องเรียน..." name="classroom_key" id="classroom_key" data-fouc>
                                                <option></option>
                                            <optgroup label="เลือก ห้องเรียน">
                        <?php
                            $sql = "SELECT * 
                                    FROM `tb_classroom_teacher` 
                                    WHERE `grade_id` = '{$check_grade}' 
                                    AND `term_id` = '{$check_term}'
                                    ORDER BY `classroom_name` ASC";
                            $cc = result_array($sql);
                            foreach ($cc as $_cc){
                                if((is_array($_cc) && count($_cc))){ ?>
                                                <option <?php echo $classroom == $_cc['classroom_t_id'] ? "selected":"";?> value="<?php echo $_cc['classroom_t_id'];?>"><?php echo $_cc['classroom_name'];?></option>
                        <?php   }else{}
                            }
                        ?>
                                            </optgroup>
                                        </select>									
                                    </div>
                            </div>
                        </fieldset>                
                    </div>

                    <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $check_grade;?>"> 

                </div> 
                  
            </div>
        </div>
        <div id="achievement_show"></div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   }else{} ?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php   }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="row">
        <?php
            $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                          FROM `tb_grade` 
                          ORDER BY `grade_id` ASC";
            $class_Row = result_array($class_Sql);
            $count_color=0;
            $bg_color=array("bg-primary","bg-success","bg-info");
            foreach ($class_Row as $key => $class_Print){
                if((is_array($class_Print) && count($class_Print))){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="col-<?php echo $grid; ?>-4">
<form name="list_class<?php echo $count_color;?>" id="list_class<?php echo $count_color;?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_achievement_edu">
                            <button type="submit" class="card card-body <?php echo $bg_color[$count_color];?> btn-block text-white has-bg-image btn-float m-0">
                                <div class="media">
                                    <div class="mr-3 align-self-center">
                                        <i class="icon-graduation2 icon-3x opacity-75"></i>
                                    </div>

                                    <div class="media-body text-right">
                                        <h3 class="mb-0">ระดับชั้น<?php echo $class_Print["grade_name"]; ?>&nbsp;</h3>
                                        <span class="text-uppercase font-size-xs"><?php echo $class_Print["grade_name_eng"];?>&nbsp;</span>
                                    </div>
                                </div>
                            </button>
        <input name="list"  type="hidden" value="<?php echo $class_Print['grade_id']; ?>">
        <input name="manage"  type="hidden" value="show" >
        <input name="grade_txt" type="hidden" value="<?php echo $class_Print['grade_name']; ?>">
</form>
                        </div>
        <?php
            $count_color=$count_color+1;
                if(($count_color=="3")){
                    $count_color=0;
                }else{}
        ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php   }else{}
            }
        ?>
        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php   } ?>
    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{}
        }
    ?>