<?
if ( $_SESSION['subsection'] == "none" )
{
?>
<h1>User Interface Examples </h1><br><br><br>
Below is a list of User Interface Examples that I have designed and coded myself. Feel free to download and use any of these tools for your own projects or applications.<br><br>
<? 
$sf = new simpleframe();
$sf -> top(); ?>
<table class="list">
	<tr class="head">
		<td class="head">
			Example
		</td>
		<td class="head">
			Requirements
		</td>
		<td class="head">
			Downloads
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?section=ui&subsection=tree1">Automatic Tree Generation 1</a><br>
		</td>
		<td>
			<a href="master/prototype.js">Prototype</a> /
			<a href="master/mootools.js">MooTools v1.11</a>
		</td>
		<td>
			<a href="script/maketree.js">Maketree.js</a>
			<a href="img/blank.gif">blank.gif</a><br>
			<a href="img/open.gif">open.gif</a><br>
			<a href="img/close.gif">close.gif</a><br>
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="?section=ui&subsection=tree2">Automatic Tree Generation 2</a><br>
		</td>
		<td>
			<a href="master/prototype.js">Prototype</a> /
			<a href="master/mootools.js">MooTools v1.11</a>
		</td>
		<td>
			<a href="script/makefancytree.js">maketree alt</a><br>
			<a href="img/fancyblank.gif">blank.gif</a><br>
			<a href="img/fancyopen.gif">open.gif</a><br>
			<a href="img/fancyclose.gif">close.gif</a><br>
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?section=ui&subsection=swapper">Image Swapper</a><br>
		</td>
		<td>
			<a href="master/mootools.js">MooTools v1.11</a>
		</td>
		<td>
			<a href="script/makeimageswap.js">make image swap</a><br>
			<a href="img/fullscreen.gif">Fullscreen button</a>
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="?section=ui&subsection=scroller">Text Scroller</a><br>
		</td>
		<td>
			<a href="master/prototype.js">Prototype</a> /
			<a href="master/mootools.js">MooTools v1.11</a>
		</td>
		<td>
			<a href="script/scrollthis.js">scrollthis.js</a>
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?section=ui&subsection=bgexample">A example background based on animation effects.</a><br>
		</td>
		<td>
			<a href="master/mootools.js">MooTools v1.11</a>
		</td>
		<td>
			see Example
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="?section=ui&subsection=popupimage">An example of content with a popup image</a>
		</td>
		<td>
			None
		</td>
		<td>
			<a href="script/popup1.js">popup1.js</a>
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?section=ui&subsection=popupwindow">An example of data that can be edited with a popup window</a>
		</td>
		<td>
			<a href="master/mootools.js">MooTools v1.11</a>
		</td>
		<td>
			<a href="script/popupwindow.js">Make Pop Up Window</a>
		</td>
	</tr>
	<tr class="even">
		<td>
			<!--a href="uiexamples/calendar/"-->
			<strike>.ics calendar Reader</strike><br>
			(Sorry no example available)
		</td>
		<td>
			<a href="master/mootools.js">MooTools v1.11</a> / ASP classic
		</td>
		<td>
			<a href="uiexamples/calendar/calendar.zip">application</a>
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?section=ui&subsection=combobox">Combo Box</a>
		</td>
		<td>
			<a href="master/prototype.js">Prototype</a> /
			<a href="master/mootools.js">MooTools v1.11</a>
		</td>
		<td>
			<a href="script/combobox.js">combobox.js</a>
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="?section=ui&subsection=calendar">Calendar Select</a>
		</td>
		<td>
			<a href="master/mootools.js">MooTools v1.11</a>
		</td>
		<td>
			<a href="script/joecalendar.js">joecalendar.js</a>
			<a href="css/joecalendar.css">joecalendar.css</a>
		</td>
	</tr>
</table>
<? $sf -> bottom(); ?>
<?
}
else
{
	?>
	<h1>UI Example: <?=$_SESSION['subsection']?></h1><br>
	<div style="line-height:40px;">(<a href="?section=ui&subsection=none">Return to Example List</a>)</div>
	<?
	if (file_exists("uiexamples/".$_SESSION['subsection'].".php"))
	{
		require("uiexamples/".$_SESSION['subsection'].".php");
	}
}
?>
