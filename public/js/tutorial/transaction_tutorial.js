document.addEventListener("DOMContentLoaded", () => {
    if(!sessionStorage.getItem('preload-transaction')){
        Swal.fire({
            title: "<h2 style='font-family: fantasy;'>🏠 Transaction Overview</h2>",
            html: `
                <p style="font-size: 1.2rem;">
                    In the transaction, you'll find the overview of all transactions in the store<br><br>
                    Perform <strong>transaction</strong> through clicking the <span class='badge bg-success'>transaction</span> button <br><br>
                    🗓️ To explore daily transactions, simply click on each date in the <strong>calendar</strong>.
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
                            Insert your first transaction now!<br><br>
                            Feel free to explore and let me know if you need further assistance.
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

        sessionStorage.setItem('preload-transaction', 'true'); // Un-comment to prevent repeat tutorials
    }
})

function loadTransactTutorial(){
    Swal.fire({
        title: "<h2 style='font-family: fantasy;'>🏠 Transaction Overview</h2>",
        html: `
            <p style="font-size: 1.2rem;">
                In the transaction, you'll find the overview of all transactions in the store<br><br>
                Perform <strong>transaction</strong> through clicking the <span class='badge bg-success'>transaction</span> button <br><br>
                🗓️ To explore daily transactions, simply click on each date in the <strong>calendar</strong>.
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
                        Insert your first transaction now!<br><br>
                        Feel free to explore and let me know if you need further assistance.
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

    sessionStorage.setItem('preload-transaction', 'true'); // Un-comment to prevent repeat tutorials
}


let reopenTutorialBtn = document.getElementById("dash-tutorial-btn");

reopenTutorialBtn.addEventListener("click", () => {
    sessionStorage.removeItem('preload-transaction');
    setTimeout(() => {
        if(!sessionStorage.getItem('preload-transaction')){
            loadTransactTutorial();
        }
    }, 1000);
})