<?php       
      session_start(); 
?> 
	 
      <div id="login-form">
        <h1>Authorization on the site</h1>

        <fieldset>
            <form action="testreg.php" method="post">
                <input type="login" name="login">
                <input type="password" name="password">
                <input type="submit" value="Enter">    
                
            </form>
			 
			<a href="reg.php">Sign Up</a>  <a href="restorePass.php">Restore password</a>  
        </fieldset>
 
    </div>
	 
      
     