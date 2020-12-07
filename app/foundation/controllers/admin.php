<?php
class admin extends controller{

    private $admin_model;

    ////////////////////////
    //password properties//
    //////////////////////
    private $force_special_chars = true;
    private $special_chars=['@','#','$','%','&','*','!','^'];
    // private $force_numbers = true;
    //////////////////////
    private $admin_roles = [
        '1' => 'dashboard',
        '2' => 'dashboard_2',
        '3' => 'dashboard_3'
    ];

    private static $log_out;


    public function __construct()
    {
        $this->admin_model = $this->model('m_Admin');
        if(authentication::is_admin()){
            if(self::$log_out == $_SESSION['loged_admin']['id']){
                unset($_SESSION['loged_admin']);
            }
        }
    }


    public function dashboard(){
        echo "dashboard";
        die();
    }


    public function restricted(){
        $this->view("admin/restricted");
        die();
    }


    public function redirect_admin($page=""){
        if($page != ""){
            header("location:".URLROOT."/admin/".$page);
            die();
        }
        $x = $_SESSION['loged_admin']['roles'][strlen($_SESSION['loged_admin']['roles'])-1];
        $page = $this->admin_roles[$x];
        header("location:".URLROOT."/admin/".$page);
        die();

    }


    public function validation($data,$destination){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $this->view('admin/'.$destination,['error'=>'email','message'=>'please enter a valid email','data'=>$data]);
            die();
        }
        if($destination != "edit_profile"){

            if(!empty($this->admin_model->find_email($_POST['email']))){
                $this->view('admin/'.$destination,['error'=>'email','message'=>'email alrady exists','data'=>$data,'roles_db'=>$data['roles_db']]);
                die();
            }
        }
        else{
            $x = $this->admin_model->find_email($_POST['email']);
            if(!empty($x) && $x['id'] != $_SESSION['loged_admin']['id']){
                $this->view('admin/'.$destination,['error'=>'email','message'=>'email alrady exists','data'=>$data,'roles_db'=>$data['roles_db']]);
                die();
            }
        }
        /////////////////////
        //password section//
        ///////////////////
        if($destination != 'edit_profile'){
            
            $this->filter_password($destination,$data);
        }

    }


    public function filter_password($destination,$data){
        if(strlen($_POST['password'])<9){
            $this->view('admin/'.$destination,['error'=>'password','message'=>'password must be at least 8 characters','data'=>$data,'roles_db'=>$data['roles_db']]);
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
                $this->view('admin/'.$destination,['error'=>'password','message'=>"password must must contain letters , numbers and at least one of the following symbols ['@','#','$','%','&','*','!','^']",'data'=>$data,'roles_db'=>$data['roles_db']]);
                die();
            }
        }
        if($_POST['password'] != $_POST['password_confirm']){
            $this->view('admin/'.$destination,['error'=>'password_confirm','message'=>"passwords dont match",'data'=>$data,'roles_db'=>$data['roles_db']]);
            die();
        }
    }


    public function create_admin(){
        authentication::auth_admin(['1']);
        $roles_db = $this->admin_model->get_roles();
        if(!isset($_POST['submit'])){
            $this->view('admin/create_admin',['roles_db'=>$roles_db]);
            die();
        }

        if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm'])){
            $this->view('admin/create_admin',['error'=>'all','message'=>'all feilds are required','roles_db'=>$roles_db]);
            die();
        }

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'roles_db' => $roles_db,
            'password' => $_POST['password'],
            'password_confirm' => $_POST['password_confirm']
        ];
        $roles = $_POST['roles'];
        $this->validation($data,'create_admin');

        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $roles = '0'.$roles;
        $this->admin_model->register_admin($data,$roles);
        redirect("admin/view_admins","admin {$data['first_name']} {$data['last_name']} added successfully");
        
    }


    public function register(){
        if($this->admin_model->get_admins_count() > 0){
            $this->view('admin/login');
            die();
        }
        if(authentication::is_admin()){
            $this->redirect_admin();
        }

        if(!isset($_POST['submit'])){
            $this->view('admin/register','');
            die();
        }

        if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm'])){
            $this->view('admin/register',['error'=>'all','message'=>'all feilds are required']);
            die();
        }

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'password_confirm' => $_POST['password_confirm']
        ];

        $this->validation($data,'register');

        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $this->admin_model->register_admin($data,'01');
        $this->login('',$data['email'],$_POST['password']);
    }


    public function login($url="",$email="",$pass=""){
        $data=[
            "url"=>$url,
            "email"=>$email,
            "password"=>$pass
        ];
        if(authentication::is_admin()){
            $this->redirect_admin();
        }
        if($email == "" && $pass == ""){
            if(!isset($_POST['submit'])){
                $this->view('admin/login',['data'=>$data]);
                die();
            }
            // if(($_POS['url_redirect'])){
                $data['url'] = htmlentities($_POST['url_redirect']); 
            // }
            if(empty($_POST['email']) || empty($_POST['password'])){
                $this->view('admin/login',['error'=>'all','message'=>'all feilds are required','data'=>$data]);
                die();
            }
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $this->view('admin/login',['error'=>'email','message'=>'please enter a valid email','data'=>$data]);
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
        $admin = $this->admin_model->find_email($email);
        if(empty($admin)){
            $this->view('admin/login',['error'=>'email','message'=>'email doesnt exists','data'=>$data]);
            die();
        }
        if(!password_verify($pass,$admin['password'])){
            $this->view('admin/login',['error'=>'password','message'=>'password and email dont match','data'=>$data]);
            die();
        }

        $_SESSION['loged_admin']=[
            'first_name' => $admin['first_name'],
            'last_name' => $admin['last_name'],
            'email' => $admin['email'],
            'id' => $admin['id'],
            'roles' => $admin['role']
        ];
        if($data['url'] == ""){

            $this->redirect_admin();
        }
        $data['url'] = str_replace('-_-','/',$data['url']) ;
        header("location:".URLROOT.'/'.$data['url']);
        die();
    }


    public function logout(){
        if(authentication::is_admin()){
            unset($_SESSION['loged_admin']);
            header("location:".URLROOT."/admin/login");
            die();
        }
    }


    public function reset_password($link = ""){

        if(isset($_POST['submit_email'])){
            $admin = $this->admin_model->find_email($_POST['email']);
            if(empty($admin)){
                $this->view('admin/confirm_email',['error'=>'email','message'=>'email doesnt exist']);
                die();
            }
            $link = uniqid($admin['id'],true);
            $link = URLROOT.'/admins/reset_password/'.$link;
            $this->admin_model->store_link($link,$admin['id']);

            $to = $_POST['email'];
            $subject = "Reset Password";
            $message = "
                <html>
                    <head>
                        <title>password resrt</title>
                    </head>
                    <body>
                        <h2> Hey {$admin['first_name']}</h2>
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
            $this->view('admin/confirm_email',['success'=>'all','message'=>'an email has been sent to your account check your inbox']);
            die();

        }

        $this->view('admin/confirm_email','');
        die();
    }


    public function change_password(){
        authentication::auth_admin();
        if(!isset($_POST['submit'])){
            $this->view('admin/change_password','');
            die();
        }
        $old_pass = htmlentities($_POST['old_password']);
        $pass = password_hash(htmlentities($_POST['password']),PASSWORD_DEFAULT);
        if(!$this->validate_password($old_pass)){
            $this->view('admin/change_password',['error'=>'old_password','message'=>'password incorrect']);
            die();
        }
        $this->filter_password('change_password','');
        $this->admin_model->update_password($_SESSION['loged_admin']['id'],$pass);
        header("location:".URLROOT.'/admin/edit_profile');
        die();
    }


    public function validate_password($pass,$password=""){
        if($password == ""){

            $password = $this->admin_model->find_admin($_SESSION['loged_admin']['id'])['password'];
        }
        if(password_verify($pass,$password)){
            return true;
        }
        return false;
    }


    public function edit_profile(){
        authentication::auth_admin();
        $data = $this->admin_model->find_admin($_SESSION['loged_admin']['id']);
        // $this->view("user/edit_profile",'',$data);
        if(!isset($_POST['submit'])){
            $this->view("admin/edit_profile",['data'=>$data]);
            die();
        }
        $this->validation($data,'edit_profile');
        if(!$this->validate_password(htmlentities($_POST['password']),$data['password'])){
            $this->view("admin/edit_profile",['error'=>'password','message'=>'password is incorrect','data'=>$data]);
            die();
        }
        $info=[
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email']
        ];
        $this->admin_model->update_profile($_SESSION['loged_admin']['id'],$info);
        $_SESSION['loged_admin']['first_name'] = $info['first_name'];
        $_SESSION['loged_admin']['last_name'] = $info['last_name'];
        $_SESSION['loged_admin']['email'] = $info['email'];
        $this->view("admin/edit_profile",['success'=>'all','message'=>'profile has been updated','info'=>$info]);
        die();       
    }


    public function view_admins(){
        authentication::auth_admin(['1']);
        $admins = $this->admin_model->get_admins();
        $this->view('admin/view_admins',['admins'=>$admins]);
        die();
    }


    public function view_admin($id){
        authentication::auth_admin();
        $admin = $this->admin_model->get_admin($id);
        $admin_role = $this->admin_model->get_admin_role($admin['role'][1]);
        $this->view('admin/view_admin',['admin'=>$admin,'admin_role'=>$admin_role]);
        die();
    }


    public function edit_role($id){
        authentication::auth_admin(['1']);
        $admin = $this->admin_model->get_admin($id);
        $admin_role = $this->admin_model->get_admin_role($admin['role'][1]);
        $roles_db = $this->admin_model->get_roles();
        $roles =[];
        foreach($roles_db as $role){
            $roles[$role['number']] = $role['title'];
        }
        if(!isset($_POST['submit'])){
            $this->view('admin/edit_role',['admin'=>$admin,'admin_role'=>$admin_role,'roles_db'=>$roles_db]);
            die();
        }
        $role = '0'.$_POST['role'];
        $this->admin_model->update_admin_roles($admin['id'],$role);
        self::$log_out = $admin['id'];
        redirect(["destination"=>"admin/view_admins","flash_message"=>"{$admin['first_name']} {$admin['last_name']} has been successfully converted to {$roles[$_POST['role']]}"]);
    }


    public function delete_admin($id){
        authentication::auth_admin(['1']);
        $this->admin_model->delete_admin($id);
        redirect(['destination'=>'admin/view_admins','flash_message'=>'admin has been deleted successfully']);
    }



}

?>