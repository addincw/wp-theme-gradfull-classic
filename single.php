<?php
get_header(null, [
    'body_class' => 'article-detail',
    'navbar_default_transparent' => false,
]);

the_post();

$currentPostId = get_the_ID();
$categories = get_the_category();
/** @var int[] $categoryIds */
$categoryIds = array_column($categories, 'term_id');
$otherPostsLabel = "Articles";
$otherPostsQueryArgs = [
    'category__in' => $categoryIds,
    'post__not_in' => [$currentPostId],
    'posts_per_page' => 5,
];
$parentRoute = ['route' => '/articles', 'name' => 'Articles'];
$thumbnailCapt = get_the_post_thumbnail_caption() ?? get_the_title();

if (get_post_type() === 'project') {
    $otherPostsLabel = "Projects";
    $otherPostsQueryArgs = array_merge($otherPostsQueryArgs, ['post_type' => 'project']);
    $parentRoute = ['route' => '/projects', 'name' => 'Projects'];
}

get_template_part('/template-parts/breadcrumbs', null, [
    'paths' => [
        ['route' => '/', 'name' => 'Home'],
        $parentRoute,
        get_the_title()
    ]
]);
?>

<!-- article -->
<section class="pt-3 py-80">
    <div class="container">
        <div class="row">
            <section class="col-lg-8">
                <h1><?php the_title(); ?></h1>
                <p class="text-body-secondary mb-3"><?php the_excerpt(); ?></p>

                <img class="thumbnail rounded mb-2" src="<?php the_post_thumbnail_url(); ?>" onerror="this.src = '<?php echo get_theme_file_uri('assets/img/no-image.png'); ?>';" alt="<?php echo $thumbnailCapt; ?>" width="705" height="393" />

                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between border-bottom py-2 mb-4">
                    <p class="mb-0">
                        By
                        <strong class="pe-2"><?php the_author_posts_link(); ?></strong>
                        <time class="border-start border-dark ps-2">
                            <?php the_time('d M, Y. H:i'); ?>
                        </time>
                    </p>

                    <?php get_template_part('/template-parts/article-share-actions', null, [
                        'article_link' => get_permalink(),
                        'article_title' => get_the_title(),
                    ]); ?>
                </div>

                <div class="w-full overflow-hidden"><?php the_content(); ?></div>
            </section>

            <section class="col-lg-4 ps-0 ps-lg-3">
                <div class="related-topics mb-5">
                    <h2 class="fs-4 underline">Related Categories</h2>
                    <?php if (count($categories) > 0) : ?>
                        <div class="d-flex flex-wrap">
                            <?php
                            /** @var WP_Term $category */
                            foreach ($categories as $category) :
                            ?>
                                <a href="<?php echo get_term_link($category); ?>" class="btn btn-outline-success">
                                    <?php echo $category->name; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <p class="text-body-secondary">Theres no topic related.</p>
                    <?php endif; ?>
                </div>
                <div class="other-articles">
                    <h2 class="fs-4 underline text-capitalize">Other <?php echo $otherPostsLabel; ?></h2>
                    <?php
                    $otherPosts = new WP_Query($otherPostsQueryArgs);
                    if ($otherPosts->found_posts) :
                    ?>
                        <ol class="list-group list-group-numbered">
                            <?php
                            while ($otherPosts->have_posts()) :
                                $otherPosts->the_post();
                            ?>
                                <li class="list-group-item article-item d-flex justify-content-between align-items-start border-bottom py-2">
                                    <div class="w-100 me-auto">
                                        <h3 class="fs-5 fw-semibold text-truncate article-item__title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <p class="text-truncate mb-0">
                                            By
                                            <strong class="pe-2 fw-semibold"><?php the_author_link(); ?></strong>
                                            <time class="border-start ps-2">
                                                <?php the_time('d M, Y. H:i'); ?>
                                            </time>
                                        </p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ol>
                    <?php else : ?>
                        <p class="text-body-secondary">Theres no other articles.</p>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
</section>

<?php get_footer(); ?>