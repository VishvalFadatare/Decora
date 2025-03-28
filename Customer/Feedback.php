<?php
    require_once('../config.php');
    include_once('customer_class.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['page_action'] == 'feedback') {
        cust_feed(); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Feedback Form</title>
</head>
<body>
    <div class="container">
        <h1>Customer Feedback Form</h1>
        <form method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="comments">Comments:</label>
                <textarea id="comments" name="comments" rows="4" placeholder="Write your feedback here..." ></textarea>
            </div>

            <div class="form-group">
                <label for="queries">Any Queries?</label>
                <textarea id="queries" name="queries" rows="4" placeholder="Write your questions here..."></textarea>
            </div>

            <div class="form-group">
                <label for="rating">Rating for the Designer:</label>
                <select id="rating" name="rating">
                    <option value="">Select Rating</option>
                    <option value="5">🌟🌟🌟🌟🌟 Excellent</option>
                    <option value="4">🌟🌟🌟🌟 Good</option>
                    <option value="3">🌟🌟🌟 Average</option>
                    <option value="2">🌟🌟 Poor</option>
                    <option value="1">🌟 Very Poor</option>
                </select>
            </div>

            <div class="form-group">
                <label for="overallRrating">Overall Rating:</label>
                <select id="overallRating" name="overall_rating" required>
                    <option value="">Select Rating</option>
                    <option value="5">🌟🌟🌟🌟🌟 Excellent</option>
                    <option value="4">🌟🌟🌟🌟 Good</option>
                    <option value="3">🌟🌟🌟 Average</option>
                    <option value="2">🌟🌟 Poor</option>
                    <option value="1">🌟 Very Poor</option>
                </select>
            </div>

            
            <button type="submit">Submit Feedback</button>
            <input type="hidden" name="page_action" value="feedback">
        </form>
    </div>
</body>
</html>
