<table style="width:100%;">
	<tr>
	<td valign="top" style="width:200px;">
		<iframe scrolling="no" src="uiexamples/swapperframe.php" style="width:100%;height:600px;padding:0px;margin:0px;overflow:hidden;"></iframe>
	</td>
	</tr>
	<tr>
	<td>
		<b>Example Usage:</b>
		<pre style="white-space:pre-wrap;">
&lt;script language="JavaScript" type="text/javascript" src="/script/makeimageswap.js"&gt;&lt;/script&gt;
&lt;!-- The outer div with id="imageswap" is required, each inner div must contain an img to be used in the background.
	 Any HTML without a src= can be used within each inner div.--&gt;
&lt;div id="imageswap"&gt;
	&lt;div&gt;
		&lt;img src="/logoimg/1.png"&gt;
		&lt;div style="color:white;font-weight:bold;padding:20px;width:360px;text-align:right;"&gt;
			&lt;a href="http://ecm-prod-cs.etn.com/Vehicle/index.htm" style="color:white;"&gt;&gt; Read the Full Story&lt;/a&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div&gt;
		&lt;img src="/logoimg/2.png"&gt;
		&lt;div style="color:white;font-weight:bold;padding:20px;width:100px;text-align:left;"&gt;
			&lt;a href="http://ecm-prod-cs.etn.com/Vehicle/index.htm"&gt;&gt; Read the Full Story&lt;/a&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div&gt;
		&lt;img src="/logoimg/3.png"&gt;
		&lt;div style="color:white;font-weight:bold;padding:20px;width:360px;text-align:left;"&gt;
			&lt;a href="http://ecm-prod-cs.etn.com/Vehicle/index.htm"&gt;&gt; Read the Full Story&lt;/a&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;script type="text/javascript" language="JavaScript"&gt;
	makeimageswap($('imageswap'),3000,199,505);//id, time in milliseconds, width, height.
&lt;/script&gt;
		</pre>	
	</td>
	</tr>
</table>