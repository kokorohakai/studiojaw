<?
if( file_exists("wd/".$_SESSION['subsection'].".php") && strlen($_SESSION['subsection']) > 0 )
{
	require("wd/".$_SESSION['subsection'].".php");
	?>
	<br><br><a href="?subsection=none">Return to browsing</a>
	<?
}
else
{
	?>
	<style type="text/css">
		#webtable td, #webtable2 td, #webtable3 td
		{
			text-align:center;
		}
	</style>
	<h1>Web Design Portfolio</h1><br><br>
	<br><br>
	<b>As Seijinohki PC Services and Software</b>
	<table id="webtable">
		<tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="http://www.seijinohki.net/"><img src="wd/01.png"><br><br>
				Seijinohki</a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="http://www.digiband.net/"><img src="wd/02.png"><br><br>
				DigiBand</a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="http://www.withdint.com/"><img src="wd/03.png"><br><br>
				With Dint</a>
				<?
				$pf -> bottom();
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="http://news.withdint.com/"><img src="wd/04.png"><br><br>
				News @ With Dint</a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="http://www.seijinohki.net/?section=Products&subsection=Simple+CMS"><img src="wd/09.png"><br><br>
				Simple CMS</a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=05"><img src="wd/05.png"><br><br>
				Various JAFAX</a>
				<?
				$pf -> bottom();
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=12"><img src="wd/12-tn.png"><br><br>
				Higurashi Quiz Show</a>
				<?
				$pf -> bottom();
				?>
			</td>
		</tr>
	</table>
	<br><br>
	<b>Class Projects</b>
	<table id="webtable3">
		<tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="old/subaru2012"><img src="wd/10-tn.png"><br><br>
				"Subaru 2012" Graphic<br>
				Design Seminars</a><hr>
				<a href="old/GRD101">Project colaboration<br> page</a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="old/anm256"><img src="wd/11-tn.png"><br><br>
				"The Winery"<br>
				Vector Design</a>
				<?
				$pf -> bottom();
				?>
			</td>
		<tr>
	</table>
	<br><br>
	<b>In the workplace</b>
	<table id="webtable2">
		</tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=06"><img src="wd/06.png"><br><br>
				@ Eaton</a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=07"><img src="wd/07.png"><br><br>
				@ Diamond Phoenix</a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=08"><img src="wd/08.png"><br><br>
				@ Premier Products</a>
				<?
				$pf -> bottom();
				?>
			</td>
		
		</tr>
	</table>
<?
}
?>