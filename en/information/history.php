<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">

		  <?php
                    $sqlHis = "SELECT * FROM tb_information WHERE information_id='1' AND information_status='1'";
                    $rowHis= row_array($sqlHis);
			?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="card card-lg">
              <div class="card-body ">
                <div class="row g-4">

                  <div class="col-12 markdown">

					<center><h1><?php echo $rowHis['information_topic_en'];?></h1></center>

					 <?php
						if($rowHis['information_image']==""){ ?>
					<?php   } else { ?>
                            <p><div align="center"><img src="dist/information/<?php echo $rowHis['information_image'];?>" class="img-thumbnail" alt="<?php echo $rowHis['information_topic_en'];?>" style="width:500px; height:450px;"></div></p>
                            
					<?php   } ?>

                    <p><?php echo $rowHis['information_detail'];?></p>

                  </div>
                  
                </div>
              </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

