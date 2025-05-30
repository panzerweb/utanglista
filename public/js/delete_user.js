// Javascript file for deleting customer, bridging between User Interface and Backend server
// Implements Soft Deletion to prevent violating referential integrity

function deleteUser(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            fetch(`../api/auth/delete_users.php?user_id=${id}`, {
                method: 'POST',
            })
            .then(response => response.text())
            .then(data => {
                if (data) {
                    Swal.fire({
                    title: "Customer Deleted!",
                    text: "Successfully deleted User",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000
                    });
        
                    setTimeout(() => {
                        window.location.href = '../views/user_dashboard.php';
                    }, 1000);
        
                } else {
                    Swal.fire({
                    title: "Error",
                    text: "Failed to delete customer",
                    icon: "error"
                    });
                }
            })
            .catch(err => {
                console.log(err);
            })
        }
    });

}