# Config
The folder specifically contains the direct connection of the codebase to the database.

### Database Environment
- MySQL
- Laragon or XAMPP

### Template for MySQL Connection
```
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_table = "utanglista_db";

try {
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
} catch (\Throwable $th) {
    echo "Failed to Connect, error: " . $th;
}

if ($connection) {
    echo "Connected Successfully";
} else {
    echo "Connection Failed!";
}

```