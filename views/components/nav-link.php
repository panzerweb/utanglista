<!-- Header -->
<nav class="navbar navbar-expand-lg position-fixed w-100 z-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <embed src="../public/images/logo/logo.svg" type="image/svg+xml" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center mx-auto mb-2 mb-lg-0 gap-4">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-light active" href="./dashboard.php">Dashboard</a>
                        </li>
                        <!-- Super Admin Access ONLY -->
                        <?php if($_SESSION["admin_role"] === 'super_admin') { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-semibold text-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Super Admin
                                </a>
                                <ul class="dropdown-menu bg-success">
                                    <!-- Super Admin Access -->
                                    <?php if($_SESSION["admin_role"] === 'super_admin') { 
                                    ?>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold text-light" href="./user_dashboard.php">Users</a>
                                        </li>
                                    <?php } ?>
                                    
                                    <!-- Super Admin Access -->
                                    <?php if($_SESSION["admin_role"] === 'super_admin') { 
                                    ?>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold text-light" href="./logs.php">Logs</a>
                                        </li>
                                    <?php } ?>
                                    <!-- Super Admin Access -->
                                    <?php if($_SESSION["admin_role"] === 'super_admin') { 
                                    ?>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold text-light" href="./trash.php">Trash</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>


                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-light" href="./transactions.php">Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-light" href="./products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-light" href="./customer.php">Customer</a>
                        </li>                          
                    </ul>
                    <div class="d-flex align-items-center justify-content-center" role="search">
                        <?php include("welcome_admin.php") ?>
                        <div class="m-2">
                            <a href="./profile_page.php" class="text-dark">
                                <!-- Icon SVG is placeholder only, replace with actual image profile -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle text-light" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                                <!-- Remove d-none if actual image logic is there -->
                                <img src="" alt="profile" class="d-none">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>