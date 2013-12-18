<table style="width:100%;">
<tr>
<td valign="top" style="width:400px;">
	<iframe src = "uiexamples/neatframe.php" style="border:0px;margin:0px;padding:0px;width:490px;height:490px;overflow:none;" scrolling="no"></iframe>
</td>
</tr>
<tr>
<td valign="top">
	<b>The Code:</b>
	<pre style="white-space:pre-wrap;">
	&lt;html&gt;
		&lt;head&gt;
			&lt;style type="text/css"&gt;
				img.bubble
				{
					filter:alpha(opacity=33);
					-moz-opacity:.333333;
					-khtml-opacity: .33333;
					opacity: .33333;
				}
			&lt;/style&gt;
			&lt;script type="text/javascript" src="/javascript/mootools.v1.11.js"&gt;&lt;/script&gt;
			&lt;script type="text/javascript" language="JavaScript"&gt;
				var timers = new Array(100);
				for (i = 0; i &lt; 100; i++)
				{
					timers[i] = new Array(100);
				}
				function raise( x, y )
				{
					clearTimeout(timers[x][y]);
					timers[x][y] = setTimeout("keepraising("+x+","+y+")",16);
				}
				function keepraising( x, y )
				{
					el = $('dot'+x+'_'+y);
					s = parseInt(el.style.width);
					s+=5;
					if ( s &gt; 30) s = 30;
					el.style.width = s+"px";
					el.style.height = s+"px";
					el.style.marginLeft = (x * 10) - 250 - (s/2);
					el.style.marginTop = (y * 10) - 250 - (s/2);
					myFx = new Fx.Style(el, 'opacity').set(s/30);
					if (s &lt; 30)
					{
						timers[x][y] = setTimeout("keepraising("+x+","+y+")",16);
					}
					else
					{
						timers[x][y] = setTimeout("thenshrink("+x+","+y+")",16);
					}
				}
				function thenshrink( x, y )
				{
					el = document.getElementById('dot'+x+'_'+y);
					s = parseInt(el.style.width);
					s--;
					if (s &lt; 10) s = 10;
					el.style.width = s+"px";
					el.style.height = s+"px";
					el.style.marginLeft = (x * 10) - 250 - (s/2);
					el.style.marginTop = (y * 10) - 250 - (s/2);
					myFx = new Fx.Style(el, 'opacity').set(s/30);
					if (s &gt; 10)
					{
						timers[x][y] = setTimeout("thenshrink("+x+","+y+")",16);
					}			
				}
			&lt;/script&gt;
		&lt;/head&gt;
		&lt;body style="background:black;"&gt;
			&lt;div style="min-width:500px;width:100%;height:100%;position:absolute;left:0px;top:0px;"&gt;
			&lt;%
			for x = 0 to 49
				for y = 0 to 49
					xos = (x * 10) - 250 - 5
					yos = (y * 10) - 250 - 5
					%&gt;
					&lt;img 
						src="dot.png" 
						style="width:10px;height:10px;position:absolute;left:50%;top:50%;z-index:1;margin-left:&lt;%=xos%&gt;;margin-top:&lt;%=yos%&gt;;"
						id="dot&lt;%=x%&gt;_&lt;%=y%&gt;"
						class="bubble"	
						onmouseover="raise(&lt;%=x%&gt;,&lt;%=y%&gt;)"
					&gt;
					&lt;%
				next
			next
			%&gt;
			&lt;/div&gt;
		&lt;/body&gt;
	&lt;/html&gt;
	</pre>
</td>
</tr>
</table>