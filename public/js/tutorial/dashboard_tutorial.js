document.addEventListener("DOMContentLoaded", () => {
    if (!sessionStorage.getItem('preload')) {
        Swal.fire({
            title: "<h2 style='font-family: fantasy;'>👋 Welcome, Admin!</h2>",
            html: `
                <p style="font-size: 1.2rem;">
                    Welcome to the <strong>UtangLista</strong> dashboard!<br><br>
                    🧙‍♂️ I will be your guide as you explore this simple yet powerful debt tracker.<br><br>
                    Let me walk you through the key features and functionalities.
                </p>
            `,
            confirmButtonText: '🎯 Start Tutorial',
            position: 'center',
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
                    title: "<h2 style='font-family: fantasy;'>🏠 Dashboard Overview</h2>",
                    html: `
                        <p style="font-size: 1.2rem;">
                            In the dashboard, you'll find an overview of the system, key statistics, and leaderboards displaying the top debtors.<br><br>
                            Here, you can easily access various actions such as adding customers, products, and performing transactions by clicking the relevant buttons.<br><br>
                            🗓️ To explore daily summaries, simply click on each date in the <strong>calendar</strong>.
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
                                    You are now ready to begin using <strong>UtangLista</strong> to manage your debt tracker.<br><br>
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
            }
        });

        sessionStorage.setItem('preload', 'true'); // Un-comment to prevent repeat tutorials
    }
});

function loadDashTutorial(){
    Swal.fire({
        title: "<h2 style='font-family: fantasy;'>👋 Welcome, Admin!</h2>",
        html: `
            <p style="font-size: 1.2rem;">
                Welcome to the <strong>UtangLista</strong> dashboard!<br><br>
                🧙‍♂️ I will be your guide as you explore this simple yet powerful debt tracker.<br><br>
                Let me walk you through the key features and functionalities.
            </p>
        `,
        confirmButtonText: '🎯 Start Tutorial',
        position: 'center',
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
                title: "<h2 style='font-family: fantasy;'>🏠 Dashboard Overview</h2>",
                html: `
                    <p style="font-size: 1.2rem;">
                        In the dashboard, you'll find an overview of the system, key statistics, and leaderboards displaying the top debtors.<br><br>
                        Here, you can easily access various actions such as adding customers, products, and performing transactions by clicking the relevant buttons.<br><br>
                        🗓️ To explore daily summaries, simply click on each date in the <strong>calendar</strong>.
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
                                You are now ready to begin using <strong>UtangLista</strong> to manage your debt tracker.<br><br>
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
        }
    });
    sessionStorage.setItem('preload', 'true'); // Un-comment to prevent repeat tutorial
}

let reopenTutorialBtn = document.getElementById("dash-tutorial-btn");

reopenTutorialBtn.addEventListener("click", () => {
    sessionStorage.removeItem('preload');
    setTimeout(() => {
        if(!sessionStorage.getItem('preload')){
            loadDashTutorial();
        }
    }, 1000);
})
