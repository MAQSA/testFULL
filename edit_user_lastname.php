<?php 
session_start(); 
        if (isset($_POST['lastname'])) { $lastname = $_POST['lastname']; if ($lastname == '') { unset($lastname);} }		
		if (empty($lastname)){ 
			exit ("Go back and fill in fields!"); 
        } 
        //если логин и пароль введены, то обрабатываем их
        $lastname = stripslashes($lastname); 
        $lastname = htmlspecialchars($lastname); 
		//удаляем лишние пробелы 
        $lastname = trim($lastname); 
		$login = $_SESSION['login'];
		$r = $_SESSION['id'];
     // подключаемся к базе 
		$db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db); 
 
		// если такого нет, то сохраняем данные 
        $result2 = mysql_query ("UPDATE infoacc SET lastname = '$lastname' WHERE id = '$r'", $db); 
        // Проверяем, есть ли ошибки 
        if ($result2=='TRUE') { 
        echo "You have edit lastName! Go to Home Page. <a href='index.php'>HomePage</a>"; 
        } 
     else { 
        echo "Error! You are not edit in."; 
        } 
?>