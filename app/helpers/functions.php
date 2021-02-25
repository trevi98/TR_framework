<?php 
    function output($var,$echo=true){
        if(!$echo){
            return htmlentities($var);
        }
        echo htmlentities($var);
    }

    function make_select_array($array,$key,$value){
        $result = [];
        foreach($array as $item){
            $result[$item[$key]] = $item[$value];
        }
        return $result;
    }

?>