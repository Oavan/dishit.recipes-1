<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>

<div id="main" >
	<!--?php include('views/menubar.php'); ?-->
	<div id="content">
		<?php foreach ($recipes as $recipe) : ?>
			<a href='?action=recipeDetails&id=<?php echo $recipe['id']; ?>'>
				<?php echo $recipe['title']; ?>
			</a>
			<br>

		<?php endforeach; ?>
	</div>
</div>

<?php include('views/footer.php'); ?>