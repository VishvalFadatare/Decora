<?php
session_start();

// Check if the designer is logged in
if (!isset($_SESSION['designer_id'])) {
    header("Location: designer_login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "decora_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get designer details
$designerId = $_SESSION['designer_id'];
$sql = "SELECT * FROM tbl_designers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $designerId);
$stmt->execute();
$result = $stmt->get_result();
$designer = $result->fetch_assoc();

// Handle photo upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['design_photo'])) {
    $targetDir = "designs/";
    $targetFile = $targetDir . basename($_FILES['design_photo']['name']);
    $uploadOk = 1;

    // Check if file is an image
    $check = getimagesize($_FILES['design_photo']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Move uploaded file to the target directory
    if ($uploadOk && move_uploaded_file($_FILES['design_photo']['tmp_name'], $targetFile)) {
        // Save the photo path in the database
        $sql = "INSERT INTO designs (designer_id, photo_path) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $designerId, $targetFile);

        if ($stmt->execute()) {
            // echo "<script>alert('Design photo uploaded successfully.'); window.location.href='designer_profile.php';</script>";

        } else {
            echo "Error saving photo to the database: " . $stmt->error;
        }
    } else {
        echo "Error uploading file.";
    }
}

// Fetch previously uploaded designs
$sql = "SELECT * FROM designs WHERE designer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $designerId);
$stmt->execute();
$designs = $stmt->get_result();

// Check if the designer's image exists in the database
if (isset($designer['image']) && !empty($designer['image'])) {
    // Use the image path from the database
    $profilePhoto = '../Admin/' . $designer['image'];
} else {
    // Use default profile photo if no image found
    $profilePhoto = '../Admin/Assets/Images/designer/designer1.jpg';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designer Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
        .profile-container {
            text-align: center;
            padding: 20px;
        }
        .profile-container img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 3px solid #56330a;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-container h2 {
            margin-top: 10px;
            font-size: 2em;
            color: #56330a;
        }
        .upload-form {
            text-align: center;
            margin: 20px;
        }
        .upload-form input[type="file"] {
            margin: 10px 0;
            color: #56330a;
        }
        .design-gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .design-gallery img {
            width: 500px;
            height: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="profile-container">
        <?php if ($designer): ?>
            <img src="<?php echo $profilePhoto; ?>" alt="<?php echo $designer['name']; ?>">
            <h2>Welcome, <?php echo $designer['name']; ?></h2>
        <?php else: ?>
            <h2>Designer not found</h2>
        <?php endif; ?>
    </div>
    <div class="upload-form" style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h3>Upload Your Design</h3>
        <form action="designer_profile.php" method="post" enctype="multipart/form-data">
            <input type="file" name="design_photo" required>
            <button type="submit" style="color:brown; background-color:rgba(222, 197, 132, 0.5);">Upload</button>
        </form>
    </div>
    <div class="design-gallery">
        <?php while ($design = $designs->fetch_assoc()): ?>
            <img src="<?php echo $design['photo_path']; ?>" alt="Design Photo">
        <?php endwhile; ?>
    </div>
</body>
</html>
