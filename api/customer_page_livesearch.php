<?php
// Backend logic for livesearch using fetch API inside customer page ONLY
// Logic supported by customer_page_livesearch.js which uses Fetch API

require("../config/config.php");
// Refers to the get method of the customer_page_livesearch.js uri search
if(isset($_GET["search"])){
    $search = htmlspecialchars($_GET["search"]); //this is appended in the URI and we must retrieve

    $searchquery = "SELECT * FROM customers WHERE c_name LIKE '%$search%'"; //Used LIKE and %%  to implement searching
    $result = mysqli_query($connection, $searchquery);
    
    // If there are multiple or one result, then print out a new table row
    if($result->num_rows > 0){
        while ($customer = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($customer['c_name']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['c_contact']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['balance']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['monthly_interest']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['status']) . "</td>";
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
}