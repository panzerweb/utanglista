<!-- Modal for adding a product -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h1 class="modal-title fs-5" id="addCategoryModalLabel">Create Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- This form CREATE a new customer -->
         <!-- Comment this if you'll use Fetch API -->
        <form action="../api/category.php" method="post">
          <div class="mb-3">
            <label for="" class="form-label text-start">Category</label>
            <input
              type="text"
              class="form-control"
              name="category_name"
              id="category_name"
              aria-describedby="helpId"
              placeholder="Add Category"
              required
            />
          </div>

          <!-- ======= Category image added soon! ======== -->

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-success" value="Add Category">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>