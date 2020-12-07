<?php

class m_Users{
    private $db;

    public function __construct()
    {
        $this->db=new database();
    }

    public function find_email($email){
        $sql = "users where email = :email";
        $array = [
            ':email' => $email
        ];
        return $this->db->select($sql,$array,0);
    }


    public function find_user($id){
        $sql = "users where id = :id";
        $array = [
            ':id' => $id
        ];
        return $this->db->select($sql,$array,0);
    }


    // public function find_password($email){
    //     $sql = "users where email = :email";
    //     $array = [
    //         ':email' => $email
    //     ];
    //     return $this->db->select($sql,$array,0);
    // }


    public function register_user($data){
        $sql = "users (first_name,last_name,email,password,country,phone) values (:first_name,:last_name,:email,:password,:country,:phone)";
        $array=[
            ":first_name" => $data['first_name'],
            ":last_name" => $data['last_name'],
            ":email" => $data['email'],
            ":password" => $data['password'],
            ":country" => $data['country_code'],
            ":phone" => $data['phone']
        ];
        $this->db->insert($sql,$array);
    }


    public function update_profile($id,$data){
        $table = "users";
        $sql = "first_name = :first_name, last_name = :last_name, email = :email, country = :country, phone = :phone where id=:id";
        $array = [
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':email' => $data['email'],
            ':country' => $data['country'],
            ':phone' => $data['phone'],
            'id' => $id
        ];
        $this->db->update($table,$sql,$array);
    }

    public function update_password($id,$pass){
        $table = "users";
        $sql = "password = :password where id=:id";
        $array = [
            ":password" => $pass,
            ":id" => $id
        ];
        $this->db->update($table,$sql,$array);
    }


    public function store_link($link,$id){
        $sql = "password_reset (code,user_id) values (:code,:user_id)";
        $array = [
            ':code' => $link,
            ':user_id' => $id
        ];
        $this->db->insert($sql,$array);
    }
}

?>