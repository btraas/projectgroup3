<?php include('header.php'); ?>
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
        <button class = "register_Btn"type="submit">Register</button>
    </form>

<?php include('footer.php'); ?>
