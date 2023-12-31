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

//error_reporting (E_ALL ^ E_NOTICE);
//ini_set('display_errors', 'On');
error_reporting(E_ALL ^ E_NOTICE);
    if((preg_match("/student_card_show.php/", $_SERVER['PHP_SELF']))) {
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=student_card_show" class="breadcrumb-item"> ข้อมูลขอบัตรประจำตัวนิสิต</a>

                        <a href="#" class="breadcrumb-item">  ข้อมูลขอบัตรประจำตัวนิสิต</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
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

            if(($manage=="add")){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }elseif(($manage=="show")){ 
        
        $now_date1=date("Y-m-d");
        $now_date2=date("Y-m-d",strtotime("+1 days",strtotime($now_date1)));

        $now_date1=str_replace("-","/",$now_date1);
        $now_date2=str_replace("-","/",$now_date2);
        
        ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลขอบัตรประจำตัวนิสิตออนไลน์</h4>
            </div>
        </div>
    </fieldset>

    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ตารางข้อมูลขอบัตรประจำตัวนิสิตออนไลน์</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
                                            <button type="button" name="button_show" id="button_show" class="btn btn-secondary btn-sm" style="align: right;" value="show"><i class="icon-list-unordered"></i> แสดงข้อมูล</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="" id="" accept-charset="uft-8" method="post" action="">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="" id="" class="btn btn-danger btn-sm" style="align: right;"><i class="icon-printer4"></i> พิมพ์</button>
</form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="" id="" accept-charset="uft-8" method="post" action="">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="" id="" class="btn btn-pink btn-sm" style="align: right;"><i class="icon-file-excel"></i> Excel</button>
</form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="" id="" accept-charset="uft-8" method="post" action="">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="" id="" class="btn btn-purple btn-sm" style="align: right;"><i class="icon-check"></i> อนุมัติ</button>
</form>
                                        </div>
                                    </td>                                    
                                </tr>
                            </table>                    
                        </div>
                    </div>

                    <div class="card-body">

                        <fieldset class="mb-3">
                            <div class="row">
                                <div class="col-<?php echo $grid;?>-8">
                                    <div class="form-group row">
                                        <label class="col-form-label col-<?php echo $grid;?>-2">ระหว่างวันที่</label>
                                        <div class="col-<?php echo $grid;?>-10">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                                </span>  
                                                <input type="text" name="TimeSearch" id="TimeSearch" class="form-control daterange-basic" value="<?php echo $now_date1." - ".$now_date2;?>">                                                                                              
                                            </div>    
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-<?php echo $grid;?>-4"></div>
                            </div>
                        </fieldset>

                   

                        <fieldset class="mb-3">
                        <div id="Run_Show_All">
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span>
                            </div>
                        </div>
                        </div>
                        </fieldset>
                    </div>

                </div>       
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="run_show" id="run_show" value="show">

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{  ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <fieldset class="mb-3">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลขอบัตรประจำตัวนิสิตทั้งหมด</h4>
            </div>
        </div>
    </fieldset>

    <fieldset class="mb-3">
        <div class="row">
           <div class="col-<?php echo $grid;?>-12">
                <div class="content d-flex justify-content-center align-items-center">
                    <div class="flex-fill">
<!-- Error title -->
                        <div class="text-center mb-4">
                            <img src="../../../../global_assets/images/error_bg.svg" class="img-fluid mb-3" height="230" alt="">
                            <h1 class="display-2 font-weight-semibold line-height-1 mb-2">404</h1>
                            <h6 class="w-md-25 mx-md-auto">Oops, an error has occurred. <br> Access to this resource on the server is denied.</h6>
                        </div>
<!-- /error title -->
<!-- Error content -->
                        <div class="text-center">
                            <button type="button" class="btn btn-primary"><i class="icon-home4 mr-2"></i> Return to dashboard</button>
                        </div>
<!-- /error wrapper -->

                    </div>
                </div>
            </div> 
        </div>
    </fieldset>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }

        }
    ?>


        </div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }
?>