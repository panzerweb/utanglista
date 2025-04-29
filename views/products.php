<!-- place header here -->
<?php 
    //Header layout
    include("../api/auth.php");//aron d ma access if wala naka log-in
    include("./layout/header.php");
    include("../api/get_categories.php");
    include("../api/get_product.php");
?>

<main>
    <div class="container py-1 mb-5">
        <div class="row justify-content-center">
            
            <!-- Include the admin header greeting -->
            <?php include('./components/welcome_admin.php') ?>

            <!-- Add Category modal -->
            <div class="shadow p-3 row justify-content-center border border-1 rounded-4">
                <div class="d-flex gap-2 align-items-center mx-auto">
                    <h3>Category</h3>
                    <button class="btn btn-success"
                        data-bs-toggle="modal"
                        data-bs-target="#addCategoryModal"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg>
                        Category
                    </button>
                    <!-- Include add category modal -->
                     <?php include('./components/add_category_modal.php') ?>
                </div>

                <!-- Display all categories -->
                
                <?php foreach($categories as $category) { ?>
                    <div class="col-md-4 my-2">
                        <div class="bg-secondary rounded d-flex align-items-end p-3" style="height: 200px;">
                            <span class="text-white">
                                <?php echo htmlspecialchars($category["category_name"]); ?>
                            </span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            
            <!-- Interactive button sections -->
            <section class="shadow p-3 d-flex justify-content-between border border-1 rounded-4 mt-5 gap-3">
                <!-- Add Product button -->
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
                    <?php foreach($productsWithCategory as $product) { ?>
                    <div class="col-6 col-lg-3 my-2">
                        <div class="card">
                            <!-- Display all product details -->
                            <img src="../public/<?php echo htmlspecialchars($product["prod_image"]) ?>" class="card-img-top img-thumbnail w-100" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <?php echo htmlspecialchars($product["prod_name"]); ?>
                                </h5>
                                <p class="card-text text-center text-muted">
                                    <?php echo htmlspecialchars($product["category_name"]); ?>
                                </p>
                                <h6 class="text-center mb-3">
                                    <?php echo htmlspecialchars($product["prod_price"]); ?>
                                </h6>

                                <div class="d-flex justify-content-center">
                                <div class="btn-group" role="group" aria-label="Product Actions">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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