<?php
$conn = new mysqli('localhost', 'root', '', 'northwestern_university');

if ($conn->connect_error) {
    die('Connection Failed: ' . $cnon->connect_error);
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Details</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            .container {
                max-width: 600px;
                margin: auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 10px;
                background-color: #f9f9f9;
            }
            .container h1 {
                text-align: center;
            }
            .details {
                margin: 20px 0;
            }
            .details p {
                font-size: 16px;
                margin: 10px 0;
            }
            a {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Student Details</h1>
            <div class="details">
                <p><strong>First Name:</strong> <?php echo $row['first_name']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $row['last_name']; ?></p>
                <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                <p><strong>Mobile:</strong> <?php echo $row['mobile_number']; ?></p>
                <p><strong>Date of Birth:</strong> <?php echo $row['date_of_birth']; ?></p>
                <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
            </div>
            <a href="cgpa.php">Calculate your CGPA</a>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "User not found.";
}

$conn->close();
?>
