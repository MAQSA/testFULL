<?php 
        if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
        if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} } 
        if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} } 
        if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} } 
        if (isset($_POST['lastname'])) { $lastname=$_POST['lastname']; if ($lastname =='') { unset($lastname);} } 
		
		if (empty($login) or empty($password) or empty($email) or empty($name) or empty($lastname)){ 
        exit ("Go back and fill in all fields!"); 
        } 
        //если логин и пароль введены, то обрабатываем их
        $login = stripslashes($login); 
        $login = htmlspecialchars($login); 
		$password = stripslashes($password); 
        $password = htmlspecialchars($password); 
		$email = stripslashes($email); 
        $email = htmlspecialchars($email); 
		$name = stripslashes($name); 
        $name = htmlspecialchars($name); 
		$lastname = stripslashes($lastname); 
        $lastname = htmlspecialchars($lastname);
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "E-mail ($email) set right.";
			}else {exit ("E-mail ($email) error!.");}		

        $login = trim($login); 
        $password = trim($password); 
		$email = trim($email); 
		$name = trim($name); 
		$lastname = trim($lastname); 
     // подключаемся к базе 
         $db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db); 
     // проверка на существование пользователя с таким же логином 
        $result = mysql_query("SELECT id FROM infoacc WHERE login='$login'",$db); 
        $myrow = mysql_fetch_array($result); 
        if (!empty($myrow['id'])) { 
        exit ("Please enter a different username."); 
        } 
     // проверка на существование пользователя с таким же email 
        $result1e = mysql_query("SELECT id FROM infoacc WHERE email='$email'",$db); 
        $myrow1 = mysql_fetch_array($result1e); 
        if (!empty($myrow1['id'])) { 
        exit ("Please enter a different email."); 
        } 
		// если такого нет, то сохраняем данные 
        $result2 = mysql_query ("INSERT INTO infoacc (login, password, email, name, lastname) VALUES('$login','$password','$email','$name','$lastname')"); 
        // Проверяем, есть ли ошибки 
        if ($result2=='TRUE') { 
        echo "You have successfully logged in! Now you can go to the site. <a href='index.php'>Home page</a>"; 
        } 
     else { 
        echo "Error! You are not logged in."; 
        } 
        ?>