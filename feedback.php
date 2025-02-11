<?php

// Check if the form was submitted or not
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $landmark = htmlspecialchars($_POST['landmark']);
    $places = isset($_POST['places']) ? $_POST['places'] : [];
    $num_people = intval($_POST['num_people']);
    $visit_date = htmlspecialchars($_POST['visit_date']);
    $rating = intval($_POST['rating']);
    $travel_mode = htmlspecialchars($_POST['travel_mode']);

    // Prepare places as a comma-separated string
    $places_visited = implode(", ", array_map('htmlspecialchars', $places));

    // Validate the visit date
    $today = date('Y-m-d');
    if ($visit_date > $today) {
        echo "<h2>Error: You cannot select a future date.</h2>";
        exit(); // Stop the script if the date is invalid
    }

    // Prepare the message to display
    $display_message = "
    <h2>Thank you, $name!</h2>
    <img src='https://res.cloudinary.com/dw3ryikmr/image/upload/v1729385294/thankyou_ryxx9d.png' alt='Thank You' />
    <p><strong>Favorite Place:</strong> $landmark</p>
    <p><strong>Places Visited:</strong> $places_visited</p>
    <p><strong>Number of People Visited:</strong> $num_people</p>
    <p><strong>Visited Date:</strong> $visit_date</p>
    <p><strong>Rating of Singapore:</strong> $rating/10</p>
    <p><strong>Mode of Travel:</strong> $travel_mode</p>
    ";

    // Email settings
    $to = "spammailmsc@gmail.com, RITISTprofessor@gmail.com";
    $subject = "Favorite City from $name";
    $email_message = "
    Name: $name\n
    Favorite Place: $landmark\n
    Places Visited: $places_visited\n
    Number of People Visited: $num_people\n
    Visit Date: $visit_date\n
    Rating of Singapore: $rating/10\n
    Mode of Travel: $travel_mode\n
    ";

    $headers = "From: sm7046@g.rit.edu"; // Replace with your sender email

    // Send the email
    $mail_sent = mail($to, $subject, $email_message, $headers);

    // Check if mail was sent
    if ($mail_sent) {
        $mail_status = "<p style='color: green;'>Form data has been emailed successfully.</p>";
    } else {
        $mail_status = "<p style='color: red;'>There was an error sending the email.</p>";
    }
} else {
    // If the form wasn't submitted, redirect back to the form page
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Received</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
.home_button{
    height:80px;
    width:80px;
}
    </style>
<body>
    <div class="container">
        <?php
            echo $display_message;
            echo isset($mail_status) ? $mail_status : '';
        ?>
        <div class="thank-you">
            <p>Thank you for your feedback! Click the button below to return home.</p>
            <a href="index.html" target="_blank">
                <img src="https://res.cloudinary.com/dw3ryikmr/image/upload/v1729385300/home_zqcgfe.png" alt="Back to Home" class="home_button" />
            </a>
        </div>
    </div>
</body>
</html>
