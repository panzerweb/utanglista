// Javascript file using Fetch API to handle response from database server
let transactionResult = document.getElementById("transaction-result");
let transactLiveSearchInput = document.getElementById("transaction-livesearch");

transactLiveSearchInput.addEventListener('keyup', () => {
    const query = transactLiveSearchInput.value;
    if (query != '') {
        fetch('../../api/transaction_livesearch.php?transact_search=' + encodeURIComponent(query))
        .then(res => res.text())
        .then(data => {
            transactionResult.innerHTML = data;
            // console.log(data);
        })
        .catch(error => {
            console.log(error);
        })
    } else {
        fetch('../../api/transaction_livesearch.php')
        .then(res => res.text())
        .then(data => {
            transactionResult.innerHTML = data;
            // console.log(data);
        })
        .catch(error => {
            console.log(error);
        })
    }
})