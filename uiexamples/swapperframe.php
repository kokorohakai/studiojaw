<html>
<head></head>
<body style="overflow:hidden;">
	<script type="text/javascript" language="javascript" src="../master/mootools.js"></script>
	<script language="JavaScript" type="text/javascript" src="../script/makeimageswap.js"></script>
		<b style="font-size:20px;">Image swapper</b><br><br>
		<!-- The outer div with id="imageswap" is required, each inner div must contain an img to be used in the background.
			 Any HTML without a src= can be used within each inner div.-->
		<div id="imageswap">
			<div>
				<img src="../logoimg/1.png">
				<div style="color:white;font-weight:bold;padding:20px;width:360px;text-align:right;">
					<a href="?section=ui&subsection=swapper" style="color:white;">&gt; Read the Full Story</a>
				</div>
			</div>
			<div>
				<img src="../logoimg/2.png">
				<div style="color:white;font-weight:bold;padding:20px;width:100px;text-align:left;">
					<a href="?section=ui&subsection=swapper">&gt; Read the Full Story</a>
				</div>
			</div>
			<div>
				<img src="../logoimg/3.png">
				<div style="color:white;font-weight:bold;padding:20px;width:360px;text-align:left;">
					<a href="?section=ui&subsection=swapper">&gt; Read the Full Story</a>
				</div>
			</div>
		</div>
		<script type="text/javascript" language="JavaScript">
			makeimageswap($('imageswap'),3000,199,505);//id, time in milliseconds, width, height.
		</script>
	</td>
</body>
</html>