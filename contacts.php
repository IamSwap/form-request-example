<?php

// $person = $_POST['person'];

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

$sql = "SELECT id, name, mobile FROM contacts";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $contacts = [];
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $contacts[] = [
            'name' => $row["name"],
            'mobile' => $row["mobile"],
        ];
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mobile"]. "<br>";
    }

    echo json_encode($contacts);
} else {
    echo "0 results";
}

$conn->close();
