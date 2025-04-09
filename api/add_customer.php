<?php

//Php code for adding of customers

if (isset($_POST["submit"])) {
    $name = $_POST["c_name"];
    $contact = $_POST["c_contact"];

    echo "Customer added! Details: <br>";
    echo "Name: " . $name . "<br>";
    echo "Contact No: " . $contact . "<br>";
}