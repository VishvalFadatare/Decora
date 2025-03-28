<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decora - Customer Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: rgba(222, 197, 132, 0.5);
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(222, 197, 132, 0.5);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: background 0.3s ease, color 0.3s ease;
        }
        .navbar:hover {
            background: rgb(123, 81, 20);;
        }
        .navbar h1 {
    margin: 0;
    font-size: 50px;
    color: rgb(123, 81, 20);
    font-family: "Brush Script MT", cursive; /* Makes it cursive */
    transition: color 0.3s ease;
}

        .navbar:hover h1 {
            color : white;
            
        }
        .navbar .buttons {
            display: flex;
            gap: 10px;
            padding-right: 40px;
        }
        .navbar button {
            background: transparent;
            border: 2px solid #56330a;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            height: 50px;
            width: 80px;
            font-size: 15px;
            font-weight: 800;
            color: #56330a;
            transition: background 0.3s ease, color 0.3s ease;
        }
        .navbar:hover button {
            color: #56330a;
            background: white;
        }
        .navbar button:hover {
            background: #56330a;
            color: white;
        }
        .container {
            margin-top: 80px;
            padding-top: 30px;
            padding-left: 150px;
            padding-right: 150px;
            text-align: left;
        }
        .scroll-container {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px;
            margin: auto;
        }
        .scroll-container::-webkit-scrollbar {
            height: 8px;
        }
        .scroll-container::-webkit-scrollbar-track {
            background: #f3f3f3;
            border-radius: 10px;
        }
        .scroll-container::-webkit-scrollbar-thumb {
            background: #8b6f3f;
            border-radius: 10px;
        }
        .grid {
            display: flex;
            gap: 30px;
            width: max-content;
        }
        .card {
            padding: 20px;
            background: #ebe6e1;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            text-align: center;
            min-width: 400px;
            font-size: x-large;
            transition: background 0.3s ease, color 0.3s ease;
        }
        .card:hover {
            background: #8b6f3f;
            color: white;
        }

        #card_img {
    width: 100%;
    height: 400px; /* Adjust as needed */
    object-fit: cover; /* Ensures the image maintains aspect ratio while filling the area */
    border-radius: 10px;
}

    </style>
</head>
<body>
    <div class="navbar">
        <h1>Decora</h1>
        <div class="buttons">
            <a href="Feedback.php">
                <button>Review</button>
            </a>
            <button>Logout</button>
        </div>
    </div>
    
    <div id="container">
        <!-- Home -->
        <div class="container">
            <h1>Home</h1>
            <div class="scroll-container">
                <div class="grid">
                    <div class="card"><img src="assets/images/room.jpg" alt="" id="card_img"><br><label for="" id="card_text">ROOM</label></div>
                    <div class="card"><img src="assets/images/kitchen.jpg" alt="" id="card_img"><br><label for="" id="card_text">KITCHEN</label></div>
                    <div class="card"><img src="assets/images/hall.jpg" alt="" id="card_img"><br><label for="" id="card_text">HALL</label></div>
                    <div class="card"><img src="assets/images/1bhk.jpg" alt="" id="card_img"><br><label for="" id="card_text">1BHK</label></div>
                    <div class="card"><img src="assets/images/2bhk.jpg" alt="" id="card_img"><br><label for="" id="card_text">2BHK</label></div>
                    <div class="card"><img src="assets/images/3bhk.jpg" alt="" id="card_img"><br><label for="" id="card_text">3BHK</label></div>
                </div>
            </div>
        </div>

        <!-- Office -->
        <div class="container">
            <h1>Office</h1>
            <div class="scroll-container">
                <div class="grid">
                    <div class="card">ROOM</div>
                    <div class="card">Kitchen</div>
                    <div class="card">Hall</div>
                    <div class="card">Outdoor</div>
                    <div class="card">1BHK</div>
                    <div class="card">2BHK</div>
                    <div class="card">3BHK</div>
                </div>
            </div>
        </div>

        <!-- Outdoor -->
        <div class="container">
            <h1>Outdoor</h1>
            <div class="scroll-container">
                <div class="grid">
                    <div class="card">Garden</div>
                    <div class="card">Balcony</div>
                    <div class="card">Pool Area</div>
                    <div class="card">Terrace</div>
                    <div class="card">Open Lounge</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
