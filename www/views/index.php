<!DOCTYPE html>
<html>
<head>
    <title>FirstPage</title>    
    <?php
        include 'resources/fragments/layout.html';
    ?>

</head>
<body>
    <?php
        include 'resources/fragments/menubar.php';
        //include '../../resources/fragments/menubar.php';
        include 'resources/fragments/contentBox.html';
    ?>
    
    <h1>Tasty Recipes</h1>
    <h2><br/>Welcome to Tasty Recipes! We are here to make your everyday cooking a little easier, just go ahead to our <a href="ShowCalendar">calendar</a> to see todays dinnertips. Enjoy your meal!</h2>

    <?php
        include 'resources/fragments/contentBoxEnd.html';
    ?>
    
</body>
</html>