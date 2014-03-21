<?
if ( file_exists( "t/".$_SESSION['subsection'].".php" ) )
{
	require( "t/".$_SESSION['subsection'].".php" );
	?>
	<br><br>
	<a href="?subsection=none">Return to list of tutorials.</a>
	<?
}
else
{
	?>
	<h1>Tutorials and Code Samples</h1><br><br>
	<b>Tutorials</b><br>
	Below are a few tutorials of how to tasks in various programming languages. Also for future
	employers, this is a way to become intimate with my coding practices and styles. These 
	tutorials start out with the basics and work up to more complicated examples. Please feel 
	free to use anything you see on this page.<br>
	<center>
		<?
		$sf = new simpleframe();
		$sf -> top(); 
		?>
		<table class="list">
			<tr class="head">
				<td class="head">
					Coding Language
				</td>
			</tr>
			<tr class="odd">
				<td>
					<a href="?section=t&subsection=php&example=none">PHP</a>
				</td>
			</tr>
			<tr class="even">
				<td>
					<a href="?section=t&subsection=js&example=none">javascript</a>
				</td>
			</tr>
			<tr class="odd">
				<td>
					<a href="?section=t&subsection=asp&example=none">ASP</a>		
				</td>
			</tr>
			<tr class="even">
				<td>
					<a href="?section=t&subsection=aspx&example=none">ASP.net (vb)</a>
				</td>
			</tr>
			<tr class="odd">
				<td>
					<a href="?section=t&subsection=cpp&example=none">C++</a>
				</td>
			</tr>
		</table>
		<?
		$sf -> bottom();
		?>
	</center>	
	<b>General code Samples:</b><br>
    These samples are mostly for prospective employers, but if you see something useful here, feel free to use it:<br>
	<center>
		<?
		$sf = new simpleframe();
		$sf -> top(); 
		?>
		<table class="list">
			<tr class="head">
				<td class="head">
					Code Samples
				</td>
			</tr>
			<tr class="odd">
				<td>
					<a href="?section=t&subsection=cirnoframework">Cirno Framework: An Object Oriented PHP and Node.js Framework</a>
				</td>
			</tr>
			<tr class="even">
				<td>
					<a href="http://crystaljs.studiojaw.com/#">Node.js/Ember.js Application Engine</a>
				</td>
			</tr>
        	<tr class="odd">
        		<td>
        			<a href="/t/cs/Withdint-CAC.zip">Custom Application Creator - WithDint</a>
        		</td>
        	</tr>
        	<tr class="even">
        		<td>
        			<a href="/t/cs/table-highlight.rtf">Example of a class used to render a table that highlights</a>
        		</td>
        	</tr>
        	<tr class="odd">
        		<td>
        			<a href="/t/cs/LoginManager.php.txt">Login Manager of WithDint.com</a>
        		</td>
        	</tr>
        	<tr class="even">
        		<td>
        			<a href="/t/cs/WithDint-API.php.txt">Other API functions from WithDint</a>
        		</td>
        	</tr>
        	<tr class="odd">
        		<td>
        			<a href="/t/cs/readini.rtf">read ini file into an array</a>
        		</td>
        	</tr>
        	<tr class="even">
        		<td>
        			<a href="/t/cs/WithDint-weather.rtf">WithDint - update weather information</a>
        		</td>
        	</tr>
		</table>
		<?
		$sf -> bottom();
		?>
	</center>	
    
	
	<b>Don't forget to also check out:</b><br>
	<a href="?section=ui&subsection=none">User Interface Examples</a> for more code samples
	and utilities you can use for your own project!<br>
	<br>
	You can also check out more of my code on Git Hub!<br>
	<a href="https://github.com/kokorohakai">My Git Hub Accouunt</a>
<?
}
?>
