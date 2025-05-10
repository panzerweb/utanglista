/*
    This code is the handler of User Inferface and Backend server
    to request a POST method.
*/

let insertTransactionBtn = document.getElementById("insertTransaction").addEventListener("click", insertTransaction);

function insertTransaction(){
    //Select Form for customers
    let customerSelect = document.getElementById("customer_name_select");
    let cValue = customerSelect.value;
    let cText = customerSelect.options[customerSelect.selectedIndex].text;
    console.log(cValue);
    console.log(cText);

    //Select Form for products
    let productSelect = document.getElementById("product_name_select");
    let pValue = productSelect.value;
    let pText = productSelect.options[productSelect.selectedIndex].text;
    console.log(pValue);
    console.log(pText);

    //Quantity
    let qtyInput = document.getElementById("qty").value;

    // Validation: If any required field is empty or unselected
    if (cValue === "" || pValue === "" || qtyInput.trim() === "" || parseInt(qtyInput) <= 0) {
        Swal.fire({
            title: "Error",
            text: "Please select a customer, product, and enter quantity!",
            icon: "error",
            showConfirmButton: false,
            timer: 2000,
        });
        return;
    }
    //Create a form data to append the inputs
    const formData = new FormData();
    formData.append("c_name", cValue);
    formData.append("prod_name", pValue);
    formData.append("qty", qtyInput);

    // Use Fetch API to handle POST method
    fetch('../api/transaction.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Transaction successful!",
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(() => {
                window.location.href = "../views/transactions.php";
            }, 1000);

        } else {
            Swal.fire({
                title: "Error",
                text: "Failed to add transaction",
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