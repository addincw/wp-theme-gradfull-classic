<?php get_header(); ?>

<section class="banner bg-gradient-seagreen py-80 px-3">
    <div class="container">
        <h1>Articles</h1>
        <p>Discuss any topics related to software development</p>
    </div>
</section>

<?php get_template_part('/template-parts/breadcrumbs', null, [
    'paths' => [['route' => '/', 'name' => 'Home'], 'Articles']
]); ?>

<!-- articles -->
<section class="pt-3 py-80">
    <div class="container">
        <?php
        $postsPerPage = get_option('posts_per_page', 9);

        $currentPage = get_query_var('paged') ? (int) get_query_var('paged') : 1;
        /** @var WP_Query $wp_query */
        $currentPagePosts = $wp_query->post_count;

        $offsetPost = $currentPage * $postsPerPage - ($postsPerPage - 1);
        $limitPost = ($currentPage - 1) * $postsPerPage + $currentPagePosts;

        $totalPosts = wp_count_posts()->publish;
        $displayTotalPosts = $totalPosts > 100 ? '100+' : $totalPosts;
        ?>
        <p>Show <strong><?php echo $offsetPost . "-" . $limitPost; ?></strong> from <?php echo $displayTotalPosts; ?> articles</p>

        <div class="row mb-50">
            <?php
            while (have_posts()) :
                the_post();
            ?>
                <div class="col-lg-4 py-3">
                    <?php get_template_part('/template-parts/article-card'); ?>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <?php get_template_part('/template-parts/pagination'); ?>
    </div>
</section>

<?php get_footer(); ?>