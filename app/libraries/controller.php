<?php
  class controller {
    protected function model($model,$info=[]){
      if (file_exists("../app/foundation/models/{$model}.php")) {
        require_once("../app/foundation/models/{$model}.php");
        return new $model;
      }
    }
    protected function view($view,$data=[]){
      if (file_exists("../app/foundation/views/{$view}.php")) {
        require_once("../app/foundation/views/{$view}.php");
      }else{
        die("view doesnt exist");
      }
    }


    //////////////////////////////////////////////////////////////
    /////////////////////form controller/////////////////////////
    ////////////////////////////////////////////////////////////
    protected function validate_form($feilds,$view,$data=[]){
      $files = [];
      if(!isset($_POST['submit_form'])){
        $this->view($view,['data'=>$data]);
        die();
      }
      if(!isset($_POST['token']) || !isset($_SESSION['token']) || ($_POST['token'] != $_SESSION['token']) ){
        print_r($_SESSION);
        dd($_POST);
        redirect(['destination'=>'Errors/forbidden']);
      }
      unset($_SESSION['token']);
      $old_data = [];
      foreach($_POST as $key => $value){
        $old_data[$key] = $value;
      }
      foreach($feilds as $key => $value){
        // dd($value);
        foreach($value as $x => $y){
          if($y == "required"){
            $res = $this->required(['value'=>$_POST[$key],'name'=>$key]);
            if(!$res['return']){
              $this->view($view,['data'=>$data,'error'=>$res['error'],'message'=>$res['message'],'old_data'=>$old_data]);
            }
          }

          else if($y == "email"){
            $res = $this->email(['value'=>$_POST[$key],'name'=>$key]);
            if(!$res['return']){
              $this->view($view,['data'=>$data,'error'=>$res['error'],'message'=>$res['message'],'old_data'=>$old_data]);
            }
          }

          else if($x === "min"){
            $res = $this->min(['value'=>$_POST[$key],'name'=>$key],$y);
            if(!$res['return']){
              $this->view($view,['data'=>$data,'error'=>$res['error'],'message'=>$res['message'],'old_data'=>$old_data]);
            }
          }

          else if($x === "max"){
            $res = $this->max(['value'=>$_POST[$key],'name'=>$key],$y);
            if(!$res['return']){
              $this->view($view,['data'=>$data,'error'=>$res['error'],'message'=>$res['message'],'old_data'=>$old_data]);
              die();
            }
          }

          else if($x === "contains"){
            $res = $this->contains(['value'=>$_POST[$key],'name'=>$key],$y);
            if(!$res['return']){
              $this->view($view,['data'=>$data,'error'=>$res['error'],'message'=>$res['message'],'old_data'=>$old_data]);
              die();
            }
          }

          else if($x === "contains_all"){
            $res = $this->contains_all(['value'=>$_POST[$key],'name'=>$key],$y);
            if(!$res['return']){
              $this->view($view,['data'=>$data,'error'=>$res['error'],'message'=>$res['message'],'old_data'=>$old_data]);
              die();
            }
          }

          else if($x === "file"){
            $res = $this->file_filter($key,$y);
            if(!$res['return']){
              $this->view($view,['data'=>$data,'error'=>$res['error'],'message'=>$res['message'],'old_data'=>$old_data]);
              die();
            }
            // print_r($res['file']);
            $files[count($files)] = $res['file'];
          }

          else if($x === "files"){
            $res = $this->multiple_file_filter($key,$y);
            if(!$res['return']){
              $this->view($view,['data'=>$data,'error'=>$res['error'],'message'=>$res['message'],'old_data'=>$old_data]);
              die();
            }
            // print_r($res['file']);
            $files[count($files)] = $res['file'];
          }

        }
      }
      return $files;
    }


    private function required($feild){
      if(empty($feild['value']) || $feild['value'] == ""){
        return ['return'=>false,'message'=>"this feild is required",'error'=>"{$feild['name']}"];
      }
      return ['return'=>true];
    }


    private function min($feild,$min){
      // dd($min);
      if(is_string($feild['value'])){
        if(strlen($feild['value']) >= $min){
            return['return'=>true];
        }
        return ['return'=>false,'message'=>"{$feild['name']} should be at least {$min} charectars long",'error'=>"{$feild['name']}"];

    }
    $count = 0;
    while($feild['value'] >= 1){
        $feild['value'] /= 10;
        $count++;
    }
    if($count >= $min){
        return ['return'=>true];
    }
    return ['return'=>false,'message'=>"{$feild['name']} should not exceed {$min} digits long",'error'=>"{$feild['name']}"];
    }


    private function max($feild,$max){
      // dd($min);
      if(is_string($feild['value'])){
        if(strlen($feild['value']) <= $max){
            return['return'=>true];
        }
        return ['return'=>false,'message'=>"{$feild['name']} should not exceed {$max} charectars long",'error'=>"{$feild['name']}"];

    }
    $count = 0;
    while($feild['value'] >= 1){
        $feild['value'] /= 10;
        $count++;
    }
    if($count <= $max){
        return ['return'=>true];
    }
    return ['return'=>false,'message'=>"{$feild['name']} should not exceed {$max} digits long",'error'=>"{$feild['name']}"];
    }


    private function contains($feild,$args){
      $b = false;
      $str = "";
      $count = 0;
      foreach($args as $arg){
        if(strpos($feild['value'],$arg) === 0 || strpos($feild['value'],$arg)){
          $b = true;
        }
        $str .= $arg;
        if($count >= count($args)-1){
          continue;
        }
        $str .= ", ";
      }
      if($b){
        return ['return'=>true];
      }
      return ['return'=>false,'message'=>"{$feild['name']} should contain at least one of the following [{$str}]",'error'=>"{$feild['name']}"];
    }

    private function contains_all($feild,$args){
      $b = 0;
      $str = "";
      $count = 0;
      foreach($args as $arg){
        if(strpos($feild['value'],$arg) === 0 || strpos($feild['value'],$arg)){
          $b ++;
        }
        $str .= $arg;
        if($count >= count($args)-1){
          continue;
        }
        $str .= ", ";
      }
      if($b == count($args)){
        return ['return'=>true];
      }
      return ['return'=>false,'message'=>"{$feild['name']} should contain all of the following [{$str}]",'error'=>"{$feild['name']}"];
    }


    private function email($feild){
      if(filter_var($feild['value'],FILTER_VALIDATE_EMAIL)){
        return ['return'=>true];
      }
      return ['return'=>false,'message'=>" please enter a vaild email",'error'=>"{$feild['name']}"];
    }


    private function file_filter($name,$feild){
      
      // dd($_FILES);
      if(empty($_FILES[$name]['name'])){
        return ['return'=>true,'file'=>['name'=>'','dir'=>'','full_dir'=>'']];

      }
      $target_dir = "uploads/".$feild['destination'];
      $uploadOk = 1;
      $x = explode('.',$_FILES[$name]['name']);
      $extension = strtolower($x[count($x)-1]);
      // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $new_name = uniqid(rand(1,100),true).'.'.$extension;
      $target_file = $target_dir . $new_name;
     
      if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) 
      {
        //echo "The file ". $new_name. " has been uploaded.";
        return ['return'=>true,'file'=>['name'=>$name,'dir'=>$new_name,'full_dir'=>$target_file]];
      } 
      return ['return'=>false,'message'=>" there was a problem uploading the file",'error'=>"{$name}"];

    }


    private function multiple_file_filter($name,$feild){
      if(empty($_FILES[$name]['name'])){
        return ['return'=>true,'file'=>['name'=>'','dir'=>'','full_dir'=>'']];

      }
      $files = [];
        for($i=0; $i<count($_FILES[$name]["name"]);$i++){

            $x = explode('.',$_FILES[$name]['name'][$i]);
            $extension = strtolower($x[count($x)-1]);
            $target_dir = "uploads/".$feild['destination'];
            $new_name = uniqid(rand(1,100),true).'.'.$extension;
            $target_file = $target_dir . $new_name;
            if (move_uploaded_file($_FILES[$name]["tmp_name"][$i], $target_file)) {
    
                $files[count($files)] = ['dir'=>$new_name,'full_dir'=>$target_file];
              }
        }
      return ['return'=>true,'file'=>['name'=>$name,$files]];
    }



    //////////////////////////////////////
    //////////// html form //////////////
    ////////////////////////////////////

    public function open_form($args,$feilds,$data){
      if(isset($_SESSION['token'])){
        unset($_SESSION['token']);
      }
      $token = password_hash(uniqid(rand(0,1000),true),PASSWORD_DEFAULT);
      $_SESSION['token'] = $token;
      echo $token."<br>".$_SESSION['token'];
      $file = "";
      if(!isset($args['class'])){$args['class'] = "";}
      if(!isset($args['id'])){$args['id'] = "";}
      if(!isset($args['file'])){$args['file'] = "";}
            if($args['file'] == true){
              $file = "enctype='multipart/form-data'";
            }
      echo "
        <form action='".URLROOT."/{$args['action']}' method='{$args['method']}'class='{$args['class']}' id='{$args['id']}' {$file} >
        <input name='token' type='text' value='{$token}' hidden>
      ";
      $returns = [];
      foreach($feilds as $feild){
        if($feild['type'] == "textarea"){
        $returns[$feild['name']] = $this->text_area($feild,$data);
        continue;
        }
        else if($feild['type'] == 'select'){
          $returns[$feild['name']] = $this->select($feild,$data);
          continue;
        }
        $returns[$feild['name']] = $this->input($feild,$data);
        // print_r ([$value['name']]);
      }

      return $returns;
    }


    public function close_form(){
      echo "
        </form>
      ";
    }


    public function input($args,$data){
      $val = "";
      $extra = "";
      if(!isset($args['class'])){$args['class'] = "";}
      if(!isset($args['id'])){$args['id'] = "";}
      if(!isset($args['extra'])){$args['extra'] = "";}
      if(!empty($data['data']) && isset($data['data'][$args['name']])){

        $val = $data['data'][$args['name']];
      } 
      else if(!empty($data['old_data']) && isset($data['old_data'][$args['name']])){

        $val = $data['old_data'][$args['name']] ; 
      }
      if(isset($args['extra'])){

        $extra = $args['extra'];
      }
      $result =  "
        <input type='{$args['type']}' 
          name='{$args['name']}' 
          class='{$args['class']}' 
          id='{$args['id']}' 
          value='{$val}' {$extra} >
      ";

      if(isset($data['error']) && $data['error'] == $args['name']) {
        $result .= "
          <span class='error'>
            {$data['message']}
          </span>
        
        ";
      }
      return $result;
    }


    public function select($args,$data){
      $val = "";
      $extra = "";
      if(!isset($args['class'])){$args['class'] = "";}
      if(!isset($args['id'])){$args['id'] = "";}
      if(!isset($args['extra'])){$args['extra'] = "";}
      if(!empty($data['data']) && isset($data['data'][$args['name']])){

        $val = $data['data'][$args['name']];
      } 
      else if(!empty($data['old_data']) && isset($data['old_data'][$args['name']])){

        $val = $data['old_data'][$args['name']] ; 
      }
      if(isset($args['extra'])){

        $extra = $args['extra'];
      }
      $result =  "
        <select name='{$args['name']}'
          class='{$args['class']}' 
          id='{$args['id']}'>
       
      ";
      foreach($args['options'] as $key => $value){
        if($val == $key){
        $result .= "<option value='{$key}' selected>{$value}</option>";

        }
        else{

          $result .= "<option value={$key}>{$value}</option>";
        }
      }
      $result .= "</select>";

      if(isset($data['error']) && $data['error'] == $args['name']) {
        $result .= "
          <span class='error'>
            {$data['message']}
          </span>
        
        ";
      }
      return $result;
    }


    public function text_area($args,$data){
      $val = "";
      $extra = "";
      if(!isset($args['class'])){$args['class'] = "";}
      if(!isset($args['id'])){$args['id'] = "";}
      if(!isset($args['extra'])){$args['extra'] = "";}
      if(!empty($data['data']) && isset($data['data'][$args['name']])){

        $val = $data['data'][$args['name']];
      } 
      else if(!empty($data['old_data']) && isset($data['old_data'][$args['name']])){

        $val = $data['old_data'][$args['name']] ; 
      }
      if(isset($args['extra'])){

        $extra = $args['extra'];
      }
      $result =  "
        <textarea  
          name='{$args['name']}' 
          class='{$args['class']}' 
          id='{$args['id']}' 
           {$extra} >{$val}</textarea>
      ";

      if(isset($data['error']) && $data['error'] == $args['name']) {
        $result .= "
          <span class='error'>
            {$data['message']}
          </span>
        
        ";
      }
      return $result;
    }




  }
 ?>
