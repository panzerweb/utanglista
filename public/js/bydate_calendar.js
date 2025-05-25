

document.addEventListener('DOMContentLoaded', function (e) {
    const calendarEl = document.getElementById('calendar-transact');
    const transactionResult = document.getElementById("transaction-result");
    const pagination = document.querySelector(".pagination-nav");
    const transactionTable = document.getElementById("transaction-table");

    let clickedDate = ''; // Stores the last clicked date
    let previouslyClickedCell = null; // To track and reset the previously highlighted cell

    fetchData('', 1); // Fetch all by default

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dateClick: function (info) {
            clickedDate = info.dateStr;

            // Remove highlight from the previously clicked cell
            if (previouslyClickedCell) {
                previouslyClickedCell.classList.remove("clicked-day");
            }

            // Highlight the new clicked cell
            const currentCell = document.querySelector(`[data-date="${clickedDate}"]`);
            if (currentCell) {
                currentCell.classList.add("clicked-day");
                previouslyClickedCell = currentCell; // Update tracker
            }

            fetchData(clickedDate, 1); // Fetch based on date
        },
    });
            
    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("pagination-link")) {
            e.preventDefault();
            const page = parseInt(e.target.getAttribute("data-page"));
            const date = clickedDate;
            console.log(date + "|" + page);
            fetchData(date, page); // ← ✅ you already use the correct clickedDate
        }
    });
    
    function fetchData(date = '', page = 1) {
        let url = `../api/fetch_by_date.php?page=${page}`;
        if (date !== '') {
            url += `&fetchdate=${encodeURIComponent(date)}`;
        }

        fetch(url)
            .then(response => response.text())
            .then(data => {
                transactionResult.innerHTML = data;
                console.log(data);
            })
            .catch(error => {
                console.log("Fetch error:", error);
            });
    }

    calendar.render();
});
