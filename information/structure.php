<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">

		  <?php
                    $sqlStr = "SELECT * FROM tb_information WHERE information_id='5' AND information_status='1'";
                    $rowStr= row_array($sqlStr);
			?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="card card-lg">
              <div class="card-body ">
                <div class="row g-4">

                  <div class="col-12 markdown">

                    <center><h1><?php echo $rowStr['information_topic'];?></h1></center>

					 <?php
						if($rowStr['information_image']==""){ ?>
					<?php   } else { ?>
                            <p><div align="center"><img src="uploads/information/<?php echo $rowStr['information_image'];?>" class="img-thumbnail" alt="<?php echo $rowStr['information_topic'];?>" style="width:595px; height:394px;"></div></p>
                            
					<?php   } ?>

                    <p><?php echo $rowStr['information_detail'];?></p>

                  </div>
                  
                </div>
              </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

