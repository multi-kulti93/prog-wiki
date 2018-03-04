<div class="l_flex-x">

    <?php foreach (getCategories(true) as $category) : ?>

    <div class="catlist">
        <div class="catlist__container">
            <div class="catlist__headline">
                <img class="catlist__img" src="img/logo_git.png" alt="logo git">
                <a class="catlist__title" href="category.php?c_id=<?php echo escape($category['id']); ?>">
                    <?php echo escape($category['name']); ?>
                </a>
            </div>
            <ul>

                <?php foreach (getPagesByCategoryId($category['id']) as $page) : ?>
                <li class="catlist__item">
                    <a href="page.php?p_id=<?php echo escape($page['id']); ?>">
                        <?php echo escape($page['title']); ?>
                    </a>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
    <?php endforeach; ?>

</div>