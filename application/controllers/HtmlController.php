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
            $i = 0;
            $count = 0;
            $arr = array();
            try{
                $numberArticle = $result['numberArticle'];
                $website = $this->domparser->file_get_html($result['txtUrl']);
                foreach($website->find($result['txtTagLink']) as $key)
                {
                    if($i < $numberArticle){
                        
                        $link = $result['txtUrl'].$key->href; //Ghép link
                        $page = $this->domparser->file_get_html($link); //Vào link bài viết
                        
                        $title = $page->find($result['txtTitle'], 0); //Lấy tên bài viết
                        $title = $title->plaintext;
                        $content = $page->find($result['txtContent'], 0); //Lấy nội dung bài viết
                        $content = $content->plaintext;

                        $item['title'] = trim($title);
                        $item['content'] = trim($content);
                        $item['link'] = $link;
                        $arr['Article'.$i] = $item;
                    }
                    $i++;
                }
                
                $data['result'] = $arr;
                $this->session->set_userdata("content",$arr);
                echo $this->load->view('ResultWebsite.php',$data);
            }
            catch(Exception $err){
                echo $err->getMessage();
            }
        }
        public function export($type){
            $ResultArr = $this->session->userdata("content");
            $i=0;
            
            if($type == "xml"){
                header('Content-Type: application/octet-stream');
                header("Content-Transfer-Encoding: Binary");
                header("Content-disposition: attachment; filename=myXML.xml");
                print("<?xml version=1.0 ?>");
                print("<root>");
                foreach($ResultArr as $key)
                {
                    print "\r\n"."<article id=".++$i.">";
                    
                        print "\r\n\t"."<title>";
                            print "\r\n\t\t".$key['title'];
                        print "\r\n\t"."</title>";

                        print "\r\n\t"."<url>";
                            print "\r\n\t\t".$key['link'];
                        print "\r\n\t"."</url>";

                        print "\r\n\t"."<content>";
                            print "\r\n\t\t".$key['content'];
                        print "\r\n\t"."</content>";
                    
                    print "\r\n"."</article>";
                }
                print("</root>");
            }
            else if($type == "insertdb"){
                /*Thực hiện insert database ở đây*/
            }
        }
    }
?>