Game.Screens.GameScreen = function( args ){
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}
	this.extendAsClass( Game.Screen, {
		screen:"GameScreen",
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
		E = self.E;
		getElements();
		createElements();
		setEvents();
		E["audioOBJ"].currentTime = 0;
		E["audioOBJ"].play();
		init2 = true;
	}
	this.render = function(){
		render();
	}
	/******************************************************
	* PRIVATE PROPERTIES
	******************************************************/
	var E = null;
	var self = this;
	var notes = {};
	var totalNotes = 0;
	var bpmScale = 0;
	var difficulty = 200; //less is harder
	var diffNotes = parseInt(600/difficulty) + 3;
	var gameover = false;
	var player = {
		currentBox:0,
		currentTop:500,
		CurrentLeft:250,
		lives: 6,
		baseScore: 0,
		score: 0
	}
	var layers = {
		top: [
			0,
			-570,
			-1140
		],
		bottom: [
			0,
			-570,
			-1140
		]
	}
	var premin = 20;
	var boxes = {
		0: {
			alevel:255
		},
		1: {
			alevel:255
		},
		2: {
			alevel:255
		},
		3: {
			alevel:255
		}
	}
	var init2 = false;

	function init(){
		//Most of the actual initilizing will happen in postAJAX
		totalNotes = parseInt( ( args.audioOBJ.duration / 60.0 ) * parseFloat(trackInfo.bpm) );
		bpmScale = 60.0 / parseFloat(trackInfo.bpm);
		console.log("I'm making ",totalNotes);
	}

	function getElements(){
		E["audioOBJ"] = args.audioOBJ;
		E['playfieldph'] = $("gs_playfield_ph");
		E['return'] = $("gs_return");
		E['box_0'] = $("gs_pf_box_0");
		E['box_1'] = $("gs_pf_box_1");
		E['box_2'] = $("gs_pf_box_2");
		E['box_3'] = $("gs_pf_box_3");
		E['debug'] = $("gs_debug");
		E['gameWindowBody'] = $("gameWindowBody");
		E['player'] = $("gs_player");
		E['playerZone'] = $("gs_playerZone");
		E['lives'] = $$(".gs_live");
		E['gameover'] = $("gs_gameover");
		E['score'] = $("gs_score");
		E['blayer'] = Array(
			$("gs_blayer_0"),
			$("gs_blayer_1"),
			$("gs_blayer_2")			
		);
		E['tlayer'] = Array(
			$("gs_tlayer_0"),
			$("gs_tlayer_1"),
			$("gs_tlayer_2")			
		);
		
		E['playfield'] = $("gs_playfield");
		E["body"] = $$("body")[0];
		E['doc'] = document.documentElement;
	}

	function debug( str ){
		if ( E['debug'] ) {
			E['debug'].update(str);
		}
	}
	function createElements(){
		E['notes']={};
		//for ( var i = 0; i < 10; i++ ) E['notes'][i] = null;
		for ( var i = 10; i < totalNotes; i++ ){
			notes[i] = parseInt(Math.random()*4);
			// var skipRail = parseInt(Math.random()*4);
			// var src = "";
			// E['notes'][i] = Array();
			// if (skipRail!=0) {
			// 	E['notes'][i][0] = new Element('img',{class:'gs_note note_0',id:'gs_note_'+i+"_0",src:src});
			// 	E['notes'][i][0].hide();
			// 	E['playfield'].insert(E['notes'][i][0]);	
			// }
			// if (skipRail!=1) {
			// 	E['notes'][i][1] = new Element('img',{class:'gs_note note_1',id:'gs_note_'+i+"_1",src:src});
			// 	E['notes'][i][1].hide();
			// 	E['playfield'].insert(E['notes'][i][1]);
			// }
			// if (skipRail!=2) {
			// 	E['notes'][i][2] = new Element('img',{class:'gs_note note_2',id:'gs_note_'+i+"_2",src:src});
			// 	E['notes'][i][2].hide();
			// 	E['playfield'].insert(E['notes'][i][2]);
			// }
			// if (skipRail!=3) {
			// 	E['notes'][i][3] = new Element('img',{class:'gs_note note_3',id:'gs_note_'+i+"_3",src:src});
			// 	E['notes'][i][3].hide();
			// 	E['playfield'].insert(E['notes'][i][3]);
			// }
		}
	}
	function returnToTitle(){
		args.parent.changeScreen("TitleScreen");
	}
	function setEvents(){
		E['return'].observe("click",returnToTitle);
		// E['box_0'].observe("mouseover",mouseOverB0);
		// E['box_0'].observe("mouseMove",mouseOverB0);
		// E['box_1'].observe("mouseover",mouseOverB1);
		// E['box_1'].observe("mouseMove",mouseOverB1);
		// E['box_2'].observe("mouseover",mouseOverB2);
		// E['box_2'].observe("mousemove",mouseOverB2);
		// E['box_3'].observe("mouseover",mouseOverB3);
		// E['box_3'].observe("mousemove",mouseOverB3);
		E['playerZone'].observe("mousemove",updatePlayer);
		E['playerZone'].observe("mouseover",updatePlayer);
	}
	/*
		E---vents.
	*/
	// function mouseOverB0(e){
	// 	updatePlayer(e, 0);
	// }
	// function mouseOverB1(e){
	// 	updatePlayer(e, 1);
	// }
	// function mouseOverB2(e){
	// 	updatePlayer(e, 2);
	// }
	// function mouseOverB3(e){
	// 	updatePlayer(e, 3);
	// }
	function updatePlayer(e){
		if (E['body']) {
			var n = 0;
			var gwpos = {
				left: E['gameWindowBody'].offsetLeft,
				top: E['gameWindowBody'].offsetTop
			}
			var pfpos = {
				left: E['playfield'].offsetLeft,
				top: E['playfield'].offsetTop
			}
			var sbpos = {
				left: Math.max( E['body'].scrollLeft, E['doc'].scrollLeft ),
				top: Math.max( E['body'].scrollTop, E['doc'].scrollTop )
			}
			player.left = ( e.clientX + sbpos.left ) - Math.max( gwpos.left, pfpos.left, sbpos.left ) - 20;
			player.top = ( e.clientY + sbpos.top ) - Math.max( gwpos.top, pfpos.top )-24;
			if (player.left > 113) n = 1;
			if (player.left > 238) n = 2;
			if (player.left > 363) n = 3;
			player.currentBox = n;
			//debug( "Player:"+ player.left + ":" + player.top );
		}
	}
	function updateLives(){
		E['lives'].each(function(el,i){
			if (i < player.lives - 1) {
				el.show();
			} else {
				el.hide();
			}
		});
	}
	function setGameOver(){
		gameover = true;
		E['audioOBJ'].pause();
		E['gameover'].show();
	}
	function rezyPlayer(){
		if (!gameover){
			player.dead = false;
			E['player'].setStyle({
				opacity:1.0
			})
		}
	}
	function killPlayer(){
		if (!player.dead) {
			player.lives--;
			player.deathAni = 0;
			player.dead = true;
			setTimeout(rezyPlayer,3000);
			updateLives();
			if (player.lives == 0){
				setGameOver();
			}
		}
	}
	function createNote( n, beat ){
		var note = {};
		var src = "";
		for (var i = 0; i < 4; i++){
			if (i!=n){
				note[i] = new Element('img',{class:'gs_note note_'+i,id:'gs_note_'+beat+"_"+i,src:src});
				E['playfieldph'].insert(note[i]);
				note[i].hide();
			}
		}

		return note;
	}
	/*
		Render shit.
	*/
	function render(){
		if (init2) {
			render.moveNotes();
			(!gameover) && render.renderPlayer();
			render.animateBox();
			render.renderDeath();
			render.updateOther();
			render.background();
		}
	}

	function updateScore( notes1, notes2 ){
		if (!notes1||!notes2 || player.dead || gameover) return;
		for (var i=0,n1=0,n2=0; i<4;i++){
			n1=(notes1[i])?n1:i;
			n2=(notes2[i])?n2:i;
		}

		player.score += Math.abs(n2-n1)*100;
		//basically, the larger the distance you have to move, the bigger the score you get. :3
	}

	render.moveNotes = function(){
		var pos = E["audioOBJ"].currentTime;
		var step = parseInt( pos / bpmScale * difficulty );
		var min = parseInt( pos / bpmScale ) - 1;
		if (min < 0) min = 0;
		var max = min+diffNotes;
		if (max > totalNotes) max = totalNotes;
		//scoring
		if (min!=premin){
			updateScore(E['notes'][min],E['notes'][premin]);
		}
		player.baseScore = ( pos * 100.0);
		//note handling
		for (var i =0; i < min; i++){
			if ( E['notes'][i] ){
				for ( var j = 0; j < 4; j++ ){
					if ( E['notes'][i][j] ){
						E['notes'][i][j].remove();
						E['notes'][i][j] = null;
					}
				}
			}
		}
		for ( var i = min; i < max; i++){
			var top = ( 550 - ( i * difficulty ) ) + step;
			for ( var j = 0; j < 4; j++ ){
				if ( typeof(notes[i]) != "undefined" && notes[i] != j ){
					if (!E['notes'][i]) E['notes'][i] = createNote(notes[i],i);

					(i==min) && E['notes'][i][j].hide();
					(i==max-1) && E['notes'][i][j].show();
					var pt = player.top+24;
					if (pt > top && pt < top + 15 && player.currentBox == j ){ //no need to check x coords since it's box based.
						killPlayer();
					}
					E['notes'][i][j].setStyle({
						top:top+"px"
					});
				}
				// if ( E['notes'][i] && E['notes'][i][j] ){
				// 	(i==min) && E['notes'][i][j].hide();
				// 	(i==max-1) && E['notes'][i][j].show();
				// 	var pt = player.top+24;
				// 	if (pt > top && pt < top + 15 && player.currentBox == j ){ //no need to check x coords since it's box based.
				// 		killPlayer();
				// 	}
				// 	E['notes'][i][j].setStyle({
				// 		top:top+"px"
				// 	});
				// }
			}
		}
		premin = min;
	}

	render.renderDeath = function(){
		if (player.dead){
			var w = 24, h=48, ml=0, mt=0;
			if (player.deathAni <= 48){
				w+=player.deathAni;
				h-=player.deathAni;
				ml-=player.deathAni/2;
				mt+=player.death;
			}
			var blink = (Math.sin( (player.deathAni / 30.0) * Math.PI) / 2.0)+0.25;
			if (player.deathAni > 48 && gameover){
				blink = 0.0;
			}
			E['player'].setStyle({
				width: w+"px",
				height: h+"px",
				marginLeft: ml+"px",
				marginTop: mt+"px",
				opacity:blink
			})

			player.deathAni+=2;
		}
	}
	render.renderPlayer = function(){
		E['player'].setStyle({
			left: player.left+"px",
			top: player.top+"px"
		})
	}

	render.animateBox = function(){
		for ( i in boxes ){
			var box = boxes[i];
			var speed = 25;
			if ( i == player.currentBox ) {
				box.alevel-=speed;
				if ( box.alevel < 0 ) box.alevel=0;
				E['box_'+i].setStyle({backgroundColor:"rgba(0,255,255,0.2)"});
			} else {
				box.alevel+=speed;
				if ( box.alevel > 255 ) box.alevel=255;				
				E['box_'+i].setStyle({backgroundColor:"transparent"});
			}


			E['box_'+i].setStyle({
				borderColor:"rgba(" + (255-box.alevel) + "," + (255-box.alevel) + "," + box.alevel+",.2)"
			});
			
			boxes[i] = box;
		}
	}
	
	render.updateOther = function(){
		E['score'].update(parseInt(player.baseScore+player.score));
	}

	render.background = function(){
		for (var i = 0; i < 3; i++) {
			E['blayer'][i].setStyle({
				top:layers.bottom[i]+"px"
			})			
			E['tlayer'][i].setStyle({
				top:layers.top[i]+"px"
			})			
			layers.bottom[i]+=10;
			if ( layers.bottom[i] > 570 ) layers.bottom[i]-=1710;
			layers.top[i]+=5;
			if ( layers.top[i] > 570 ) layers.top[i]-=1710;
		}
	};
	init();
}