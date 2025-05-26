//Customer Logs
function clearCustomerLogs(){
    console.log("Clear Customer Logs");

    fetch(`../api/logs_clear.php?customer_logs`, {
        method: 'POST',
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            Swal.fire({
                title: "Customer Logs Deleted!",
                text: "Successfully deleted customer logs",
                icon: "success",
                showConfirmButton: false,
                timer: 1000
            });
            setTimeout(() => {
                window.location.href = '../views/logs.php';
            }, 1000);
            console.log(data);
        } else {
            Swal.fire({
                title: "Logs not deleted!",
                text: "Failed to clear logs!",
                icon: "error",
                showConfirmButton: false,
                timer: 1000
            });
        }
    })
    .catch(error => {
        console.log(error);
    })
}


// Product Logs
function clearProductLogs(){
    console.log("Clear Product Logs");

    fetch(`../api/logs_clear.php?product_logs`, {
        method: 'POST',
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            Swal.fire({
                title: "Product Logs Deleted!",
                text: "Successfully deleted product logs",
                icon: "success",
                showConfirmButton: false,
                timer: 1000
            });
            console.log(data);
        } else {
            Swal.fire({
                title: "Logs not deleted!",
                text: "Failed to clear logs!",
                icon: "error",
                showConfirmButton: false,
                timer: 1000
            });
        }
    })
    .catch(error => {
        console.log(error);
    })
}

// Transaction Logs
function clearTransactionLogs(){
    console.log("Clear Transaction Logs");

    fetch(`../api/logs_clear.php?transaction_logs`, {
        method: 'POST',
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            Swal.fire({
                title: "Transaction Logs Deleted!",
                text: "Successfully deleted transaction logs",
                icon: "success",
                showConfirmButton: false,
                timer: 1000
            });
            console.log(data);
        } else {
            Swal.fire({
                title: "Logs not deleted!",
                text: "Failed to clear logs!",
                icon: "error",
                showConfirmButton: false,
                timer: 1000
            });
        }
    })
    .catch(error => {
        console.log(error);
    })
}

// Payment Logs
function clearPaymentLogs(){
    console.log("Clear Payment Logs");

    fetch(`../api/logs_clear.php?payment_logs`, {
        method: 'POST',
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            Swal.fire({
                title: "Payment Logs Deleted!",
                text: "Successfully deleted payment logs",
                icon: "success",
                showConfirmButton: false,
                timer: 1000
            });
            console.log(data);
        } else {
            Swal.fire({
                title: "Logs not deleted!",
                text: "Failed to clear logs!",
                icon: "error",
                showConfirmButton: false,
                timer: 1000
            });
        }
    })
    .catch(error => {
        console.log(error);
    })
}