<!-- Mise en forme de la page de connexion -->
<?php require_once( 'navbar.html');?>
<div w3-include-html="navbar.html"></div> 

<link rel="stylesheet" type="text/css" href="../../public/css/login_style.css">
<h2>Login Page</h2>
<head>
    <title>Login Page</title>

</head>
</title>
<body> </body>
<form target="_blank" method="post" action="../controller/Doctors.php">
  <input type="text" name="email" placeholder="email">
  <input type="password" name="passwd" placeholder="passwd">
  <input type="submit" name="submit" value="Login">
  
  <button type="button" onclick="window.location.href='register.php'">Sign up here.</button>
  



</form>
<?php header("location:../views/views.php"); ?>

