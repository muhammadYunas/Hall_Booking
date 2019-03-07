<?php
$con = mysqli_connect("localhost","root","","hallbooking");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 