<?php 
   require_once('../config.php');
   include_once('customer_class.php');

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['page_action'] == 'sign_up') {
    registration(); }
 ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="login-container">
        <header>
            <img src="assets/images/logo_decora.jpg" alt="Logo" class="logo">
        </header>

        <h2>Create an Account</h2>

        <form method="post">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <button type="submit" class="continue-btn">SIGN UP</button>
            <input type="hidden" name="page_action" value="sign_up">
        </form>

        <div class="links">
            <a href="login.html">Already have an account? <span>Login Here</span></a>
        </div>
    </div>
</body>
</html>
