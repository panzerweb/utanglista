<!-- Modal -->
<div class="modal fade" id="editCustomerModal_<?php echo $customer['id']; ?>" tabindex="-1" aria-labelledby="editCustomerLabel_<?php echo $customer['id']; ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h1 class="modal-title fs-5" id="editCustomerLabel_<?php echo $customer['id']; ?>">Edit Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $customer['id']; ?>" id="customer_id_<?php echo $customer["id"] ?>">

        <!-- Editable Fields -->
        <div class="mb-3">
          <label for="c_name_<?php echo $customer['id']; ?>" class="form-label fw-bold">Name</label>
          <input type="text" class="form-control" name="c_name" id="c_name_<?php echo $customer['id']; ?>" placeholder="Enter Customer Name" value="<?php echo htmlspecialchars($customer["c_name"]); ?>" required>
        </div>

        <div class="mb-3">
          <label for="c_contact_<?php echo $customer['id']; ?>" class="form-label fw-bold">Contact No.</label>
          <input type="tel" class="form-control" name="c_contact" id="c_contact_<?php echo $customer['id']; ?>" placeholder="Enter Contact No. (Optional)" value="<?php echo htmlspecialchars($customer["c_contact"] ?? ''); ?>">
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold">Status</label>
          <span class="text-danger text-decoration-underline">(Highly recommended to not edit this field!)</span>
          <select class="form-select form-select-lg" name="status" id="status_<?php echo $customer['id']?>">
            <?php if($customer['status'] == "PENDING") { ?>
              <option selected><?php echo htmlspecialchars($customer['status']) ?></option>
              <option value="PAID">PAID</option>
            <?php } else if($customer['status'] == "PAID") { ?>
              <option selected><?php echo htmlspecialchars($customer['status']) ?></option>
              <option value="PENDING">PENDING</option>
            <?php } ?>
          </select>
        </div>

        <!-- Refined Customer Details Section -->
        <hr>
        <h5 class="text-secondary mb-3">Customer Details</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($customer["c_name"]); ?></p>
            <p><strong>Contact:</strong> <?php echo htmlspecialchars($customer["c_contact"] ? $customer["c_contact"] : 'N/A'); ?></p>
            <p><strong>Balance:</strong> ₱<?php echo number_format($customer["balance"] ?? 0, 2); ?></p>
          </div>
          <div class="col-md-6">
            <p><strong>Monthly Interest:</strong> ₱<?php echo number_format($customer["monthly_interest"] ?? 0, 2); ?></p>
            <p><strong>Interest Rate:</strong> <?php echo htmlspecialchars($customer["interest_rate"] ?? '0'); ?>%</p>
            <p><strong>Status:</strong> <?php echo htmlspecialchars($customer["status"]); ?></p>
          </div>
        </div>
        <div class="mt-2">
          <p class="text-muted"><small>Joined At: <?php echo date("F j, Y", strtotime($customer["created_at"] ?? 'now')); ?></small></p>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="updateCustomer(<?php echo  $customer['id'] ?>)">Update</button>  
      </div>
    </div>
  </div>
</div>
