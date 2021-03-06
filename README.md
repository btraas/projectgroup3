##Group 3 
* Brayden Traas
* Shawn Kim
* Kelvin Zheng
* Benjamin Hao
* Yoshiaki Murakami
#Memory Swipe
###Improve your memory with a simple game. Simply remember the numbers that appear, and then swipe from one to the next.

##Code structure

* Game pages: ./
* Scripts:    ./js/
* Styles:     ./css/
* Images:     ./resources/images/
* Sounds:     ./resources/sounds/
* SQL:        ./sql/


##Running the game

* Apache / IIS must be running (cannot be run through local .php files)
* For leaderboard functionality, a mySQL database must be set up (see SQL/ folder for SQL statements). config.php holds the db connection info.
* Your browser must support cookies, javascript, and HTML5.

##Playing the game

* To begin, hit the "Play" button
* Here is the difficulty selection page. Users can choose either "Classic" or "Challenge" mode. You can use the slider to choose a difficulty level. The preview shows the grid size, and the number of numbers will be shown as well. Hit "Play" to move on to the game page.
  * **Classic**: Numbers will be shown briefly. Remember the order of the numbers (low to high) and swipe from 1 -> X. Points are given for speed and accuracy.
  * **Challenge**: Numbers will be shown briefly. The numbers may not be consecutive, but players still need to drag from lowest to highest, **except for odd numbers**. Odd numbers are thrown in at higher difficulty settings.
* After completion of 10 rounds, players are directed to a result page showing their score. From here, players can go "Home" (main menu), post their score to the global leaderboards, choose another difficulty, or replay this difficulty. If the user chooses to post their score, they can then go to the leaderboards to view their rank against other players.

## Technologies used:
* HTML5
* PHP5
* Javascript
* CSS3
* JQuery
* jQuery Mobile
* PatternLock library
* SoundJS library
* SW opening crawl by Tim Pietrusky
* Pure-CSS circular percentage bar

## Sprint 2 Challenges:
* Large, unified files made it harder to collaborate (more merge conflicts). Splitting CSS, Javascript, and PHP/HTML simplified this process and prevented further issues.
* Our light theme is taking much longer tan anticipated. Many of our CSS classes and styling are split across multiple files, so it's hard to overwrite / replace these class colors with a single CSS stylesheet.

