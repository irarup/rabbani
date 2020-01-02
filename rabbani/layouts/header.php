<?php require("query/function.php") ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="components/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="components/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Rabbani Asysa</title>
</head>
<body>
  <div class="container-fluid navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="/rabbani" class="brand-logo" id="logo">Rabbani </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger">☰</a>
        <ul class="right hide-on-med-and-down">
          <?php include('nav.html'); ?>
        </ul>
      </div>
     </nav>
      <ul class="sidenav" id="mobile-demo">
        <?php include('nav.html'); ?>
      </ul>
  </div>