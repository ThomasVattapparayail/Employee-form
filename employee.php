<!DOCTYPE html>
<html>
<head>
    <title>Fetch Employee Data</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<h2>Fetch Employee Data</h2>
<label for="name">Employee ID</label><br>
<input type="text" id="employeeId" placeholder="Enter Employee ID">
<label for="name">Token</label><br>
<input type="text" id="token" name="token" placeholder="token"><br>
<button onclick="fetchEmployeeData()">Fetch Data</button>

<div id="employeeDetails"></div>

<script>
function fetchEmployeeData() {
    var employeeId = $('#employeeId').val();
    var token = $('#token').val();
    $.ajax({
        url: 'api.php?employee_id=' + employeeId +'&token=' + token,
        type: 'GET',
        success: function(response){
            console.log(response);
            $('#employeeDetails').text(JSON.stringify(response, null, 2));
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });
}
</script>

</body>
</html>
