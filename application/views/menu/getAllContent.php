<h3 class="text-center">Get All Content</h3>
<div class="row">
	<div class="col-md-10 col-md-offset-1 form-group">
		<h4>Nhập từ khóa : </h4>
		<div class="input-group input-group-lg panelbox">		
			<input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa cần tìm" aria-describedby="sizing-addon1">
			<span class="input-group-addon" id="sizing-addon1">?</span>
		</div>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-10 col-md-offset-1 form-group">
		<h4>Nhập link Website : </h4>
		<div class="input-group input-group-lg panelbox">
			<input type="text" name="txtUrl" class="form-control" placeholder="Nhập trang web cần tìm" aria-describedby="sizing-addon1">
			<span class="input-group-addon" id="sizing-addon1">?</span>
		</div>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-10 col-md-offset-1 form-group">
		<h4>Nhập tên tag chứa khu vực cần lấy link : </h4>
		<div class="input-group input-group-lg panelbox">
			<input type="text" name="txtTags" class="form-control" placeholder="Là tag chứa list danh sách các bài viết" aria-describedby="sizing-addon1">
			<span class="input-group-addon" id="sizing-addon1">?</span>
		</div>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-10 col-md-offset-1 form-group">
		<h4>Nhập tên tag cần lấy : </h4>
		<div class="input-group input-group-lg panelbox">
			<input type="text" name="txtTag" class="form-control" placeholder="Là tag chứa từng khu vực bài viết nhỏ trong list ở trên" aria-describedby="sizing-addon1">
			<span class="input-group-addon" id="sizing-addon1">?</span>
		</div>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-10 col-md-offset-1 form-group">
		<h4>Nhập số trang : </h4>
		<div class="col-sm-4 col-md-offset-1">
		<div class="input-group input-group-lg panelbox">
			<input type="text" name="txtPageS" class="form-control" placeholder="Bắt đầu để lấy" aria-describedby="sizing-addon1">
			<span class="input-group-addon" id="sizing-addon1">?</span>
		</div>
		</div>
		<div class="col-sm-4 col-md-offset-1">
		<div class="input-group input-group-lg panelbox">
			<input type="text" name="txtPageE" class="form-control" placeholder="Cuối cùng để lấy" aria-describedby="sizing-addon1">
			<span class="input-group-addon" id="sizing-addon1">?</span>
		</div>
		</div>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-10 col-md-offset-1 form-group">
		<h4>Nhập cấu trúc URL của phân trang : </h4>
		<div class="input-group input-group-lg panelbox">
			<input type="text" name="txtWpage" class="form-control" placeholder="Lấy hết URL chỉ để có thể thêm số trang ở cuối vào để truy cập được từng trang" aria-describedby="sizing-addon1">
			<span class="input-group-addon" id="sizing-addon1">?</span>
		</div>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-2 col-md-offset-3 form-group">
		<span class="pagebtny">	
						<button type="" class="btn" >Xuất XML</button></span>
	</div>
	<div class="col-md-2 form-group">
		<span class="pagebtnn">	
						<button type="" class="btn">Xuất Word</button></span>
	</div>
	<div class="col-md-2 form-group">
		<span class="pagebtny">	
						<button type="" class="btn">Xuất Excel</button></span>
	</div>
</div>
<div class="clearfix"></div>
<!-- /.row -->
<div class="row">
	<div class="col-md-12 form-group">
		<?php
			require_once('simple_html_dom.php');
			//error_reporting(0);
			if(isset($_POST['submit'])){
			if(isset($_POST['txtUrl']) and isset($_POST['txtTag']) and isset($_POST['txtTitle']) and isset($_POST['txtContent']) )
			{
				$url=$_POST['txtUrl'];
				$tag=$_POST['txtTag'];
				$title=$_POST['txtTitle'];
				$content=$_POST['txtContent'];
//				$folder=trim($_POST['txtFolder']);
				echo "<pre>";
				print_r($_POST);
				echo "</pre>";
				$html = file_get_html($url);
				//echo $url;
				//echo $html;
				
				$tags=array();
				foreach($html->find($tag) as $art) {
					$item['title']     = $art->find($title, 0);
					$item['content']    = $art->find($content, 0)->plaintext;
					$tags[] = $item;
				}

				echo "Tiêu đề bài viết:" . $tags[0]['title'];
				echo "<br>Nội dung bài viết:". $tags[0]['content'];
				//Xu ly tieu de bai viet
				//$Article['title']=str_replace('admin',"",$Article[0]['title'])
			}
			else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Bạn chưa nhập đầy đủ thông tin!")';
                    echo '</script>';
                }
		}
		?>
	</div>
</div>
<!-- /.row -->
