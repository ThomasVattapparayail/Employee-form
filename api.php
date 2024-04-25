<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "employee";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$employee_id = $_GET['employee_id'];
$token = $_GET['token'];

$sql = "SELECT * FROM employees WHERE id = $employee_id AND token = '$token'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $employeeData = $result->fetch_assoc();

    header('Content-Type: application/json');
    echo json_encode($employeeData);
} else {
    
    http_response_code(404);
    echo json_encode(array("message" => "Employee not found."));
}

$conn->close();
?>
