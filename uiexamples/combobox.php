<style>
	input.combobox
	{
		width: 150px;
	}
	div.combobox
	{
		width: 150px;
		position: absolute;
		height: 120px;
		overflow-y: scroll;
		border: 2px solid black;
		padding:0px;
		margin:0px;
		display:none;
	}
	div.combobox table
	{
		table-layout: fixed;
		border-collapse:collapse;
		width: 100%;
	}
	div.combobox td
	{
		padding: 2px 5px 2px 5px;
		margin: 0px;
		width: 100%;
		border:0px;
		cursor:pointer;
	}
	div.combobox tr.even
	{
		background: #EEE;
	}
	div.combobox tr.odd
	{
		background: #DDD;
	}
	div.combobox td.highlight
	{
		background: #77F;
		color:white;
	}
</style>
<table style="width:500px;">
<tr>
<td valign="top" style="width:500px;">
	<b>The Example:</b>
	<div style="padding:20px;">
		<b>Choose a fruit:</b>
		<!--It may be a good idea to have a containing div or other element, based on how this script changes the DOM.-->
		<div>
			<select id="testcombobox" name="test">
				<option value="cranberry">(This shouldn't matter.)</option>
				<option value="cherry">(This shouldn't matter.)</option>
				<option value="strawberry">(This shouldn't matter.)</option>
				<option value="apple">(This shouldn't matter.)</option>
				<option value="orange">(This shouldn't matter.)</option>
				<option value="bananna">(This shouldn't matter.)</option>
				<option value="pineapple" selected>(This shouldn't matter.)</option>
				<option value="grape">(This shouldn't matter.)</option>
				<option value="tomato">(This shouldn't matter.)</option>
				<option value="lemon">(This shouldn't matter.)</option>
				<option value="lime">(This shouldn't matter.)</option>
				<option value="mango">(This shouldn't matter.)</option>
				<option value="watermelon">(This shouldn't matter.)</option>
				<option value="blueberry">(This shouldn't matter.)</option>
				<option value="raspberry">(This shouldn't matter.)</option>
			</select>
		</div>
		<script language="JavaScript" type="text/javascript">
			makecombobox( "testcombobox" );
		</script>
	</div>
</td>
</tr>
<tr>
<td valign="top" style="width:500px;">
	<b>Example Usage:</b>
	<pre style="width:500px;white-space:pre-wrap;">
&lt;style&gt;
	input.combobox
	{
		width: 150px;
	}
	div.combobox
	{
		width: 150px;
		position: absolute;
		height: 120px;
		overflow-y: scroll;
		border: 2px solid black;
		padding:0px;
		margin:0px;
		display:none;
	}
	div.combobox table
	{
		table-layout: fixed;
		border-collapse:collapse;
		width: 100%;
	}
	div.combobox td
	{
		padding: 2px 5px 2px 5px;
		margin: 0px;
		width: 100%;
		border:0px;
		cursor:pointer;
	}
	div.combobox tr.even
	{
		background: #EEE;
	}
	div.combobox tr.odd
	{
		background: #DDD;
	}
	div.combobox td.highlight
	{
		background: #77F;
		color:white;
	}
&lt;/style&gt;

&lt;script language="JavaScript" type="text/javascript" src="combobox.js"&gt;&lt;/script&gt;
&lt;b&gt;Choose a fruit:&lt;/b&gt;
&lt;!--It may be a good idea to have a containing div or other element, based on how this script changes the DOM.--&gt;
&lt;div&gt;
	&lt;select id="testcombobox" name="test"&gt;
		&lt;option value="cranberry"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="cherry"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="strawberry"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="apple"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="orange"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="bananna"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="pineapple" selected&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="grape"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="tomato"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="lemon"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="lime"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="mango"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="watermelon"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="blueberry"&gt;(This shouldn't matter.)&lt;/option&gt;
		&lt;option value="raspberry"&gt;(This shouldn't matter.)&lt;/option&gt;
	&lt;/select&gt;
&lt;/div&gt;
Post text test.
&lt;script language="JavaScript" type="text/javascript"&gt;
	makecombobox( "testcombobox" );
&lt;/script&gt;
	</pre>
</td>
</tr>
</table>