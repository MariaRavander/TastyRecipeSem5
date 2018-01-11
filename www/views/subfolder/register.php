<html>
<head>
	<title>Register</title>
	<link href="reset.css" rel="stylesheet" type="text/css">
	<link href="website.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="menu_bar">
<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="calendar.html">Calendar</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Recipes</a>
    <div class="dropdown-content">
      <a href="pancakes.php">Pancakes</a>
      <a href="meatballs.php">Meatballs</a>
    </div>
  </li>
    <li id="login"><a id="active" href="login.html">Log in</a></li>
</ul>
</div>

<div class="grid12-6">

<div class="inner_box2">
	<div class="register">
		
			<?php
			$readFromFile = fopen("users.txt", "r+") or die("Unable to open file!");

			$username = $_GET["username"];
			$password = $_GET["password"];

			while(!feof($readFromFile)) {

				if(trim(fgets($readFromFile)) === $username) {
                    echo "<h2>Register new user</h2>
		<h3>Username and password has to be at <br>least 3 charecters long.</h3>

		<form action='register.php' method='get'>
			<div class='nickName'>
			<label for='username'>Your user name:<br></label>
	    	<input type='text' name='username' class='text-author'/ placeholder='Write your user name here'>
	    	</div>
	    	<div class='password'>
	    	<label for='password'>Your password:<br></label>
			<input type='password' name='password' class='text-author'/ placeholder='Write your password here'>
	    	</div>

	    	<div class='submit'>
	    	<input type='submit' value='Register'>
	    	<input type='submit' formaction='register.html' value='Cancel' >
	    	</div>


	    </form>";
					echo "Sorry that username was already taken. Try a new one.";
					break;
				}
				fgets($readFromFile);
				fgets($readFromFile);
			}

if(fgets($readFromFile) ===  false) {
	$txt = PHP_EOL . $username;
	fwrite($readFromFile, $txt);
	$txt = PHP_EOL . $password;
	fwrite($readFromFile, $txt);
	$txt = PHP_EOL . "end";
	fwrite($readFromFile, $txt);
	echo "<h2>You are registerd!</h2> 
          <h2>You can now log in <a href='login.html'>here</a>.</h2>";
	}

fclose($readFromFile);
?>

</div>
</div>
</div>
</body>
</html>