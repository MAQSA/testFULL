<?php
        if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} }		
		if (empty($email)){ 
			exit ("Go back and fill in fields!"); 
        } 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
			echo "<center>email $email is correct</center>";
		} else exit ("<center>email $email entered incorrectly</center>");
		//если логин и пароль введены, то обрабатываем их
        $email = stripslashes($email); 
        $email = htmlspecialchars($email); 
		//удаляем лишние пробелы 
        $email = trim($email); 
		$login = $_SESSION['login'];
     // подключаемся к базе 
		$db = mysql_connect ("localhost","root",""); 
         mysql_select_db ("cp",$db); 
        $result = mysql_query("SELECT * FROM infoacc WHERE email='$email'",$db); 
        $myrow = mysql_fetch_array($result); 
        if (!empty($myrow['id'])){
			 $name = $myrow['name']; 
			 $email = $myrow['email']; 
			 $password = $myrow['password']; 
			 $message = 'You have a new message, remind your password: '.$password.' '; 
			 $headers= "MIME-Version: 1.0\r\n"; 
			 $headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
			 $headers .= "From:test.com <test@test.com>\r\n"; 
			 $subject = "Hello, $name ! Password reminder.";

			 mail($email, "Запрос на востонавление пороля", "Здравствуйте $login ваш новый пороль: ",$message, $headers);

			echo "<center><h2>Password has been sent to your Email!</h2></center>";
	        echo "<br><center>You have edit email! Go to Home Page => <a href='index.php'>HomePage</a></center>"; 

		}
		else { 
			echo'<center><h2>Wrong Email! Go BACK</h2></center>';
        } 

?>