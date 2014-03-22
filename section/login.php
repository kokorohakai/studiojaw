<h1>Login Manager</h1><br><br>
<?php
if ($user->loggedIn()){
?>
	You are logged in.<br><br>
	<?php
	$pf = new pictureframe();
	$pf -> top(); 
	?>
		You can do the following:<br>
		<?php
		if ($user->isAdmin()){
		?>
			<a href="?section=admin">Admin Section</a><br>
		<?php
		}
		?>
		<a href="?logout=true">Log out.</a><br>
	<?
	$pf -> bottom();
	?>
<?php
} else {
	?>
	<b>Please log in to continue.</b><br>
	<?
	$pf = new pictureframe();
	$pf -> top(); 
	?>
	<form action = "?section=login" method="post">
		<table>
			<tr>
				<td>
					User Name:
				</td>
				<td>
					<input type="text" name="username">
				</td>
			</tr>
			<tr>
				<td>
					Pass Word:
				</td>
				<td>
					<input type="password" name="password">
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<input type="submit">
				</td>
		</table>
	</form>
	<?
	$pf -> bottom(); 

	if (!empty($user->errors)){
		echo "<span style='color:red'>";
		foreach($user->errors as $error){
			echo $error."<br>";
		}
		echo "</span>";
	}
}
?>