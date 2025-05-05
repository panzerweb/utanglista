<!-- Header for Login and Registration -->
<!doctype html>
<html lang="en">
    <head>
        <title>UtangLista</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Sweet Alert -->
        <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">


        <!-- Bootstrap CSS v5.3.3 -->

        <link rel="stylesheet" href="./public/css/bootstrap/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Utang Lista </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li> -->
                    </ul>
                        <div class="d-flex">
                        <?php
                            if (stripos($_SERVER['REQUEST_URI'], 'login.php')){
                                echo '
                                <a href="./index.php">
                                    <button class="btn btn-outline-success" type="submit">Home</button>
                                </a>
                                ';
                            }
                            else if (stripos($_SERVER['REQUEST_URI'], 'signup.php')){
                                echo '
                                <a href="./index.php">
                                    <button class="btn btn-outline-success" type="submit">Home</button>
                                </a>
                                ';
                            }
                            else{
                                echo '
                                <a href="./signup.php">
                                    <button class="btn btn-outline-success" type="submit">Sign In</button>
                                </a>
                                ';
                            }

                        ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>