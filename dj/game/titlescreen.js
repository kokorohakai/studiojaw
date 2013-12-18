Game.Screens.TitleScreen = function( args ){
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}
	this.extendAsClass( Game.Screen, {
		screen:"titlescreen",
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
		args.audioOBJ.pause();
	}

	/******************************************************
	* PRIVATE PROPERTIES
	******************************************************/
	var self = this;
	function init(){
		//Most of the actual initilizing will happen in postAJAX
	}

	function getElements(){
		self.E['gamestart'] = $("titlescreen_gamestart");
		self.E['options'] = $("titlescreen_options");
		self.E['quit'] = $("titlescreen_quit");
	}

	function setEvents(){
		self.E['gamestart'].observe("click",startGame);
		self.E['options'].observe("click",gotoOptions);	
		self.E['quit'].observe("click",quit);	
	}

	function startGame(){

		args.parent.changeScreen("GameScreen");
	}

	function gotoOptions(){
		args.parent.changeScreen("OptionScreen");
	}

	function quit(){
		args.parent.quit();
	}

	init();
}