// Javascript file for deleting customer, bridging between User Interface and Backend server

function deleteCustomer(id){
    fetch(`../../api/delete_customer.php?customer_id=${id}`, {
        method: 'POST',
    })
    .then(response => response.text())
    .then(data => {
        if (data) {
            Swal.fire({
            title: "Customer Deleted!",
            text: "Successfully deleted customer",
            icon: "success",
            showConfirmButton: false,
            timer: 1000
            });

            setTimeout(() => {
                window.location.href = '../views/customer.php';
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