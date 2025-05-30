document.addEventListener("DOMContentLoaded", () =>{
    if (!sessionStorage.getItem('preload-product')) {
        Swal.fire({
            title: "<h2 style='font-family: fantasy;'>🛒 Product Overview</h2>",
            html: `
                <p style="font-size: 1.2rem;">
                    <strong>Product Page</strong>, where all products are stored and showcase.
                    <br>
                    <br>
                    <strong><span class='text-primary'>Add</span>, <span class='text-danger'>delete</span>, <span class='text-success'>update</span></strong>, and <strong>scroll</strong> your products.
                    <br>
                    Bring up a product's <strong>category</strong> as well by creating one.
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
                    title: "<h2 style='font-family: fantasy;'>Manage your Products!</h2>",
                    html: `
                        <p style="font-size: 1.2rem;">
                            Start managing the inventory of this system!<br><br>
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
        
        sessionStorage.setItem('preload-product', 'true'); // Prevent repeat tutorials if needed
    }
})

function loadProductTutorial(){
    Swal.fire({
            title: "<h2 style='font-family: fantasy;'>🛒 Product Overview</h2>",
            html: `
                <p style="font-size: 1.2rem;">
                    <strong>Product Page</strong>, where all products are stored and showcase.
                    <br>
                    <br>
                    <strong><span class='text-primary'>Add</span>, <span class='text-danger'>delete</span>, <span class='text-success'>update</span></strong>, and <strong>scroll</strong> your products.
                    <br>
                    Bring up a product's <strong>category</strong> as well by creating one.
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
                    title: "<h2 style='font-family: fantasy;'>Manage your Products!</h2>",
                    html: `
                        <p style="font-size: 1.2rem;">
                            Start managing the inventory of this system!<br><br>
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

let reopenTutorialBtn = document.getElementById("dash-tutorial-btn");

reopenTutorialBtn.addEventListener("click", () => {
    sessionStorage.removeItem('preload-product');
    setTimeout(() => {
        if(!sessionStorage.getItem('preload-product')){
            loadProductTutorial();
        }
    }, 1000);
})