// This file contains objects and functions for sounds

var volumes = {
	bgm : 100,
	sfx : 100

};

var backgroundMusicFiles = [
	"sounds/test.mp3",
	"sounds/test2.mp3"
];

var defaultSFX = new SoundEffect("");
var defaultBGM = new BackgroundMusic("")

// BackroundMusic object {{{
function BackgroundMusic(file)
{
	this.file = file;
	this.audio = new Audio(this.file);
	this.audio.volume = volumes.bgm / 100;
	this.loop = true;
	
	this.play = function() {
		return this.audio.play();
	}

	this.pause = function() {
		return this.audio.pause();
	}
} // }}}
// SoundEffect object {{{
function SoundEffect(file) 
{
	this.file = file;
    this.audio = new Audio(this.file);
    this.audio.volume = volumes.sfx / 100;
    this.loop = false;

    this.play = function() {
        return this.audio.play();
    }

    this.pause = function() {
        return this.audio.pause();
    }
} // }}}

// Play this file once, without creating a new object.
function playSFX(file)
{
	defaultSFX.audio.src = file;
	defaultSFX.play();
}

// Keep looping this file, 
function playBGM(file)
{
	console.log('playing '+file);
	defaultBGM.audio.src = file;
	defaultBGM.play();
	defaultBGM.file = "";
}


$(document).bind('pageinit', function() 
{
	volumes.bgm = getCookie('bgm');
	volumes.sfx = getCookie('sfx');

	defaultSFX.audio.volume = volumes.sfx / 100;
	defaultBGM.audio.volume = volumes.bgm / 100;

	if(empty(defaultBGM.file))
	{
		var fileNum = Math.floor((Math.random() * backgroundMusicFiles.length));
		defaultBGM.audio.src = backgroundMusicFiles[fileNum];
		console.log('playing file '+backgroundMusicFiles[fileNum]);
		defaultBGM.play();
	}

});
