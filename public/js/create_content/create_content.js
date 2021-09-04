$(document).ready(function () {
    deadline();
    $("#create_title").click(function () {
        title = $("#title").val();
        sort = $("#sort").val();
        content = $("#content").val();
        deadline_post = $("#deadline").val();
        var data_out = {
            "title": title,
            "sort": sort,
            "content": content,
            "deadline": deadline_post,
        };
        $.ajax({
            url: "create_content",
            type: "post",
            datetype: "json",
            data: data_out,
            headers: {'X-CSRF-TOKEN': $('meta[name=\'csrf-token\']').attr('content')},
            cache: false,
            ifModified: true,
            async: false,
            success: function (htmlVal) {
                result1 = JSON.parse(htmlVal);
                // console.log(result1[0]["result"]);
                switch (result1[0]["result"]) {
                    case '有欄位為空':
                        alert(result1[0]["result"]);
                        break;
                    case '新增成功':
                        alert(result1[0]["result"]);
                        break;
                    default:
                        alert("預料外的錯誤");
                        break;
                }
            },
            error: function () {
                alert("no");
            }
        });
    });
});

function deadline() {
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: moment.locale('zh-cn'),
    });
}
