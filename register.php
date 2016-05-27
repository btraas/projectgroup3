<?php 
    include('header.php'); 
    session_start();
?>

<link id="loginCSS" rel="stylesheet" type="text/css" href="css/register.css">

<?php include('menu_button.php'); ?>

    <h1>Register</h1>
    <form class="register_form" action="register_post.php" method="post">
    	<label for="username">Username:</label>
        <input type="text" id="username" name="username" size="50"  maxlength="16" />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="50" maxlength="16" />
        <label for="password">Re-enter password:</label>
        <input type="password" id="password2" name="password2" size="50" maxlength="16" />

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
        
        <button class = "register_Btn"type="submit">Register</button>
    </form>

<?php include('footer.php'); ?>
