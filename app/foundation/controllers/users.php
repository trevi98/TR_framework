<?php
class users extends controller
{

    private $user_model;

    ////////////////////////
    //password properties//
    //////////////////////
    private $force_special_chars = true;
    private $special_chars=['@','#','$','%','&','*','!','^'];
    // private $force_numbers = true;
    //////////////////////

    public function __construct(){
        $this->user_model = $this->model('m_Users');
    }


    // public  static function is_loged_in(){
    //     if(!isset($_SESSION['loged_user'])){
    //         return false;
    //     }
    //     return true;
    // }



    public function validation($data,$destination){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $this->view('user/'.$destination,['error'=>'email','message'=>'please enter a valid email','data'=>$data]);
            die();
        }
        if($destination != "edit_profile"){

            if(!empty($this->user_model->find_email($_POST['email']))){
                $this->view('user/'.$destination,['error'=>'email','message'=>'email alrady exists','data'=>$data]);
                die();
            }
        }
        else{
            $x = $this->user_model->find_email($_POST['email']);
            if(!empty($x) && $x['id'] != $_SESSION['loged_user']['id']){
                $this->view('user/'.$destination,['error'=>'email','message'=>'email alrady exists','data'=>$data]);
                die();
            }
        }
        /////////////////////
        //password section//
        ///////////////////
        if($destination != 'edit_profile'){
            
            $this->filter_password($destination,$data);
        }
        //////////////////
        //phone section//
        /////////////////

        if(strlen($_POST['phone']) != 9){
            $this->view('user/'.$destination,['error'=>'phone','message'=>'phone number must consists of 9 digits','data'=>$data]);
            die();
        }

    }



    public function filter_password($destination,$data){
        if(strlen($_POST['password'])<9){
            $this->view('user/'.$destination,['error'=>'password','message'=>'password must be at least 8 characters','data'=>$data]);
            die();
        }

        if($this->force_special_chars){
            $b = true;
            foreach($this->special_chars as $char){

                if(strpos($_POST['password'],$char)){
                    $b = false;
                }
            }
            $d = true;
            foreach(['1','2','3','4','5','6','7','8','9','0'] as $number){

                if(strpos($_POST['password'],$number)){
                    $d = false;
                }
                
            }
            if($b || $d){
                $this->view('user/'.$destination,['error'=>'password','message'=>"password must must contain letters , numbers and at least one of the following symbols ['@','#','$','%','&','*','!','^']"],$data);
                die();
            }
        }
        if($_POST['password'] != $_POST['password_confirm']){
            $this->view('user/'.$destination,['error'=>'password_confirm','message'=>"passwords dont match",'data'=>$data]);
            die();
        }
    }



    public function register(){
        if(authentication::is_loged_in()){
            header("location:".URLROOT."/homepage");
            die();
        }

        if(!isset($_POST['submit'])){
            $this->view('user/register','');
            die();
        }

        if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['password']) || empty($_POST['password_confirm'])){
            $this->view('user/register',['error'=>'all','message'=>'all feilds are required']);
            die();
        }

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'phone' => $_POST['phone'],
            'country_code' => $_POST['country_code'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'password_confirm' => $_POST['password_confirm']
        ];

        $this->validation($data,'register');

        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $this->user_model->register_user($data);
        $this->login('',$data['email'],$_POST['password']);
    }



    public function login($url="",$email="",$pass=""){
        $data=[
            "url"=>$url,
            "email"=>$email,
            "password"=>$pass
        ];
        if(authentication::is_loged_in()){
            header("location:".URLROOT."/homepage");
            die();
        }
        if($email == "" && $pass == ""){
            if(!isset($_POST['submit'])){
                $this->view('user/login',['data'=>$data]);
                die();
            }
            // if(($_POS['url_redirect'])){
                $data['url'] = htmlentities($_POST['url_redirect']); 
            // }
            if(empty($_POST['email']) || empty($_POST['password'])){
                $this->view('user/login',['error'=>'all','message'=>'all feilds are required','data'=>$data]);
                die();
            }
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $this->view('user/login',['error'=>'email','message'=>'please enter a valid email','data'=>$data]);
                die();
            }
            $email = htmlentities($_POST['email']);
            $pass = htmlentities($_POST['password']);
        }
        // $data = [
        //     'email' => $email,
        //     '$password' => $pass
        // ];
        $data['email'] = $email;
        $data['password'] = $pass;
        $user = $this->user_model->find_email($email);
        if(empty($user)){
            $this->view('user/login',['error'=>'email','message'=>'email doesnt exists','data'=>$data]);
            die();
        }
        if(!password_verify($pass,$user['password'])){
            $this->view('user/login',['error'=>'password','message'=>'password and email dont match','data'=>$data]);
            die();
        }

        $_SESSION['loged_user']=[
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'country' => $user['country'],
            'phone' => $user['phone'],
            'email' => $user['email'],
            'id' => $user['id']
        ];
        if($data['url'] == ""){

            header("location:".URLROOT."/homepage");
            die();
        }
        $data['url'] = str_replace('-_-','/',$data['url']) ;
        header("location:".URLROOT.'/'.$data['url']);
        die();
    }



    public function logout(){
        if(authentication::is_loged_in()){
            unset($_SESSION['loged_user']);
            header("location:".URLROOT."/homepage");
            die();
        }
    }



    public function edit_profile(){
        authentication::auth();
        $data = $this->user_model->find_user($_SESSION['loged_user']['id']);
        // $this->view("user/edit_profile",'',$data);
        if(!isset($_POST['submit'])){
            $this->view("user/edit_profile",['data'=>$data]);
            die();
        }
        $this->validation($data,'edit_profile');
        if(!$this->validate_password(htmlentities($_POST['password']),$data['password'])){
            $this->view("user/edit_profile",['error'=>'password','message'=>'password is incorrect','data'=>$data]);
            die();
        }
        $info=[
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'country' => $_POST['country'],
            'phone' => $_POST['phone']
        ];
        $this->user_model->update_profile($_SESSION['loged_user']['id'],$info);
        $_SESSION['loged_user']['first_name'] = $info['first_name'];
        $_SESSION['loged_user']['last_name'] = $info['last_name'];
        $_SESSION['loged_user']['country'] = $info['country'];
        $_SESSION['loged_user']['phone'] = $info['phone'];
        $_SESSION['loged_user']['email'] = $info['email'];
        $this->view("user/edit_profile",['success'=>'all','message'=>'profile has been updated','data'=>$info]);
        die();       
    }



    public function change_password(){
        authentication::auth();
        if(!isset($_POST['submit'])){
            $this->view('user/change_password','');
            die();
        }
        $old_pass = htmlentities($_POST['old_password']);
        $pass = password_hash(htmlentities($_POST['password']),PASSWORD_DEFAULT);
        if(!$this->validate_password($old_pass)){
            $this->view('user/change_password',['error'=>'old_password','message'=>'password incorrect']);
            die();
        }
        $this->filter_password('change_password','');
        $this->user_model->update_password($_SESSION['loged_user']['id'],$pass);
        header("location:".URLROOT.'/users/edit_profile');
        die();
    }



    public function reset_password($link = ""){

        if(isset($_POST['submit_email'])){
            $user = $this->user_model->find_email($_POST['email']);
            if(empty($user)){
                $this->view('user/confirm_email',['error'=>'email','message'=>'email doesnt exist']);
                die();
            }
            $link = uniqid($user['id'],true);
            $link = URLROOT.'/users/reset_password/'.$link;
            $this->user_model->store_link($link,$user['id']);

            $to = $_POST['email'];
            $subject = "Reset Password";
            $message = "
                <html>
                    <head>
                        <title>password resrt</title>
                    </head>
                    <body>
                        <h2> Hey {$user['first_name']}</h2>
                        <p>
                            click the following link to reset your password
                            <br>
                            <a href='{$link}'>{$link}</a>
                        </p>
                        <h5>".SITENAME."</h5>
                    </body>
                </html>
            ";
            $headers = "From: ".EMAIL."\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            mail($to,$subject,$message,$headers);
            $this->view('user/confirm_email',['success'=>'all','message'=>'an email has been sent to your account check your inbox']);
            die();

        }

        $this->view('user/confirm_email','');
        die();
    }



    // public static function auth(){
    //     if (isset($_GET['url'])) {
    //         $url=filter_var(rtrim($_GET['url'],'/'));
    //         $url =str_replace('/','-_-',$url) ;
    //         if(!self::is_loged_in()){
    //             header("location:".URLROOT.'/users/login/'.$url);

    //         }
    //     }
    // }



    public function validate_password($pass,$password=""){
        if($password == ""){

            $password = $this->user_model->find_user($_SESSION['loged_user']['id'])['password'];
        }
        if(password_verify($pass,$password)){
            return true;
        }
        return false;
    }


}
?>
