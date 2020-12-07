<?php
    class test extends controller{




        public function test(){
           
            $feilds = [
                "name" => ['required'],
                "email" => ['required'],
                "number" => ['required'],
                "img" => ['file'=>['destination'=>'']],
                "img2" => ['file'=>['destination'=>'']],
                "imgs" => ['files'=>['destination'=>'']],
            ];
            $files = $this->validate_form($feilds,'test/form');
            dd($files);
        }
    }
?>