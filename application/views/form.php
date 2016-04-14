<div id="formInput">
    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel-body">
                <div class="row">
                    <div class="form-horizontal">
                        <fieldset style="font-family:Tahoma">
                            <legend style="font-weight:bold; text-align:center;font-size:30px">Lấy toàn bộ bài viết của 1 website</legend>
                            <div class="col-md-12" style="margin-bottom:10px">
                                <div class="col-md-12">
                                    <div class="editor-label">
                                        <label>Link website: <font style="color:red; margin-left:3px">(*)</font></label>
                                    </div>
                                    <div class="editor-field">
                                        <input id="txtUrl" type="text" class="form-control" />
                                        <b id="warningtxtUrl"></b>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px">
                                <div class="col-md-6">
                                    <div class="editor-label">
                                        <br/>
                                        <label>Số lượng bài viết cần lấy: <font style="color:red; margin-left:3px">(*)</font></label>
                                    </div>
                                    <div class="editor-field">
                                        <input id="txtNumberArticle" type="number" class="form-control" />
                                        <b id="warningtxtNumberArticle"></b>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="editor-label">
                                        <br/>
                                        <label>Tag chứa link bài viết: <font style="color:red; margin-left:3px">(*)</font></label>
                                    </div>
                                    <div class="editor-field">
                                        <input id="txtTagLink" type="text" class="form-control" />
                                        <b id="warningtxtTagLink"></b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px">
                                <div class="col-md-6">
                                    <div class="editor-label">
                                        <br/>
                                        <label>Tag chứa tên bài viết: <font style="color:red; margin-left:3px">(*)</font></label>
                                    </div>
                                    <div class="editor-field">
                                        <input id="txtTitle" type="text" class="form-control" />
                                        <b id="warningtxtTitle"></b>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="editor-label">
                                        <br/>
                                        <label>Tag chứa nội dung bài viết: <font style="color:red; margin-left:3px">(*)</font></label>
                                    </div>
                                    <div class="editor-field">
                                        <input id="txtContent" type="text" class="form-control" />
                                        <b id="warningtxtContent"></b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px">
                                <div class="col-md-6">
                                    <div class="editor-label">
                                        <br/>
                                        <label>Tag chứa thời gian post: <font style="color:red; margin-left:3px">(*)</font></label>
                                    </div>
                                    <div class="editor-field">
                                        <input id="txtTagPost" type="text" class="form-control" />
                                        <b id="warningtxtTagPost"></b>
                                    </div>
                                </div>
<!--
                                <div class="col-md-6">
                                    <div class="editor-label">
                                        <br/>
                                        <label>Thuộc tính chứa thời gian post: </label>
                                    </div>
                                    <div class="editor-field">
                                        <input id="txtTagAttr" type="text" class="form-control" />                                      
                                    </div>
                                </div>
-->
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px">
                                <div class="col-md-6">
                                    <div class="editor-label">
                                        <br/>
                                        <label>Sắp xếp:</label>
                                    </div>
                                    <div class="editor-field">
                                        <select id="sort" class="form-control">
                                            <option value="asc">Tăng dần</option>
                                            <option value="desc">Giảm dần</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="editor-label">
                                        <br/>
                                        <label>Lấy hình:</label>
                                    </div>
                                    <div class="editor-field">
                                        <select id="getImg" class="form-control">
                                            <option value="yes">Có</option>
                                            <option value="nope">Không</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="col-md-12">
                                <div class="col-md-12" style="text-align:center">
                                    <p>
                                        <input class="btn btn-success" type="button" value="Thực hiện" onclick="handleClick('<?php echo base_url("htmlcontroller/check_search "); ?>','search')"/>
                                    </p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="loading">
        <div id="loadingcontent">
            <p id="loadingspinner">
                Đang dò...
            </p>
        </div>
    </div>
</div>