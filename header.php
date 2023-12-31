<?php

/**
 * 
 * @param mixed[] $args
 *        string  $args['body_class']
 *        bool    $args['navbar_default_transparent']
 */

$addBodyClass = isset($args['body_class']) ? $args['body_class'] : "";

$navTransparent = "navbar-transparent";
if (isset($args['navbar_default_transparent']) && !$args['navbar_default_transparent']) {
    $navTransparent = "";
}

$isInHome = gf_is_route_match('/', true);
$isInProject = gf_is_route_match('/projects', true) || get_post_type() === 'project';
$isInArticle = gf_is_route_match('/articles', true) || get_post_type() === 'post';
?>

<!DOCTYPE html>
<html lang="en">

<head <?php language_attributes() ?>>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <?php if (is_admin_bar_showing()) : ?>
        <style type="text/css" media="screen">
            .navbar.sticky-top {
                top: 32px;
            }

            @media screen and (max-width: 782px) {
                .navbar.sticky-top {
                    top: 46px !important;
                }
            }
        </style>
    <?php endif; ?>
</head>

<body <?php body_class($addBodyClass); ?>>
    <nav class="navbar <?php echo $navTransparent; ?> navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand brand-title" href="<?php echo site_url('/'); ?>">Project Cendekia</a>
            <div class="d-none d-lg-block flex-grow-0">
                <div class="navbar-nav">
                    <a class="nav-link <?php echo gf_print_if('active', $isInHome); ?>" <?php echo gf_print_if('aria-current="page"', $isInHome); ?> href="<?php echo site_url('/'); ?>">Home</a>
                    <a class="nav-link <?php echo gf_print_if('active', $isInProject); ?>" <?php echo gf_print_if('aria-current="page"', $isInProject); ?> href="<?php echo site_url('/projects'); ?>">Projects</a>
                    <a class="nav-link <?php echo gf_print_if('active', $isInArticle); ?>" <?php echo gf_print_if('aria-current="page"', $isInArticle); ?> href="<?php echo site_url('/articles'); ?>">Articles</a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="d-lg-none offcanvas offcanvas-start" tabindex="-1" id="navbarNavAltMarkup" aria-labelledby="navbarNavAltMarkupLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="navbarNavAltMarkupLabel">
                        Navigation Menu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <nav class="nav flex-column">
                        <a class="nav-link <?php echo gf_print_if('active', $isInHome); ?>" <?php echo gf_print_if('aria-current="page"', $isInHome); ?> href="<?php echo site_url('/'); ?>">Home</a>
                        <a class="nav-link <?php echo gf_print_if('active', $isInProject); ?>" <?php echo gf_print_if('aria-current="page"', $isInProject); ?> href="<?php echo site_url('/projects'); ?>">Projects</a>
                        <a class="nav-link <?php echo gf_print_if('active', $isInArticle); ?>" <?php echo gf_print_if('aria-current="page"', $isInArticle); ?> href="<?php echo site_url('/articles'); ?>">Articles</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>