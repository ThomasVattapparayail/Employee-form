<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "employee";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password=$_POST['password'];

$errors = array();


if (empty($name)) {
    $errors[] = "Name is required.";
}

if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}


if (empty($password)) {
    $errors[] = "Password is required.";
}


if (!empty($errors)) {
    http_response_code(400);
    echo json_encode($errors);
    exit; 
}

$token = bin2hex(random_bytes(16));

$sql = "INSERT INTO employees (name,email,password,token) VALUES ('$name', '$email','$password','$token')";

if ($conn->query($sql) === TRUE) {
    echo "JSON data stored successfully in the database.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
