/*
    Payment logic using Fetch API to send request on the backend server
*/
function insertPayment(id){
    let customerID = document.getElementById(`customer_id_${id}`).value;
    let paymentField = document.getElementById(`payment_amount_${id}`).value.trim();
    // Client-side validation
    if (!paymentField || isNaN(paymentField)) {
        Swal.fire({
            icon: "warning",
            title: "Invalid Input",
            text: "Please enter a valid payment amount.",
        });
        return;
    }

    const formData = new FormData();
    formData.append("id", customerID);
    formData.append("payment_amount", paymentField);

    // console.log(customerID);
    // console.log(paymentField);
    // console.log(formData);

    fetch('../api/payment.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Payment successful!",
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(() => {
                window.location.href = '../views/customer.php';
            }, 1000);
        } else {
            Swal.fire({
                title: "Transaction Failed",
                text: `${data}`,
                icon: "question",
                showConfirmButton: false,
                timer: 1000,
            });
            console.log(data);
        }
    })
    .catch(error => {
        console.log(error);
    })
}