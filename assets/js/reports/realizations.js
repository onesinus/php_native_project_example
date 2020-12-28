$(document).ready(function() {
    const fillReportData = (datas) => {
        $("#reportData").empty();
        datas.map(data => {
            $("#reportData").append(`
                <tr>
                    <td>
                        ${data['doc_num']}
                    </td>
                    <td>
                        ${data['total']}
                    </td>
                    <td>
                        ${data['status']}
                    </td>
                    <td>
                        ${data['created_date']}
                    </td>
                </tr>    
            `)
        })
    }
    $("#filter_date").change(function() {
        let date = $("#filter_date").val();
        
        $.ajax({
            url: "actions/reports/generate_realization.php",
            type: "POST",
            data: { date },
            success: function (response) {
                if (response) {
                    response = JSON.parse(response);
                    fillReportData(response)
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    });
});