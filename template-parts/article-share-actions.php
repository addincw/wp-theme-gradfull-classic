<?php

/**
 * 
 * @param mixed[] $args
 *        string  $args['article_link']
 *        string  $args['article_title']
 */

$articleLink = isset($args['article_link']) ? $args['article_link'] : site_url("/");
$articleLinkEncoded = urlencode($articleLink);

$articleTitle = isset($args['article_title']) ? $args['article_title'] : "";
$articleTitleEncoded = urlencode($articleTitle);
?>

<div class="d-flex align-items-center pt-3 pt-md-0">
    Share:
    <div class="share-actions ms-3">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $articleLinkEncoded; ?>%3Futm_source%3Dfacebook%26utm_medium%3Dsharer%26utm_campaign%3Dsocial" aria-label="share to facebook" class="btn btn-facebook rounded-circle">
            <i aria-hidden="true" class="bi bi-facebook"></i>
        </a>
        <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $articleTitleEncoded; ?>%C2%A0+<?php echo $articleLinkEncoded; ?>" aria-label="share to twitter" class="btn btn-twitter rounded-circle">
            <i aria-hidden="true" class="bi bi-twitter-x"></i>
        </a>
        <a target="_blank" href="whatsapp://send?text=<?php echo $articleTitleEncoded; ?>%C2%A0+<?php echo $articleLinkEncoded; ?>" aria-label="share to whatsapp" class="btn btn-whatsapp rounded-circle">
            <i aria-hidden="true" class="bi bi-whatsapp"></i>
        </a>
        <!-- TODO: add js handler to copy to clipboard -->
        <button aria-label="copy article link to clipboard" class="btn btn-light rounded-circle" data-text="<?php echo $articleLink; ?>?%3Futm_source%3Dothers%26utm_medium%3Dwebsharing">
            <i aria-hidden="true" class="bi bi-copy"></i>
        </button>
    </div>
</div>