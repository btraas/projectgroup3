// This file contains objects and functions for sounds
// Brayden Traas May 2016

/* Usage:

SFX.play(file);			// Play a sound effect file
SFX.volume(percent);	// Set SFX volume
SFX.audio				// SFX HTML5 audio object


BGM.play(file);			// Play a music file. After completion, a new track will be played
BGM.volume(percent);	// Set BGM volume
BGM.play();				// Replay this track
BGM.next();				// Skip to next track
BGM.prev();				// Skip to previous track
BGM.audio				// BGM HTML5 audio object

*/


// Default volumes if no cookie is set
var volumes = {
	bgm : 100,
	sfx : 100

};

// Volume multipliers. We want SFX > BGM
var volumeMultipliers = {
	bgm: 0.15,
	sfx: 1
};


var backgroundMusicFiles = [
	"resources/sounds/bgm_divider.mp3",
	"resources/sounds/bgm_el_tranva.mp3",
	"resources/sounds/bgm_gurgle.mp3",
	"resources/sounds/bgm_ticking_away.mp3",
	"resources/sounds/bgm_washed_out.mp3"
];

var SFX = new SoundEffect("");
var BGM = new BackgroundMusic("")

var tmpTimeout;

// BackroundMusic object {{{
function BackgroundMusic(file)
{
	// Initialize -----------
	
	var self = this;

	this.index = -1;
	this.file = file;

	this.audio = new Audio(self.file);
	this.audio.volume = volumes.bgm / 100;
	this.loop = true;
	this.time = 0;
	
	this.volume = function(value)
	{
		// convert percent to decimal
		if(value >= 1) value = value / 100; 

		// multiply by multiplier (we want SFX > BGM at max)
		value = value*volumeMultipliers.bgm;

		self.audio.volume = value;
	}

	
	/** 
	 *	Load function. Can load a filename or an index.
	*/
	{this.load = function(file){

		this.audio.currentTime = 0;

		if(empty(file) && file!=0) 
		{
			console.log('reloading '+self.file);
			return false;
		}

		if(!isNaN(file))
		{
			self.index = file;
			self.file = backgroundMusicFiles[self.index];
			self.audio.src = self.file;

			console.log('loading track '+file+' -> '+self.file);

			self.audio.load();
			return true;
		}
		else
		{
			self.index = -1;
			self.file = file;
			self.audio.src = self.file;

			console.log('loading '+file);

			self.audio.load();
			return true;
		}
	}}

	/**
	*	Play function. Can load & play a file or replay current (don't pass filename)
	*/
	this.play = function(file) 
	{

		self.load(file);
		return self.audio.play();
	}

	/**
	*	Pause shortcut
	*/

	this.pause = function()
	{
		self.audio.pause();
	}

	/**
	*	Replay function. Ignores passed parameters (when this is called via event)
	*/
	this.replay = function()
	{
		self.play();
	}

	/** 
	*	Loop function. Load this file and continue looping, or loop current file
	*/

	this.loop = function(file)
	{
		self.play(file);
		self.audio.removeEventListener('ended', self.next);
		self.audio.addEventListener('ended', self.replay); // replay this instead of next
	}

	// Play the next track
	this.next = function()
	{
		// If we are at the end of the list, return to the beginning
		if(self.index >= backgroundMusicFiles.length - 1) self.index = -1;

		// Increment index, then play it
		return self.play(++self.index);
	}

	// Play the previous track
	this.prev = function()
	{
		// If we are at the beginning of the list, return to end
		if(self.index == 0) self.index = backgroundMusicFiles.length;

		// Decrement index, then play it
		return self.play(--self.index);
	}

	// This is turning out to be quite the HTML5 playlist API...

	// Play next track on end. If the current track is not in the playlist, play the first track.
	this.audio.addEventListener("ended", this.next);


} // }}} 

// SoundEffect object {{{
function SoundEffect(file) 
{
	var self = this;

	this.file = file;
    this.audio = new Audio(this.file);
    this.audio.volume = volumes.sfx / 100;
    this.loop = false;

	this.nextFile = ""; // only queue 1 file, unlike BGM

	this.volume = function(value)
    {
		// convert percent to decimal
        if(value >= 1) value = value / 100;

        // multiply by multiplier (we want SFX > BGM at max)
        value = value*volumeMultipliers.sfx;

        self.audio.volume = value;

    }

	{this.load = function(file){

        this.audio.currentTime = 0;

        if(empty(file))
        {
            console.log('reloading '+self.file);
            return false;
        }
        else
        {
            self.file = file;
            self.audio.src = self.file;

            console.log('loading '+file);

            self.audio.load();
            return true;
        }
    }}


    this.play = function(file) {

		if(!this.audio.ended && !empty(this.src))
		{
			console.log('queueing SFX: '+file);
			this.nextFile = file;
			return false;
		}

		console.log('playing SFX: '+file);

		clearTimeout(tmpTimeout);
		tmpTimeout = window.setTimeout(function() 
		{
			self.load(file);
			return self.audio.play();
		}, 200);
    }

	this.next = function()
	{
		if(empty(self.nextFile)) return false;
		self.play(self.nextFile);
		self.nextFile = "";
	}

	this.audio.addEventListener("ended", this.next);


} // }}}

$(document).bind('pageinit', function() 
{
	// get volumes
	volumes.bgm = getCookie('bgm');
	volumes.sfx = getCookie('sfx');

	// set volumes
	SFX.volume(volumes.sfx);
	BGM.volume(volumes.bgm);

	// play a random music file to start, or if the last track wasn't a standard track...
	if(empty(BGM.file))
	{
		var fileNum = Math.floor((Math.random() * backgroundMusicFiles.length));
		//console.log('playing file '+backgroundMusicFiles[fileNum]);
		BGM.play(fileNum);
	}

});
