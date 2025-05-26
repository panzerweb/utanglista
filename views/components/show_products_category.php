
<!-- Modal -->
<div class="modal fade" id="showProductsByCat<?php echo htmlspecialchars($category_id) ?>" tabindex="-1" aria-labelledby="showProductsByCatLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h1 class="modal-title fs-5" id="showProductsByCatLabel">
            <?php echo htmlspecialchars($category["category_name"]) ?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
    <?php if (!empty($productList)) { ?>
        <div class="table-responsive rounded-2 shadow border border-1">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-success text-center">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach($productList as $productCat) { ?>
                    <tr>
                    <td><?php echo htmlspecialchars($productCat["prod_name"]); ?></td>
                    <td>₱<?php echo number_format($productCat["prod_price"], 2); ?></td>
                    <td><?php echo htmlspecialchars($productCat["category_name"]); ?></td>
                    <td><?php echo htmlspecialchars($productCat["created_at"]); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning text-center">
        No products found in this category.
        </div>
    <?php } ?>
    </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>