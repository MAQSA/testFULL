<?php 
session_start(); 
        if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} }		
		if (empty($name)){ 
			exit ("Go back and fill in fields!"); 
        } 
        //если логин и пароль введены, то обрабатываем их
        $name = stripslashes($name); 
        $name = htmlspecialchars($name); 
		//удаляем лишние пробелы 
        $name = trim($name); 
		$login = $_SESSION['login'];
		$r = $_SESSION['id'];
     // подключаемся к базе 
		$db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db); 
 
		// если такого нет, то сохраняем данные 
        $result2 = mysql_query ("UPDATE infoacc SET name = '$name' WHERE id = '$r'", $db); 
        // Проверяем, есть ли ошибки 
        if ($result2=='TRUE') { 
        echo "You have edit Name! Go to Home Page. <a href='index.php'>HomePage</a>"; 
        } 
     else { 
        echo "Error! You are not edit in."; 
        } 
?>