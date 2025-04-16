<?php 
// Backend logic for filter search using fetch API inside customer page ONLY
// Logic supported by status_filter.js which uses Fetch API


require("../config/config.php");

// If checkboxes are empty, then select default values query
if (!isset($_GET["status"]) || empty($_GET["status"])) {
    $statusQuery = "SELECT * FROM customers ORDER BY created_at DESC;";
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
    $statusQuery = "SELECT * FROM customers WHERE status IN ($inClause) ORDER BY created_at DESC; ";
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
                            Edit
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
                            Payment
                        </button>
                HTML;
                include("../views/components/payment_modal.php");

                echo <<<HTML
                        <a
                            id="{$customer['id']}"
                            class="btn btn-danger"
                            href="../api/delete_customer.php?customer_id={$customer['id']}"
                            role="button"
                        >Delete</a>
                    </div>
                </td>
                HTML;
                echo "</tr>";
        }
    } else {
        echo "<div class='fs-4 fw-bold w-100 py-3'>No results found</div>"; // Display an empty query
    }
