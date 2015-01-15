<?php session_start(); 
	 if(isset($_GET['exit'])) {
		session_destroy(); 
		header('Location: index.php');
		exit;
	}

//
$login = stripslashes($login); 
$login = htmlspecialchars($login); 
$password = stripslashes($password); 
$password = htmlspecialchars($password);

$login = $_SESSION['login'];
header('Content-Type: text/html; charset=utf-8');
     // подключаемся к базе 
         $db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db);   
?>   
	  
<head>
	<title>Control panel</title>
	<link href="css/style.css" rel="stylesheet">

</head>
<body>
	<table cellpadding="0" cellspacing="0" width="860" align="center">
		<tr>
			<?php
				include 'block/header.php';
			?>
		</tr>

<td class="center_col">
	<center>
		<div >
			<h1>Personal account</h1>
		</div>     
		<table border="1" align="center" width="550" cellspacing="0" cellpadding="5">
		<tbody>
			<tr>
			<td>
				<?php
					$result = mysql_query("SELECT * FROM infoacc WHERE login='$login'",$db);
					$row = mysql_fetch_array($result);
					if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
						include 'block/login.php';
					} else { 
							echo("<b>Login: </b>". $row['login']."<br>"." <b>Password: </b>".$row['password']."<br> <b>Email: </b>".$row['email']."<br> <b>Name: </b>".$row['name']."<br> <b>Lastname: </b>".$row['lastname'].'<br>'."
<div id = 'e' style = 'display:block;'>
						<h1>Edit account</h1>

		<form action='edit_user_login.php' method='post'>
				<p> 
					<label>new login:<br></label> 
					<input name='login' type='text' size='15' maxlength='15'> <input type='submit' name='submit' value='edit'> 
				</p> 
		</form>
		<form action='edit_user_email.php' method='post'>
				<p> 
					<label>new email:<br></label> 
					<input name='email' type='email' size='15' maxlength='15'> <input type='submit' name='submit' value='edit'> 
				</p>
		</form>
		<form action='edit_user_name.php' method='post'>
				<p> 
					<label>new Name:<br></label> 
					<input name='name' type='text' size='15' maxlength='15'> <input type='submit' name='submit' value='edit'> 
				</p>
		</form>
		<form action='edit_user_lastname.php' method='post'>
				<p> 
					<label>new Last Name:<br></label> 
					<input name='lastname' type='text' size='15' maxlength='15'> <input type='submit' name='submit' value='edit'> 
				</p>
		</form>
			<h1>Edit password</h1>
			<li class ='liStyle'><a href='edit_user_password.php'>Change</a></li>

		</div>    												
							");
						
		}
				?>
		

			</tr>
			</td>
		</tbody>
		</table>
	</center>


<tr>
	<td colspan="3" class="footer">FOOTER IS HERE</td>
</tr>
	
	</table>
</body>