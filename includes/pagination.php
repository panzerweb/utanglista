<?php 
// Template for pagination setup

// Set default page number
$page_number = 1;

// Validate and sanitize the "page" parameter from URL
if (isset($_GET["page"])) {
    $page_number = filter_var($_GET["page"], FILTER_VALIDATE_INT, [
        'options' => [
            'default' => 1,
            'min_range' => 1 // Prevent negative or zero values
        ]
    ]);
}

// Define how many results to show per page
$limitPerPage = 5;

// Calculate where to start fetching results
$startFrom = ($page_number - 1) * $limitPerPage;

// Make current page accessible for active link highlighting
$current_page = $page_number;


?>
