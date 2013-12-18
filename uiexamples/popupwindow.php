<table style="width:100%;">
	<tr>
		<td style="width:400px;" valign="top">
			Normally this would be full screen, however because of moo-tools, this has to be contained in a frame. <br>
			<iframe src="uiexamples/popupwindowframe.php" style="width:400px;height:300px;"></iframe>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Example Usage</b>
			<pre style="white-space:pre-wrap;">
&lt;script language="JavaScript" type="text/javascript" src="popupwindow.js"&gt;&lt;/script&gt;
&lt;style type="text/css"&gt;
	/*all style elements are here to show what can be changed, they aren't required.*/
	table.pwtable
	{
		width:100%;
		border:1px solid gray;
		background:#DEDEDE;
	}
	tr.pwevenrow
	{
		background:#EFEFEF;
		width:100%;
	}
	tr.pwoddrow
	{
	}
	td.pwleft
	{
		width:50%;
	}
	td.pwright
	{
		width:50%;
	}
	input.pwbutton
	{
		background:#0067c6;
		color:white;
		font-weight:bold;
		border:2px solid gray;
	}
	div.pwpopup
	{
	}
	div.pwpopupbg
	{
	}
	tr.header
	{
	}
	td.closebutton
	{
		font-family:sans-serif;
		cursor:pointer;
		color:white;
		background:red;
		text-align:center;
		font-weight:bold;
	}
	td.border
	{
		background:#0067c6;
		margin:0px;
		padding:0px;
		border:0px;
	}
	td.popupbody
	{
		background:white;
	}
&lt;/style&gt;
&lt;div id="popupdata" style="text-align:right"&gt;
	&lt;!-- stylize the div any way you want it! --&gt;
	&lt;input type="hidden" name="First_Name" value="Joe"&gt;
	&lt;input type="hidden" name="Last_Name" value="Wall"&gt;
	&lt;input type="hidden" name="Location" value="C10-E"&gt;
	&lt;!-- value is the dafault value, it can also be sat by ASP or some other server side language. --&gt;
&lt;/div&gt;
&lt;script language="JavaScript" type="text/javascript"&gt;
	makePopupWindow("popupdata","popupwindow.asp?setupdate=true");
	//ID of div to make a popup window out of, and the url to handle the data from the popup.
&lt;/script&gt;
			</pre>
		</td>
	</tr>
</table>