// Javascript file using Fetch API to handle response from database server
let transactionResult = document.getElementById("transaction-result");
let transactLiveSearchInput = document.getElementById("transaction-livesearch");
let pagination = document.querySelector(".pagination");

if (transactLiveSearchInput && transactionResult) {
    transactLiveSearchInput.addEventListener('keyup', () => {
        const query = transactLiveSearchInput.value;
        if (query != '') {
            fetch('../api/transaction_livesearch.php?transact_search=' + encodeURIComponent(query))
            .then(res => res.text())
            .then(data => {
                transactionResult.innerHTML = data;
                pagination.classList.add('d-none');
                // console.log(data);
            })
            .catch(error => {
                console.log(error);
            })
        } else {
            fetch('../api/transaction_livesearch.php')
            .then(res => res.text())
            .then(data => {
                transactionResult.innerHTML = data;
                pagination.classList.remove('d-none');
                // console.log(data);
            })
            .catch(error => {
                console.log(error);
            })
        }
    })
}