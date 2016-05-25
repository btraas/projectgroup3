

//Dark theme replace the source of css root
function Dtheme(){
    document.getElementById('theme').href = "css/themes/darkTheme.min.css";
    document.getElementById('mainCSS').href = "css/main.css"; 
    document.getElementById('settingsCSS').href = "css/settings.css";
    document.getElementById('leaderboardsCSS').href = "css/leaderboards.css"; 
    document.getElementById('resultCSS').href = "css/result.css"; 
}
//Ligth theme replace the source of css root
function Ltheme(){
    document.getElementById('theme').href = "css/themes/lightTheme.min.css";
    document.getElementById('mainCSS').href = "css/main_L.css"; 
    document.getElementById('settingsCSS').href = "css/settings_L.css";
    document.getElementById('leaderboardsCSS').href = "css/leaderboards_L.css";  
    document.getElementById('resultCSS').href = "css/result_L.css"; 
}