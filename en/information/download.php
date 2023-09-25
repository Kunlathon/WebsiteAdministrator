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
                                                                    <div class="col-md-12">
                                                                        <div class="page-title" style="font-size: 20px;">Download</div>
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
                                                                            <div id="text_key-null">
                                                                            <input name="text_key"  id="text_key" type="text" class="form-control" required="required" placeholder="กรอกข้อมูลเพื่อค้นหา (Search)">
                                                                            </div>
                                                                        </div>                                                                        
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="card-footer text-end" style="margin: 0 auto; text-align: center;">
                                                                        <center>
                                                                            <button type="button" name="but_clink" id="but_clink" class="btn btn-success">Search</button>
                                                                            <button type="button" name="but_delete" id="but_delete" class="btn btn-danger" value="but_delete">Cancel</button>
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
                                                                <h3 class="card-title">Data List</h3>
                                                            </div>
                                                            <div class="card-body">
															<div id="Run_List">
                                                                <div class="table-responsive">
                                                               
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>    
																				<th><div>ลำดับ (No.)</div></th>
																				<th><div>รายการ (List)</div></th>
                                                                                <th><div>ประเภท (Type)</div></th>
                                                                                <th><div>ไฟล์ (File)</div></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
																		<?php
																			$request_Sql="SELECT * FROM tb_document a INNER JOIN tb_document_category b ON a.document_category_id=b.document_category_id WHERE a.document_status='1' ORDER BY a.document_topic ASC";
																			$request_Rs=result_array($request_Sql);
																			$requset_count=0;
																			foreach($request_Rs as $key=>$request_Row){ 
																				$requset_count=$requset_count+1;
																				$document_name=$request_Row["document_topic"];
																				$document_category_name=$request_Row["document_category_name"];

																		?>

                                                                            <tr>
                                                                                <td><div><?php echo $requset_count;?></div></td>

                                                                                <td><div><?php echo $document_name;?></div></td>

                                                                                <td><div><?php echo $document_category_name;?></div></td>

                                                                                <td>
																																								
																					<?php
																					if ($request_Row['document_file'] == "") {

																					} else {
																					?>
																						<a href="../uploads/document/<?php echo $request_Row['document_file']; ?>" target="_blank"><span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
																						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
																						   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
																						   <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
																						   <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
																						   <path d="M9 15l2 2l4 -4"></path>
																						</svg>
																					  </span></a>

																					<?php
																					}
																					?>
                                                                                    
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
                        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
          
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $("#but_delete").on("click",function(){
            var but_delete=$("#but_delete").val();
                if(but_delete==="but_delete"){
                    document.location="?modules=download";
                }else{}
        })
    })
</script>

<script>
    $(document).ready(function(){
        $("#but_clink").on("click",function(){
            var text_key=$("#text_key").val();
                if(text_key!==""){
                    if(text_key.length>=101){
                        document.getElementById("text_key-null").innerHTML=
                        '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control is-invalid">'
                        +'<div class="invalid-feedback">จำนวนตัวอักษรจำกัดไม่เกิน 100 ตัวอักษร</div>';
                    }else{
                        $.post("proccess/download_show.php",{
                            text_key:text_key
                        },function(RunList){
                            if(RunList!==""){
                                $("#Run_List").html(RunList);
                                document.getElementById("text_key-null").innerHTML=
                                '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control">'
                                +'<div class="invalid-feedback"></div>';
                            }else{
                                document.getElementById("Run_List").innerHTML=
                                '<div class="row">'
                                +'  <div class="alert alert-warning" role="alert">'
                                +'      เกิดข้อผิดพลาดไม่สามารถดำเนินการได้'
                                +'  </div>'
                                +'</div>';
                            }
                        })
                    }
                }else{
                    document.getElementById("text_key-null").innerHTML=
                        '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control is-invalid">'
                        +'<div class="invalid-feedback">กรุณาพิมพ์ เพื่อค้นหา</div>';
                }
        })
    })
</script>