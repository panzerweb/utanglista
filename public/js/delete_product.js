// Deletes product when clicked, bridges Frontend and Backend logic
// Implements Soft Deletion to avoid violating referential integrity

function deleteProduct(id){
    console.log("Test Delete Data: " + id);
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
                fetch(`../api/delete_product.php?product_id=${id}`, {
                    method: 'POST',
                })
                .then(response => response.text())
                .then(data => {
                    if (data) {
                        Swal.fire({
                        title: "Product Deleted!",
                        text: `${data}`,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                        });
                        console.log(data);
                        // setTimeout(() => {
                        //     window.location.href = '../views/products.php';
                        // }, 1000);
            
                    } else {
                        Swal.fire({
                        title: "Error",
                        text: `${data}`,
                        icon: "error"
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                })
            }
      })
}