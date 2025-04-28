<?php 
    include("./layout/header.php");
?>

<main class="main-content">
    <section class="store-title">
        <h1>VILLAR STORE</h1>
    </section>

    <section class="categories">
        <div class="category-card"></div>
        <div class="category-card"></div>
        <div class="category-card"></div>
        <div class="category-card"></div>
    </section>

    <section class="actions">
        <button class="add-product">+ Products</button>
        <button class="edit-product">+ Edit</button>
    </section>

    <section class="all-products">
        <div class="products-header">
            <div class="products-header-left">
                <h2>All Products</h2>
                <span>Filter</span>
            </div>
            <div class="filter-search">
                <input type="text" placeholder="Search" class="search-input">
                <button class="search-btn">Search</button>
            </div>
        </div>

        <div class="products-grid">
        
            <div class="product-card">
                <div class="discount-badge">13%</div>
                <div class="product-image"></div>
                <div class="product-name">ngalan sa product</div>
                <div class="product-info">
                    <span class="product-quantity">42</span>
                </div>
            </div>

            <div class="product-card">
                <div class="discount-badge">13%</div>
                <div class="product-image"></div>
                <div class="product-name">ngalan sa product</div>
                <div class="product-info">
                    <span class="product-quantity">23</span>
                </div>
            </div>

            <div class="product-card">
                <div class="discount-badge">13%</div>
                <div class="product-image"></div>
                <div class="product-name">ngalan sa product</div>
                <div class="product-info">
                    <span class="product-quantity">12</span>
                </div>
            </div>

            <div class="product-card">
                <div class="discount-badge">13%</div>
                <div class="product-image"></div>
                <div class="product-name">ngalan sa product</div>
                <div class="product-info">
                    <span class="product-quantity">400</span>
                </div>
            </div>

            <div class="product-card">
                <div class="discount-badge">13%</div>
                <div class="product-image"></div>
                <div class="product-name">ngalan sa product</div>
                <div class="product-info">
                    <span class="product-quantity">55</span>
                </div>
            </div>

            <div class="product-card">
                <div class="discount-badge">38%</div>
                <div class="product-image"></div>
                <div class="product-name">ngalan sa product</div>
                <div class="product-info">
                    <span class="product-quantity">60</span>
                </div>
            </div>

            <div class="product-card">
                <div class="discount-badge">13%</div>
                <div class="product-image"></div>
                <div class="product-name">ngalan sa product</div>
                <div class="product-info">
                    <span class="product-quantity">60</span>
                </div>
            </div>

            <div class="product-card">
                <div class="discount-badge">38%</div>
                <div class="product-image"></div>
                <div class="product-name">ngalan sa product</div>
                <div class="product-info">
                    <span class="product-quantity">100</span>
                </div>
            </div>

        </div>
    </section>
</main>

<?php 
    include("./layout/footer.php");
?>
