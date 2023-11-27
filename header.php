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

<body <?php body_class(); ?>>
    <nav class="navbar navbar-transparent navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand brand-title" href="/">Project Cendekia</a>
            <div class="d-none d-lg-block flex-grow-0">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    <a class="nav-link" href="/projects.html">Projects</a>
                    <a class="nav-link" href="/articles.html">Articles</a>
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
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                        <a class="nav-link" href="/projects.html">Projects</a>
                        <a class="nav-link" href="/articles.html">Articles</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>