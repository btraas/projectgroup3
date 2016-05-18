<?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="css/settings.css">
<script src='js/settings.js'></script>

<?php include('menu_button.php'); ?>

		<div class='volume_text'>BGM Volume</div>
		<input type="range" class='bgm' id='bgm' value="" min="0" max="100" onchange ="showVal_bgm(this.value)" />

		<div class='volume_text'>SFX Volume</div>
		<input type="range" class='sfx' id='sfx' value="" min="0" max="100" onchange ='showVal_sfx(this.value)'/>
        
        <div class="switcher">
            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
		    <legend class='theme'>Dark/Light Theme</legend>
            <input type="radio" name="radio-choice-a1" id="radio-choice-a1" value="Dark" checked="checked" />
			<label for="radio-choice-a1">Dark</label>
			<input type="radio" name="radio-choice-a1" id="radio-choice-b1" value="Light"  />
			<label for="radio-choice-b1">Light</label>
            </fieldset>
        </div>

<?php include('footer.php'); ?>
