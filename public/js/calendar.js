//FullCalendarJS code template

/*
    This calendar does not fetch data by each date.
    
    Retrieves the overview data from `date_overviews.php`
    implements Sweet Alert for the modal overview pop up
    Features: 
        - Total customers by date
        - Total No. of products sold
        - Total amount of products sold
        - Is there any payment made? payment : 0
*/
document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    dateClick:function(info){ 
        // Two date variables function the same, but used differently
        let dateToFormat = new Date(info.dateStr); //To be formatted to a more readable format
        let clickedDate = info.dateStr; //To be processed by the server
        /*
            Disclaimer: The use of 2 date variables is for consistency in the data processing
                        especially when requesting a response from server; in the server, we
                        only used yyyy-mm-dd to send a request, not the format of Date() constructor
        */
        if (isNaN(dateToFormat)) {
            console.error("Invalid date:", info.dateStr);
            return;
        }
        let formattedDate = dateToFormat.toLocaleDateString('en-US', {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        });
        console.log(clickedDate);
        console.log(formattedDate); // e.g., "April 26, 2025"
        
        //Fetch the overview data
        fetch('../../api/date_overviews.php?overview=' + encodeURIComponent(clickedDate))
        .then(response => response.json())
        .then(data => {
            console.log(data);
            Swal.fire({
                title: "<strong>Daily Overview</strong>",
                icon: "info",
                //Input inside the backtick quotes any HTML element to be added
                html: `
                    <div class="card text-start shadow-sm border-0">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <span class="badge bg-primary fs-5">${formattedDate}</span>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">                                   
                                    <strong class='d-flex align-items-center'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                        </svg>
                                        Total Customers:
                                    </strong> 
                                    <span id="total-customer-day" class="text-success fw-semibold">${data.totalCustomerByDay}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong class='d-flex align-items-center gap-1'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                                        </svg>
                                        Products Sold:
                                    </strong> 
                                    <span id="total-products-day" class="text-info fw-semibold">${data.products_sold}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong class='d-flex align-items-center gap-1'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-basket2-fill" viewBox="0 0 16 16">
                                        <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
                                        </svg>
                                        Qty of Products Sold:
                                    </strong> 
                                    <span id="total-products-day" class="text-info fw-semibold">${data.qty_products_sold}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong class='d-flex align-items-center gap-1'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                        </svg>
                                        Products Amount Sold:
                                    </strong> 
                                    <span id="total-products_sold-day" class="text-warning fw-semibold">${data.products_amount_sold}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong class='d-flex align-items-center gap-1'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                        <path d="M0 5a5 5 0 0 0 4.027 4.905 6.5 6.5 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05q-.001-.07.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.5 3.5 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98q-.004.07-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5m16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0m-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674z"/>
                                        </svg>
                                        Payment Collected:
                                    </strong> 
                                    <span id="total-payemnt-day" class="text-danger fw-semibold">${data.payment_collected}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                showConfirmButton: false,
            });
        })
        .catch(error => {
            console.log(error);
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong fetching the data!",
            });
        });
        
        // console.log(info.dateStr);
    }
});
calendar.render();
});
