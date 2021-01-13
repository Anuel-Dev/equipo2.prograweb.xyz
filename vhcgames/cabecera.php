<?php
include_once("modelo/Usuario.php");
error_reporting(E_ALL ^E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CHVideogames Store</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/Animate.css" type="text/css"/>
		<link href="css/trad4.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
		<header class="animated rotateInDownRight">
      <center>
			<figure class="logo">
				<img src="media/logo.jpg" border="0" />
			</figure>
    </center>
			<h2 id="titPral"></h2>
		</header>
