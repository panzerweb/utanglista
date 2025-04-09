<?php 
    include("./layout/header.php");
?>

<main>
    
<div class="container">
                <div class="row justify-content-around align-items-start mx-1 mt-5 mb-1">
                    <!-- Column for table of customers and action buttons -->
                    <div class="col-12 col-lg-8">
                        <div class="shadow p-2 border border-1 rounded-3">
                            <div class="my-3 d-flex gap-2 py-1">
                                <div class="entry-option">
                                        <select
                                            class="form-select form-select-md fs-6 flex border border-1 border-secondary rounded-3 fw-semibold"
                                            name="entry-count"
                                            id="entry-count"
                                        >
                                            <option selected>Entry</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                        </select>
                                </div>
                                <div class="flex-grow-1">
                                    <input
                                        type="text"
                                        class="form-control border border-1 border-secondary rounded-3 w-75"
                                        name=""
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder="Search"
                                    />
                                </div>
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

                            </div>
                        
                        </div>
                        <div class="mt-4 mb-3">
                            <div class="table-responsive rounded-4 overflow-x-hidden overflow-y-auto shadow p-2 border border-1">
                                <div class="customer-wrapper">
                                    <div class="customer-box">
                                        <h3>Customers</h3>
                                    </div>
                                </div>
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>name</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#20462</td>
                                            <td>Selwyn Villar</td>
                                            <td>Red Horse</td>
                                            <td>10</td>
                                            <td>500</td>
                                            <td>03/05/2025</td>
                                            <td> <span class="status paid"PAID</span></td>
                                            <td>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </td>
                                       </tr>
                                       <tr>

                                       </tr>
                                            <td>#34304</td>
                                            <td>Arthur Sigarilyo</td>
                                            <td>Red Horse</td>
                                            <td>5</td>
                                            <td>50</td>
                                            <td>03/05/2025</td>
                                            <td> <span class="Ongoing"ONGOING</span></td>
                                            <td>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="pagination">
                                    <span>Previous</span>
                                    <span class="active">1</span>
                                    <span>2</span>
                                    <span>3</span>
                                    <span>Next</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column for ranking or leaderboards -->
                    <div class="col-12 col-lg-4">
                        <div class="card p-3 border border-1 rounded-3 shadow">
                            <h5 class="card-title">Leaderboards</h5>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center fs-4">
                                    <span>1.</span>
                                    <span class="w-100">Klarence</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center fs-4">
                                    <span>1.</span>
                                    <span class="w-100">Klarence</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center fs-4">
                                    <span>1.</span>
                                    <span class="w-100">Klarence</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center fs-4">
                                    <span>1.</span>
                                    <span class="w-100">Klarence</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</main>




<?php 
    include("./layout/footer.php");
?>

