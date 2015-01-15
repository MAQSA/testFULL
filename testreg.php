<?php 
    session_start();//процедура работает на сессиях.
		if (isset($_POST['login'])) { 
			$login = $_POST['login']; 
			if ($login == '') { unset($login);} 
		} 
        //заносим введенные пользователем данные в переменные, если они пустые, то уничтожаем переменные
		if (isset($_POST['password'])) { 
			$password=$_POST['password']; 
			if ($password ==''){ 
				unset($password);
			} 
		} 
			// проверка логина и пароля
	if (empty($login) or empty($password)) { 
        exit ("Go back and fill in all fields!"); 
    } 
        //если логин и пароль введены,то обрабатываем их
        $login = stripslashes($login); 
        $login = htmlspecialchars($login); 
		$password = stripslashes($password); 
        $password = htmlspecialchars($password); 
		//удаляем лишние пробелы 
        $login = trim($login); 
        $password = trim($password); 
		// подключаемся к базе 
        $db = mysql_connect ("localhost","root",""); 
        mysql_select_db ("cp",$db);          
		$result = mysql_query("SELECT * FROM infoacc WHERE login='$login'",$db); //извлекаем из базы все данные о пользователе с введенным логином 
        $myrow = mysql_fetch_array($result); 
        if (empty($myrow['password'])) { 
        //если пользователя с введенным логином не существует 
			exit ("error, check login and password"); 
        } 
        else { 
        //если существует, то сверяем пароли 
			if ($myrow['password']==$password) { 
        //если пароли совпадают, то запускаем пользователю сессию. 
				$_SESSION['login']=$myrow['login'];     
				$_SESSION['id']=$myrow['id'];
				echo("<html><head><title>Loading..</title><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>");
				exit();
			} 
			else { 
				exit ("error, check login and password."); //если пароли не сошлись 
			} 
        } 
        ?>