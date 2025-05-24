document.addEventListener("DOMContentLoaded", () => {
    if(!sessionStorage.getItem('preload-logs')){
        Swal.fire({
            title: "<h2 style='font-family: fantasy;'>🏠 Logs Overview</h2>",
            html: `
                <p style="font-size: 1.2rem;">
                    Welcome to the Logs! Here you will be able to see the overview, statistical data, as well as the various logs for different processes. <br>
                    This is an administrative access to the page, anyone who hasn't administrative access is hereby not allowed to view  this page.
                </p>
            `,
            confirmButtonText: '🎯 Continue Tutorial',
            position: 'bottom-end',
            width: 600,
            padding: "2em",
            color: "#44318D",
            background: "#fff url('../public/images/background/guide.gif') no-repeat bottom right",
            backdrop: 'rgba(0,0,123,0.4)',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                // You can add more steps here if needed
                Swal.fire({
                    title: "<h2 style='font-family: fantasy;'>You're Ready!</h2>",
                    html: `
                        <p style="font-size: 1.2rem;">
                            There are various statistical data applied here:
                            <ul>
                                <li>Total Customers</li>
                                <li>Amount to be collected</li>
                                <li>Collected amount</li>
                                <li>Total No. of Inventory</li>
                                <li>Type of Products Sold</li>
                                <li>Qty of products sold</li>
                                <li>Amount of products sold</li>
                                <li>Total No. of Transactions</li>
                            </ul>
                        </p>
                    `,
                    confirmButtonText: '🎯 Got It!',
                    position: 'center',
                    width: 600,
                    padding: "2em",
                    color: "#44318D",
                    background: "#fff url('../public/images/background/guide.gif') no-repeat bottom right",
                    backdrop: 'rgba(0,0,123,0.4)',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            }
        });

        sessionStorage.setItem('preload-logs', 'true'); // Un-comment to prevent repeat tutorials
    }
})

function loadLogsTutorial(){
    Swal.fire({
            title: "<h2 style='font-family: fantasy;'>🏠 Logs Overview</h2>",
            html: `
                <p style="font-size: 1.2rem;">
                    Welcome to the Logs! Here you will be able to see the overview, statistical data, as well as the various logs for different processes. <br><br>
                    <strong class='text-danger'>
                        This is an administrative access to the page, anyone who hasn't administrative access is hereby not allowed to view  this page.
                    </strong>
                </p>
            `,
            confirmButtonText: '🎯 Continue Tutorial',
            position: 'bottom-end',
            width: 600,
            padding: "2em",
            color: "#44318D",
            background: "#fff url('../public/images/background/guide.gif') no-repeat bottom right",
            backdrop: 'rgba(0,0,123,0.4)',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                // You can add more steps here if needed
                Swal.fire({
                    title: "<h2 style='font-family: fantasy;'>You're Ready!</h2>",
                    html: `
                        <p style="font-size: 1.2rem;">
                            There are various statistical data applied here:
                            <ul>
                                <li>Total Customers</li>
                                <li>Amount to be collected</li>
                                <li>Collected amount</li>
                                <li>Total No. of Inventory</li>
                                <li>Type of Products Sold</li>
                                <li>Qty of products sold</li>
                                <li>Amount of products sold</li>
                                <li>Total No. of Transactions</li>
                            </ul>

                            <strong>Note: </strong>
                            <p>Customer, Products, Transaction, and Payment are also recorded in the logs.</p>
                        </p>
                    `,
                    confirmButtonText: '🎯 Got It!',
                    position: 'center',
                    width: 600,
                    padding: "2em",
                    color: "#44318D",
                    background: "#fff url('../public/images/background/guide.gif') no-repeat bottom right",
                    backdrop: 'rgba(0,0,123,0.4)',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            }
        });

    sessionStorage.setItem('preload-logs', 'true'); // Un-comment to prevent repeat tutorials
}

let reopenTutorialBtn = document.getElementById("dash-tutorial-btn");

reopenTutorialBtn.addEventListener("click", () => {
    sessionStorage.removeItem('preload-logs');
    setTimeout(() => {
        if(!sessionStorage.getItem('preload-logs')){
            loadLogsTutorial();
        }
    }, 1000);
})