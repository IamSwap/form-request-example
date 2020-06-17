<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$person = $_POST['person'];
$mobile = $_POST['mobile'];

if (isset($person) && isset($mobile)) {
    $sql = 'INSERT INTO contacts (name, mobile) VALUES ("'.$person.'", "'.$mobile.'")';

    if ($conn->query($sql) === true) {
        echo "New contact created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();

header("Location: http://form-request.test/show-contacts.php");
