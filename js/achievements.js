// achievements.js - functions for updating and displaying recieved achievements

// Achievement object
function Achievement(id, noLoad)
{
	var self = this;

	this.id = id;
	this.name = "";
	this.desc = "";
	this.max = 0;
	this.value = 0;
	this.image = "";

	this.set = function(data, callback)
	{
		data = JSON.parse(data);

		self.name = data.name;
		self.desc = data.desc;
		self.max = data.max;
		self.value = data.value;
		self.image = data.image;
		console.log(data);

		if(callback) callback();
	}

	this.load = function(callback) 
	{

		$.post('achievements_post.php?m=getachievement', { 'id' : self.id }, function (data)
		{
			self.set(data, callback);
		});
	}

	this.update = function(value)
	{
		self.value = value;
		$.post('achievements_post.php?m=setachievement',
        {
            'id'    : self.id,
            'value' : value

        }, function (data)
        {
			self.set(data);
        });

	}

	this.complete = function() {
		console.log("complete: value:"+self.value+" max:"+self.max)
		if(self.value >= self.max) return;
	
		$.jGrowl("<img class='achievement-icon' src='"+self.image+"' /> "+'Achievement unlocked: '+self.name, {theme: 'jGrowl-info'});
		self.update(self.max);

	
	}

	this.add = function(value)
	{
		console.log('adding '+value+' to '+self.value);
		if(self.value + value >= self.max) self.complete();
		else self.update(parseInt(self.value)+parseInt(value));
	}

	if(!noLoad) this.load();
} // }}}
