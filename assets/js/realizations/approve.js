$(".btnApprove").on('click', function() {
    const realization_id = $(this).attr('data-id');
    const ca_id = $(this).attr('data-ca-id');
    const description = $(this).attr('data-description');
    const difference = $(this).attr('data-difference');
    
    if(realization_id && ca_id) {
        swal({
            title: "Confirm Approve",
            text: `Are you sure you want to approve '${description}'`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willApprove) => {
            if (willApprove) {
                window.location.href = `actions/realizations/approve_data.php?id=${realization_id}&ca_id=${ca_id}&diff=${difference}`;
            }
          });
    }
});