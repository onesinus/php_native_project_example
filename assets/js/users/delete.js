$(".btnDelete").on('click', function() {
    const user_id = $(this).attr('data-id');
    const username = $(this).attr('data-username');
    if(user_id) {
        swal({
            title: "Confirm Delete",
            text: `Are you sure you want to delete '${username}'`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                window.location.href = `actions/users/delete_data.php?id=${user_id}`;
            }
        });
    }
});