<!-- Modal for adding a product -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h1 class="modal-title fs-5" id="addProductModalLabel">Create Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- This form CREATE a new customer -->
         <!-- Comment this if you'll use Fetch API -->
        <!-- <form action="../api/add_product.php" method="post" enctype="multipart/form-data"> -->
          <div class="mb-3">
            <label for="" class="form-label">Product name</label>
            <input
              type="text"
              class="form-control"
              name="prod_name"
              id="prod_name"
              aria-describedby="helpId"
              placeholder="Enter Product Name"
              required
            />
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input
              type="number"
              class="form-control"
              name="prod_price"
              id="prod_price"
              aria-describedby="helpId"
              placeholder="Enter price"
              required
            />
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Category</label>
            <select
              class="form-select form-select-lg"
              name="category"
              id="category-select"
            >
              <option disabled selected>Select one</option>
              <?php foreach($categories as $category) { ?>
                <option value="<?php echo htmlspecialchars($category["id"]) ?>">
                  <?php echo htmlspecialchars($category["category_name"]) ?>
                </option>
              <?php } ?>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input
              type="file"
              class="form-control"
              name="prod_image"
              id="prod_image"
              placeholder="Product image"
              aria-describedby="productImage"
              accept="image/*"
            />
            <div id="productImage" class="form-text">Select product image</div>
          </div>

          <!-- Image preview -->
          <!-- Remove border (optional) if logic is applied. -->
          <div class="image-wrapper border border-2 border-dark p-2 rounded-3">
            <img src="#" alt="Preview product image" id="file-preview" aria-describedby="previewImage" class="img-fluid object-fit">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="insertProductBtn">Add Product</button>
            <!-- <input type="submit" name="submit" class="btn btn-success"> -->
          </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>