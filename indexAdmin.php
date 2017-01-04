<?php 
	include('includes_MarkUp/HTMLheader.php');
?>
	<body>
	<?php require_once('includes_MarkUp/HTMLnavbarAdmin.php');  ?>
<?php if ($session->isAdmin()):?>
	<div class="container-fluid">
	<?php
		require_once('includes_MarkUp/HTMLlocationAdmin.php');
		require_once('includes_MarkUp/HTMLuserList.php');

	?>
<?php else: ?>
	<?php require_once('includes_MarkUp/HTMLblocked.php');?>
<?php endif; ?>
	</div>
	</body>
</html>
