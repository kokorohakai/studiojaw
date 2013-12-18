<?
	session_start();
	require("class/geshi.php");
	//error_reporting(0);
	$logoimages = explode("\n",`ls -1 logoimg`);
	unset($logoimages[sizeof($logoimages)-1]);
	$n = sizeof($logoimages);
	
	for ( $a = 0; $a < $n; $a++ )
	{
		$x = rand(0,$n-1);
		$temp = $logoimages[$a];
		$logoimages[$a] = $logoimages[$x];
		$logoimages[$x] = $temp;
	}
	
	foreach($_GET as $var=>$val)
	{
		$_SESSION[$var] = stripslashes($val);
		if ($val == "none")
		{
			unset($_SESSION[$var]);
		}
	}
	if (!isset($_SESSION['section']))
	{
		$_SESSION['section'] = "home";
	}
	if ( $_GET['subsection'] != "" )
	{
		$_SESSION['subsection'] = stripslashes($_GET['subsection']);
	}
	
	
	if (!isset($_SESSION['color']))
	{
		$_SESSION['color'] = "8080c0";
	}
	if ( $_SESSION['section'] == "home" ) $_SESSION['color'] = "8080c0";
	if ( $_SESSION['section'] == "dj" ) $_SESSION['color'] = "000000";
	if ( $_SESSION['section'] == "gd" ) $_SESSION['color'] = "c0c080";
	if ( $_SESSION['section'] == "wd" ) $_SESSION['color'] = "c080c0";
	if ( $_SESSION['section'] == "ui" ) $_SESSION['color'] = "c08080";
	if ( $_SESSION['section'] == "s" ) $_SESSION['color'] = "80c080";
	if ( $_SESSION['section'] == "p" ) $_SESSION['color'] = "c0a080";
	if ( $_SESSION['section'] == "t" ) $_SESSION['color'] = "80c0c0";
	if ( $_SESSION['section'] == "c" ) $_SESSION['color'] = "808080";
	$plugins = explode("\n",`ls -1 res/*.php`);
	/*stupid broken syntax highlighter.*/
	foreach ($plugins as $plugin)
	{
		if ( file_exists( $plugin ) && $plugin != "" )
		{
			require_once( $plugin );
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript" language="javascript" src="master/prototype.js"></script>
		<script type="text/javascript" language="javascript">
			<?
			require("master/master.js")
			?>
		</script>
		<?
		$plugins = explode("\n",`ls -1 script/*.js`);
		/*stupid broken syntax highlighter.*/
		foreach ($plugins as $plugin)
		{
			if ( file_exists( $plugin ) && $plugin != "" )
			{
				?>
				<script type="text/javascript" language="javascript" src="<?=$plugin?>"></script>
				<?
			}
		}
		?>
		<style type="text/css">
		<?
			require("master/master.css")
		?>
		</style>
		<?
		$plugins = explode("\n",`ls -1 css/*.css`);
		/*stupid broken syntax highlighter.*/
		foreach ($plugins as $plugin)
		{
			if ( file_exists( $plugin ) && $plugin != "" )
			{
				?>
				<link type="text/css" rel="stylesheet" href="<?=$plugin?>"/>
				<?
			}
		}
		?>
	</head>
	<body style="background:#<?=$_SESSION['color']?>">
		<table class="master">
			<tr class="masterrow">
				<td class="lefttile"></td>
				<td class="nav">
					<div class="nav">
						<table class="icontable">
							<tr>
								<td class="icon">
									<a href="?section=home&subsection=none"><img src="img/icons/a.png" class="icon" id="imga"></a>
									<div class="label" id="a">about</div>
								</td>
							</tr>
							<tr>
								<td class="icon">
									<a href="?section=dj&subsection=none"><img src="img/icons/dj.png" class="icon" id="imgdj"></a>
									<div class="label" id="dj">DJ and Karaoke services</div>
								</td>
							</tr>
							</tr>
								<td class="icon">
									<a href="?section=p&subsection=none"><img src="img/icons/p.png" class="icon" id="imgp"></a>
									<div class="label" id="p">Touhou Convention</div>
								</td>
							</tr>	
							<tr>
								<td class="icon">
									<a href="?section=gd&subsection=none"><img src="img/icons/gd.png" class="icon" id="imggd"></a>
									<div class="label" id="gd">graphic design</div>
								</td>
							</tr>
							<tr>
								<td class="icon">
									<a href="?section=wd&subsection=none"><img src="img/icons/wd.png" class="icon" id="imgwd"></a>
									<div class="label" id="wd">web design</div>
							</tr>
							<tr>
								<td class="icon">
									<a href="?section=ui&subsection=none"><img src="img/icons/ui.png" class="icon" id="imgui"></a>
									<div class="label" id="ui">user interface design</div>
								</td>
							<tr>
							</tr>
								<td class="icon">
									<a href="?section=s&subsection=none"><img src="img/icons/s.png" class="icon" id="imgs"></a>
									<div class="label" id="s">software</div>
								</td>
							</tr>	
							<tr>
								<td class="icon">
									<a href="?section=t&subsection=none"><img src="img/icons/t.png" class="icon" id="imgt"></a>
									<div class="label" id="t">tutorials and code samples</div>
								</td>
							</tr>
							<tr>
								<td class="icon">
									<a href="?section=c&subsection=none"><img src="img/icons/c.png" class="icon" id="imgc"></a>
									<div class="label" id="c">contact</div>
								</td>
							</tr>
							<script type="text/javascript" language="javascript">
								var icona = new IconClass('a',45);
								var icondj = new IconClass('dj',200);
								var icons = new IconClass('p',200);
								var icongd = new IconClass('gd',115);
								var iconwd = new IconClass('wd',90);
								var iconui = new IconClass('ui',160);
								var icons = new IconClass('s',65);
								var iconc = new IconClass('t',300);
								var iconc = new IconClass('c',55);
							</script>
						</table>
						<img src="logoimg/<?=$logoimages[1];?>" style="position:relative;z-index:1;height:505px;" id="nextimg">
						<img src="logoimg/<?=$logoimages[0];?>" style="position:relative;top:-505px;z-index:2;height:505px;" id="currimg">
						<img src="img/logo.png" style="position:relative;top:-1010px;z-index:3;height:505px;">
					</div>
				</td>
				<td class="guttertile"></td>
				<td class="thebody">
					<div class="innerbody">
						<?
						if ( file_exists( "section/".$_SESSION['section'].".php" ) )
						{
							require( "section/".$_SESSION['section'].".php" );
						}
						?>
					</div>
				</td>
				<td class="edge"></td>
				<td class="rightgutter"></td>
			</tr>
		</table>
	</body>
</html>