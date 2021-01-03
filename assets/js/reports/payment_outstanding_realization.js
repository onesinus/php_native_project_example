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
    $("#from_date, #to_date").change(function() {
        let from_date = $("#from_date").val();
        let to_date = $("#to_date").val();

        if (from_date && to_date) {
            $.ajax({
                url: "actions/reports/generate_payment_outstanding_realization.php",
                type: "POST",
                data: { from_date, to_date },
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
        }

    });
});