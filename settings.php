<?php include('header.php'); ?>

<link id="settingsCSS" rel="stylesheet" type="text/css" href="css/settings.css">
<script src='js/settings.js'></script>

<?php include('menu_button.php'); ?>

		<div class='volume_text' id="volume_text1">BGM Volume</div>
		<input type="range" class='bgm' id='bgm' value="" min="0" max="100" onchange ="showVal_bgm(this.value)" />

		<div class='volume_text' id="volume_text2">SFX Volume</div>
		<input type="range" class='sfx' id='sfx' value="" min="0" max="100" onchange ='showVal_sfx(this.value)'/>
        
        <div class="theme_switcher">
            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
		    <legend class='theme' id="theme_text">Dark/Light Theme</legend>
            <input type="radio" name="radio-choice-a1" id="radio-choice-a1" value="0" <?php if(@$_COOKIE['theme']!=1) echo "checked"; ?> onclick="settheme(this.value), Dtheme()"/>
			<label for="radio-choice-a1">Dark</label>
			<input type="radio" name="radio-choice-a1" id="radio-choice-b1" value="1" <?php if(@$_COOKIE['theme']==1) echo "checked"; ?> onclick="settheme(this.value), Ltheme()"/>
			<label for="radio-choice-b1">Light</label>
            </fieldset>
        </div>

<?php include('footer.php'); ?>
