<?php
    include("view/function_class/run_date_time.php");  

    include("view/database/pdo_student_late.php");
    include("view/database/class_student_late.php");
?>

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="breadcrumb-line breadcrumb-line-component">
				<ul class="breadcrumb">
					<h4> <span class="text-semibold">นักเรียนมาสาย </span>ประมวลผลข้อมูลนักเรียนมาสาย</h4>
				</ul>
				<ul class="breadcrumb-elements">
					<div class="heading-btn-group">
						<a href="./?evaluation_mod=home" class="btn btn-link  text-size-small"><span>หน้าแรก</span></a>
						<a class="btn btn-link  text-size-small"><span>/</span></a>
						<a class="btn btn-link  text-size-small"><span>ประมวลผลข้อมูลนักเรียนมาสาย</span></a>
					</div>
				</ul>
			</div>
		</div>
	</div>

<?php
        $Time_Student_Set=new SetTimeSL("Row","-","-");    
        foreach($Time_Student_Set->PrintSetTime() as $rc_key=>$Time_Student_Print){
            
            if((isset($Time_Student_Print["ssy_id"]))){
                $ssy_id=$Time_Student_Print["ssy_id"];
            }else{
                $ssy_id="-";
            }

            if((isset($Time_Student_Print["ssy_t"]))){
                $ssy_t=$Time_Student_Print["ssy_t"];
            }else{
                $ssy_t="-";
            }

            if((isset($Time_Student_Print["ssy_y"]))){
                $ssy_y=$Time_Student_Print["ssy_y"];
            }else{
                $ssy_y="-";
            }

            if((isset($Time_Student_Print["ssy_date_start"]))){
                $ssy_date_start=date("Y-m-d",strtotime($Time_Student_Print["ssy_date_start"]));
            }else{
                $ssy_date_start="-";
            }

            if((isset($Time_Student_Print["ssy_date_end"]))){
                $ssy_date_end=date("Y-m-d",strtotime($Time_Student_Print["ssy_date_end"]));
            }else{
                $ssy_date_end="-";
            }

        }

        if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST,'manage');
        }else{
            if((isset($_GET["manage"]))){
                $manage=filter_input(INPUT_GET,'manage');
            }else{
                $manage="show";
            }
        }  

		$set_time_system=new RunDateTime("date_all",$ssy_date_start,$ssy_date_end);
?>


	<?php
			if(($manage=="show")){ ?>

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel">
				<div class="panel-heading bg-pink">
					<h6 class="panel-title">ประมวลผลข้อมูลนักเรียนมาสาย ภาคเรียนที่ <?php echo $ssy_t;?> ปีการศึกษา <?php echo $ssy_y;?> </h6>
				</div>

				<div class="panel-body">
		<?php
				if(($set_time_system->Call_DateTime_Start()=="ON")){ ?>

  					<div class="form-group">
						<div class="row">
							<div class="col-<?php echo $grid;?>-4">
								<div class="panel panel-body bg-indigo-400 has-bg-image">
									<div class="media no-margin">
										<div class="media-left media-middle">
											<i class="icon-enter6 icon-3x opacity-75"></i>
										</div>

										<div class="media-body text-right">
											<h3 class="no-margin">245,382</h3>
											<span class="text-uppercase text-size-mini">จำนวนออกจดหมาย</span>
										</div>
									</div>
								</div>						
							</div>
							<div class="col-<?php echo $grid;?>-4">
								<div class="panel panel-body bg-indigo-400 has-bg-image">
									<div class="media no-margin">
										<div class="media-left media-middle">
											<i class="icon-enter6 icon-3x opacity-75"></i>
										</div>

										<div class="media-body text-right">
											<h3 class="no-margin">245,382</h3>
											<span class="text-uppercase text-size-mini">จดหมายยังไม่ได้จัดพิมพ์</span>
										</div>
									</div>
								</div>						
							</div>
							<div class="col-<?php echo $grid;?>-4">
								<div class="panel panel-body bg-indigo-400 has-bg-image">
									<div class="media no-margin">
										<div class="media-left media-middle">
											<i class="icon-enter6 icon-3x opacity-75"></i>
										</div>

										<div class="media-body text-right">
											<h3 class="no-margin">245,382</h3>
											<span class="text-uppercase text-size-mini">จดหมายจัดพิมพ์แล้ว</span>
										</div>
									</div>
								</div>						
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-<?php echo $grid;?>-12">
						
							</div>
						</div>
					</div>


		<?php	}elseif(($set_time_system->Call_DateTime_Start()=="OFF")){	?>

					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<div class="text-center content-group">
                                <h1 class="error-title">หมดเวลา</h1>
                                <h5>สิ้นสุดระยะการลงทะเบียนข้อมูลนักเรียนมาสาย ภาคเรียนที่ <?php echo $ssy_t;?> ปีการศึกษา <?php echo $ssy_y;?></h5>
                            </div>  					
						</div>
					</div>

		<?php	}else{} ?>
				</div>
			</div>
		</div>
	</div>

	<?php	}else{} ?>
