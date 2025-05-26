<!-- Modal for transaction-->
<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h1 class="modal-title fs-5" id="transactionModalLabel">Transaction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- <form action="../api/transaction.php" method="post"> -->
        <div class="modal-body">
            <!-- Select dropdown for customers -->
            
              <div class="mb-3">
                <label for="" class="form-label fw-bold">Customer</label>
                <select
                  class="form-select form-select-lg"
                  name="c_name"
                  id="customer_name_select"
                >

                  <option disabled selected>Select one</option>
                  <!-- Display all customers -->
                  <?php foreach($allcustomers as $customer) { ?>

                    <option value="<?php echo htmlspecialchars($customer["id"]) ?>">
                      <?php echo htmlspecialchars($customer["c_name"]) ?>
                    </option>

                  <?php } ?>
                </select>
              </div>
            
            <!-- Select dropdown for products -->
            <div class="mb-3">
              <label for="" class="form-label fw-bold">Products</label>
              <select
                class="form-select form-select-lg"
                name="prod_name"
                id="product_name_select"
                onchange="displayPrice()"
              >
                <option disabled selected>Select one</option>
                <!-- Display all products -->
                <?php foreach($products as $product) { ?>

                  <option value="<?php echo htmlspecialchars($product["id"]) ?>" data-price="<?php echo htmlspecialchars($product["prod_price"]) ?>">
                    <?php echo htmlspecialchars($product["prod_name"]) ?>
                  </option>

                <?php } ?>

              </select>
            </div>
            
            <!-- Quantity and Price -->
            <div class="mb-3">
              <label for="" class="form-label fw-bold">Price</label>
              <div class="border border-1 py-3 px-2 rounded-3">
                  <h5 id="priceField" class="p-0 m-0"></h5>
              </div>
            </div>

            <div class="mb-3">
              <label for="" class="form-label fw-bold">Quantity</label>
              <input
                type="number"
                class="form-control"
                name="qty"
                id="qty"
                aria-describedby="QuantityID"
                placeholder="Quantity"
              />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <input type="submit" name="submit" class="btn btn-success" value="Transact"> -->
          <button type="button" class="btn btn-success" id="insertTransaction">Transact</button>  
        </div>
      <!-- </form> -->
    </div>
  </div>
</div>

<script>
  function displayPrice() {
    const select = document.getElementById("product_name_select");
    const selectedOption = select.options[select.selectedIndex];
    const price = selectedOption.getAttribute("data-price");
    document.getElementById("priceField").innerHTML = price || "";
  }
</script>