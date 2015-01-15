<?php 
session_start(); 
        if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} }		
		if (empty($password)){ 
			exit ("Go back and fill in fields!"); 
        } 
				$r = $_SESSION['id'];

        //если логин и пароль введены, то обрабатываем их
        $password = stripslashes($password); 
        $password = htmlspecialchars($password); 
		//удаляем лишние пробелы 
        $password = trim($password); 
     // подключаемся к базе 
         $db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db); 

		// если такого нет, то сохраняем данные 
        $result2 = mysql_query ("UPDATE infoacc SET password = '$password' WHERE id = '$r'"); 
        // Проверяем, есть ли ошибки  
        if ($result2=='TRUE') { 
        echo "You have edit password! Now you must sign in to the site with new password. <a href='exit.php'>Exit</a>"; 
        } 
     else { 
        echo "Error! You are not edit in."; 
        } 
?>