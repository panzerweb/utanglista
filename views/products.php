<!-- place header here -->
<?php 
    //Header layout
    include("../api/auth.php");//aron d ma access if wala naka log-in
    include("./layout/header.php");
    include("../api/get_categories.php");
    include("../api/get_product.php");
    include("../api/get_stats_dashboard.php");

?>

<main>
    <div class="container py-1 mb-5">
        <div class="row justify-content-center">

            <!-- Add Category modal -->
            <div class="shadow p-3 row justify-content-center border border-1 rounded-4">
                <div class="d-flex gap-2 align-items-center mx-auto">
                    <h1>Category</h1>
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
                <h1>
                    Product
                    (                    
                        <span>
                            <?php echo htmlspecialchars($totalProdCount) ?>
                        </span>
                    )

                </h1>
                <!-- Product Cards -->
                <div class="shadow p-3 border border-1 rounded-4 mt-2 splide" role="group" aria-label="Splide Basic HTML Example">
                    <div class="row justify-content-center align-items-center">
                        <div class="splide__track">
                        <div class="splide__list">
                            <?php foreach($productsWithCategory as $product) { ?>
                            
                                <div class="card mx-2 splide__slide">
                                    <!-- Display all product details -->
                                    <img src="../public/<?php echo htmlspecialchars($product["prod_image"]) ?>" 
                                        class="card-img-top img-thumbnail" 
                                        alt="Product Image"
                                        style="max-height: 200px; object-fit: cover; width: 100%;">                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <?php echo htmlspecialchars($product["prod_name"]); ?>
                                        </h5>
                                        <p class="card-text text-center text-muted">
                                            <?php echo htmlspecialchars($product["category_name"]); ?>
                                        </p>
                                        
                                        <hr>
                                        <div class="d-flex justify-content-center align-items-center">                                 
                                            <div class="d-flex flex-row gap-3 align-items-center" role="group" aria-label="Product Actions">
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-dark border border-2 border-dark dark-button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editProductModal<?php echo htmlspecialchars($product["id"]) ?>"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                    </svg>
                                                </button>          
                                                
                                                <!-- Price -->
                                                <div class="border border-1 border-light p-2 rounded-3 bg-dark">
                                                    <h5 class="text-light text-center">
                                                        ₱ <?php echo htmlspecialchars($product["prod_price"]); ?>
                                                    </h5>
                                                </div>
                                                <!-- ====== Delete Button ====== -->
                                                <button
                                                    type="button"
                                                    name="delete_btn"
                                                    id="delete_btn_<?php echo $product["id"]?>"
                                                    class="btn btn-danger action-delete-button"
                                                    onclick="deleteProduct(<?php echo $product['id']?>)"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash text-center" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php } ?>
                        </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Took the component modals outside to access the modals even in Splide JS -->
            <?php foreach($productsWithCategory as $product) {
                include('./components/editproduct_modal.php');
            } ?>

        </div>
    </div>
</main>

<script>
    //** Splide JS code block */
    document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '.splide', {
        type   : 'loop',
        perPage: 4,
        perMove: 1,
        } );

    splide.mount();
    } );
</script>
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