<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>

<div class="container">

	<!-- retrieve category data -->
	<?php $category = getCategoryById(getGet('c_id'), true); ?>

	<!-- display breadrumb menu -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo escape(BASE_DIR); ?>">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo escape($category['name']); ?>
			</li>
		</ol>
	</nav>

	<!-- Category Header -->
	<h1 class="headline--secondary">
		<?php echo escape($category['name']); ?>
	</h1>

	<!-- Get all pages for this category -->
	<?php foreach (getPagesByCategoryId($category['id']) as $page) : ?>

	<div class="pageprev">
		<a class="pageprev__title" href="page.php?p_id=<?php echo escape($page['id']); ?>">
			<?php echo escape($page['title']); ?>
		</a>
		<p class="pageprev_content">
			<?php echo get_excerpt(strip_tags($page['content'])); ?>
		</p>
	</div>
	<?php endforeach; ?>

</div>


<?php include "inc/footer.php"; ?>