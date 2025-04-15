<!-- Modal for Adding Customer -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addCustomerModalLabel">Create Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- This form CREATE a new customer -->
      <!-- 
          Disabled `form` tag to add to fetch API
          IF Fetch API breaks, uncomment the traditional form and 
          replace onclick button with an input-submit-button
      -->
      <!-- <form action="../api/add_customer.php" method="post"> -->
        <div class="modal-body">
                <div class="mb-3">
                  <label for="" class="form-label">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="c_name"
                    id="c_name"
                    aria-describedby="helpId"
                    placeholder="Enter Customer Name"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Contact No.</label>
                  <input
                    type="tel"
                    class="form-control"
                    name="c_contact"
                    id="c_contact"
                    aria-describedby="helpId"
                    placeholder="Enter Contact No. (Optional)"
                  />
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="insertCustomer()">Add</button>  
        </div>
      <!-- </form> -->
    </div>
  </div>
</div>