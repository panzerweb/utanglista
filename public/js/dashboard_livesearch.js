// Javascript file using Fetch API to handle response from database server
let dashLiveSearch = document.getElementById("dash-livesearch"); // search input from in dashboard
let dashResult = document.getElementById("dash-live-result"); //refers to table body

dashLiveSearch.addEventListener("keyup", () => {
    const dashQuery = dashLiveSearch.value;

    if(dashQuery !== ''){
        fetch('../../api/dashboard_livesearch.php?dashsearch=' + encodeURIComponent(dashQuery)) //GET method
        .then(response => response.text())
        .then(data => {
            dashResult.innerHTML = data; //Renders echoed rows from php
        })
        .catch(error => {
            dashResult.innerHTML = error;
            console.log(error);
        })
    }
    else{
        let activeLink = window.location.pathname;
        window.location.href = activeLink; //Reloads the current page if no search query
    }
})