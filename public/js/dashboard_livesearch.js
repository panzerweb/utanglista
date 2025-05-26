// Javascript file using Fetch API to handle response from database server
let dashLiveSearch = document.getElementById("dash-livesearch"); // search input from in dashboard
let dashResult = document.getElementById("dash-live-result"); //refers to table body

if (dashLiveSearch && dashResult) {
    document.addEventListener("DOMContentLoaded", () => {
        fetchData('', 1);
    });
    dashLiveSearch.addEventListener("keyup", () => {
        const dashQuery = dashLiveSearch.value;
        fetchData(dashQuery, 1);
    })
        // Listen for clicks anywhere on the document
    // Handles the next page of the pagination
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("pagination-link")) {
            e.preventDefault();
            // Get the data-page attribute
            const page = parseInt(e.target.getAttribute("data-page"));
            const dashQuery = dashLiveSearch.value.trim();
            // Now the second parameter is base on the next page
            fetchData(dashQuery, page);
        }
    });
    function fetchData(dashQuery = '', page = 1){
        let url = `../api/dashboard_livesearch.php?page=${page}`;
        if (dashQuery !== '') {
            url += `&dashsearch=${encodeURIComponent(dashQuery)}`;
        }
        fetch(url) //GET method default
            .then(response => response.text())
            .then(data => {
                dashResult.innerHTML = data; //Renders the rows echoed in the php
            })
            .catch(error => {
                dashResult.innerHTML = error;
                console.error(error);
        })
    }
}