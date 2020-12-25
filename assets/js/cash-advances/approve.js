$(".btnApprove").on('click', function() {
    const ca_id = $(this).attr('data-id');
    const description = $(this).attr('data-description');
    
    if(ca_id) {
        swal({
            title: "Confirm Delete",
            text: `Are you sure you want to delete '${description}'`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                window.location.href = `actions/cash-advances/approve_data.php?id=${ca_id}`;
            }
          });
    }
});