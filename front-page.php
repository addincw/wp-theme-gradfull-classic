<?php get_header(); ?>

<section class="banner bg-gradient-seagreen py-80 px-3">
    <div class="container">
        <h1 class="fs-6 fw-normal mb-50">
            Hello, my name is
            <span class="banner-highlight-text d-block fw-semibold py-2">Addin Cendekia Wahid, </span>the author of this site.
        </h1>
        <p class="mb-50">
            Im a <span class="d-block fw-semibold fs-1">Frontend Developer</span>
        </p>
        <p>Have something to discuss? lets see if i can help that</p>
        <button class="btn btn-lg btn-gradient-pearlgreen btn-jts rounded-pill" data-target="#contact">
            <i class="bi bi-envelope me-1"></i> Send me a message
        </button>
    </div>
</section>
<section class="experience py-80">
    <div class="experience-content container">
        <h2 class="underline underline-center">
            Experience Working on Various Application
        </h2>
        <p class="mb-50">
            Mostly working on e-commerce, but there are also various other
            applications such as company profile, news portal, school magement,
            custom ERP, custom HRIS, fundrise portal and mobile app.
        </p>
        <div class="statistics d-flex justify-content-center">
            <div class="statistic">
                <div class="label">6+</div>
                Year of Experiences
            </div>
            <div class="statistic">
                <div class="label">45+</div>
                Projects Involved and Developed
            </div>
            <div class="statistic">
                <div class="label">35+</div>
                Professional Clients
            </div>
        </div>
    </div>
    <img class="experience-bg" src="<?php echo get_theme_file_uri('assets/img/bg-stacks.png'); ?>" role="presentation" width="1440" height="316" />
</section>
<section class="project">
    <div class="container py-80">
        <div class="row">
            <div class="project-description col-lg-6 pb-5 pb-lg-0">
                <h2 class="mb-30">All Creative Works, Selected Projects</h2>
                <p>I share what I've done on the project, what stack I've used.</p>
                <a href="<?php echo site_url('/projects'); ?>" class="link-primary link-offset-3 text-capitalize">see another projects <i class="bi bi-arrow-right-short ms-1"></i></a>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <?php
                    $qHighlightProjects = new WP_Query(['post_type' => 'project', 'posts_per_page' => 4]);
                    $highlightProjects = $qHighlightProjects->get_posts();
                    $highlightProjectGroups = array_chunk($highlightProjects, 2);

                    foreach ($highlightProjectGroups as $groupKey => $highlightProjectGroup) :
                        /** @var WP_POST $project */
                    ?>
                        <div class="col-6 <?php echo $groupKey === 1 ? "pt-5" : "" ?>">
                            <?php
                            foreach ($highlightProjectGroup as $project) :
                                $thumbnailCapt = get_the_post_thumbnail_caption($project);
                                if (!$thumbnailCapt) {
                                    $thumbnailCapt = $project->post_title;
                                }
                            ?>
                                <div class="card project-card mb-4">
                                    <img alt="<?php echo $thumbnailCapt; ?>" class="card-img-bg" src="<?php echo get_the_post_thumbnail_url($project); ?>" onerror="this.src = '<?php echo get_theme_file_uri('assets/img/no-image.png'); ?>';" />
                                    <div class="card-body bg-success">
                                        <h3 class="card-title">
                                            <a href="/project-detail.html" class="link"><?php echo $project->post_title; ?></a>
                                        </h3>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    <?php
                    endforeach;

                    wp_reset_postdata();
                    ?>

                    <?php if (count($highlightProjects) === 0) : ?>
                        <div class="col-12 pt-5">
                            <p class="text-center">No record found</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-80">
    <div class="container">
        <h2 class="underline">Latest Articles</h2>
        <div class="row mb-50">
            <?php
            $latestPosts = new WP_Query(['posts_per_page' => 5]);

            while ($latestPosts->have_posts()) :
                $latestPosts->the_post();
            ?>
                <div class="col-lg-4 py-3">
                    <?php get_template_part('/template-parts/article-card'); ?>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <div class="text-center">
            <a href="<?php echo site_url('/articles'); ?>" class="link-primary link-offset-3 text-capitalize">see another articles <i class="bi bi-arrow-right-short ms-1"></i></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>