<?php 
    include("../api/auth.php");///aron d ma access if wala naka log-in
    include("./layout/header.php");
    include("../config/config.php");
    include("../api/get_customer.php");
    include("../api/get_stats_dashboard.php");

?>

<!-- Tutorial Added -->
<script defer src="../public/js/tutorial/customer_tutorial.js"></script>
<main>
    
<div class="container">
                <div class="row justify-content-around align-items-start mx-1 mt-3 mb-1">

                    <!-- Column for table of customers and action buttons -->
                    <div class="col-12 col-lg-8">
                        <div class="shadow p-2 border border-1 rounded-4">
                            <div class="my-3 d-flex gap-2 py-1 align-items-center">

                                <!-- ====== Filter ====== -->

                                <div class="filter-option">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                                <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu p-4">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" 
                                                        id="paidCheckbox" 
                                                        name="status" 
                                                        value="PAID">
                                                    <label class="form-check-label" for="paidCheckbox">
                                                        Paid
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" 
                                                            id="pendingCheckbox" 
                                                            name="status" 
                                                            value="PENDING">
                                                    <label class="form-check-label" for="pendingCheckbox">
                                                        Pending
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ====== Search input field ======= -->

                                <div class="flex-grow-1">
                                    <input
                                        type="text"
                                        class="form-control border border-1 border-secondary rounded-3 w-100"
                                        id="livesearch"
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
                                            <span class="d-none d-md-block">Add Customer</span>
                                        </div>
                                    </button>  
                                </div>
                                <!-- Include the Modal from components folder -->
                                <?php
                                include('./components/addcustomer_modal.php');
                                ?>

                            </div>
                        
                        </div>
                        <div class="mt-4 mb-3">
                            <div class="table-responsive rounded-4 shadow pt-0 border border-1" style="max-height: 400px; overflow-y: auto;">
                                
                                <!-- ====== Shows total Count of Customers ====== -->
                                
                                <div class="customer-wrapper position-sticky bg-success text-light top-0 z-1 py-2">
                                    <div class="customer-box">
                                        <h3 class="position-sticky top-0 z-1 py-1">
                                            <div class="d-flex align-items-center gap-1 px-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                                </svg>
                                                Total customer
                                                (
                                                <span class="text-warning">
                                                    <?php
                                                        echo $totalCount;
                                                    ?>
                                                </span>
                                                )
                                            </div>
                                            <span class="fs-5 px-2">
                                                Interest Rate: 
                                                <span class="text-warning">5%</span>
                                            </span>
                                        </h3>
                                        
                                    </div>
                                </div>
                                <table class="table table-hover table-striped table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <!-- <th>Id</th> -->
                                            <th>Name</th>
                                            <!-- <th>Contact No.</th> -->
                                            <th>Balance</th>
                                            <th>Interest</th>
                                            <!-- <th>Interest Rate</th> -->
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="live-result">
                                        <!-- Dynamic Data -->
                                        <?php foreach($customers as $customer) {?>
                                            <tr data-customer-id="<?= $customer['id'] ?>">
                                                <td>
                                                    <?php echo htmlspecialchars($customer['c_name'] ? $customer['c_name'] : '<td class="text-center">---</td>'); ?>
                                                </td>
                                                <!-- <td class="text-center">
                                                    <?php echo htmlspecialchars($customer['c_contact'] ? $customer['c_contact'] : '---'); ?>
                                                </td> -->
                                                <td class="text-center balance-cell">
                                                    ₱ <?php echo number_format(htmlspecialchars($customer["balance"]), 2); ?>
                                                </td>
                                                <td class="text-center interest-cell">
                                                    ₱ <?php echo number_format(htmlspecialchars($customer["monthly_interest"]), 2); ?>
                                                </td>
                                                <!-- <td class="text-center">
                                                    <?php echo number_format($interest, 2); ?>%
                                                </td> -->
                                                <td class="text-center">
                                                    <?php if($customer["status"] == 'PENDING') { ?>
                                                        <span class="badge rounded-pill text-bg-danger">
                                                            <?php echo htmlspecialchars($customer['status']); ?>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="badge rounded-pill text-bg-success">
                                                            <?php echo htmlspecialchars($customer['status']); ?>
                                                        </span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <!-- ====== Edit button ====== -->
                                                        <button
                                                            type="button"
                                                            name="edit_btn"
                                                            id="edit_btn"
                                                            class="btn btn-outline-dark border border-2 border-dark dark-button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editCustomerModal_<?php echo $customer['id']; ?>"
                                                        >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                        </svg>
                                                        </button>
                                                        <?php include("./components/editcustomer_modal.php") ?>

                                                        <!-- ====== Payment button ====== -->
                                                        <button
                                                            type="button"
                                                            name="payment_amount"
                                                            id="payment_btn"
                                                            class="btn btn-success payment-button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#paymentModal<?php echo $customer['id']; ?>"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                                                            </svg>
                                                        </button>
                                                        <!-- Include payment modal -->
                                                        <?php include("./components/payment_modal.php") ?>

                                                        <!-- ====== Delete Button ====== -->
                                                        <button
                                                            type="button"
                                                            name="delete_btn"
                                                            id="delete_btn_<?php echo $customer["id"]?>"
                                                            class="btn btn-danger action-delete-button"
                                                            onclick="deleteCustomer(<?php echo $customer['id']?>)"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                                
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ====== Column for ranking or leaderboards ====== -->
                    <div class="col-12 col-lg-4">
                        <div class="card p-3 border-0 rounded-4 shadow leaderboard-card bg-dark text-white">
                            <h4 class="card-title fw-bold mb-3">🏆 Leaderboards</h4>
                            <hr class="border-secondary mb-2">

                            <!-- Displays greatest to lowest balance-->
                            <?php foreach($sortByBalance as $customer) { ?>
                                <?php if($customer["ranking"] == 1) {?>
                                <div class="leader-entry d-flex justify-content-between align-items-center py-2 px-2 rounded-3 mb-2 bg-warning bg-opacity-50">        
                                    <span class="fw-semibold fs-5 d-flex align-items-center">
                                        <span class="fs-3">🥇</span>
                                        <?php echo htmlspecialchars($customer['c_name']) ?>
                                    </span>
                                    
                                    <span class="badge bg-warning text-dark fs-6 px-3 py-1">
                                        <?php echo htmlspecialchars($customer['ranking']); ?>
                                    </span>
                                </div>
                                <?php } else if($customer["ranking"] == 2) { ?>
                                    <div class="leader-entry d-flex justify-content-between align-items-center py-2 px-2 rounded-3 mb-2 bg-info bg-opacity-50">
                                        <span class="fw-semibold fs-5 d-flex align-items-center">
                                            <span class="fs-3">🥈</span>
                                            <?php echo htmlspecialchars($customer['c_name']) ?>
                                        </span>
                                        <span class="badge bg-light text-dark fs-6 px-3 py-1">
                                            <?php echo htmlspecialchars($customer['ranking']); ?>
                                        </span>
                                    </div>
                                <?php } else if($customer["ranking"] == 3) { ?>
                                    <div class="leader-entry d-flex justify-content-between align-items-center py-2 px-2 rounded-3 mb-2 bg-light bg-opacity-25">
                                        <span class="fw-semibold fs-5 d-flex align-items-center">
                                            <span class="fs-3">🥉</span>
                                            <?php echo htmlspecialchars($customer['c_name']) ?>
                                        </span>
                                        <span class="badge bg-light text-dark fs-6 px-3 py-1">
                                            <?php echo htmlspecialchars($customer['ranking']); ?>
                                        </span>
                                    </div>
                                <?php } else { ?>
                                    <div class="leader-entry d-flex justify-content-between align-items-center py-2 px-2 rounded-3 mb-2 bg-secondary bg-opacity-25">
                                        <span class="fw-semibold fs-5 d-flex align-items-center">
                                            <span class="fs-3">🏵️</span>
                                            <?php echo htmlspecialchars($customer['c_name']) ?>
                                        </span>
                                        <span class="badge bg-light text-dark fs-6 px-3 py-1">
                                            <?php echo htmlspecialchars($customer['ranking']); ?>
                                        </span>
                                    </div>
                                <?php } ?>
                            <?php } ?>

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
<?php 
    include("./layout/footer.php");
?>

