<div class="row">
    <div class="col-md-12" style="text-align:center">
        <font style="font-weight:bold;font-size:30px;font-family:Tahoma">Kết quả</font>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a id="abc" href="<?php echo base_url("htmlcontroller/export/xml"); ?>" class="btn">Xuất XML</a>
        <a id="abc" href="<?php echo base_url("htmlcontroller/export/insertdb"); ?>" class="btn">Insert database</a>
    </div>
    <div class="col-md-12">
       <?php
//            <label>Tên bài viết: </label>
//            <br/>
//            <label>Link bài viết:</label>
//            <br/>
//            <label>Nội dung bài viết được rút gọn:</label>
            
            foreach($result as $value){
                echo 'Tiêu đề bài viết: <font style="font-weight:bold; color:red">'.$value['title'].'</font><br/>';
                echo 'Link bài viết: <font style="font-weight:bold"><a href="'.$value['link'].'">'.$value['link'].'</a></font><br/>';
                echo 'Thời gian post: <font style="font-weight:italic">'.$value['datePost'].'</font><br/>';
                echo 'Nội dung bài viết: <font style="font-weight:bold">'.$value['content'].'</font><br/>';
                echo '<hr/>';
            }
            
        ?>
    </div>
</div>