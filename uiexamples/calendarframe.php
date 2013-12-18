<?
function isdate( $str )
{
  $ts = strtotime( $str );
 
  if (!is_numeric($ts))
  {
     return FALSE;
  }
  $month = date( 'm', $ts );
  $day   = date( 'd', $ts );
  $year  = date( 'Y', $ts );
 
  if (checkdate($month, $day, $year))
  {
     return TRUE;
  }
 
  return FALSE;
} 
?>
<html><head>
<script language="JavaScript" type="text/javascript" src="../master/mootools.js"></script>
<script language="JavaScript" type="text/javascript" src="../script/joecalendar.js"></script>
<link rel="stylesheet" type="text/css" href="../css/joecalendar.css">
</head><body>
Date with existing value:<br>
<table>
	<tr>
		<td>
			<form action="calendarframe.php" method="post">
				<input type="hidden" value="blah" name="testfield">
				<input type="text" value="<? if (isset($_POST["date1"])) echo $_POST["date1"]; else echo "06/17/1999";?>" name="date1" id="date1"><br>
				<br>
				Date with no value:<br>
				<input type="text" name="date2" id="date2" value="<? if (isset($_POST["date2"])) echo $_POST["date2"];?>"><br>
				Date with editable field:<br>
				<input type="text" name="date3" id="date3" value="<? if (isset($_POST["date3"])) echo $_POST["date3"];?>"><br>
				Date with year navigation:<br>
				<input type="text" name="date4" id="date4" value="<? if (isset($_POST["date4"])) echo $_POST["date4"];?>"><br>
				Date with all options:<br>
				<input type="text" name="date5" id="date5" value="<? if (isset($_POST["date5"])) echo $_POST["date5"];?>"><br>
				<br>
				<input type="submit" value="Test date submit" style="width:150px;">
			</form>
		</td>
		<td>
			<?
			if (isset($_POST["testfield"]))
			{
				?>
				<b>Date test area:</b><br>
				Got from Date 1: <?=$_POST["date1"]?><br>
				Is it a valid date?: <?
				if (isdate($_POST["date1"]))
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
				?><br><br>
				Got from Date 2: <?=$_POST["date2"]?><br>
				Is it a valid date?: <?
				if (isdate($_POST["date2"]))
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
				?><br><br>
				Got from Date 3: <?=$_POST["date3"]?><br>
				Is it a valid date?: <?
				if (isdate($_POST["date3"]))
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
			}
			?>
		</td>
	</tr>
</table>
<script language="JavaScript" type="text/javascript">
	makecalendar("date1");
	makecalendar("date2");
	makecalendar("date3",{'editable':true});
	makecalendar("date4",{'navbyyear':true});
	makecalendar("date5",{'editable':true,'navbyyear':true});
</script>
</body></html>