<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Dashboard</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="profile-pic"><img src="Assets/Images/AdminProfile.jpeg" alt=""></div>
            <h1 class="profile-name">Admin Name</h1>
            <!-- <button class="add-designers" >Add Designers</button> -->
            <button class="add-designers" onclick="window.location.href='add_designer.php'">Add Designers</button>

        </header>

        <main>
            <section class="requests">
                <h2>Customer Requests</h2>
                <a href="detailProfile.html">
                <button class="details">See details</button>
                </a>
                <div class="actions">
                    <button class="accept">Accept</button>
                    <button class="reject">Reject</button>
                </div>
            </section>
            <section class="progress">
                <h2>Work in progress</h2>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </section>
            <section class="completed">
                <h2>Completed work</h2>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </section>
        </main>
    </div>
</body>
</html>
