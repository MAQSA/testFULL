<?php 
session_start(); 
        if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} }		
		if (empty($email)){ 
			exit ("Go back and fill in fields!"); 
        } 
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
			echo "email $email is correct";
		} else exit ("email $email entered incorrectly");
        //если логин и пароль введены, то обрабатываем их
        $email = stripslashes($email); 
        $email = htmlspecialchars($email); 
		//удаляем лишние пробелы 
        $email = trim($email); 
		$login = $_SESSION['login'];
		$r = $_SESSION['id'];
     // подключаемся к базе 
		$db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db); 
     // проверка на существование пользователя с таким же логином 
        $result = mysql_query("SELECT id FROM infoacc WHERE email='$email'",$db); 
        $myrow = mysql_fetch_array($result); 
        if (!empty($myrow['id'])) { 
        exit ("Please enter a different username."); 
        } 
		// если такого нет, то сохраняем данные 
        $result2 = mysql_query ("UPDATE infoacc SET email = '$email' WHERE id = '$r'", $db); 
        // Проверяем, есть ли ошибки 
        if ($result2=='TRUE') { 
        echo "You have edit email! Go to Home Page => <a href='index.php'>HomePage</a>"; 
        } 
     else { 
        echo "Error! You are not edit in."; 
        } 
?>