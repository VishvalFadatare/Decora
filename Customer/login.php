<?php 
   require_once('../config.php');
   include_once('customer_class.php');

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['page_action'] == 'sign_up') {
    cust_login(); }
 ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="login-container">
        <header>
            <img src="assets/images/logo_decora.jpg" alt="Logo" class="logo"> 
        </header>
        <h2>Welcome Back!</h2>

       
        <form method="post" action="dashboard.php">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="continue-btn">CONTINUE</button>

            <div class="remember-me">
                <input type="checkbox" id="remember">
                <label for="remember">Remember me next time</label>
            </div>

            <input type="hidden" name="page_action" value="login">
        </form>

        <div class="links">
            <a href="reset.php">Forgot your password? <span>Click here to reset</span></a>
            <a href="sign_up.php">Don't have an account? <span>Sign Up Here</span></a>
        </div>
    </div>
</body>
</html>
