<html>
<body>

<td colspan="3" class="header">
<ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="lk.php">Personal account</a></li>
		<li><h> 
		<?php 
			if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
				echo "You are logged in as Guest"; 
			} else { 
					echo "You are logged in as ".$_SESSION['login']; 
				}
		?>
			</h>
		</li>
	  <li>
	  <?php 
		if (empty($_SESSION['login']) or empty($_SESSION['id'])){ }
		else{ echo "<a href=/exit.php>Out</a>";}
	  ?>
	  </li>
	  
</ul>
</td>
</html>
</body>