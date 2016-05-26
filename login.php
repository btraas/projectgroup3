<?php 
	include('header.php'); 
	session_start();
?>

<link id="loginCSS" rel="stylesheet" type="text/css" href="css/login.css">

<?php include('menu_button.php'); ?>

    <h1>Login</h1>

    <form class = 'login_form' action="login_post.php" method="post">
    	<label for="username">Username:</label>
        <input type="text" id="username" name="username" size="50"  maxlength="16" />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="50" maxlength="16"/>

    	<div class = 'error_info'>
			<?php
				if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {

					echo '<ul>';
					foreach($_SESSION['ERRMSG_ARR'] as $msg) {
						echo '<li>',$msg,'</li>'; 
					}
					echo '</ul>';
					unset($_SESSION['ERRMSG_ARR']);
				}
			?>
    	</div>

        <button type="submit">Login</button>
    </form>

<?php include('footer.php'); ?>
