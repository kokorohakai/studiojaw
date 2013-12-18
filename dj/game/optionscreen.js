Game.Screens.OptionScreen = function( args ){
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}
	this.extendAsClass( Game.Screen, {
		screen:"optionscreen",
		windowContainer:args.windowContainer,
		child:this,
		parent: args.parent
	});
	/******************************************************
	* PUBLIC / SHARED PROPERTIES
	******************************************************/
	this.destroyScreen = function(){
		this.destroy();
	}	
	this.postAJAX = function(){
		getElements();
		setEvents();
	}
	/******************************************************
	* PRIVATE PROPERTIES
	******************************************************/
	var self = this;
	function init(){
		//Most of the actual initilizing will happen in postAJAX
	}

	function getElements(){
		self.E['return'] = $("optionscreen_return");
	}

	function setEvents(){
		self.E['return'].observe("click",returnToTitle);
		self.E['options'].observe("click",gotoOptions);	
		self.E['quit'].observe("click",quit);	
	}

	function returnToTitle(){
		args.parent.changeScreen("TitleScreen");
	}

	init();
}