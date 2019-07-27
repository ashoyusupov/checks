<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<h2>Files in Folder</h2>
	<?php
	$files = scandir('skans'); 

	foreach($files as $file){ 
	if ($file != "." && $file != "..") {?>
		<?php echo '<table>';?>
		<?php echo '<tr><td style="border:none;"><a href="view.php?file=' . $file . '">' . $file . '</a></td></tr>'; ?>
	    <?php echo '</table>';?>
		<?}
	}?>
</div>

<?php include("includes/footer.php");?>

</body>
</html>