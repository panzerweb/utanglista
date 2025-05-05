function filterByYearMonth(){
    let filterSelect = document.getElementById('month-year-select').value;
    let displayStatsSpan = document.querySelectorAll('.display-stats');
    console.log(filterSelect);

        fetch('../api/logs_statistics.php?year_month=' + encodeURIComponent(filterSelect))
        .then(response => response.json())
        .then(data => {
            //Retrieve the JSON
            let entries = Object.entries(data);
            //Display each key-value pair to the span elements
            displayStatsSpan.forEach((span, index) => {
                if (entries[index]) {
                    const [key, value] = entries[index];
                    span.textContent = `${value}`;
                }
            })
            console.log(entries)
        })
        .catch(error => {
            console.error(error);     
        })

    

}