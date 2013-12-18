<?php
	/*The reason this is being echo'd by php, is because I needed these elements to have no space between them, but still be human readable.*/
	echo '<div id="gs_playfield">'.
			'<div id="gs_playfield_ph">'.
				'<img id="gs_blayer_0" src="/dj/game/img/s1b.png" class="background bgbottom">'.
				'<img id="gs_blayer_1" src="/dj/game/img/s1b.png" class="background bgbottom">'.
				'<img id="gs_blayer_2" src="/dj/game/img/s1b.png" class="background bgbottom">'.
				'<img id="gs_tlayer_0" src="/dj/game/img/s1t.png" class="background bgtop">'.
				'<img id="gs_tlayer_1" src="/dj/game/img/s1t.png" class="background bgtop">'.
				'<img id="gs_tlayer_2" src="/dj/game/img/s1t.png" class="background bgtop">'.
				'<div id="gs_playerZone" class="playerZone"></div>'.
				'<div id="gs_pf_box_0" class="gamebox"></div>'.
				'<div id="gs_pf_box_1" class="gamebox"></div>'.
				'<div id="gs_pf_box_2" class="gamebox"></div>'.
				'<div id="gs_pf_box_3" class="gamebox"></div>'.
				'<img id="gs_player" class="player" src="/dj/game/img/player.png">'.
			'</div>'.
		'</div>';
?>
<div id="gs_debug"></div>
<div id="gs_return" class="gs_option">Return to Title</div>
<table id="gs_table">
	<tr>
		<td class="group">
			Lives:
		</td>
		<td class="right">
			<img src="/dj/game/img/live.png" id="gs_live1" class="gs_live">
			<img src="/dj/game/img/live.png" id="gs_live2" class="gs_live">
			<img src="/dj/game/img/live.png" id="gs_live3" class="gs_live">
			<img src="/dj/game/img/live.png" id="gs_live4" class="gs_live">
			<img src="/dj/game/img/live.png" id="gs_live5" class="gs_live">
		</td>
	</tr>
	<tr>
		<td class="group">
			Score:
		</td>
		<td id="gs_score">
		</td>
</table>
<div id="gs_gameover" style="display:none">Game Over</div>