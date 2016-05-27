<?php include('header.php'); ?>
<?php $gm = @$_COOKIE['gameMode']; ?>
    <script src='js/difficulty.js'></script>

		<?php include('menu_button.php'); ?>

        <div id="text"><label for="level">Difficulty:</label> </div>

            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
            <input type="radio" name="radio-choice-a2" id="classic-mode" value="0" <?php if ($gm==0) {echo 'checked="checked"';} ?>  onclick="onRadio(this.value)"/>
			<label for="classic-mode">Classic</label>
			<input type="radio" name="radio-choice-a2" id="challenge-mode" value="1" <?php if ($gm==1) {echo 'checked="checked"';} ?> onclick="onRadio(this.value)"/>
			<label for="challenge-mode">Challenge</label>
            </fieldset>
               
	    <div class="lvimg">
        		<img id="lvImg" src="resources/level/Lv1.png" alt="Level Image" >
		</div>
        <div class="levelselection">
            	<input type="range" name="level" id ="level" value="1" min="1" max="7" onchange="updateImg(this.value);">
    	</div>
		<table style='vertical-align: top; text-align: left; margin: 10px;' id='info-table'>
		</table>

        <!--<button type="button" onclick="goPlay()">Play</button>-->
		<div class='bottom play'>
		    <input type='button' class='gameBtn' value='Play' onclick="$('#game').click()">
		    <!-- just a placeholder (invisible) for jquery mobile transitions -->
		    <a id='game' href='game.php' data-transition='flow'></a>
		</div>


<?php include('footer.php'); ?>
