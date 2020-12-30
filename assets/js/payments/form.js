$(document).ready(function() {
    const validateData = () => {
        let realization = $("#realization").val();
        let ca = $("#cash_advance_id").val();

        let payment_type = $("#payment_type").val();
        let bank = $("#bank").val();
        let account_number = $("#account_number").val();
        let account_name = $("#account_name").val();
        let amount = $("#amount").val();

        let data = [payment_type, amount];

        if (realization == "" && ca == "") {
            swal({
                title: "Validation",
                text: `Please select realization or cash advance document`,
                icon: "error",
                dangerMode: true,
              });
            return false;
        }
        else if (payment_type == "transfer") {
            if (bank == "" || account_name == "" || account_number == "") {
                swal({
                    title: "Validation",
                    text: `Please fill bank information if payment type is transfer`,
                    icon: "error",
                    dangerMode: true,
                });
                return false; 
            }
        }else {            
            if(data.includes("")) {
                swal({
                    title: "Validation",
                    text: `Please select Payment Type and input amount`,
                    icon: "error",
                    dangerMode: true,
                  });
                return false;
            }    
        }

        data.push(realization, bank, account_number, account_name);

        return data;        
    }

    const getData = () => {
        return validateData();
    }

    const saveData = (datas) => {
        $.ajax({
            url: "actions/payments/save_data.php",
            type: "POST",
            data: datas,
            success: function (response) {
                if (response == "ok") {
                    window.location.href = 'index.php?page=payments'
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }

    const clearForm = () => {
        $("#realization").val("");
        $("#cash_advance_id").val("");
        $("#cash_advance").val("");
        $("#nik_karyawan").val("");
        $("#realization_created_date").val("");
        $("#realization_modified_date").val("");
    }

    const fillRealizationData = (datas) => {
        const first_row = datas[0];
        
        $("#cash_advance_id").val(first_row.cash_advance_id);
        $("#cash_advance").val(first_row.description);
        $("#nik_karyawan").val(first_row.nik);
        $("#realization_created_date").val(first_row.created_date);
        $("#realization_modified_date").val(first_row.updated_date);
    }

    const fillCaData = (datas) => {
        const first_row = datas[0];
        
        $("#cash_advance").val(first_row.ca_description);
        $("#nik_karyawan").val(first_row.nik);
        $("#realization_created_date").val(first_row.created_date);
        $("#realization_modified_date").val(first_row.updated_date);
        $("#amount").val(first_row.ca_total);
    }

    $("#based_on").change(function() {
        clearForm();

        const based_on = $(this).val();
        if (based_on == 'ca') {
            $("#realization").attr('disabled', true);
            $("#cash_advance_id").removeAttr('disabled');
        }else {
            $("#cash_advance_id").attr('disabled', true);
            $("#realization").removeAttr('disabled');
        }
    });

    $("#cash_advance_id").change(function() {
        const id_ca = $(this).val();
        $.ajax({
            url: "actions/cash-advances/get_data.php",
            type: "GET",
            data: { id_ca },
            success: function (response) {
                response = JSON.parse(response);
                if (response.length > 0) {
                    fillCaData(response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });        
    });

    $('#realization').change(function() {        
        const id_realization = $(this).val();
        $.ajax({
            url: "actions/realizations/get_data.php",
            type: "GET",
            data: { id_realization },
            success: function (response) {
                response = JSON.parse(response);
                if (response.length > 0) {
                    fillRealizationData(response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    });

    $('#payment_type').change(function() {
        const selected_type = $(this).val();

        const bank = $("#bank");
        const account_number = $("#account_number");
        const account_name = $("#account_name");
        const amount = $("#amount");

        if (selected_type == "cash") {
            bank.val("").attr('disabled', true);
            account_number.val("").attr('disabled', true);
            account_name.val("").attr('disabled', true);
        }else if(selected_type == "transfer") {
            bank.val("").removeAttr('disabled');
            account_number.val("").removeAttr('disabled');
            account_name.val("").removeAttr('disabled');
        }
    });

    $('#btnSavePayment').click(function() {
        if(getData()) {
            swal({
                title: "Confirm Save",
                text: `Are you sure you want to save Payment`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willSave) => {
                if (willSave) {
                    const cash_advance_id = $("#cash_advance_id").val();
                    const values = {data: getData(), ca_id: cash_advance_id}
                    saveData(values)
                }
            });
        }
    });
})