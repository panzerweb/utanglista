<!-- Place all includes -->

<link rel="stylesheet" href="../public/css/dashboard_habitica.css">
<?php 
    //Header layout
    include("../api/auth.php");//aron d ma access if wala naka log-in   
    include("./layout/header.php");
    include("../config/config.php");

?>
<main>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <!-- Authorization Message -->
            <?php 
                if ($_SESSION["admin_role"] !== 'super_admin') {
                    include("./components/authorized.php");
                    return;
                }
            ?>
            <img
                src="../public/images/background/Under_Construction.svg"
                class="img-fluid rounded-top"
                style="width: 80%;"
                alt="Under Construction"
            />
        </div>
    </div>
</main>

<!-- place footer here -->
<?php 
    //Header layout
    include("./layout/footer.php");
?>