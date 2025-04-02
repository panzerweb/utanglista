# API
This folder specifically handles the backend logic of the system's codebase such as the Transaction, customer, product, interest logic.

## Handles RESTful APIs
The handling of GET, POST, PATCH, PUT, DELETE through HTML forms by Php logic. 

## Overall Backend
This folder does nothing more than storing all backend codes. To apply the logic to the actual system. Simply use `include()` or `require()` method to include the backend logic to the system's views.

**For Example:**
Including an insertion of customer logic to an HTML page.

- HTML Page named `Dashboard.php`
```
<?php
    include('./api/insert_customer.php);

    //Application Code Below...
?>

<html>
    <head>
        <title>Document</title>
    </head>
    <body>
        //HTML Template or Code below...
    </body>
</html>
```
- Php Logic named `insert_customer.php`

```
<?php

    if(isset($_POST["submit"])){
        $customer_name = $_POST["c_name"];

        $sql = 'INSERT INTO customer (c_name) VALUES ('c_name');
        $result = mysqli_query($conn, $sql);
        
        if($result){
            header('Location: customer.php');
        }
    }

?>
```
