<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designer Photos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color:rgba(222, 197, 132, 0.5);;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .navbar a {
            color: #333;
            cursor: pointer;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
        }
        .navbar div {
            display: flex;
            gap: 10px;
        }
        .navbar a:hover {
            background-color:rgba(178, 106, 12, 0.5);
            border-radius: 5px;
        }
        .navbar .logo {
            font-size: 20px;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            font-family: "dancing script", cursive;
            font-size: 2.5em;
            color: #56330a;
        }
        .photo-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .photo-container .designer-card {
            text-align: center;
        }
        .photo-container img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 3px solid #56330a;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .photo-container img:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        .photo-container .designer-name {
            margin-top: 10px;
            font-size: 1.2em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">Decora</div>
        <div>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>
    <h1>Our Designers</h1>
    <div class="photo-container">
    <?php
$images = glob("assets/images/designer/*.jpg"); // Adjust the path if needed
$count = 0;

foreach ($images as $image) {
    if ($count >= 9) break; // Display only 9 images (3 rows of 3)
    $designerName = "Designer " . ($count + 1); // Replace with actual names if available
    $designerId = $count + 1; // Unique ID for each designer
    echo "<div class='designer-card'>";
    echo "<a href='designer_profile.php?designer_id=$designerId'>";
    echo "<img src='$image' alt='Designer Photo'>";
    echo "</a>";
    echo "<div class='designer-name'>$designerName</div>";
    echo "</div>";
    $count++;
}
?>
    </div>
   
</body>
</html>
