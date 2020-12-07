<?php
class core{
  private $class_controller="homepage";
  private $method_controller='index';
  private $data=[];
  private function get_url(){
    $url=explode('/',filter_var(rtrim($_GET['url'],'/')));

    return $url;
  }
  public function __construct(){
    if (isset($_GET['url'])) {
      $url=$this->get_url();
      if (file_exists("../app/foundation/controllers/{$url[0]}.php")) {
        $this->class_controller=$url[0];
        unset($url[0]);
      }
    }

    
    require_once("../app/foundation/controllers/{$this->class_controller}.php");
    $this->class_controller=new $this->class_controller;
    if (isset($url[1])) {
      if (method_exists($this->class_controller,$url[1])) {
        $this->method_controller=$url[1];
        unset($url[1]);
         $this->data = $url ? array_values($url) : [];
      }
    }
    call_user_func_array([$this->class_controller,$this->method_controller],$this->data);

  }
}
 ?>
