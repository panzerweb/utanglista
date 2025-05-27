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
        <link rel="stylesheet" href="./public/css/guestheader.css">
        <link rel="stylesheet" href="./public/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-glass">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                    <span style="color:var(--primary)">UTANG</span> <span style="font-style:italic; color:var(--accent-second)">LISTA</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#members">Team</a>
                            </li>
                        </ul>
                        <div class="nav-buttons">
                        <?php
                            if (stripos($_SERVER['REQUEST_URI'], 'index.php')){
                                echo '
                                <a href="./login.php" class="nav-btn nav-btn-primary">Login</a>
                                <a href="./signup.php" class="nav-btn nav-btn-outline">Sign Up</a>
                                ';
                            }
                            else if (stripos($_SERVER['REQUEST_URI'], 'signup.php')){
                                echo '
                                <a href="./index.php" class="nav-btn nav-btn-primary">Home</a>
                                <a href="./login.php" class="nav-btn nav-btn-outline">Login</a>
                                ';
                            }
                            else{
                                echo '
                                <a href="./index.php" class="nav-btn nav-btn-primary">Home</a>
                                <a href="./signup.php" class="nav-btn nav-btn-outline">Sign Up</a>
                                ';
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>