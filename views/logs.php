<!-- place header here -->
<?php 
    
    include("../api/auth.php");///aron d ma access if wala naka log-in
    include("./layout/header.php");
    include("../config/config.php");
    include("../api/get_customer.php");
    include("../api/get_product.php");
    include("../api/get_stats_dashboard.php");
?>

<main>
    <div class="container py-1 mb-5">

         <!-- Include the admin header greeting -->
        <?php include('./components/welcome_admin.php') ?>
        
        <!-- ====== Overview statistics ====== -->

        <div class="row">
            <div class="col-6 col-lg-3">
                <!-- ====== Shows total Count of Customers ====== -->

                <div id="total-customer" 
                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3 shadow border border-1 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-people-fill text-success" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    </svg>
                    <div class="info-box-content">
                        <h5 class="fw-semibold text-secondary">Total Customers</h5>
                        <span class="lead fw-bold fs-2 text-center">
                            <!-- Displays total count of customers -->
                            <?php
                                echo htmlspecialchars($totalCount);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div id="amount-collect" 
                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3 shadow border border-1 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-piggy-bank-fill text-success" viewBox="0 0 16 16">
                        <path d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069q0-.218-.02-.431c.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a1 1 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.74.74 0 0 0-.375.562c-.024.243.082.48.32.654a2 2 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595m7.173 3.876a.6.6 0 0 1-.098.21l-.044-.025c-.146-.09-.157-.175-.152-.223a.24.24 0 0 1 .117-.173c.049-.027.08-.021.113.012a.2.2 0 0 1 .064.199m-8.999-.65a.5.5 0 1 1-.276-.96A7.6 7.6 0 0 1 7.964 3.5c.763 0 1.497.11 2.18.315a.5.5 0 1 1-.287.958A6.6 6.6 0 0 0 7.964 4.5c-.64 0-1.255.09-1.826.254ZM5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0"/>
                    </svg>
                    <div class="info-box-content">
                        <h5 class="fw-semibold text-secondary">Amount to Collect</h5>
                        <span class="lead fw-bold fs-2 text-center">
                            <!-- Echo is placeholder -->
                            <?php
                                echo htmlspecialchars($totaluncollectedAmount);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div id="collected-amount" 
                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3 shadow border border-1 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-cash text-success" viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                    </svg>
                    <div class="info-box-content">
                        <h5 class="fw-semibold text-secondary">Collected Amount</h5>
                        <span class="lead fw-bold fs-2 text-center">
                            <!-- Echo is placeholder -->
                            <?php
                                echo htmlspecialchars($totalCollectedAmount);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div id="inventory-total" 
                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3 shadow border border-1 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-basket2-fill text-success" viewBox="0 0 16 16">
                        <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
                    </svg>
                    <div class="info-box-content">
                        <h5 class="fw-semibold text-secondary">Inventory</h5>
                        <span class="lead fw-bold fs-2 text-center">
                            <!-- Echo is placeholder -->
                            <?php
                                echo htmlspecialchars($totalProdCount);
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div id="inventory-total" 
                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3 shadow border border-1 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-bag-check-fill text-success" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                    </svg>
                    <div class="info-box-content">
                        <h5 class="fw-semibold text-secondary">Products Sold</h5>
                        <span class="lead fw-bold fs-2 text-center">
                            <!-- Echo is placeholder -->
                            <?php
                                echo 0; // Placeholder for products sold count
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div id="inventory-total" 
                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3 shadow border border-1 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-basket2 text-success" viewBox="0 0 16 16">
                    <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0z"/>
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6z"/>
                    </svg>
                    <div class="info-box-content">
                        <h5 class="fw-semibold text-secondary">Qty of Products Sold</h5>
                        <span class="lead fw-bold fs-2 text-center">
                            <!-- Echo is placeholder -->
                            <?php
                                echo 0; // Placeholder for quantity of products sold
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div id="inventory-total" 
                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3 shadow border border-1 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-cart4 text-success" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                    </svg>
                    <div class="info-box-content">
                        <h5 class="fw-semibold text-secondary">Products Amount Sold</h5>
                        <span class="lead fw-bold fs-2 text-center">
                            <!-- Echo is placeholder -->
                            <?php
                                echo 0; // Placeholder for products amount sold
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div id="inventory-total" 
                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3 shadow border border-1 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-file-spreadsheet-fill text-success" viewBox="0 0 16 16">
                    <path d="M12 0H4a2 2 0 0 0-2 2v4h12V2a2 2 0 0 0-2-2m2 7h-4v2h4zm0 3h-4v2h4zm0 3h-4v3h2a2 2 0 0 0 2-2zm-5 3v-3H6v3zm-4 0v-3H2v1a2 2 0 0 0 2 2zm-3-4h3v-2H2zm0-3h3V7H2zm4 0V7h3v2zm0 1h3v2H6z"/>
                    </svg>
                    <div class="info-box-content">
                        <h5 class="fw-semibold text-secondary">Total Transactions</h5>
                        <span class="lead fw-bold fs-2 text-center">
                            <!-- Echo is placeholder -->
                            <?php
                                echo 0; // Placeholder for total transactions
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== Logs Section ====== -->
        
        <div class="row g-4 mt-1">
            <!-- Customer Logs -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-success">
                        <h5 class="card-title mb-0 text-light">Customer Logs</h5>
                        <button type="button" class="btn btn-warning py-1 px-3">
                            See All
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex px-3 justify-content-between align-items-center border-bottom py-2">
                            <div class="mb-2">
                                <span class="fw-semibold text-primary">Admin</span>
                                <span class="text-muted">added</span>
                                <span class="fw-semibold text-dark">John Doe</span>
                            </div>
                            <div class="text-muted small">
                            Created at: 2025-04-28 10:32 AM
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Logs -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-success">
                        <h5 class="card-title mb-0 text-light">Product Logs</h5>
                        <button type="button" class="btn btn-warning py-1 px-3">
                            See All
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex px-3 justify-content-between align-items-center border-bottom py-2">
                            <div class="mb-2">
                                <span class="fw-semibold text-primary">Admin</span>
                                <span class="text-muted">added</span>
                                <span class="fw-semibold text-dark">Milo</span>
                            </div>
                            <div class="text-muted small">
                            Created at: 2025-04-28 10:32 AM
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Transaction Logs -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-success">
                        <h5 class="card-title mb-0 text-light">Transaction Logs</h5>
                        <button type="button" class="btn btn-warning py-1 px-3">
                            See All
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex px-3 justify-content-between align-items-center border-bottom py-2">
                            <div class="mb-2">
                                <span class="fw-semibold text-primary">Customer</span>
                                <span class="text-muted">purchased</span>
                            </div>
                            <div class="text-muted small">
                            Created at: 2025-04-28 10:32 AM
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Payment Logs -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-success">
                        <h5 class="card-title mb-0 text-light">Payment Logs</h5>
                        <button type="button" class="btn btn-warning py-1 px-3">
                            See All
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex px-3 justify-content-between align-items-center border-bottom py-2">
                            <div class="mb-2">
                                <span class="fw-semibold text-primary">Customer</span>
                                <span class="text-muted">paid</span>
                            </div>
                            <div class="text-muted small">
                            Created at: 2025-04-28 10:32 AM
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</main>

<!-- place footer here -->
<?php 
    //Header layout
    include("./layout/footer.php");
?>