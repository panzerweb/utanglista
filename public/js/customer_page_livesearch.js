// Javascript file using Fetch API to handle response from database server
const liveSearch = document.getElementById('livesearch'); //search input field in customer page
const liveResult = document.getElementById("live-result"); // refers to the table body

if (liveResult && liveSearch) {
    document.addEventListener("DOMContentLoaded", () => {
        fetchData('', 1);
    });
    liveSearch.addEventListener('keyup', () => { 
        const query = liveSearch.value.trim();
        fetchData(query, 1);
    })
    // Listen for clicks anywhere on the document
    // Handles the next page of the pagination
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("pagination-link")) {
            e.preventDefault();
            // Get the data-page attribute
            const page = parseInt(e.target.getAttribute("data-page"));
            const query = liveSearch.value.trim();
            // Now the second parameter is base on the next page
            fetchData(query, page);
        }
    });
    function fetchData(query = '', page = 1){
        let url = `../api/customer_page_livesearch.php?page=${page}`;
        if (query !== '') {
            url += `&search=${encodeURIComponent(query)}`;
        }
        fetch(url) //GET method default
            .then(response => response.text())
            .then(data => {
                liveResult.innerHTML = data; //Renders the rows echoed in the php
            })
            .catch(error => {
                liveResult.innerHTML = error;
                console.error(error);
        })
    }

}