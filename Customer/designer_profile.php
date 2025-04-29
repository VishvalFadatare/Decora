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
        .property-photos {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .property-photos img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .submit-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 1.2em;
            color: #fff;
            background-color: #56330a;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .submit-button:hover {
            background-color: #b26a0c;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="designer.php">Back to Designers</a>
    </div>
    <div class="profile-container">
        <?php
        // Connect to MySQL database
        $conn = new mysqli("localhost", "root", "", "decora_db");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get designer ID from URL
        $designerId = isset($_GET['designer_id']) ? intval($_GET['designer_id']) : 0;

        // Dummy profile info (static)
        $designerProfiles = [
            1 => ["name" => "Designer 1", "photo" => "assets/images/designer/designer1.jpg"],
            2 => ["name" => "Designer 2", "photo" => "assets/images/designer/designer2.jpg"],
            3 => ["name" => "Designer 3", "photo" => "assets/images/designer/designer3.jpg"],
            4 => ["name" => "Designer 4", "photo" => "assets/images/designer/designer4.jpg"],
            5 => ["name" => "Designer 5", "photo" => "assets/images/designer/designer5.jpg"],
            6 => ["name" => "Designer 6", "photo" => "assets/images/designer/designer6.jpg"],
            7 => ["name" => "Designer 7", "photo" => "assets/images/designer/designer7.jpg"],
        ];

        if (array_key_exists($designerId, $designerProfiles)) {
            $designer = $designerProfiles[$designerId];
            echo "<img src='{$designer['photo']}' alt='{$designer['name']}'>";
            echo "<h2>{$designer['name']}</h2>";
        } else {
            echo "<h2>Designer Not Found</h2>";
        }
        ?>
    </div>

    <div class="property-photos">
        <?php
        // Fetch design images from database
        $stmt = $conn->prepare("SELECT photo_path FROM designs WHERE designer_id = ?");
        $stmt->bind_param("i", $designerId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<img src='../Designer/{$row['photo_path']}' alt='Design Photo'>";

            }
        } else {
            echo "<p>No property photos available for this designer.</p>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>

    <form action="store_designer.php" method="post">
        <input type="hidden" name="designer_id" value="<?php echo $designerId; ?>">
        <input type="hidden" name="designer_name" value="<?php echo isset($designer['name']) ? $designer['name'] : ''; ?>">
        <button type="submit" class="submit-button">Save Designer</button>
    </form>
</body>
</html>
