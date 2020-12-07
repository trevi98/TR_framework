<?php 
    function output($var,$echo=true){
        if(!$echo){
            return htmlentities($var);
        }
        echo htmlentities($var);
    }

?>