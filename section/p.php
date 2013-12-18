<link type="text/css" rel="stylesheet" href="p/cs/p.css"/>
<table class="touhou">
    <tr>
        <td class="body">
            <?
            if ( file_exists( "p/".$_SESSION['subsection'].".php" ) )
            {
            	require( "p/".$_SESSION['subsection'].".php" );
            }
            else
            {
            	?>
            	
            	<img src="/p/img/reimu.png" style="float:left">
                <h1>Touhou Convention!</h1><br><br>
                After going to Anime Weekend Atlanta, I was shocked to see how many Touhou fans are out there! I noticed that the convention last year was 13,472, and thanks to us Touhou's, we grew the convention to well over 20,000! (as announced during closing cermonies, official count is still unknown)
                I believe this happened because of us. And I believe it's about time, we had a convention that is just for Touhou! In japan, they have <a href="http://en.touhouwiki.net/wiki/Reitaisai">Reitaisai</a>, an annual Touhou only festival. I believe we could do the same! I personally have started
                a convention before. But it didn't work out because of financial reasons. I believe it was because the staff I worked with didn't have the passion and effort us Touhou's have. And with that said, I feel we need a new approach. If you are interested in the details check out our process page!
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
        					Tewhew Navigator
        				</td>
        			</tr>
        			<tr class="even">
        				<td>
        					<a href="?section=p&subsection=">Home</a>
        				</td>
        			</tr>
        			<tr class="odd">
        				<td>
        					<a href="?section=p&subsection=openings">Looking for Staff!</a>
        				</td>
        			</tr>
        			<tr class="even">
        				<td>
        					<a href="?section=p&subsection=model">The process!</a>
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