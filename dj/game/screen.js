Game.Screen = function( args ){
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}
	/******************************************************
	* PUBLIC / SHARED PROPERTIES
	******************************************************/
	this.E = {};
	this.destroy = function(){
		self.E['screen'].remove();
	}
	this.setOpacity = function( i ){
		self.E['screen'].setStyle({
			opacity:i
		})
	}
	/******************************************************
	* PRIVATE PROPERTIES
	******************************************************/
	var self = this;
	function init(){
		createElements();
		retrieveMarkup();
	}
	function createElements(){
		self.E['screen'] = new Element('div',{
			class: args.screen+" gamescreen",
			id: args.screen
		});
		self.E['screen'].setStyle({
			opacity:0.0
		})
		args.windowContainer.insert(self.E['screen']);
	}
	function setupEvents(){

	}
	function retrieveMarkup(){
		new Ajax.Request("/dj/game/"+args.screen+".php",{
			onComplete: function(xhr,status){
				if (xhr.responseText){
					self.E['screen'].update(xhr.responseText);
					args.child.postAJAX();
				}
			}
		});
	}
	init();
}