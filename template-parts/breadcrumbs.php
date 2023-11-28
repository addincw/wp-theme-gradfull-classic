<?php

/**
 * 
 * @param mixed[] $args
 *        mixed[] $args['paths'] Set of array to define the tree route
 */

$paths = isset($args['paths']) ? $args['paths'] : [];
?>

<nav class="container breadcrumb-container py-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php foreach ($paths as $path) :
            $itemAttr = "class=\"breadcrumb-item\"";
            if (is_string($path)) {
                $itemAttr = "class=\"breadcrumb-item active\" aria-current=\"page\"";
            }
        ?>
            <li <?php echo $itemAttr; ?>>
                <?php
                if (is_string($path)) :
                    echo $path;
                else :
                ?>
                    <a href="<?php echo site_url($path['route']); ?>">
                        <?php echo $path['name']; ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>