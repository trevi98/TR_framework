<?php
  require_once('config/config.php');
  require_once('helpers/session.php');
  /////////////////////////////////////////
  // require_once('helpers/zip_files.php');
  /////////////////////////////////////////
  require_once('helpers/redirect.php');
  require_once('helpers/functions.php');
  // Autoload Core Libraries
spl_autoload_register(function($className){
  require_once 'libraries/' . $className . '.php';
});
function get_ms($str){
  return str_replace("001","م",$str);
}
function error_pretty($x){
  $y=strpos($x,'#');
  $y++;
  return (substr($x,$y));
}

function handel_database_customise_error($error){
  $error=error_pretty($error);
  header("location: ".URLROOT."/$error");
  die();
}



//this function can be used with dates when being inserted or viewed from databese 
//since dates can be hard to work with in the database manegment system (sorted,etc...)
//we can use this function to insert the date as a number to the databse 
//and when retreaving it we can tranforme it back into dates format
//by date format I mean a string that lookes like a date ex:("1998/5/28")
// when type is true (by default it is true) it transormes dates to numbers
function convert_between_numbers_and_dates($number,$type=true){
  if($type){

  }





}

//////////////////////////////////////////
//////////////////////////////////////////
function dd($random_variable_123){
  $x = var_export($random_variable_123,true);
  echo "<pre>".$x."</pre>";
  die();

}
 ?>
