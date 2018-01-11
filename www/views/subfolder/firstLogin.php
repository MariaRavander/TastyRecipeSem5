<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
    <?php
        include 'resources/fragments/layout.html';
    ?>

</head>
<body>

    <?php
        include 'resources/fragments/menubar.php';
        include 'resources/fragments/contentBox2.html';
        include 'resources/fragments/loginForm.html';
    
        echo "<h3>If you don't have an log in you can register for one <a href='ShowFirstRegistration'>here</a>.</h3>";
  
        include 'resources/fragments/contentBoxEnd.html';
    ?>
    
</body>
</html>