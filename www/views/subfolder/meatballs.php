<?php
session_start();


$_SESSION["currentPage"] = 'meatballs.php';
$_SESSION["commentFile"] = 'meatballComments.txt';

?>
<!DOCTYPE html>
<html>
<head>
	<title>MeatballPage</title>
        <link rel="stylesheet" type="text/css" href="../../resources/css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="../../resources/css/website.css"/>
        <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
        <script type="text/javascript" 
        src="../../resources/js/javaScript.js"></script>
    
   
</head>
<body>
    
      <?php
include 'resources/fragments/menubar.php';
	?>

<div class="grid12-6">



<div class="inner_box_recipe">
	<h1>Meatballs</h1>
	<img src="../../resources/images/meatballs2.jpg" alt="Image of Meatballs">
	<div class="text">

	<h2>Ingredients:</h2>
		<ul>
            <?php
                $xml=simplexml_load_file("resources/xml/recipes.xml");

                foreach($xml->children() as $child) {
                    if($child->title == "Meatballs") {
                        foreach($child->ingredient->children() as $iChild) {
                            echo "<li>" . $iChild . "</li>";
                        }
                    }
                }
            ?>
		   
		</ul>
	</div>
	<h3><br>Directions:</h3>
	<ul>
        <?php
            $xml=simplexml_load_file("resources/xml/recipes.xml");

            foreach($xml->children() as $child) {
                if($child->title == "Meatballs") {
                    foreach($child->recipetext->children() as $tChild) {
                        echo "<li>" . $tChild . "</li>";
                    }
                }
            }
        ?>
	</ul>


    <?php
        include 'resources/fragments/commentField.php';
    ?>

</div>

</div>
    
</body></html>