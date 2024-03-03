<?php  



session_start();

session_unset();

session_destroy();


header("location: http://localhost/restoran/admin-panel/login-admins.php");





?>