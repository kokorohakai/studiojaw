<h1>Web Design at Diamond Phoenix</h1><br><br>
<div style="float:left;">
	<?
	$pf = new pictureframe();
	$pf -> top(); 
	?>
	<a href="wd/07/01.png"><img src="wd/07/01-tn.png"></a><br>Login Page
	<?
	$pf -> bottom();
	?>
</div>
Unfortunately, I do not have many screen shots of the software I worked on at Diamond Phoenix. But I can at least tell 
you about them. But before you can install any of the software, I must first tell you about the company. Diamond
Phoenix corporation, is a global company, now owned by System Logistics. They specialized in warehouse carousel systems. 
These systems would give instruction to a user, as to where to retrieve a product from, and manages their tasks. More
information about these systems can be found at: <a href="http://www.systemlogistics.com/">system logistics</a><br><br>
<div style="float:right;">
	<?
	$pf = new pictureframe();
	$pf -> top(); 
	?>
	<a href="wd/07/02.png"><img src="wd/07/02-tn.png"></a><br>Configuration Page
	<?
	$pf -> bottom();
	?>
	
</div>
The software I worked on, was a web administration front end for the software. An admin could go into the system and
make changes to the database as needed and manage tasks by user. This would communicate with the system server software,
which could interact with an electronic carousel. We even used special plugins for php for opening sockects and passing
data over the network or via a com port, to ensure everything communicated well with each other.<br>
<br>
It was very important that this software ran reliably, so lots of hours went into designing the system to error correct 
and use transactional databasing. It was extremely important to fall back if an error occured. A corrupt database could
down a warehouse for hours.<br>
<br>
We used php5, prototype for AJAX, scriptaculous for animation, and C++ for the server and client software. Customers had 
the choice of using MS SQL, Oracle, or Sybase SQL for their database.<br>