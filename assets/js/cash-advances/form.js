$(document).ready(function() {
    const clearForm = () => {
        $('#description').val("");
        $('#qty').val(0);
        $('#amount').val(0);
        $('#total').val(0);
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
        swal({
            title: "Confirm Save",
            text: `Are you sure you want to save CA'`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                alert('do save ca here');
            }
        });
    });
})