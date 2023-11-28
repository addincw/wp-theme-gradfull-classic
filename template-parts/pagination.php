<?php
$pagination = paginate_links(['type' => 'list']);

$pagination = preg_replace('/ul class=\'([\w-]*)\'/', 'ul class="pagination justify-content-center $1"', $pagination);
$pagination = preg_replace('/<li>/', '<li class="page-item">', $pagination);
$pagination = preg_replace('/(a|span)(.*)class="([\w\s-]*)"/', '$1$2class="page-link $3"', $pagination);
$pagination = preg_replace('/class="([\w\s-]*)current([\w\s-]*)"/', 'class="$1current active$2"', $pagination);
?>
<nav aria-label="Page navigation articles">
    <?php echo $pagination; ?>
</nav>