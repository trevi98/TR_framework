<?php
    class errors extends controller{


        public function forbidden(){
            $this->view('Errors/forbidden');
            die();
        }
    }

?>