<?php 
// Template for pagination

    if(!isset($_GET["page"])){
        $page_number = 1;
    }
    else{
        if (!is_numeric($_GET["page"])) {
            $page_number = 1;
        } else {
            $page_number = $_GET["page"];
        }
        
    }

    $limitPerPage = 5;
    $startFrom = ($page_number - 1) * $limitPerPage;

?>