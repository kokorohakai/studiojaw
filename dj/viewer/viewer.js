/*
	(C) 2013 Jo-Anna Wall
	That's right, I got irritated with soundcloud and made my own thing.
*/


function Viewer(){
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}
	/********************
	* Private Variables
	********************/
	var E = {};
	var playing = true;
	var game = null;

	/*****************
	* Private Methods
	*****************/
	function getTime(seconds)
	{
	    function pad( p )
	    {
	        p=String(p);
	        p = (p.length < 2) ? "0" + p : p;
	        return p;
	    }
	    seconds = parseFloat(seconds);
	    var str = "";
	    var t = parseInt(seconds);
	    var remainder = seconds - t;
	    var h = parseInt(t/3600);
	    t-=h*3600;
	    var m = parseInt(t/60);
	    t-=m*60;
	    var s = t;
	    str+=   pad(h)+":"+
	            pad(m)+":"+
	            pad(s)+
	            String(remainder).substr(1,5);
	    return str;
	}

	function initialize(){
		getElements();
		game = new Game( E["audioOBJ"] );
		setEvents();
		setTimes();
		systemTimer();

		function setDuration(){
			var dur = E["audioOBJ"].duration;			
			if (isNaN(dur))
			{
				setTimeout(setDuration,100);
			} else {
				E["totalTrackTime"].innerHTML = getTime( dur );
			}
		}
		setDuration();
	}

	function getElements(){
		E["waveFormContainer"] = $("waveFormContainer");
		E["waveForm"] = $("waveForm");
		E["audioOBJ"] = $("audioOBJ");
		E["playButton"] = $("playButton");
		E["pauseButton"] = $("pauseButton");
		E["seekingButton"] = $("seekingButton");
		E["seekBar"] = $("seekBar");
		E["markers"] = $$(".markers");
		E["currentTrackTime"] = $("currentTrackTime");
		E["totalTrackTime"] = $("totalTrackTime");
	}

	function setEvents(){
		E["waveForm"].observe('click',function(e){
			var wfpos = E["waveFormContainer"].positionedOffset();
			var x = e.clientX - wfpos.left;
			var newTime = E["audioOBJ"].duration * (x/E["waveForm"].width)
			E["audioOBJ"].currentTime = newTime;

			e.stop();
			return false;
		});
		E["playButton"].observe("click",function(e){
			E["audioOBJ"].play();
			E['playButton'].hide();
			E['pauseButton'].show();
			E['seekingButton'].hide();

			e.stop();
			return false;
		});
		E["pauseButton"].observe("click",function(e){
			E["audioOBJ"].pause();
			E['playButton'].show();
			E['pauseButton'].hide();
			E['seekingButton'].hide();

			e.stop();
			return false;
		});
		E["audioOBJ"].observe('play',function(e){
			E['playButton'].hide();
			E['pauseButton'].show();
			E['seekingButton'].hide();
			playing=true;

			e.stop();
			return false;
		});
		E["audioOBJ"].observe('pause',function(e){
			E['playButton'].show();
			E['pauseButton'].hide();
			E['seekingButton'].hide();
			playing=false;
			
			e.stop();
			return false;
		});
		E["audioOBJ"].observe('seeking',function(e){
			E['playButton'].hide();
			E['pauseButton'].hide();
			E['seekingButton'].show();
			
			e.stop();
			return false;
		});
		E["audioOBJ"].observe('seeked',function(e){
			E['seekingButton'].hide();
			if(playing) 
			{
				E['playButton'].hide();
				E['pauseButton'].show();
			} else {
				E['playButton'].show();
				E['pauseButton'].hide();
			}
			
			e.stop();
			return false;
		});
		//using observes on this event blows up miraculously.
		// E["audioOBJ"].ontimeupdate = function(e){
		// 	console.log(e);
		// 	E["audioOBJ"].ontimeupdate = null;	
		// }
		E["markers"].each(function(el){
			var time = el.getAttribute("time");
			$(el.id).observe("click",function(e){
				E["audioOBJ"].currentTime = parseFloat(time);
			});
			$(el.id).observe("mouseover",function(e){
				//console.log("hello");
			});
			$(el.id).observe("mouseout",function(e){
				//console.log("goodbye");
			});
			$(el.id+"_link").observe("click",function(e){
				E["audioOBJ"].currentTime = parseFloat(time);
			});
		});
	}

	function updateSeekBar(){
		var dur = E["audioOBJ"].duration;
		var cur = E["audioOBJ"].currentTime;
		var pos = parseInt(E["waveForm"].width * ( cur / dur ));
		E["seekBar"].style.left = pos+"px";

		var selected = false;
		E["markers"].each(function(el){
			var time = parseFloat( el.getAttribute("time") );
			var pos = parseInt(E["waveForm"].width * ( time / dur )) - 7;
			el.style.left = pos+"px";
			
			var temp = $(el.id+"_track");
			temp.removeClassName("selected");
			
			if ( time <= cur ) selected = temp;
		});

		if (selected) selected.addClassName("selected");		

		E["currentTrackTime"].innerHTML = getTime(cur);
	}

	function systemTimer(){
		updateSeekBar();
		game.render();
		
		setTimeout(function(){
			systemTimer();
		},32); 
	}

	function setTimes(){
		E["markers"].each(function(el){
			var time = getTime(el.getAttribute("time"));
			$(el.id+"_time").innerHTML = time;
		});
	}

	initialize();
}

document.observe('dom:loaded',function(){
	new Viewer();
});
