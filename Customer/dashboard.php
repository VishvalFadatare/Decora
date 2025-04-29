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
            background: rgb(123, 81, 20);
        }
        .navbar h1 {
            margin: 0;
            font-size: 50px;
            color: rgb(123, 81, 20);
            font-family: "Brush Script MT", cursive;
            transition: color 0.3s ease;
        }
        .navbar:hover h1 {
            color: white;
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
            position: relative;
        }
        .card:hover {
            background: #8b6f3f;
            color: white;
        }
        .card input[type="radio"] {
            position: absolute;
            top: 10px;
            left: 10px;
            transform: scale(1.5);
        }
        #card_img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }
        .proceed-btn {
            display: block;
            margin: 30px auto;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background: #56330a;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .proceed-btn:hover {
            background: #8b6f3f;
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
        <div class="container">
            <h1>Select a Design</h1>
            <div class="scroll-container">
                <label for="">Home</label>
                <div class="grid" id="card-container-1"></div>
            </div>

            <div class="scroll-container">
                <label for="">Office</label>
                <div class="grid" id="card-container-2"></div>
            </div>
            
        </div>
        
        <button class="proceed-btn" onclick="proceed()">Proceed</button>
    </div>


    <script>
                function proceed() {
            let selectedOption = document.querySelector('input[name="design"]:checked');
            if (!selectedOption) {
                alert("Please select a design before proceeding.");
                return;
            }
            localStorage.setItem("selectedDesign", selectedOption.value);
            window.location.href = "nextPage.html"; 
        }
        // JSON Object containing the card details

        // home 
        const data1 = {
            "cards_1": [
                { "value": "1BHK", "id": "1bhk", "src": "assets/images/1bhk.jpg", "label": "1BHK" },
                { "value": "2BHK", "id": "2bhk", "src": "assets/images/2bhk.jpg", "label": "2BHK" },
                { "value": "3BHK", "id": "3bhk", "src": "assets/images/3bhk.jpg", "label": "3BHK" },
                { "value": "ROOM", "id": "room", "src": "assets/images/room.jpg", "label": "ROOM" },
                { "value": "KITCHEN", "id": "kitchen", "src": "assets/images/kitchen.jpg", "label": "KITCHEN" },
                { "value": "HALL", "id": "hall", "src": "assets/images/hall.jpg", "label": "HALL" }
            ],
            "cards_2": [
    { "value": "CABIN", "id": "cabin", "src": "assets/images/cabin.jpg", "label": "Cabin" },
    { "value": "WORKSTATION", "id": "workstation", "src": "assets/images/workstation.jpg", "label": "Workstation" },
    { "value": "MEETING_ROOM", "id": "meeting_room", "src": "assets/images/meeting_room.jpg", "label": "Meeting Room" },
    { "value": "CONFERENCE_HALL", "id": "conference_hall", "src": "assets/images/conference_hall.jpg", "label": "Conference Hall" },
    { "value": "RECEPTION", "id": "reception", "src": "assets/images/reception.jpg", "label": "Reception" },
    { "value": "LOUNGE", "id": "lounge", "src": "assets/images/lounge.jpg", "label": "Lounge" }
]
        };

        // office
        const data2 = {
            
        };

        // Select the container where cards will be added
        const container_1 = document.getElementById('card-container-1');
        const container_2 = document.getElementById('card-container-2');
        console.log(container);
        

        // Loop through JSON and create elements dynamically
        data1.cards_1.forEach(card => {
            const cardElement = document.createElement('label');
            cardElement.classList.add('card');

            cardElement.innerHTML = `
                <input type="radio" name="design" value="${card.value}" id="${card.id}">
                <img src="${card.src}" alt="${card.label}" id="card_img">
                <br><label for="${card.id}">${card.label}</label>
            `;

            // Append card to container
            container_1.appendChild(cardElement);
        });
        data1.cards_2.forEach(card => {
            const cardElement = document.createElement('label');
            cardElement.classList.add('card');

            cardElement.innerHTML = `
                <input type="radio" name="design" value="${card.value}" id="${card.id}">
                <img src="${card.src}" alt="${card.label}" id="card_img">
                <br><label for="${card.id}">${card.label}</label>
            `;

            // Append card to container
            container_2.appendChild(cardElement);
        });
    </script>
</body>
</html>
