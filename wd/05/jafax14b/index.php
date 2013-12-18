<?
	//begin session/sections handling.
	error_reporting(0);
	session_start();
	import_request_variables("GPC");
	if ($section==NULL)$section="home";
	if ($subsection==NULL)$subsection="main";
	//if ($prevsection==NULL)$prevsection="home"; //this might not be needed in this sites case.
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
	if (strlen($_SESSION['theme'])<2){
		$_SESSION['theme']="type2";
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Jafax 14: Camp Anime</title>
		<META http-equiv="Content-Type" content="text/html; charset=shift_jis">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
		<!--need some browser detection here, the gif should be used for <=IE6.0, and png for everything else.-->
		<a href="?section=home"><img src="images/logo.gif" alt="Jafax 14: Camp Anime" border="0"></a>
		</div>
		<!--<img src="images/cabin.gif" style="position:absolute;z-index:2;left:10px;top:100px;">-->
		<!--<div class="background">
			<img src="images/body.jpg" style="width:100%;min-width:800px;">
		</div>-->
		<table class="body">
			<tr>
				<td style="width:50%">&nbsp;</td>
			  <td class=sidebar>
				<p>
					<div class=linktb><img src="images/linktop.gif"></div>
					<a class=sidebar href="?section=home"><img src="images/home.gif" alt="Home"></a><br>
				    <a class=sidebar href="?section=about"><img src="images/about.gif" alt="About"></a><br>
				    <a class=sidebar href="?section=location"><img src="images/location.gif" alt="Location"></a><br>
				    <a class=sidebar href="?section=rules"><img src="images/rules.gif" alt="JAFAX Rules"></a><br>
			      <a class=sidebar href="?section=events"><img src="images/events.gif" alt="Events"></a><br>
			      <a class=sidebar href="?section=guests"><img src="images/guests.gif" alt="Guests"></a><br>
			      <a class=sidebar href="?section=vendors"><img src="images/vendors.gif" alt="Vendors"></a><br>
			      <a class=sidebar href="?section=donate"><img src="images/donate.gif" alt="Donate!"></a><br>
			      <a class=sidebar href="?section=volunteer"><img src="images/volunteer.gif" alt="Volunteer"></a><br>
			      <a class=sidebar href="?section=artists"><img src="images/artists.gif" alt="Artists"></a><br>
	              <a class=sidebar href="/forum"><img src="images/forum.gif" alt="Forums"></a><br>
			      <a class=sidebar href="?section=contact"><img src="images/contact.gif" alt="Contact Us"></a><br>
			      <div class=linktb><img src="images/linkbottom.jpg"></div>
				</td>
				<td style="width:650px;color:white;vertical-align:top">
				<div style="font-size:35px">&nbsp;</div>
					<table>
					<tr style="height:17px;vertical-align:top">
					<td class="tl"><img src="images/frame-tl.gif" alt=" " width=11 height=17></td>
					<td class="tm"><img src="images/frame-tm.gif" alt=" " width="100%" height=17></td>
					<td class="tr"><img src="images/frame-tr.gif" alt=" " width=11 height=17></td>
					</tr>
					<tr style="vertical-align:top;height:100%">
					<td class="ml"><img src="images/frame-ml.gif" alt=" " width=11 height="100%"></td>
					<td class="body">
					<?
						if (file_exists("sections/".$section.".html")){
							require("sections/".$section.".html");
						}else{
							require("sections/404.html");
						}
					?>
					</td>
					<td class="mr"><img src="images/frame-mr.gif" alt=" " width=11 height="100%"></td>
					</tr>
					<tr style="height:16px">
					<td class="bl"><img src="images/frame-bl.gif" alt=" " width=11 height=16></td>
					<td class="bm"><img src="images/frame-bm.gif" alt=" " width="100%" height=16></td>
					<td class="br"><img src="images/frame-br.gif" alt=" " width=11 height=16></td>
					</tr>
					</table>
				</td>
				<td style="width:50%">&nbsp;</td>
			</tr>
			<tr>
			<td style="color:white;text-align:center;font-size:12px;width:100%;font-family:'arial' sans-serif;" colspan=4>
			(c) 2008 JAFAX
			</td>
			</tr>
		</table>
	</body>
</html>
	
