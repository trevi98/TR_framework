<?php
class homepage extends controller
{
    public function __construct(){
        echo"dd";
    }
    public function index(){
        echo "hi";
    }


    public function test(){
        authentication::auth();
        echo "tested";
    }
}
?>
