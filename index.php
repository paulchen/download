<?php

$directory = dirname(__FILE__);
chdir($directory);

if(isset($_POST) && isset($_POST['url'])) {
	$mode = 'a';
	if(isset($_POST['clear']) && $_POST['clear']) {
		$mode = 'w';
	}
	$handle = fopen('download.txt', $mode);
	fputs($handle, $_POST['url'] . "\n");
	fclose($handle);

	header('Location: index.php');
	die();
}
?>
<form method="post">
URL to download: <input type="text" length="100" name="url" /><br />
<input type="checkbox" name="clear" id="clear" /> <label for="clear">Truncate download.txt</label><br />
<input type="submit" />
</form>
<hr />
<pre>
<?php
if(file_exists('download.txt')) {
	echo("Contents of download.txt:\n\n");
	echo(file_get_contents('download.txt'));
}
else {
	echo('download.txt does not exist.');
}
?>


Contents of directory downloads:

<?php echo(file_get_contents('downloads.lst')); ?>

</pre>


