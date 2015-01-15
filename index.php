<?php  
	session_start(); 
	if(isset($_GET['exit'])) {
		session_destroy(); 
		header('Location: index.php');
        exit;
	}
     // подключаемся к базе 
         $db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db);   
?> 
	  
<head>
<title>Panel control</title>
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
	<div>
        <h1>WELCOME</h1>

	</div>
</td>

</tr>
<tr>
<td colspan="3" class="footer">FOOTER IS HERE</td>
</tr>
</table>
</body>