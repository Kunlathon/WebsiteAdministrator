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

?>

    <?php
        if((preg_match("/check_payment.php/", $_SERVER['PHP_SELF']))) {
            Header("Location: ../index.php");
            die();
        }else{ 
            if((check_session("admin_status_lcm")=='1') || (check_session("admin_status_lcm") == '2') ||(check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>

    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard" class="breadcrumb-item">
                    <i class="icon-home2 mr-2"></i> หน้าแรก</a>
                
                    <a href="#" class="breadcrumb-item">
                    <i class="icon-three-bars mr-2"></i> ตรวจสอบการชำระเงิน</a>

                    <!--<a href="<?php echo $RunLink->Call_Link_System();?>/?modules=check_payment" class="breadcrumb-item">
                    <i class="icon-list-unordered mr-2"></i> จัดการการชำระเงิน</a>-->

                </div>
                <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard"
                    class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ตรวจสอบการชำระเงิน</h4>
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
            
            if(($manage=="show")){ ?>

                <?php
                    if((isset($_POST["list"]))){
                        $check_grade=filter_input(INPUT_POST,'list');
                    }else{
                        if((isset($_GET["list"]))){
                            $check_grade=base64_decode(filter_input(INPUT_GET,'list'));
                        }else{}
                    }

                    if((isset($_POST["grade_txt"]))){
                        $class_gn=filter_input(INPUT_POST,'grade_txt');
                    }else{
                        if((isset($_GET["grade_txt"]))){
                            $class_gn=base64_decode(filter_input(INPUT_GET,'grade_txt'));
                        }else{}
                    }

                    if((isset($_POST["check_term"]))){
                        $check_term=filter_input(INPUT_POST,'check_term');
                    }else{
                        if((isset($_GET["check_term"]))){
                            $check_term=base64_decode(filter_input(INPUT_GET,'check_term'));
                        }else{
                            $term_sql="SELECT * 
                                       FROM `tb_term` 
                                       WHERE `term_status` = '1' 
                                       AND `grade_id` = '{$check_grade}' 
                                       ORDER BY `year` DESC , `term` DESC";
                            $term_row=row_array($term_sql);
                            $check_term=$term_row["term_id"];	
                        }
                    }

                   /* $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                                  FROM `tb_grade` 
                                  WHERE `grade_id`='{$check_grade}'";
                    $class_Row = result_array($class_Sql);
                    $class_gn=$class_Row["grade_name"];*/

                ?>

<?php //echo "check_grade->".$check_grade."class_gn->".$class_gn."check_term=->".$check_term;?>
                    
                <?php
                        if((is_numeric($check_grade))){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
                    $(document).ready(function(){
                        $('#check_term').on('change',function(){
                            var check_grade="<?php echo $check_grade;?>";
                            var check_term=$("#check_term").val();
                            var cp_class_gn="<?php echo $class_gn;?>";

                                if(check_grade!="" && check_term!="" && cp_class_gn!=""){
                                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/check_payment/check_payment_run.php",{
                                        check_grade:check_grade,
                                        class_gn:cp_class_gn,
                                        check_term:check_term
                                    },function(class_student){
                                        $("#run_payment_student").html(class_student);
                                    })
                                }else{}
                        })
                    })
                </script>

                <script>
                    $(document).ready(function(){
                        var check_grade="<?php echo $check_grade;?>";
                        var check_term="<?php echo $check_term;?>";
                        var cp_class_gn="<?php echo $class_gn;?>";
                            if(check_grade!="" && check_term!="" && cp_class_gn!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/check_payment/check_payment_run.php",{
                                    check_grade:check_grade,
                                    class_gn:cp_class_gn,
                                    check_term:check_term
                                },function(class_student){
                                    $("#run_payment_student").html(class_student);
                                })
                            }else{}        
                    })
                </script>


                <div class="row">
                    <div class="col-<?php echo $grid;?>-4">
                        <h4>ข้อมูลห้องเรียน : <?php echo $class_gn;?></h4>
                    </div>
                    <div class="col-<?php echo $grid;?>-4"></div>
                    <div class="col-<?php echo $grid;?>-4">
                        <fieldset class="mb-3">
                            <div class="form-group row">
                                <label class="col-form-label col-<?php echo $grid; ?>-3">ภาคเรียน</label>
                                    <div class="col-<?php echo $grid; ?>-9">
                                        <select class="form-control select" name="check_term" id="check_term" data-placeholder="เลือกภาคเรียน..." required="required">
                                                <option></option>
                                            <optgroup label="ภาคเรียน">
                    <?php
                        $sql = "SELECT * FROM tb_term WHERE grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                        $cc = result_array($sql);
                    ?>
                    <?php foreach ($cc as $_cc) { 
                        
                            if(($_cc['term_id']==$check_term)){
                                $term_selected='selected="selected"'; 
                            }else{
                                $term_selected="";
                            }
                        
                        ?>


                                                <option value="<?php echo $_cc['term_id'];?>" <?php echo $term_selected;?> ><?php echo $_cc['term'];?>/<?php echo $_cc['year'];?></option>
                    <?php } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                            </div>
                        </fieldset> 
                    </div>    
                </div>

                <div id="run_payment_student"></div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   }else{}?>


    <?php   }else{ ?>

        <div class="row">

<?php
    $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                  FROM `tb_grade` 
                  ORDER BY `grade_id` ASC";
    $class_Row = result_array($class_Sql);

    $count_color=0;
    $bg_color=array("bg-primary","bg-success","bg-info");

    foreach ($class_Row as $key => $class_Print){

        if ((is_array($class_Print) && count($class_Print))) { ?>
            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            
                <div class="col-<?php echo $grid; ?>-4">
<form name="list_class<?php echo $count_color;?>" id="list_class<?php echo $count_color;?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_payment">
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
                
            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
        $count_color=$count_color+1;
            if(($count_color=="3")){
                $count_color=0;
            }else{}

       }else{}
    }
?>

        </div>

    <?php   } ?>

    </div>


    <?php   }else{}
        } ?>