// Javascript file for updating customer, bridging between User Interface and Backend server
// Handles request from User Interface, removes traditional form method

// Accepts parameter of id to access individual data to update
function updateCustomer(id){
    // Use template strings to dynamically access each id
    let customer_id = document.getElementById(`customer_id_${id}`).value;
    let name = document.getElementById(`c_name_${id}`).value;
    let contact = document.getElementById(`c_contact_${id}`).value;
    let status = document.getElementById(`status_${id}`).value;

    // Bug tracing consoles
    // console.log(customer_id);
    // console.log(name);
    // console.log(contact);
    // console.log(status);

    // Creates new Formdata to simplify fields request
    const formData = new FormData();
    formData.append("id", customer_id);
    formData.append("c_name", name);
    formData.append("c_contact", contact);
    formData.append("status", status);

    // Use Fetch API to send to server
    fetch(`../../api/edit_customer.php`, {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        //If the message from server echoes success, return to page
        if(data.trim() === 'success'){
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Customer Updated!",
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(() => {
                window.location.href = '../views/customer.php';
            }, 1000);
        }
        else{
            console.log(data)
            
        }
    })
    .catch(error => {
        console.log(error);
    })
}