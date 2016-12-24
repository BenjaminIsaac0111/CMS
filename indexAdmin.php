<?php 
	include('includes_MarkUp/HTMLheader.php');
?>
<?php if ($session->isAdmin()):?>
	<body>
	<?php require_once('includes_MarkUp/HTMLnavbarAdmin.php');  ?>
	<div class="container-fluid">
	<?php
		require_once('includes_MarkUp/HTMLlocationAdmin.php');
		require_once('includes_MarkUp/HTMLuserList.php');

	?>
	</div>
	</body>
</html>
<?php else: ?>
	<?php require_once('includes_MarkUp/HTMLblocked.php');?>
<?php endif; ?>
