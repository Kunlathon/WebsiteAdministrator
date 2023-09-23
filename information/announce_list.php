<div class="page-body">
    <div class="container-xl">

        <div class="row row-cards">
            <div class="col-md-12">
                <div class="page-body">
                    <div class="container-xl">

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row row-cards">
                            <div class="col-md-12">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-2 alogn-items-center">
                                                <div class="row row-cards">
                                                    <div class="col-md-12">
                                                        <div class="page-header d=print-none">
                                                            <div class="container-xl">
                                                                <div class="row g-2 alogn-items-center">
                                                                    <div col-md-12>
                                                                        <div class="page-title" style="font-size: 20px;">ประกาศรายชื่อผู้สมัคร ()</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-5 alogn-items-center">
                                                <div class="row row-cards">
                                                <div class="col-md-12">
                                                    <div class="page-header d=print-none">
                                                            <div class="container-xl">
                                                                <div class="row g-2 alogn-items-center">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>กรอกข้อมูลเพื่อค้นหา (Search)</label>
                                                                            <input name="" id="" type="text" class="form-control" required="required" placeholder="กรอกข้อมูลเพื่อค้นหา (Search)">
                                                                        </div>                                                                        
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="card-footer text-end" style="margin: 0 auto; text-align: center;">
                                                                        <center>
                                                                            <button type="submit" name="" id="" class="btn btn-success">คันหา</button>
                                                                            <button type="button" name="" id="" class="btn btn-danger">ยกเลิก</button>
                                                                        </center>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-5 alogn-items-center">
                                                <div class="row row-cards">
                                                    <div class="col-md-12">

                                                        <div class="card">
                                                            <div class="card-status-top bg-green"></div>
                                                            <div class="card-header">
                                                                <h3 class="card-title">รายการข้อมูล</h3>
                                                            </div>
                                                            <div class="card-body">

                                                                <div class="table-responsive">
                                                               
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><div>ลำดับ (No.)</div></th>
                                                                                <th><div>รายชื่อ (Name-Surname)</div></th>
                                                                                <th><div>สถานะ (Status)</div></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
    <?php
        $annouuce_Sql="SELECT * FROM `tb_register`";
        $annouuce_Rs=result_array($annouuce_Sql);
        $requset_count=0;
        foreach($annouuce_Rs as $key=>$annouuce_Row){ 
            $requset_count=$requset_count+1;
            $myname=$annouuce_Row["user_name"]." ".$annouuce_Row["user_surname"];

           


            


            ?>

                                                                            <tr>
                                                                                <td><div><?php echo $requset_count;?></div></td>

                                                                                <td><div><?php echo $myname;?></div></td>

                                                                                <td>
            <?php
                    if(($annouuce_Row["user_status"]=="1")){    ?>
                                                                                    <span class="badge bg-orange-lt">กำลังดำเนินการ</span>
            <?php    }elseif(($annouuce_Row["user_status"]=="2")){  ?>
                                                                                    <span class="badge bg-teal-lt" >ดำเนินเรียบร้อย</span>
            <?php    }else{}    ?>
                                                                                    
                                                                                </td>
                                                                            </tr>
    <?php   } ?>


                                                                        </tbody>
                                                                </table>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
          