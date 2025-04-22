//FullCalendarJS code template
/*
    This calendar does not fetch data by each date.
    Future features will be added...
*/
document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    dateClick:function(){ 
        Swal.fire({ //Replace this code with actual logic and process
            title: "Sample Alert",
            text: "You clicked a day!",
            icon: "question"
        });
        // console.log(info.dateStr);
    }
});
calendar.render();
});
