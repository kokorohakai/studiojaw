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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Jafax 13: Night of the Living Otaku</title>
		<META http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class=header>
		<!--need some browser detection here, the gif should be used for <=IE6.0, and png for everything else.-->
		<img src="images/logo.gif" alt="Jafax 13: Night of the Living Otaku">
		</div>
		<div style="color:#AA0000;text-align:center;font-size:24px;font-family:'Arial' sans-serif;">June 21st and 22nd, 2008, at Grand Valley State University.</div>
		<table>
			<tr>
				<td class=sidebar>
				<a class=sidebar href="?section=home">Home</a><br>
				<a class=sidebar href="?section=history">History</a><br>
				<a class=sidebar href="?section=rules">General Rules</a><br>
				<br>
				<img src="images/programming.png" alt="Programming:"><br>
				<a class=sidebar href="?section=guests">Guests</a><br>
				<a class=sidebar href="?section=panels">Panels</a><br>
				<a class=sidebar href="?section=events">Events/Contests</a><br>
				<a class=sidebar href="?section=gaming">Gaming</a><br>
				<a class=sidebar href="?section=showings">Showings</a><br>
				<br>
				<img src="images/resources.png" alt="Resources for:"><br>
				<a class=sidebar href="?section=volunteers">Volunteers</a><br>
				<a class=sidebar href="?section=artists">Artists</a><br>
				<a class=sidebar href="?section=cosplay">Cosplayers</a><br>
				<a class=sidebar href="?section=vendors">Vendors</a><br>
				<a class=sidebar href="?section=guestsr">Guests</a><br>
				<!--<a class=sidebar href="?section=attendees">Attendees</a><br> Probably not necessary-->
				<a class=sidebar href="?section=donors">Donors</a><br>
				<br>
				<img src="images/social.png" alt="Social:"><br>
				<a class=sidebar href="http://www.jafax.org/forum">Forums</a><br>
				<a class=sidebar href="?section=contacts">Contacts</a><br>
				<br>
				<img src="images/location.png" alt="Location:"><br>
				<a class=sidebar href="?section=hours">Hours</a><br>
				<a class=sidebar href="?section=maps">Maps</a><br>
				<a class=sidebar href="?section=lodging">Lodging</a><br>
				<a class=sidebar href="?section=dining">Dining</a><br>
				</td>
				<td style="width:100%;color:white;vertical-align:top">
					<table>
					<tr style="height:17px;vertical-align:top">
					<td class="tl"><img src="images/frame-tl.png" alt=" " width=11 height=17></td>
					<td class="tm"><img src="images/frame-tm.png" alt=" " width="100%" height=17></td>
					<td class="tr"><img src="images/frame-tr.png" alt=" " width=11 height=17></td>
					</tr>
					<tr style="vertical-align:top;height:100%">
					<td class="ml"><img src="images/frame-ml.png" alt=" " width=11 height="100%"></td>
					<td class="body">
					<?
						if (file_exists("sections/".$section.".html")){
							require("sections/".$section.".html");
						}else{
							require("sections/404.html");
						}
					?>
					</td>
					<td class="mr"><img src="images/frame-mr.png" alt=" " width=11 height="100%"></td>
					</tr>
					<tr style="height:16px">
					<td class="bl"><img src="images/frame-bl.png" alt=" " width=11 height=16></td>
					<td class="bm"><img src="images/frame-bm.png" alt=" " width="100%" height=16></td>
					<td class="br"><img src="images/frame-br.png" alt=" " width=11 height=16></td>
					</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
	<div class="copyright">
	(c) 2008 JAFAX
	</div>
</html>
	
