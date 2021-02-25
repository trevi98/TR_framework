<?php

    class admin_extended extends controller{
        private $video_model;

        public function __construct(){
            $this->video_model = $this->model('m_video');
        }


        public function create_topic(){
            authentication::auth_admin(['1']);
            $feilds = [
                "title" => ['required']
            ];
            $this->validate_form($feilds,'admin_extended/create_topic');
            $this->video_model->add_topic($_POST['title']);
            redirect(['destination'=>'admin_extended/view_topics','flash_message'=>output($_POST['title'],false)." has been added to main topics"]);
        }


        public function view_topics(){
            $topics = $this->video_model->get_topics();
            $this->view('admin_extended/view_topics',$topics);
            die();
        }


        public function delete_topic($id){
            $this->video_model->delete_topic($id);
            redirect(['destination'=>'admin_extended/view_topics','flash_message'=>"topic has been deleted"]);
        }


        public function create_video(){
            authentication::auth_admin(['1']);
            $feilds = [
                "title" => ['required'],
                "decision" => [''],
                "explenation" => [''],
                "link" => [''],
                "video" => ['file'=>['destination'=>'vids/']]

            ];

            $files = $this->validate_form($feilds,'admin_extended/create_video');
            $link = $_POST['link'];
            if($link != ""){
                $link = str_replace("dl=0","raw=1",$link);
            }
            // dd($files);
            if(!empty($files[0]['name'])){
                $link = $files[0]['full_dir'];
            }
            $this->video_model->add_video([
                "title" => $_POST['title'],
                "decision" => $_POST['decision'],
                "explenation" => $_POST['explenation'],
                "link" => $link,
                "year" => date("Y")
            ]);
            redirect(['destination'=>'admin/dashboard','flash_message'=>"{$_POST['title']} has been uploaded "]);

        }


        public function edit_video($id){
            authentication::auth_admin(['1']);
            $data = $this->video_model->get_video_by_id($id);
            $feilds = [
                "title" => ['required'],
                "decision" => [''],
                "explenation" => [''],
                "link" => [''],
                "video" => ['file'=>['destination'=>'vids/']]

            ];

            $files = $this->validate_form($feilds,'admin_extended/edit_video',$data);
            $link = $_POST['link'];
            if($link != ""){
                $link = str_replace("dl=0","raw=1",$link);
            }
            // dd($files);
            if(!empty($files[0]['name'])){
                $link = $files[0]['full_dir'];
            }
            $this->video_model->update_video([
                "title" => $_POST['title'],
                "decision" => $_POST['decision'],
                "explenation" => $_POST['explenation'],
                "link" => $link,
                "year" => date("Y"),
                "id" => $id
            ]);
            redirect(['destination'=>'admin/dashboard','flash_message'=>"{$_POST['title']} has been updated "]);
        }


        public function delete_video($id){
            authentication::auth_admin(['1']);
            $this->video_model->delete_video($id);
            redirect(['destination'=>'admin/dashboard','flash_message'=>"video has been updated "]);
        }

    }

?>