function handleClick(controller,kind){
    var opts = {
        lines: 12, // The number of lines to draw
        length: 7, // The length of each line
        width: 4, // The line thickness
        radius: 10, // The radius of the inner circle
        color: '#000', // #rgb or #rrggbb
        speed: 1, // Rounds per second
        trail: 60, // Afterglow percentage
        shadow: false, // Whether to render a shadow
        hwaccel: false // Whether to use hardware acceleration
    };
    var target = document.getElementById('loading');
    var spinner = new Spinner(opts).spin(target);
    
    var txtUrl = $('#txtUrl').val();
    var numberArticle = $('#txtNumberArticle').val();
    var txtTagLink = $('#txtTagLink').val();
    var txtTitle = $('#txtTitle').val();
    var txtContent = $('#txtContent').val();
    var sort = $('#sort').val();
    var img = $('#getImg').val();
    
    if(txtUrl != ""){
        $('#warningtxtUrl').html("");
    }
    else if(txtUrl == ""){
        $('#warningtxtUrl').html("Vui lòng nhập link website!!!!");
    }
    
    if(numberArticle != ""){
        $('#warningtxtNumberArticle').html("");
    }
    else $('#warningtxtNumberArticle').html("Vui lòng nhập số lượng bài viết cần lấy!!!!");
    
    if(txtTagLink != ""){
        $('#warningtxtTagLink').html("");
    }
    else $('#warningtxtTagLink').html("Vui lòng nhập tag chứa link bài viết!!!!");
    
    if(txtTitle != ""){
        $('#warningtxtTitle').html("");
    }
    else $('#warningtxtTitle').html("Vui lòng nhập tag chứa tên bài viết!!!!");
    
    if(txtContent != ""){
        $('#warningtxtContent').html("");
    }
    else $('#warningtxtContent').html("Vui lòng nhập tag chứa nội dung bài viết!!!!");
    
    if (txtUrl !== "" && numberArticle != "" && txtTagLink !== "" && txtTitle !== "" && txtContent !== "") {
        $("#loading").fadeIn();
        var opts = {
            lines: 12, // The number of lines to draw
            length: 7, // The length of each line
            width: 4, // The line thickness
            radius: 10, // The radius of the inner circle
            color: '#000', // #rgb or #rrggbb
            speed: 1, // Rounds per second
            trail: 60, // Afterglow percentage
            shadow: false, // Whether to render a shadow
            hwaccel: false // Whether to use hardware acceleration
        };
        var target = document.getElementById('loading');
        var spinner = new Spinner(opts).spin(target);
        var data = {
            txtUrl: txtUrl,
            numberArticle: numberArticle,
            txtTagLink: txtTagLink,
            txtTitle: txtTitle,
            txtContent: txtContent,
            sort: sort,
            img: img
        };
        var dt = JSON.stringify(data);
        $.ajax({
            type: 'POST',
            url: controller,
            connectTimeout: 60,
            data: 'data=' + dt,
            success: function (response) {
                $('#formInput').children().remove();
                $('#formInput').append(response);
            },
            error: function (err) {
                alert(err.status + ' ' + err.statusText);
            }
        });
    }
}