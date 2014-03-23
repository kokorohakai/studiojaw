<?php
require_once("class/form.php");

$id = intval($_REQUEST['id']);
$data = $db->query('SELECT * FROM "dj_albums" WHERE "id" = '.$id);
if (count($data) > 0 ){
?>

<?php
} else {
	?>
	Album not found.<br><br>
	<?php
}
?>