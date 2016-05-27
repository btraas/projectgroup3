
//Dark theme replace the source of css root
function Dtheme(){
    document.getElementById('theme').href = "css/themes/darkTheme.min.css";
    document.getElementById('mainCSS').href = "css/main.css"; 
    document.getElementById('menuCSS').href = "css/menu.css"; 
    document.getElementById('settingsCSS').href = "css/settings.css";
    document.getElementById('difficultyCSS').href = "css/difficulty.css"; 
}
//Ligth theme replace the source of css root
function Ltheme(){
    document.getElementById('theme').href = "css/themes/lightTheme.min.css";
    document.getElementById('mainCSS').href = "css/main_L.css";
    document.getElementById('menuCSS').href = "css/menu_L.css";  
    document.getElementById('settingsCSS').href = "css/settings_L.css";
    document.getElementById('difficultyCSS').href = "css/difficulty_L.css"; 
}

// set cookie for theme
function settheme(value){
    setCookie("theme",value,365); //save theme
}
