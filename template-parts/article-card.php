<?php
$thumbnailCapt = get_the_post_thumbnail_caption();
if (!$thumbnailCapt) {
    $thumbnailCapt = get_the_title();
}
?>

<div class="card article-card">
    <img alt="<?php echo $thumbnailCapt; ?>" class="card-img-top" src="<?php echo the_post_thumbnail_url(); ?>" onerror="this.src = '<?php echo get_theme_file_uri('assets/img/no-image.png'); ?>';" />
    <div class="card-body">
        <h3 class="card-title">
            <a href="<?php echo the_permalink(); ?>" class="link link-primary" title="<?php echo the_title(); ?>"><?php echo the_title(); ?></a>
        </h3>
        <p class="card-text"><?php echo get_the_excerpt(); ?></p>
    </div>
</div>