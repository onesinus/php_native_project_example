$(".btnDelete").on('click', function() {
    const realization_id = $(this).attr('data-id');
    const ca_id = $(this).attr('data-ca-id');

    const description = $(this).attr('data-description');
    
    if(realization_id && ca_id) {
        swal({
            title: "Confirm Delete",
            text: `Are you sure you want to delete '${description}'`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                window.location.href = `actions/realizations/delete_data.php?id=${realization_id}&ca_id=${ca_id}`;
            }
          });
    }
});