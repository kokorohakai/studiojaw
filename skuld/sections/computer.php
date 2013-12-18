<?if ($subsection=="main"){?>
<center><b>The Computer Hole</b></center>
<hr>
<center><b style="color:red">Current machines:</b></center>
<b>Beercan:</b>
usuage: Primary workstation.<br>
CPU: AMD athlon XP 2600+ 1.9Ghz (barton core)<br>
Vid: Geforce FX 5600, 256MB<br>
Mobo: Asus nForce 2 (A7N8X-E or something like that.)<br>
HD: 40GB<br>
RAM: 1GB DDR PC2100<br>
Sound: Audigy 2 ZS Platinum HD<br>
OS: Windows XP Pro<br>
<br>
<b>NESter:</b>
Usuage: MP3 file/sound server.<br>
CPU: Via Nehemian 1Ghz<br>
Vid: Geforce 4 MX 420, 64MB<br>
Mobo: VIA EPIA-M10000 mini-itx<br>
HD: 40GB 2.5" drive<br>
RAM: 256MB DDR PC2100<br>
Sound: VIA Vinyl (half way decent, really good for onboard.)<br>
OS: Slackware 10.1<br>
<br>
<b>Seijinohki:</b>
Usuage: Master Server
CPU: AMD athlon 1800+ 1.4Ghz UC'd at 1Ghz<br>
Vid: A broken Geforce 4 ti 4400(Like it needs it).<br>
Mobo: Some generic MSI<br>
HD: 40GB x 2<br>
RAM: 768MB SDRAM 133Mhz<br>
Sound: (none)<br>
Case: Hand paint case with Chii(Chobits) and Sailor Saturn.<br>
OS: Windows XP Pro<br>
<br>
<b>Ciencia:</b>
Usuage: Mobile Workstation.<br>
Manufactor: Hewlette Packard Pavillion ZV5000<br>
CPU: AMD athlon 64 3000+, 1.6GHZ, 256K cache, disabled 64-bit float. (AMD Athlon XP-M 3000+, soon to change hopefully.)<br>
Vid: Geforce 4 MX 440 (with AGP 8x, OC'd and 450Mhz ramdacs), 64MB<br>
Mobo: HP???<br>
HD: 40GB<br>
RAM: 512MB 333Mhz PC3100-NB<br>
Sound: (none)<br>
OS: Windows XP Pro and Slackware modified.<br>
<br>



<?}else if ($subsection=="geekout"){
if ($geeknight==NULL){
$geeknight=0;
}
?>
<!--geekout code starts here-->
<center><b>The Geek Out:
<?if ($geeknight==0){?>
Introduction
<?}else{?>
Night <?=$geeknight?>
<?}?></b></center><hr>
<br>
<b>Please select which night you would like to check out:</b><br>
<br>
<div style="padding-left:30px;">
<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=computer&amp;subsection=geekout&amp;geeknight=0" style="color:blue;text-decoration:none;">Intro</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?
$n=1;
while(file_exists("geekout/night".$n.".htm")){?>
	<a href="<?if($textonly){echo "textonly.php";}else{echo "index.php";}?>?section=computer&amp;subsection=geekout&amp;geeknight=<?=$n?>" style="color:blue;text-decoration:none;">Night <?=$n?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?
$n=$n+1;
}
?>
</div>
<br>
<hr>
<br>
<?
require("geekout/night".$geeknight.".htm");
?>
<?
if (is_dir("geekout/night".$geeknight)){
?>
<br>
<hr>
<br>
<center><b>Pictures for night <?=$geeknight?></b></center><br>
<br>
<div style="padding-left:30px;">
<?
$n=-1;
$files = opendir("geekout/night".$geeknight);
	while ( ($file = readdir($files)) ) {
		if ($n>0){?>
		<a href="geekout/night<?echo $geeknight;?>/<?echo $file;?>">Picture-<?=$n?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?}	$n=$n+1;}
closedir($files);?>
</div>
<?
}
}?>