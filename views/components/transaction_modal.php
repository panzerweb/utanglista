<!-- Modal for transaction-->
<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="transactionModalLabel">Transaction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../api/transaction.php" method="post">
        <div class="modal-body">
            <!-- Select dropdown for customers -->
            <div class="mb-3">
              <label for="" class="form-label">Customer</label>
              <select
                class="form-select form-select-lg"
                name="c_name"
                id="customer_name_select"
              >
                <option selected>Select one</option>
                <option value="1">John Doe</option>
              </select>
            </div>
            <!-- Select dropdown for products -->
            <div class="mb-3">
              <label for="" class="form-label">Products</label>
              <select
                class="form-select form-select-lg"
                name="prod_name"
                id="product_name_select"
              >
                <option selected>Select one</option>
                <option value="1">Milo</option>
              </select>
            </div>
            <!-- Quantity and Price -->
            <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input
              type="number"
              class="form-control"
              name="qty"
              id="qty"
              aria-describedby="QuantityID"
              placeholder="Quantity"
            />
            </div>
            <!-- Amount is not to be called in the Php code, the amount is directly calculated in the Php code -->
            <div class="mb-3">
              <label for="" class="form-label">Amount</label>
              <input
                type="number"
                class="form-control"
                name="amount"
                id="amount-field"
                aria-describedby="AmountPurchased"
                placeholder="Amount"
                disabled
              />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" name="submit" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>