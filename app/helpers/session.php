<?php
  SESSION_START();
  function is_logged_in(){
    if (isset($_SESSION['logged_in'])) {
      return true;
    }
  }


 ?>
