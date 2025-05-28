<!-- place header here -->

<link rel="stylesheet" href="../public/css/dashboard_habitica.css">
<?php 
    //Header layout
    include("../api/auth.php");//aron d ma access if wala naka log-in   
    include("./layout/header.php");
    include("../config/config.php");
    include("../api/get_customer.php");
    include("../api/get_product.php");
    include("../api/get_transaction.php");
?>
<!-- FullCalendar script-->
<script src="../public/js/fullcalendar-6.1.17/dist/index.global.min.js"></script>
<script src="../public/js/bydate_calendar.js"></script>
<!-- Tutorial Added -->
<script defer src="../public/js/tutorial/transaction_tutorial.js"></script>

<main>
    <div class="container">

        <!-- ====== Row for search ====== -->

        <div class="row justify-content-around" id="search-and-transaction">

            <div class="order-2 order-lg-1 col-12 col-lg-8">
                <div class="shadow p-2 border border-1 rounded-4">
                    <div class="flex-grow-1">
                        <input
                            type="text"
                            class="form-control border border-1 border-secondary rounded-3 w-100"
                            id="transaction-livesearch"
                            aria-describedby="helpId"
                            placeholder="🔍Search (Product or Customer)"
                        />
                    </div>
                </div>  
            </div>
            <div class="order-1 order-lg-2 col-12 col-lg-4">
                <div class="shadow p-2 border border-1 rounded-4">
                    <div class="d-grid gap-2">
                        <button
                            type="button"
                            class="btn action-button w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#transactionModal"
                        >
                                <div class="d-flex gap-2 align-items-center text-center mx-auto">
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

        <!-- ====== Row for table and calendar ====== -->

        <div class="row justify-content-around mt-3">
            <div class="col-12 col-lg-8">
                <div class="table-responsive rounded-4 shadow border border-1" id="transaction-table">
                    <div class="customer-wrapper position-sticky bg-success text-light top-0 z-1 py-2">
                        <div class="customer-box px-2">
                            <h3 class="position-sticky top-0 z-1 py-2">
                                <div class="d-flex align-items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                    </svg>
                                    Transactions
                                </div>
                            </h3>
                            
                        </div>
                    </div>
                    <table class="table table-sm table-hover table-striped table-bordered mb-0 table-contain">
                        <thead>
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Product</th>
                                <th class="text-center">Customer</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th class="text-center">Date</th>
                            </tr>
                        </thead>
                        <tbody id="transaction-result">
                            <!-- Dynamic data that fetches transaction data -->
                            <?php if (empty($transactions)) { ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        No transactions found for today 
                                        <span class="text-dark fw-semibold"><?php echo date("Y/m/d") ?></span>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <?php foreach ($transactions as $transaction) { ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlspecialchars($transaction["prod_name"]) ?>
                                        </td>
                                        <td class='text-center'>
                                            <?php echo htmlspecialchars($transaction["c_name"]) ?>
                                        </td>
                                        <td class='text-center'>
                                            <span class="badge bg-success"><?php echo htmlspecialchars($transaction["qty"]) ?></span>
                                        </td>
                                        <td class='text-center'>
                                            ₱ <?php echo htmlspecialchars($transaction["amount"]) ?>
                                        </td>
                                        <?php $date = date_create($transaction["created_at"]); ?>
                                        <td class='text-center'>
                                            <?php echo date_format($date, "Y/m/d H:i:s A") ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>

                        </tbody>
                    </table>     
                               
                </div>



            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-start mb-3">
                    <div class="card-body">                          
                        <!-- Full Calendar Library -->
                        <div id='calendar-transact'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Tutorial -->
<div class="position-relative">
    <div class="position-absolute bottom-0 start-0 m-2">
        <!-- Tutorial Button -->
        <button
            type="button"
            class="btn btn-dark"
            id="dash-tutorial-btn"
        >
            <span class="fs-5">
            📙Tutorial
            </span>
        </button>
    </div>
</div>
<!-- place footer here -->
<?php 
    //Header layout
    include("./layout/footer.php");
?>