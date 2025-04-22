<!-- place header here -->
<?php 
    //Header layout
    include("../api/auth.php");//aron d ma access if wala naka log-in   
    include("./layout/header.php");
    include("../config/config.php");
    include("../api/get_customer.php");
    include("../api/get_product.php");
    include("../api/get_transaction.php");
?>

<main>
    <div class="container">

        <!-- ====== Row for search ====== -->

        <div class="row justify-content-around">
            <div class="col-12 col-lg-12">
                <div class="mt-4 mb-3">
                    <h1>Hello, 
                        <!-- Admin is placeholder, apply Session for a logged in user -->
                        <?php echo htmlspecialchars($_SESSION["admin_name"]) ?>
                    </h1>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="shadow p-2 border border-1 rounded-4">
                    <div class="flex-grow-1">
                        <input
                            type="text"
                            class="form-control border border-1 border-secondary rounded-3 w-100"
                            id="transaction-livesearch"
                            aria-describedby="helpId"
                            placeholder="Search"
                        />
                    </div>
                </div>  
            </div>
            <div class="col-12 col-lg-4">
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
                <div class="table-responsive rounded-4 shadow p-2 border border-1" style="max-height: 400px; overflow-y: auto;">
                    
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Date</th>
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
                                            <?php echo htmlspecialchars($transaction["qty"]) ?>
                                        </td>
                                        <td class='text-center'>
                                            <?php echo htmlspecialchars($transaction["amount"]) ?>
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

<!-- place footer here -->
<?php 
    //Header layout
    include("./layout/footer.php");
?>