<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <?php
        include 'resources/fragments/layout.html';
    ?>
</head>
<body>
    
    <?php
        include 'resources/fragments/menubar.php';
        include 'resources/fragments/contentBox2.html';
        include 'resources/fragments/registerForm.html';
        if($outcomeOfRegister === 'usernameTaken') {
            echo "Sorry that username was already taken. Try a new one.";
        }
        if($outcomeOfRegister === 'notValidUsername') {
            echo "Sorry thats not a valid username. Try a new one.";
        }
        if($outcomeOfRegister === 'notValidPassword') {
            echo "Sorry thats not a valid password. Try a new password";
        }
    
        include 'resources/fragments/contentBoxEnd.html';
    ?>

</body>
</html>