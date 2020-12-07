<?php

class m_Admin{

    private $db;

    public function __construct()
    {
        $this->db=new database();
    }


    public function get_admins_count(){
        $x = "count(email)";
        $sql = "admin";
        return $this->db->select_spechial($x,$sql)[0]['count(email)'];
    }


    public function find_email($email){
        $sql = "admin where email = :email";
        $array = [
            ':email' => $email
        ];
        return $this->db->select($sql,$array,0);
    }


    public function find_admin($id){
        $sql = "admin where id = :id";
        $array = [
            ':id' => $id
        ];
        return $this->db->select($sql,$array,0);
    }


    public function register_admin($data,$role){
        $sql = "admin (first_name,last_name,email,password,role) values (:first_name,:last_name,:email,:password,:role)";
        $array=[
            ":first_name" => $data['first_name'],
            ":last_name" => $data['last_name'],
            ":email" => $data['email'],
            ":password" => $data['password'],
            ":role" => $role
        ];
        $this->db->insert($sql,$array);
    }


    public function update_profile($id,$data){
        $table = "admin";
        $sql = "first_name = :first_name, last_name = :last_name, email = :email where id=:id";
        $array = [
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':email' => $data['email'],
            'id' => $id
        ];
        $this->db->update($table,$sql,$array);
    }

    public function update_password($id,$pass){
        $table = "admin";
        $sql = "password = :password where id=:id";
        $array = [
            ":password" => $pass,
            ":id" => $id
        ];
        $this->db->update($table,$sql,$array);
    }


    public function store_link($link,$id){
        $sql = "password_reset_admin (code,admin_id) values (:code,:admin_id)";
        $array = [
            ':code' => $link,
            ':admin_id' => $id
        ];
        $this->db->insert($sql,$array);
    }


    public function get_roles(){
        $sql = "roles";
        return $this->db->select($sql);
    }


    public function get_admins(){
        $sql = "admin";
        return $this->db->select($sql);
    }


    public function get_admin($id){
        $sql = "admin where id = :id";
        $array = [
            ':id' => $id
        ];
        return $this->db->select($sql,$array,0);
    }


    public function get_admin_role($number){
        $sql = "roles where number = :number";
        $array = [
            ':number' => $number
        ];
        return $this->db->select($sql,$array,0);
    }


    public function update_admin_roles($id,$role){
        $table = "admin";
        $sql = "role = :role where id = :id";
        $array = [
            ":role" => $role,
            ":id" => $id
        ];
        $this->db->update($table,$sql,$array);
    }


    public function delete_admin($id){
        $sql = "admin where id = :id";
        $array = [
            ':id' => $id
        ];
        $this->db->delete($sql,$array);
    }


    

}

?>