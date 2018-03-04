<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>

<div class="container">

	<!-- retrieve page data -->
	<?php $page = getPageWithCategoryById(getGet('p_id'), true); ?>

	<!-- display breadrumb menu -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo escape(BASE_DIR); ?>">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a href="category.php?c_id=<?php echo escape($page['category_id']); ?>"><?php echo escape($page['category_name']); ?></a>
			</li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo escape($page['title']); ?></li>
		</ol>
	</nav>

	<h1 class="headline--tertiary">
		<?php echo escape($page['title']); ?>
	</h1>

	<p class="page-content">
		<?php echo $page['content']; ?>
	</p>

</div>

<?php include "inc/footer.php"; ?>