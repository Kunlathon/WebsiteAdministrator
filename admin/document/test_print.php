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

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include ('../config/connect.ini.php');
    include ('../config/fnc.php');

   



    header("Content-type:text/html; charset=UTF-8");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    
    include('../structure/link.php');
    $RunLink = new link_system();
    //$RunLink->Call_Link_System();

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>โรงเรียนยุวทูตศึกษาราชพฤกษ์</title>



        <link rel="shortcut icon" href="<?php echo $RunLink->Call_Link_System(); ?>/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $RunLink->Call_Link_System(); ?>/images/favicon.ico" type="image/x-icon">

<!--Code Print css-->
        <link rel="stylesheet" href="<?php echo $RunLink->Call_Link_System(); ?>/js_code/tool_js/print/test_img/css/normalize.css">
		<link rel="stylesheet" href="<?php echo $RunLink->Call_Link_System(); ?>/js_code/tool_js/print/test_img/css/paper.css"> 	
<!--Code Print css End-->	

        <link rel="stylesheet" href="<?php echo $RunLink->Call_Link_System(); ?>/document2/css/fonts/th_niramit_as.css" />

        <style>
			body{
				font-family: "THNiramitAS";
				font-size: 16px;
				color: #032E3B;
				
			}
		</style>

        <style>
			@media print {
				
				@page{
					size: A4;
					margin: 1 cm;
				}
				
				button {
					display:none;
				}
				
				#p_echo{
					display:none;
				}
				
				body{
					font-family: "THNiramitAS";
					font-size: 16pt; 
							
				}
			}
			
			body{
				width: 210mm; height: 296mm;
			}
			.imgA{
				width: 210mm; height: 296mm;
			}
		</style>

<!-- Core JS files -->
        <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/main/jquery.min.js"></script>
        <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/main/bootstrap.bundle.min.js"></script>
<!-- Core JS files -->

<!--Code Print js-->
	<script src="<?php echo $RunLink->Call_Link_System(); ?>/js_code/tool_js/print/test_img/js/html2canvas.js"></script>	
<!--Code Print js End-->

    <script type="text/javascript">
		function setScreenHWCookie() {
			$.cookie('sw', screen.width);
			//$.cookie('sh',screen.height);
			return true;
		}
		setScreenHWCookie();
	</script>

	<?php
        $width_system = filter_input(INPUT_COOKIE, 'sw');
            if (($width_system >= 1200)) {
                $grid = "xl";
            } elseif (($width_system >= 992)) {
                $grid = "lg";
            } elseif (($width_system <= 768)) {
                $grid = "md";
            } elseif (($width_system <= 576)) {
                $grid = "sm";
            } else {
                $grid = "xs";
            }
	?>


    </head>

    <body>

    <div id="p_echo">
		<div class="container psrA">
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<div class="table-responsive">
						<table class="table" align="center" style="font-size: 18px;">
							<thead>
								<tr>
									<th style="width: 20%">
										<div><button type="button"  class="btn btn-default" onclick="window.print()"><b>พิมพ์ ทดสอบ...</b></button></div>
									</th>
								</tr>
								<tr>
									<th style="width: 20%">
										<div><font color="#F70105"><b>ระบบการพิมพ์  รองรับ เว็บเบราว์เซอร์  Google Chrome และ  Microsoft Edge เท่านั้น<b></font></div>
									</th>								
								</tr>
							</thead>						
						</table>
						<table class="table" align="center" style="font-size: 18px;">
							<thead>
								<tr>
									<th style="width: 20%; font-size: 18px;"><div>ขนาดกระดาษ</div></th>
									<th style="width: 20%; font-size: 18px;"><div>แนวกระดาษ</div></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><div>A4&nbsp;:&nbsp;210mm&nbsp;X&nbsp;296mm</div></td>
									<td><div>แนวตั้ง</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>		
			</div>		
		</div>
	</div>


        <section class="sheet padding-10mm imgA">
123456
        </section>

        <section class="sheet padding-10mm imgA">
7891011
        </section>


    </body>

</html>