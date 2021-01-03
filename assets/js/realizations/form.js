$(document).ready(function() {
    const clearCaInfo = () => {
        $("#pic_name").val("");
        $("#division").val("");
        $("#ca_created_date").val("");
        $("#ca_modified_date").val("");
        $("#file").attr("href", "").attr("target", "").text("");
    }

    const clearForm = () => {
        $('#description').val("");
        $('#total').val(0);
    }

    const validateData = () => {
        let doc_num = $("#doc_num").val();
        let ca = $("#ca").val();
        let total = $("#grand_total").val();
        let difference = $("#difference").val();

        let data = [doc_num, ca, total, difference];
        if(data.includes("")) {
            swal({
                title: "Please fill all Realization Data input",
                text: `There is empty input field in Realization Header`,
                icon: "error",
                dangerMode: true,
              });
            return false;
        }

        return data;        
    }

    const validateDataDetail = () => {
        const caDetail = $("#realizationDetail tr");
        let row = []
        caDetail.each(function() {
            let col = []
            const td = $(this).find("td");
            td.each(function() {
                let text = $(this).text().replace("Rp. ", "")
                col.push(text)
            });
            row.push(col);
        })

        if(row.length > 0) {
            return row;
        }

        swal({
            title: "Please fill all Realization Detail Data input",
            text: `There is empty input field in Realization Detail`,
            icon: "error",
            dangerMode: true,
        });

        return false;
    }

    const getData = () => {
        return validateData();
    }

    const getDataDetail = () => {
        return validateDataDetail();
    }

    const saveData = (datas) => {
        $.ajax({
            url: "actions/realizations/save_data.php",
            type: "POST",
            data: datas,
            success: function (response) {
                if (response == "ok") {
                    window.location.href = 'index.php?page=realizations'
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }

    const fillCaData = (datas) => {
        const first_row = datas[0];

        $("#pic_name").val(first_row.pic_name);
        $("#division").val(first_row.division);
        $("#ca_created_date").val(first_row.ca_cd);
        $("#ca_modified_date").val(first_row.cd_ud);
        if ( first_row.file != '' ) {
            $("#file").attr('href', 'uploaded_files/'+first_row.file).text('Open File').attr('target', '_blank');
        }
        $("#total_ca").val(first_row.ca_total);
    }

    const fillCaDetail = (datas) => {
        $("#caDetail tbody").empty();
        datas.map(data => {
            $("#caDetail tbody").append(`
                <tr>
                    <td>
                        ${data['cad_description']}
                    </td>
                    <td>
                        ${data['cad_total']}
                    </td>
                </tr>    
            `)
        })
    }

    const updateRealizationDetail = () => {
        const grand_total = $('#grand_total');
        const difference = $("#difference");
        const total_ca = $("#total_ca").val();

        let total = $('#total').val();

        const new_total = (parseFloat(grand_total.val()) || 0) + (parseFloat(total) || 0);

        grand_total.val(new_total);
    
        const display_grand_total = $("#display_grand_total");
        display_grand_total.text('Rp. ' + new_total);

        const difference_value = (total_ca - new_total).toFixed(2);

        $("#display_difference").text('Rp. ' + difference_value);    
        difference.val(difference_value);
    }

    $('#btnSaveRow').click(function() {
        const total_ca = $("#total_ca").val();
        const grand_total = $('#grand_total');

        let description = $('#description').val();
        let total = $('#total').val();

        const new_total = parseFloat(grand_total.val()) + parseFloat(total);

        if (description == "" || total <= 0) {
            swal({
                title: "Validation",
                text: `Please fill description and total`,
                icon: "error",
                dangerMode: true,
            });
        }
        /* else if (new_total > total_ca) {
            swal({
                title: "Validation",
                text: `Total Realization is more than total cash advance`,
                icon: "error",
                dangerMode: true,
            });
        } */ 
        else {    
            $("#realizationDetail").append(`
                <tr>
                    <td style='width: 50%'>${description}</td>
                    <td style='width: 50%' class='text-right'>Rp. ${total}</td>
                </tr>
            `);
    
            updateRealizationDetail()
            clearForm();
        }
    });

    $('#btnDeleteRow').click(function() {
        clearForm();
    });


    $('#ca').change(function() {
        clearCaInfo();
        
        const id_ca = $(this).val();
        $.ajax({
            url: "actions/cash-advances/get_data.php",
            type: "GET",
            data: { id_ca },
            success: function (response) {
                response = JSON.parse(response);
                if (response.length > 0) {
                    fillCaData(response);
                    fillCaDetail(response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });

        updateRealizationDetail();
    });

    $('#btnSaveRealization').click(function() {
        if(getData() && getDataDetail()) {
            swal({
                title: "Confirm Save",
                text: `Are you sure you want to save Realization`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willSave) => {
                if (willSave) {
                    const values = {data: getData(), detail: getDataDetail()}
                    saveData(values)
                }
            });
        }
    });
})