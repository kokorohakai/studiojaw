<?  $textonly=true;
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
<body style="border:0px;padding:0px;margin:0px;background:#9999FF">
<table style="position:absolute;z-index:20;left:0px;top:50px;width:100px;">
	<tr>
		<td style="font-weight:bold;font-family:'arial';color:white;font-size:14px;">
			<center><a href="index.php" style="color:white;font-style:italic;font-size:9px;text-align:center">Where's my pretty pictures!?</a></center>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=home">Home</a><br>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=bio">Bio</a><br>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=web">Web Projects</a><br>
			<? if ($section=="web"){?>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=web&amp;subsection=main" style="color:white;text-decoration:none;">-Site list</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=web&amp;subsection=experiments" style="color:white;text-decoration:none;">-Experiments</a><br>
			<?}?>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=cplusplus">C++ Projects</a><br>
			<? if ($section=="cplusplus"){?>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=cplusplus&amp;subsection=main" style="color:white;text-decoration:none;">-Info</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=cplusplus&amp;subsection=hdb" style="color:white;text-decoration:none;">-HDB</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=cplusplus&amp;subsection=tod" style="color:white;text-decoration:none;">-ToD</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=cplusplus&amp;subsection=pos" style="color:white;text-decoration:none;">-POS-SOFT</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=cplusplus&amp;subsection=atshow" style="color:white;text-decoration:none;">-ATshow</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=cplusplus&amp;subsection=cabbit" style="color:white;text-decoration:none;">-Cabbit</a><br>
			&nbsp;<a href="http://www.digiband.org/" style="color:white;text-decoration:none;">-DigiBand</a><br>
			&nbsp;<a href="http://www.seijinohki.net/spacecats" style="color:white;text-decoration:none;">-SSC</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=cplusplus&amp;subsection=tutorial" style="color:white;text-decoration:none;">-Tutorials?</a><br>
			<?}?>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=otherprojs">Other Projects</a><br>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=pso">PSO SS's</a><br>
			<? if ($section=="pso"){?>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=pso&amp;subsection=main" style="color:white;text-decoration:none;">-my screens</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=pso&amp;subsection=howto" style="color:white;text-decoration:none;">-Howto</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=pso&amp;subsection=browser" style="color:white;text-decoration:none;">-Browser fun</a><br>
			<?}?>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=wow">WoW SS's</a><br>
			<? if ($section=="wow"){?>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=wow&amp;subsection=main" style="color:white;text-decoration:none;">-my screens</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=wow&amp;subsection=wowstuff" style="color:white;text-decoration:none;">-WoW stuff</a><br>
			<?}?>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=bmani">Rhythm hole</a><br>
			<? if ($section=="bmani"){?>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=bmani&amp;subsection=main" style="color:white;text-decoration:none;">-main</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=bmani&amp;subsection=news" style="color:white;text-decoration:none;">-news</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=bmani&amp;subsection=links" style="color:white;text-decoration:none;">-links</a><br>
			<?}?>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=anime">Anime hole</a><br>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=japan">Japan hole</a><br>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=computer">Computer hole</a><br>
			<? if ($section=="computer"){?>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=computer&amp;subsection=main" style="color:white;text-decoration:none;">-My Machines</a><br>
			&nbsp;<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=computer&amp;subsection=geekout" style="color:white;text-decoration:none;">-Geek Out</a><br>
			<?}?>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=videogames">VG hole</a><br>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=other">The other hole</a><br>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=links">Useful links</a><br>
			<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=resume">RESUME</a><br>
			<center>
			<br>
			</center>
			<br>
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML" height="31" width="88">
			</a><br>
			<br>
			<a href=" http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fyakko.cs.wmich.edu%2F%7Echibiskuld%2F<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>%3Fsection%3D<?=$section?>%26subsection%3D<?=$subsection?>&amp;	usermedium=all">
				 <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS">
			</a>
			<br><br>
			<center>
			<font size=1>Webdesign (c) 2005 Joe Wall, all other images copyright of their respective owners.</font><br>
			</center>
		</td>
	</tr>
</table>
<table style="position:absolute;z-index:10;left:0px;top:0px;width:100%;">
	<tr>
		<td style="width:105px"></td>
		<td style="width:100%;min-width:500px;">
			<table style="position:relative;z-index:10;width:100%;height:100%;">
				<tr style="height:100%">
					<td style="width:100%;height:100%;text-align:left;font-family:'arial';color:#5500AA;font-size:12pt;padding-left:20px;padding-right:10px;">
						<? require("sections/".$section.".php"); ?>
					</td>
				</tr>
			</table>
		</td>
		<td style="5px"></td>
	</tr>
</table>
</body>
</html>
<?$_SESSION[prevsection]=$section;?>
