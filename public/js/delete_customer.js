// Javascript file for deleting customer, bridging between User Interface and Backend server

function deleteCustomer(id){
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
    });

}

// const swalWithBootstrapButtons = Swal.mixin({
//     customClass: {
//       confirmButton: "btn btn-success",
//       cancelButton: "btn btn-danger"
//     },
//     buttonsStyling: false
//   });
//   swalWithBootstrapButtons.fire({
//     title: "Are you sure?",
//     text: "You won't be able to revert this!",
//     icon: "warning",
//     showCancelButton: true,
//     confirmButtonText: "Yes, delete it!",
//     cancelButtonText: "No, cancel!",
//     reverseButtons: true
//   }).then((result) => {
//     if (result.isConfirmed) {
//       swalWithBootstrapButtons.fire({
//         title: "Deleted!",
//         text: "Your file has been deleted.",
//         icon: "success"
//       });
//     } else if (
//       /* Read more about handling dismissals below */
//       result.dismiss === Swal.DismissReason.cancel
//     ) {
//       swalWithBootstrapButtons.fire({
//         title: "Cancelled",
//         text: "Your imaginary file is safe :)",
//         icon: "error"
//       });
//     }
//   });