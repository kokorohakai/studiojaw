function highlight(el,er,eg,eb,ed)
{
	var r = ed;
	var g = ed;
	var b = ed;
	var timeout;
	//r.toString(16)
	function brighten()
	{
		if (r >= er ) r-=parseInt((ed-er)/10);
		if (r < er ) r=er;
		if (g >= eg ) g-=parseInt((ed-eg)/10);
		if (g < eg ) g=eg;
		if (b >= eb ) b-=parseInt((ed-eb)/10);
		if (b < eb ) b=eb;
		$(el).style.background="#"+r.toString(16)+g.toString(16)+b.toString(16);
		clearTimeout(timeout);
		if ( r >= er || g >= eg || b >= eb )
		{
			timeout=setTimeout( function(){ brighten(); },16 );
		}
	}
	
	function dim()
	{
		if (r <= ed ) r+=parseInt((ed-er)/10);
		if (g <= ed ) g+=parseInt((ed-eg)/10);
		if (b <= ed ) b+=parseInt((ed-eb)/10);
		$(el).style.background="#"+r.toString(16)+g.toString(16)+b.toString(16);
		clearTimeout(timeout);
		if ( r <= ed || g <= ed || b <= ed )
		{
			timeout=setTimeout( function(){ dim(); },16 );
		}
		
	}
	$(el).observe('mouseover',brighten);
	$(el).observe('mouseout',dim);
}