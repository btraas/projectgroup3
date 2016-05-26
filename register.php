<?php include('header.php'); ?>


<?php include('menu_button.php'); ?>

    <h1>Register</h1>
    <form action="register_post.php" method="post">
    	<label for="username">Username:</label>
        <input type="text" id="username" name="username" size="50"  maxlength="16" />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="50" maxlength="16" />
        <label for="password">Re-enter password:</label>
        <input type="password" id="password2" name="password2" size="50" maxlength="16" />
        <button type="submit">Register</button>
    </form>

<?php include('footer.php'); ?>
