<?
session_start();
if ( !isset($_SESSION["First_Name"]))
{
	$_SESSION["First_Name"]="Joe";
	$_SESSION["Last_Name"]="Wall";
	$_SESSION["Location"]="The moon";
	
}
if ( isset($_GET["setupdate"]) )
{
	//let's just use the session variables on the server for now for storing this data.
	//normally we'd want this data to be put into a database and recalled with getupdate.
	foreach ( $_GET as $var=>$val)
	{
		$_SESSION[ $xar ] = $val;
	}
}
else
{
?>
<html>
<head>
	<script language="JavaScript" type="text/javascript" src="../master/mootools.js"></script>
	<script language="JavaScript" type="text/javascript" src="../script/popupwindow.js"></script>
	<style type="text/css">
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
	</style>
</head>
<body>
	<div id="popupdata" style="text-align:right;width:100%;height:100%;"><!-- stylize the div any way you want it! -->
		<input type="hidden" name="First_Name" value="<?=$_SESSION["First_Name"]?>">
		<input type="hidden" name="Last_Name" value="<?=$_SESSION["Last_Name"]?>">
		<input type="hidden" name="Location" value="<?=$_SESSION["Location"]?>">
	</div>
	<script language="JavaScript" type="text/javascript">
		makePopupWindow("popupdata","popupwindowframe.php?setupdate=true");
		//ID of div to make a popup window out of, and the url to handle the data from the popup.
	</script>
</body>
</html>
<?
}
?>