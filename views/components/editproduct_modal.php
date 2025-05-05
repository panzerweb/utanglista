<!-- Modal for adding a product -->
<div class="modal fade" id="editProductModal<?php echo htmlspecialchars($product["id"]) ?>" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h1 class="modal-title fs-5" id="editProductLabel">Edit Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- This form CREATE a new customer -->
         <!-- Comment this if you'll use Fetch API -->
        <!-- <form action="../api/add_product.php" method="post" enctype="multipart/form-data"> -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product["id"]) ?>" id="product_id_<?php echo htmlspecialchars($product["id"]) ?>">
        <div class="mb-3">
        <label for="" class="form-label fw-bold">Product name</label>
        <input
            type="text"
            class="form-control"
            name="prod_name"
            id="prod_name_<?php echo htmlspecialchars($product["id"]) ?>"
            aria-describedby="helpId"
            placeholder="Enter Product Name"
            value="<?php echo htmlspecialchars($product["prod_name"]) ?>"
            required
        />
        </div>
        <div class="mb-3">
        <label for="" class="form-label fw-bold">Price</label>
        <input
            type="number"
            class="form-control"
            name="prod_price"
            id="prod_price_<?php echo htmlspecialchars($product["id"]) ?>"
            aria-describedby="helpId"
            placeholder="Enter price"
            value="<?php echo htmlspecialchars($product["prod_price"]) ?>"
            required
        />
        </div>
        <div class="mb-3">
        <label for="" class="form-label fw-bold">Category</label>
        <select
            class="form-select form-select-lg"
            name="category_id"
            id="category-select_<?php echo htmlspecialchars($product["id"]) ?>"
        >
          <!-- Select options -->
            <?php foreach($categories as $category) { ?>
            <option value="<?php echo htmlspecialchars($category["id"]) ?>">
                <?php echo htmlspecialchars($category["category_name"]) ?>
            </option>
            <?php } ?>
        </select>
        </div>
          
        <div class="mb-3">
        <label for="" class="form-label fw-bold">Image</label>
        <input
            type="file"
            class="form-control"
            name="prod_image"
            id="prod_image_<?php echo htmlspecialchars($product["id"]) ?>"
            placeholder="Product image"
            aria-describedby="productImage"
            accept="image/*"
        />
        <div id="productImage" class="form-text">Select product image</div>
        </div>

          <!-- Image preview -->
          <!-- Remove border (optional) if logic is applied. -->
            <div class="image-wrapper border border-2 border-dark p-2 rounded-3">
                <img src="../public/<?php echo htmlspecialchars($product["prod_image"]) ?>" 
                    alt="Preview product image" 
                    id="file-preview_<?php echo htmlspecialchars($product["id"]) ?>" 
                    aria-describedby="previewImage" 
                    class="img-fluid object-fit">          
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" onclick="updateProduct(<?php echo htmlspecialchars($product['id']) ?>)">Update Product</button>
            <!-- <input type="submit" name="submit" class="btn btn-success"> -->
          </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>


<!-- Script for previewing an image to update -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const allFileInputs = document.querySelectorAll("input[type='file'][id^='prod_image_']");

  allFileInputs.forEach(fileInput => {
    fileInput.addEventListener("change", () => {
      const productId = fileInput.id.split("_")[2]; // Assumes format: prod_image_XX
      const file = fileInput.files[0];
      const preview = document.getElementById(`file-preview_${productId}`);

      if (file && preview) {
        const reader = new FileReader();
        reader.onload = (e) => {
          preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    });
  });
});
</script>
