<?php
session_start();
require_once('db_config.php');
require('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/mystyle.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/general.css">
  <title><?php the_title(); ?></title>

</head>
<body>

<section>
	<?php include('menu.php'); ?>
</section>