<?php
    class HtmlController extends CI_Controller{
       
        public function __construct(){
            parent::__construct();
            $this->load->helper("url");
            $this->load->library('session');
            $this->load->library("domparser");            
            //set_time_limit(0);
        }
        
        public function index(){
            $data['view'] = "form.php";
            $this->load->view("index.php",$data);
        }
        
        public function member(){
            $data['view'] = "thongtinthanhvien.php";
            $this->load->view("index.php",$data);
        }
        
        public function teacher(){
            $data['view'] = "giaovien.php";
            $this->load->view("index.php",$data);
        }
        
        public function document(){
            $data['view'] = "document.php";
            $this->load->view("index.php",$data);
        }
        
        public function check_search()
        {
            $result = json_decode($this->input->post('data'), true);                         
            $count = 0;            
            $link = "";
            $title = "";
            $content = "";
            $datePost = "";
            $parse_url = array();
            $arr = array();
            $item = array();
            $data = array();
            $page = "";            
            $i = 0;
            $number = $result['numberArticle'];
                    
            try{                
                $website = $this->domparser->file_get_html($result['txtUrl']);
                foreach($website->find($result['txtTagLink']) as $key)
                {    
                    if($i >= $number) break;
                    $parse_url = parse_url($key->href);
                    if(isset($parse_url['host']))
                        $link = $key->href; //Ghép link
                    else
                        $link = $result['txtUrl'].$key->href; //Ghép link
                    $page = $this->domparser->file_get_html($link); //Vào link bài viết

                    $title = $page->find($result['txtTitle'], 0); //Lấy tên bài viết
                    $title = $title->plaintext;
                    $content = $page->find($result['txtContent'], 0); //Lấy nội dung bài viết
                    $content = ($result['img'] === "yes")? $content : $content->plaintext;                                      
                    $datePost = $page->find($result['txtTagPost'], 0);
                    $datePost = $datePost->plaintext;
                    
                    $item['title'] = trim($title);
                    $item['content'] = trim($content);
                    $item['link'] = $link;
                    $item['datePost'] = $datePost;
                    $arr['Article'.++$count] = $item;     
                    $item = null;
                    $i++;
                }
                
                if($result['sort'] === "asc"){
                    $data['result'] = array_reverse($arr);
                }
                else{
                    $data['result'] = $arr;
                }
                
                $this->session->set_userdata("content",$data);
                echo $this->load->view('ResultWebsite.php',$data);
            }
            catch(Exception $err){
                echo $err->getMessage();
            }
        }
        public function export($type){
            $ResultArr = $this->session->userdata("content");
            if($type == "xml"){
                header('Content-Type: application/octet-stream');
                header("Content-Transfer-Encoding: Binary");
                header("Content-disposition: attachment; filename=XML_downloader.xml");
                $i=0;
                print "\r\n"."<?xml version='1.0' encoding='utf-8'?>";
                print "\r\n"."<website>";
                foreach($ResultArr['result'] as $key)
                {
                    print "\r\n"."<subject id=".++$i.">";
                        print "\r\n\t"."<url>";
                            print "\r\n\t\t".$key['link'];
                        print "\r\n\t"."</url>";

                        print "\r\n\t<title>";
                            print "\r\n\t\t".$key['title'];
                        print "\r\n\t"."</title>";

                        print "\r\n\t<content>";
                            print "\r\n\t\t".$key['content'];
                        print "\r\n\t"."</content>";

                        print "\r\n\t<posttime>";
                            print "\r\n\t\t".$key['datePost'];
                        print "\r\n\t"."</posttime>";
                    print "\r\n"."</subject>";
                }
                print "\r\n"."</website>";
            }
            else if($type == "insertdb"){
                $this->load->model('ArticleModel');
                $query = $this->ArticleModel->insert($ResultArr['result']);
                
                if($query == true){
                    echo '<script>alert("Success!!");</script>';
					redirect(base_url());
                }
                else{
                    echo '<script>alert("Fail!!");</script>';
					redirect(base_url());
                }
            }
        }
    }
?>