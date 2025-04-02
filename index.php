<!-- Registration and Homepage View -->
<!-- Php Code for Registration -->
<?php

?>

<!-- End of Php Code -->
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.3.3 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <!-- place navbar here -->
        <?php 
            //Header layout
            include("./views/layout/header.php");
        ?>
        
        <main>
            <!-- Section for Registration -->
            <div class="container">
                <div class="row justify-content-center">
                    <h1 class="text-center">UtangLista</h1>
                    <div class="col-12 col-lg-4">
                        <form action="" method="">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="form-control"
                                    placeholder="Enter Username"
                                    aria-describedby="helpId"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    id="password"
                                    placeholder="Enter Password"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Confirm Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="confirm_pass"
                                    id="confirm_pass"
                                    placeholder="Confirm Password"
                                />
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                Register
                            </button>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php
            include("./views/layout/footer.php")
        ?>
        
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
