<?php 
    class authentication{



        public  static function is_loged_in(){
            if(!isset($_SESSION['loged_user'])){
                return false;
            }
            return true;
        }

        public static function auth(){
            if (isset($_GET['url'])) {
                $url=filter_var(rtrim($_GET['url'],'/'));
                $url =str_replace('/','-_-',$url) ;
                if(!self::is_loged_in()){
                    header("location:".URLROOT.'/users/login/'.$url);
                    die();
                }
            }
        }

        public static function is_admin($roles = []){
            if(!isset($_SESSION['loged_admin'])){
                return false;
            }
            if(!empty($roles)){
                $b = false;
                foreach($roles as $role){
                    if(strpos($_SESSION['loged_admin']['roles'],$role)){
                        $b = true;
                    }
                }
               return $b;
        }
        return true;
    }

        public static function auth_admin($roles = []){
            if (isset($_GET['url'])) {
                $url=filter_var(rtrim($_GET['url'],'/'));
                $url =str_replace('/','-_-',$url) ;
                if(!self::is_admin()){
                    header("location:".URLROOT.'/admin/login/'.$url);
                    die();
                }
            }
            if(!empty($roles)){
                $b = false;
                foreach($roles as $role){
                    if(strpos($_SESSION['loged_admin']['roles'],$role)){
                        $b = true;
                    }
                }
                if(!$b){
                    header("location:".URLROOT.'/admin/restricted');
                    die();
                }
            }
        }
       
    }


?>