<html>
<head>
	<title>Not logged in</title>
<?php
    include 'resources/fragments/layout.html';
    ?>
</head>
<body>
    <?php
    include 'resources/fragments/menubar.php';
    include 'resources/fragments/contentBox.html';
    
    if(($currentLocation) === 'Meatballs') {
        $link = 'ShowMeatballPage';

    }
    else if($currentLocation === 'Pancakes'){
        $link = 'ShowPancakePage'; 

    }
    else{
         $link = 'ShowFirstPage';
    }

    ?>

	<div class="register">
		<h2>Sorry, you need to be logged in to write comments.</h2>
		<h4>Go to <a href="ShowFirstLogin">login</a> to log in or register. Or return to the previous page <?php echo "<a href= $link >"; ?>here</a>.</h4>



</div>
</div>
</div>
</body>
</html>

