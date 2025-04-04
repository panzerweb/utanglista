<!-- Dashboard View -->
<!-- Any Php code... -->
<?php

?>

<!-- End of Php Code -->

<!-- place navbar here -->
<?php 
    //Header layout
    include("./layout/header.php");
?>
        
        <main>
            <div class="container">
                <div class="row justify-content-center mx-1">
                    <div class="col-12 col-lg-12">
                        <div class="mt-4 mb-3">
                            <h2>Hello, 
                                <!-- Admin is placeholder, apply Session for a logged in user -->
                                <?php echo "Admin" ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 statistic-wrapper shadow p-3 rounded-3">
                        <div class="row justify-content-around align-items-center">
                            <div class="col-6 col-lg-3">
                                <div id="total-customer" 
                                    class="d-flex justify-content-center align-items-center gap-2 info-box p-2 rounded-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-people-fill text-success" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                    </svg>
                                    <div class="info-box-content">
                                        <h5 class="fw-semibold text-secondary">Total Customers</h5>
                                        <span class="lead fw-bold fs-2 text-center">
                                            9,999
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
                                            9,999
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
                                            9,999
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
                                            100
                                        </span>
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


