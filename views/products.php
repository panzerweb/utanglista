<!-- place header here -->
<?php 
    //Header layout
    include("../api/auth.php");//aron d ma access if wala naka log-in
    include("./layout/header.php");
?>

<main>
    <div class="container my-5">
        <div class="row justify-content-center">
            
            <!-- Include the admin header greeting -->
            <?php include('./components/welcome_admin.php') ?>

            <div class="shadow p-3 row justify-content-center border border-1 rounded-4">
                <div class="d-flex gap-2 align-items-center text-center mx-auto">
                    <h3>Category</h3>
                    <button class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg>
                        Category
                    </button>
                </div>
                <div class="col-md-6 my-2">
                    <div class="bg-secondary rounded d-flex align-items-end p-3" style="height: 200px;">
                        <span class="text-white">Personal Care Items</span>
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="bg-secondary rounded d-flex align-items-end p-3" style="height: 200px;">
                        <span class="text-white">Personal Care Items</span>
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="bg-secondary rounded d-flex align-items-end p-3" style="height: 200px;">
                        <span class="text-white">Personal Care Items</span>
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="bg-secondary rounded d-flex align-items-end p-3" style="height: 200px;">
                        <span class="text-white">Personal Care Items</span>
                    </div>
                </div>
            </div>
            
            <!-- Interactive button sections -->
            <section class="shadow p-3 d-flex justify-content-between border border-1 rounded-4 mt-5 gap-3">
                <!-- Add Product button -->
                <button type="button" class="btn btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                    </svg>
                    Products
                </button>
                <!-- ====== Search field ====== -->

                <div class="flex-grow-1">
                    <input
                        type="text"
                        class="form-control border border-1 border-secondary rounded-3"
                        id="dash-livesearch"
                        aria-describedby="helpId"
                        placeholder="🔍Search"
                    />
                </div>
            </section>

            <!-- All product section -->
            <section class="shadow p-3 border border-1 rounded-4 mt-5">
                <div class="row justify-content-center align-items-center">
                    <h3>Product</h3>
                    <!-- Replace with actual data -->
                    <div class="col-6 col-lg-3 my-2">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title text-center">Product Name</h5>
                                <p class="card-text text-center text-muted">Category: Electronics</p>
                                <h6 class="text-center mb-3">$199.99</h6>

                                <div class="d-flex justify-content-center">
                                <div class="btn-group" role="group" aria-label="Product Actions">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<!-- place footer here -->
<?php 
    //Header layout
    include("./layout/footer.php");
?>