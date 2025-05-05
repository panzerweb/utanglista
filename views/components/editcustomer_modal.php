<div class="modal fade" id="editCustomerModal_<?php echo $customer['id']; ?>" tabindex="-1" aria-labelledby="editCustomerLabel_<?php echo $customer['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h1 class="modal-title fs-5" id="editCustomerLabel_<?php echo $customer['id']; ?>">Edit Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Edit form (sending ID via POST hidden input) -->
      <!-- 
          Disabled `form` tag to add to fetch API
          IF Fetch API breaks, uncomment the traditional form and 
          replace onclick button with an input-submit-button
      -->
      <!-- <form action="../api/edit_customer.php" method="post"> -->
        <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $customer['id']; ?>" id="customer_id_<?php echo $customer["id"] ?>">
            <!-- Customer Name field -->
            <div class="mb-3">
                <label for="c_name_<?php echo $customer['id']; ?>" class="form-label fw-bold">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="c_name"
                    id="c_name_<?php echo $customer['id']; ?>"
                    placeholder="Enter Customer Name"
                    value="<?php echo htmlspecialchars($customer["c_name"]); ?>"
                    required
                />
            </div>
            <!-- Contact Number field-->
            <div class="mb-3">
                <label for="c_contact_<?php echo $customer['id']; ?>" class="form-label fw-bold">Contact No.</label>
                <input
                    type="tel"
                    class="form-control"
                    name="c_contact"
                    id="c_contact_<?php echo $customer['id']; ?>"
                    placeholder="Enter Contact No. (Optional)"
                    value="<?php echo htmlspecialchars($customer["c_contact"] ?? ''); ?>"
                />
            </div>
            <!-- Status field-->
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Status</label>
                <span class="text-danger text-decoration-underline">
                  (Highly recommended to not edit this field!)
                </span>
                <select
                    class="form-select form-select-lg"
                    name="status"
                    id="status_<?php echo $customer['id']?>"
                >
                
                <?php if($customer['status'] == "PENDING") {?>
                    <option selected><?php echo htmlspecialchars($customer['status']) ?></option>
                    <option value="PAID">PAID</option>
                <?php } else if($customer['status'] == "PAID") { ?>
                    <option selected><?php echo htmlspecialchars($customer['status']) ?></option>
                    <option value="PENDING">PENDING</option>
                <?php } ?>

                </select>
            </div>
          

            <!-- Non-editable personal details -->
            <span class="fs-5 text-muted">Details</span>
            <div class="my-2 d-flex justify-content-evenly">
              <div class="">
                <p>Name:</p>
                <p>Contact:</p>
                <p>Balance:</p>
              </div>
              <div class="">
                <p>Monthly Interest:</p>
                <p>Interest Rate:</p>
                <p>Status:</p>
              </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <input type="submit" name="submit" class="btn btn-success" value="Update"> -->
          <button type="button" class="btn btn-success" onclick="updateCustomer(<?php echo  $customer['id'] ?>)">Update</button>  
        </div>
      <!-- </form> -->
    </div>
  </div>
</div>
