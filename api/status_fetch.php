<?php 
// Backend logic for filter search using fetch API inside customer page ONLY
// Logic supported by status_filter.js which uses Fetch API


require("../config/config.php");

// If checkboxes are empty, then select default values query
if (!isset($_GET["status"]) || empty($_GET["status"])) {
    $statusQuery = "SELECT * FROM customers WHERE is_deleted=0 ORDER BY created_at DESC;";
} 
// Else, if there are checked checkboxes, perform query
else {
    $status = htmlspecialchars($_GET["status"]);
    // Split the comma-separated string (e.g. "PAID,PENDING") into an array
    $statuses = explode(",", $status);
    // Result: ['PAID', 'PENDING']

    // Escape each status value to prevent SQL injection, and wrap it in single quotes
    $escapedStatus = array_map(function($stat) use ($connection){
        return "'" . mysqli_real_escape_string($connection, $stat) . "'";
    }, $statuses);
    // Result: ["'PAID'", "'PENDING'"]

    // Join the escaped and quoted values back into a single comma-separated string
    $inClause = implode(",", $escapedStatus);
    // Result: "'PAID','PENDING'" — ready to be used in a SQL IN() clause

    // Query to execute
    $statusQuery = "SELECT * FROM customers WHERE is_deleted = 0 AND status IN ($inClause) ORDER BY created_at DESC; ";
}

    $result = mysqli_query($connection, $statusQuery);

    // If there are multiple or one result, then print out a new table row
    if($result->num_rows > 0){
        while ($customer = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($customer['c_name']) . "</td>";
            echo "<td class='text-center'>" . htmlspecialchars($customer['c_contact'] ? $customer['c_contact'] : '---') . "</td>";
            echo "<td class='text-center'>" . htmlspecialchars($customer['balance']) . "</td>";
            echo "<td class='text-center'>" . htmlspecialchars($customer['monthly_interest']) . "</td>";
            echo "<td class='text-center'>" . htmlspecialchars($customer['status']) . "</td>";
            // echo below applies the action buttons
            echo <<<HTML
                <td>
                    <div class="d-flex gap-2">
                        <button
                            type="button"
                            name="edit_btn"
                            id="edit_btn"
                            class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#editCustomerModal_{$customer['id']}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </button>
                HTML;
                include("../views/components/editcustomer_modal.php");

                echo <<<HTML
                        <button
                            type="button"
                            name="payment_amount"
                            id="payment_btn"
                            class="btn btn-success"
                            data-bs-toggle="modal"
                            data-bs-target="#paymentModal{$customer['id']}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                            </svg>
                        </button>
                HTML;
                include("../views/components/payment_modal.php");

                echo <<<HTML
                        <a
                            id="{$customer['id']}"
                            class="btn btn-danger"
                            href="../api/delete_customer.php?customer_id={$customer['id']}"
                            role="button"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>

                        </a>
                    </div>
                </td>
                HTML;
                echo "</tr>";
        }
    } else {
        echo "<div class='fs-4 fw-bold w-100 py-3'>No results found</div>"; // Display an empty query
    }
