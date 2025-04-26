//FullCalendarJS code template
/*
    This calendar fetches data for each date clicked.
    Fetches and sorts data by its created_at field in the database
*/
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar-transact');
    let transactionResult = document.getElementById("transaction-result");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dateClick:function(info){ 
            let clickedDate = info.dateStr;
            
            console.log(clickedDate);
            // Sample syntax: SELECT * FROM transaction WHERE created_at LIKE '2025-04-2%';
            fetch('../../api/fetch_by_date.php?fetchdate=' + encodeURIComponent(clickedDate))
            .then(response => response.text())
            .then(data => {
                transactionResult.innerHTML = data;
                console.log(data);
            })
            .catch(error => {
                console.log(error);
            })
            // Toggle highlight on the clicked date cell
            let clickedCell = document.querySelector(`[data-date="${clickedDate}"]`);
            if (clickedCell) {
                clickedCell.classList.toggle("clicked-day");
            }
        }
    });
    calendar.render();
    });
    