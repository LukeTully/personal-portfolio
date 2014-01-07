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
    <div id="inner-page-wrapper">
    <header id="masthead">

        <?php print render($page['header']); ?>

    </header>
    <section id="main-container">
        <?php print render($page['content']); ?>
    </section></div>
</div>

<?php print render($page['footer']); ?>
