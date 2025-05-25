// Javascript file using Fetch API to handle response from database server

// Status filter, multiple checkbox template from https://stackoverflow.com/questions/14544104/checkbox-check-event-listener
let statusCheckBoxes = document.querySelectorAll("input[type=checkbox][name=status]");
let enabledStatus = [];
let pagination = document.querySelector(".pagination-nav");
let customerTable = document.getElementById("customer-table");

statusCheckBoxes.forEach(checkbox => {
    const liveResult = document.getElementById("live-result");
    checkbox.addEventListener("change", () => {
        enabledStatus = 
            Array.from(statusCheckBoxes) //Convert checkboxes to an array
            .filter(i => i.checked) // Filter and remove unchecked checkboxes
            .map(i => i.value); // Extract only the checkbox values from array

        console.log(enabledStatus); //prints the checked status

        if (enabledStatus.length > 0) {
            fetch('../api/status_fetch.php?status=' + enabledStatus)
            .then(response => response.text())
            .then(data => {
                liveResult.innerHTML = data;
                pagination.classList.add('d-none');
                customerTable.style.maxHeight = '400px';
                customerTable.style.overflowY = "auto";
                // console.log(data);
            })
            .catch(error => {
                console.log(error);
            })
        } else {
            fetch('../api/status_fetch.php')
            .then(response => response.text())
            .then(data => {
                liveResult.innerHTML = data;
                pagination.classList.remove('d-none');
                customerTable.style.maxHeight = '';
                customerTable.style.overflowY = "";
                // console.log(data);
            })
            .catch(error => {
                console.log(error);
            })
        }
    })
});
