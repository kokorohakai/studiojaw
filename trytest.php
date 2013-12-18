<?
$operations = 1000;
if (isset($_GET['operations']))
{
	if ( is_numeric($_GET['operations']) )
	{
		$operations = $_GET['operations'];
	}
}
?>
<html>
	<head>
		<script>
			var ec = 0;
			var sc = 0;
			var tc = 0;
			var operation = <?=$operations?>;
			function update()
			{
				//time an eval
				var d = new Date();
				for( var n = 1; n < 1000; n++){ 
					eval("var x = Math.sqrt(15341);");
				}
				var e = new Date();
				ts = e.getTime() - d.getTime(); 
				ec+=ts;

				//time it straight
				d = new Date();
				for( var n = 1; n < 1000; n++){ 
					var x = Math.sqrt(15341); 
				}
				e = new Date();
				ts = e.getTime() - d.getTime(); 
				sc+=ts;
				
				//time it with a try.
				d = new Date();
				for( var n = 1; n < 1000; n++){ 
					try {
						var x = Math.sqrt(15341); 
					} catch(e) {}
				}
				e = new Date();
				ts = e.getTime() - d.getTime(); 
				tc+=ts;
				
				//report back				
				el = document.getElementById("updatethis");
				el.innerHTML = "Evals: " + ec + ", straight: " + sc + ", trys: " + tc;
				setTimeout(update,16);
			}
			setTimeout(update,16);
		</script>
	</head>
	<body>
		Running timing tests on Evals, straight operations, and try operations with <?=$operations?> operations per loop.
		<div id="updatethis">Evals: 0, straight: 0, trys: 0</div>
	</body>
</html>