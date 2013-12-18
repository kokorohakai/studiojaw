<?
	import_request_variables("GPC");
	if ($section==NULL)$section="home";
	if ($subsection==NULL)$subsection="main";
	if ($prevsection==NULL)$prevsection="home";
	for ($i=0;$i<strlen($section);$i++){
		if ($section[$i]=="/"){
			$section[$i]=" ";
		}
	}
	for ($i=0;$i<strlen($subsection);$i++){
		if ($subsection[$i]=="/"){
			$subsection[$i]=" ";
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Welcome to ChibiSkuld's random page.</title>
</head>
<body style="border:0px;padding:0px;margin:0px;background:#8BB7B5">
<div style="background:#8BB7B5;position:fixed;height:105%;width:100%;z-index:2;vertical-align:top;top:-2px;">
<img src="images/background.png" style="width:100%;" alt="">
</div>

<table style="position:absolute;z-index:30;top:-135px;right:0px;width:100%;">
	<tr>
		<td style="width:20px;">
		</td>
		<td style="width:100%">
			<table style="width:100%;position:relative;top:0px;">
				<tr>
					<td style="width:173px">
						<img src="images/avatar.png" style="position:relative;z-index:50;left:-20px;top:127px;" alt="Chibi Skuld">
					</td>
					<td style="width:100%;">
						<center>
						<img src="images/miniavatar.png" style="position:relative;z-index:50;top:15px;" alt="Forever chasing bugs...">
						</center>
					</td>
				</tr>
				<tr style="height:131px">
					<td style="height:131px;" colspan=2>
						<table style="position:relative;z-index:30;width:100%">
							<tr style="height:131px">
								<td style="height:131px;width:84px;">
									<img src="images/titleleft.png" alt="">
								</td>
								<td style="min-width:400px;height:131px;background:url('images/titlecenter.png') repeat-x;">
									<center>
									<img src="images/welcome.png" style="position:relative;top:-30px;left:50px;z-index:35;max-width:426px;width:100%;" alt="">
									</center>
								</td>
								<td style="height:131px;width:99px;">
									<img src="images/titleright.png" alt="">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td style="width:20px;">
		</td>
	</tr>
</table>
<table style="position:absolute;z-index:20;left:20px;top:130px;">
	<tr>
		<td style="width:236px" valign=top>
			<table style="position:relative;z-index:20;">
				<tr>
					<td>
						<img src="images/sidebartop.png" alt=" ">
					</td>
				</tr>
				<tr>
					<td style="background:url('images/sidebarmiddle.png') repeat-y;font-weight:bold;font-family:'arial';color:white;font-size:24px;">
						<center><a href="textonly.php" style="color:white;font-style:italic;font-size:14px;text-align:center">Can't see? try text-only!</a></center>
						<div style="position:relative;left:24px">
						<a href="index.php?section=home"><img src="images/link-01.png" alt="Home"></a><br>
						<a href="index.php?section=bio"><img src="images/link-02.png" alt="Bio"></a><br>
						<a href="index.php?section=web"><img src="images/link-03.png" alt="Web Projects"></a><br>
						<? if ($section=="web"){?>
						&nbsp;<a href="index.php?section=web&amp;subsection=main" style="color:white;text-decoration:none;">-Site list</a><br>
						&nbsp;<a href="index.php?section=web&amp;subsection=experiments" style="color:white;text-decoration:none;">-Experiments</a><br>
						<?}?>
						<a href="index.php?section=cplusplus"><img src="images/link-04.png" alt="C++ Projects"></a><br>
						<? if ($section=="cplusplus"){?>
						&nbsp;<a href="index.php?section=cplusplus&amp;subsection=main" style="color:white;text-decoration:none;">-Info</a><br>
						&nbsp;<a href="index.php?section=cplusplus&amp;subsection=hdb" style="color:white;text-decoration:none;">-HDB</a><br>
						&nbsp;<a href="index.php?section=cplusplus&amp;subsection=tod" style="color:white;text-decoration:none;">-ToD</a><br>
						&nbsp;<a href="index.php?section=cplusplus&amp;subsection=pos" style="color:white;text-decoration:none;">-POS-SOFT</a><br>
						&nbsp;<a href="index.php?section=cplusplus&amp;subsection=atshow" style="color:white;text-decoration:none;">-ATshow</a><br>
						&nbsp;<a href="index.php?section=cplusplus&amp;subsection=cabbit" style="color:white;text-decoration:none;">-Cabbit</a><br>
						&nbsp;<a href="http://www.digiband.org/" style="color:white;text-decoration:none;">-DigiBand</a><br>
						&nbsp;<a href="http://www.seijinohki.net/spacecats" style="color:white;text-decoration:none;">-SSC</a><br>
						&nbsp;<a href="index.php?section=cplusplus&amp;subsection=tutorial" style="color:white;text-decoration:none;">-Tutorials</a><br>
						<?}?>
						<a href="index.php?section=otherprojs"><img src="images/link-05.png" alt="Other Projects"></a><br>
						<a href="index.php?section=pso"><img src="images/link-06.png" alt="PSO SS's"></a><br>
						<? if ($section=="pso"){?>
						&nbsp;<a href="index.php?section=pso&amp;subsection=main" style="color:white;text-decoration:none;">-my screens</a><br>
						&nbsp;<a href="index.php?section=pso&amp;subsection=howto" style="color:white;text-decoration:none;">-Howto</a><br>
						&nbsp;<a href="index.php?section=pso&amp;subsection=browser" style="color:white;text-decoration:none;">-Browser fun</a><br>
						<?}?>
						<a href="index.php?section=wow"><img src="images/link-07.png" alt="WoW SS's"></a><br>
						<? if ($section=="wow"){?>
						&nbsp;<a href="index.php?section=wow&amp;subsection=main" style="color:white;text-decoration:none;">-my screens</a><br>
						&nbsp;<a href="index.php?section=wow&amp;subsection=wowstuff" style="color:white;text-decoration:none;">-WoW stuff</a><br>
						<?}?>
						<a href="index.php?section=bmani"><img src="images/link-08.png" alt="Rhythm hole"></a><br>
						<? if ($section=="bmani"){?>
						&nbsp;<a href="index.php?section=bmani&amp;subsection=main" style="color:white;text-decoration:none;">-main</a><br>
						&nbsp;<a href="index.php?section=bmani&amp;subsection=news" style="color:white;text-decoration:none;">-news</a><br>
						&nbsp;<a href="index.php?section=bmani&amp;subsection=links" style="color:white;text-decoration:none;">-links</a><br>
						<?}?>
						<a href="index.php?section=anime"><img src="images/link-09.png" alt="Anime hole"></a><br>
						<a href="index.php?section=japan"><img src="images/link-10.png" alt="Japan hole"></a><br>
						<a href="index.php?section=computer"><img src="images/link-11.png" alt="Computer hole"></a><br>
						<? if ($section=="computer"){?>
						&nbsp;<a href="index.php?section=computer&amp;subsection=main" style="color:white;text-decoration:none;">-My Machines</a><br>
						&nbsp;<a href="index.php?section=computer&amp;subsection=geekout" style="color:white;text-decoration:none;">-Geek Out</a><br>
						<?}?>
						<a href="index.php?section=videogames"><img src="images/link-12.png" alt="VG hole"></a><br>
						<a href="index.php?section=other"><img src="images/link-13.png" alt="The other hole"></a><br>
						<a href="index.php?section=links"><img src="images/link-14.png" alt="Useful links"></a><br>
						<a href="index.php?section=resume"><img src="images/link-15.png" alt="RESUME"></a><br>
						</div>
						<center>
						<img src="images/skuld-bug.png" alt="bug!"><br>
						</center>
						<div style="position:relative;left:70px;">
						<br>
						<a href="http://validator.w3.org/check?uri=referer">
							<img src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML" height="31" width="88">
						</a><br>
						<br>
        				<a href=" http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fyakko.cs.wmich.edu%2F%7Echibiskuld%2Findex.php%3Fsection%3D<?=$section?>%26subsection%3D<?=$subsection?>&amp;	usermedium=all">
							 <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS">
						</a>
						</div>
						<center>
						<div style="width:170px;">
						<a href="http://www.mozilla.org"><img src="images/mozilla.png" alt="Quit using links foo!"></a><br>
						<a href="http://www.opera.com"><img src="images/opera.png" alt="who wants to pay for a browser???"></a><br>
						<a href="http://www.netscape.com"><img src="images/netscape.png" alt="You might as well still use mozilla."></a><br>
						<a href="http://www.kde.org"><img src="images/konquerer.png" alt="WTF where'd that come from?"></a><br>
							<font size=4>This website designed for Mozilla based browsers, Opera, and Konquerer.</font><br>
							<font size=3>it may not and in most cases will not work in other browsers.</font><br>
							<font size=2>Best viewed in 800x600 or higher resolutions.</font><br>
							<font size=1>Webdesign (c) 2005 Joe Wall, all other images copyright of their respective owners.</font><br>
						</div>
						</center>
					</td>
				</tr>
				<tr>
					<td>
						<img src="images/sidebarbottom.png" alt="">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table style="position:absolute;z-index:10;left:0px;top:190px;width:100%;">
	<tr>
		<td style="width:20px;">
		</td>
		<td style="width:100%;min-width:500px;">
			<table style="position:relative;z-index:10;width:100%;height:100%;">
				<tr style="height:47px">
					<td style="width:211px;height:47px">
						<img src="images/mainscreentopleft.png" style="width:211px;height:47px" alt="">
					</td>
					<td style="width:100%;height:47px">
						<img src="images/mainscreentopcenter.png" style="width:100%;height:47px" alt="">
					<td>
					<td style="width:57px;height:47px">
						<img src="images/mainscreentopright.png" style="width:57px;height:47px" alt="">
					</td>
				</tr>
				<tr style="height:100%">
					<td style="width:211px;height:100%;">
						<img src="images/mainscreencenterleft.png"  style="width:100%;height:100%;" alt="">
					</td>
					<td style="background:url('images/mainscreencentercenter.png');width:100%;height:100%;text-align:left;font-family:'arial';color:#5500AA;font-size:12pt;padding-left:20px;padding-right:10px;">
						<? require("sections/".$section.".php"); ?>
					</td>
					<td style="width:57px;height:100%;">
						<img src="images/mainscreencenterright.png" style="width:57px;height:100%;" alt="">
					</td>
				</tr>
				<tr style="height:68px">
					<td style="width:211px;height:68px">
						<img src="images/mainscreenbottomleft.png" style="width:211px;height:68px" alt="">
					</td>
					<td style="width:100%;height:68px">
						<img src="images/mainscreenbottomcenter.png" style="width:100%;height:68px" alt="">
					</td>
					<td style="width:57px;height:68px">
						<img src="images/mainscreenbottomright.png" style="width:57px;height:68px" alt="">
					</td>
				</tr>
			</table>
		</td>
		<td style="width:20px;">

		</td>
	</tr>
</table>
</body>
</html>
<?$_SESSION[prevsection]=$section;?>
