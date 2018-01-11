<?php
?>
<html>
<head>
	<title>LogIn</title>
        <link rel="stylesheet" type="text/css" href="../../resources/css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="../../resources/css/website.css"/>
</head>
<body>

    <?php
        include 'resources/fragments/menubar.php';
        include 'resources/fragments/contentBox.html';

        echo "<div class='youAreLoggedIn'><h4>Welcome " . $user . ", <br>you are logged in!</h4>
        <h5><br>You can now comment our recipes.<br>Please go on to our <a href='ShowCalendar'>calendar</a> and get inspired!</h5></div>";
    
        include 'resources/fragments/contetnBoxEnd.html';
    ?>

  
</body>
</html>