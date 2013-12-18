function IconClass( id, maxwidth )
{
	var timeout;
	var padleft = 0; //max 35
	var padright = 0; //max 10
	var thewidth = 0; //max maxwidth
	
	function expand()
	{
		if (padleft < 35) padleft+=2;
		else padleft = 35;
		if (padright < 10) padright+=2;
		else padright = 10;
		if (thewidth < maxwidth) thewidth+=5;
		else thewidth = maxwidth;
		$(id).style.paddingLeft=padleft+"px";
		$(id).style.paddingRight=padright+"px";
		$(id).style.width=thewidth+"px";
		clearTimeout(timeout);
		if ( padleft != 35 || padright != 10 || thewidth != maxwidth )
			timeout = 	setTimeout( function() {expand();}, 16);
	}

	function shrink()
	{
		if (padleft > 0) padleft-=2;
		else padleft = 0;
		if (padright > 0) padright-=2;
		else padright = 0;
		if (thewidth > 0) thewidth-=5;
		else thewidth = 0;
		$(id).style.paddingLeft=padleft+"px";
		$(id).style.paddingRight=padright+"px";
		$(id).style.width=thewidth+"px";
		clearTimeout(timeout);
		if ( padleft != 0 || padright != 0 || thewidth !=0 )
			timeout = setTimeout( function() {shrink();}, 16);
	}
	
	
	$('img'+id).observe('mouseover',expand);
	$('img'+id).observe('mouseout',shrink);
}