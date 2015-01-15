	<?php 
	  if (empty($_SESSION['login']) or empty($_SESSION['id'])){ }
	  else{ echo("<html><head><title>Loading..</title><meta http-equiv='Refresh' content='3; URL=index.php'></head></html>");}
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
     <table border="1" align="center" width="550" cellspacing="0" cellpadding="5">
<tbody>

<tr>
<td>
	 <div id="login-form">
        <h1>REGISTRATION</h1>

        <fieldset>
            <form action="save_user.php" method="post">
   				<p> 
					<label>login:<br></label> 
					<input name="login" type="text" size="15" maxlength="15"> 
				</p> 
				<p> 
					<label>password:<br></label> 
					<input name="password" type="text" size="15" maxlength="15"> 
				</p>
				<p> 
					<label>email:<br></label> 
					<input name="email" type="email" size="15" maxlength="15"> 
				</p>
				<p> 
					<label>Name:<br></label> 
					<input name="name" type="text" size="15" maxlength="15"> 
				</p>
				<p> 
					<label>Last Name:<br></label> 
					<input name="lastname" type="text" size="15" maxlength="15"> 
				</p>				
				
				<p> 
					<input type="submit" name="submit" value="sign up"> 
				</p>

            </form>
			 
			
        </fieldset>
 
    </div>


</td>
</tbody>
</table> </td>
</center>
</tr>
<tr>
<td colspan="3" class="footer">FOOTER IS HERE</td>
</tr>
</table>
</body>