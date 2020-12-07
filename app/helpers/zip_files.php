<?php
function create_zip_file($images=[]){
  if(file_exists("../public/zips/vehicle_images.zip")){
    unlink("../public/zips/vehicle_images.zip");
  }

    $zip = new ZIPARCHIVE;
    if ($zip->open('../public/zips/vehicle_images.zip',file_exists("../public/zips/vehicles.zip") ? ZIPARCHIVE::OVERWRITE :  ZIPARCHIVE::CREATE) === TRUE)
    {
      foreach($images as $key => $value){
        // echo $value;
        $img=str_replace("/public/uploads/","../public/uploads/",$value);
        $name=str_replace("../public/uploads/","",$img);
        $zip->addFile($img,$name);
      }
       $zip->close();
    }
  }
  ?>