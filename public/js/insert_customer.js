// Javascript file for inserting customer, bridging between User Interface and Backend server
// Handles request from User Interface, removes traditional form method

document.getElementById("insertCustomerBtn").addEventListener("click", insertCustomer);

function insertCustomer(){
    let name = document.getElementById("c_name").value;
    let contact = document.getElementById("c_contact").value;

    //If fields are empty, return
    if(name == '' && contact == ''){
        Swal.fire({
            title: "Error",
            text: "Empty Fields!",
            icon: "error",
            showConfirmButton: false,
            timer: 1000,
        });
        return;
    }
    // Create a new Form Data to simplify sending of fields
    const formData = new FormData();
    formData.append("c_name", name);
    formData.append("c_contact", contact);
    // POST method using Fetch API
    fetch('../../api/add_customer.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        //If the message from server echoes success, return to page
        if(data.trim() === 'success'){
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Customer added!",
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(() => {
                window.location.href = '../views/customer.php';
            }, 1000);
        }
        // Else, display alert
        else{
            Swal.fire({
                title: "Error",
                text: "Failed to add customer",
                icon: "question",
                showConfirmButton: false,
                timer: 1000,
            });
        }
    })
    .catch(err => {
        console.log(err);
    })
}

