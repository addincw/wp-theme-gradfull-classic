<?php get_header(null, ['body_class' => 'articles']); ?>

<section class="banner bg-gradient-seagreen py-80 px-3">
    <div class="container">
        <h1>Projects</h1>
        <p>All Creative Works, Selected Projects</p>
    </div>
</section>

<?php get_template_part('/template-parts/breadcrumbs', null, [
    'paths' => [['route' => '/', 'name' => 'Home'], 'Projects']
]); ?>

<!-- projects -->
<section class="pt-3 py-80">
    <div class="container">
        <?php
        $postsPerPage = get_option('posts_per_page', 9);
        $currentPage = get_query_var('paged') ? (int) get_query_var('paged') : 1;

        $projectPosts = new WP_Query([
            'post_type' => 'project',
            'posts_per_page' => $postsPerPage,
            'paged' => $currentPage,
        ]);

        $currentPagePosts = $projectPosts->post_count;

        $offsetPost = $currentPage * $postsPerPage - ($postsPerPage - 1);
        $limitPost = ($currentPage - 1) * $postsPerPage + $currentPagePosts;

        $totalPosts = wp_count_posts('project')->publish;
        $displayTotalPosts = $totalPosts > 100 ? '100+' : $totalPosts;
        ?>
        <p>Show <strong><?php echo $offsetPost . "-" . $limitPost; ?></strong> from <?php echo $displayTotalPosts; ?> projects</p>

        <div class="row mb-50">
            <?php
            while ($projectPosts->have_posts()) :
                $projectPosts->the_post();
            ?>
                <div class="col-lg-4 py-3">
                    <?php get_template_part('/template-parts/article-card'); ?>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <?php get_template_part('/template-parts/pagination', null, [
            'total' => $projectPosts->max_num_pages
        ]); ?>
    </div>
</section>

<?php get_footer(); ?>