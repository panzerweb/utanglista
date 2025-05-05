<!-- Dashboard View -->
<!-- place navbar here -->
<?php 
    //Header layout
    include("../api/auth.php");///aron d ma access if wala naka log-in
    include("./layout/header.php");
    include("../config/config.php");
    include("../api/get_customer.php");
    include("../api/get_product.php");
    include("../api/get_stats_dashboard.php");


?>
<!-- Tutorial Added -->
<script defer src="../public/js/tutorial/dashboard_tutorial.js"></script>

<main>
    <div class="container">
        <div class="row justify-content-center mx-1">
            <!-- Include the admin header greeting -->
            <?php include('./components/welcome_admin.php') ?>

            <!-- Statistics -->
            <div class="col-12 col-lg-12 statistic-wrapper shadow p-3 rounded-3">
                <div class="row justify-content-around align-items-center">
                    <div class="col-6 col-lg-3">

                        <!-- ====== Shows total Count of Customers ====== -->

                        <div id="total-customer" 
                            class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3">
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
                            class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3">
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
                            class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3">
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
                            class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3">
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
                </div>
            </div>

            <!-- ====== Action Buttons & Search section ====== -->

            <div class="col-12 col-lg-12 actions-wrapper">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7 bg-light shadow my-2 rounded-3">
                    <div class="my-3 d-flex gap-2 py-1">

                        <!-- ====== Search field ====== -->

                        <div class="flex-grow-1">
                            <input
                                type="text"
                                class="form-control border border-1 border-secondary rounded-3 w-75"
                                id="dash-livesearch"
                                aria-describedby="helpId"
                                placeholder="🔍Search"
                            />
                        </div>

                        <!-- ====== Add Customer Button ====== -->

                        <div class="add-customer-button d-grid gap-2">
                            <button
                                type="button"
                                class="btn action-button"
                                data-bs-toggle="modal"
                                data-bs-target="#addCustomerModal"
                            >
                                <div class="d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                    </svg>
                                    Add Customer
                                </div>
                            </button>
                            
                        </div>
                        <!-- Include the Modal from components folder -->
                            <?php
                            include('./components/addcustomer_modal.php');
                            ?>
                        
                    </div>
                    
                </div>

                <div class="col-12 col-lg-4 bg-light shadow my-2 py-3 rounded-3 d-flex align-items-center justify-content-center">                                

                    <div class="d-flex justify-content-around gap-3 align-items-center">

                        <!-- ====== Add Product Button ====== -->

                        <div class="add-product-button d-grid gap-2">
                            <button
                                type="button"
                                class="btn action-button w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#addProductModal"
                            >
                                <div class="d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                    </svg>
                                    Add Product
                                </div>
                            </button>
                        </div>  
                        
                        <!-- Include the Modal from components folder -->
                        <?php
                            include('./components/addproduct_modal.php');
                        ?>
                        

                        <!-- ====== Add Transaction Button ====== -->

                        <div class="transaction-button d-grid gap-2">
                            <button
                                type="button"
                                class="btn action-button w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#transactionModal"
                            >
                                <div class="d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                                    </svg>
                                    Transaction
                                </div>
                            </button>
                        </div>
                            <!-- Include the Modal from components folder -->
                            <?php
                                include('./components/transaction_modal.php');
                            ?>
                    </div>

                </div>

            </div>
            </div>


            <!-- Row for table and calendar -->
            <div class="col-12 col-lg-12 table-and-calendar">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-7 my-1 px-0">
                        <div class="table-responsive rounded-4 overflow-x-hidden overflow-y-auto shadow border border-1" style="height: 95%; max-height: fit-content;">
                            <div class="leaderboard-wrapper position-sticky bg-success text-light top-0 z-1 py-2">
                                <div class="leaderboard-box px-2">
                                    <h3 class="position-sticky top-0 z-1 py-2">
                                        <div class="d-flex align-items-center gap-1 fw-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                                            </svg>
                                            Leaderboards
                                        </div>
                                    </h3>
                                    
                                </div>
                            </div>

                            <!-- ====== Leaderboard: Table for highest to lowest balance -->

                            <table class="table table-hover table-striped table-bordered mb-0 table-contain">
                                <thead class="table-light">
                                    <tr>
                                    <th scope="col">Ranking</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider" id="dash-live-result">
                                    <!-- ====== Dynamic data for greatest to least balance ====== -->
                                    <?php foreach($sortByBalance as $customer) { ?>
                                        <tr>
                                            <td class="fw-bold">
                                                <?php if($customer["ranking"] == 1) { ?>
                                                    <span class="badge bg-warning text-dark fs-6"><?php echo htmlspecialchars($customer['ranking']); ?></span>
                                                <?php } else { ?>
                                                    <span class="badge bg-secondary text-light fs-6"><?php echo htmlspecialchars($customer['ranking']); ?></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($customer['c_name'] ? $customer['c_name'] : '<td class="text-center">---</td>'); ?>
                                            </td>
                                            <td>
                                                ₱ <?php echo htmlspecialchars($customer['balance']); ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ====== Calendar ====== -->
                     
                    <div class="col-12 col-lg-4 px-0">
                        <div class="card text-start mb-3">
                            <div class="card-body">                          
                                <!-- Full Calendar Library -->
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</main>


<?php
    include("./layout/footer.php")
?>


