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

    include("../../config/connect.ini.php");
    include("../../config/fnc.php");
    include("../../structure/link.php");

    $RunLink = new link_system();
    check_login('admin_username_lcm', 'login.php');
    $aid = check_session("admin_id_lcm");
    $update_date = date('Y-m-d H:i:s');
    $image_date=date("YmdHis");
    $action = filter_input(INPUT_POST, 'action');

        if(($action=="add")){

            $FolderName="album".$image_date;
            $gallery_name=filter_input(INPUT_POST, 'gallery_name');
            $gallery_topic=filter_input(INPUT_POST, 'gallery_topic');

                if(isset($gallery_name,$gallery_topic)){

                    $IntoFolder="../../../uploads/gallery/".$FolderName;
                    mkdir("$IntoFolder",0777);

//gallery_thumbnail

                        if(($_FILES["gallery_thumbnail"]["name"]!=null)){

                            $gallery_thumbnail_nameNew=$image_date."_gl";
                            $gallery_thumbnail_name = $_FILES["gallery_thumbnail"]["name"];
                            $gallery_thumbnail_type = $_FILES["gallery_thumbnail"]["type"];

                            //new file Name
                            $imgFile = explode('.', $gallery_thumbnail_name);
                            $fileType = $imgFile[count($imgFile) - 1];
                            //new file Name end

                            $gallery_thumbnail_new_name = $gallery_thumbnail_nameNew.".".$fileType;
                            $gallery_thumbnail_tmp = $_FILES["gallery_thumbnail"]["tmp_name"];
                            $gallery_thumbnail_size = $_FILES["gallery_thumbnail"]["size"];

                            move_uploaded_file($gallery_thumbnail_tmp, '../../../uploads/gallery/'.$FolderName.'/'. $gallery_thumbnail_new_name);
                            //up image end

                        }else{
                            $gallery_thumbnail_new_name=null;
                        }

//gallery_thumbnail end
//
                        $gallery_name=filter_input(INPUT_POST, 'gallery_name');
                        $gallery_topic=filter_input(INPUT_POST, 'gallery_topic');
                        $gallery_status=filter_input(INPUT_POST, 'gallery_status');

//Set Id from AUTO_INCREMENT
                        $sqlGal = "SELECT *,MAX(gallery_id) AS ID FROM tb_gallery";
                        $tcrGal = row_array($sqlGal);
                        $Gal_ID = $tcrGal['ID'] + 1;
//Set Id from AUTO_INCREMENT End

                        $Picture_Album_Data = array("gallery_id"=>$Gal_ID,
                                                    "gallery_name"=>$gallery_name,
                                                    "gallery_topic"=>$gallery_topic,
                                                    "gallery_thumbnail"=>$gallery_thumbnail_new_name,
                                                    "gallery_folder"=>$FolderName,
                                                    "gallery_status"=>$gallery_status);
                        insert("tb_gallery", $Picture_Album_Data); 

//

                        if(($_FILES["picture_name"]["name"]!=null)){
                            $Count_Picture_Name=count($_FILES["picture_name"]["name"]);
                            $Count_Key=0;
                            while($Count_Key<$Count_Picture_Name){

                                $picture_nameNew=$image_date.$Count_Key."_pt";
                                $picture_name = $_FILES["picture_name"]["name"][$Count_Key];
                                $picture_type = $_FILES["picture_name"]["type"][$Count_Key];

                                //new file Name
                                $picture_imgFile = explode('.', $picture_name);
                                $picture_fileType = $picture_imgFile[count($picture_imgFile) - 1];
                                //new file Name end

                                $picture_new_name = $picture_nameNew.".".$picture_fileType;
                                $picture_tmp = $_FILES["picture_name"]["tmp_name"][$Count_Key];
                                $picture_size = $_FILES["picture_name"]["size"][$Count_Key];

                                move_uploaded_file($picture_tmp, '../../../uploads/gallery/'.$FolderName.'/'. $picture_new_name);

                                $Picture_Img_Data = array("gallery_id"=>$Gal_ID,
                                                          "picture_name"=>$picture_new_name);
                                insert("tb_picture", $Picture_Img_Data); 


                                $Count_Key=$Count_Key+1; 
                            }
                        }else{}

                }else{}
            exit("<script>window.location='../../?modules=picture_album';</script>");
        }elseif(($action=="edit")){

        
            $gallery_name=filter_input(INPUT_POST, 'gallery_name');
            $gallery_topic=filter_input(INPUT_POST, 'gallery_topic');
            $FolderName=filter_input(INPUT_POST, 'gallery_folder');
            $gallery_id=filter_input(INPUT_POST, 'gallery_id');
            $gallery_status=filter_input(INPUT_POST, 'gallery_status');

                if(isset($gallery_name,$gallery_topic)){

                    //gallery_thumbnail

                    if(($_FILES["gallery_thumbnail"]["name"]!=null)){

                        $copy_gallery=filter_input(INPUT_POST, 'copy_gallery');

                        $link_album="../../../uploads/gallery/".$FolderName."/".$copy_gallery;
                        $delete_album=unlink($link_album);

                        $gallery_thumbnail_nameNew=$image_date."_gl";
                        $gallery_thumbnail_name = $_FILES["gallery_thumbnail"]["name"];
                        $gallery_thumbnail_type = $_FILES["gallery_thumbnail"]["type"];

                        //new file Name
                        $imgFile = explode('.', $gallery_thumbnail_name);
                        $fileType = $imgFile[count($imgFile) - 1];
                        //new file Name end

                        $gallery_thumbnail_new_name = $gallery_thumbnail_nameNew.".".$fileType;
                        $gallery_thumbnail_tmp = $_FILES["gallery_thumbnail"]["tmp_name"];
                        $gallery_thumbnail_size = $_FILES["gallery_thumbnail"]["size"];

                        move_uploaded_file($gallery_thumbnail_tmp, '../../../uploads/gallery/'.$FolderName.'/'. $gallery_thumbnail_new_name);
                        //up image end

                    }else{
                        $gallery_thumbnail_new_name=null;
                    }

                    //gallery_thumbnail end

                    if(($gallery_thumbnail_new_name!=null)){

                        $gallery_Data = array("gallery_name"=>$gallery_name,
                                              "gallery_topic"=>$gallery_topic,
                                              "gallery_thumbnail"=>$gallery_thumbnail_new_name,
                                              "gallery_status"=>$gallery_status);
                        update("tb_gallery", $gallery_Data, "gallery_id = '{$gallery_id}'");
                        exit("<script>window.location='../../?modules=picture_album';</script>");
                    }else{

                        $gallery_Data = array("gallery_name"=>$gallery_name,
                                              "gallery_topic"=>$gallery_topic,
                                              "gallery_status"=>$gallery_status);
                        update("tb_gallery", $gallery_Data, "gallery_id = '{$gallery_id}'");
                        exit("<script>window.location='../../?modules=picture_album';</script>");
                    }

                }else{}

        }elseif(($action=="delete")){

            $picture_album_id=filter_input(INPUT_POST, 'picture_album_id');
            $gallery_folder=filter_input(INPUT_POST, 'gallery_folder');
            
            $gallery_sql = "SELECT `gallery_thumbnail` FROM `tb_gallery`  WHERE `gallery_id`='{$picture_album_id}'";
            $gallery_list = result_array($gallery_sql);
            foreach ($gallery_list as $key => $gallery_row) { 

                $link_album="../../../uploads/gallery/".$gallery_folder."/".$gallery_row["gallery_thumbnail"];
                $delete_album=unlink($link_album);

            }
           
            $picture_sql = "SELECT `picture_name` FROM `tb_picture`  WHERE `gallery_id`='{$picture_album_id}'";
            $picture_list = result_array($picture_sql);
            foreach ($picture_list as $key => $picture_row) { 

                $link_album="../../../uploads/gallery/".$gallery_folder."/".$picture_row["picture_name"];
                $delete_album=unlink($link_album);     

            }
           
           
            $link_album="../../../uploads/gallery/".$gallery_folder;
            $delete_album=rmdir($link_album);    


                if(($delete_album)){

                    $gallery_table = "tb_gallery";
                    $gallery_ff = "gallery_id";
                    delete($gallery_table, "{$gallery_ff} = '{$picture_album_id}'");

                    $picture_table = "tb_picture";
                    $picture_ff = "gallery_id";
                    delete($picture_table, "{$picture_ff} = '{$picture_album_id}'");

                    echo "no_error";

                }else{
                    echo "it_error";
                }

        }else{



        }

?>