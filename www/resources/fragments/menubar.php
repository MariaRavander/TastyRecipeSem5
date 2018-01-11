<div class="menu_bar">
<ul>
   <?php
    if($currentLocation === 'FirstPage') {
        echo "<li><a id='active' href='ShowFirstPage'>Home</a></li>";
    }
    else {
        echo "<li><a href='ShowFirstPage'>Home</a></li>";
    } 
    
    if($currentLocation === 'Calendar') {
        echo "<li><a id='active' href='ShowCalendar'>Calendar</a></li>";
    }
    else {
        echo "<li><a href='ShowCalendar'>Calendar</a></li>";
    }
    ?>
  <li class="dropdown">
      <?php
      if($currentLocation === 'Pancakes' || $currentLocation === 'Meatballs')  {
    echo "<a id='active' href='javascript:void(0)' class='dropbtn'>Recipes</a>";
      }
      else {
          echo "<a href='javascript:void(0)' class='dropbtn'>Recipes</a>";
      }
      ?>
    <div class="dropdown-content">
        <?php
         if($currentLocation === 'Pancakes') {
        echo "<a id='active' href='ShowPancakePage'>Pancakes</a>";
    }
    else {
       echo "<a href='ShowPancakePage'>Pancakes</a>";
    }
       
         if($currentLocation === 'Meatballs') {
        echo "<a id='active' href='ShowMeatballPage'>Meatballs</a>";
    }
    else {
       echo "<a href='ShowMeatballPage'>Meatballs</a>";
    }
    ?>
    
    </div>
  </li>
                <?php
	        if(trim($user) !== ''){
	        	echo "<li id='logout'><a href='ShowLogout'>Log out</a></li>
	        	<li id='user'>Logged in as: " . $user . "</li>";
                
	        	}
	        else if($currentLocation === 'Login') {
	        echo "<li id='login'><a id='active' href='ShowFirstLogin'>Log in</a></li>";
	        
	        }
            else {
                echo "<li id='login'><a href='ShowFirstLogin'>Log in</a></li>";
            }
	?>
</ul>
</div>