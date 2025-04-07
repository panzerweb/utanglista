//FullCalendarJS code template
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
    }
});
calendar.render();
});
