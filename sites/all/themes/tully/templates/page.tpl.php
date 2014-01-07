<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page-wrapper">

    <header id="masthead">

        <?php print render($page['header']); ?>

    </header>
    <section id="main-container">
        <?php print render($page['content']); ?>
    </section>
</div>

<?php print render($page['footer']); ?>
