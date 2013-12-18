<link type="text/css" rel="stylesheet" href="p/cs/p.css"/>
<table class="touhou">
    <tr>
        <td class="body">
            <?
            if ( file_exists( "dj/".$_SESSION['subsection'].".php" ) )
            {
            	require( "dj/".$_SESSION['subsection'].".php" );
            }
            else
            {
            	?>
				<h1>DJ and Karaoke Services</h1><br><br>
				I specialize in J-core and Hardcore techno for clubs and Japanese animation conventions. I also have a wide collection of songs for Karaoke! My rates are very competitive, and I will
				also do private venues such as weddings, if asked.<br><br>
				Please contact me with the info in my <a href="/?section=c&subsection=none">contact section</a> if you would like to inquire more about my services as a DJ.<br>
				<br>
				As I grow and develop my skills, and find time to post info up here, this site section will expand.           	
				<?
            }
            ?>
        </td>
        <td class="navigator">	
            <center>
        		<?
        		$sf = new simpleframe();
        		$sf -> top(); 
        		?>
        		<table class="list">
        			<tr class="head">
        				<td class="head">
        					The world of DJ JAW
        				</td>
        			</tr>
        			<tr class="even">
        				<td>
        					<a href="?section=dj&subsection=">Home</a>
        				</td>
        			</tr>
        			<tr class="odd">
        				<td>
        					<a href="?section=dj&subsection=s">Upcoming Shows and Events</a>
        				</td>
        			</tr>
        			<tr class="even">
        				<td>
        					<a href="?section=dj&subsection=ps">Past Shows</a>
        				</td>
        			</tr>
        			<tr class="odd">
        				<td>
        					<a href="?section=dj&subsection=pe">Past Events</a>
        				</td>
        			</tr>
        		</table>
        		<?
        		$sf -> bottom();
        		?>
        	</center>
        </td>
    </tr>
</table>
