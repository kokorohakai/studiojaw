function Game( audioOBJ ){
	if (this==window){
		console.log("This must be instantiated with new.");
		return;
	}

	/**********************
	* PRIVATE VARIABLES
	**********************/
	var self = this;
	var E = {}; //the usual element cache.
	var init2complete = false;
	var scr = {
		current:"",
		previous:"",
		currentObj:null,
		previousObj:null,
		changing: false,
		opacity: 0.0
	}
	
	var gameWindow = {
		opening: false,
		cloasing: false,
		opacity: 0.0,
	}
	var isOpen = false;
	var GET = {};

	/**********************
	* PUBLIC VARIABLES
	**********************/


	/**********************
	* PRIVATE METHODS
	**********************/
	//init 1 stuff
	function init( audioOBJ ) { //happens on DOM ready.
		if (!audioOBJ){
			console.log("I need the audio to tie the game too!");
			return;
		}
		getElements();
		setEvents();
		setGet();
		if ( GET['playgame'] == "true" ) {
			setTimeout(function(){
				open();
			},1000)
		}
	}

	function getElements(){
		E["audioOBJ"] = audioOBJ;
		E["playGame"] = $("playGame");
		E["body"] = $$("body")[0];
		E['doc'] = document.documentElement;
	}

	function setEvents(){
		E["playGame"].observe("click",open);
	}


	//init 2 stuff
	function init2() { //happens on first open.
		if (init2complete) return;
		createElements();
		init2complete = true;
	}

	function createElements(){
		E['gameWindow'] = new Element('div',{
			class: 'gameWindow',
			id: 'gameWindow'
		});
		E['gameWindow'].hide();
		E["body"].insert(E['gameWindow']);


		E['gameWindowBody'] = new Element('div',{
			class:'gameWindowBody',
			id: 'gameWindowBody'
		});
		E['gameWindowBody'].hide();
		E["gameWindow"].insert(E['gameWindowBody']);


		E['gameWindowContainer'] = new Element('div',{
			class:'gameWindowContainer',
			id: 'gameWindowContainer'
		});
		E['gameWindowBody'].insert(E['gameWindowContainer']);
	}

	//game window stuff
	function open(){
		init2();
		E["audioOBJ"].pause();
		E['gameWindow'].setStyle({
			backgroundColor: "rgba(0,0,0,0)"
		})
		E['gameWindow'].show();
		gameWindow.opening = true;
		gameWindow.opacity = 0.0;
		E['gameWindowBody'].setStyle({
			opacity:"0.25"
		})
		E['gameWindowBody'].show();

		self.changeScreen("TitleScreen");
		isOpen = true;
	}

	function quit(){
		gameWindow.closing = true;
		gameWindow.opacity = 0.75;
		E['gameWindow'].setStyle({
			backgroundColor: "rgba(0,0,0,0.75)"
		});
		E['gameWindowBody'].setStyle({
			opacity:"0.25"
		});
	}


	/*
		Render logic. 

		This needs to be called using some kind of timer not controlled by this class. 
		The point is because, you probably have an audio OBJ, and it probably makes updates
		to the page at periodic times. So I find there is no point in having two timers running
		around mucking things up.
	*/
	function render(){
		if (!init2complete || !isOpen) return;

		var metrics = getDimensions();

		updateGameWindow(metrics);
		renderChanging();

		if (scr.currentObj){
			if (scr.currentObj.render){
				scr.currentObj.render();
			}
		}
	}

	function updateGameWindow( metrics ){
		renderOpening();
		renderClosing();
		E['gameWindow'].setStyle({
			"height":metrics.height+"px",
			"width":metrics.width+"px"
		});
	}

	function renderClosing(){
		if (gameWindow.closing){
			gameWindow.opacity-=0.1;
			if ( gameWindow.opacity <= 0.0) {
				gameWindow.opacity = 0.0;
				gameWindow.closing = false;
				E['gameWindow'].hide();
				isOpen = false;
			}
			E['gameWindow'].setStyle({
				backgroundColor: "rgba(0,0,0,"+gameWindow.opacity+")"
			});
			E['gameWindowBody'].setStyle({
				opacity: (gameWindow.opacity+0.25)
			})

		}
	}

	function renderOpening(){
		if (gameWindow.opening){
			gameWindow.opacity+=0.1;
			if ( gameWindow.opacity >= 0.75) {
				gameWindow.opacity = 0.75;
				gameWindow.opening = false;
			}
			E['gameWindow'].setStyle({
				backgroundColor: "rgba(0,0,0,"+gameWindow.opacity+")"
			});
			E['gameWindowBody'].setStyle({
				opacity: (gameWindow.opacity+0.25)
			})

		}
	}


	function getDimensions(){
		return {
			height: Math.max( E['body'].scrollHeight, E['body'].offsetHeight, 
                       E['doc'].clientHeight, E['doc'].scrollHeight, E['doc'].offsetHeight),
			width: Math.max( E['body'].scrollWidth, E['body'].offsetWidth, 
                       E['doc'].clientWidth, E['doc'].scrollWidth, E['doc'].offsetWidth)
		}
	}
	/* 
		Game screen logic
		Here is where the games engine changes between screens such as title, options and game.
		This makes an AJAX request for the markup, and then fades it in.
	*/
	function renderChanging(){
		if (!scr.changing) return;
		(scr.previousObj) && scr.previousObj.setOpacity(1.0 - scr.opacity);
		(scr.currentObj) && scr.currentObj.setOpacity(scr.opacity);
		scr.opacity+=.1;
		if (scr.opacity>=1.0){
			if (scr.previousObj) {
				scr.previousObj.destroyScreen();
				delete scr.previousObj;
			}
			(scr.currentObj) && scr.currentObj.setOpacity(scr.opacity);
			scr.opacity = 0;
			scr.changing = false;
		}

	}

	function setGet(){
		var match,
	        pl     = /\+/g,  // Regex for replacing addition symbol with a space
	        search = /([^&=]+)=?([^&]*)/g,
	        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
	        query  = window.location.search.substring(1);

	    GET = {};
	    while (match = search.exec(query))
	       GET[decode(match[1])] = decode(match[2]);
	}
	/**********************
	* PUBLIC METHODS
	**********************/
	this.open = function(){
		open();
	}

	this.quit = function(){
		quit();
	}

	this.render = function(){
		render();
	}

	/* 
		Game screen logic
		Here is where the games engine changes between screens such as title, options and game.
		This makes an AJAX request for the markup, and then fades it in.
	*/
	this.changeScreen = function( screenName ){
		if (Game.Screens[screenName]) {
			if (scr.changing || scr.current == screenName) return;
			scr.previous = scr.current;
			scr.current = screenName;

			scr.previousObj = scr.currentObj;
			scr.currentObj = new Game.Screens[screenName]( { windowContainer: E['gameWindowContainer'], audioOBJ: audioOBJ, parent: self } );

			scr.changing = true;
			scr.opacity = 0.0;
		}
	}

	//initilaize:
	init( audioOBJ );
}

Game.Screens = {};