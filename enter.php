<?php 
	include_once("header.php");

	$username = "";
	if(isset($_GET['username'])){
		$username = $_GET['username'];
	}
?>
	<div class='wapper'>
		<div class="elgg-page-body">
			<h1>Welcome <?php echo $username ?></h1>
		</div>
	</div>
<?php
	include_once('footer.php');
?>