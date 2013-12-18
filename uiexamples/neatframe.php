<html>
	<head>
		<script type="text/javascript" language="javascript" src="../master/mootools.js"></script>
		<style type="text/css">
			img.bubble
			{
				filter:alpha(opacity=33);
				-moz-opacity:.333333;
				-khtml-opacity: .33333;
				opacity: .33333;
			}
		</style>
		<script type="text/javascript" language="JavaScript">
			var timers = new Array(100);
			for (i = 0; i < 100; i++)
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
				if ( s > 30) s = 30;
				el.style.width = s+"px";
				el.style.height = s+"px";
				el.style.marginLeft = (x * 10) - 250 - (s/2);
				el.style.marginTop = (y * 10) - 250 - (s/2);
				myFx = new Fx.Style(el, 'opacity').set(s/30);
				if (s < 30)
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
				if (s < 10) s = 10;
				el.style.width = s+"px";
				el.style.height = s+"px";
				el.style.marginLeft = (x * 10) - 250 - (s/2);
				el.style.marginTop = (y * 10) - 250 - (s/2);
				myFx = new Fx.Style(el, 'opacity').set(s/30);
				if (s > 10)
				{
					timers[x][y] = setTimeout("thenshrink("+x+","+y+")",16);
				}			
			}
		</script>
	</head>
	<body style="background:black;">
		<div style="min-width:500px;width:100%;height:100%;position:absolute;left:0px;top:0px;">
		<?
		for ($x = 0; $x < 50; $x++)
		{
			for ( $y = 0; $y < 50; $y++)
			{
				$xos = ($x * 10) - 250 - 5;
				$yos = ($y * 10) - 250 - 5;
				?>
				<img 
					src="../img/dot.png" 
					style="width:10px;height:10px;position:absolute;left:50%;top:50%;z-index:1;margin-left:<?=$xos?>;margin-top:<?=$yos?>;"
					id="dot<?=$x?>_<?=$y?>"
					class="bubble"	
					onmouseover="raise(<?=$x?>,<?=$y?>)"
				>
				<?
			}
		}
		?>
		</div>
	</body>
</html>