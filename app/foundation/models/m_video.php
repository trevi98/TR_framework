<?php

    class m_video{
        private $db;

        public function __construct()
        {
            $this->db=new database();
        }


        public function add_topic($topic){
            $sql = "main_topics (title) values (:title)";
            $array = [
                ':title' => $topic
            ];
            $this->db->insert($sql,$array);
        }


        public function get_topics(){
            $sql = "main_topics";
            return $this->db->select($sql);
        }


        public function delete_topic($id){
            $sql = "main_topics where id=:id";
            $array = [
                ":id" => $id
            ];
            $this->db->delete($sql,$array);
        }


        public function add_video($info){
            $sql = "videos (title,decision,explanation,link,year) values (:title,:decision,:explanation,:link,:year)";
            $array = [
                ":title" => $info['title'],
                ":decision" => $info['decision'],
                ":explanation" => $info['explenation'],
                ":link" => $info['link'],
                ":year" => $info['year']
            ];
            // dd($array);
            $this->db->insert($sql,$array);
        }


        public function get_video_by_id($id){
            $sql = "videos where id=:id";
            $array = [
                ":id" => $id
            ];
            return $this->db->select($sql,$array,0);
        }


        public function update_video($info){
            $table = "videos";
            $sql = "title=:title,decision=:decision,explanation=:explanation,link=:link where id=:id";
            $array = [
                ":title" => $info['title'],
                ":decision" => $info['decision'],
                ":explanation" => $info['explenation'],
                ":link" => $info['link'],
                ":id" => $info['id']
            ];
            $this->db->update($table,$sql,$array);
        }


        public function delete_video($id){
            $sql = "videos where id=:id";
            $array = [
                ":id" => $id
            ];
            $this->db->delete($sql,$array);
        }


    }

?>