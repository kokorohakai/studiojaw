<?
	session_start();
	import_request_variables("GPC");
	if ($_SESSION['user']==NULL)$_SESSION['user']="none";
	if ($_SESSION['activefile']==NULL)$_SESSION['activefile']="none";
	if ($username=="jafaxstaff"&&$password=="c4n17B3j4f4x71m3n0wplease"){
		$_SESSION['user']="jafaxstaff";
	}
	if ($logout=="true"){
		$_SESSION['user']="none";
	}
	if ($_SESSION['user']=="jafaxstaff"){
		if (strlen($file)>1){
			for ($i=0;$i<strlen($file);$i++){
				if ($file[$i]=="/"){
					$file[$i]=" ";
				}
			}
			$_SESSION['activefile']=$file;	
		}
		if (strlen($data)>1){
			$command="cp ../sections/".$_SESSION['activefile']." "."../revisions/".$_SESSION['activefile'].".".`date '+%Y.%m.%d.%H.%M.%S.html'`;
			exec($command,$blah);
			$fileh=fopen("../sections/".$_SESSION['activefile'],"w+");
			fwrite($fileh,stripslashes($data));
			fclose($fileh);
			$announce="Saved... ";	
		}
	}
?>
<html>
<head>
<title>JAFAX Website administration</title>
</head>
<body>
<?if($_SESSION['user']=="jafaxstaff"){?>
<form method=post action="index.php" style="display:inline">
<input type="hidden" name=logout value=true>
<input type="submit" value="log out">
</form>
<?if (strlen($_SESSION['activefile'])>1){
	echo "Now editing: ".$_SESSION['activefile'];
}
if (strlen($announce)>1){
	echo " <b style='color:red'>".$announce."</b> ";	
}
?>
<table style="width:100%;border-top:2px solid gray;">
	<tr style="height:100%;">
		<td style="width:200px;height:100%;vertical-align:top">
			<?
			$a=split("\n",`ls -X -A -1 ../sections`);
			foreach($a as $b){
				if (strlen($b)>1){?>
				<form method=post action="index.php" style="display:inline">
					<input type="hidden" name="file" value="<?=$b?>">
					<input type="submit" value="<?=$b?>">
				</form><br>
				<?}
			}?>
		</td>
		<td style="width:100%;height:100%;vertical-align:top">
			<form method=post action="index.php" style="display:inline">
				<textarea style="width:100%;height:420px" name="data"><?if(file_exists("../sections/".$_SESSION['activefile'])){require "../sections/".$_SESSION['activefile'];}?></textarea>
				<input type="submit" value="save" style="height:25px;">
			</form>
		</td>
	</tr>
</table>
<?}else{?>
<form method=post action="index.php">
<table>
<tr><td style="width:80px">User Name:</td><td style="width:200px"><input type="text" name="username" style="width:200px"></td></tr>
<tr><td style="width:80px">Pass Word:</td><td style="width:200px"><input type="password" name="password" style="width:200px"></td></tr>
</table>
<input type="submit" value="Log in">
</form>
<?}?>
</body>
</html>