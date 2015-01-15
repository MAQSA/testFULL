<?php
session_start(); 

        if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }		
		if (empty($login)){ 
			exit ("Go back and fill in fields!"); 
        } 
		$r = $_SESSION['id'];

        //если логин и пароль введены, то обрабатываем их
        $login = stripslashes($login); 
        $login = htmlspecialchars($login); 
		//удаляем лишние пробелы 
        $login = trim($login); 
     // подключаемся к базе 
         $db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db); 
     // проверка на существование пользователя с таким же логином 
        $result = mysql_query("SELECT id FROM infoacc WHERE login='$login'",$db); 
        $myrow = mysql_fetch_array($result); 
        if (!empty($myrow['id'])) { 
        exit ("Please enter a different username."); 
        } 
		// если такого нет, то сохраняем данные 
        $result2 = mysql_query ("UPDATE infoacc SET login = '$login' WHERE id = '$r'"); 
        // Проверяем, есть ли ошибки  
        if ($result2=='TRUE') { 
        echo "You have edit logged in! Now you must sign in to the site with new login. <a href='exit.php'>Exit</a>"; 
        } 
     else { 
        echo "Error! You are not edit in."; 
        } 
?>