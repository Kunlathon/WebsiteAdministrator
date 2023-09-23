<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">

		  <?php
                    $sqlPla = "SELECT * FROM tb_information WHERE information_id='3' AND information_status='1'";
                    $rowPla= row_array($sqlPla);
			?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="card card-lg">
              <div class="card-body ">
                <div class="row g-4">

                  <div class="col-12 markdown">

                    <center><h1><?php echo $rowPla['information_topic'];?></h1></center>

					 <?php
						if($rowPla['information_image']==""){ ?>
					<?php   } else { ?>
                            <p><div align="center"><img src="uploads/information/<?php echo $rowPla['information_image'];?>" class="img-thumbnail" alt="<?php echo $rowPla['information_topic'];?>" style="width:500px; height:450px;"></div></p>
                            
					<?php   } ?>

                    <p><?php echo $rowPla['information_detail'];?></p>

                  </div>
                  
                </div>
              </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

