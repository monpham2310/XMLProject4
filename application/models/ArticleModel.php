<?php
    class ArticleModel extends CI_Model{
        
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }
        
        public function insert($data){
            $checkTrue = true;
            foreach($data as $value){
                $dataArr = array(
                    'url'       => $value['link'],
                    'title'     => $value['title'],
                    'content'   => $value['content'],
                    'posttime'  => $value['datePost']
                );
                $query = $this->db->insert('article',$dataArr);
                if($query == null){
                    $checkFaile = false;
                    break;
                }
            }
            return $checkFaile;
        }
    }
?>