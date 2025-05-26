const transactLiveSearchInput = document.getElementById("transaction-livesearch");
const transactionResult = document.getElementById("transaction-result");

if (transactionResult && transactLiveSearchInput) {
    document.addEventListener("DOMContentLoaded", () => {
        fetchData('', 1); // Load initial data on page load
    });
    // Handles the input of searches
    transactLiveSearchInput.addEventListener("keyup", () => {
        const query = transactLiveSearchInput.value.trim();
        fetchData(query, 1); // Reset to first page when search changes
    });

    // Listen for clicks anywhere on the document
    // Handles the next page of the pagination
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("pagination-link")) {
            e.preventDefault();
            // Get the data-page attribute
            const page = parseInt(e.target.getAttribute("data-page"));
            const query = transactLiveSearchInput.value.trim();
            // Now the second parameter is base on the next page
            fetchData(query, page);
        }
    });
    // Handles the fetching of data
    function fetchData(query = '', page = 1) {
        let url = `../api/transaction_livesearch.php?page=${page}`;
        if (query !== '') {
            url += `&transact_search=${encodeURIComponent(query)}`;
        }

        fetch(url)
            .then((res) => res.text())
            .then((data) => {
                transactionResult.innerHTML = data;
                // pagination.classList.add('d-none');

            })
            .catch((err) => {
                console.error("Fetch error:", err);
            });
    }
}

