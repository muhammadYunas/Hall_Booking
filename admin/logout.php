<center>
<h1>Donz Hall Booking</h1>
<hr>
<?php
session_start();
session_destroy();
setcookie("user", "", time()-3600);
header("Location: index.php?user=You_have_been_logged_out");
?>
</center>