<!DOCTYPE html>
<html>
<head>
    <title>Employee Registration</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<h2>Employee Registration</h2>
<form id="employeeForm" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="email">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <button type="submit">Submit</button>
</form>

<script>
$(document).ready(function(){
    $('#employeeForm').submit(function(e){
        e.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        
        if(name.trim() == '') {
            alert('Please enter your name.');
            return;
        }
        
        if(email.trim() == '') {
            alert('Please enter your email.');
            return;
        }
        
        if(password.trim() == '') {
            alert('Please enter your password.');
            return;
        }

        var formData = $(this).serialize();
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: formData,
            success: function(response){
                alert(response);
                
            }
        });
    });
});
</script>

</body>
</html>
