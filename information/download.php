<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">

		  <?php
                    $sqlHis = "SELECT * FROM tb_information WHERE information_id='8' AND information_status='1'";
                    $rowHis= row_array($sqlHis);
			?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="card card-lg">
              <div class="card-body ">
                <div class="row g-4">

                  <div class="col-12 markdown">

                    <center><h1>เอกสารดาวน์โหลด</h1></center>

					 <?php
						if($rowHis['information_image']==""){ ?>
					<?php   } else { ?>
                            <p><div align="center"><img src="uploads/information/<?php echo $rowHis['information_image'];?>" class="img-thumbnail" alt="<?php echo $rowHis['information_topic'];?>" style="width:500px; height:450px;"></div></p>
                            
					<?php   } ?>

					<div class="row row-deck row-cards">
					  <div class="col-md-12">
						<?php
							$sqlMap = "SELECT * FROM tb_information WHERE information_id='7' AND information_status='1'";
							$rowMap= row_array($sqlMap);
						
							echo $rowMap['information_detail'];
						?>
						
					  </div>
					</div>

                  </div>
                  
                </div>
              </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

