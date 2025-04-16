<?php 
    include("./layout/header.php");
    include("../config/config.php");
    include("../api/get_customer.php");
?>

<main>
    
<div class="container">
                <div class="row justify-content-around align-items-start mx-1 mt-3 mb-1">
                    <h1>
                        Customer
                    </h1>
                    <!-- Column for table of customers and action buttons -->
                    <div class="col-12 col-lg-8">
                        <div class="shadow p-2 border border-1 rounded-4">
                            <div class="my-3 d-flex gap-2 py-1">

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
                                        class="form-control border border-1 border-secondary rounded-3 w-75"
                                        id="livesearch"
                                        aria-describedby="helpId"
                                        placeholder="Search"
                                    />
                                </div>
                                <!-- ====== Add Customer Button ====== -->
                                <div class="add-customer-button">
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
                        <div class="mt-4 mb-3">
                            <div class="table-responsive rounded-4 shadow p-2 border border-1" style="max-height: 400px; overflow-y: auto;">
                                
                                <!-- ====== Shows total Count of Customers ====== -->
                                
                                <div class="customer-wrapper">
                                    <div class="customer-box">
                                        <h3 class="position-sticky top-0 bg-white z-1 py-2">
                                            <div class="d-flex align-items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                                </svg>
                                                Total customer
                                                (
                                                <?php
                                                    echo $totalCount;
                                                ?>
                                                )
                                            </div>
                                        </h3>
                                    </div>
                                </div>
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <!-- <th>Id</th> -->
                                            <th>Name</th>
                                            <th>Contact No.</th>
                                            <th>Balance</th>
                                            <th>Monthly Interest</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="live-result">
                                        <!-- Dynamic Data -->
                                        <?php foreach($customers as $customer) {?>
                                            <tr>
                                                <td>
                                                    <?php echo htmlspecialchars($customer['c_name'] ? $customer['c_name'] : '<td class="text-center">---</td>'); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo htmlspecialchars($customer['c_contact'] ? $customer['c_contact'] : '---'); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo htmlspecialchars($customer['balance']); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo htmlspecialchars($customer['monthly_interest']); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo htmlspecialchars($customer['status']); ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <!-- ====== Edit button ====== -->
                                                        <button
                                                            type="button"
                                                            name="edit_btn"
                                                            id="edit_btn"
                                                            class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editCustomerModal_<?php echo $customer['id']; ?>"
                                                        >
                                                            Edit
                                                        </button>
                                                        <?php include("./components/editcustomer_modal.php") ?>

                                                        <!-- ====== Payment button ====== -->
                                                        <button
                                                            type="button"
                                                            name="payment_amount"
                                                            id="payment_btn"
                                                            class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#paymentModal<?php echo $customer['id']; ?>"
                                                        >
                                                            Payment
                                                        </button>
                                                        <!-- Include payment modal -->
                                                        <?php include("./components/payment_modal.php") ?>

                                                        <!-- ====== Delete Button ====== -->
                                                        <a
                                                            id="<?php echo $customer["id"]?>"
                                                            class="btn btn-danger"
                                                            href="../api/delete_customer.php?customer_id=<?php echo $customer['id']; ?>"
                                                            role="button"
                                                            >Delete</a
                                                        >
                                                        
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
                                <div class="leader-entry d-flex justify-content-between align-items-center py-2 px-2 rounded-3 mb-2 bg-secondary bg-opacity-25">
                                    <span class="fw-semibold fs-5">
                                        <?php echo htmlspecialchars($customer['c_name']) ?>
                                    </span>
                                    <?php if($customer['ranking'] == 1){ ?>
                                        <span class="badge bg-warning text-dark fs-6 px-3 py-1">
                                            <?php echo htmlspecialchars($customer['ranking']); ?>
                                        </span>
                                    <?php } else{ ?>
                                        <span class="badge bg-light text-dark fs-6 px-3 py-1">
                                            <?php echo htmlspecialchars($customer['ranking']); ?>
                                        </span>
                                    <?php } ?>
    

                                </div>
                            <?php } ?>

                        </div>
                    </div>

                </div>
</div>
</main>


<?php 
    include("./layout/footer.php");
?>

