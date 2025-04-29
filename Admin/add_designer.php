<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "decora_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash("defaultpassword", PASSWORD_DEFAULT);
    $address = $_POST['address'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        // Move to uploads directory
        $upload_dir = "Assets/Images/designer/";
        move_uploaded_file($tmp_name, $upload_dir . $image);

        $image_path = $upload_dir . $image;

        $sql = "INSERT INTO tbl_designers (name, email, phone, password, address, image)
                VALUES ('$name', '$email', '$phone', '$password', '$address', '$image_path')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Designer added successfully!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Please upload an image');</script>";
    }
}


// Fetch all designers
$designers = $conn->query("SELECT name, image FROM tbl_designers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Designer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 60%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            background-color: rgba(222, 197, 132, 0.5);
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .navbar a {
            color: #333;
            text-decoration: none;
            padding: 14px 20px;
        }
        .navbar a:hover {
            background-color: rgba(178, 106, 12, 0.5);
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 30px;
        }
        form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        form input, form textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            background-color:rgba(178, 106, 12, 0.5);
            color: black;
            width: 50%;
            margin: 0 auto;
            display: block;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background-color:rgba(222, 197, 132, 0.5);
            border: 2px solid #56330a;
        }
        .designer-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .designer-card {
            width: 150px;
            text-align: center;
        }
        .designer-card img {
            width: 100%;
            border-radius: 50%;
            height: 150px;
            object-fit: cover;
        }
        .designer-card p {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="index.php">Home</a>
        <a href="AdminDash.php">Back to Dashboard</a>
    </div>
    <div class="container">
        <h1>Add Designer</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label for="image">Upload Photo:</label>
            <input type="file" id="image" name="image" required>


            <button type="submit">Add Designer</button>
        </form>

        <h2>Available Designers</h2>
        <div class="designer-list">
            <?php while ($row = $designers->fetch_assoc()): ?>
                <div class="designer-card">
                    <img src="<?php echo $row['image']; ?>" alt="Designer Image">
                    <p><?php echo $row['name']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>