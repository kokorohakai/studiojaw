var popupurl = "";
function makePopupWindow( id, url )
{
	popupurl = url;
	var n = 0;
	var outputtab="<table class='pwtable'>";
	if ($(id).childNodes)
	{
		var ls = $(id).childNodes;
		for( var a = 0; a < ls.length; a++ )
		{
			if (ls[a].value && ls[a].name)
			{
				
				if ( (n/2.0) == parseInt(n/2) )
				{
					outputtab += "<tr class='pwevenrow'><td class='pwleft'>" + ls[a].name.replace('_',' ') + "</td><td class='pwright' id ='"+ls[a].name+"'>" + ls[a].value + "</td></tr>";
				}
				else
				{
					outputtab += "<tr class='pwoddrow'><td class='pwleft'>" + ls[a].name.replace('_',' ') + "</td><td class='pwright' id ='"+ls[a].name+"'>" + ls[a].value + "</td></tr>";
				}
				n++;
			}
		}
	}
	outputtab+="</table>";
	outputtab+="<input type='button' class='pwbutton' value='edit'" + 'onclick="showPopup(' + "'" + id + "'" + ')">';
	outputtab+="<div id='pw" + id +"bg' class='pwpopupbg' style='width:100%;height:100%;position:absolute;z-index:5000;background:black;left:0px;top:0px;display:none;'></div>";
	outputtab+="<div id='pw" + id +"' class='pwpopup'";
	outputtab+="style='width:400px;height:400px;position:absolute;z-index:5001;left:0px;top:0px;display:none;'>"
	outputtab+="<table style='border:0px none;padding:0px;margin:0px;table-layout:fixed;border-collapse:collapse;width:100%;height:100%;'>";
	outputtab+="<tr class='header' style='height:15px;'><td style='width:5px' class='border'></td><td class='border' style='width:100%'></td><td class='closebutton' style='width:15px;' "  + 'onclick="closePopup('+"'"+id+"'"+');"' + ">X</td><td style='width:5px;' class='border'></td></tr>";
	outputtab+="<tr style='height:100%;'><td class='border'><td colspan=2 class='popupbody'><div style='width:385px;height:400px;overflow:auto;' id='popbody"+id+"'><div style='padding:5px;'>";
	outputtab+="<form name='ptable' id='ptable' action='' method='get'><table>";
	//create edit table here.
	if ($(id).childNodes)
	{
		var ls = $(id).childNodes;
		for( var a = 0; a < ls.length; a++ )
		{
			if (ls[a].value && ls[a].name)
			{
				if ( (n/2.0) == parseInt(n/2) )
				{
					outputtab += "<tr class='pwevenrow'>";
				}
				else
				{
					outputtab += "<tr class='pwoddrow'>";
				}
				outputtab+="<td class='pwleft'>" + ls[a].name.replace('_',' ') + "</td><td class='pwright'><input type='text' value='" + ls[a].value + "' name='" +  ls[a].name + "'></td></tr>";
				n++;
			}
		}
	}
	outputtab+="</table>";
	outputtab+="<input type='button' value='submit' class='pwbutton'"+' onclick="submitPopup('+"'"+id+"'"+')">';
	outputtab+="</form>";
	outputtab+="</div></div></td><td class='border'></td>";
	outputtab+="<tr style='height:5px;'><td class='border' colspan=4></tr>";
	outputtab+="</table>";
	outputtab+="</div>";
	
	$(id).innerHTML = outputtab;
}
function submitPopup( id )
{
	/*var a = $('ptable').childNodes;
	for (var b = 0; b < a.length; b++)
	{
		alert(a[b].value);
	}*/
	for (var a in $('ptable'))
	{
		if($(a))
		{
			$(a).innerHTML=$('ptable')[a].value;
		}
	}
	new Ajax(popupurl, {method: 'post', data: $('ptable'),
		onRequest: function()
		{		
		},
		onFailure: function(xhr)
		{
			alert(xhr.responseText);
		},
		onComplete: function(responseText)
		{
			if (responseText.length > 1)
			{
				alert(responseText)
			}
			closePopup( id )
		}
	}).request();

}
function showPopup( id )
{
	var w = window.getWidth();
	var h = window.getHeight();
	$("pw"+id+"bg").style.width=w;
	$("pw"+id+"bg").style.height=h;
	$("pw"+id).style.left=parseInt(.05*w)+"px";
	$("pw"+id).style.top=parseInt(.05*h)+"px";
	$("pw"+id).style.width=parseInt(.90*w)+"px";
	$("pw"+id).style.height=parseInt(.90*h-25)+"px";
	$("popbody"+id).style.width=parseInt(.90*w-15)+"px";
	$("popbody"+id).style.height=parseInt(.90*h-25)+"px";
	var myFx = new Fx.Style("pw"+id+"bg", 'opacity').set(0);
	myFx = new Fx.Style("pw"+id, 'opacity').set(0);
	myFx = new Fx.Style("pw"+id+"bg", 'opacity').start(0,.75);
	myFx = new Fx.Style("pw"+id, 'opacity').start(0,1);
	$("pw"+id+"bg").style.display="inline";
	$("pw"+id).style.display="inline";	
}
function closePopup( id )
{
	var myFx = new Fx.Style("pw"+id+"bg", 'opacity').start(.75,0);
	var myFx = new Fx.Style("pw"+id, 'opacity').start(1,0);
}
