<?php
function redirect($vars = [],$echo=false){
    if(!$echo){

        if(isset($vars['flash_message'])){
    
            $_SESSION['flash_message'] = $vars['flash_message'];
        }
        if(isset($vars['args'])){
            $x = "";
            foreach($vars['args'] as $arg){
                 $x .= $arg.'/';
            }
            $vars['destination'] .= '/'.$x;
        }
        if(isset($vars['echo']) && $vars['echo']){
    
            echo URLROOT."/".$vars['destination'];
            return;
        }
        header("location:".URLROOT."/".$vars['destination']);
        die();
    }
    if(isset($vars['flash_message'])){
    
        $_SESSION['flash_message'] = $vars['flash_message'];
    }
    if(isset($vars['args'])){
        $x = "";
        foreach($vars['args'] as $arg){
             $x .= $arg.'/';
        }
        $vars['destination'] .= '/'.$x;
    }
    if(isset($vars['echo']) && $vars['echo']){

        echo URLROOT."/".$vars['destination'];
        return;
    }
    echo URLROOT."/".$vars['destination'];
    // die();

}



function asset($destination,$echo=true){
    // explode(dirname(__FILE__))
    $dir = URLROOT;
    $dir .= "/public/{$destination}";
    if(!$echo){
        return $dir;
    }
    echo $dir;
}



function main(){
    if(isset($_SESSION['flash_message'])){
        echo "
            <script>
                alert('{$_SESSION['flash_message']}');
            </script>
        ";
        unset($_SESSION['flash_message']);
    }
    // asset("dd");
}


main();

?>