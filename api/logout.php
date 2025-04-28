<?php
session_start();
session_destroy();
header("Location: /utanglista/index.php");
exit;