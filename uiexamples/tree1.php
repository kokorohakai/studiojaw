<style type="text/css">
	#tree
	{
		font-weight:bold;
		font-size:18px;
		font-family:'Arial',sans-serif;
	}
	#tree div.tree
	{
		font-size:14px;
		font-family:'Arial',sans-serif;	
		padding-left:20px;
		line-height:20px;
	}
	#tree img.treetoggle
	{
		cursor:pointer;
	}
</style>
<table style="width:100%;">
<tr>
<td valign="top" style="width:200px;">
	<div id="tree">
		Tree Example
		<div>
			<a href="http://www.google.com">cat 1</a>
			<div>
				Item 1
				<div><a href="www.google.com">subitem 1</a></div>
				<div>subitem 1</div>
			</div>
			<div>Item 2
				<div>test</div>
			</div>
			<div>
				<a href="www.google.com">Item 3</a>
				<div>subitem 2</div>
				<div>subitem 3</div>
				<div>
					subitem 4
					<div>subitem 5</div>
					<div>subitem 6</div>
					<div>subitem 7</div>
					<div>subitem 8</div>
				</div>
				<div>subitem 9</div>
				<div>subitem 10</div>
			</div>
		</div>
		<div>cat 2</div>
		<div>
			cat 3
			<div>
				Item 4
				<div>subitem 11</div>
				<div>subitem 12</div>
			</div>
			<div>Item 5</div>
			<div>
				Item 6
				<div>subitem 13</div>
				<div>subitem 14</div>
			</div>
		</div>
	</div>
</td>
<td valign="top">
	<b>Example Usage:</b>
	<pre style="white-space:pre-wrap;">
&lt;script language="JavaScript" type="text/javascript" src="maketree.js"&gt;&lt;/script&gt;

&lt;div id="tree"&gt;
	Tree Example
	&lt;div&gt;
		&lt;a href="http://www.google.com"&gt;cat 1&lt;/a&gt;
		&lt;div&gt;
			Item 1
			&lt;div&gt;&lt;a href="www.google.com"&gt;subitem 1&lt;/a&gt;&lt;/div&gt;
			&lt;div&gt;subitem 1&lt;/div&gt;
		&lt;/div&gt;
		&lt;div&gt;Item 2
			&lt;div&gt;test&lt;/div&gt;
		&lt;/div&gt;
		&lt;div&gt;
			&lt;a href="www.google.com"&gt;Item 3&lt;/a&gt;
			&lt;div&gt;subitem 2&lt;/div&gt;
			&lt;div&gt;subitem 3&lt;/div&gt;
			&lt;div&gt;
				subitem 4
				&lt;div&gt;subitem 5&lt;/div&gt;
				&lt;div&gt;subitem 6&lt;/div&gt;
				&lt;div&gt;subitem 7&lt;/div&gt;
				&lt;div&gt;subitem 8&lt;/div&gt;
			&lt;/div&gt;
			&lt;div&gt;subitem 9&lt;/div&gt;
			&lt;div&gt;subitem 10&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div&gt;cat 2&lt;/div&gt;
	&lt;div&gt;
		cat 3
		&lt;div&gt;
			Item 4
			&lt;div&gt;subitem 11&lt;/div&gt;
			&lt;div&gt;subitem 12&lt;/div&gt;
		&lt;/div&gt;
		&lt;div&gt;Item 5&lt;/div&gt;
		&lt;div&gt;
			Item 6
			&lt;div&gt;subitem 13&lt;/div&gt;
			&lt;div&gt;subitem 14&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;

&lt;script type="text/javascript" language="JavaScript"&gt;
	maketree($('tree'));
&lt;/script&gt;
	</pre>
</td>
</tr>
</table>
<script type="text/javascript" language="JavaScript">
	maketree($('tree'));
</script>