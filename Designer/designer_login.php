<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="designer_style.css">
</head>
<body>
    <div class="login-container">
        <header>
            <img src="../customer/assets/images/logo_decora.jpg" alt="Logo" class="logo"> 
        </header>
        <h2>Welcome Back!</h2>

        <form method="post" action="">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <?php
            session_start();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
                $email = $_POST['email'];

                // Database connection
                $conn = new mysqli('localhost', 'root', '', 'decora_db');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check email only
                $stmt = $conn->prepare("SELECT * FROM tbl_designers WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $designer = $result->fetch_assoc();
                    $_SESSION['designer_id'] = $designer['id'];
                    $_SESSION['designer_email'] = $designer['email'];
                    header("Location: designer_profile.php");
                    exit();
                } else {
                    echo "<p style='color: red;'>Email not found. Please sign up.</p>";
                }

                $stmt->close();
                $conn->close();
            }
            ?>

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
