<?php
$conn = new mysqli('localhost', 'root', '', 'northwestern_university');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$gender = $_POST['gender'];

$sql = "INSERT INTO students (first_name, last_name, email, mobile_number, password, date_of_birth, address, gender)
        VALUES ('$first_name', '$last_name', '$email', '$mobile', '$password', '$dob', '$address', '$gender')";

if ($conn->query($sql) === TRUE) {
    // Get the last inserted ID
    $last_id = $conn->insert_id;

    echo "Registration Successful!<br>";
    echo "<a href='view_user.php?id=$last_id' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>View Details</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
