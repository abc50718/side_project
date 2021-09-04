var id;
$(document).ready(function () {
    $.ajax({
        url: "index",
        type: "post",
        datetype: "json",
        headers: {'X-CSRF-TOKEN': $('meta[name=\'csrf-token\']').attr('content')},
        cache: false,
        ifModified: true,
        async: false,
        success: function (htmlVal) {
            result1 = JSON.parse(htmlVal);
            $("#item").empty();
            $("#item").append(
                "<thead>" +
                "<tr>" +
                "<th>內容分類</th>" +
                "<th>代辦事項</th>" +
                "<th>內容描述</th>" +
                "<th>剩餘天數</th>" +
                "<th>到期前通知</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>"
            );
            for (var i = 0; i < result1.length; i++) {
                $("#item").append(
                    "<tr>" +
                    "<td>" +
                    result1[i]["sort"] +
                    "</td>" +
                    "<td>" +
                    result1[i]["title"] +
                    "</td>" +
                    "<td>" +
                    result1[i]["content"] +
                    "</td>" +
                    "<td>" +
                    result1[i]["deadline"] +
                    "</td>" +
                    "<td>" +
                    "<b onclick='day_btn(this)'" + "id=" + result1[i]["id"] + ">" + result1[i]["set_day"] + "</b>" +
                    "</td>" +
                    "</tr>"
                );
            }
            $("#item").append(
                "</tbody>"
            );
        },
        error: function () {
            alert("no");
        }
    });

    $('#cancel').click(function () {
        $("#set_day_model").modal('hide');
    });

    $('#set_day').click(function () {
        day = $("#day").val();
        var data_out = {
            "id": id,
            "day": day,
        };
        $.ajax({
            url: "set_day",
            type: "post",
            datetype: "json",
            data: data_out,
            headers: {'X-CSRF-TOKEN': $('meta[name=\'csrf-token\']').attr('content')},
            cache: false,
            ifModified: true,
            async: false,
            success: function (htmlVal) {
                console.log("OK");
                $("#set_day_model").modal('hide');
                location.reload();
            },
            error: function () {
                alert("no");
            }
        });
    });

    // $('#set_day_model').on('hidden.bs.modal', function () {
    //     $('.modal-body').find('textarea,input').val('');
    // });

    $('th').click(function () {
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc) {
            rows = rows.reverse()
        }
        for (var i = 0; i < rows.length; i++) {
            table.append(rows[i])
        }
    });
});


function comparer(index) {
    return function (a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
    }
}

function getCellValue(row, index) {
    return $(row).children('td').eq(index).text()
}

function day_btn(myObj) {
    id = myObj.id;
    $("#set_day_model").modal('show');
}

