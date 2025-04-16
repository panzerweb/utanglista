// Javascript file using Fetch API to handle response from database server
const liveSearch = document.getElementById('livesearch'); //search input field in customer page
const liveResult = document.getElementById("live-result"); // refers to the table body

liveSearch.addEventListener('keyup', () => { 
    const query = liveSearch.value;

    if (query !== '') {
        fetch('../../api/customer_page_livesearch.php?search=' + encodeURIComponent(query)) //GET method default
        .then(response => response.text())
        .then(data => {
            liveResult.innerHTML = data; //Renders the rows echoed in the php
        })
        .catch(error => {
            liveResult.innerHTML = error;
            console.error(error);
        })
    } else {
        // Instead of reloading, we fetch just the default data
        fetch('../../api/customer_page_livesearch.php') //GET method default
        .then(response => response.text())
        .then(data => {
            liveResult.innerHTML = data; //Renders the rows echoed in the php
        })
        .catch(error => {
            liveResult.innerHTML = error;
            console.error(error);
        })

    }
})
