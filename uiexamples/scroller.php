<table>
<tr><td valign="top">
	<b style="font-size:20px;">Text Scroller.</b><br><br>
	<div id="scrollme" style="background:blue;color:white;font-weight:bold;padding:4px;width:100%;">
	This is my really long string of Text.  If we wanted something that was really long, but not very important to scroll, this is something we may want to consider.  This is something that is done with this application by simply calling, "scrollThis($('nameofdiv'), width, TimeInMilliseconds&lt;optional&gt;, PixelsStepped&lt;optional&gt;)" in a javascript area.  Then it's just a matter of letting it scroll away!  The scroller can be stylized by adding style to the containting div.
	</div>
	<script type="text/javascript" language="JavaScript">
		scrollThis($('scrollme'),400,16,1);
	</script>
</td>
</tr>
<tr>
<td>
	<br>
	<b>Example Usage:</b>
	<pre style="white-space:pre-wrap;">
&lt;script language="JavaScript" type="text/javascript" src="scrollthis.js"&gt;&lt;/script&gt;

&lt;div id="scrollme" style="background:blue;color:white;font-weight:bold;padding:4px;width:100%;"&gt;
This is my really long string of Text.  If we wanted something that was really long, but not very important to scroll, this is something we may want to consider.  This is something that is possible with this application by simply calling, "scrollThis($('nameofdiv'), width, TimeInMilliseconds&lt;optional&gt;, PixelsStepped&lt;optional&gt;)" in a javascript area.  Then it's just a matter of letting it scroll away!  The scroller can be stylized by adding style to the containting div.
&lt;/div&gt;

&lt;script type="text/javascript" language="JavaScript"&gt;
	scrollThis($('scrollme'),400,16,1);
&lt;/script&gt;
	</pre>
</td>
</tr>
</table>