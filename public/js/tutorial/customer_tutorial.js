document.addEventListener("DOMContentLoaded", () => {
    if(!sessionStorage.getItem('preload-customer')){
        Swal.fire({
            title: "<h2 style='font-family: fantasy;'>👥 Customer Overview</h2>",
            html: `
                <p style="font-size: 1.2rem;">
                    Here, you can manage your <strong>customers</strong> — view their balances, monthly interest rates, and status.<br><br>
                    Quickly <strong>edit</strong>, <strong>record payments</strong>, or <strong>delete</strong> customers with the action buttons.<br><br>
                    🏆 The <strong>Leaderboard</strong> highlights top customers based on their standing.<br><br>
                    🔍 Use <strong>Live Search</strong> and <strong>Status Filter</strong> to easily find and organize customers.
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
                Swal.fire({
                    title: "<h2 style='font-family: fantasy;'>You're Ready!</h2>",
                    html: `
                        <p style="font-size: 1.2rem;">
                            Start managing your customers now!<br><br>
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
        
        sessionStorage.setItem('preload-customer', 'true'); // Prevent repeat tutorials if needed
        
    }
})

function loadCustomerTutorial(){
    Swal.fire({
        title: "<h2 style='font-family: fantasy;'>👥 Customer Overview</h2>",
        html: `
            <p style="font-size: 1.2rem;">
                Here, you can manage your <strong>customers</strong> — view their balances, monthly interest rates, and status.<br><br>
                Quickly <strong>edit</strong>, <strong>record payments</strong>, or <strong>delete</strong> customers with the action buttons.<br><br>
                🏆 The <strong>Leaderboard</strong> highlights top customers based on their standing.<br><br>
                🔍 Use <strong>Live Search</strong> and <strong>Status Filter</strong> to easily find and organize customers.
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
            Swal.fire({
                title: "<h2 style='font-family: fantasy;'>You're Ready!</h2>",
                html: `
                    <p style="font-size: 1.2rem;">
                        Start managing your customers now!<br><br>
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
    
    sessionStorage.setItem('preload-customer', 'true'); // Prevent repeat tutorials if needed
    
}


let reopenTutorialBtn = document.getElementById("dash-tutorial-btn");

reopenTutorialBtn.addEventListener("click", () => {
    sessionStorage.removeItem('preload-customer');
    setTimeout(() => {
        if(!sessionStorage.getItem('preload-customer')){
            loadCustomerTutorial();
        }
    }, 1000);
})