<div class="modal fade" id="paymentModal<?php echo $customer['id']; ?>" tabindex="-1" aria-labelledby="paymentModalLabel_<?php echo $customer['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h1 class="modal-title fs-5" id="paymentModalLabel_<?php echo $customer['id']; ?>">Payment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Payment form (sending ID via POST hidden input) ? Fetch : traditional Php form -->
      <!-- <form action="../api/payment.php" method="post"> -->
        <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $customer['id']; ?>" id="<?php echo $customer['id']; ?>">
          
            <h3>Balance: 
                <span class="badge text-bg-secondary">
                    <?php echo $customer["balance"]; ?>
                </span>
            </h3>

            <div class="mb-3">
                <label for="" class="form-label fw-bold">Payment Amount</label>
                <input
                    type="number"
                    class="form-control"
                    name="payment_amount"
                    id="payment_amount_<?php echo $customer['id']; ?>"
                    aria-describedby="helpId"
                    placeholder="Amount"
                />
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="insertPayment(<?php echo $customer['id']; ?>)">Payment</button>
          <!-- <input type="submit" name="submit" class="btn btn-success" value="Payment"> -->

        </div>
      <!-- </form> -->
    </div>
  </div>
</div>
