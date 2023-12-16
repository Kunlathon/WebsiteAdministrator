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
    if ((preg_match("/course_classroom_show_classroom_data.php/", $_SERVER['PHP_SELF']))) {
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>

    <?php
        if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST,'manage');
        }else{
            if((isset($_GET["manage"]))){
                $manage=filter_input(INPUT_GET,'manage');
            }else{
                $manage=null;
            }
        }
    ?>

    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_classroom_show_data" class="breadcrumb-item"> ห้องเรียน </a>

                    <a href="#" class="breadcrumb-item"> ข้อมูลห้องเรียน</a>


                </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

        <?php
                if(($manage=="add")){ ?>

        <fieldset class="mb-3">
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>ข้อมูลห้องเรียน</h4>
                </div>
            </div>
        </fieldset>

        <?php   }elseif(($manage=="show")){
                    if((isset($_POST["classroom_t_key"]))){ 
                        $classroom_t_key=filter_input(INPUT_POST,'classroom_t_key');
                        
                        $sqlC = "SELECT * FROM `tb_classroom_teacher` WHERE `classroom_t_id` = '{$classroom_t_key}'";
                        $rowC = row_array($sqlC);
            
                        $classtid = $rowC['classroom_t_id'];
                        $class = $rowC['classroom_name'];
                        
                        $tid1 = $rowC['teacher_id1'];
                        $sqlT1 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid1}'";
                        $rowT1 = row_array($sqlT1);

                        ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

        <fieldset class="mb-3">
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div style="font-size: 20px; ">บัญชีรายชื่อนักเรียน</div>
                    <div style="font-size: 20px; ">ครูผู้สอน <?php echo $rowT1['teacher_name']." ".$rowT1['teacher_surname']; ?></div>
                </div>
            </div>
        </fieldset>

        <fieldset class="mb-3">
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">บัญชีรายชื่อนักเรียน</div>
                            <div class="col-<?php echo $grid;?>-6">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
    <form name="course_classroom_show_form_show" id="course_classroom_show_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_classroom_show_data">
                                                <input type="hidden" name="manage" id="manage" value="show">
                                                <button type="submit" name="sub_ccsfs" id="sub_ccsfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> แสดงข้อมูล</button>
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
        </fieldset>

        <input type="hidden" name="run_show" id="run_show" value="show">
        <input type="hidden" name="classtid" id="classtid" value="<?php echo $classtid;?>">

    <script>
        $(document).ready(function(){
            var run_show=$("#run_show").val();
            var classtid=$("#classtid").val();
                if(run_show==="show" && classtid!==""){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/course_classroom_show/course_classroom_show_show.php",{
                        run_show:run_show,
                        classtid:classtid
                    },function(RunShow){
                        if(RunShow!=""){
                            $("#Run_Show_All").html(RunShow);
                        }else{}
                    })
                }else{
                    document.getElementById("Run_Show_All").innerHTML=
                    '<span style="font-weight: bold; color:red;">ไม่สามารถดำเนินการได้</span>';
                }
        })
    </script>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php       }else{}
                }else{} ?>

    </div>



<?php   }else{

        }
    }
?>


