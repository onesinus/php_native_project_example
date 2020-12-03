$(document).ready(function() {
    const clearForm = () => {
        $('#description').val("");
        $('#qty').val(0);
        $('#amount').val(0);
        $('#total').val(0);
    }

    const validateData = () => {
        let project_name = $("#project_name").val();
        let ca_number = $("#doc_num").val();
        let division = $("#division").val();
        let pic_name = $("#pic_name").val();
        let is_realized = $("#is_realized").is(":checked");
        let file = $("#evidence").val();

        let data = [project_name, ca_number, division, pic_name, is_realized, file];
        if(data.includes("")) {
            swal({
                title: "Please fill all CA Data input",
                text: `There is empty input field in CA Header`,
                icon: "error",
                dangerMode: true,
              });
            return false;
        }
        return data;        
    }

    const validateDataDetail = () => {
        const caDetail = $("#caDetail tr");
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
            title: "Please fill all CA Detail Data input",
            text: `There is empty input field in CA Detail`,
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

    $('#btnSaveRow').click(function() {
        let description = $('#description').val();
        let qty = $('#qty').val();
        let amount = $('#amount').val();
        let total = $('#total').val();

        $("#caDetail").append(`
            <tr>
                <td>${description}</td>
                <td class='text-right'>Rp. ${qty}</td>
                <td class='text-right'>Rp. ${amount}</td>
                <td class='text-right'>Rp. ${total}</td>
            </tr>
        `);

        clearForm();
    });

    $('#btnDeleteRow').click(function() {
        clearForm();
    });

    $('#qty').change(function() {
        let amount = $('#amount').val();
        let qty = $(this).val();

        if(amount > 0 && qty > 0) {
            $('#total').val(qty * amount);
        }
    });

    $('#amount').change(function() {
        let qty = $('#qty').val();
        let amount = $(this).val();

        if(amount > 0 && qty > 0) {
            $('#total').val(qty * amount);
        }
    });

    $('#btnSaveCa').click(function() {
        if(getData() && getDataDetail()) {
                swal({
                    title: "Confirm Save",
                    text: `Are you sure you want to save CA'`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        console.log(getData());
                        console.log(getDataDetail());
                    }
                });
        }
    });
})