<?php include('header.php'); ?>

<link id="loginCSS" rel="stylesheet" type="text/css" href="css/login.css">

<?php include('menu_button.php'); ?>

    <h1>Login</h1>

<div class = 'login_wrapper'>

    <form action="login_post.php" method="post">
    	<label for="username">Username:</label>
        <input type="text" id="username" name="username" size="50"  maxlength="16" />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="50" maxlength="16"/>
        
    	<div class = 'info'></div>

        <button type="submit">Login</button>
    </form>
</div>

<?php include('footer.php'); ?>
