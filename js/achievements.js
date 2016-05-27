// achievements.js - functions for updating and displaying recieved achievements

// Achievement object
function Achievement(id)
{
	var self = this;

	this.id = id;
	this.name = "";
	this.desc = "";
	this.max = 0;
	this.value = 0;
	this.image = "";

	this.set = function(data)
	{
		data = JSON.parse(data);

		self.name = data.name;
		self.desc = data.desc;
		self.max = data.max;
		self.value = data.value;
		self.image = data.image;
		console.log(data);
	}

	{this.load = function() {

		$.post('post_achievements.php?m=getachievement', { 'id' : self.id }, function (data)
		{
			self.set(data);
		});
	};}

	this.update = function(value)
	{
		self.value = value;
		$.post('post_achievements.php?m=setachievement',
        {
            'id'    : self.id,
            'value' : value

        }, function (data)
        {
			self.set(data);
        });

	}

	this.complete = function() {
	
		$.jGrowl("<img src='"+self.image+"' /> "+'Achievement unlocked: '+self.name, {theme: 'jGrowl-info'});
		self.update(self.max);

	
	}


} // }}}
