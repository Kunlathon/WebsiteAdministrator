<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">

		  <?php
                    $sqlRes = "SELECT * FROM tb_information WHERE information_id='2' AND information_status='1'";
                    $rowRes= row_array($sqlRes);
			?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="card card-lg">
              <div class="card-body ">
                <div class="row g-4">

                  <div class="col-12 markdown">

                    <center><h1><?php echo $rowRes['information_topic_en'];?></h1></center>

					 <?php
						if($rowRes['information_image']==""){ ?>
					<?php   } else { ?>
                            <p><div align="center"><img src="../dist/information/<?php echo $rowRes['information_image'];?>" class="img-thumbnail" alt="<?php echo $rowRes['information_topic_en'];?>" style="width:500px; height:450px;"></div></p>
                            
					<?php   } ?>

                    <p><?php echo $rowRes['information_detail_en'];?></p>

                  </div>
                  
                </div>
              </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

