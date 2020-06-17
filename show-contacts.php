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
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hey it works</h1>

    <form method="POST" action="http://form-request.test/add-contact.php">
        <input type="text" name="person" placeholder="Name">
        <input type="text" name="mobile" placeholder="Mobile">
        <button type="submit">Save</button>
    </form>

    <ul>
        <?php
            foreach ($contacts as $contact) {
                echo '<li>' . $contact['name']. '</li>';
            }
        ?>
    </ul>
</body>
</html>