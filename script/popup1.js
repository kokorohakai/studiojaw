var imgtrans = new Array();
var imgdirection = new Array();
var imgto = false;

function setTransparency( el, dv )
{
	var iv = parseInt(dv*100);
	var dv = parseFloat(dv);
	el.style.opacity = (dv);
	el.style.filter = "alpha(opacity=" + iv + ")";
}
function GetMX(event)
{
	var MouseX = 0;
	MouseX = (document.all)?event.offsetX:event.clientX;
	return MouseX;
}
function GetMY(event)
{
	var MouseX = 0;
	MouseY = (document.all)?event.offsetY:event.clientY;
	return MouseY;
}
function imagefade( id )
{
	popimg = document.getElementById(id);
	imgdirection[id] = 0;
	clearTimeout(imgto[id]);
	imgto[id] = setTimeout("fadeanimation('"+id+"')",32);
}
function imagepop( event, img, that )
{
	id = 'popimg'+img;
	if (!document.getElementById("popimg"+img))
	{
		//this is where you may want to stylize your image and div!
		newData  = "<div style='position:absolute;left:0px;top:0px;border:2px solid blue;background:white;padding:0px;margin:0px;display:none;' id='"+id+"'";
		newData += 'onmouseout="imagefade('+"'"+id+"'"+')">';
		newData += "<img src='"+img+"'>";
		newData += "</div>";
		
		var oldData = that.innerHTML;
		that.innerHTML = oldData+newData;
	}
	var popimg = document.getElementById(id)
	if (popimg.style.display =="none")
	{
		X = GetMX(event);
		Y = GetMY(event);
		popimg.style.left=(X-10)+"px";
		popimg.style.top=(Y-10)+"px";
		imgtrans[id] = 0.0;
		imgdirection[id] = 1;		
		clearTimeout(imgto[id]);
		imgto[id] = setTimeout("fadeanimation('"+id+"')",32);
	}
}
function fadeanimation( id )
{
	var finished=false;
	var popimg = document.getElementById(id)
	if (imgdirection[id] == 1)
	{
		imgtrans[id]+=.1;
		if (imgtrans[id] > 1.0)
		{
			imgtrans[id] = 1.0;
			finished = true;
		}
	}
	else
	{
		imgtrans[id]-=.1;
		if (imgtrans[id] <= 0.0)
		{
			imgtrans[id]=0.0;
			popimg.style.display="none";
			finished=true;
		}
	}
	if (imgtrans[id] > 0.0) 
	{
		setTransparency(popimg,imgtrans[id]);
		popimg.style.display="inline";
	}
	if (!finished) imgto[id] = setTimeout("fadeanimation('"+id+"')",32);
	if (finished) clearTimeout(imgto[id]);
}