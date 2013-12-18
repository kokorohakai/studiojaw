<div id="waveFormContainer">
	<img src="/dj/mixes/<?=$file;?>.png" id="waveForm">
	<div id="seekBar"></div>
	<?php
	if( !empty( $info[$file]["markers"] ) )
	{
		$a=0;
		foreach ($info[$file]["markers"] as $time=>$track)
		{
			?>
			<img class="markers" id="marker_<?=$a;?>" src="/dj/img/marker.png" time="<?=$time;?>">
			<?php
			$a++;
		}
	}
	?>
</div>
<div id="controls">
	<table>
		<tr>
			<td style="text-align:center">
				<img src="/dj/img/covers/<?=( empty( $info[$file]["cover"] ) ) ? "nologo.png" : $info[$file]["cover"]; ?>" style="width:200px;height:200px">
				<img src="/dj/img/pause.png" id="pauseButton">
				<img src="/dj/img/play.png" id="playButton" style="display:none">
				<img src="/dj/img/seeking.png" id="seekingButton" style="display:none">
				<br><br>
				<a href="/?section=dj&subsection=ps">~ Browse other shows ~</a><br>
				<br>
				<b>File Info:</b>
				<table class="infoPanel">
					<tr>
						<td>
							Current:
						</td>
						<td id="currentTrackTime">
						</td>
					</tr>
					<tr>
						<td>
							Duration:
						</td>
						<td id="totalTrackTime">
						</td>
					</tr>
				</table>
				<br>
				<span id="playGame" class="link">Play Game!</span>
			</td>
			<td style="padding-left:50px;">
				<div id="mp3Title">
					<?=( empty($info[$file] ) && empty( $info[$file]["title"] ) ) ? $file : $info[$file]["title"]; ?>
				</div>
				<div id="mp3Comment">
					<?=( empty($info[$file] ) && empty( $info[$file]["comment"] ) ) ? "" : $info[$file]["comment"]; ?>
				</div>
				<div id="mp3Description">
					<?=( empty($info[$file] ) && empty( $info[$file]["description"] ) ) ? "" : $info[$file]["description"]; ?>
				</div>
				<div>
					<?php
					if( !empty( $info[$file]["markers"] ) )
					{
						?>
						<br><br>
						<h2 style="font-family:Arial,sans-serif;">Tracks</h2>
						<table class="tracks">
							<thead>
								<th class="trackNumber">
									Track
								</th>
								<th class="trackTime">
									Time
								</th>
								<th class="trackInfo">
									<span class="trackName">Track</span> / <span class="artist">Artist</span> / <span class="album">Album</span>
								</th>
								<th class="trackComment">
									Comments
								</th>
								<th class="trackInfo">
									<span class="trackName">Circle</span> / <span class="artist">Year</span>
								</th>
							</thead>
							<?php
							$a = 0;
							foreach ($info[$file]["markers"] as $time=>$track)
							{
								?>
								<tr id="marker_<?=$a;?>_track">
									<td class="trackNumber">
										<span id="marker_<?=$a;?>_link" class="markerLink"><?=$a+1;?></span>
									</td>
									<td class="trackTime">
										<span id="marker_<?=$a;?>_time">...</span>
									</td>
									<td class="trackInfo">
										<?php if(!empty($track["trackname"])){ ?> 
											<span class="trackName list"><?=$track["trackname"];?></span><br>
										<?php } ?>
										<?php if(!empty($track["artist"])){ ?> 
											<span class="artist list"><?=$track["artist"];?></span><br>
										<?php } ?>
										<?php if(!empty($track["album"])){ ?> 
											<span class="album list"><?=$track["album"];?></span><br>
										<?php } ?>
									</td>
									<td class="trackComment">
										<?php if(!empty($track["comment"])){ ?> 
											<span class="comment list"><span><?=$track["comment"];?></span></span><br>
										<?php } ?>
									</td>
									<td class="trackInfo">
										<?php if(!empty($track["circle"])){ ?> 
											<span class="trackName list"><?=$track["circle"];?></span><br>
										<?php } ?>
										<?php if(!empty($track["year"])){ ?> 
											<span class="artist list"><?=$track["year"];?></span><br>
										<?php } ?>
									</td>
								</tr>
								<?php
								$a++;
							}
							?>
						</table>
					<?php
					}
					?>
				</div>
			</td>
		</tr>
	</table>
</div>
<audio autoplay id="audioOBJ" style="display:none;">
	<source src="/dj/mixes/<?=$file?>" type="audio/mpeg">
	Your Browser does not support HTML5 audio.
</audio>
<br>