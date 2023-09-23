<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">

		  <?php
                    $sqlMan = "SELECT * FROM tb_information WHERE information_id='4' AND information_status='1'";
                    $rowMan= row_array($sqlMan);
			?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="card card-lg">
              <div class="card-body ">
                <div class="row g-4">

                  <div class="col-12 markdown">

                    <center><h1><?php echo $rowMan['information_topic'];?></h1></center>

					 <?php
						if($rowMan['information_image']==""){ ?>
					<?php   } else { ?>
                            <p><div align="center"><img src="uploads/information/<?php echo $rowMan['information_image'];?>" class="img-thumbnail" alt="<?php echo $rowMan['information_topic'];?>" style="width:500px; height:450px;"></div></p>
                            
					<?php   } ?>

                    <p><?php echo $rowMan['information_detail'];?></p>

                  </div>
                  
                </div>
              </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

